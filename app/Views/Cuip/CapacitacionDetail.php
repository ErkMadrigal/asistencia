<div class="card card-primary" id="cardCapPublica">
    <div class="card-header">
        <h3 class="card-title">CAPACITACIÓN EN SEGURIDAD PUBLICA</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunocapa">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-public" id="btnAdddcapacitacion">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="Capacitaciones">
            <div id="CardDatoscapacitacion">
                <div class="row">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="dependencia" class=" control-label">Dependencia responsable:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->dependencia) ? $capacitacion->dependencia : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="institucion" class=" control-label">Institución Capacitadora:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->inst_capacitadora) ? $capacitacion->inst_capacitadora : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="nombre_curso" class=" control-label">Nombre del curso:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->nombre_curso) ? $capacitacion->nombre_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="tema_curso" class=" control-label">Tema del curso:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->tema_curso) ? $capacitacion->tema_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="nivel_curso" class="control-label">Nivel del curso recibido: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->idNivel_curso) ? $capacitacion->idNivel_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="eficienciaCursos" class="control-label">Eficiencia terminal: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->idEficienciaCurso) ? $capacitacion->idEficienciaCurso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="inicio" class=" control-label">Inicio:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->inicio_curso) ? $capacitacion->inicio_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="conclusion" class=" control-label">Conclusión:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->conclusion_curso) ? $capacitacion->conclusion_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="duracion" class=" control-label">Duración en horas:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->duracion_horas_curso) ? $capacitacion->duracion_horas_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="comprobante" class=" control-label">Tipo de comprobante:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->tipo_comprobante) ? $capacitacion->tipo_comprobante : ''  ?>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="CardDatoscapacitacionB">
            </div>
        </form>
    </div>
</div>

<div class="card card-primary" id="cardCapAdicional">
    <div class="card-header">
        <h3 class="card-title">CAPACITACIÓN ADICIONAL
        </h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunOADICIONAL">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-adi" id="btnAdddadicional">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="adicional">
            <div id="CardDatosAdicional">
                <div class="row">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="empresa" class=" control-label">Insitutción o Empresa:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->institucion) ? $capacitacion->institucion : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="curso" class=" control-label">Estudio o Curso:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->curso) ? $capacitacion->curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="tipo_curso" class=" control-label">Tipo de curso:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->tipo_curso) ? $capacitacion->tipo_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="cuso_tomado" class="control-label">¿El curso fue?: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->cursofue) ? $capacitacion->cursofue : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="eficiencia" class="control-label">Eficiencia terminal: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->primer_nombre) ? $capacitacion->primer_nombre : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="inicioAdicional" class=" control-label">Inicio:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->inicio_adicional) ? $capacitacion->inicio_adicional : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="conclusionAdicional" class=" control-label">Conclusión:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->conclusion_adicional) ? $capacitacion->conclusion_adicional : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="duracion_horas" class=" control-label">Duración en horas:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->duracion_horas_adicional) ? $capacitacion->duracion_horas_adicional : ''  ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="CardDatosAdicionalB">
            </div>
        </form>
    </div>
</div>
<div class="card card-primary" id="cardCapIdiomas">
    <div class="card-header">
        <h3 class="card-title">IDIOMAS O DIALECTOS</h3>
        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunoIDIOMAS">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-idioma" id="btnAdddadicionalIdioma">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
<form class="form-horizontal" id="IDIOMAS">
    <div id="CardIdiomas">
        <div class="row">
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="idioma" class="control-label">Idioma o Dialecto: <span class="text-danger">*</span></label>
                    <div>
                            <?= isset($capacitacion->idIdioma) ? $capacitacion->idIdioma : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="lectura" class=" control-label">% Lectura:<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($capacitacion->idIdiomaLectura) ? $capacitacion->idIdiomaLectura : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="escritura" class=" control-label">% Escritura:<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($capacitacion->idIdiomaEscritura) ? $capacitacion->idIdiomaEscritura : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="conversacion" class=" control-label">% Conversación:<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($capacitacion->idIdiomaConversacion) ? $capacitacion->idIdiomaConversacion : ''  ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
            <div id="CardIdiomasB">
            </div>
</form>        
    </div>
</div>

<div class="card card-primary" id="cardCapHAbilidades">
    <div class="card-header">
        <h3 class="card-title">HABILIDADES Y APTITUDES</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunHABILIDAD">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-hab" id="btnAdddHABILIDAD">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="HABILIDAD">
            <div id="CardDatosHabilidad">
                <div class="row">
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="tipo_habilidad" class="control-label">Tipo: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->idTipoHabilidad) ? $capacitacion->idTipoHabilidad : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="especificacion" class=" control-label">Especifique:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->especifique_habilidad) ? $capacitacion->especifique_habilidad : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="grado_habilidadCap" class="control-label">Grado de aptitude o dominio: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->idGradoHabilidad) ? $capacitacion->idGradoHabilidad : ''  ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="CardDatosHabilidadB">
            </div>
        </form>
    </div>
</div>
<div class="card card-primary" id="cardCapAfiliacion">
    <div class="card-header">
        <h3 class="card-title">AFILIACION A AGRUPACIONES</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunAFILIACION">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-afil" id="btnAdddAFILIACION">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">


        <form class="form-horizontal" id="AFILIACION">

            <div id="CardDatosAfiliacion">
                <div class="row">
                    <div class='col-12 col-sm-12 col-md-12'>
                        <div class="form-group">
                            <label for="nombre" class=" control-label">Nombre:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->nombre_agrupacion) ? $capacitacion->nombre_agrupacion : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="tipoAgrupa" class=" control-label">Tipo:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->idTipoAgrupacion) ? $capacitacion->idTipoAgrupacion : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="desde" class=" control-label">Desde:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->desde) ? $capacitacion->desde : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="hasta" class=" control-label">Hasta:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($capacitacion->hasta) ? $capacitacion->hasta : ''  ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-3 mb-3" />
            <div id="CardDatosAfiliacionB">
            </div>
        </form>
    </div>
</div>


<script>

</script>