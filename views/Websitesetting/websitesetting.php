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
                    <div class="card-header">
                        <h4>Previsualizacion del logo | favicon </h4>
                    </div>
                    <div class="card-body">
                        d
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Previsualizacion del google maps </h4>
                    </div>
                    <div class="card-body">
                        d
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Sitio web</h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse" id="mycard-collapse">
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
                                            <input type="text" name="website_title" class="form-control" id="website_title" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Logo sito web</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-image"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="website_image" class="form-control" id="website_image" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Favicon sito web</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-icons"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="website_favicon" class="form-control" id="website_favicon" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Experiencia sito web</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-award"></i>
                                                </span>
                                            </div>
                                            <input type="number" name="website_expirience" class="form-control" id="website_expirience" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Clientes sito web</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="number" name="website_clients" class="form-control" id="website_clients" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Proyectos sito web</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-project-diagram"></i>
                                                </span>
                                            </div>
                                            <input type="number" name="website_proyects" class="form-control" id="website_proyects" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sobre Nosotros sito web</label>
                                        <textarea name="website_about" cols="40" rows="2" maxlength="350" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 100px;" id="website_about"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger mt-4 pr-4 pl-4 is-valid">
                                    <span class="changeText">Guardar </span><i class="fa fa-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Configuracion Contacto</h4>
                        <div class="card-header-action">
                            <a data-collapse="#contact-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse" id="contact-collapse">
                        <div class="card-body">
                            example
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php
getScriptsDashboard($data);
