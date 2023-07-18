<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= lang('Layout.Empresa') ?> | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="icon" href="<?= base_url() ?>/assets/dist/img/triangulotransparente.png" sizes="32x32" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css"> 
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- jQuery -->
<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/dist/img/iconoDash.jpg" style="width: 361px;" alt="<?= lang('Layout.Empresa') ?>" class="brand-image" ></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar sesión</p>

      <?php if(session()->get('succes')):?>
        <div class="alert alert-succes" role="alert">
            <?= session()->get('succes') ?>
        </div>
      <?php endif;?>
      <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
      <form action="<?= base_url() ?>/" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value=<?= set_value('email')?>>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <?= csrf_field() ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" id="empresa" name="empresa">
            <option value="">Empresa</option>
            <?php
              if( !empty($empresa) ):
                foreach($empresa as  $a){
            ?>
                <option value="<?=$a->id ?>"><?= $a->nombre ?></option>
            <?php
                }
              endif;
            ?>
          </select>
          <script>
                                $(document).ready(function() {
                                    $("#empresa").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
          
        </div>
        <?php if(isset($validation)):?>
          <div class="col-12">
        <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors() ?>
        </div>
      <?php endif;?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              
              <label for="remember">
                
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-flat btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="<?= base_url() ?>/forgotPass">Recuperar contraseña</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>

</body>
</html>
