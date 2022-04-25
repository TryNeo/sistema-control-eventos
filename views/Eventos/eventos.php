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
                        <?php  if ($_SESSION['permisos_modulo']['w']) {?>
                            <button id="openModal" type="button" class="btn btn-primary mb-3 btn-lg mb-3">Agregar <i class="fa fa-plus"></i></button>
                        <?php } ?>
                        <div class="row">
                                <div class="col-md-12">
                                    <table class="table tableEvento table-striped table-bordered dt-responsive nowrap"
                                           cellspacing="0" style="width:100%">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">NOMBRE EVENTO</th>
                                            <th scope="col">CUPO</th>
                                            <th scope="col">FECHA Y HORA | INICIO</th>
                                            <th scope="col">FEHCA Y HORA | FIN</th>
                                            <th scope="col">CATEGORIA</th>
                                            <th scope="col">INVITADO</th>
                                            <th scope="col">CLAVE EVENTO</th>
                                            <th scope="col">ESTADO</th>
                                            <th scope="col">OPCIONES</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<?php
getScriptsDashboard($data);