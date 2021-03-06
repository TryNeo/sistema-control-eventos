<?php getHeaderDashboard($data); 
?>

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Usuarios</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $data["total_usuarios"]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                            </div>
                            <div class="card-wrap">
                            <div class="card-header">
                                <h4>Usuarios Online</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $data["total_usuarios_online"]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-person-booth"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Invitados</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $data["total_invitados"]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-dark">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Eventos</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $data["total_eventos"]; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="section-body">
    </div>
</section>
<?php 
getScriptsDashboard($data);