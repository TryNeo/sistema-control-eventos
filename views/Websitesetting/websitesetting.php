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
                        <h4>Sitio web</h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse">
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
                    <div class="collapse show" id="contact-collapse">
                        <div class="card-body">
                        <form class="needs-validations" id="fntContactsetting" method="post" role="form" novalidate="">
                                <input type="hidden" id="id_contact_setting" name="id_contact_setting" value="">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Titulo del Contacto</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-address-book"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="contact_title" class="form-control" id="contact_title" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Direcci??n de Contacto</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-map"></i>
                                                    </span>
                                            </div>
                                            <input type="text" name="contact_address" class="form-control" id="contact_address" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tel??fono de Contacto</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-phone"></i>
                                                    </span>
                                            </div>
                                            <input type="text" name="contact_phone" class="form-control" id="contact_phone" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email de Contacto</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-at"></i>
                                                    </span>
                                            </div>
                                            <input type="text" name="contact_email" class="form-control" id="contact_email" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Horario de Atenci??n</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </span>
                                            </div>
                                            <input type="text" name="contact_schedule" class="form-control" id="contact_schedule" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Google Map</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                        </span>
                                            </div>
                                            <input type="text" name="google_map" class="form-control" id="google_map" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="fab fa-facebook"></i>
                                                            </span>
                                            </div>
                                            <input type="text" name="facebook" class="form-control" id="facebook" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fab fa-twitter"></i>
                                                                </span>
                                            </div>
                                            <input type="text" name="twitter" class="form-control" id="twitter" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Linkedin</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="fab fa-linkedin"></i>
                                                            </span>
                                            </div>
                                            <input type="text" name="linkedin" class="form-control" id="linkedin" value="">
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="fab fa-instagram"></i>
                                                            </span>
                                        </div>
                                        <input type="text" name="instagram" class="form-control" id="instagram" value="">
                                    </div>
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
        </div>
    </div>
</section>
<?php
getScriptsDashboard($data);
