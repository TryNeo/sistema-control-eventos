<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $data['page_title']; ?></title>
    <link rel="icon" type="image/png" href="https://i.imgur.com/x0pRK7B.png" sizes="16x16" />

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?php echo server_url; ?>assets/libs/stisla/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo server_url; ?>assets/libs/stisla/assets/css/components.css">
    <link rel="stylesheet" href="<?php echo server_url; ?>assets/css/custom.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="https://i.imgur.com/bJl5fX4.png" alt="logo" width="300" class="shadow-light">
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
                                <input id="username" name="username" type="text" class="form-control" value="<?php if(isset($_COOKIE['uname'])) echo $_COOKIE['uname']; ?>" placeholder="ingrese el usuario">
                                <div class="invalid-feedback">
                                    Porfavor ingrese su usuario
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Contraseña</label>
                                <div class="float-right">
                                    <a href="<?php echo server_url; ?>forgotpassword" class="text-small">
                                    ¿Se te olvidó tu contraseña?
                                    </a>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input  autocomplete="on" id="password" type="password" class="form-control" name="password" value="<?php if(isset($_COOKIE['upass'])) echo $_COOKIE['upass']; ?>" placeholder="ingrese la contraseña">
                                <div class="invalid-feedback">
                                    Porfavor ingrese su contraseña
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember"  class="custom-control-input" id="remember-me">
                                <label class="custom-control-label no-valid" for="remember-me" >Recordarme</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login <i class="fas fa-sign-in"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; XenturionIT  <?php echo date("Y");?>
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
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

    <script src="<?php echo server_url; ?>assets/libs/stisla/assets/js/stisla.js"></script>
    <script src="<?php echo server_url; ?>assets/libs/stisla/assets/js/scripts.js"></script>
    <script src="<?php echo server_url; ?>assets/libs/stisla/assets/js/custom.js"></script>
    <script src="<?php echo server_url; ?>assets/js/dashboard_validate.js"></script>
    <script src="<?php echo server_url; ?>assets/js/functions_principales.js"></script>
    <script src="<?php echo server_url; ?>assets/js/functions_login.js"></script>
    
</body>
</html>
