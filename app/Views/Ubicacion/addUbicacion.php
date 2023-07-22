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
        <form class="form-horizontal" id="Ubicacion">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cliente" class="control-label">Cliente: <span class="text-danger">*</span></label>
                        <div>
                            <?= $cliente->razon_social ?>
                            <input type="hidden" class="form-control " id="cliente" name="cliente" value="<?= $encrypt->Encrypt($cliente->id)?>">
                        </div>
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ubicacion" class=" control-label">Ubicacion:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="ubicacion" name="ubicacion">
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="region" class="control-label">Región: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="region" name="region">
                            <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($region) ):
                                    foreach($region as  $a){
                                        $idRegion = $encrypt->Encrypt($a->id);
                                        ?>
                                            <option value="<?=$idRegion ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                        </select>
                            <script>
                                $(document).ready(function() {
                                    $("#region").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="zona" class="control-label">Zona: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="zona" name="zona">
                            <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($zona) ):
                                    foreach($zona as  $a){
                                        $idZona = $encrypt->Encrypt($a->id);
                                        ?>
                                            <option value="<?=$idZona ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                        </select>
                            <script>
                                $(document).ready(function() {
                                    $("#zona").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="latitud" class=" control-label">Latitud:</label>
                        <input type="text" class="form-control " id="latitud" name="latitud" maxlength="15">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="longitud" class=" control-label">Longitud:</label>
                        <input type="text" class="form-control " id="longitud" name="longitud" maxlength="15">
                    </div>
                </div>
            </div>
        
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS DEL DOMICILIO</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle y Número:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="calle" name="calle">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigo" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="codigo" name="codigo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5"><?= csrf_field() ?>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigo" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="coloniacodigo" name="coloniacodigo">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#coloniacodigo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigo" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="municipiocodigo" name="municipiocodigo">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipiocodigo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigo" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="ciudadcodigo" name="ciudadcodigo">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ciudadcodigo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigo" class="control-label">Estado: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="estadocodigo" name="estadocodigo">
                                <option value="">Selecciona una Opcion</option>
                                
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estadocodigo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
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
            <button id="saveUbica" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" ></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>    
</div>
<script>
    
    $('#saveUbica').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        var formData = new FormData($("form#Ubicacion")[0]);
        
        $.ajax({
            url: base_url + '/GuardarUbicacion',
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
                        window.location = base_url + '/ubicacioncatalogo?id=<?= $encrypt->Encrypt($cliente->id) ?> '; 
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


    $("#codigo").on('keyup', function(){
        getSepomex(this.id)
    });

    


    function getSepomex(id) {



        var elemento = id;
        
        var num = $('#'+elemento).val().length

        if (num === 5) {

            $('#load').addClass( "spinner-border" );

            let selectEstadoDom = document.querySelector("#estado"+elemento)

            let selectMunicipioDom = document.querySelector("#municipio"+elemento)
                
            let selectColoniaDom = document.querySelector("#colonia"+elemento)

            let selectCiudadDom = document.querySelector("#ciudad"+elemento)
            
              

                selectCiudadDom.innerHTML = ''
                selectColoniaDom.innerHTML = ''
                selectEstadoDom.innerHTML = ''
                selectMunicipioDom.innerHTML = ''
              
            
            

            $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

        
        var cp = $('#'+elemento).val()
        var csrfName = $("input[name=app_csrf]").val();
        
            var data    = {
                    cp : cp,
                    app_csrf: csrfName
                };

        $.ajax({
            url: base_url + '/getSepomex',
            type: 'POST',
            dataType: 'json',
            data: data,
            data: data,
            ache: false,
            async: true,
            success: function (response) {
                if(response.succes.succes === "succes"){

                        
                        selectCiudadDom.innerHTML = response.data.ciudad
                        selectColoniaDom.innerHTML = response.data.colonia
                    
                        selectEstadoDom.innerHTML = response.data.estado
                        selectMunicipioDom.innerHTML = response.data.municipio
                        
                
                    
                    
                }

                $('#load').removeClass( "spinner-border" );
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError') ?>');
                           
            }
        });

    }
    };

</script>
<?= $this->endSection() ?>