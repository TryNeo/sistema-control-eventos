<div class="modal fade" id="modalEvento" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Crear | Evento <i class="fa fa-plus"></i></h5>
        <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" id="fntEvento" method="post" role="form" novalidate="">
            <input type="hidden" id="id_evento" name="id_evento" value="">
            <div class="card-body-lg row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-book"></i>
                                </span>
                            </div>
                            <input type="text" name="nombre_evento" class="form-control" id="nombre_evento"  placeholder="ingrese el nombre del evento">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <i class="fab fa-accusoft"></i>
                                </span>
                            </div>
                            <input type="number" name="cupo" class="form-control" id="cupo"  placeholder="ingrese el cupo">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-palette"></i>            
                            </span>
                        </div>
                        <input type="color" name="color_evento" class="form-control colorpickerinput colorpicker-element" id="color_evento" >
                    </div>
                </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-stream"></i>
                                </span>
                            </div>
                            <select name="id_categoria" id="id_categoria" class="form-control" required>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <select name="id_invitado" id="id_invitado" class="form-control" required>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar-plus"></i>
                                </span>
                            </div>
                            <input type="text" name="fecha_evento_inicio" class="form-control datepicker" id="fecha_evento_inicio"  placeholder="fecha inicio del evento">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </span>
                            </div>
                            <input type="text" name="hora_evento_inicio" class="form-control timepicker" id="hora_evento_inicio"  placeholder="Hora inicio del evento">
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar-plus"></i>
                                </span>
                            </div>
                            <input type="text" name="fecha_evento_fin" class="form-control datepicker" id="fecha_evento_fin"  placeholder="fecha fin del evento">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </span>
                            </div>
                            <input type="text" name="hora_evento_fin" class="form-control timepicker" id="hora_evento_fin"  placeholder="Hora fin del evento">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4 is-valid"><span class="changeText">Crear </span><i class="fa fa-plus"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
