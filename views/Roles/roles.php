<?php getHeaderDashboard($data); 
    getModal('modals_roles',$data);
?>    

<section class="section">
    <div class="section-header">
        <h1>Roles</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button id="openModal" type="button"  class="btn btn-primary mb-3 btn-lg mb-3">Agregar <i class="fa fa-plus"></i>
                        </button>
                        <div class="col-12">
                            <table  class="table tableRol table-striped first display responsive" cellspacing="0"  style="width:100%">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">ROL</th>
                                        <th scope="col">DESCRIPCION</th>
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