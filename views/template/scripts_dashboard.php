</div>
</div>
</div>

    
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@emretulek/jbvalidator"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/i18n/es.js"></script>
    
    <script src="<?php echo server_url; ?>/assets/libs/stisla/assets/js/stisla.js"></script>
    <script src="<?php echo server_url; ?>/assets/libs/stisla/assets/js/scripts.js"></script>
    <script src="<?php echo server_url; ?>/assets/libs/stisla/assets/js/custom.js"></script>
    <script src="<?php echo server_url; ?>/assets/js/functions_principales.js"></script>

    <?php if(isset($data['page'])) {?>
        <?php if ($data['page'] == 'roles') { ?>
            <script type="text/javascript" src="<?php echo server_url; ?>assets/js/functions_rol.js"></script>
        <?php } ?>
        <?php if ($data['page'] == 'permisos') { ?>
            <script type="text/javascript" src="<?php echo server_url; ?>assets/js/functions_permisos.js"></script>
        <?php } ?>
        <?php if ($data['page'] == 'categorias') { ?>
            <script type="text/javascript" src="<?php echo server_url; ?>assets/js/functions_categoria.js"></script>
        <?php } ?>
        <?php if ($data['page'] == 'invitados') { ?>
            <script type="text/javascript" src="<?php echo server_url; ?>assets/js/functions_invitado.js"></script>
        <?php } ?>
    <?php }else {?>
    <?php } ?>

    <script src="<?php echo server_url; ?>/assets/libs/datatables/datatables.min.js"></script>
    <!--<script src="/assets/libs/datatables/DataTables-1.10.16/js/dataTables.boostrap4.min.js"></script>-->
    
</body>
</html>
