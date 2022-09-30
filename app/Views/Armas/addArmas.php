<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>

<?php

use CodeIgniter\HTTP\RequestInterface;
use App\Models\ArmasModel;
use App\Libraries\Encrypt;

 $encrypt = new Encrypt();

?>
<div id="load" class=" spinner text-secondary" role="status">
    </div>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Armas</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmArmas">
            <div class="row">
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="matricula" class="control-label">Matricula: <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="matricula" name="matricula"><?= csrf_field() ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="folio_manif" class="control-label">Folio Manif: <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="folio_manif" name="folio_manif" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="clase" class="control-label">Clase: <span class="text-danger">*</span></label>
                        <select class="form-control" id="clase" name="clase">
                        <option value="">Selecciona una Clase</option>';
                                if( !empty($clase) ):
                                    foreach($clase as  $a){
                                        $idClase = $this->encrypt->Encrypt($a->id);
                                        $form.= '<option value="'.$idClase.'">'.$a->valor .'</option>';
                                    }
                                endif;
                                    </select><script>$(document).ready(function() {
                                        $("#clase").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="calibre" class="control-label">Calibre: <span class="text-danger">*</span></label>
                        <select class="form-control" id="clase" name="clase">
                        <option value="">Selecciona un Calibre</option>';
                                if( !empty($calibre) ):
                                    foreach($calibre as  $a){
                                        $idCalibre = $this->encrypt->Encrypt($a->id);
                                        $form.= '<option value="'.$idCalibre.'">'.$a->valor .'</option>';
                                    }
                                endif;
                                    </select><script>$(document).ready(function() {
                                        $("#calibre").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="marca" class="control-label">Marca: <span class="text-danger">*</span></label>
                        <select class="form-control" id="clase" name="clase">
                        <option value="">Selecciona una Marca</option>';
                                if( !empty($marca) ):
                                    foreach($marca as  $a){
                                        $idMarca = $this->encrypt->Encrypt($a->id);
                                        $form.= '<option value="'.$idMarca.'">'.$a->valor .'</option>';
                                    }
                                endif;
                                    </select><script>$(document).ready(function() {
                                        $("#marca").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="modelo" class="control-label">Modelo: <span class="text-danger">*</span></label>
                        <select class="form-control" id="clase" name="clase">
                        <option value="">Selecciona un Modelo</option>';
                                if( !empty($modelo) ):
                                    foreach($modelo as  $a){
                                        $idModelo = $this->encrypt->Encrypt($a->id);
                                        $form.= '<option value="'.$idModelo.'">'.$a->valor .'</option>';
                                    }
                                endif;
                                    </select><script>$(document).ready(function() {
                                        $("#modelo").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="modalidad" class="control-label">Modalidad: <span class="text-danger">*</span></label>
                        <select class="form-control" id="clase" name="clase">
                        <option value="">Seleccionar Clase</option>';
                                if( !empty($modalidad) ):
                                    foreach($modalidad as  $a){
                                        $idModalidad = $this->encrypt->Encrypt($a->id);
                                        $form.= '<option value="'.$idModalidad.'">'.$a->valor .'</option>';
                                    }
                                endif;
                                    </select><script>$(document).ready(function() {
                                        $("#modalidad").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div>
            </div>        
        
    </div>
</div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">    
                    <button id="SaveArmas" class="btn btn-block btn-flat btn-primary " type="button">Guardar</button>
                </div>
            </div>
            </form><script>
    

    $('#SaveArmas').click(function (event) {
        event.preventDefault();
        $("#load").show();
        var formData = new FormData($("form#frmArmas")[0]);
        
        $.ajax({
            url: base_url + '/GuardarArma',
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
                        window.location = base_url + '/armas'; 
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

                $("#load").attr("style", "display: none !important");    

                        
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError')?>');
                $("#load").attr("style", "display: none !important");           
            }
        });
            
    });

</script>
<?= $this->endSection() ?>