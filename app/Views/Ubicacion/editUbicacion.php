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
    <div class="card-header">
        <h3 class="card-title">Editar Ubicacion</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmMulticatalogo">
            <div class="row">
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="cliente" class="control-label">Cliente: </label>
                        <div>
                            <?= $ubicacion->idCliente ?><input type="hidden" class="form-control " value=" <?= $id ?> " id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="ubicacion" class="control-label">Ubicacion:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control "  id="ubicacion" name="ubicacion" value="<?= $ubicacion->nombre_ubicacion ?>">

                        </div>
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
                                            
                                            <option <?= (isset($ubicacion->idRegion) == $a->valor ? 'selected' : '') ?> value="<?= $idRegion ?>"><?= $a->valor ?></option>
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
                                            <option <?= (isset($ubicacion->idZona) == $a->valor ? 'selected' : '') ?> value="<?= $idZona ?>"><?= $a->valor ?></option>
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
                    <input type="text" class="form-control "  id="calle" name="calle" value="<?= $ubicacion->calle_num ?>">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigo" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                    <input type="text" class="form-control "  id="codigo" name="codigo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" value="<?= $ubicacion->idCodigoPostal ?>">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigo" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="coloniacodigo" name="coloniacodigo">
                                <option value="">Selecciona una Opcion</option>
                                <option selected value="<?= $ubicacion->colonia ?>"><?= $ubicacion->colonia ?></option>
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
                                <option selected value="<?= $ubicacion->municipio ?>"><?= $ubicacion->municipio ?></option>
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
                                <option selected value="<?= $ubicacion->ciudad ?>"><?= $ubicacion->ciudad ?></option>
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
                                <option selected value="<?= $ubicacion->estado ?>"><?= $ubicacion->estado ?></option>
                                
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
            <div class='col-12 col-sm-6'>
            </div>    
            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <label for="Activo" class="control-label">Activo:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="activo" name="activo" <?= ($ubicacion->activo == 1 ? 'checked' : '') ?>>
                    </div>
                </div>
            </div>
        </div>    
        
        </form>
    </div>
</div>
        <div class="card-footer bg-transparent clearfix">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-9 ">
                </div>    
                <div class="col-12 col-sm-6 col-md-3 ">
                    <button id="editubicacion" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
                </div>
            </div>
        </div>
    <script>
        $('#editubicacion').click(function(event) {
            event.preventDefault();
            $('#load').addClass("spinner-border");

            if ($('#activo').is(':checked')) {
                val = 1;
            } else {
                val = 0;
            }
            var formData = new FormData($("form#frmMulticatalogo")[0]);
            formData.append('activo', val);

            $.ajax({
                url: base_url + '/EditInfoUbicacion',
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('.errorparticipante').remove();

                    if (response.succes.succes == 'succes') {

                        $("#exampleModal").modal("hide");

                        toastr.success(response.succes.mensaje);

                        var count = 2;
                        setInterval(function() {
                            count--;
                            if (count == 0) {
                                window.location = base_url + '/ubicacioncatalogo?id=<?= $encrypt->Encrypt($ubicacion->id) ?>';
                            }
                        }, 1000);

                    } else if (response.dontsucces.error == 'error') {
                        toastr.error(response.dontsucces.mensaje);

                    } else if (Object.keys(response.error).length > 0) {

                        for (var clave in response.error) {

                            $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#" + clave + "");

                        }
                        toastr.error('<?= lang('Layout.camposObligatorios') ?>');

                    }


                    $('#load').removeClass("spinner-border");

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.error('<?= lang('Layout.toastrError') ?>');
                    $('#load').removeClass("spinner-border");
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