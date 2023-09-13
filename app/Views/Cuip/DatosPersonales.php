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
                        <label for="primerNombre" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="primerNombre" name="primerNombre"><?= csrf_field() ?>
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
                        <label for="apellidoPaterno" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="apellidoPaterno" name="apellidoPaterno">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="apellidoMaterno" name="apellidoMaterno">
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_nacimiento">Fecha de Nacimiento: <span class="text-danger">*</span></label>
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
                        <label for="sexo" class=" control-label">Sexo:<span class="text-danger">*</span></label>
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
                        <label for="rfc" class=" control-label">R.F.C.:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="rfc" name="rfc" maxlength="13">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="claveE" class=" control-label">Clave Electoral:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="claveE" name="claveE">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cartilla" class=" control-label">Cartilla SMN:<span class="text-danger">*</span></label>
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
                        <label for="CURP" class=" control-label">CURP:<span class="text-danger">*</span></label>
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
                        <label for="modo_nacionalidad" class="control-label">Modo de Nacionalidad: <span class="text-danger">*</span></label>
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
                        <label for="pais_nacimiento" class="control-label">Pais de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="pais_nacimiento" name="pais_nacimiento">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($pais_nacimiento) ):
                                    foreach($pais_nacimiento as  $a){
                                        ?>
                                            <option <?= ($a->valor == 'México' ? 'selected' : '' ) ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
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
                        <label for="entidad_nacimiento" class="control-label">Entidad de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="entidad_nacimiento" name="entidad_nacimiento">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($entidad_federativa) ):
                                    foreach($entidad_federativa as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
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
                        <label for="municipio_nacimiento" class="control-label">Municipio de Nacimiento: <span class="text-danger">*</span></label>
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
                        <label for="cuidad_nacimiento" class="control-label">Cuidad de Nacimiento: <span class="text-danger">*</span></label>
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
                        <label for="nacionalidad" class="control-label">Nacionalidad: <span class="text-danger">*</span></label>
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
                        <label for="estado_civil" class="control-label">Estado Civil: <span class="text-danger">*</span></label>
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
                        <label for="desarrollo_academico" class="control-label">Desarrollo Académico: <span class="text-danger">*</span></label>
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
                        <label for="escuela" class=" control-label">Escuela :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="escuela" name="escuela">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especialidad" class=" control-label">Especialidad o Estudio :<span class="text-danger">*</span></label>
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
                        <label for="anno_inicio">Año de Inicio: <span class="text-danger">*</span></label>
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
                        <label for="anno_termino">Año de Termino: <span class="text-danger">*</span></label>
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
                        <label for="sep" class=" control-label">Registro SEP:<span class="text-danger">*</span></label>
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
                        <label for="certificado" class=" control-label">Num. de Folio Certificado :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="certificado" name="certificado">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="promedio" class=" control-label">Promedio :<span class="text-danger">*</span></label>
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
                        <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="calle" name="calle">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
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
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entrecalle" class=" control-label">Entre la calle
                            de:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="entrecalle" name="entrecalle">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ylacalle" class=" control-label">Y la calle :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="ylacalle" name="ylacalle">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigo" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="codigo" name="codigo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numeroTelefono" class=" control-label">Numero
                            Telefónico:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="numeroTelefono" name="numeroTelefono" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>              
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigo" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="estadocodigo" name="estadocodigo">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($entidad_federativa) ):
                                    foreach($entidad_federativa as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
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
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">ADSCRIPCION</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="FormAdscripcion">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="dependencia_adscripcion" class=" control-label">Dependencia:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="dependencia_adscripcion" name="dependencia_adscripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="institucion_adscripcion" class=" control-label">Institución:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="institucion_adscripcion" name="institucion_adscripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fechaingreso_adscripcion">Fecha de Ingreso: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="fechaingreso_adscripcion" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fechaingreso_adscripcion" id="datetime-fechaingreso_adscripcion" name="fechaingreso_adscripcion" placeholder="" value="" />
                            <div class="input-group-append" data-target="#fechaingreso_adscripcion" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#fechaingreso_adscripcion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="puesto_adscripcion" class=" control-label">Puesto:<span class="text-danger">*</span></label>
                        <select class="form-control" id="puesto_adscripcion" name="puesto_adscripcion">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($puesto) ):
                                    foreach($puesto as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#puesto_adscripcion").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rango_adscripcion" class=" control-label">Rango o Categoria:<span class="text-danger">*</span></label>
                        <select class="form-control" id="rango_adscripcion" name="rango_adscripcion">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($rango) ):
                                    foreach($rango as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#rango_adscripcion").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nivel_adscripcion" class=" control-label">Nivel de Mando:<span class="text-danger">*</span></label>
                        <select class="form-control" id="nivel_adscripcion" name="nivel_adscripcion">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($mando) ):
                                    foreach($mando as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#nivel_adscripcion").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombrejefe_adscripcion" class=" control-label">Nombre del jefe inmediato:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nombrejefe_adscripcion" name="nombrejefe_adscripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entidad_adscripcion" class=" control-label">Entidad Federativa:<span class="text-danger">*</span></label>
                        <select class="form-control" id="entidad_adscripcion" name="entidad_adscripcion">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($entidad_federativa) ):
                                    foreach($entidad_federativa as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#entidad_adscripcion").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="municipio_adscripcion" class=" control-label">Municipio:<span class="text-danger">*</span></label>
                        <select class="form-control" id="municipio_adscripcion" name="municipio_adscripcion">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipio_adscripcion").select2({
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
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">ADSCRIPCION: DOMICILIO DE ADSCRIPCION</h3>

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
                        <label for="calle_adscripcion" class=" control-label">Calle:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="calle_adscripcion" name="calle_adscripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior_adscripcion" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="exterior_adscripcion" name="exterior_adscripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior_adscripcion" class=" control-label">No. Interior:</label>
                        <input type="text" class="form-control " id="interior_adscripcion" name="interior_adscripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoAds" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="coloniacodigoAds" name="coloniacodigoAds">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#coloniacodigoAds").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="entrecalle_adscripcion" class=" control-label">Entre la calle de:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="entrecalle_adscripcion" name="entrecalle_adscripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="ylacalle_adscripcion" class=" control-label">Y la calle:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="ylacalle_adscripcion" name="ylacalle_adscripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="telefono_adscripcion" class=" control-label">Número Telefonico:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="telefono_adscripcion" name="telefono_adscripcion" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoAds" class=" control-label">Código Postal:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="codigoAds" name="codigoAds" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5">
                    </div>
                </div>                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="federativa_adscripcion" class=" control-label">Entidad Federativa:<span class="text-danger">*</span></label>
                        <select class="form-control" id="federativa_adscripcion" name="federativa_adscripcion">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($entidad_federativa) ):
                                    foreach($entidad_federativa as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#federativa_adscripcion").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="delegacion_adscripcion" class=" control-label">Municipio o Delegación:<span class="text-danger">*</span></label>
                        <select class="form-control" id="delegacion_adscripcion" name="delegacion_adscripcion">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#delegacion_adscripcion").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoAds" class=" control-label">Ciudad o Poblacion:<span class="text-danger">*</span></label>
                        <select class="form-control" id="ciudadcodigoAds" name="ciudadcodigoAds">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ciudadcodigoAds").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header ">
        
        <h3 class="card-title">DATOS GENERALES: EXPERIENCIA DOCENTE</h3>
                         

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="form-check-input mt-2" id="btnNingunodged">
                 
            <a href="#" class="btn btn-tool form-check-label add-more-btn-dged" id="btnAdddged" >Agregar +</a>
            
            <button type="button" class="btn btn-tool" data-card-widget="collapse" >
                <i class="fas fa-minus"></i>
            </button>
        </div>           
    </div>
    
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="FormDatosGeneralesDocente">
        <div id="CardDatosGeneralesDocente">
            <div class="row form-block-dged">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombrecurso" class=" control-label">Nombre del Curso
                            :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nombrecurso" name="nombrecurso">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombreInstitucion" class=" control-label">Nombre de
                            la Institución:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nombreInstitucion" name="nombreInstitucion">
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_inicial">Fecha de Inicio: <span class="text-danger">*</span></label>
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
                        <label for="fecha_final">Fecha de Término: <span class="text-danger">*</span></label>
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
                            por:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="certificado_por" name="certificado_por">
                    </div>
                </div>
            </div>
        </div>
        <hr  class="mt-3 mb-3"/>
        <div id="CardDatosGeneralesDocenteB">
        </div>    
        </form>
    </div>
</div>
<div class="card-footer bg-transparent clearfix">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9">
            
        </div>
        <div class="col-12 col-sm-6 col-md-3 ">    
            <button id="saveDatosPersonales" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" ></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>    
</div>
<script>
    
    $('#saveDatosPersonales').click(function (event) {
        event.preventDefault();


        $('#load').addClass( "spinner-border" );

        var formData = new FormData($("form#DatosPersonales")[0]);

        if($('#btnNingunodged').is(':checked')) {
            val = 1;
            
        } else {
            val = 0;

            var formDataB = new FormData($("form#FormDatosGeneralesDocente")[0]);


            for (let [key, value] of formDataB.entries()) {
                formData.append(key, value);
            }
            
        }

        var formDataC = new FormData($("form#FormAdscripcion")[0]);


            for (let [key, value] of formDataC.entries()) {
                formData.append(key, value);
            }

        formData.append('expDocente', val);

        
        
        $.ajax({
            url: base_url + '/GuardarDatosPersonales',
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

                    $('#idPersonal').val(response.data.idPersonal);
                    toastr.success(response.succes.mensaje);

                    $('#saveDatosPersonales').addClass( "btn-success" );
                    $('#saveDatosPersonales').prop( "disabled",true );
                    $('#saveDatosPersonales').html( "Guardado&nbsp;<i class='fa fa-thumbs-up'></i>" ); 

                    $("html,body").animate({scrollTop: $("#cardRefFamCer").offset().top},2000);

                    $('#tabs a[href="#custom-tabs-five"]').trigger('click');

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

        $("input[name=app_csrf]").val('<?= csrf_hash() ?>');
            
    });


    
    $("#entidad_nacimiento").on('change', function(){
        getEstado(this.id)
    });

    $("#estadocodigo").on('change', function(){
        getEstado(this.id)
    });

    $("#entidad_adscripcion").on('change', function(){
        getEstado(this.id)
    });

    $("#federativa_adscripcion").on('change', function(){
        getEstado(this.id)
    });

    

    function getEstado(id)  {

        $('#load').addClass( "spinner-border" );
        
        var elemento = id;

        var estado = $('#'+elemento).val();


        switch (elemento) {
            case "entidad_nacimiento":
                
            var selectCiudadDom = document.querySelector("#cuidad_nacimiento")

            var selectMunicipioDom = document.querySelector("#municipio_nacimiento")

                selectCiudadDom.innerHTML = ''
                selectMunicipioDom.innerHTML = ''
            break;
            case "estadocodigo":
                
            
            var selectMunicipioDom = document.querySelector("#municipiocodigo")

                
                selectMunicipioDom.innerHTML = ''
            break;
            case "estadocodigoRefCer":
                
            
            var selectMunicipioDom = document.querySelector("#municipiocodigoRefCer")

                
                selectMunicipioDom.innerHTML = ''
            break;
            case "estadocodigoParCer":
                
            
            var selectMunicipioDom = document.querySelector("#municipiocodigoParCer")

                
                selectMunicipioDom.innerHTML = ''
            break;
            case "estadocodigoPersonal":
                
            
            var selectMunicipioDom = document.querySelector("#municipiocodigoPersonal")

                
                selectMunicipioDom.innerHTML = ''
            break;
            case "estadocodigoLaboral":
                
            
            var selectMunicipioDom = document.querySelector("#municipiocodigoLaboral")

                
                selectMunicipioDom.innerHTML = ''
            break;
            case "entidad_adscripcion":
                
            
            var selectMunicipioDom = document.querySelector("#municipio_adscripcion")

                
                selectMunicipioDom.innerHTML = ''
            break;
            case "federativa_adscripcion":
                
            
            var selectMunicipioDom = document.querySelector("#delegacion_adscripcion")

                
                selectMunicipioDom.innerHTML = ''
            break;

  
            }

        
        var csrfName = $("input[name=app_csrf]").val();
        
            var data    = {
                    estado : estado,
                    app_csrf: csrfName
                };

        $.ajax({
            url: base_url + '/getCiudadEstado',
            type: 'POST',
            dataType: 'json',
            data: data,
            data: data,
            ache: false,
            async: true,
            success: function (response) {
                if(response.succes.succes === "succes"){
                        
                        
                    switch (elemento) {
                    case "entidad_nacimiento":
                
                        
                        selectCiudadDom.innerHTML = response.data.ciudad
                        selectMunicipioDom.innerHTML = response.data.municipio
                    break;
                    case "estadocodigo":
                
                        
                        selectMunicipioDom.innerHTML = response.data.municipio
                    break;
                    case "estadocodigoRefCer":
                
                        
                        selectMunicipioDom.innerHTML = response.data.municipio
                    break;
                    case "estadocodigoParCer":
                
                        
                        selectMunicipioDom.innerHTML = response.data.municipio
                    break;
                    case "estadocodigoPersonal":
                
                        
                        selectMunicipioDom.innerHTML = response.data.municipio
                    break;
                    case "estadocodigoLaboral":
                
                        
                        selectMunicipioDom.innerHTML = response.data.municipio
                    break;
                    case "entidad_adscripcion":
                
                        
                        selectMunicipioDom.innerHTML = response.data.municipio
                    break;
                    case "federativa_adscripcion":
                
                        
                        selectMunicipioDom.innerHTML = response.data.municipio
                    break;
  
                     }
                    
                }

                

                $('#load').removeClass( "spinner-border" );
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError') ?>');
                           
            }
        });

        $("input[name=app_csrf]").val('<?= csrf_hash() ?>');
    };


    
    $("#codigo").on('keyup', function(){
        getSepomex(this.id)
    });

    $("#codigoAds").on('keyup', function(){
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
            
            switch (elemento) {
            case "codigo":
                
            var selectCiudadDom = document.querySelector("#ciudad"+elemento)

                selectCiudadDom.innerHTML = ''
                selectColoniaDom.innerHTML = ''
            break;
            case "codigoSegPub":
                 

                selectEstadoDom.innerHTML = ''
                selectMunicipioDom.innerHTML = ''
                selectColoniaDom.innerHTML = ''
            break;
            case "codigoEmpDiv":
                 

                selectEstadoDom.innerHTML = ''
                selectMunicipioDom.innerHTML = ''
                selectColoniaDom.innerHTML = ''
            break;
            case "codigoRefCer":
                
            var selectCiudadDom = document.querySelector("#ciudad"+elemento)

                
                selectCiudadDom.innerHTML = ''
                selectColoniaDom.innerHTML = ''
            break;
            case "codigoParCer":
                
            var selectCiudadDom = document.querySelector("#ciudad"+elemento)

                
                selectCiudadDom.innerHTML = ''
                selectColoniaDom.innerHTML = ''
            break;
            case "codigoPersonal":
                
            var selectCiudadDom = document.querySelector("#ciudad"+elemento)

                
                selectCiudadDom.innerHTML = ''
                selectColoniaDom.innerHTML = ''
            break;
            case "codigoLaboral":
                
            var selectCiudadDom = document.querySelector("#ciudad"+elemento)

                
                selectCiudadDom.innerHTML = ''
                selectColoniaDom.innerHTML = ''
            break;
            case "codigoAds":
                var selectCiudadDom = document.querySelector("#ciudad"+elemento)    
                selectCiudadDom.innerHTML = ''
                selectColoniaDom.innerHTML = ''
            break;
  
            }
            

            

        
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

                    switch (elemento) {
                    case "codigo":
                
                        
                        selectCiudadDom.innerHTML = response.data.ciudad
                        selectColoniaDom.innerHTML = response.data.colonia
                    break;
                    case "codigoSegPub":
                        
                        selectEstadoDom.innerHTML = response.data.estado
                        selectMunicipioDom.innerHTML = response.data.municipio
                        
                        selectColoniaDom.innerHTML = response.data.colonia

                
                    break;
                    case "codigoEmpDiv":
                        
                        selectEstadoDom.innerHTML = response.data.estado
                        selectMunicipioDom.innerHTML = response.data.municipio
                        
                        selectColoniaDom.innerHTML = response.data.colonia

                
                    break;
                    case "codigoRefCer":
                
                        
                        selectCiudadDom.innerHTML = response.data.ciudad
                        selectColoniaDom.innerHTML = response.data.colonia
                    break;
                    case "codigoParCer":
                
                        
                        selectCiudadDom.innerHTML = response.data.ciudad
                        selectColoniaDom.innerHTML = response.data.colonia
                    break;
                    case "codigoPersonal":
                
                        
                        selectCiudadDom.innerHTML = response.data.ciudad
                        selectColoniaDom.innerHTML = response.data.colonia
                    break;
                    case "codigoLaboral":
                
                        
                        selectCiudadDom.innerHTML = response.data.ciudad
                        selectColoniaDom.innerHTML = response.data.colonia
                    break;
                    case "codigoAds":
                
                        
                        selectCiudadDom.innerHTML = response.data.ciudad
                        selectColoniaDom.innerHTML = response.data.colonia
                    break;
  
                    }
                    
                    
                }


                

                $('#load').removeClass( "spinner-border" );
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError') ?>');
                           
            }
        });

        $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

    }
    };

    $(document).on('click','.add-more-btn-dged',function(){
    
    var clone = '<div class="row form-block-dged">                <div class="col-12 col-sm-12 col-md-6">                    <div class="form-group">                        <label for="nombrecursoB" class=" control-label">Nombre del Curso                            :<span class="text-danger">*</span></label>                        <input type="text" class="form-control " id="nombrecursoB" name="nombrecursoB">                    </div>                </div>                <div class="col-12 col-sm-12 col-md-6">                    <div class="form-group">                        <label for="nombreInstitucionB" class=" control-label">Nombre de                            la Institución:<span class="text-danger">*</span></label>                        <input type="text" class="form-control " id="nombreInstitucionB" name="nombreInstitucionB">                    </div>                </div>                <div class="col-12 col-sm-6">                    <div class="form-group">                        <label for="fecha_inicialB">Fecha de Inicio: <span class="text-danger">*</span></label>                        <div class="input-group date" id="fecha_inicialB" data-target-input="nearest">                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_inicialB" id="datetime-fecha_inicialB" name="fecha_inicialB" placeholder="" value="" />                            <div class="input-group-append" data-target="#fecha_inicialB" data-toggle="datetimepicker">                                <div class="input-group-text"><i class="far fa-calendar"></i></div>                            </div>                        </div>                        <script type="text/javascript">                            $(function() {                                $("#fecha_inicialB").datetimepicker({                                    format: "DD-MM-YYYY",                                    locale: moment.locale("es")                                });                            });                        <\/script>                    </div>                </div>                <div class="col-12 col-sm-6">                    <div class="form-group">                        <label for="fecha_finalB">Fecha de Término: <span class="text-danger">*</span></label>                        <div class="input-group date" id="fecha_finalB" data-target-input="nearest">                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_finalB" id="datetime-fecha_finalB" name="fecha_finalB" placeholder="" value="" />                            <div class="input-group-append" data-target="#fecha_finalB" data-toggle="datetimepicker">                                <div class="input-group-text"><i class="far fa-calendar"></i></div>                            </div>                        </div>                        <script type="text/javascript">                            $(function() {                                $("#fecha_finalB").datetimepicker({                                    format: "DD-MM-YYYY",                                    locale: moment.locale("es")                                });                            });                        <\/script>                    </div>                </div>                <div class="col-12 col-sm-12 col-md-12">                    <div class="form-group">                        <label for="certificado_porB" class=" control-label">Certificado                            por:<span class="text-danger">*</span></label>                        <input type="text" class="form-control " id="certificado_porB" name="certificado_porB">                    </div>                </div>            </div>';
    $('#CardDatosGeneralesDocenteB').append(clone);
    setTimeout(function () { $("#nombrecursoB").focus() }, 300);
    $('#btnAdddged').removeClass('add-more-btn');
    $('#btnAdddged').addClass('remove-more-btn');
    $('#btnAdddged').text('Remover -');


});

$(document).on('click','.remove-more-btn',function(){    
    $('#CardDatosGeneralesDocenteB').empty();
    setTimeout(function () { $("#nombrecurso").focus() }, 300);
    $('#btnAdddged').removeClass('remove-more-btn');
    $('#btnAdddged').addClass('add-more-btn');
    $('#btnAdddged').text('Agregar +');
});

$(document).on('click','#btnNingunodged',function(){ 

        if($('#btnNingunodged').is(':checked')) {


            $('#FormDatosGeneralesDocente input').attr('disabled','disabled');
            $('#FormDatosGeneralesDocente select').attr('disabled','disabled');
        } else {
            $('#FormDatosGeneralesDocente input').attr('disabled',false);
            $('#FormDatosGeneralesDocente select').attr('disabled',false);
        }
        
        
    });

</script>