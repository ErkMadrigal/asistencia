<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS PERSONALES</h3>

        <div class="card-tools">
            <input type="hidden" class="form-control " id="idPersonal" name="idPersonal">
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
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <?= isset($variable->segundo_nombre) ? $variable->segundo_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoPaterno" class=" control-label">Apellido Paterno:</label>
                        <div>
                            <?= isset($variable->apellido_paterno) ? $variable->apellido_paterno : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno:</label>
                        <div>
                            <?= isset($variable->apellido_materno) ? $variable->apellido_materno : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_nacimiento">Fecha de Nacimiento: </label>
                        <div>
                            <?= isset($variable->fecha_nacimiento) ? $variable->fecha_nacimiento : ''  ?>
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
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="sexo" class=" control-label">Sexo:</label>
                    <div>
                        <?= isset($variable->sexo) ? $variable->sexo : ''  ?>
                    </div>
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
                    <div>
                        <?= isset($variable->rfc) ? $variable->rfc : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="claveE" class=" control-label">Clave Electoral:</label>
                    <div>
                        <?= isset($variable->clave_electoral) ? $variable->clave_electoral : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="cartilla" class=" control-label">Cartilla SMN:</label>
                    <div>
                        <?= isset($variable->cartilla_smn) ? $variable->cartilla_smn : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="licencia" class=" control-label">Licencia de Conducir:</label>
                    <div>
                        <?= isset($variable->licencia_conducir) ? $variable->licencia_conducir : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6    '>
                <div class="form-group">
                    <label for="vigenciaLic" class=" control-label">Vigencia de Licencia:</label>
                    <div class="input-group date" id="vigenciaLic" data-target-input="nearest">
                        <div>
                            <?= isset($variable->vigencia_licencia) ? $variable->vigencia_licencia : ''  ?>
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
                    <div>
                        <?= isset($variable->curp) ? $variable->curp : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="pasaporte" class=" control-label">Pasaporte:</label>
                    <div>
                        <?= isset($variable->pasaporte) ? $variable->pasaporte : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="modo_nacionalidad" class="control-label">Modo de Nacionalidad: </label>
                    <div>
                            <div>
                                <?= isset($variable->nacionalidad) ? $variable->nacionalidad : ''  ?>
                            </div>
                       
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
                        <div>
                            <?= isset($variable->fecha_naturalizacion) ? $variable->fecha_naturalizacion : ''  ?>
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
                            <div>
                                <?= isset($variable->pais) ? $variable->pais : ''  ?>
                            </div>
                        
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
                            <div>
                                <?= isset($variable->naciE) ? $variable->naciE : ''  ?>
                            </div>
                      
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
                            <div>
                                <?= isset($variable->nacion) ? $variable->nacion : ''  ?>
                            </div>
                        
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
                            <div>
                                <?= isset($variable->municipio) ? $variable->municipio : ''  ?>
                            </div>
                       
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
                            <div>
                                <?= isset($variable->ciudad) ? $variable->ciudad : ''  ?>
                            </div>
                      
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
                            <div>
                                <?= isset($variable->civil) ? $variable->civil : ''  ?>
                            </div>
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
                            <div>
                                <?= isset($variable->desarrollo_academico) ? $variable->desarrollo_academico : ''  ?>
                            </div>
                        
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
                    <div>
                        <?= isset($variable->escuela) ? $variable->escuela : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="especialidad" class=" control-label">Especialidad o Estudio :</label>
                    <div>
                        <?= isset($variable->especialidad) ? $variable->especialidad : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="cedula" class=" control-label">No. Cédula Profesional:</label>
                    <div>
                        <?= isset($variable->cedula_profesional) ? $variable->cedula_profesional : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label for="anno_inicio">Año de Inicio: </label>
                    <div class="input-group date" id="anno_inicio" data-target-input="nearest">
                        <div>
                            <?= isset($variable->año_inicio) ? $variable->año_inicio : ''  ?>
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
                        <div>
                            <?= isset($variable->año_termino) ? $variable->año_termino : ''  ?>
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
                        <div>
                            <?= isset($variable->registro_sep) ? $variable->registro_sep : ''  ?>
                        </div>
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
                    <div>
                        <?= isset($variable->folio_certificado) ? $variable->folio_certificado : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="promedio" class=" control-label">Promedio :</label>
                    <div>
                        <?= isset($variable->segundo_nombre) ? $variable->segundo_nombre : ''  ?>
                    </div>
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
                    <div>
                        <?= isset($variable->calle) ? $variable->calle : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="exterior" class=" control-label">No. Exterior:</label>
                    <div>
                        <?= isset($variable->numero_exterior) ? $variable->numero_exterior : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="interior" class=" control-label">No. Interior:</label>
                    <div>
                        <?= isset($variable->numero_interior) ? $variable->numero_interior : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="numeroTelefono" class=" control-label">Numero
                        Telefónico:</label>
                    <div>
                        <?= isset($variable->numero_telefono) ? $variable->numero_telefono : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="entrecalle" class=" control-label">Entre la calle
                        de:</label>
                    <div>
                        <?= isset($variable->entre_calle1) ? $variable->entre_calle1 : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="ylacalle" class=" control-label">Y la calle :</label>
                    <div>
                        <?= isset($variable->entre_calle2) ? $variable->entre_calle2 : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigo" class=" control-label">Código Postal :</label>
                    <div>
                        <?= isset($variable->postal) ? $variable->postal : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigo" class=" control-label">Colonia:</label>
                        <div>
                            <?= isset($variable->colonia) ? $variable->colonia : ''  ?>
                        </div>
                    
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
                            <div>
                                <?= isset($variable->naciE) ? $variable->naciE : ''  ?>
                            </div>
                     
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
                            <div>
                                <?= isset($variable->municipio) ? $variable->municipio : ''  ?>
                            </div>
                        
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
                            <div>
                                <?= isset($variable->ciudad) ? $variable->ciudad : ''  ?>
                            </div>
                       
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
                    <div>
                        <?= isset($variable->nombre_curso) ? $variable->nombre_curso : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="nombreInstitucion" class=" control-label">Nombre de
                        la Institución:</label>
                    <div>
                        <?= isset($variable->nombre_institucion) ? $variable->nombre_institucion : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label for="fecha_inicial">Fecha de Inicio: </label>
                    <div class="input-group date" id="fecha_inicial" data-target-input="nearest">
                        <div>
                            <?= isset($variable->fecha_inicio) ? $variable->fecha_inicio : ''  ?>
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
                        <div>
                            <?= isset($variable->fecha_termino) ? $variable->fecha_termino : ''  ?>
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
                    <div>
                        <?= isset($variable->certificado_por) ? $variable->certificado_por : ''  ?>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>