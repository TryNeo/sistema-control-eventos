<div class="modal fade" id="modalInvitado" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Crear | Invitado <i class="fa fa-plus"></i></h5>
                <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="fntInvitado" method="post" role="form" novalidate="">
                    <input type="hidden" id="id_invitado" name="id_invitado" value="">
                    <div class="card-body-lg row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-address-book"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="nombre_invitado" class="form-control" id="nombre_invitado" placeholder="ingrese el nombre">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-address-book"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="apellido_invitado" class="form-control" id="apellido_invitado" placeholder="ingrese el apellido">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">

                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-link"></i>
                                    </span>
                                </div>
                                <input type="url" name="url_imagen" pattern="https://.*" class="form-control" id="url_imagen" placeholder="url de la foto">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">

                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fab fa-facebook"></i>
                                    </span>
                                </div>
                                <input type="url" name="facebook" pattern="https://.*" class="form-control" id="facebook" placeholder="link de facebook">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">

                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fab fa-twitter"></i>
                                    </span>
                                </div>
                                <input type="url" name="twitter" pattern="https://.*" class="form-control" id="twitter" placeholder="link de twitter">
                            </div>
                        </div>


                        <div class="col-md-12 mb-3">

                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fab fa-linkedin"></i>
                                    </span>
                                </div>
                                <input type="url" name="linkedin" pattern="https://.*" class="form-control" id="linkedin" placeholder="link de linkedin">
                            </div>
                        </div>


                        <div class="col-md-12 mb-3">

                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fab fa-instagram"></i>
                                    </span>
                                </div>
                                <input type="url" name="instagram" id="instagram" pattern="https://.*" class="form-control"  placeholder="link de instagram">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <textarea name="descripcion" cols="40" rows="2" maxlength="250" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 100px;" placeholder="ingrese la descripcion" id="descripcion"></textarea>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4 is-valid"><span class="changeText">Crear </span><i class="fa fa-plus"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>