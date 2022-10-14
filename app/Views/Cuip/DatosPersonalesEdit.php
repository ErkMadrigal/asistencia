<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS PERSONALES</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="primerNombre" name="primerNombre">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nombre" name="nombre">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoPaterno" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="calle" name="calle">
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
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_nacimiento" id="datetime-fecha_nacimiento" name="fecha_nacimiento" placeholder="" value="" />
                            <div class="input-group-append" data-target="#otrogado_estimulo" data-toggle="datetimepicker">
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
                        <label for="sexo" class=" control-label"> sexo aqui va combo:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="sexo" name="sexo">

                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rfc" class=" control-label">R.F.C.:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="rfc" name="rfc">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="claveE" class=" control-label">Clave Electoral:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="claveE" name="claveE">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="cartilla" class=" control-label">Cartilla SMN:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="cartilla" name="cartilla">
                    </div>
                </div>
                <div class='col-6 col-sm-6 col-md-4'>
                    <div class="form-group">
                        <label for="licencia" class=" control-label">Licencia de Conducir:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="licencia" name="licencia">
                    </div>
                </div>
                <div class='col-6 col-sm-6 col-md-4'>
                    <div class="form-group">
                        <label for="vigenciaLic" class=" control-label">Vigencia de Licencia:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="vigenciaLic" name="vigenciaLic">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="CURP" class=" control-label">CURP:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="CURP" name="CURP">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="pasaporte" class=" control-label">Pasaporte:<span class="text-danger">*</span></label>
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
                        <label for="fecha_naturalizacion">Fecha de Naturalización: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
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
                        <label for="entidad_nacimiento" class="control-label">Entidad de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="entidad_nacimiento" name="entidad_nacimiento">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($entidad_nacimiento) ):
                                    foreach($entidad_nacimiento as  $a){
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
                        <label for="municipio_nacimiento" class="control-label">Municipio de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="municipio_nacimiento" name="municipio_nacimiento">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($municipio_nacimiento) ):
                                    foreach($municipio_nacimiento as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
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
                        <label for="cedula" class=" control-label">No. Cédula Profesional:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="cedula" name="cedula">
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="anno_inicio">Año de Inicio: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#anno_inicio" id="datetime-anno_inicio" name="anno_inicio" placeholder="" value="" />
                            <div class="input-group-append" data-target="#anno_inicio" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#anno_inicio").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="anno_termino">Año de Termino: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#anno_termino" id="datetime-anno_termino" name="anno_termino" placeholder="" value="" />
                            <div class="input-group-append" data-target="#anno_termino" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#anno_termino").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="sep" class=" control-label">Registro SEP combo :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="sep" name="sep">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="certificado" class=" control-label">Num. de Folio Certificado :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="certificado" name="certificado">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="promedio" class=" control-label">Promedio :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="promedio" name="promedio">
                    </div>
                </div>
            </div>
        </form>
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
        <form class="form-horizontal" id="">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="calle" name="calle">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="exterior" name="exterior">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="interior" name="interior">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="colonia" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="colonia" name="colonia">
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
                        <input type="text" class="form-control " id="codigo" name="codigo">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero
                            Telefónico:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="numero" name="numero">
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="entidad_federativa" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="entidad_federativa" name="entidad_federativa">
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
                                    $("#entidad_federativa").select2({
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
                        <label for="municipio" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="municipio" name="municipio">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($municipio) ):
                                    foreach($municipio as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipio").select2({
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
                        <label for="ciudad" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="ciudad" name="ciudad">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($ciudad) ):
                                    foreach($ciudad as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ciudad").select2({
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
        <h3 class="card-title">DATOS GENERALES: EXPERIENCIA DOCENTE</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="">
            <div class="row">
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
                            laInstitución:<span class="text-danger">*</span></label>
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
                        <label for="certificado" class=" control-label">Certificado
                            por:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="certificado" name="certificado">
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
            <button id="editEmpresa" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" ></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>    
</div>