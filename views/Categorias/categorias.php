<?php getHeaderDashboard($data);
getModal('modals_categorias', $data);
?>
    <section class="section">
        <div class="section-header">
            <h1>Categorias </h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Categorias</h2>
            <p class="section-lead">Aqui encontrara una variedad de iconos con la biblioteca <a href="https://fontawesome.com/v5/search" target="_blank">FontAwesome v5 all</a></p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php  if ($_SESSION['permisos_modulo']['w']) {?>
                                <button id="openModal" type="button" class="btn btn-primary mb-3 btn-lg mb-3">Agregar <i class="fa fa-plus"></i></button>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table tableCategoria table-striped table-bordered dt-responsive nowrap"
                                           cellspacing="0" style="width:100%">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">NOMBRE CATEGORIA</th>
                                            <th scope="col">DESCRIPCION</th>
                                            <th scope="col">ICONO</th>
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
        </div>
    </section>
    <script type="text/javascript">

    </script>
<?php
getScriptsDashboard($data);