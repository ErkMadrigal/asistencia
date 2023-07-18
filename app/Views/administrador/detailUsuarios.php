<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Detalle Usuario</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
                <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?=$user->nombre ?> <?=$user->apellido_paterno ?></b></h2>
                      <p class="text-muted text-sm"><b>Email: </b> <?=$user->email ?> </p>
                      <p class="text-muted text-sm"><b>Empresa: </b> <?=$user->empresa ?> </p>
                      <p class="text-muted text-sm"><b>Activo: </b> 
                            <input class=""  onclick="return false;" type="checkbox" <?=($user->activo == 1 ? "checked" : "" ) ?>>
                        </p>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?= base_url() ?>/assets/dist/img/user-160x160.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                </div>
               
    </div>
</div>
<?php
$parentAndChild = 0;
$parentStatus = 0;
$parentAndChild = 0;
foreach ( $modulosUsuario as $v){
    
 	   if ($v->parent == 1 && $v->child == 0) {
        if($parentStatus == 1) { ?>
           </div></div></div>            
                  
      <?php  } ?>
        
	<div class="card card-primary">
    <div class="card-header" >
        
        <h3 class="card-title"><i class="nav-icon <?= $v->icon  ?>  " ></i>&nbsp;&nbsp;<?= $v->descripcion ?></h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
     <!-- /.card-header -->
    <div class="card-body table-responsive "><div class="row">

    	<?php
        $parentStatus = 1;
     } elseif ($v->parent == 1 && $v->child == 1){
         
        ?>
	</div><div class="info-box mb-3  bg-primary " style="opacity:.6;"><div class="info-box-content" >
        <?= $v->descripcion ?>:
            </div></div><div class="info-box-content">  
            <?php   

     } elseif ($v->parent == 0 && $v->child == 1) { ?>
                <div class="col-6 col-sm-3">
                    <div class="form-group">
                        <label for="Nombre" class="control-label"><?=$v->descripcion ?> </label>
                        <div >
                            
                            <input type="checkbox" class="modulo" disabled="disabled" <?=($v->permiso == 1 ? "checked" : "" ) ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                    </div>
                </div>
            
            
    <?php
    } elseif ($v->parent == 0 && $v->child == 0) {

    ?>

                <div class="col-6 col-sm-3">
                    <div class="form-group">
                        <label for="Nombre" class="control-label"><?=$v->descripcion ?> </label>
                        <div >
                            
                            <input type="checkbox" class="modulo" disabled="disabled" <?=($v->permiso == 1 ? "checked" : "" ) ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                    </div>
                </div>
             <?php
            
    
    }
    
}


if($parentStatus == 1){  ?> 
    </div></div></div> 

         <?php
}       

?>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Empresas</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <?php
                    if( !empty($empresa) ):
                        foreach($empresa as  $a){ ?>
                            <div class='col-6 col-sm-3'>
                    <div class="form-group">
                        <label for="Empresa" class="control-label"><?= $a->nombre ?> </label>
                        <div >
                            
                            <input type="checkbox" class="empresa" disabled="disabled" <?=($a->permiso == 1 ? "checked" : "" ) ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                    </div>
                </div>
                            
                                            <?php
                        }
                    endif;
                ?>
                
                
            </div>        
        </form>
    </div>
</div>

	<script>
     

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch("state", $(this).prop("checked"));
    });
</script>
<?= $this->endSection() ?>