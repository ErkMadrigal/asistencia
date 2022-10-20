<div class="card card-primary">
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
        <form class="form-horizontal" id="">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="dependencia" class=" control-label">Dependencia responsable:</label>
                            <div >
                                <?=$capacitacion->dependencia ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="institucion" class=" control-label">Institución Capacitadora: </label>
                            <div >
                                <?=$capacitacion->inst_capacitadora ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_curso" class=" control-label">Nombre del curso: </label>
                            <div >
                                <?=$capacitacion->nombre_curso ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tema_curso" class=" control-label">Tema del curso: </label>
                        <div >
                                <?=$capacitacion->tema_curso ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nivel_curso" class=" control-label">Nivel del curso recibido: </label>
                        <div >
                                <?=$capacitacion->nivel ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="eficiencia" class=" control-label">Eficiencia terminal: </label>
                        <div >
                                <?=$capacitacion->eficiencia ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="inicio" class=" control-label">Inicio: </label>
                        <div >
                                <?=$capacitacion->inicio_curso ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="conclusion" class=" control-label">Conclusión: </label>
                        <div >
                                <?=$capacitacion->conclusion_curso ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="duracion" class=" control-label">Duración en horas: </label>
                        <div >
                                <?=$capacitacion->duracion_horas_curso ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="comprobante" class=" control-label">Tipo de comprobante: </label>
                        <div >
                                <?=$capacitacion->tipo_comprobante ?>
                                    
                            </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<div class="card card-primary">
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
        <form class="form-horizontal" id="">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="empresa" class=" control-label">Insitutción o Empresa: </label>
                        <div >
                                <?=$capacitacion->institucion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="curso" class=" control-label">Estudio o Curso: </label>
                        <div >
                                <?=$capacitacion->curso ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_curso" class=" control-label">Tipo de curso: </label>
                        <div >
                                <?=$capacitacion->tipo_curso ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cuso_tomado" class=" control-label">¿El curso fue?: </label>
                        <div >
                                <?=$capacitacion->cursofue ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="eficiencia" class=" control-label">Eficiencia terminal: </label>
                        <div >
                                <?=$capacitacion->adicional ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="inicio" class=" control-label">Inicio: </label>
                        <div >
                                <?=$capacitacion->inicio_adicional ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="conclusion" class=" control-label">Conclusión: </label>
                        <div >
                                <?=$capacitacion->conclusion_adicional ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="duracion_horas" class=" control-label">Duración en horas: </label>
                        <div >
                                <?=$capacitacion->duracion_horas_adicional ?>
                                    
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
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
        <form class="form-horizontal" id="">
            <div class="row">

                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="idioma" class=" control-label">Idioma o Dialecto: </label>
                        <div >
                                <?=$capacitacion->idioma ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="lectura" class=" control-label">% Lectura: </label>
                        <div >
                                <?=$capacitacion->lectura ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="escritura" class=" control-label">% Escritura: </label>
                        <div >
                                <?=$capacitacion->escritura ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="conversacion" class=" control-label">% Conversación: </label>
                        <div >
                                <?=$capacitacion->conversacion ?>
                                    
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card card-primary">
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
        <form class="form-horizontal" id="">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo" class=" control-label">Tipo: </label>
                        <div >
                                <?=$capacitacion->habilidad ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especificacion" class=" control-label">Especifique: </label>
                        <div >
                                <?=$capacitacion->especifique_habilidad ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="dominio" class=" control-label">Grado de aptitude o dominio: </label>
                        <div >
                                <?=$capacitacion->grado ?>
                                    
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
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
        <form class="form-horizontal" id="">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre" class=" control-label">Nombre: </label>
                        <div >
                                <?=$capacitacion->nombre_agrupacion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo" class=" control-label">Tipo: </label>
                        <div >
                                <?=$capacitacion->agrupacion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especificacion" class=" control-label">Especifique: </label>
                        <div >
                                <?=$capacitacion->especifique_agrupacion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="dominio" class=" control-label">Grado de aptitude o dominio: </label>
                        <div >
                                <?=$capacitacion->gradohabilidad ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="desde" class=" control-label">Desde: </label>
                        <div >
                                <?=$capacitacion->institucion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="hasta" class=" control-label">Hasta: </label>
                        <div >
                                <?=$capacitacion->institucion ?>
                                    
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>




            