<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sudo Feed Me</title>

        <script type="text/javascript">
            var dataSource = '<?= $this->Url->build(['controller' => 'Index', 'action' => 'lines']); ?>';
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

                    <div class="modal-body container-fluid">
						<div class="row">
							<div class="col-md-5">
								<div class="issue-map-content">
									<div id="issue-map"></div>
								</div>
							</div>
							<div class="col-md-7">
								<?= $this->Form->create(null); ?>
									<p><?= $this->Form->input('description', ['type' => 'textarea', 'label' => 'Descripción *', 'class' => 'form-control']); ?></p>
									<p class="help-block">Si lo deseas, puedes añadir una foto de la incidencia:</p>
									<p><?= $this->Form->file('image', ['label' => 'Imágen', 'class' => '']); ?></p>
								<?= $this->Form->end(); ?>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
