<script id="view-issue" type="x-tmpl-mustache">
    <div class="row">
        <div class="col-md-5">
            <div id="issue-marker-preview">
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
            <button type="button" class="btn btn-danger" onclick="voteIssue({{id}});">A favor <span class="badge">{{votes}}</span></button>
        </div>

        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-success">Resuelto <span class="badge">{{solved}}</span></button>
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