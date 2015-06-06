<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sudo Feed Me</title>

        <?= $this->Html->css('bootstrap.min'); ?>
        <?= $this->Html->css('bootstrap-theme.min'); ?>
        <?= $this->Html->css('sudo.css'); ?>

        <?= $this->Html->script('jquery-1.11.3.min'); ?>
        <?= $this->Html->script('bootstrap.min'); ?>
        <?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true'); ?>
        <?= $this->Html->script('gmaps'); ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>

        <script type="text/javascript">
            var map;
            $(document).ready(function() {
                map = new GMaps({
                    div: '#the-map',
                    zoom: 14,
                    lat: 42.8166667,
                    lng: -1.6333333,
                });

                <?php foreach ($tracks as $track): ?>
                    map.drawPolyline({
                        path: invertCoords(<?= $track->get('shape'); ?>),
                        strokeColor: '#<?= $track->get('color'); ?>',
                        strokeOpacity: 1,
                        strokeWeight: 3.5,
                        click: function (pe) {
                            var lat = pe.latLng.A;
                            var lng = pe.latLng.F;
                        }
                    });
                <?php endforeach; ?>
            });

            function invertCoords(coords)
            {
                var result = [];
                $.each(coords, function (k, v) {
                    result[k] = [v[1], v[0]];
                });

                return result;
            }
        </script>
    </head>

    <body>
        <div id="the-map" class="map-container">
            &nbsp;
        </div>
    </body>
</html>
