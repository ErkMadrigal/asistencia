<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="col-md-12">
    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-five-overlay-tab" data-toggle="pill"
                        href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay"
                        aria-selected="true">Datos Personales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill"
                        href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark"
                        aria-selected="false">Socio Economico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-tab" data-toggle="pill"
                        href="#custom-tabs-five" role="tab" aria-controls="custom-tabs-five-normal"
                        aria-selected="false">Referencias Personales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill"
                        href="#custom-tabs" role="tab" aria-controls="custom-tabs-five-normal"
                        aria-selected="false">Primera Entrevista</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-normal-tab" data-toggle="pill"
                        href="#custom-tabs-five-normal" role="tab" aria-controls="custom-tabs-five"
                        aria-selected="false">Segunda Entrevista</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content" id="custom-tabs-five-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-five-overlay" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-tab">
                    <div class="overlay-wrapper">
                        <div class="row">
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="primerNombre" class="control-label">Primer Nombre: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="primerNombre" name="primerNombre">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="segundoNombre" class=" control-label">Segundo Nombre: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="nombre" name="nombre">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="apellidoPaterno" class=" control-label">Apellido Paterno:</label>
                                    <input type="text" class="form-control " id="calle" name="calle">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="apellidoMaterno" class=" control-label">Apellido Materno:</label>
                                    <input type="text" class="form-control " id="apellidoMaterno"
                                        name="apellidoMaterno">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="fechaN" class=" control-label">Fecha de Nacimiento:</label>
                                    <input type="text" class="form-control " id="fechaN" name="fechaN">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="sexo" class=" control-label"> sexo aqui va combo:</label>
                                    <input type="text" class="form-control " id="sexo" name="sexo">

                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="rfc" class=" control-label">R.F.C.:</label>
                                    <input type="text" class="form-control " id="rfc" name="rfc">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="claveE" class=" control-label">Clave Electoral:</label>
                                    <input type="text" class="form-control " id="claveE" name="claveE">
                                </div>
                            </div>
                            <div class='col-6 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="cartilla" class=" control-label">Cartilla SMN:</label>
                                    <input type="text" class="form-control " id="cartilla" name="cartilla">
                                </div>
                            </div>
                            <div class='col-6 col-sm-6 col-md-4'>
                                <div class="form-group">
                                    <label for="licencia" class=" control-label">Licencia de Conducir:</label>
                                    <input type="text" class="form-control " id="licencia" name="licencia">
                                </div>
                            </div>
                            <div class='col-6 col-sm-6 col-md-4'>
                                <div class="form-group">
                                    <label for="vigenciaLic" class=" control-label">Vigencia de Licencia:</label>
                                    <input type="text" class="form-control " id="vigenciaLic" name="vigenciaLic">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="CURP" class=" control-label">CURP:</label>
                                    <input type="text" class="form-control " id="CURP" name="CURP">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="pasaporte" class=" control-label">Pasaporte:</label>
                                    <input type="text" class="form-control " id="pasaporte" name="pasaporte">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="modoNa" class=" control-label">Modo de Nacionalidad combo:</label>
                                    <input type="text" class="form-control " id="modoNa" name="modoNa">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="fechaNaturali" class=" control-label">Fecha Naturalización:</label>
                                    <input type="text" class="form-control " id="fechaNaturali" name="fechaNaturali">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="pais" class=" control-label">País de Nacimiento combo:</label>
                                    <input type="text" class="form-control " id="pais" name="pais">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="entidad" class=" control-label">Entidad de Nacimiento combo:</label>
                                    <input type="text" class="form-control " id="entidad" name="entidad">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="nacionalidad" class=" control-label">Nacionalidad combo :</label>
                                    <input type="text" class="form-control " id="nacionalidad" name="nacionalidad">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="estadoCivil" class=" control-label">Estado Civil combo :</label>
                                    <input type="text" class="form-control " id="estadoCivil" name="estadoCivil">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="desarrolloA" class=" control-label">Desarrollo Académico combo :</label>
                                    <input type="text" class="form-control " id="desarrolloA" name="desarrolloA">
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
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="inicio" class=" control-label">Año de Inicio :</label>
                                    <input type="text" class="form-control " id="inicio" name="inicio">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="termino" class=" control-label">Año de Termino :</label>
                                    <input type="text" class="form-control " id="termino" name="termino">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="sep" class=" control-label">Registro SEP combo :</label>
                                    <input type="text" class="form-control " id="sep" name="sep">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="certificado" class=" control-label">Num. de Folio Certificado :</label>
                                    <input type="text" class="form-control " id="certificado" name="certificado">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="promedio" class=" control-label">Promedio :</label>
                                    <input type="text" class="form-control " id="promedio" name="promedio">
                                </div>
                            </div>
                            <div class="info-box mb-3  bg-primary mt-3" style="opacity:.6;">
                                <div class="info-box-content">DATOS DEL DOMICILIO</div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="calle" class=" control-label">Calle :</label>
                                    <input type="text" class="form-control " id="calle" name="calle">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="exterior" class=" control-label">No. Exterior:</label>
                                    <input type="text" class="form-control " id="exterior" name="exterior">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="interior" class=" control-label">No. Interior:</label>
                                    <input type="text" class="form-control " id="interior" name="interior">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="colonia" class=" control-label">Colonia:</label>
                                    <input type="text" class="form-control " id="colonia" name="colonia">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="entrecalle" class=" control-label">Entre la calle de:</label>
                                    <input type="text" class="form-control " id="entrecalle" name="entrecalle">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="ylacalle" class=" control-label">Y la calle :</label>
                                    <input type="text" class="form-control " id="ylacalle" name="ylacalle">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="codigo" class=" control-label">Código Postal :</label>
                                    <input type="text" class="form-control " id="codigo" name="codigo">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="numero" class=" control-label">Numero Telefónico:</label>
                                    <input type="text" class="form-control " id="numero" name="numero">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="entidadF" class=" control-label">Entidad Federativa combo:</label>
                                    <input type="text" class="form-control " id="entidadF" name="entidadF">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="municipio" class=" control-label">Municipio combo:</label>
                                    <input type="text" class="form-control " id="municipio" name="municipio">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="ciudad" class=" control-label">Ciudad combo:</label>
                                    <input type="text" class="form-control " id="ciudad" name="cuidad">
                                </div>
                            </div>
<div class="card card-primary">
    <div class="card-header" >
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
                    <label for="nombrecurso" class=" control-label">Nombre del Curso :</label>
                    <input type="text" class="form-control " id="nombrecurso" name="nombrecurso">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="nombreInstitucion" class=" control-label">Nombre de laInstitución:</label>
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
                        $(function () {
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
                        $(function () {
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
                    <label for="certificado" class=" control-label">Certificado por:</label>
                    <input type="text" class="form-control " id="certificado" name="certificado">
                </div>
            </div>
        </div>
        </form>    
    </div>
</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-9 ">
                        </div>
                        <div class="col-12 col-sm-12 col-md-3">
                            <button type="button" id="SaveProveedor" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>


                </div>

                <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                    <div class="card-body table-responsive ">
                    <div class="row">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="familia" class="control-label">¿Vive con su Familia? combo: <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="familia" name="familia">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="ingreso" class=" control-label">Ingreso familiar adicional (Mensual):</label>
                            <input type="text" class="form-control " id="ingreso" name="ingreso">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="domicilio" class=" control-label">Su domicilio es combo:</label>
                            <input type="text" class="form-control " id="domicilio" name="domicilio">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="actividad" class=" control-label">Actividades culturales o deportivas que practique:</label>
                            <input type="text" class="form-control " id="actividad" name="actividad">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="especificacion" class=" control-label">Especifiación de inmueble y costo:</label>
                            <input type="text" class="form-control " id="especificacion" name="especificacion">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="inversion" class=" control-label">Inversiones y monto aproximado:</label>
                            <input type="text" class="form-control " id="inversion" name="inversion">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="vehiculo" class=" control-label">Vehiculo y costo Aproximado:</label>
                            <input type="text" class="form-control " id="vehiculo" name="vehiculo">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="calidad" class=" control-label">Calidad de Vida:</label>
                            <input type="text" class="form-control " id="calidad" name="calidad">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="vicio" class=" control-label">Vicios:</label>
                            <input type="text" class="form-control " id="vicio" name="vicio">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="imagen" class=" control-label">Imagen Publica:</label>
                            <input type="text" class="form-control " id="imagen" name="imagen">
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="comportamiento" class=" control-label">Comportamiento Social:</label>
                            <input type="text" class="form-control " id="comportamiento" name="comportamiento">
                        </div>
                    </div>
                    <div class="info-box mb-3  bg-primary mt-3" style="opacity:.6;">
                                <div class="info-box-content">DATOS DEL CONYUGE Y DEPENDIENTES ECONÓMICOS</div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="apellidoPaterno" class=" control-label">Apellido Paterno:</label>
                                    <input type="text" class="form-control " id="calle" name="calle">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="apellidoMaterno" class=" control-label">Apellido Materno:</label>
                                    <input type="text" class="form-control " id="apellidoMaterno"
                                        name="apellidoMaterno">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="primerNombre" class="control-label">Primer Nombre: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="primerNombre" name="primerNombre">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="segundoNombre" class=" control-label">Segundo Nombre: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="nombre" name="nombre">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="fechaN" class=" control-label">Fecha de Nacimiento:</label>
                                    <input type="text" class="form-control " id="fechaN" name="fechaN">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="sexo" class=" control-label"> sexo aqui va combo:</label>
                                    <input type="text" class="form-control " id="sexo" name="sexo">

                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="parentesco" class=" control-label"> Parentesco aqui va combo:</label>
                                    <input type="text" class="form-control " id="parentesco" name="parentesco">

                                </div>
                            </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-9 ">
                </div>
                <div class="col-12 col-sm-12 col-md-3">
                    <button type="button" id="SaveProveedor" class="btn btn-primary">Guardar</button>
                </div>
            </div> 
        </div>
            

            <div class="tab-pane fade" id="custom-tabs-five" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                    <div class="custom-tabs-five">
                    <div class="row">
                    <div class="info-box mb-3  bg-primary mt-3" style="opacity:.6;">
                                <div class="info-box-content">EMPLEOS EN SEGURIDAD PUBLICA</div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Dependencia" class=" control-label">Dependencia:</label>
                                    <input type="text" class="form-control " id="Dependencia" name="Dependencia">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Corporación" class=" control-label">Corporación:</label>
                                    <input type="text" class="form-control " id="Corporación" name="Corporación">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="primerNombre" class="control-label">Primer Nombre: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="primerNombre" name="primerNombre">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="segundoNombre" class=" control-label">Segundo Nombre: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="nombre" name="nombre">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="calle" class=" control-label">Calle :</label>
                                    <input type="text" class="form-control " id="calle" name="calle">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="exterior" class=" control-label">No. Exterior:</label>
                                    <input type="text" class="form-control " id="exterior" name="exterior">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="interior" class=" control-label">No. Interior:</label>
                                    <input type="text" class="form-control " id="interior" name="interior">
                                </div>
                            </div>
                            
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="colonia" class=" control-label">Colonia:</label>
                                    <input type="text" class="form-control " id="colonia" name="colonia">
                                </div>
                            </div>
                            
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="codigo" class=" control-label">Código Postal :</label>
                                    <input type="text" class="form-control " id="codigo" name="codigo">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="numero" class=" control-label">Numero Telefónico:</label>
                                    <input type="text" class="form-control " id="numero" name="numero">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="Ingreso" class=" control-label">Ingreso:</label>
                                    <input type="text" class="form-control " id="Ingreso" name="Ingreso">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-4'>
                                <div class="form-group">
                                    <label for="Separación" class=" control-label">Separación:</label>
                                    <input type="text" class="form-control " id="Separación" name="Separación">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-12'>
                                <div class="form-group">
                                    <label for="puesto" class=" control-label">Puesto Funcional:</label>
                                    <input type="text" class="form-control " id="puesto" name="puesto">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-12'>
                                <div class="form-group">
                                    <label for="Funciones" class=" control-label">Funciones:</label>
                                    <input type="text" class="form-control " id="Funciones" name="Funciones">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-12'>
                                <div class="form-group">
                                    <label for="Especialidad" class=" control-label">Especialidad:</label>
                                    <input type="text" class="form-control " id="Especialidad" name="Especialidad">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-12'>
                                <div class="form-group">
                                    <label for="Rango" class=" control-label">Rango o categoría:</label>
                                    <input type="text" class="form-control " id="Rango" name="Rango">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="placa" class=" control-label">Numero de placa:</label>
                                    <input type="text" class="form-control " id="placa" name="placa">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="sueldo" class=" control-label">Sueldo Base (Mensual):</label>
                                    <input type="text" class="form-control " id="sueldo" name="sueldo">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Compensaciones" class=" control-label">Compensaciones (Mensual):</label>
                                    <input type="text" class="form-control " id="Compensaciones" name="Compensaciones">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Area" class=" control-label">Area:</label>
                                    <input type="text" class="form-control " id="Area" name="Area">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="division" class=" control-label">División:</label>
                                    <input type="text" class="form-control " id="division" name="division">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="jefe" class=" control-label">CUIP Jefe Inmediato:</label>
                                    <input type="text" class="form-control " id="jefe" name="jefe">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="nombrejefe" class=" control-label">Nombre del Jefe Inmediato:</label>
                                    <input type="text" class="form-control " id="nombrejefe" name="nombrejefe">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Entidad" class=" control-label">Entidad Federativa:</label>
                                    <input type="text" class="form-control " id="Entidad" name="Entidad">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Municipio" class=" control-label">Municipio:</label>
                                    <input type="text" class="form-control " id="Municipio" name="Municipio">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="motivoseparacion" class=" control-label">Motivo de separación:</label>
                                    <input type="text" class="form-control " id="motivoseparacion" name="motivoseparacion">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="tiposepracion" class=" control-label">Tipo de Separación:</label>
                                    <input type="text" class="form-control " id="tiposepracion" name="tiposepracion">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="tipoarea" class=" control-label">Tipo de Baja:</label>
                                    <input type="text" class="form-control " id="tipoarea" name="tipoarea">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-12'>
                                <div class="form-group">
                                    <label for="Comentarios" class=" control-label">Comentarios:</label>
                                    <input type="text" class="form-control " id="Comentarios" name="Comentarios">
                                </div>
                            </div>



                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-9 ">
                </div>
                <div class="col-12 col-sm-12 col-md-3">
                    <button type="button" id="SaveProveedor" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
                  
            <div class="tab-pane fade" id="custom-tabs-five-normal" role="tabpanel" aria-labelledby="custom-tabs-five-normal-tab">
                    <div class="row">
                    <div class="info-box mb-3  bg-primary mt-3" style="opacity:.6;">
                                <div class="info-box-content">ESTATUS APROBACIÓN</div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="fechaentrevista" class=" control-label">Fecha de entrevista:</label>
                                    <input type="text" class="form-control " id="fechaentrevista" name="fechaentrevista">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="rrhh" class=" control-label">Aprobación RRHH:</label>
                                    <input type="text" class="form-control " id="rrhh" name="rrhh">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="aprobacion" class=" control-label">Aprobación Gte. Solicitante:</label>
                                    <input type="text" class="form-control " id="aprobacion" name="aprobacion">
                                </div>
                            </div>
                            <div class="info-box mb-3  bg-primary mt-3" style="opacity:.6;">
                                <div class="info-box-content">ELEMENTOS DE PRESENTACION Y ASPECTO FISICO</div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="fisica" class=" control-label">Imagen Física:</label>
                                    <input type="text" class="form-control " id="fisica" name="fisica">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="formasentarse" class=" control-label">Forma de entrar y sentarse:</label>
                                    <input type="text" class="form-control " id="formasentarse" name="formasentarse">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="personal" class=" control-label">Cuidado personal:</label>
                                    <input type="text" class="form-control " id="personal" name="personal">
                                </div>
                            </div>
                            <div class="info-box mb-3  bg-primary mt-3" style="opacity:.6;">
                                <div class="info-box-content">COMUNICACIÓN NO VERBAL A LO LARGO DE LA ENTREVISTA</div>
                    </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="contacto" class=" control-label">Contacto Visual:</label>
                                    <input type="text" class="form-control " id="contacto" name="contacto">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="formasaludar" class=" control-label">Forma de saludar:</label>
                                    <input type="text" class="form-control " id="formasaludar" name="formasaludar">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="tono" class=" control-label">Tono volumen y timbre de voz:</label>
                                    <input type="text" class="form-control " id="tono" name="tono">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="formadesentarse" class=" control-label">Forma de sentarse:</label>
                                    <input type="text" class="form-control " id="formadesentarse" name="formadesentarse">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="formademoverse" class=" control-label">Forma de moverse:</label>
                                    <input type="text" class="form-control " id="formademoverse" name="formademoverse">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Gesticulación" class=" control-label">Gesticulación:</label>
                                    <input type="text" class="form-control " id="Gesticulación" name="Gesticulación">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Movimiento" class=" control-label">Movimiento manos y brazos:</label>
                                    <input type="text" class="form-control " id="Movimiento" name="Movimiento">
                                </div>
                            </div>
                            <div class="info-box mb-3  bg-primary mt-3" style="opacity:.6;">
                                <div class="info-box-content">COMUNICACIÓN VERBAL A LO LARGO DE LA ENTREVISTA</div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Fluidez" class=" control-label">Fluidez verbal:</label>
                                    <input type="text" class="form-control " id="Fluidez" name="Fluidez">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="vocabulario" class=" control-label">Riqueza de vocabulario:</label>
                                    <input type="text" class="form-control " id="vocabulario" name="vocabulario">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="comunicación" class=" control-label">Precisión de la comunicación:</label>
                                    <input type="text" class="form-control " id="comunicación" name="comunicación">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="sentimientos" class=" control-label">Capacitad para expresar sentimientos:</label>
                                    <input type="text" class="form-control " id="sentimientos" name="sentimientos">
                                </div>
                            </div>
                            <div class="info-box mb-3  bg-primary mt-3" style="opacity:.6;">
                                <div class="info-box-content">COMPETENCIAS GENERALES DEL PERFIL</div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="cliente" class=" control-label">Atención al cliente:</label>
                                    <input type="text" class="form-control " id="cliente" name="cliente">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Influencia" class=" control-label">Influencia y negociación:</label>
                                    <input type="text" class="form-control " id="Influencia" name="Influencia">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Persuasivo" class=" control-label">Persuasivo:</label>
                                    <input type="text" class="form-control " id="Persuasivo" name="Persuasivo">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="eficaz" class=" control-label">Comunicación eficaz:</label>
                                    <input type="text" class="form-control " id="eficaz" name="eficaz">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="equipo" class=" control-label">Trabajo en equipo:</label>
                                    <input type="text" class="form-control " id="equipo" name="equipo">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="cierreacuerdos" class=" control-label">Cierre de acuerdos:</label>
                                    <input type="text" class="form-control " id="cierreacuerdos" name="cierreacuerdos">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 ">
                            <button type="button" id="SaveProveedor" class="btn btn-primary">Aprobar</button>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <button type="button" id="SaveProveedor" class="btn btn-primary">Rechazar</button>
                                    </div>
                
            </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-9 ">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-3">
                                        <button type="button" id="SaveProveedor" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
            
            </div>


            <div class="tab-pane fade" id="custom-tabs" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                    <div class="row">
                    <div class="info-box mb-3  bg-primary mt-3" style="opacity:.6;">
                                <div class="info-box-content">PERFIL DEL CANDIDATO</div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="vacante" class=" control-label">Vacante a participar:</label>
                                    <input type="text" class="form-control " id="vacante" name="vacante">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="Pefil" class=" control-label">Pefil combo:</label>
                                    <input type="text" class="form-control " id="Pefil" name="Pefil">
                                </div>
                            </div>
                            <div class="info-box mb-3  bg-primary mt-3" style="opacity:.6;">
                                <div class="info-box-content">COMENTARIOS RECLUTADOR</div>
                    </div>
                            <div class='col-12 col-sm-12 col-md-12'>
                                <div class="form-group">
                                    <label for="nombrejefe" class=" control-label">Evaluación:</label>
                                    <input type="text" class="form-control " id="nombrejefe" name="nombrejefe">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-12'>
                                <div class="form-group">
                                    <label for="Entidad" class=" control-label">Entidad Federativa:</label>
                                    <input type="text" class="form-control " id="Entidad" name="Entidad">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-12'>
                                <div class="form-group">
                                    <label for="evaluacion" class=" control-label">Valores Evaluación:</label>
                                    <input type="text" class="form-control " id="evaluacion" name="evaluacion">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-12'>
                                <div class="form-group">
                                    <label for="Escala" class=" control-label">Escala de Evaluación:</label>
                                    <input type="text" class="form-control " id="Escala" name="Escala">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-12'>
                                <div class="form-group">
                                    <label for="fechaentrevista" class=" control-label">Fecha de entrevista:</label>
                                    <input type="text" class="form-control " id="fechaentrevista" name="fechaentrevista">
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="formatoevaluacion" class=" control-label">Formato Evaluación:</label>
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-6'>
                                <div class="form-group">
                                    <label for="formatoevaluacion" class=" control-label">Formato Evaluación:</label>
                                </div>
                            </div>
                            <div class='col-12 col-sm-12 col-md-12'>
                                <div class="form-group">
                                    <label for="comentariosreclutador" class=" control-label">COMENTARIOS RECLUTADOR:</label>
                                    <input type="text" class="form-control " id="comentariosreclutador" name="comentariosreclutador">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3">
                                        <button type="button" id="SaveProveedor" class="btn btn-primary">Continuar Proceso</button>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-3">
                                        <button type="button" id="SaveProveedor" class="btn btn-primary">Rechazar</button>
                                    </div>

                
            </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-9 ">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-3">
                                        <button type="button" id="SaveProveedor" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>


            
            </div>



        </div>

    </div>



    <?= $this->endSection() ?>