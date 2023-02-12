<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= lang('Layout.Empresa') ?></title>
<link rel="icon" href="<?= base_url() ?>/assets/dist/img/triangulotransparente.png" sizes="32x32" />  
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" />
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/daterangepicker/daterangepicker.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- flag-icon-css -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/flag-icon-css/css/flag-icon.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/toastr/toastr.min.css">

<!-- jQuery -->
<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker 
<script src="<?= base_url() ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url() ?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>/assets/plugins/toastr/toastr.min.js"></script>

<script>var base_url = '<?php echo base_url() ?>';</script>
<!-- AdminLTE -->
<script src="<?= base_url() ?>/assets/dist/js/adminlte.js"></script>

<script src="<?= base_url() ?>/assets/dist/js/moment-with-locales.min.js"></script>

<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

<!-- Button DataTable -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>



</head>
<?php 
    $request = service('request');
?>    
<body class="hold-transition sidebar-mini ">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() ?>/" class="nav-link"><?= lang('Layout.Inicio') ?></a>
      </li>
      
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-warning navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            
            <div class="media">
              <img src="<?= base_url() ?>/assets/dist/img/user-160x160.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            
            <div class="media">
              <img src="<?= base_url() ?>/assets/dist/img/user-160x160.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            
            <div class="media">
              <img src="<?= base_url() ?>/assets/dist/img/user-160x160.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="<?= base_url() ?>/assets/dist/img/user-160x160.png" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?= session()->get('firstname'). " ". session()->get('lastname')?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="<?= base_url() ?>/assets/dist/img/user-160x160.png" class="img-circle elevation-2" alt="User Image">
            <p>
              <?= session()->get('email') ?>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="<?= base_url() ?>/logout" class="btn btn-default btn-flat float-right"><?= lang('Layout.CerrarSesion') ?></a>
          </li>
        </ul>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url() ?>/assets/dist/img/iconoDash.jpg" alt="<?= lang('Layout.Empresa') ?>" class="brand-image img-circle elevation-3" >
      <span class="brand-text font-weight-light"><?= lang('Layout.Empresa') ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat text-sm" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview ">
            <a href="<?= base_url() ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <?php

          if( !empty($modulos) ):
                $parentAndChild = 0;
                $parentStatus = 0;
                foreach($modulos as  $v){
                  if($v->parent == 1 && $v->child == 0) {
                    if($parentStatus == 1) { ?>
                        </ul>
                      </li>
                  <?php
                    }
                    if($parentAndChild == 1){ ?>
                        </ul>
                      </li>
                  <?php    
                    }
                  ?>

                  <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                      <i class="nav-icon <?= $v->icon ?>"></i>
                      <p> <?= $v->descripcion; ?>
                        <i class="fas fa-angle-left right"></i>
                        
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                  <?php 
                      $parentStatus = 1;
                      $parentAndChild = 0;
                  } elseif ($v->parent == 1 && $v->child == 1){ 
                            if($parentAndChild == 1){ ?>
                              </ul>
                            </li>
                            <?php 
                            }  
                            $parentAndChild = 1; ?>
                      <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                          <i class="fa fa-caret-right nav-icon"></i>
                          <p><?= $v->descripcion; ?></p>
                        </a>
                        <ul class="nav nav-treeview">
                  <?php } elseif ($v->parent == 0 && $v->child == 1 && ($v->business == 0 || ($v->business == 1 && $v->plan <> "Commercial"))) { ?>    
                      <li class="nav-item has-treeview">
                        <a href="<?= base_url() ?>/<?= $v->url ?>" class="nav-link <?= $request->uri->getSegment(1) ==  $v->url  ? 'active' : null ; ?>">
                          <i class="fa fa-caret-right nav-icon"></i>
                          <p><?= $v->descripcion; ?></p>
                        </a>
                      </li>
                  <?php
                  } elseif($v->parent == 0 && $v->child == 0){ 
                      if($parentAndChild == 1){ ?>
                              </ul>
                            </li>
                            <?php 
                            }  
                            $parentAndChild = 0; ?>
                      <li class="nav-item has-treeview ">
                        <a href="<?= base_url() ?>/<?= $v->url ?>" class="nav-link <?= $request->uri->getSegment(1) ==  $v->url  ? 'active' : null ; ?>">
                          <i class="fa fa-caret-right nav-icon"></i>
                          <p><?= $v->descripcion; ?></p>
                        </a>
                      </li>
                  <?php      
                  }
                }
                if($parentAndChild == 1){ ?>
                    </ul>
                  </li> 
                <?php   
                }
                if($parentStatus == 1){ ?>
                    </ul>
                  </li>
          <?php
                }        
          endif;
          ?>        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <?= $this->include('includes/alerts') ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <?php if( !empty($breadcrumb) ): ?>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>/<?= $breadcrumb['url'] ?>"><?= $breadcrumb['inicio'] ?></a></li>
              <li class="breadcrumb-item active"><?= $breadcrumb['titulo'] ?></li>
            </ol>
          <?php endif; ?>
          </div>
        </div><!-- /.row -->
        <?= $this->renderSection('content') ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer text-sm">
    <strong>Copyright &copy; 2022 <a href="https://serprosep.com.mx/"><?= lang('Layout.Empresa') ?></a>.</strong>
    <?= lang('Layout.Derechos') ?>.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0-beta
    </div>
  </footer>
</div>
<!-- ./wrapper -->
  </body>
</html>