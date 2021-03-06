<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>XenturionIT | Eventos </title>

        <link rel="icon" type="image/png" href="<?php echo $data['page_info']['website_favicon'] ? $data['page_info']['website_favicon'] : '#'  ?>" sizes="16x16" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

        <link href="<?php echo server_url; ?>assets/page/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo server_url; ?>assets/page/css/bootstrap-icons.css" rel="stylesheet">

        <link href="<?php echo server_url; ?>assets/page/css/templatemo-leadership-event.css" rel="stylesheet">

        <link href="<?php echo server_url; ?>assets/page/css/styles.css" rel="stylesheet">
    </head>
    
    <body>

        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a href="<?php echo server_url; ?>" class="navbar-brand mx-auto mx-lg-0">
                    <img src="<?php echo $data['page_info']['website_image'] ? $data['page_info']['website_image'] : '#'  ?>" alt="logo" width="200" class="shadow-light imgxen">
                </a>

                <a class="nav-link custom-btn btn d-lg-none" href="#">Buy Tickets</a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">??Qui??nes Somos?</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Invitados</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Horarios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Precios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">Lugar de Eventos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_7">Cont??ctanos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link custom-btn btn d-none d-lg-block" href="#">Buy Tickets</a>
                        </li>
                    </ul>
                <div>
                        
            </div>
        </nav>

        <main>

            <section class="hero" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12 m-auto">
                            <div class="hero-text">
                                <h1 class="text-white mb-4"><u class="text-info"><?php echo $data['page_info']['website_title'] ? $data['page_info']['website_title'] : ''  ?></u> <?php echo date("Y");?></h1>
                                <a href="#section_2" class="custom-link bi-arrow-down arrow-icon"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                        <source src="<?php echo server_url; ?>/assets/page/videos/pexels-pavel-danilyuk-8716790.mp4" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                </div>
            </section>

            <section class="about section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h2 class="mb-4">Sobre <u class="text-info">nosotros</u></h2>
                        </div>

                        <div class="col-lg-6 col-12">
                            <h3 class="mb-3">La importancia de la Empresa XenturionIT</h3>

                            <p>
                                <?php echo $data['page_info']['website_about'] ? $data['page_info']['website_about'] : 'No hay informacion disponible aun'  ?>
                            ???</p>

                            <a class="custom-btn custom-border-btn btn custom-link mt-3 me-3" href="#section_3">Invitados</a>

                            <a class="custom-btn btn custom-link mt-3" href="#section_4">Ve nuestros Horarios</a>
                        </div>

                        <div class="col-lg-6 col-12 mt-5 mt-lg-0 contador">
                            <ul>
                                <li data-count="<?php echo $data['page_info']['website_expirience'] ? $data['page_info']['website_expirience'] : '0'  ?>">
                                    <i class="bi bi-calendar"></i>
                                    <i class="fa fa-code"></i>
                                    <span>0</span>
                                    <p>A??os de Experiencia</p>
                                </li>
                                <li data-count="<?php echo $data['page_info']['website_clients'] ? $data['page_info']['website_clients'] : '0'  ?>">
                                    <i class="bi bi-people-fill"></i>
                                    <i class="fa fa-code"></i>
                                    <span>0</span>
                                    <p>Clientes Satisfechos</p>
                                </li>
                                <li data-count="<?php echo $data['page_info']['website_proyects'] ? $data['page_info']['website_proyects'] : '0'  ?>">
                                    <i class="bi bi-boxes"></i>
                                    <i class="fa fa-code"></i>
                                    <span>0</span>
                                    <p>Proyectos Exitosos</p>
                                </li>
                            </ul>

                            <div class="avatar-group border-top py-5 mt-5">
                                <?php if(count($data['home_usuarios']) > 0) {?>
                                    <?php foreach($data['home_usuarios'] as $key=>$value){ ?>
                                    <img src="<?php echo $data['home_usuarios'][$key]['foto']; ?>" class="img-fluid avatar-image avatar-image-left" alt="">
                                    <?php } ?>
                                    <p class="d-inline"><?php echo count($data['home_usuarios']); ?> + personas est?? asistiendo con nosotros</p>
                                <?php }else {?>
                                    <img src="<?php echo server_url_image; ?>default.png" class="img-fluid avatar-image" alt="">
                                    <img src="<?php echo server_url_image; ?>default.png" class="img-fluid avatar-image avatar-image-left" alt="">
                                    <p class="d-inline"> 0+ personas est?? asistiendo con nosotros</p>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="speakers section-padding" id="section_3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 d-flex flex-column justify-content-center align-items-center">
                            <div class="speakers-text-info text-center">
                                <h2 class="mb-4">Nuestos <u class="text-info">Invitados</u></h2>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut dolore</p>
                                <a class="custom-btn custom-border-btn btn custom-link mt-3 me-3" href="#">Mas informacion</a>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <?php foreach($data['home_invitados'] as $key=>$value){ ?>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="speakers-thumb speakers-thumb-small">
                                            <img src="<?php echo $value['url_imagen']; ?>" class="img-fluid speakers-image" alt="imagen">
                                            <div class="speakers-info">
                                                <h5 class="speakers-title mb-0"><?php echo $value['nombre_invitado']; ?> <?php echo $value['apellido_invitado']; ?></h5>
                                                <p class="speakers-text mb-0">Event Planner</p>
                                                <ul class="social-icon">
                                                    <?php if (!empty($value['facebook'])) { ?>
                                                        <li><a href="<?php echo $value['facebook'] ? $value['facebook'] : '#' ?>" target="_blank" class="social-icon-link bi-facebook"></a></li>
                                                    <?php } ?>
                                                    <?php if (!empty($value['twitter'])) { ?>
                                                        <li><a href="<?php echo $value['twitter'] ? $value['twitter'] : '#' ?>" target="_blank" class="social-icon-link bi-twitter"></a></li>
                                                    <?php } ?>
                                                    <?php if (!empty($value['linkedin'])) { ?>
                                                        <li><a href="<?php echo $value['linkedin'] ? $value['linkedin'] : '#' ?>" target="_blank" class="social-icon-link bi-linkedin"></a></li>
                                                    <?php } ?>
                                                    <?php if (!empty($value['instagram'])) { ?>
                                                        <li><a href="<?php echo $value['instagram'] ? $value['instagram'] : '#' ?>" target="_blank" class="social-icon-link bi-instagram"></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="schedule section-padding" id="section_4">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h2 class="mb-5 text-center">Next <u class="text-info">Schedules</u></h2>

                            <nav>
                                <div class="nav nav-tabs align-items-baseline" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-DayOne-tab" data-bs-toggle="tab" data-bs-target="#nav-DayOne" type="button" role="tab" aria-controls="nav-DayOne" aria-selected="true">
                                        <h3>
                                            <span>Day One</span>
                                            <small>July 12, 2022</small>
                                        </h3>
                                    </button>

                                    <button class="nav-link" id="nav-DayTwo-tab" data-bs-toggle="tab" data-bs-target="#nav-DayTwo" type="button" role="tab" aria-controls="nav-DayTwo" aria-selected="false">
                                        <h3>
                                            <span>Day Two</span>
                                            <small>July 14, 2022</small>
                                        </h3>
                                    </button>

                                    <button class="nav-link" id="nav-DayThree-tab" data-bs-toggle="tab" data-bs-target="#nav-DayThree" type="button" role="tab" aria-controls="nav-DayThree" aria-selected="false">
                                        <h3>
                                            <span>Day Three</span>
                                            <small>July 16, 2022</small>
                                        </h3>
                                    </button>

                                    <button class="nav-link" id="nav-DayFour-tab" data-bs-toggle="tab" data-bs-target="#nav-DayFour" type="button" role="tab" aria-controls="nav-DayFour" aria-selected="false">
                                        <h3>
                                            <span>Day Four</span>
                                            <small>July 18, 2022</small>
                                        </h3>
                                    </button>
                                </div>
                            </nav>

                            <div class="tab-content mt-5" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-DayOne" role="tabpanel" aria-labelledby="nav-DayOne-tab">
                                    <div class="row border-bottom pb-5 mb-5">
                                        <div class="col-lg-4 col-12">
                                            <img src="<?php echo server_url; ?>/assets/page/images/schedule/fabian-friedrich-JDUVM9_VaZE-unsplash.jpg" class="schedule-image img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                            
                                            <h4 class="mb-2">Startup Development Ideas</h4>

                                            <p>You are free to download any HTML CSS template from TemplateMo website. You can use any template for business purposes. You are not allowed to redistribute the downloadable ZIP file on any other template website. Thank you.</p>

                                            <div class="d-flex align-items-center mt-4">
                                                <div class="avatar-group d-flex">
                                                    <img src="<?php echo server_url; ?>/assets/page/images/avatar/happy-asian-man-standing-with-arms-crossed-grey-wall.jpg" class="img-fluid avatar-image" alt="">

                                                    <div class="ms-3">
                                                        Logan Wilson
                                                        <p class="speakers-text mb-0">CEO / Founder</p>
                                                    </div>
                                                </div>

                                                <span class="mx-3 mx-lg-5">
                                                    <i class="bi-clock me-2"></i>
                                                    9:00 - 9:45 AM
                                                </span>

                                                <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    Conference Hall 3
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row border-bottom pb-5 mb-5">
                                        <div class="col-lg-4 col-12">
                                            <img src="<?php echo server_url; ?>/assets/page/images/schedule/clayton-cardinalli-JMoFpdqL3XM-unsplash.jpg" class="schedule-image img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                            <h4 class="mb-2">Introduction to Online Businesses</h4>

                                            <p>Quisque mollis, ante non semper ultricies, nulla sapien sollicitudin augue, id scelerisque nunc turpis nec urna. Class aptent taciti sociosqu ad litora.</p>

                                            <div class="d-flex align-items-center mt-4">
                                                <div class="avatar-group d-flex">
                                                    <img src="<?php echo server_url; ?>/assets/page/images/avatar/portrait-good-looking-brunette-young-asian-woman.jpg" class="img-fluid avatar-image" alt="">

                                                    <div class="ms-3">
                                                    Natalie
                                                    <p class="speakers-text mb-0">Event Planner</p>
                                                </div>
                                                </div>

                                                <span class="mx-3 mx-lg-5">
                                                    <i class="bi-clock me-2"></i>
                                                    10:00 - 10:45 AM
                                                </span>

                                                <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    100-D Room
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <img src="<?php echo server_url; ?>/assets/page/images/schedule/business-woman-making-presentation-office.jpg" class="schedule-image img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                            <h4 class="mb-2">Bootstrapping Startup</h4>

                                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut consequat purus posuere tortor efficitur, sit amet dignissim libero aliquam.</p>

                                            <div class="d-flex align-items-center mt-4">
                                                <div class="avatar-group d-flex">
                                                    <img src="<?php echo server_url; ?>/assets/page/images/avatar/senior-man-white-sweater-eyeglasses.jpg" class="img-fluid avatar-image" alt="">

                                                    <div class="ms-3">
                                                    Thomas
                                                    <p class="speakers-text mb-0">Startup Coach</p>
                                                </div>
                                                </div>

                                                <span class="mx-3 mx-lg-5">
                                                    <i class="bi-clock me-2"></i>
                                                    11:00 - 11:45 AM
                                                </span>

                                                <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    100-B Room
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-DayTwo" role="tabpanel" aria-labelledby="nav-DayTwo-tab">
                                    <div class="row border-bottom pb-5 mb-5">
                                        <div class="col-lg-4 col-12">
                                            <img src="<?php echo server_url; ?>/assets/page/images/schedule/people-smiling-while-conference-room.jpg" class="schedule-image img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                            
                                            <h4 class="mb-2">Building a famous company</h4>

                                            <p>Quisque mollis, ante non semper ultricies, nulla sapien sollicitudin augue, id scelerisque nunc turpis nec urna. Class aptent taciti sociosqu ad litora torquent per conubia.</p>

                                            <div class="d-flex align-items-center mt-4">
                                                <div class="avatar-group d-flex">
                                                    <img src="<?php echo server_url; ?>/assets/page/images/avatar/pretty-smiling-joyfully-female-with-fair-hair-dressed-casually-looking-with-satisfaction.jpg" class="img-fluid avatar-image" alt="">

                                                    <div class="ms-3">
                                                        Isabella
                                                        <p class="speakers-text mb-0">Event Manager</p>
                                                    </div>
                                                </div>

                                                <span class="mx-3 mx-lg-5">
                                                    <i class="bi-clock me-2"></i>
                                                    9:00 - 9:45 AM
                                                </span>

                                                <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    Conference Hall 2
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <img src="<?php echo server_url; ?>/assets/page/images/schedule/jason-goodman-bzqU01v-G54-unsplash.jpg" class="schedule-image img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                            <h4 class="mb-2">Dev Ops life in corporate</h4>

                                            <p>Quisque mollis, ante non semper ultricies, nulla sapien sollicitudin augue, id scelerisque nunc turpis nec urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>

                                            <div class="d-flex align-items-center mt-4">
                                                <div class="avatar-group d-flex">
                                                    <img src="<?php echo server_url; ?>/assets/page/images/avatar/indoor-shot-beautiful-happy-african-american-woman-smiling-cheerfully-keeping-her-arms-folded-relaxing-indoors-after-morning-lectures-university.jpg" class="img-fluid avatar-image" alt="">

                                                    <div class="ms-3">
                                                    Samantha
                                                    <p class="speakers-text mb-0">Top Level Speaker</p>
                                                </div>
                                                </div>

                                                <span class="mx-3 mx-lg-5">
                                                    <i class="bi-clock me-2"></i>
                                                    10:00 - 10:45 AM
                                                </span>

                                                <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    100-A Room
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-DayThree" role="tabpanel" aria-labelledby="nav-DayThree-tab">
                                    <div class="row border-bottom pb-5 mb-5">
                                        <div class="col-lg-4 col-12">
                                            <img src="<?php echo server_url; ?>/assets/page/images/schedule/people-smiling-while-conference-room.jpg" class="schedule-image img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                            
                                            <h4 class="mb-2">Maintaining a successful business</h4>

                                            <p>Quisque mollis, ante non semper ultricies, nulla sapien sollicitudin augue, id scelerisque nunc turpis nec urna. Class aptent taciti sociosqu.</p>

                                            <div class="d-flex align-items-center mt-4">
                                                <div class="avatar-group d-flex">
                                                    <img src="<?php echo server_url; ?>/assets/page/images/avatar/pretty-smiling-joyfully-female-with-fair-hair-dressed-casually-looking-with-satisfaction.jpg" class="img-fluid avatar-image" alt="">

                                                    <div class="ms-3">
                                                        Isabella
                                                        <p class="speakers-text mb-0">Event Manager</p>
                                                    </div>
                                                </div>

                                                <span class="mx-3 mx-lg-5">
                                                    <i class="bi-clock me-2"></i>
                                                    9:00 - 9:45 AM
                                                </span>

                                                <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    Conference Hall 1
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <img src="<?php echo server_url; ?>/assets/page/images/schedule/jason-goodman-bzqU01v-G54-unsplash.jpg" class="schedule-image img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                            <h4 class="mb-2">Working Life in Corporate Environment</h4>

                                            <p>Quisque mollis, ante non semper ultricies, nulla sapien sollicitudin augue, id scelerisque nunc turpis nec urna.</p>

                                            <div class="d-flex align-items-center mt-4">
                                                <div class="avatar-group d-flex">
                                                    <img src="<?php echo server_url; ?>/assets/page/images/avatar/indoor-shot-beautiful-happy-african-american-woman-smiling-cheerfully-keeping-her-arms-folded-relaxing-indoors-after-morning-lectures-university.jpg" class="img-fluid avatar-image" alt="">

                                                    <div class="ms-3">
                                                    Samantha
                                                    <p class="speakers-text mb-0">Top Level Speaker</p>
                                                </div>
                                                </div>

                                                <span class="mx-3 mx-lg-5">
                                                    <i class="bi-clock me-2"></i>
                                                    10:00 - 10:45 AM
                                                </span>

                                                <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    100-C Room
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-DayFour" role="tabpanel" aria-labelledby="nav-DayFour-tab">
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <img src="<?php echo server_url; ?>/assets/page/images/schedule/jeshoots-com-TWRCH-GaKr4-unsplash.jpg" class="schedule-image img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                            <h4 class="mb-2">After Party at the fullest</h4>

                                            <p>There is a plenty of great HTML CSS templates available at TemplateMo.com website for your businesses. You can download, edit and use any template for any purpose. Please let us know <a rel="nofollow" href="https://templatemo.com/contact" target="_parent"><u>your feedback via Email</u></a>. Thank you.</p>

                                            <div class="d-flex align-items-center mt-4">

                                                <span>
                                                    <i class="bi-clock me-2"></i>
                                                    8:00 - 9:00 AM
                                                </span>

                                                <span class="mx-1 mx-lg-5">
                                                    <i class="bi-layout-sidebar me-2"></i>
                                                    Conference Hall 2
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="call-to-action section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-7 col-12">
                            <h2 class="text-white mb-4">Become an <u class="text-info">event speaker?</u></h2>

                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut dolore</p>
                        </div>

                        <div class="col-lg-3 col-12 ms-lg-auto mt-4 mt-lg-0">
                            <a href="#section_5" class="custom-btn btn">Register Today</a>
                        </div>

                    </div>
                </div>
            </section>

            <section class="pricing section-padding" id="section_5">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 text-center mx-auto mb-5">
                            <h2>Get Your <u class="text-info">Tickets</u></h2>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12 mb-5 mb-lg-0">
                            <div class="pricing-thumb bg-white shadow-lg">                                
                                <div class="pricing-title-wrap d-flex align-items-center">

                                    <h4 class="pricing-title text-white mb-0">Early Bird</h4>

                                    <h5 class="pricing-small-title text-white mb-0 ms-auto">$640</h5>
                                </div>

                                <div class="pricing-body">
                                    <p>
                                        <i class="bi-cup me-2"></i> All-Day Coffee + Snacks
                                    </p>

                                    <p>
                                        <i class="bi-controller me-2"></i> After Party
                                    </p>

                                    <p>
                                        <i class="bi-chat-square me-2"></i> 24/7 Support
                                    </p>

                                    <div class="border-bottom pb-3 mb-4"></div>

                                    <p>Quick group meetings for multiple teams</p>

                                    <a class="custom-btn btn mt-3" href="#">Buy Tickets</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12 mb-5 mb-lg-0">
                            <div class="pricing-thumb bg-white shadow-lg">                                
                                <div class="pricing-title-wrap d-flex align-items-center">

                                    <h4 class="pricing-title text-white mb-0">Gold</h4>

                                    <h5 class="pricing-small-title text-white mb-0 ms-auto">$840</h5>
                                </div>

                                <div class="pricing-body">
                                    <p>
                                        <i class="bi-cup me-2"></i> All-Day Coffee + Snacks
                                    </p>

                                    <p>
                                        <i class="bi-boombox me-2"></i> Group Meetings + After Party
                                    </p>

                                    <p>
                                        <i class="bi-chat-square me-2"></i> 24/7 Support + Instant Chats
                                    </p>

                                    <div class="border-bottom pb-3 mb-4"></div>

                                    <p>Quick group meetings for multiple teams</p>

                                    <a class="custom-btn btn mt-3" href="#">Buy Tickets</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="pricing-thumb bg-white shadow-lg">                                
                                <div class="pricing-title-wrap d-flex align-items-center">

                                    <h4 class="pricing-title text-white mb-0">Platinum</h4>

                                    <h5 class="pricing-small-title text-white mb-0 ms-auto">$1,240</h5>
                                </div>

                                <div class="pricing-body">
                                    <p>
                                        <i class="bi-cash me-2"></i> Cashback $200
                                    </p>

                                    <p>
                                        <i class="bi-boombox me-2"></i> Private Meetings + After Party
                                    </p>

                                    <p>
                                        <i class="bi-chat-square me-2"></i> 24/7 Support + Instant Chats
                                    </p>

                                    <div class="border-bottom pb-3 mb-4"></div>

                                    <p>group talks and private chats for multiple teams</p>

                                    <a class="custom-btn btn mt-3" href="#">Buy Tickets</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="venue section-padding" id="section_6">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h2 class="mb-5">Aqu?? tienes el lugar de <u class="text-info">eventos</u></h2>
                        </div>
                        <div class="col-lg-6 col-12">
                            <iframe class="google-map" 
                            src="<?php echo $data['page_info_contact']['google_map'] ? $data['page_info_contact']['google_map'] : '#'  ?>"
                            width="100%" height="420" allowfullscreen="" loading="lazy"></iframe>
                        </div>

                        <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                            <div class="venue-thumb bg-white shadow-lg">
                                
                                <div class="venue-info-title">
                                    <h2 class="text-white mb-0"><?php echo $data['page_info_contact']['contact_title'] ? $data['page_info_contact']['contact_title'] : ''  ?></h2>
                                </div>

                                <div class="venue-info-body">
                                    <h5 class="d-flex">
                                        <i class="bi-geo-alt me-2"></i> 
                                        <span><?php echo $data['page_info_contact']['contact_address'] ? $data['page_info_contact']['contact_address'] : ''  ?></span>
                                    </h5>

                                    <h5 class="mt-4 mb-3">
                                        <a href="mailto:<?php echo $data['page_info_contact']['contact_email'] ? $data['page_info_contact']['contact_email'] : ''  ?>">
                                            <i class="bi-envelope me-2"></i>
                                            <?php echo $data['page_info_contact']['contact_email'] ? $data['page_info_contact']['contact_email'] : ''  ?>
                                        </a>
                                    </h5>

                                    <h5 class="mb-0">
                                        <a href="#">
                                            <i class="bi-telephone me-2"></i>
                                            <?php echo $data['page_info_contact']['contact_phone'] ? $data['page_info_contact']['contact_phone'] : ''  ?>
                                        </a>
                                    </h5>

                                    <h5 class="mt-4">
                                        <a href="#">
                                            <i class="bi-watch me-2"></i>
                                            <?php echo $data['page_info_contact']['contact_schedule'] ? $data['page_info_contact']['contact_schedule'] : ''  ?>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="contact section-padding" id="section_7">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12 mx-auto">
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            <form class="custom-form contact-form bg-white shadow-lg needs-validation" id="fntSendEmail" name="fntSendEmail" method="POST" action="<?php echo server_url; ?>Home/sendEmail" class="needs-validation" novalidate="">
                                <h2>Ponte en contacto con nosotros</h2>
                                <input id="csrf" name="csrf" type="hidden" value="<?php echo $data["csrf"]; ?>">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 py-1">                                    
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 py-1">         
                                        <input type="text" name="email" id="email"  class="form-control" placeholder="Correo electronico" required="">
                                    </div>
                                    <div class="col-12 py-1">                                    
                                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Asunto">
                                    </div>
                                    <div class="col-12 py-1">                                    
                                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Mensaje"></textarea>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12 py-3">                                    
                                        <div class="g-recaptcha" data-sitekey="6LeJTQMgAAAAACpK9IvkRN6GCTrbx_2CQJFY-rvP"></div>
                                        <br>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="form-control">Enviar</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

        </main>
        <div class="col-lg-5 col-12 ms-lg-auto" id="button-up">
                <div class="copyright-text-wrap d-flex align-items-center">
                    <a href="#section_1" class="bi-arrow-up arrow-icon custom-link"></a>
                </div>
            </div>
        <footer class="site-footer">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-12 col-12 border-bottom pb-5 mb-5">
                        <div class="d-flex">
                            <a href="<?php echo server_url; ?>" class="navbar-brand">
                                <img src="<?php echo $data['page_info']['website_image'] ? $data['page_info']['website_image'] : '#'  ?>" alt="logo" width="200" class="shadow-light imgxen">
                            </a>
                            <ul class="social-icon ms-auto">
                                <?php if (!empty($data['page_info_contact']['facebook'])) { ?>
                                    <li><a href="<?php echo $data['page_info_contact']['facebook'] ? $data['page_info_contact']['facebook'] : '#'  ?>" class="social-icon-link bi-facebook" target="_blank"></a></li>
                                <?php } ?>
                                <?php if (!empty($data['page_info_contact']['instagram'])) { ?>
                                    <li><a href="<?php echo $data['page_info_contact']['instagram'] ? $data['page_info_contact']['instagram'] : '#'  ?>" class="social-icon-link bi-instagram" target="_blank"></a></li>
                                <?php } ?>
                                <?php if (!empty($data['page_info_contact']['linkedin'])) { ?>
                                    <li><a href="<?php echo $data['page_info_contact']['linkedin'] ? $data['page_info_contact']['linkedin'] : '#'  ?>" class="social-icon-link bi-linkedin" target="_blank"></a></li>
                                <?php } ?>
                                <?php if (!empty($data['page_info_contact']['twitter'])) { ?>
                                    <li><a href="<?php echo $data['page_info_contact']['twitter'] ? $data['page_info_contact']['twitter'] : '#'  ?>" class="social-icon-link bi-twitter" target="_blank"></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-7 col-12">
                        <ul class="footer-menu d-flex flex-wrap">
                            <p class="copyright-text">Copyright ??   <?php echo date("Y");?> <?php echo $data['page_info']['website_title'] ? $data['page_info']['website_title'] : ''  ?>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="<?php echo server_url; ?>assets/page/js/jquery.min.js"></script>
        <script src="<?php echo server_url; ?>assets/page/js/bootstrap.min.js"></script>
        <script src="<?php echo server_url; ?>assets/page/js/jquery.sticky.js"></script>
        <script src="<?php echo server_url; ?>assets/page/js/click-scroll.js"></script>
        <script src="<?php echo server_url; ?>assets/page/js/custom.js"></script>
        <script src="<?php echo server_url; ?>assets/page/js/custom.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@emretulek/jbvalidator"></script>
        <script src="<?php echo server_url; ?>assets/js/dashboard_validate.js"></script>
        <script src="<?php echo server_url; ?>assets/js/functions_principales.js"></script>
        <script src="<?php echo server_url; ?>assets/js/functions_home.js"></script>


    </body>
</html>