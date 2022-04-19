<div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hola></div></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                        <a href="<?php echo server_url; ?>logout/" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                        </a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">PANEL CONTROL EVENTOS</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PCE</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item">
                <?php if($data['page_id'] == 1 ){ ?>
                  <li class="active">
                    <a href="<?php echo server_url; ?>dashboard/" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                  </li>
                <?php }else{ ?>
                  <li>
                    <a href="<?php echo server_url; ?>dashboard/" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                  </li>               
                <?php } ?>
              </li>
              <li class="menu-header">Seguridad</li>
              <li class="dropdown">
                  <a href="#" class="has-dropdown"><i class="fas fa-building"></i><span>Administración</span></a>
                  <ul class="dropdown-menu" style="display: block;">
                      <?php if($data['page_id'] == 6 ){ ?>
                          <li class="active"><a class="nav-link" href="<?php echo server_url; ?>categorias/"><i class="fas fa-stream" aria-hidden="true"></i>Categorias</a></li>
                      <?php }else{ ?>
                          <li><a class="nav-link" href="<?php echo server_url; ?>categorias/"><i class="fas fa-stream" aria-hidden="true"></i>Categorias</a></li>
                      <?php } ?>
                  </ul>
              </li>
              <li class="menu-header">Seguridad</li>
              <li class="dropdown">
                <a href="#" class="has-dropdown"><i class="fas fa-lock"></i><span>Configuracion</span></a>
                <ul class="dropdown-menu" style="display: block;">
                  <?php if($data['page_id'] == 3 ){ ?>
                    <li class="active"><a class="nav-link" href="<?php echo server_url; ?>roles/"><i class="fas fa-users" aria-hidden="true"></i>Roles</a></li>
                  <?php }else{ ?>
                    <li><a class="nav-link" href="<?php echo server_url; ?>roles/"><i class="fas fa-users" aria-hidden="true"></i>Roles</a></li>                
                  <?php } ?>
                  
                  <?php if($data['page_id'] == 5 ){ ?>
                    <li class="active"><a class="nav-link" href="<?php echo server_url; ?>permisos/"><i class="fas fa-shield-alt"></i>Permisos</a></li>                
                  <?php }else{ ?>
                    <li><a class="nav-link" href="<?php echo server_url; ?>permisos/"><i class="fas fa-shield-alt"></i>Permisos</a></li>                
                  <?php } ?>
                </ul>
              </li>
            </ul>

            <!-- /.nav-
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div>--->
        </aside>
    </div>
