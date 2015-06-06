<script id="view-issue" type="x-tmpl-mustache">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detalles Incidencia</h4>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-md-5">
                <div class="issue-map-content">
                    <div class="gmap" id="issue-marker-preview">
                    </div>
                </div>

                <div>
                    <p>
                        {{#image}}
                            <p>
                                <a href="<?= $this->Url->build('/files/issues/', true); ?>{{image}}" target="_blank" title="Click para ver en tamaño completo">
                                    <img src="<?= $this->Url->build('/files/issues/', true); ?>{{image}}" class="issue-image" />
                                </a>
                            </p>
                        {{/image}}
                    </p>
                </div>
            </div>

            <div class="col-md-7 text-left">
                <p>{{description}}</p>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <div class="row">
            <div class="col-md-6 text-left">
                <button type="button" class="btn btn-success" onclick="agreeIssue({{id}});">A favor <span class="badge">{{agree}}</span></button>
            </div>

            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-info" onclick="solveIssue({{id}});">Resuelto <span class="badge">{{solved}}</span></button>
            </div>
        </div>
    </div>
</script>

<div class="modal fade bs-example-modal-md view-issue">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        </div>
    </div>
</div>