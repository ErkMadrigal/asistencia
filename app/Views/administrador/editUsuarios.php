<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>

<?php

use CodeIgniter\HTTP\RequestInterface;
use App\Models\AdministradorModel;
use App\Libraries\Encrypt;

 $encrypt = new Encrypt();

?>

<div id="load" class=" spinner text-secondary" role="status">
    </div>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Editar Usuario</h3>
    
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
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="Nombre" class="control-label">Nombre: <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="Nombre" name="Nombre" value="<?= $user->nombre?>"><?=csrf_field() ?>
                            <input type="hidden"  class="form-control " id="id" name="id" value="<?= $getId ?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Paterno" class="control-label">Apellido paterno: <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="apellidopaterno" name="apellidopaterno" value="<?=$user->apellido_paterno ?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="email" class="control-label">Email: </label>
                        <div >
                            <input type="email"  class="form-control " disabled value="<?=$user->email ?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo:</label>
                        <div class="form-check" >
                            <input class="form-check-input"  name="activo" id="activo" type="checkbox" <?= ($user->activo == 1 ? 'checked' : '' ) ?>>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
    </div>
    <div class="card-footer bg-transparent clearfix">
        <div class="row">
            
            <div class="col-12 col-sm-6 col-md-3 ">    
                <button id="SaveUsuario" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
            </div>
        </div>    
    </div>
</div>
<?php 
$parentAndChild = 0;
$parentStatus = 0;
$parentAndChild = 0;
$i = 0 ;
foreach ( $modulosUsuario as $v){
    
    if ($v->parent == 1 && $v->child == 0) {
        if($parentStatus == 1) { 
           ?> </div></div></div> <?php           
                  
        } ?>
        
<div class="card card-primary">
    <div class="card-header" >
        
        <h3 class="card-title"><i class="nav-icon <?= $v->icon ?>  " ></i>&nbsp;&nbsp;<?= $v->descripcion ?></h3>
    
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
        </div></div><div class="row">

        <?php     

     } elseif ($v->parent == 0 && $v->child == 1) {
        $id = $encrypt->Encrypt($v->id);

        ?>
				<div class='col-6 col-sm-3'>
                    <div class="form-group">
                        <label for="Nombre" class="control-label"><?= $v->descripcion ?> </label>
                        <div >
                            
                            <input type="checkbox" class="modulo" id="<?= $id ?>"  name="my-checkbox<?= $i ?>"  <?= ($v->permiso == 1 ? "checked" : "" ) ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                    </div>
                </div>
        <?php    
            
        $i++;
    } elseif ($v->parent == 0 && $v->child == 0) {
        $id = $encrypt->Encrypt($v->id);

		?>          
                <div class='col-6 col-sm-3'>
                    <div class="form-group">
                        <label for="Nombre" class="control-label"><?= $v->descripcion ?> </label>
                        <div >
                            
                            <input type="checkbox" class="modulo" id="<?= $id ?>"  name="my-checkbox<?=$i ?>"  <?= ($v->permiso == 1 ? "checked" : "" ) ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                    </div>
                </div>
            <?php
            
        $i++;
    }
    
}


if($parentStatus == 1){
   ?> </div></div></div> <?php         
}       

?>
<!-- Modal -->
<div class="modal fade" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content ">
            <div id="loadModal"  style="display:none!important;" class="overlay d-flex justify-content-center align-items-center">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar permiso</h5>
                
            </div>
            <div class="modal-body">
                <form id="frmEditPermiso" >
                <input type="hidden"  class="form-control " id="idEdit" name="idEdit" >
                <input type="hidden"  class="form-control " id="valEdit" name="valEdit" >
                <input type="hidden"  class="form-control " id="nameEdit" name="nameEdit" >
                <p><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;Esta seguro de editar el permiso ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="#" id="closeModal" class="btn btn-secondary btn-flat">Cerrar</a>
                <a href="#" id="editPermiso" class="btn btn-primary btn-flat"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</a>
            </div>
                </form>
        </div>
    </div>
</div>

	<script>
     $('#editPermiso').click(function (event) {
        event.preventDefault();
        $("#loadModal").show();
        var idUser = $("#id").val();
        var csrfName = $("input[name=app_csrf]").val();    
        var formData = new FormData($("form#frmEditPermiso")[0]);
        formData.append('app_csrf', csrfName);
        formData.append('idUser', idUser);
        $.ajax({
            url: base_url + '/EditUserPermiso',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.errorparticipante').remove();

                if (response.succes.succes == 'succes') {
                    
                    $("#exampleModal").modal("hide");

                    toastr.success(response.succes.mensaje);

                } else if (response.dontsucces.error == 'error'){
                    toastr.error(response.dontsucces.mensaje);
                            
                } else if (Object.keys(response.error).length > 0 ){

                    toastr.error('<?= lang('Layout.toastrError') ?>');

                }

                $("#loadModal").attr("style", "display: none !important");    

                        
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error(' <?= lang('Layout.toastrError') ?>');
                $("#loadModal").attr("style", "display: none !important");           
            }
        });
            
    });

    $('#SaveUsuario').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        var val = 0;
        if($("#activo").is(':checked')) {
            val = 1;
        } else {
            val = 0;
        }
        var formData = new FormData($("form#frmUsuario")[0]);
        formData.append('activo', val);
        $.ajax({
            url: base_url + '/EditInfoUser',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.errorField').remove();

                if (response.succes.succes == 'succes') {

                    toastr.success(response.succes.mensaje);

                } else if (response.dontsucces.error == 'error'){

                    toastr.error(response.dontsucces.mensaje);
                            
                } else if (Object.keys(response.error).length > 0 ){

                    for (var clave in response.error){
                                
                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#"+clave+"" );
                            
                    }
                        toastr.error('<?= lang('Layout.camposObligatorios') ?>');

                }

                $('#load').removeClass( "spinner-border" );    

                        
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?= lang('Layout.toastrError') ?>');
                $('#load').removeClass( "spinner-border" );           
            }
        });
            
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>
<script src="<?= base_url() ?>/assets/dist/js/AdminEditUser.js"></script>
<?= $this->endSection() ?>