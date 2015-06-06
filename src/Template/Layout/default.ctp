<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sudo Feed Me</title>

        <script type="text/javascript">
            var dataSource = '<?= $this->Url->build(['controller' => 'Index', 'action' => 'lines']); ?>';
            var baseURL = '<?= $this->Url->build('/', true); ?>';
            var map;
            var data;
        </script>

        <?= $this->Html->css('bootstrap.min'); ?>
        <?= $this->Html->css('bootstrap-theme.min'); ?>
        <?= $this->Html->css('sudo.css'); ?>

        <?= $this->Html->script('jquery-1.11.3.min'); ?>
        <?= $this->Html->script('bootstrap.min'); ?>
        <?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true'); ?>
        <?= $this->Html->script('gmaps'); ?>
        <?= $this->Html->script('mustache'); ?>
        <?= $this->Html->script('bicis'); ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>

    <body>
        <div id="the-map" class="map-container">
            &nbsp;
        </div>

        <?= $this->element('add_issue'); ?>
        <?= $this->element('view_issue'); ?>
    </body>
</html>
