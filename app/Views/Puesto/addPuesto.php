<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<?php

use CodeIgniter\HTTP\RequestInterface;
use App\Models\ArmasModel;
use App\Libraries\Encrypt;

 $encrypt = new Encrypt();

?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS GENERALES</h3>

        <div class="card-tools">
            
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="Puestos">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cliente" class="control-label">Cliente: <span class="text-danger">*</span></label>
                        <?= csrf_field() ?>
                        <div>
                            <?= $cliente->razon_social ?>
                            <input type="hidden" class="form-control " id="cliente" name="cliente" value="<?= $encrypt->Encrypt($cliente->id)?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ubicacion" class="control-label">Ubicación: <span class="text-danger">*</span></label>
                        <select class="form-control" id="ubicacion" name="ubicacion">
                        <option value="">Selecciona una Ubicación</option>;
                        <?php
                                if( !empty($ubicaciones) ):
                                    foreach($ubicaciones as  $a){
                                        $idUbicacion = $encrypt->Encrypt($a->id);?>
                                            <option value="<?=$idUbicacion?>"><?= $a->nombre_ubicacion ?></option>
                                            <?php
                                    }
                                endif;?>
                                    </select><script>$(document).ready(function() {
                                        $("#ubicacion").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="turno" class=" control-label">Turno:<span class="text-danger">*</span></label>
                        <select class="form-control" id="turno" name="turno">
                        <option value="">Seleccione un Turno</option>;
                        <?php
                                if( !empty($turnos) ):
                                    foreach($turnos as  $a){
                                        $idTurno = $encrypt->Encrypt($a->id);?>
                                            <option value="<?=$idTurno?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                                    </select><script>$(document).ready(function() {
                                        $("#turno").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="puesto" class=" control-label">Puesto:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="puesto" name="puesto">
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numGuardias" class=" control-label">Numero de Guardias:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="numGuardias" name="numGuardias">
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cantArmaCorta" class=" control-label">Cantidad Arma Corta:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="cantArmaCorta" name="cantArmaCorta">
                        
                    </div>
                </div>  
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cantSinarmas" class=" control-label">Cantidad Sin Arma:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="cantSinarmas" name="cantSinarmas">
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cantArmaLarga" class=" control-label">Cantidad Arma Larga:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="cantArmaLarga" name="cantArmaLarga">
                        
                    </div>
                </div>
            </div>
        
    </div>
</div>
<div class="card-footer bg-transparent clearfix">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9">
            
        </div>
        <div class="col-12 col-sm-6 col-md-3 ">    
            <button id="savepuesto" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" ></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>    
</div>
<script>
    
    $('#savepuesto').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        var formData = new FormData($("form#Puestos")[0]);
        
        $.ajax({
            url: base_url + '/GuardarPuesto',
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
                        window.location = base_url + '/puestocatalogo?id=<?= $encrypt->Encrypt($cliente->id) ?>'; 
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

    


    $('#ubicacion').on('select2:select',
        function (e) {    
        
        $('#turno').val(null).empty();
        var ubicacion = $('#ubicacion').val()
        var csrfName = $("input[name=app_csrf]").val();
        
            var data    = {
                    ubicacion : ubicacion,
                    app_csrf: csrfName
                };

        $.ajax({
            url: base_url + '/getTurnos',
            type: 'POST',
            dataType: 'json',
            data: data,
            data: data,
            ache: false,
            async: true,
            success: function (response) {
                if(response.succes.succes === "succes"){

                    $('#turno').append(response.data.turnos);
                        
                    
                    } else {


                        toastr.error(response.dontsucces.mensaje);
                    }

                $('#load').removeClass( "spinner-border" );
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError') ?>');
                           
            }
        });

    
    });

</script>
<?= $this->endSection() ?>