</div>
</div>
</div>

    
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script src="<?php echo server_url; ?>/assets/libs/stisla/assets/js/stisla.js"></script>
    <script src="<?php echo server_url; ?>/assets/libs/stisla/assets/js/scripts.js"></script>
    <script src="<?php echo server_url; ?>/assets/libs/stisla/assets/js/custom.js"></script>
    <script src="<?php echo server_url; ?>/assets/js/functions_principales.js"></script>
    <?php if(isset($data['page'])) {?>
        <?php if ($data['page'] == 'roles') { ?>
            <script type="text/javascript" src="<?php echo server_url; ?>assets/js/functions_rol.js"></script>
        <?php } ?>
    <?php }else {?>
    <?php } ?>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

</body>
</html>
