<div class="modal fade" id="modalPermiso"  role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Crear | Permiso  <i class="fa fa-plus"></i></h5>
        <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" id="fntPermiso" method="post" role="form" novalidate="">
            <input type="hidden" id="id_permiso" name="id_permiso" value="">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-users"></i>
                        </span>
                    </div>
                    <select name="id_rol" id="id_rol" class="form-control" required>
                    </select>
                </div>
            </div>
            <!--_---
            <div class="form-group">
                <select id="id_modulo" class="form-control select2"></select>
            </div>
            <table  class="table tableModulo table-striped table-bordered dt-responsive nowrap" cellspacing="0"  style="width:100%">
              <thead class="text-uppercase">
                <tr>
                  <th scope="col">ID</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>-->
            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4 is-valid"><span class="changeText">Crear </span><i class="fa fa-plus"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
