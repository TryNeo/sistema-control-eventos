<div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Crear | Categoria  <i class="fa fa-plus"></i></h5>
        <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" id="fntCategoria" method="post" role="form" novalidate="">
            <input type="hidden" id="id_categoria" name="id_categoria" value="">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-address-book"></i>
                        </span>
                    </div>
                    <input type="text" name="nombre_categoria" class="form-control" id="nombre_categoria"  placeholder="ingrese la categoria">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="fas fa-icons"></i>
                        </span>
                    </div>
                    <input type="text" name="icono" class="form-control" id="icono"  placeholder="ingrese el icono">
                </div>
            </div>
            <div class="form-group">
                <textarea name="descripcion" cols="40" rows="2" maxlength="250" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 100px;" placeholder="ingrese la descripcion" id="descripcion"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4 is-valid"><span class="changeText">Crear </span><i class="fa fa-plus"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
