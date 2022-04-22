<?php getHeaderDashboard($data);
    getModal('modals_eventos', $data);
?>
    <section class="section">
        <div class="section-header">
            <h1>Eventos</h1>
        </div>
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <button id="openModal" type="button" class="btn btn-primary mb-3 btn-lg mb-3">Agregar <i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<?php
getScriptsDashboard($data);