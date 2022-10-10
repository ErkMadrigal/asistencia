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
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="modoNa" class=" control-label">Modo de Nacionalidad combo:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="modoNa" name="modoNa">
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
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="pais" class=" control-label">País de Nacimiento combo:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="pais" name="pais">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entidad" class=" control-label">Entidad de Nacimiento combo:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="entidad" name="entidad">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nacionalidad" class=" control-label">Nacionalidad combo :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nacionalidad" name="nacionalidad">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="estadoCivil" class=" control-label">Estado Civil combo :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="estadoCivil" name="estadoCivil">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="desarrolloA" class=" control-label">Desarrollo Académico combo :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="desarrolloA" name="desarrolloA">
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
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="ylacalle" class=" control-label">Y la calle :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="ylacalle" name="ylacalle">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="codigo" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="codigo" name="codigo">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero
                            Telefónico:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="numero" name="numero">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="entidadF" class=" control-label">Entidad Federativa
                            combo:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="entidadF" name="entidadF">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="municipio" class=" control-label">Municipio
                            combo:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="municipio" name="municipio">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="ciudad" class=" control-label">Ciudad combo:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="ciudad" name="cuidad">
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