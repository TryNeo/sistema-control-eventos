<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>
    <link rel="icon" type="image/png" href="http://xenturionit.com/wp-content/uploads/2020/08/cropped-Icono-web2-01-32x32.png" sizes="16x16" />

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <link rel="stylesheet" href="<?php echo server_url; ?>/assets/libs/stisla/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo server_url; ?>/assets/libs/stisla/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="http://xenturionit.com/wp-content/uploads/2020/11/Iso-250x10px.png" alt="logo" width="300" class="shadow-light">
            </div>

            <div class="card card-primary">
                <br>
                <div class="">
                    <h4 class="text-center">Iniciar Sesión</h4>
                </div>
                <div class="card-body">
                    <form id="fntLogin" name="fntLogin" method="POST" action="<?php echo server_url; ?>login/loginUser" class="needs-validation" novalidate="">
                        <input id="csrf" name="csrf" type="hidden" value="<?php echo $data["csrf"]; ?>">
                        <div class="form-group">
                            <label for="email">Usuario</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input id="username" name="username" type="text" class="form-control">
                                <div class="invalid-feedback">
                                    Porfavor ingrese su usuario
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Contraseña</label>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input id="password" type="password" class="form-control" name="password">
                                <div class="invalid-feedback">
                                    Porfavor ingrese su contraseña
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; XenturionIT 2022
            </div>
            </div>
        </div>
      </div>
    </section>
  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@emretulek/jbvalidator"></script>
    
    <script src="<?php echo server_url; ?>/assets/libs/stisla/assets/js/stisla.js"></script>
    <script src="<?php echo server_url; ?>/assets/libs/stisla/assets/js/scripts.js"></script>
    <script src="<?php echo server_url; ?>/assets/libs/stisla/assets/js/custom.js"></script>
    <script src="<?php echo server_url; ?>/assets/js/functions_principales.js"></script>
    <script src="<?php echo server_url; ?>/assets/js/functions_login.js"></script>
</body>
</html>
