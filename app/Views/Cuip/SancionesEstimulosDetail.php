<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">SANCIONES / ESTIMULOS</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <div class="row">
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="tipo" class="control-label">Tipo:</label>
                    <div >
                                <?=$sanciones->tipo_sancion ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="determinación" class=" control-label">Determinación:</label> <div >
                                <?=$sanciones->determinacion ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="descripcion" class=" control-label">Descripción:</label> 
                    <div >
                                <?=$sanciones->descripcion_sancion ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="situacion" class=" control-label">Situación:</label>
                    <div >
                                <?=$sanciones->situacion ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="inicio_inhabilitacion" class=" control-label">Inicio de la inhabilitación:</label>
                    <div >
                                <?=$sanciones->inicio_habilitacion ?>
                                    
                            </div>                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="termino_inhabilitacion" class=" control-label">Término de la inhabilitación:</label>
                    <div >
                                <?=$sanciones->termino_habilitacion ?>
                                    
                            </div>                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="organismo" class=" control-label">Dependencia u organismo que emite la determinación :</label>
                    <div >
                                <?=$sanciones->dependencia ?>
                                    
                            </div>                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">RESOLUCIONES MINISTERIALES Y/O JUDICIALES</h3>

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
                        <label for="emisora" class=" control-label">Institución emisora:</label>
                        <div >
                                <?=$sanciones->institucion_emisora ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entidad_federativa" class=" control-label">Entidad federativa:</label>
                        <div >
                                <?=$sanciones->estado ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="delitos" class="control-label">Delitos:</label>
                        <div >
                                <?=$sanciones->delitos ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="motivo" class=" control-label">Motivo:
                           </label>
                           <div >
                                <?=$sanciones->motivos ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="no_expediente" class="control-label">No. Expediente:</label>
                        <div >
                                <?=$sanciones->numero_expediente ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="agencia_mp" class=" control-label">Agencia del MP:
                           </label>
                           <div >
                                <?=$sanciones->agencia_mp ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="averiguacion_previa" class="control-label">Averiguación previa:</label>
                        <div >
                                <?=$sanciones->averiguacion_previa ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_fuero" class=" control-label">Tipo de Fuero:</label>
                        <div >
                                <?=$sanciones->fuero ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="averiguacion_estado" class="control-label">Estado de la averiguación previa:</label>
                        <div >
                                <?=$sanciones->estado_averiguacion ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="inicio_averiguacion">Inicio de la averiguación:</label>
                        <div class="input-group date" id="inicio_averiguacion" data-target-input="nearest">
                        <div >
                                <?=$sanciones->inicio_averiguacion ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="al_dia">Al día:</label>
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
                        <div >
                                <?=$sanciones->aldia_averiguacion ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="juzgado" class=" control-label">Juzgado:</label>
                        <div >
                                <?=$sanciones->juzgado ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="no_proceso" class=" control-label">No. Proceso:</label>
                        <div >
                                <?=$sanciones->num_proceso ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="estado_procesal" class=" control-label">Estado Procesal:</label>
                        <div >
                                <?=$sanciones->estado_procesal ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="inicio_proceso">Inicio del proceso:</label>
                        <div class="input-group date" id="inicio_proceso" data-target-input="nearest">
                        <div >
                                <?=$sanciones->inicio_proceso ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="al_dia_proceso">Al día:</label>
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
                        <div >
                                <?=$sanciones->aldia_proceso ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">ESTIMULOS RECIBIDOS</h3>

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
                        <label for="tipo_estimulo" class=" control-label">Tipo:</label>
                        <div >
                                <?=$sanciones->tipo_estimulo ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="descripcion_estimulo" class=" control-label">Descripción:</label>
                        <div >
                                <?=$sanciones->descripcion_estimulo ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="dependencia" class=" control-label">Dependencia que otorga:</label>
                        <div >
                                <?=$sanciones->dependencia_otorga ?>
                                    
                            </div>                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="otrogado_estimulo">Otorgado:</label>
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
                        <div >
                                <?=$sanciones->otorgado ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>