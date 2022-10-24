<div class="card card-primary" id="cardCapPublica">
    <div class="card-header">
        <h3 class="card-title">CAPACITACIÓN EN SEGURIDAD PUBLICA</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="Capacitaciones">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="dependencia" class=" control-label">Dependencia responsable:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="dependencia" name="dependencia">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="institucion" class=" control-label">Institución Capacitadora:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="institucion" name="institucion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_curso" class=" control-label">Nombre del curso:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nombre_curso" name="nombre_curso">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tema_curso" class=" control-label">Tema del curso:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="tema_curso" name="tema_curso">
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="nivel_curso" class="control-label">Nivel del curso recibido: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="nivel_curso" name="nivel_curso">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($nivel_curso)) :
                                    foreach ($nivel_curso as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#nivel_curso").select2({
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
                        <label for="eficienciaCursos" class="control-label">Eficiencia terminal: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="eficienciaCursos" name="eficienciaCursos">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($eficiencia)) :
                                    foreach ($eficiencia as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#eficienciaCursos").select2({
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
                        <label for="inicio" class=" control-label">Inicio:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="inicio" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#inicio" id="datetime-inicio" name="inicio" placeholder="" value="" />
                            <div class="input-group-append" data-target="#inicio" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#inicio").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="conclusion" class=" control-label">Conclusión:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="conclusion" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#conclusion" id="datetime-conclusion" name="conclusion" placeholder="" value="" />
                            <div class="input-group-append" data-target="#conclusion" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#conclusion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="duracion" class=" control-label">Duración en horas:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="duracion" name="duracion" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="comprobante" class=" control-label">Tipo de comprobante:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="comprobante" name="comprobante">
                    </div>
                </div>

            </div>
        
    </div>
</div>

<div class="card card-primary" id="cardCapAdicional">
    <div class="card-header">
        <h3 class="card-title">CAPACITACIÓN ADICIONAL
        </h3>

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
                        <label for="empresa" class=" control-label">Insitutción o Empresa:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="empresa" name="empresa">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="curso" class=" control-label">Estudio o Curso:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="curso" name="curso">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_curso" class=" control-label">Tipo de curso:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="tipo_curso" name="tipo_curso">
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="cuso_tomado" class="control-label">¿El curso fue?: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="cuso_tomado" name="cuso_tomado">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($cuso_tomado)) :
                                    foreach ($cuso_tomado as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#cuso_tomado").select2({
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
                        <label for="eficiencia" class="control-label">Eficiencia terminal: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="eficiencia" name="eficiencia">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($eficiencia)) :
                                    foreach ($eficiencia as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#eficiencia").select2({
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
                        <label for="inicioAdicional" class=" control-label">Inicio:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="inicioAdicional" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#inicioAdicional" id="datetime-inicioAdicional" name="inicioAdicional" placeholder="" value="" />
                            <div class="input-group-append" data-target="#inicioAdicional" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#inicioAdicional").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="conclusionAdicional" class=" control-label">Conclusión:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="conclusionAdicional" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#conclusionAdicional" id="datetime-conclusionAdicional" name="conclusionAdicional" placeholder="" value="" />
                            <div class="input-group-append" data-target="#conclusionAdicional" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#conclusionAdicional").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="duracion_horas" class=" control-label">Duración en horas:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="duracion_horas" name="duracion_horas" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        
    </div>
</div>
<div class="card card-primary" id="cardCapIdiomas">
    <div class="card-header">
        <h3 class="card-title">IDIOMAS O DIALECTOS</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
            <div class="row">
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="idioma" class="control-label">Idioma o Dialecto: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="idioma" name="idioma">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($idioma)) :
                                    foreach ($idioma as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#idioma").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="lectura" class=" control-label">% Lectura:<span class="text-danger">*</span></label>
                        <select class="form-control" id="lectura" name="lectura">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($porsentajeIdioma)) :
                                    foreach ($porsentajeIdioma as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#lectura").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="escritura" class=" control-label">% Escritura:<span class="text-danger">*</span></label>
                        <select class="form-control" id="escritura" name="escritura">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($porsentajeIdioma)) :
                                    foreach ($porsentajeIdioma as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#escritura").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="conversacion" class=" control-label">% Conversación:<span class="text-danger">*</span></label>
                        <select class="form-control" id="conversacion" name="conversacion">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($porsentajeIdioma)) :
                                    foreach ($porsentajeIdioma as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#conversacion").select2({
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

<div class="card card-primary" id="cardCapHAbilidades">
    <div class="card-header">
        <h3 class="card-title">HABILIDADES Y APTITUDES</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
            <div class="row">
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="tipo_habilidad" class="control-label">Tipo: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tipo_habilidad" name="tipo_habilidad">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($tipo_habilidad)) :
                                    foreach ($tipo_habilidad as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipo_habilidad").select2({
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
                        <label for="especificacion" class=" control-label">Especifique:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="especificacion" name="especificacion">
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="grado_habilidadCap" class="control-label">Grado de aptitude o dominio: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="grado_habilidadCap" name="grado_habilidadCap">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($grado_habilidad)) :
                                    foreach ($grado_habilidad as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#grado_habilidadCap").select2({
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
<div class="card card-primary" id="cardCapAfiliacion">
    <div class="card-header">
        <h3 class="card-title">AFILIACION A AGRUPACIONES</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
            <div class="row">
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="nombre" class=" control-label">Nombre:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nombre" name="nombre">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipoAgrupa" class=" control-label">Tipo:<span class="text-danger">*</span></label>
                        <select class="form-control" id="tipoAgrupa" name="tipoAgrupa">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($tipo_agrupacion)) :
                                    foreach ($tipo_agrupacion as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipoAgrupa").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="desde" class=" control-label">Desde:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="desde" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#desde" id="datetime-desde" name="desde" placeholder="" value="" />
                            <div class="input-group-append" data-target="#desde" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#desde").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="hasta" class=" control-label">Hasta:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="hasta" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#hasta" id="datetime-hasta" name="hasta" placeholder="" value="" />
                            <div class="input-group-append" data-target="#hasta" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#hasta").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
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
            <button id="saveCapacitaciones" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" ></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>    
</div>

<script>
    

    $('#saveCapacitaciones').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );

        var idPersonal = $('#idPersonal').val()
        var csrfName = $("input[name=app_csrf]").val();

        var formData = new FormData($("form#Capacitaciones")[0]);
        formData.append('idPersonal', idPersonal);
        formData.append('app_csrf', csrfName);
        
        $.ajax({
            url: base_url + '/GuardarCapacitaciones',
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


                    $("input[name=app_csrf]").val('<?= csrf_hash() ?>'); 
                    
                    toastr.success(response.succes.mensaje);

                    $("html,body").animate({scrollTop: $("#cardSancionesEst").offset().top},2000);

                    $('#tabs a[href="#custom-normal"]').trigger('click');

                    

                } else if (response.dontsucces.error == 'error'){

                    toastr.error(response.dontsucces.mensaje);
                            
                } else if (Object.keys(response.error).length > 0 ){

                    for (var clave in response.error){
                                
                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardCapPublica #"+clave+"" );

                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardCapAdicional #"+clave+"" );

                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardCapIdiomas #"+clave+"" );

                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardCapHAbilidades #"+clave+"" );

                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardCapAfiliacion #"+clave+"" );
                            
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