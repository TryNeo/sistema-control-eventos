<?php getHeaderDashboard($data);
?>
    <section class="section">
        <div class="section-header">
            <h1>Respaldos</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php  if ($_SESSION['permisos_modulo']['w']) {?>
                                <button id="backupbd" type="button" class="btn btn-primary mb-3 btn-lg mb-3">Realizar copia de seguridad <i class="fa fa-plus"></i></button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header text-size">
                        <i  class="fa fa-database" aria-hidden="true"></i>&nbspListado de las copias de la base de datos
                        </div>
                        <div class="card-body">
                            <table class="table tableRespaldo table-striped table-bordered dt-responsive nowrap" cellspacing="0"  style="width:100%">
                                <thead>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header text-size">
                        <i class="fas fa-paste"></i>&nbspInformación para la restauración de la base de datos 
                        </div>
                        <div class="card-body">
                        <p>
                            <b>Antes de realizar la restauración de la base de datos, asegúrese de que haya echo
                            una copia.</b>
                            </br>
                            </br>
                            Pasos para una buena restauración:
                            <ol>
                                <li>Realice la copia respectiva</li>
                                <li>Asegúrese de que la copia este visible en la tabla</li>
                                <li>Identifiqué la copia respectiva y seleccioné la opción restaurar</li>
                                <li>Y listo la copia sé de haber restaurado exitosamente</li>
                            </ol>
                            Pasos para una eliminación exitosa:
                            <ol>
                            </br>
                                <li>Seleccioné una de las copias en la respectiva tabla</li>
                                <li>Seleccioné la opción de eliminar</li>
                                <li>Y listo la copia sé de haber eliminado exitosamente</li>
                            </ol>
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">

    </script>
<?php
getScriptsDashboard($data);