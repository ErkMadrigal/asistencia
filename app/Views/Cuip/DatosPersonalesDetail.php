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
                        <label for="apellidoPaterno" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->apellido_paterno) ? $variable->apellido_paterno : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->apellido_materno) ? $variable->apellido_materno : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_nacimiento">Fecha de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->fecha_nacimiento) ? $variable->fecha_nacimiento : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->sexo) ? $variable->sexo : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rfc" class=" control-label">R.F.C.:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->rfc) ? $variable->rfc : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="claveE" class=" control-label">Clave Electoral:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->clave_electoral) ? $variable->clave_electoral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cartilla" class=" control-label">Cartilla SMN:<span class="text-danger">*</span></label>
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
                            <?= isset($variable->vigencia_licencia) ? $variable->vigencia_licencia : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="CURP" class=" control-label">CURP:<span class="text-danger">*</span></label>
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
                        <label for="modo_nacionalidad" class="control-label">Modo de Nacionalidad: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->nacionalidad) ? $variable->nacionalidad : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_naturalizacion">Fecha de Naturalización: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->fecha_naturalizacion) ? $variable->fecha_naturalizacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="pais_nacimiento" class="control-label">Pais de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->pais) ? $variable->pais : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="entidad_nacimiento" class="control-label">Entidad de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->naciE) ? $variable->naciE : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="nacionalidad" class="control-label">Nacionalidad: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->nacion) ? $variable->nacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipio_nacimiento" class="control-label">Municipio de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->municipio) ? $variable->municipio : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="cuidad_nacimiento" class="control-label">Cuidad de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->ciudad) ? $variable->ciudad : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estado_civil" class="control-label">Estado Civil: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->civil) ? $variable->civil : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="desarrollo_academico" class="control-label">Desarrollo Académico: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->desarrollo_academico) ? $variable->desarrollo_academico : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="escuela" class=" control-label">Escuela :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->escuela) ? $variable->escuela : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especialidad" class=" control-label">Especialidad o Estudio :<span class="text-danger">*</span></label>
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
                        <label for="anno_inicio">Año de Inicio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->año_inicio) ? $variable->año_inicio : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="anno_termino">Año de Termino: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->año_termino) ? $variable->año_termino : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sep" class=" control-label">Registro SEP:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->registro_sep) ? $variable->registro_sep : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="certificado" class=" control-label">Num. de Folio Certificado :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->folio_certificado) ? $variable->folio_certificado : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="promedio" class=" control-label">Promedio :<span class="text-danger">*</span></label>
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
                        <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->calle) ? $variable->calle : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
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
                            Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->numero_telefono) ? $variable->numero_telefono : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entrecalle" class=" control-label">Entre la calle
                            de:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->entre_calle1) ? $variable->entre_calle1 : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ylacalle" class=" control-label">Y la calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->entre_calle2) ? $variable->entre_calle2 : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigo" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->postal) ? $variable->postal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigo" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->colonia) ? $variable->colonia : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigo" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->estado) ? $variable->estado : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigo" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->municipio) ? $variable->municipio : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigo" class="control-label">Ciudad: <span class="text-danger">*</span></label>
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
            <div class="row form-block-dged">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombrecurso" class=" control-label">Nombre del Curso
                            :<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->nombre_curso) ? $variable->nombre_curso : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombreInstitucion" class=" control-label">Nombre de
                            la Institución:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->nombre_institucion) ? $variable->nombre_institucion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_inicial">Fecha de Inicio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->fecha_inicio) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_final">Fecha de Término: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->fecha_termino) ? $variable->fecha_termino : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="certificado_por" class=" control-label">Certificado
                            por:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->certificado_por) ? $variable->certificado_por : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="CardDatosGeneralesDocenteB">
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
                        <div>
                            <?= isset($variable->dependencia) ? $variable->dependencia : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="institucion_adscripcion" class=" control-label">Institución:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->institucion) ? $variable->institucion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fechaingreso_adscripcion">Fecha de Ingreso: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="puesto_adscripcion" class=" control-label">Puesto:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rango_adscripcion" class=" control-label">Rango o Categoria:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nivel_adscripcion" class=" control-label">Nivel de Mando:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombrejefe_adscripcion" class=" control-label">Nombre del jefe inmediato:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entidad_adscripcion" class=" control-label">Entidad Federativa:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="municipio_adscripcion" class=" control-label">Municipio:<span class="text-danger">*</span></label>
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
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior_adscripcion" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior_adscripcion" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="entrecalle_adscripcion" class=" control-label">Entre la calle de:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="ylacalle_adscripcion" class=" control-label">Y la calle:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="telefono_adscripcion" class=" control-label">Número Telefonico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoAds" class=" control-label">Código Postal:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoAds" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="federativa_adscripcion" class=" control-label">Entidad Federativa:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="delegacion_adscripcion" class=" control-label">Municipio o Delegación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoAds" class=" control-label">Ciudad o Poblacion:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr  class="mt-3 mb-3"/>
        </form>
    </div>
</div>

<script>

</script>