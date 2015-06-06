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
                    createIssues();
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

function viewIssue(issueId)
{
    $.get(baseURL + 'Issues/view/' + issueId, function(issue) {
        var issueHTML = Mustache.render($('#view-issue').html(), issue);
        $('div.view-issue .modal-body').html(issueHTML);

        $('.view-issue').on('shown.bs.modal', function () {
            // RENDER MAP
        });
        $('.view-issue').modal('show');
    });
}

function createIssues()
{
    $('.create-issue').modal('show');
}