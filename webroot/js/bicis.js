$(document).ready(function() {
    initMap();
    drawLines(map, true);
    initMenu();

});

function initMenu()
{
    $('input.bootstrap-switch').bootstrapSwitch({
        size: 'mini'
    });

    $('input.bootstrap-switch').on('switchChange.bootstrapSwitch', function(event, state) {
        map.removePolylines();
        map.removeMarkers();

        var trackTypes = [];
        var doMarkers = $('input.do-markers:checked').length > 0;
        $.each([1, 2, 3, 4], function (k, v) {
            if ($('#left-menu input.type-' + v + ':checked').length > 0) {
                trackTypes.push(v);
            }
        });

        drawLines(map, true, doMarkers, trackTypes);
    });
}

function initMap()
{
    map = new GMaps({
        div: '#the-map',
        zoom: 14,
        lat: 42.81449455658243,
        lng: -1.643375490551764,
        streetViewControl: false,
        zoomControlOpt: {
            position: 'RIGHT'
        }
    });

    GMaps.geolocate({
        success: function(position) {
            map.setCenter(position.coords.latitude, position.coords.longitude);
            map.setZoom(16);
        }
    });

    return map;
}

function toggleMenu()
{
    $('#left-menu').toggleClass('cbp-spmenu-open');
}

function drawLines(targetMap, doEvents, doMarkers, trackTypes)
{
    var doEvents = typeof doEvents !== 'undefined' ? doEvents : true;
    var doMarkers = typeof doMarkers !== 'undefined' ? doMarkers : true;
    var trackTypes = typeof trackTypes !== 'undefined' ? trackTypes : [1, 2, 3, 4];

    $.get(dataSource, function(response) {
        data = response;
        $.each(data, function (k, line) {
            if (doMarkers === true) {
                $.each(line.issues, function (i, issue) {
                    targetMap.addMarker({
                        lat: issue.lat,
                        lng: issue.lng,
                        icon: baseURL + 'img/marker.png',
                        click: function (me) {
                            if (doEvents) {
                                viewIssue(issue.id);
                            }
                        }
                    });
                });
            }

            if ($.inArray(line.track_type, trackTypes) == -1) {
                return true;
            }

            targetMap.drawPolyline({
                path: invertCoords(line.shape),
                strokeColor: '#' + line.color,
                strokeOpacity: 0.75,
                strokeWeight: 3.5,
                click: function (pe) {
                    if (doEvents) {
                        var lat = pe.latLng.A;
                        var lng = pe.latLng.F;
                        createIssues(lat, lng, line.id);
                    }
                },
                mouseover: function (me) {
                    if (doEvents) {
                        this.setOptions({strokeWeight: 6, strokeOpacity: 0.9});
                    }
                },
                mouseout: function (me) {
                    if (doEvents) {
                        this.setOptions({strokeWeight: 3.5, strokeOpacity: 0.75});
                    }
                }
            });
        });
    });
}

function invertCoords(coords)
{
    var result = [];
    $.each(coords, function (k, v) {
        result[k] = [v[1], v[0]];
    });
    return result;
}

function createIssues(lat, lng, id_line)
{
    $('.create-issue').on('shown.bs.modal', function () {
        issueMapPreview('#issue-map',lat, lng);
    });
    $('.create-issue').modal('show');
	$('#lat').val(lat);
	$('#lng').val(lng);
	$('#track_id').val(id_line);
}

function agreeIssue(issueId)
{
    $.get(baseURL + 'Issues/vote/' + issueId + '/agree', function(response) {
        var $counter = $('.view-issue .btn-success span.badge');
        var current = parseInt($counter.html());
        $counter.html(current + 1);
    });
}

function solveIssue(issueId)
{
    $.get(baseURL + 'Issues/vote/' + issueId + '/solved', function(response) {
        var $counter = $('.view-issue .btn-info span.badge');
        var current = parseInt($counter.html());
        $counter.html(current + 1);
    });
}

function viewIssue(issueId)
{
    $.get(baseURL + 'Issues/view/' + issueId, function(issue) {
        var issueHTML = Mustache.render($('#view-issue').html(), issue);
        $('div.view-issue .modal-content').html(issueHTML);
        $('.view-issue').on('shown.bs.modal', function () {
            issueMapPreview('#issue-marker-preview', issue.lat, issue.lng);
        });
        $('.view-issue').modal('show');
    });
}

function showInfo()
{
    $('.info-screen').modal('show');
}

function issueMapPreview(contain, lat, lng) 
{
	var issueMap = new GMaps({
		div: contain,
		zoom: 16,
		lat: lat,
		lng: lng,
		disableDefaultUI: true,
		draggable: false
	});

    drawLines(issueMap, false);

	issueMap.addMarker({
		lat: lat,
		lng: lng,
		icon: baseURL + 'img/marker-blue.png'
	});
}