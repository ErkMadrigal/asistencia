<div class="card card-primary" id="cardEmpDiversos">
    <div class="card-header">
        <h3 class="card-title">EMPLEOS DIVERSOS</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunodiversos">


            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="EmpleosDiversos">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="empresa" class=" control-label">Empresa:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="empresa" name="empresa">
                    </div>
                </div>

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="calle" name="calle">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="exterior" name="exterior">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:</label>
                        <input type="text" class="form-control " id="interior" name="interior">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoEmpDiv" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="codigoEmpDiv" name="codigoEmpDiv" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoEmpDiv" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="coloniacodigoEmpDiv" name="coloniacodigoEmpDiv">
                            <option value="">Selecciona una Opcion</option>

                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#coloniacodigoEmpDiv").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoEmpDiv" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="estadocodigoEmpDiv" name="estadocodigoEmpDiv">
                                <option value="">Selecciona una Opcion</option>

                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estadocodigoEmpDiv").select2({
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
                        <label for="municipiocodigoEmpDiv" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="municipiocodigoEmpDiv" name="municipiocodigoEmpDiv">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipiocodigoEmpDiv").select2({
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
                        <label for="numero" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="numero" name="numero" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ingresoEmpDiv" class=" control-label">Ingreso:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="ingresoEmpDiv" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#ingresoEmpDiv" id="datetime-ingresoEmpDiv" name="ingresoEmpDiv" placeholder="" value="" />
                            <div class="input-group-append" data-target="#ingresoEmpDiv" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#ingresoEmpDiv").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="funciones" class=" control-label">Funciones:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="funciones" name="funciones">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sueldo" class=" control-label">Ingreso Neto (Mensual):<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="sueldo" name="sueldo">
                    </div>
                </div>

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="area" class=" control-label">Area:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="area" name="area">
                    </div>
                </div>

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="motivo_separacion" class=" control-label">Motivo de separación:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="motivo_separacion" name="motivo_separacion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_separacion" class=" control-label">Tipo de Separación:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="tipo_separacion" name="tipo_separacion">
                    </div>
                </div>

                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="comentarios" class=" control-label">Comentarios:<span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control " id="comentarios" name="comentarios"></textarea>
                    </div>
                </div>
            </div>

    </div>
</div>

<div class="card card-primary" id="cardEmpDivLaboral">
    <div class="card-header">
        <h3 class="card-title">LABORAL: ACTITUD HACIA EL EMPLEO</h3>

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
                    <label for="empleo" class=" control-label">¿Por qué Eligio este empleo?<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="empleo" name="empleo">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="puesto" class=" control-label">¿Qué puesto le gustaria tener?<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="puesto" name="puesto">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="area_gustaria" class=" control-label">¿En que area le gustaría estar?<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="area_gustaria" name="area_gustaria">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="ascender" class=" control-label">¿En que tiempo desea ascender?<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="ascender" name="ascender">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="reglamentacion" class=" control-label">¿Conoce la reglamentación de los reconocimientos?<span class="text-danger">*</span></label>
                    <select class="form-control" id="reglamentacion" name="reglamentacion">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($SiNo)) :
                            foreach ($SiNo as  $a) {
                        ?>
                                <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#reglamentacion").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="reconomiento" class=" control-label">¿Razones por las que no ha recibido un reconocimiento?<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="reconomiento" name="reconomiento">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="reglamentacion_ascenso" class=" control-label">¿Conoce la reglamentación de los ascensos?<span class="text-danger">*</span></label>
                    <select class="form-control" id="reglamentacion_ascenso" name="reglamentacion_ascenso">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($SiNo)) :
                            foreach ($SiNo as  $a) {
                        ?>
                                <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#reglamentacion_ascenso").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="razones_ascenso" class=" control-label">¿Razones por las que no ha recibido un ascenso?<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="razones_ascenso" name="razones_ascenso">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="capacitacion" class=" control-label">¿Qué capacitación le gustaría recibir?<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="capacitacion" name="capacitacion">
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card card-primary" id="cardEmpDivDisc">
    <div class="card-header">
        <h3 class="card-title">LABORAL: DISCIPLINA LABORAL</h3>

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
                    <label for="desciplina" class=" control-label">Tipo de Disciplina:<span class="text-danger">*</span></label>
                    <select class="form-control" id="desciplina" name="desciplina">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($tipoDisciplina)) :
                            foreach ($tipoDisciplina as  $a) {
                        ?>
                                <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#desciplina").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="subtipo_disciplina" class=" control-label">Subtipo de disciplina<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="subtipo_disciplina" name="subtipo_disciplina">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="motivo" class=" control-label">Motivo<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="motivo" name="motivo">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="tipo" class=" control-label">Tipo<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="tipo" name="tipo">
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label for="fecha_inicialDis">Fecha de Inicio: <span class="text-danger">*</span></label>
                    <div class="input-group date" id="fecha_inicialDis" data-target-input="nearest">
                        <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_inicialDis" id="datetime-fecha_inicialDis" name="fecha_inicialDis" placeholder="" value="" />
                        <div class="input-group-append" data-target="#fecha_inicialDis" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar"></i></div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            $("#fecha_inicialDis").datetimepicker({
                                format: 'DD-MM-YYYY',
                                locale: moment.locale('es')
                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label for="fecha_finalDis">Fecha de Término: <span class="text-danger">*</span></label>
                    <div class="input-group date" id="fecha_finalDis" data-target-input="nearest">
                        <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_finalDis" id="datetime-fecha_finalDis" name="fecha_finalDis" placeholder="" value="" />
                        <div class="input-group-append" data-target="#fecha_finalDis" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar"></i></div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            $("#fecha_finalDis").datetimepicker({
                                format: "DD-MM-YYYY",
                                locale: moment.locale('es')

                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label for="licencias_medicas" class=" control-label">En caso de licencias médicas:</label>

                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="duracion" class=" control-label">Duración:</label>
                    <select class="form-control" id="duracion" name="duracion">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($duracion)) :
                            foreach ($duracion as  $a) {
                        ?>
                                <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#duracion").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="cantidad" class=" control-label">Cantidad:</label>
                    <input type="text" class="form-control " id="cantidad" name="cantidad">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="card-footer bg-transparent clearfix">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9">

        </div>
        <div class="col-12 col-sm-6 col-md-3 ">
            <button id="saveEmpleosDiversos" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>
</div>
<script>
    $("#codigoEmpDiv").on('keyup', function() {
        getSepomex(this.id)
    });

    $('#saveEmpleosDiversos').click(function(event) {
        event.preventDefault();
        $('#load').addClass("spinner-border");

        var idPersonal = $('#idPersonal').val()
        var csrfName = $("input[name=app_csrf]").val();
        var formData = new FormData($("form#EmpleosDiversos")[0]);
        formData.append('idPersonal', idPersonal);
        formData.append('app_csrf', csrfName);

        $.ajax({
            url: base_url + '/GuardarEmpDiversos',
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

                    $("input[name=app_csrf]").val('<?= csrf_hash() ?>');


                    toastr.success(response.succes.mensaje);

                    $('#saveEmpleosDiversos').addClass("btn-success");
                    $('#saveEmpleosDiversos').prop("disabled", true);
                    $('#saveEmpleosDiversos').html("Guardado&nbsp;<i class='fa fa-thumbs-up'></i>");

                    $("html,body").animate({
                        scrollTop: $("#cardCapPublica").offset().top
                    }, 2000);

                    $('#tabs a[href="#custom-overlay"]').trigger('click');

                } else if (response.dontsucces.error == 'error') {

                    toastr.error(response.dontsucces.mensaje);

                } else if (Object.keys(response.error).length > 0) {

                    for (var clave in response.error) {

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardEmpDiversos #" + clave + "");


                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardEmpDivLaboral #" + clave + "");

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardEmpDivDisc #" + clave + "");
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

    $(document).on('click', '#btnNingunodiversos', function() {

        if ($('#btnNingunodiversos').is(':checked')) {


            $('#EmpleosDiversos input').attr('disabled', 'disabled');
            $('#EmpleosDiversos select').attr('disabled', 'disabled');
        } else {
            $('#EmpleosDiversos input').attr('disabled', false);
            $('#EmpleosDiversos select').attr('disabled', false);
        }


    });
</script>