<?php getHeaderDashboard($data);
?>
<section class="section">
    <div class="section-header">
        <h1>Configuracion del sitio web | XenturionIT</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Sitio web</h2>
        <p class="section-lead">Aqui se realizara la configuracion basica en la pagina web <a href="<?php echo server_url; ?>" target="_blank">XenturionIT</a>, como el titulo de la web , informacion, imagenes etc</p>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" id="fntWebsitesetting" method="post" role="form" novalidate="">
                            <input type="hidden" id="id_website_setting" name="id_website_setting" value="<?php echo !empty($data['data_website']['id_website_setting'])?$data['data_website']['id_website_setting']:'' ?>">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titulo del sitio web</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-address-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo !empty($data['data_website']['website_title'])?$data['data_website']['website_title']:'' ?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripcion  del sitio web</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-address-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo !empty($data['data_website']['website_about'])?$data['data_website']['website_about']:'' ?>" >
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
getScriptsDashboard($data);
