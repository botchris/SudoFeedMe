<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sudo Feed Me</title>

        <script type="text/javascript">
            var dataSource = '<?= $this->Url->build(['controller' => 'Index', 'action' => 'lines']); ?>';
            var map;
            var lines;
        </script>

        <?= $this->Html->css('bootstrap.min'); ?>
        <?= $this->Html->css('bootstrap-theme.min'); ?>
        <?= $this->Html->css('sudo.css'); ?>

        <?= $this->Html->script('jquery-1.11.3.min'); ?>
        <?= $this->Html->script('bootstrap.min'); ?>
        <?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true'); ?>
        <?= $this->Html->script('gmaps'); ?>
        <?= $this->Html->script('bicis'); ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>

    </head>

    <body>
        <div id="the-map" class="map-container">
            &nbsp;
        </div>

        <div class="modal fade bs-example-modal-lg create-issue">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Registrar Incidencia</h4>
                    </div>

                    <div class="modal-body">
                        <div id="issue-map"></div>
                        <?= $this->Form->create(null); ?>
                            <?= $this->Form->input('description', ['label' => 'Descripción', 'class' => 'form-control']); ?>
                            <?= $this->Form->file('image', ['label' => 'Imágen', 'class' => 'form-control']); ?>
                        <?= $this->Form->end(); ?>
                    </div>
            </div>
        </div>
    </body>
</html>
