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
        <?= $this->Html->css('sudo'); ?>
        <?= $this->Html->css('left-menu'); ?>
        <?= $this->Html->css('bootstrap-switch'); ?>

        <?= $this->Html->script('jquery-1.11.3.min'); ?>
        <?= $this->Html->script('bootstrap.min'); ?>
        <?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true'); ?>
        <?= $this->Html->script('gmaps'); ?>
        <?= $this->Html->script('mustache'); ?>
        <?= $this->Html->script('bootstrap-switch'); ?>
        <?= $this->Html->script('bicis'); ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>

    <body>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="left-menu">
            <div class="row">
                <div class="col-md-12">
                    <p>&nbsp;</p>
                    <p class="text-center">
                        <?= $this->Html->image('logo.png', ['class' => 'logo', 'width' => '100', 'onclick' => 'toggleMenu();', 'title' => 'Click para cerrar panel']); ?>
                    </p>

                    <hr />

                    <div class="menu-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><i class="circle-1">●</i> Carril Bici</label> <br />
                                    <input type="checkbox" checked class="bootstrap-switch type-1">
                                </div>

                                <div class="form-group">
                                    <label><i class="circle-2">●</i> Pista Bici</label><br />
                                    <input type="checkbox" checked class="bootstrap-switch type-2">
                                </div>

                                <div class="form-group">
                                    <label><i class="circle-3">●</i> Acera Bici</label><br />
                                    <input type="checkbox" checked class="bootstrap-switch type-3">
                                </div>

                                <div class="form-group">
                                    <label><i class="circle-4">●</i> Senda Bici</label><br />
                                    <input type="checkbox" checked class="bootstrap-switch type-4">
                                </div>

                                <p>&nbsp;</p>

                                <div class="form-group">
                                    <label><i class="circle-x">●</i> Mostrar Incidencias</label><br />
                                    <input type="checkbox" checked class="bootstrap-switch do-markers">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <?= $this->Html->image('eye.png', ['width' => '50', 'class' => 'menu-icon', 'onclick' => 'toggleMenu();']); ?>
        <?= $this->Html->image('info-icon.png', ['width' => '50', 'class' => 'info-icon', 'onclick' => 'showInfo();']); ?>

        <div id="the-map" class="map-container">
            &nbsp;
        </div>

        <?= $this->element('add_issue'); ?>
        <?= $this->element('view_issue'); ?>
        <?= $this->element('info'); ?>
    </body>
</html>
