<?php

use CodeIgniter\HTTP\RequestInterface;
use App\Models\AdministradorModel;
use App\Libraries\Encrypt;

$encrypt = new Encrypt();

?>
<div class="card card-primary" id="CardGenerales">
    <div class="card-header">
        <h3 class="card-title">DATOS GENERALES: SOCIOECONÓMICO</h3>

        <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>


    <!-- /.card-header -->
    <div class="card-body  ">
        <form class="form-horizontal" id="SocioEconomico">

            <div class="row">
                <input type="hidden" class="form-control " id="idSocioEconomico" name="idSocioEconomico" value="<?= $encrypt->Encrypt($estudio->id) ?>"><?= csrf_field() ?>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="familia" class="control-label">¿Vive con su Familia?: <span class="text-danger">*</span></label>
                        <div>

                        <select class="form-control" id="familia" name="familia">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($SiNo)) :
                            foreach ($SiNo as  $a) {
                        ?>
         <option <?= (($estudio->vive) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

                        <?php
                            }
                        endif; ?>
                    </select>

                            <script>
                                $(document).ready(function() {
                                    $("#familia").select2({
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
                        <label for="ingreso" class=" control-label">Ingreso familiar adicional
                            (Mensual):<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="ingreso" name="ingreso" value="<?= isset($estudio->ingreso_familiar) ? $estudio->ingreso_familiar : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="domicilio_tipo" class="control-label">Su domicilio es: <span class="text-danger">*</span></label>
                        <div>
                  
                        <select class="form-control" id="domicilio_tipo" name="domicilio_tipo">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($domicilio_tipo)) :
                            foreach ($domicilio_tipo as  $a) {
                        ?>
      <option <?= (isset($estudio->domicilio) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

                        <?php
                            }
                        endif; ?>
                    </select>
                            <script>
                                $(document).ready(function() {
                                    $("#domicilio_tipo").select2({
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
                        <label for="actividad" class=" control-label">Actividades culturales o deportivas
                            que practique:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="actividad" name="actividad" value="<?= isset($estudio->actividades_culturales) ? $estudio->actividades_culturales : ''  ?> ">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especificacion" class=" control-label">Especifiación de inmueble y
                            costo:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="especificacion" name="especificacion" value="<?= isset($estudio->especificacion_inmueble) ? $estudio->especificacion_inmueble : ''  ?> ">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="inversion" class=" control-label">Inversiones y monto
                            aproximado:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="inversion" name="inversion" value="<?= isset($estudio->inversiones) ? $estudio->inversiones : ''  ?> ">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="vehiculo" class=" control-label">Vehiculo y costo Aproximado:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="vehiculo" name="vehiculo" value="<?= isset($estudio->vehiculo) ? $estudio->vehiculo : ''  ?> ">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calidad" class=" control-label">Calidad de Vida:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="calidad" name="calidad" value="<?= isset($estudio->calidad_vida) ? $estudio->calidad_vida : ''  ?> ">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="vicio" class=" control-label">Vicios:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="vicio" name="vicio" value=" <?= isset($estudio->vicios) ? $estudio->vicios : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="imagen" class=" control-label">Imagen Publica:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="imagen" name="imagen" value="<?= isset($estudio->imagen_publica) ? $estudio->imagen_publica : ''  ?> ">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="comportamiento" class=" control-label">Comportamiento Social:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="comportamiento" name="comportamiento" value="<?= isset($estudio->comportamiento) ? $estudio->comportamiento : ''  ?>">

                        </div>
                    </div>
                </div>

            </div>


        </form>
    </div>
</div>
<div class="card card-primary" id="CardDependientes">
    <div class="card-header">
        <h3 class="card-title">DATOS DEL CONYUGE Y DEPENDIENTES ECONÓMICOS</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunConyuge">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-dged" id="btnAdddConyuge">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form class="form-horizontal" id="DatosDependientes">
            <div id="CardConyuge">
            <?php
        if( !empty($economico_dependientes) ):
            $label = '';
            foreach($economico_dependientes as  $e){
                                        ?>   
                <div class="row" class="form-block">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="apellidoPaterno<?= $label ?>" class=" control-label">Apellido
                                Paterno:<span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control " id="apellidoPaterno<?= $label ?>" name="apellidoPaterno<?= $label ?>" value="<?= isset($e->apellido_paterno) ? $e->apellido_paterno : ''  ?>">

                            </div>
                        </div>
                    </div>
                    
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="apellidoMaterno<?= $label ?>" class=" control-label">Apellido
                                Materno:<span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control " id="apellidoMaterno<?= $label ?>" name="apellidoMaterno<?= $label ?>" value="<?= isset($e->apellido_materno) ? $e->apellido_materno : ''  ?>">

                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="primerNombre<?= $label ?>" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control " id="primerNombre<?= $label ?>" name="primerNombre<?= $label ?>" value="<?= isset($e->primer_nombre) ? $e->primer_nombre : ''  ?>">

                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="segundoNombre<?= $label ?>" class=" control-label">Segundo Nombre:</label>
                            <div>
                                <input type="text" class="form-control " id="segundoNombre<?= $label ?>" name="segundoNombre<?= $label ?>" value="<?= isset($e->segundo_nombre) ? $e->segundo_nombre : ''  ?>">

                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="fecha_nacimiento_dep<?= $label ?>">Fecha de Nacimiento: <span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control " id="fecha_nacimiento_dep<?= $label ?>" name="fecha_nacimiento_dep<?= $label ?>" value="<?= isset($e->fecha_nacimiento) ? $e->fecha_nacimiento : ''  ?>">

                            </div>
                            <script type="text/javascript">
                                $(function() {
                                    $("#fecha_nacimiento_dep").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="sexo_dep<?= $label ?>" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                            <select class="form-control" id="sexo_dep<?= $label ?>" name="sexo_dep<?= $label ?>">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($genero)) :
                                    foreach ($genero as  $a) {
                                ?>
           <option <?= (isset($e->idGenero) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#sexo_dep").select2({
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
                        <label for="parentesco_familiar<?= $label ?>" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="parentesco_familiar<?= $label ?>" name="parentesco_familiar<?= $label ?>">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($parentesco_todos)) :
                                    foreach ($parentesco_todos as  $a) {
                                ?>
                                           <option <?= (($e->idParentesco) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#parentesco_familiar").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <?php
            $label = 'B';
            }
            endif;?>    
            </div>

            <hr class="mt-3 mb-3" />
            <div id="CardConyugeB">
            </div>
        </form>
    </div>
</div>
<div class="card-footer bg-transparent clearfix">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9">

        </div>
        <div class="col-12 col-sm-6 col-md-3 ">
            <button id="saveSocioEconomico" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>
</div>
<script>
    $('#saveSocioEconomico').click(function(event) {
        event.preventDefault();
        $('#load').addClass("spinner-border");

        var idPersonal = $('#idPersonal').val();
        var csrfName = $("input[name=app_csrf]").val();

        var formData = new FormData($("form#SocioEconomico")[0]);


        if ($('#btnNingunConyuge').is(':checked')) {
            val = 1;

        } else {
            val = 0;
            var formDataB = new FormData($("form#DatosDependientes")[0]);


            for (let [key, value] of formDataB.entries()) {
                formData.append(key, value);
            }
        }


        formData.append('dependientes', val);
        formData.append('idPersonal', idPersonal);
        formData.append('app_csrf', csrfName);

        $.ajax({
            url: base_url + '/EditarSocioEconomico',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function(response) {
                $('.errorField').remove();

                if (response.succes.succes == 'succes') {

                    

                    toastr.success(response.succes.mensaje);

                    

                    $("html,body").animate({
                        scrollTop: $("#CardGenerales").offset().top
                    }, 2000);

                    

                } else if (response.dontsucces.error == 'error') {

                    toastr.error(response.dontsucces.mensaje);

                } else if (Object.keys(response.error).length > 0) {

                    for (var clave in response.error) {

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#CardDependientes #" + clave + "");

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#CardGenerales #" + clave + "");

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

        $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

    });





    /*CONYUGE */

    $(document).on('click', '.add-more-btn-dged', function() {

        var clone = '<div class="row" class="form-block">    <div class="col-12 col-sm-12 col-md-6">        <div class="form-group">            <label for="apellidoPaternoB" class=" control-label">Apellido                Paterno:<span class="text-danger">*</span></label>            <input type="text" class="form-control " id="apellidoPaternoB" name="apellidoPaternoB">        </div>    </div>    <div class="col-12 col-sm-12 col-md-6">        <div class="form-group">            <label for="apellidoMaternoB" class=" control-label">Apellido                Materno:<span class="text-danger">*</span></label>            <input type="text" class="form-control " id="apellidoMaternoB" name="apellidoMaternoB">        </div>    </div>    <div class="col-12 col-sm-12 col-md-6">        <div class="form-group">            <label for="primerNombreB" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>            <input type="text" class="form-control " id="primerNombreB" name="primerNombreB">        </div>    </div>    <div class="col-12 col-sm-12 col-md-6">        <div class="form-group">            <label for="segundoNombreB" class=" control-label">Segundo Nombre:</label>            <input type="text" class="form-control " id="segundoNombreB" name="segundoNombreB">        </div>    </div>    <div class="col-12 col-sm-6">        <div class="form-group">            <label for="fecha_nacimiento_depB">Fecha de Nacimiento: <span class="text-danger">*</span></label>            <div class="input-group date" id="fecha_nacimiento_depB" data-target-input="nearest">                <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_nacimiento_depB" id="datetime-fecha_nacimiento_depB" name="fecha_nacimiento_depB" placeholder="" value="" />                <div class="input-group-append" data-target="#fecha_nacimiento_depB" data-toggle="datetimepicker">                    <div class="input-group-text"><i class="far fa-calendar"></i></div>                </div>            </div>            <script type="text/javascript">                $(function() {                    $("#fecha_nacimiento_depB").datetimepicker({                        format: "DD-MM-YYYY",                        locale: moment.locale("es")                    });                });            <\/script>        </div>    </div>    <div class="col-12 col-sm-12 col-md-6">        <div class="form-group">            <label for="sexo_depB" class=" control-label">Sexo:<span class="text-danger">*</span></label>            <select class="form-control" id="sexo_depB" name="sexo_depB">                <option value="">Selecciona una Opcion</option>                <?php if (!empty($genero)) :
        foreach ($genero as  $a) {                ?>                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>                <?php                    }                endif; ?>            </select>            <script>                $(document).ready(function() {                    $("#sexo_depB").select2({                        theme: "bootstrap4",                        width: "100%"                    });                });            <\/script>        </div>    </div>    <div class="col-6 col-sm-6">        <div class="form-group">            <label for="parentesco_familiarB" class="control-label">Parentesco: <span class="text-danger">*</span></label>            <div>                <select class="form-control" id="parentesco_familiarB" name="parentesco_familiarB">                    <option value="">Selecciona una Opcion</option>                    <?php                    if (!empty($parentesco_todos)) :                        foreach ($parentesco_todos as  $a) {                    ?>                            <option value="<?= $a->id ?>"><?= $a->valor ?></option>                    <?php                        }                    endif; ?>                </select>                <script>                    $(document).ready(function() {                        $("#parentesco_familiarB").select2({                            theme: "bootstrap4",                            width: "100%"                        });                    });                <\/script>            </div>        </div>    </div></div>';

        $('#CardConyugeB').append(clone);
        $('#btnAdddConyuge').removeClass('add-more-btn');
        $('#btnAdddConyuge').addClass('remove-more-btn');
        $('#btnAdddConyuge').text('Remover -');
    });

    $(document).on('click', '.remove-more-btn', function() {
        $('#CardConyugeB').empty();
        $('#btnAdddConyuge').removeClass('remove-more-btn');
        $('#btnAdddConyuge').addClass('add-more-btn');
        $('#btnAdddConyuge').text('Agregar +');
    });

    $(document).on('click', '#btnNingunConyuge', function() {

        if ($('#btnNingunConyuge').is(':checked')) {


            $('#DatosDependientes input').attr('disabled', 'disabled');
            $('#DatosDependientes select').attr('disabled', 'disabled');
        } else {
            $('#DatosDependientes input').attr('disabled', false);
            $('#DatosDependientes select').attr('disabled', false);
        }


    });
</script>