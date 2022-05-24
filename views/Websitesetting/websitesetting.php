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
                            <input type="hidden" id="id_website_setting" name="id_website_setting" value="">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titulo del sitio web</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-address-book"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="website_name" class="form-control" id="website_name" value="" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripcion  del sitio web</label>
                                    <textarea name="website_about" cols="40" rows="2" maxlength="250" class="form-control" 
                                        style="margin-top: 0px; margin-bottom: 0px; height: 100px;" id="website_about"></textarea>
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
