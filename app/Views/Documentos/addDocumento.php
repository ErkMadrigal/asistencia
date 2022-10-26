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
        <h3 class="card-title">Agregar Documento</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmDocumento">
            <div class="row">
                <!-- <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="modalidad" class="control-label">Modalidad: <span class="text-danger">*</span></label>
                        <select class="form-control" id="modalidad" name="modalidad">
                        <option value="">Selecciona una Modalidad</option>';
                        <?php
                                if( !empty($modalidad) ):
                                    foreach($modalidad as  $a){
                                        $idClase = $encrypt->Encrypt($a->id);?>
                                            <option value="<?=$idClase?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                                    </select><script>$(document).ready(function() {
                                        $("#modalidad").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div> -->
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="documento" class="control-label">Documento: <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control "  id="documento" name="documento" value=""><?= csrf_field() ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="tipo" class="control-label">Tipo: <span class="text-danger">*</span></label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="">Seleccionar tipo</option>
                            <option  value="COPIA">COPIA</option>
                            <option  value="ORIGINAL">ORIGINAL</option>
                        </select><script>$(document).ready(function() {
                                        $("#tipo").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div>
            </div>  
    </div>
</div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">    
                    <button id="SaveDocumento" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
                </div>
            </div>
            </form><script>
    
    $('#SaveDocumento').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        var formData = new FormData($("form#frmDocumento")[0]);
        
        $.ajax({
            url: base_url + '/GuardarCatDocumento',
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
                        window.location = base_url + '/catDocumentos'; 
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

</script>
<?= $this->endSection() ?>