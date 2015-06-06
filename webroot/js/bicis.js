$(document).ready(function() {
    initMap();
    drawLines();
});

function initMap()
{
    map = new GMaps({
        div: '#the-map',
        zoom: 14,
        lat: 42.8166667,
        lng: -1.6333333,
        streetViewControl: false,
        zoomControlOpt: {
            position: 'RIGHT'
        }
    });
}

function drawLines()
{
    $.get(dataSource, function(response) {
        data = response;
        $.each(data, function (k, line) {
            map.drawPolyline({
                path: invertCoords(line.shape),
                strokeColor: '#' + line.color,
                strokeOpacity: 0.75,
                strokeWeight: 3.5,
                click: function (pe) {
                    var lat = pe.latLng.A;
                    var lng = pe.latLng.F;
                    createIssues(lat, lng, line.id);
                },
                mouseover: function (me) {
                    this.setOptions({strokeWeight: 6, strokeOpacity: 0.9});
                },
                mouseout: function (me) {
                    this.setOptions({strokeWeight: 3.5, strokeOpacity: 0.75});
                }
            });

            $.each(line.issues, function (i, issue) {
                map.addMarker({
                    lat: issue.lat,
                    lng: issue.lng,
                    icon: baseURL + 'img/marker.png',
                    click: function (me) {
                        viewIssue(issue.id);
                    }
                });
            })
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
}

function viewIssue(issueId)
{
    $.get(baseURL + 'Issues/view/' + issueId, function(issue) {
        var issueHTML = Mustache.render($('#view-issue').html(), issue);
        $('div.view-issue .modal-body').html(issueHTML);
        $('.view-issue').on('shown.bs.modal', function () {
            issueMapPreview('#issue-marker-preview', 42.819888583750426, -1.6565568460894156);
        });
        $('.view-issue').modal('show');
    });
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

	issueMap.addMarker({
		lat: lat,
		lng: lng,
		icon: baseURL + 'img/marker.png'
	});
}