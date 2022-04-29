<div class="modal fade" id="modalBancaria" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Crear | Cuenta Bancaria <i class="fa fa-plus"></i></h5>
                <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="fntBancaria" method="post" role="form" novalidate="">
                    <input type="hidden" id="id_bancaria" name="id_bancaria" value="">
                    <div class="card-body-lg row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-university"></i>
                                </span>
                                    </div>
                                    <input type="text" name="nombre_banco" class="form-control" id="nombre_banco"  placeholder="ingrese el nombre del banco">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-clipboard-list"></i>
                                </span>
                                    </div>
                                    <input type="text" name="nro_cuenta" class="form-control" id="nro_cuenta"  placeholder="ingrese el número de cuenta">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-address-card"></i>
                                </span>
                                    </div>
                                    <input type="text" name="ced_ruc" class="form-control" id="ced_ruc"  placeholder="ingrese la identificacion del propietario">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-piggy-bank"></i>
                                </span>
                                    </div>
                                    <!--                                    <input type="text" name="tipo" class="form-control" id="tipo"  placeholder="ingrese el tipo de cuenta">-->
                                    <select name="tipo" id="tipo" class="form-control">
                                        <option  selected disabled='disabled' value=''>Seleccione tipo de cuenta</option>
                                        <option value="1">Ahorro</option>
                                        <option value="2">Corriente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </span>
                                    </div>
                                    <input type="text" name="email" class="form-control" id="email"  placeholder="ingrese el email">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <textarea name="descripcion" cols="40" rows="2" maxlength="250" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 100px;" placeholder="ingrese la descripcion" id="descripcion"></textarea>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4 is-valid"><span
                                class="changeText">Crear </span><i class="fa fa-plus"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
