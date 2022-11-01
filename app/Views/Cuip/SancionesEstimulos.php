<div class="card card-primary" id="cardSancionesEst">
    <div class="card-header">
        <h3 class="card-title">SANCIONES / ESTIMULOS</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunsanciones">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-dged" id="btnAdddsanciones">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="sancionesEstimulos">
        <div id="CardDatossanciones">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo" class="control-label">Tipo: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="tipo" name="tipo">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="determinacion" class=" control-label">Determinación:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="determinacion" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#determinacion" id="datetime-determinacion" name="determinacion" placeholder="" value="" />
                            <div class="input-group-append" data-target="#determinacion" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#determinacion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="descripcion" name="descripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="situacion" class=" control-label">Situación:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="situacion" name="situacion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="inicio_inhabilitacion" class=" control-label">Inicio de la inhabilitación:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="inicio_inhabilitacion" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#inicio_inhabilitacion" id="datetime-inicio_inhabilitacion" name="inicio_inhabilitacion" placeholder="" value="" />
                            <div class="input-group-append" data-target="#inicio_inhabilitacion" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#inicio_inhabilitacion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="termino_inhabilitacion" class=" control-label">Término de la inhabilitación:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="termino_inhabilitacion" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#termino_inhabilitacion" id="datetime-termino_inhabilitacion" name="termino_inhabilitacion" placeholder="" value="" />
                            <div class="input-group-append" data-target="#termino_inhabilitacion" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#termino_inhabilitacion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="organismo" class=" control-label">Dependencia u organismo que emite la determinación :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="organismo" name="organismo">
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-3 mb-3" />
            <div id="CardDatossancionesB">
            </div>
        </form>
    </div>
</div>
<div class="card card-primary" id="cardSanciRes">
    <div class="card-header">
        <h3 class="card-title">RESOLUCIONES MINISTERIALES Y/O JUDICIALES</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunResolucion">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-dged" id="btnAdddResolucion">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="resoluciones">
            <div id="CardDatosResoluion">
                <div class="row">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="emisora" class=" control-label">Institución emisora:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="emisora" name="emisora">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="entidad_federativaSE" class=" control-label">Entidad federativa:<span class="text-danger">*</span></label>
                            <select class="form-control" id="entidad_federativaSE" name="entidad_federativaSE">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($entidad_federativa)) :
                                    foreach ($entidad_federativa as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#entidad_federativaSE").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="delitos" class="control-label">Delitos: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="delitos" name="delitos">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="motivo" class=" control-label">Motivo:
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="motivo" name="motivo">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="no_expediente" class="control-label">No. Expediente: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="no_expediente" name="no_expediente">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="agencia_mp" class=" control-label">Agencia del MP:
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="agencia_mp" name="agencia_mp">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="averiguacion_previa" class="control-label">Averiguación previa: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="averiguacion_previa" name="averiguacion_previa">
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="tipo_fuero" class="control-label">Tipo de Fuero: <span class="text-danger">*</span></label>
                            <div>
                                <select class="form-control" id="tipo_fuero" name="tipo_fuero">
                                    <option value="">Selecciona una Opcion</option>
                                    <?php
                                    if (!empty($tipo_fuero)) :
                                        foreach ($tipo_fuero as  $a) {
                                    ?>
                                            <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                    <?php
                                        }
                                    endif; ?>
                                </select>
                                <script>
                                    $(document).ready(function() {
                                        $("#tipo_fuero").select2({
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
                            <label for="averiguacion_estado" class="control-label">Estado de la averiguación previa: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="averiguacion_estado" name="averiguacion_estado">
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="inicio_averiguacion">Inicio de la averiguación: <span class="text-danger">*</span></label>
                            <div class="input-group date" id="inicio_averiguacion" data-target-input="nearest">
                                <input type="text" required class="form-control datetimepicker-input" data-target="#inicio_averiguacion" id="datetime-inicio_averiguacion" name="inicio_averiguacion" placeholder="" value="" />
                                <div class="input-group-append" data-target="#inicio_averiguacion" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function() {
                                    $("#inicio_averiguacion").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="al_dia">Al día: <span class="text-danger">*</span></label>
                            <div class="input-group date" id="al_dia" data-target-input="nearest">
                                <input type="text" required class="form-control datetimepicker-input" data-target="#al_dia" id="datetime-al_dia" name="al_dia" placeholder="" value="" />
                                <div class="input-group-append" data-target="#al_dia" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function() {
                                    $("#al_dia").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class='col-6 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="juzgado" class=" control-label">Juzgado:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="juzgado" name="juzgado">

                        </div>
                    </div>
                    <div class='col-6 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="no_proceso" class=" control-label">No. Proceso:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="no_proceso" name="no_proceso">

                        </div>
                    </div>
                    <div class='col-6 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="estado_procesal" class=" control-label">Estado Procesal:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="estado_procesal" name="estado_procesal">

                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="inicio_proceso">Inicio del proceso: <span class="text-danger">*</span></label>
                            <div class="input-group date" id="inicio_proceso" data-target-input="nearest">
                                <input type="text" required class="form-control datetimepicker-input" data-target="#inicio_proceso" id="datetime-inicio_proceso" name="inicio_proceso" placeholder="" value="" />
                                <div class="input-group-append" data-target="#inicio_proceso" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function() {
                                    $("#inicio_proceso").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="al_dia_proceso">Al día: <span class="text-danger">*</span></label>
                            <div class="input-group date" id="al_dia_proceso" data-target-input="nearest">
                                <input type="text" required class="form-control datetimepicker-input" data-target="#al_dia_proceso" id="datetime-al_dia_proceso" name="al_dia_proceso" placeholder="" value="" />
                                <div class="input-group-append" data-target="#al_dia_proceso" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function() {
                                    $("#al_dia_proceso").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-3 mb-3" />
            <div id="CardDatosResoluionB">
            </div>
        </form>
    </div>
</div>
<div class="card card-primary" id="cardSancRec">
    <div class="card-header">
        <h3 class="card-title">ESTIMULOS RECIBIDOS</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunoestimulo">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-dged" id="btnAdddestimulo">Agregar +</a>


            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <form class="form-horizontal" id="estimulo">
            <div id="CardDatosEstimulo">
        <div class="row">
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="tipo_estimulo" class=" control-label">Tipo:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="tipo_estimulo" name="tipo_estimulo">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="descripcion_estimulo" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="descripcion_estimulo" name="descripcion_estimulo">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="dependencia" class=" control-label">Dependencia que otorga:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="dependencia" name="dependencia">
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label for="otrogado_estimulo">Otorgado: <span class="text-danger">*</span></label>
                    <div class="input-group date" id="otrogado_estimulo" data-target-input="nearest">
                        <input type="text" required class="form-control datetimepicker-input" data-target="#otrogado_estimulo" id="datetime-otrogado_estimulo" name="otrogado_estimulo" placeholder="" value="" />
                        <div class="input-group-append" data-target="#otrogado_estimulo" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar"></i></div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            $("#otrogado_estimulo").datetimepicker({
                                format: 'DD-MM-YYYY',
                                locale: moment.locale('es')
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
            <hr class="mt-3 mb-3" />
            <div id="CardDatosEstimuloB">
            </div>
        </form>
    </div>
</div>
<div class="card-footer bg-transparent clearfix">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9">

        </div>
        <div class="col-12 col-sm-6 col-md-3 ">
            <button id="saveSancionesEstimulos" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>
</div>
<script>
    $('#saveSancionesEstimulos').click(function(event) {
        event.preventDefault();
        $('#load').addClass("spinner-border");

        var idPersonal = $('#idPersonal').val()
        var csrfName = $("input[name=app_csrf]").val();
        var formData = new FormData($("form#sancionesEstimulos")[0]);
        formData.append('idPersonal', idPersonal);
        formData.append('app_csrf', csrfName);

        $.ajax({
            url: base_url + '/GuardarSancionesEstimulos',
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

                    $('#saveSancionesEstimulos').addClass("btn-success");
                    $('#saveSancionesEstimulos').prop("disabled", true);
                    $('#saveSancionesEstimulos').html("Guardado&nbsp;<i class='fa fa-thumbs-up'></i>");



                } else if (response.dontsucces.error == 'error') {

                    toastr.error(response.dontsucces.mensaje);

                } else if (Object.keys(response.error).length > 0) {

                    for (var clave in response.error) {

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardSancionesEst #" + clave + "");

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardSanciRes #" + clave + "");

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardSancRec #" + clave + "");

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

    /*RESOLUCIONES */

    $(document).on('click', '.add-more-btn-dged', function() {

        var clone = $('#CardDatosResoluion').clone('.form-block-dged');
        $('#CardDatosResoluionB').append(clone);
        $('#btnAdddResolucion').removeClass('add-more-btn');
        $('#btnAdddResolucion').addClass('remove-more-btn');
        $('#btnAdddResolucion').text('Remover -');
    });

    $(document).on('click', '.remove-more-btn', function() {
        $('#CardDatosResoluionB').empty();
        $('#btnAdddResolucion').removeClass('remove-more-btn');
        $('#btnAdddResolucion').addClass('add-more-btn');
        $('#btnAdddResolucion').text('Agregar +');
    });

    $(document).on('click', '#btnNingunResolucion', function() {

        if ($('#btnNingunResolucion').is(':checked')) {


            $('#resoluciones input').attr('disabled', 'disabled');
            $('#resoluciones select').attr('disabled', 'disabled');
        } else {
            $('#resoluciones input').attr('disabled', false);
            $('#resoluciones select').attr('disabled', false);
        }


    });

    /*ESTIMULO */

    $(document).on('click', '.add-more-btn-dged', function() {

        var clone = $('#CardDatosEstimulo').clone('.form-block-dged');
        $('#CardDatosEstimuloB').append(clone);
        $('#btnAdddestimulo').removeClass('add-more-btn');
        $('#btnAdddestimulo').addClass('remove-more-btn');
        $('#btnAdddestimulo').text('Remover -');
    });

    $(document).on('click', '.remove-more-btn', function() {
        $('#CardDatosEstimuloB').empty();
        $('#btnAdddestimulo').removeClass('remove-more-btn');
        $('#btnAdddestimulo').addClass('add-more-btn');
        $('#btnAdddestimulo').text('Agregar +');
    });

    $(document).on('click', '#btnNingunoestimulo', function() {

        if ($('#btnNingunoestimulo').is(':checked')) {


            $('#estimulo input').attr('disabled', 'disabled');
            $('#estimulo select').attr('disabled', 'disabled');
        } else {
            $('#estimulo input').attr('disabled', false);
            $('#estimulo select').attr('disabled', false);
        }


    });

        /*SANCIONES */

        $(document).on('click', '.add-more-btn-dged', function() {

var clone = '<div class="row">    <div class="col-12 col-sm-12 col-md-6">        <div class="form-group">            <label for="tipoB" class="control-label">Tipo: <span class="text-danger">*</span></label>            <input type="text" class="form-control " id="tipoB" name="tipoB">        </div>    </div>    <div class="col-12 col-sm-12 col-md-6">        <div class="form-group">            <label for="determinacionB" class=" control-label">Determinación:<span class="text-danger">*</span></label>            <div class="input-group date" id="determinacionB" data-target-input="nearest">                <input type="text" required class="form-control datetimepicker-input" data-target="#determinacionB" id="datetime-determinacionB" name="determinacionB" placeholder="" value="" />                <div class="input-group-append" data-target="#determinacionB" data-toggle="datetimepicker">                    <div class="input-group-text"><i class="far fa-calendar"></i></div>                </div>            </div>            <script type="text/javascript">                $(function() {                    $("#determinacionB").datetimepicker({                        format: "DD-MM-YYYY",                        locale: moment.locale("es")                    });                });            <\/script>        </div>    </div>    <div class="col-12 col-sm-12 col-md-6">        <div class="form-group">            <label for="descripcionB" class=" control-label">Descripción:<span class="text-danger">*</span></label>            <input type="text" class="form-control " id="descripcionB" name="descripcionB">        </div>    </div>    <div class="col-12 col-sm-12 col-md-6">        <div class="form-group">            <label for="situacionB" class=" control-label">Situación:<span class="text-danger">*</span></label>            <input type="text" class="form-control " id="situacionB" name="situacionB">        </div>    </div>    <div class="col-12 col-sm-12 col-md-6">        <div class="form-group">            <label for="inicio_inhabilitacionB" class=" control-label">Inicio de la inhabilitación:<span class="text-danger">*</span></label>            <div class="input-group date" id="inicio_inhabilitacionB" data-target-input="nearest">                <input type="text" required class="form-control datetimepicker-input" data-target="#inicio_inhabilitacionB" id="datetime-inicio_inhabilitacionB" name="inicio_inhabilitacionB" placeholder="" value="" />                <div class="input-group-append" data-target="#inicio_inhabilitacionB" data-toggle="datetimepicker">                    <div class="input-group-text"><i class="far fa-calendar"></i></div>                </div>            </div>            <script type="text/javascript">                $(function() {                    $("#inicio_inhabilitacionB").datetimepicker({                        format: "DD-MM-YYYY",                        locale: moment.locale("es")                    });                });            <\/script>        </div>    </div>    <div class="col-12 col-sm-12 col-md-6">        <div class="form-group">            <label for="termino_inhabilitacionB" class=" control-label">Término de la inhabilitación:<span class="text-danger">*</span></label>            <div class="input-group date" id="termino_inhabilitacionB" data-target-input="nearest">                <input type="text" required class="form-control datetimepicker-input" data-target="#termino_inhabilitacionB" id="datetime-termino_inhabilitacionB" name="termino_inhabilitacionB" placeholder="" value="" />                <div class="input-group-append" data-target="#termino_inhabilitacionB" data-toggle="datetimepicker">                    <div class="input-group-text"><i class="far fa-calendar"></i></div>                </div>            </div>            <script type="text/javascript">                $(function() {                    $("#termino_inhabilitacionB").datetimepicker({                        format: "DD-MM-YYYY",                        locale: moment.locale("es")                    });                });            <\/script>        </div>    </div>    <div class="col-12 col-sm-12 col-md-12">        <div class="form-group">            <label for="organismoB" class=" control-label">Dependencia u organismo que emite la determinación :<span class="text-danger">*</span></label>            <input type="text" class="form-control " id="organismoB" name="organismoB">        </div>    </div></div>';
$('#CardDatossancionesB').append(clone);
$('#btnAdddsanciones').removeClass('add-more-btn');
$('#btnAdddsanciones').addClass('remove-more-btn');
$('#btnAdddsanciones').text('Remover -');
});

$(document).on('click', '.remove-more-btn', function() {
$('#CardDatossancionesB').empty();
$('#btnAdddsanciones').removeClass('remove-more-btn');
$('#btnAdddsanciones').addClass('add-more-btn');
$('#btnAdddsanciones').text('Agregar +');
});

$(document).on('click', '#btnNingunsanciones', function() {

if ($('#btnNingunsanciones').is(':checked')) {


    $('#sancionesEstimulos input').attr('disabled', 'disabled');
    $('#sancionesEstimulos select').attr('disabled', 'disabled');
} else {
    $('#sancionesEstimulos input').attr('disabled', false);
    $('#sancionesEstimulos select').attr('disabled', false);
}


});
</script>