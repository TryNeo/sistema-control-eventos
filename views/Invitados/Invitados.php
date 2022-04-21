<?php getHeaderDashboard($data);
getModal('modals_invitados', $data);
?>
    <section class="section">
        <div class="section-header">
            <h1>Invitados</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Invitados</h2>
            <p class="section-lead">Aqui en esta pagina web, podra subir las fotos de los invitados y obtener la respectiva url <a href="https://imgur.com/upload" target="_blank">Imgur</a></p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <button id="openModal" type="button" class="btn btn-primary mb-3 btn-lg mb-3">Agregar <i class="fa fa-plus"></i></button>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table tableInvitado table-striped table-bordered dt-responsive nowrap"
                                           cellspacing="0" style="width:100%">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">NOMBREs</th>
                                            <th scope="col">APELLIDOS</th>
                                            <th scope="col">DESCRIPCION</th>
                                            <th scope="col">IMAGEN</th>
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