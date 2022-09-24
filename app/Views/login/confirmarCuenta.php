<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= lang('Layout.Empresa') ?> | Confirmar cuenta</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="icon" href="<?= base_url() ?>/assets/dist/img/triangulotransparente.png" sizes="32x32" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
</head>

<?php

  if($result){

  $message="<span style='color:green'>$message</span>";
} else {
  
  $message="<span style='color:red'>$message</span>";
}

?>


<body class="hold-transition lockscreen">

  <div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    
    <a href="<?= base_url() ?>"><b><?= lang('Layout.Empresa') ?></b></a>
  
  </div>
  <!-- User name -->
  <div class="lockscreen-name" style="color:#6e2b80;">Estimado Usuario:</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?= base_url() ?>/assets/dist/img/user-160x160.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials">
      <div class="input-group">
        
         <label class="form-control">&nbsp;&nbsp;<?= $message ?></label>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    
  </div>
  <div class="text-center">
    <a href="<?= base_url() ?>/ingresar">Ingresar</a>
  </div>
  
</div>
<!-- /.center -->

</body>
</html>
