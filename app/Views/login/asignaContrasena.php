<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= lang('Layout.Empresa') ?> | Asignar contraseña</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="icon" href="<?= base_url() ?>/assets/dist/img/triangulotransparente.png" sizes="32x32" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/toastr/toastr.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/dist/img/iconoDash.jpg" style="width: 361px;" alt="<?= lang('Layout.Empresa') ?>" class="brand-image" ></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Asigne una nueva contraseña.</p>

      <form id="data" >
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Nueva contraseña" id="pass" name="pass">
          <div class="input-group-append" id="lblpass">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirmar nueva contraseña" id="confirmPass" name="confirmPass">
          <input type="hidden"  id="token" name="token" value="<?= $token ?>"><?= csrf_field() ?>
          <div class="input-group-append" id="lblconfirmPass">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12">
          
            <a href="#" class="btn btn-flat btn-block btn-primary"  id="passUpdate" ><span class="  spinner-border-sm" role="status" aria-hidden="true" id="spin"></span> Cambiar contraseña</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>

 <script src="<?= base_url() ?>/assets/dist/js/asignaPass.js"></script>

<script>var base_url = '<?php echo base_url() ?>';</script>
<!-- Toastr -->
<script src="<?= base_url() ?>/assets/plugins/toastr/toastr.min.js"></script>

</body>
</html>
