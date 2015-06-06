<script id="view-issue" type="x-tmpl-mustache">
    <div class="row">
        <div class="col-md-5">
            <div class="issue-map-content">
                <div class="gmap" id="issue-marker-preview">
                </div>
            </div>

            <div>
                <p>
                    {{#image}}
                        <?= $this->Html->image('/files/issues/{{image}}', ['class' => 'issue-image', 'escape' => false]); ?>
                    {{/image}}
                </p>
            </div>
        </div>

        <div class="col-md-7 text-left">
            <p>{{description}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 text-left">
            <button type="button" class="btn btn-success" onclick="voteIssue({{id}});">A favor <span class="badge">{{agree}}</span></button>
        </div>

        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-info" onclick="solveIssue({{id}});">Resuelto <span class="badge">{{solved}}</span></button>
        </div>
    </div>
</script>

<div class="modal fade bs-example-modal-md view-issue">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles Incidencia</h4>
            </div>

            <div class="modal-body">
            </div>
        </div>
    </div>
</div>