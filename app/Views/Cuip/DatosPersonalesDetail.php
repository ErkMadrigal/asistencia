<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS PERSONALES</h3>

        <div class="card-tools">
            <input type="hidden" class="form-control " id="idPersonal" name="idPersonal"  >
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="DatosPersonales">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: </label>
                        <div>
                            <?= isset($variable->primer_nombre)?$variable->primer_nombre:''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre:</label>
                        <input type="text" class="form-control " id="segundoNombre" name="segundoNombre">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoPaterno" class=" control-label">Apellido Paterno:</label>
                        <input type="text" class="form-control " id="apellidoPaterno" name="apellidoPaterno">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno:</label>
                        <input type="text" class="form-control " id="apellidoMaterno" name="apellidoMaterno">
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_nacimiento">Fecha de Nacimiento: </label>
                        <div class="input-group date" id="fecha_nacimiento" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_nacimiento" id="datetime-fecha_nacimiento" name="fecha_nacimiento" placeholder="" value="" />
                            <div class="input-group-append" data-target="#fecha_nacimiento" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#fecha_nacimiento").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo" class=" control-label">Sexo:</label>
                        <select class="form-control" id="sexo" name="sexo">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($genero) ):
                                    foreach($genero as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#sexo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rfc" class=" control-label">R.F.C.:</label>
                        <input type="text" class="form-control " id="rfc" name="rfc" maxlength="10">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="claveE" class=" control-label">Clave Electoral:</label>
                        <input type="text" class="form-control " id="claveE" name="claveE">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cartilla" class=" control-label">Cartilla SMN:</label>
                        <input type="text" class="form-control " id="cartilla" name="cartilla">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="licencia" class=" control-label">Licencia de Conducir:</label>
                        <input type="text" class="form-control " id="licencia" name="licencia">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6    '>
                    <div class="form-group">
                        <label for="vigenciaLic" class=" control-label">Vigencia de Licencia:</label>
                        <div class="input-group date" id="vigenciaLic" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#vigenciaLic" id="datetime-vigenciaLic" name="vigenciaLic" placeholder="" value="" />
                            <div class="input-group-append" data-target="#vigenciaLic" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#vigenciaLic").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="CURP" class=" control-label">CURP:</label>
                        <input type="text" class="form-control " id="CURP" name="CURP" maxlength="18">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="pasaporte" class=" control-label">Pasaporte:</label>
                        <input type="text" class="form-control " id="pasaporte" name="pasaporte">
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="modo_nacionalidad" class="control-label">Modo de Nacionalidad: </label>
                        <div>
                            <select class="form-control" id="modo_nacionalidad" name="modo_nacionalidad">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($modo_nacionalidad) ):
                                    foreach($modo_nacionalidad as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#modo_nacionalidad").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_naturalizacion">Fecha de Naturalización: </label>
                        <div class="input-group date" id="fecha_naturalizacion" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_naturalizacion" id="datetime-fecha_naturalizacion" name="fecha_naturalizacion" placeholder="" value="" />
                            <div class="input-group-append" data-target="#fecha_naturalizacion" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#fecha_naturalizacion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="pais_nacimiento" class="control-label">Pais de Nacimiento: </label>
                        <div>
                            <select class="form-control" id="pais_nacimiento" name="pais_nacimiento">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($pais_nacimiento) ):
                                    foreach($pais_nacimiento as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#pais_nacimiento").select2({
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
                        <label for="entidad_nacimiento" class="control-label">Entidad de Nacimiento: </label>
                        <div>
                            <select class="form-control" id="entidad_nacimiento" name="entidad_nacimiento">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($entidad_federativa) ):
                                    foreach($entidad_federativa as  $a){
                                        ?>
                                            <option value="<?=$a->estado ?>"><?= $a->estado ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#entidad_nacimiento").select2({
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
                        <label for="nacionalidad" class="control-label">Nacionalidad: </label>
                        <div>
                            <select class="form-control" id="nacionalidad" name="nacionalidad">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($nacionalidad) ):
                                    foreach($nacionalidad as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#nacionalidad").select2({
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
                        <label for="municipio_nacimiento" class="control-label">Municipio de Nacimiento: </label>
                        <div>
                            <select class="form-control" id="municipio_nacimiento" name="municipio_nacimiento">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipio_nacimiento").select2({
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
                        <label for="cuidad_nacimiento" class="control-label">Cuidad de Nacimiento: </label>
                        <div>
                            <select class="form-control" id="cuidad_nacimiento" name="cuidad_nacimiento">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($cuidad_nacimiento) ):
                                    foreach($cuidad_nacimiento as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#cuidad_nacimiento").select2({
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
                        <label for="estado_civil" class="control-label">Estado Civil: </label>
                        <div>
                            <select class="form-control" id="estado_civil" name="estado_civil">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($estado_civil) ):
                                    foreach($estado_civil as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estado_civil").select2({
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
                        <label for="desarrollo_academico" class="control-label">Desarrollo Académico: </label>
                        <div>
                            <select class="form-control" id="desarrollo_academico" name="desarrollo_academico">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($desarrollo_academico) ):
                                    foreach($desarrollo_academico as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#desarrollo_academico").select2({
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
                        <label for="escuela" class=" control-label">Escuela :</label>
                        <input type="text" class="form-control " id="escuela" name="escuela">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especialidad" class=" control-label">Especialidad o Estudio :</label>
                        <input type="text" class="form-control " id="especialidad" name="especialidad">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cedula" class=" control-label">No. Cédula Profesional:</label>
                        <input type="text" class="form-control " id="cedula" name="cedula">
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="anno_inicio">Año de Inicio: </label>
                        <div class="input-group date" id="anno_inicio" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#anno_inicio" id="datetime-anno_inicio" name="anno_inicio" placeholder="" value="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="4" />
                            <div class="input-group-append" data-target="#anno_inicio" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#anno_inicio").datetimepicker({
                                    format: 'YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="anno_termino">Año de Termino: </label>
                        <div class="input-group date" id="anno_termino" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#anno_termino" id="datetime-anno_termino" name="anno_termino" placeholder="" value="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="4" />
                            <div class="input-group-append" data-target="#anno_termino" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#anno_termino").datetimepicker({
                                    format: 'YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sep" class=" control-label">Registro SEP:</label>
                        <select class="form-control" id="registroSep" name="registroSep">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($SiNo) ):
                                    foreach($SiNo as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#registroSep").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="certificado" class=" control-label">Num. de Folio Certificado :</label>
                        <input type="text" class="form-control " id="certificado" name="certificado">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="promedio" class=" control-label">Promedio :</label>
                        <input type="text" class="form-control " id="promedio" name="promedio">
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
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle :</label>
                        <input type="text" class="form-control " id="calle" name="calle">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:</label>
                        <input type="text" class="form-control " id="exterior" name="exterior">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:</label>
                        <input type="text" class="form-control " id="interior" name="interior">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numeroTelefono" class=" control-label">Numero
                            Telefónico:</label>
                        <input type="text" class="form-control " id="numeroTelefono" name="numeroTelefono" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entrecalle" class=" control-label">Entre la calle
                            de:</label>
                        <input type="text" class="form-control " id="entrecalle" name="entrecalle">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ylacalle" class=" control-label">Y la calle :</label>
                        <input type="text" class="form-control " id="ylacalle" name="ylacalle">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigo" class=" control-label">Código Postal :</label>
                        <input type="text" class="form-control " id="codigo" name="codigo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigo" class=" control-label">Colonia:</label>
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
                        <label for="estadocodigo" class="control-label">Entidad Federativa: </label>
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
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigo" class="control-label">Municipio: </label>
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
                        <label for="ciudadcodigo" class="control-label">Ciudad: </label>
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
            </div>
        
    </div>
</div>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS GENERALES: EXPERIENCIA DOCENTE</h3>

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
                        <label for="nombrecurso" class=" control-label">Nombre del Curso
                            :</label>
                        <input type="text" class="form-control " id="nombrecurso" name="nombrecurso">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombreInstitucion" class=" control-label">Nombre de
                            la Institución:</label>
                        <input type="text" class="form-control " id="nombreInstitucion" name="nombreInstitucion">
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_inicial">Fecha de Inicio: </label>
                        <div class="input-group date" id="fecha_inicial" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_inicial" id="datetime-fecha_inicial" name="fecha_inicial" placeholder="" value="" />
                            <div class="input-group-append" data-target="#fecha_inicial" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#fecha_inicial").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_final">Fecha de Término: </label>
                        <div class="input-group date" id="fecha_final" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_final" id="datetime-fecha_final" name="fecha_final" placeholder="" value="" />
                            <div class="input-group-append" data-target="#fecha_final" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#fecha_final").datetimepicker({
                                    format: "DD-MM-YYYY",
                                    locale: moment.locale('es')

                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="certificado_por" class=" control-label">Certificado
                            por:</label>
                        <input type="text" class="form-control " id="certificado_por" name="certificado_por">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>