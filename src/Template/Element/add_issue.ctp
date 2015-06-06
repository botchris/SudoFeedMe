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
</div>