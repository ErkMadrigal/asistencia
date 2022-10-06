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
        <h3 class="card-title">Agregar Usuario</h3>
    
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
                            <input type="text"  class="form-control " id="Nombre" name="Nombre"><?= csrf_field() ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Paterno" class="control-label">Apellido paterno: <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="apellidopaterno" name="apellidopaterno" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="email" class="control-label">Email: <span class="text-danger">*</span></label>
                        <div >
                            <input type="email"  class="form-control" id="email" name="email" >
                        </div>
                    </div>
                </div>
            </div>        
        
    </div>
</div>
<?php 
$parentAndChild = 0;
$parentStatus = 0;
$parentAndChild = 0;
foreach ( $modulos as $v){
    
    if ($v->parent == 1 && $v->child == 0) {
        if($parentStatus == 1) {  ?>
           </div></div></div>            
           <?php       
        } ?>
        
	<div class="card card-primary">
    <div class="card-header" >
        
        <h3 class="card-title"><i class="nav-icon <?= $v->icon ?>  " ></i>&nbsp;&nbsp <?= $v->descripcion ?></h3>
    
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
     	
        $id = $encrypt->Encrypt($v->idmodulo);
    
	?>        
            
                <div class='col-6 col-sm-3'>
                    <div class="form-group">
                        <label for="Nombre" class="control-label"><?= $v->descripcion ?> </label>
                        <div >
                            
                            <input type="checkbox" class="modulo" id="<?= $id ?>"  name='ids[]'  data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                    </div>
                </div>
            
    <?php         
    
    } elseif ($v->parent == 0 && $v->child == 0) {
        $id = $encrypt->Encrypt($v->idmodulo);
    ?>    
        
            
                <div class='col-6 col-sm-3'>
                    <div class="form-group">
                        <label for="Nombre" class="control-label"> <?php $v->descripcion ?></label>
                        <div >
                            
                            <input type="checkbox" class="modulo" id="<?= $id ?>"  name='ids[]'  data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                    </div>
                </div>
            <?php
            
    
    }
    
}


if($parentStatus == 1){ ?>
   </div></div></div>          
<?php

}       

?>


            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">    
                    <button id="SaveUsuario" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
                </div>
            </div>
            </form><script>
     

    $('#SaveUsuario').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );    
        var formData = new FormData($("form#frmUsuario")[0]);
        var mod = [];
        
        $('.modulo').each(function( index ){
            var id = $(this).attr("id");

            if($(this).is(':checked')) {
                mod.push({"modulo": id , "val" : 1});
            } else {
                mod.push({"modulo": id , "val" : 0});
            }

        });
        
        formData.append('mod', JSON.stringify(mod));
        
        $.ajax({
            url: base_url + '/SaveUser',
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

                    var count = 2;
                    setInterval(function(){
                      count--;
                      if (count == 0) {
                        window.location = base_url + '/usuarios'; 
                      }
                    },1000);

                } else if (response.dontsucces.error == 'error'){

                    toastr.error(response.dontsucces.mensaje);
                            
                } else if (Object.keys(response.error).length > 0 ){

                    for (var clave in response.error){
                                
                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#"+clave+"" );
                            
                    }
                        toastr.error('<?=lang('Layout.camposObligatorios')?>');

                }

                $('#load').removeClass( "spinner-border" );    

                        
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError')?>');
                $('#load').removeClass( "spinner-border" );           
            }
        });
            
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>
<?= $this->endSection() ?>