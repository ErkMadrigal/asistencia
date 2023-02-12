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
                            <?= isset($variable->fecha_nacimiento) ? date( "d-m-Y" ,strtotime($variable->fecha_nacimiento)) : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo" class=" control-label">Sexo:</label>
                        <div>
                            <?= isset($variable->sexo) ? $variable->sexo : ''  ?>
                        </div>
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
                        <div>
                            <?= isset($variable->vigencia_licencia) ? date( "d-m-Y" ,strtotime($variable->vigencia_licencia)) : ''  ?>
                        </div>
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
                            <?= isset($variable->nacionalidad) ? $variable->nacionalidad : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_naturalizacion">Fecha de Naturalización: </label>
                        <div>
                            <?= isset($variable->fecha_naturalizacion) ? date( "d-m-Y" ,strtotime($variable->fecha_naturalizacion)) : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="pais_nacimiento" class="control-label">Pais de Nacimiento: </label>
                        <div>
                            <?= isset($variable->pais) ? $variable->pais : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="entidad_nacimiento" class="control-label">Entidad de Nacimiento: </label>
                        <div>
                            <?= isset($variable->naciE) ? $variable->naciE : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="nacionalidad" class="control-label">Nacionalidad: </label>
                        <div>
                            <?= isset($variable->nacion) ? $variable->nacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipio_nacimiento" class="control-label">Municipio de Nacimiento: </label>
                        <div>
                            <?= isset($variable->municipio) ? $variable->municipio : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="cuidad_nacimiento" class="control-label">Cuidad de Nacimiento: </label>
                        <div>
                            <?= isset($variable->ciudad) ? $variable->ciudad : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estado_civil" class="control-label">Estado Civil: </label>
                        <div>
                            <?= isset($variable->civil) ? $variable->civil : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="desarrollo_academico" class="control-label">Desarrollo Académico: </label>
                        <div>
                            <?= isset($variable->desarrollo_academico) ? $variable->desarrollo_academico : ''  ?>
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
                        <div>
                            <?= isset($variable->año_inicio) ? $variable->año_inicio : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="anno_termino">Año de Termino: </label>
                        <div>
                            <?= isset($variable->año_termino) ? $variable->año_termino : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sep" class=" control-label">Registro SEP:</label>
                        <div>
                            <?= isset($variable->registro_sep) ? $variable->registro_sep : ''  ?>
                        </div>
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
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
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
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigo" class="control-label">Entidad Federativa: </label>
                        <div>
                            <?= isset($variable->estado) ? $variable->estado : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigo" class="control-label">Municipio: </label>
                        <div>
                            <?= isset($variable->municipio) ? $variable->municipio : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigo" class="control-label">Ciudad: </label>
                        <div>
                            <?= isset($variable->ciudad) ? $variable->ciudad : ''  ?>
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
                        <label for="dependencia_adscripcion" class=" control-label">Dependencia:</label>
                        <div>
                            <?= isset($variable->dependencia) ? $variable->dependencia : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="institucion_adscripcion" class=" control-label">Institución:</label>
                        <div>
                            <?= isset($variable->institucion) ? $variable->institucion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fechaingreso_adscripcion">Fecha de Ingreso: </label>
                        <div>
                            <?= isset($variable->fecha_ingreso) ? date( "d-m-Y" ,strtotime($variable->fecha_ingreso)) : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="puesto_adscripcion" class=" control-label">Puesto:</label>
                        <div>
                            <?= isset($variable->puesto) ? $variable->puesto : ''  ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rango_adscripcion" class=" control-label">Rango o Categoria:</label>
                        <div>
                            <?= isset($variable->rango) ? $variable->rango : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nivel_adscripcion" class=" control-label">Nivel de Mando:</label>
                        <div>
                            <?= isset($variable->nivel_mando) ? $variable->nivel_mando : ''  ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombrejefe_adscripcion" class=" control-label">Nombre del jefe inmediato:</label>
                        <div>
                            <?= isset($variable->nombre_jefe) ? $variable->nombre_jefe : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entidad_adscripcion" class=" control-label">Entidad Federativa:</label>
                        <div>
                            <?= isset($variable->idEstado_adscripcion) ? $variable->idEstado_adscripcion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="municipio_adscripcion" class=" control-label">Municipio:</label>
                        <div>
                            <?= isset($variable->municipio_adscripcion) ? $variable->municipio_adscripcion : ''  ?>
                        </div>
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
                        <label for="calle_adscripcion" class=" control-label">Calle:</label>
                        <div>
                            <?= isset($variable->calle_adscripcion) ? $variable->calle_adscripcion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior_adscripcion" class=" control-label">No. Exterior:</label>
                        <div>
                            <?= isset($variable->numero_exterior_adscripcion) ? $variable->numero_exterior_adscripcion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior_adscripcion" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($variable->numero_interior_adscripcion) ? $variable->numero_interior_adscripcion : ''  ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="entrecalle_adscripcion" class=" control-label">Entre la calle de:</label>
                        <div>
                            <?= isset($variable->entre_calle1_adscripcion) ? $variable->entre_calle1_adscripcion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="ylacalle_adscripcion" class=" control-label">Y la calle:</label>
                        <div>
                            <?= isset($variable->entre_calle2_adscripcion) ? $variable->entre_calle2_adscripcion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="telefono_adscripcion" class=" control-label">Número Telefonico:</label>
                        <div>
                            <?= isset($variable->numero_telefono_adscripcion) ? $variable->numero_telefono_adscripcion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoAds" class=" control-label">Código Postal:</label>
                        <div>
                            <?= isset($variable->idCodigoPostal_adscripcion) ? $variable->idCodigoPostal_adscripcion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoAds" class=" control-label">Colonia:</label>
                        <div>
                            <?= isset($variable->colonia_adscripcion) ? $variable->colonia_adscripcion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="federativa_adscripcion" class=" control-label">Entidad Federativa:</label>
                        <div>
                            <?= isset($variable->idEstado_dom_adscripcion) ? $variable->idEstado_dom_adscripcion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="delegacion_adscripcion" class=" control-label">Municipio o Delegación:</label>
                        <div>
                            <?= isset($variable->municipio_delegacion) ? $variable->municipio_delegacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoAds" class=" control-label">Ciudad o Poblacion:</label>
                        <div>
                            <?= isset($variable->ciudad_poblacion) ? $variable->ciudad_poblacion : ''  ?>
                        </div>
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
            
            <button type="button" class="btn btn-tool" data-card-widget="collapse" >
                <i class="fas fa-minus"></i>
            </button>
        </div>           
    </div>
    
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="FormDatosGeneralesDocente">
        <div id="CardDatosGeneralesDocente">
        <?php
        if( !empty($experiencia) ):
            
            foreach($experiencia as  $e){
                                        ?>    
            <div class="row form-block-dged">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombrecurso" class=" control-label">Nombre del Curso
                            :</label>
                            <div>
                            <?= isset($e->nombre_curso) ? $e->nombre_curso : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombreInstitucion" class=" control-label">Nombre de
                            la Institución:</label>
                            <div>
                            <?= isset($e->nombre_institucion) ? $e->nombre_institucion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_inicial">Fecha de Inicio: </label>
                        <div>
                            <?= isset($e->fecha_inicio) ? date( "d-m-Y" ,strtotime($e->fecha_inicio)) : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_final">Fecha de Término: </label>
                        <div>
                            <?= isset($e->fecha_termino) ? date( "d-m-Y" ,strtotime($e->fecha_termino)) : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="certificado_por" class=" control-label">Certificado
                            por:</label>
                            <div>
                            <?= isset($e->certificado_por) ? $e->certificado_por : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr  class="mt-3 mb-3"/>
        <?php
            
            }
            endif;?>    
        </div>

        <div id="CardDatosGeneralesDocenteB">
        </div>    
        </form>
    </div>
</div>