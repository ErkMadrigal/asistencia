<div class="card card-primary" id="cardSancionesEst">
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
        <form class="form-horizontal" id="sancionesEstimulos">
        <div id="CardDatossanciones">
        <?php
        if( !empty($sanciones) ):
            
            foreach($sanciones as  $e){
                                        ?>  
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo" class="control-label">Tipo: </label>
                        <div>
                            <?= isset($e->tipo_sancion) ? $e->tipo_sancion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="determinacion" class=" control-label">Determinación:</label>
                        <div>
                            <?= isset($e->determinacion) ? date( "d-m-Y" ,strtotime($e->determinacion)) : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="descripcion" class=" control-label">Descripción:</label>
                        <div>
                            <?= isset($e->descripcion_sancion) ? $e->descripcion_sancion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="situacion" class=" control-label">Situación:</label>
                        <div>
                            <?= isset($e->situacion) ? $e->situacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="inicio_inhabilitacion" class=" control-label">Inicio de la inhabilitación:</label>
                        <div>
                            <?= isset($e->inicio_habilitacion) ? date( "d-m-Y" ,strtotime($e->inicio_habilitacion)) : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="termino_inhabilitacion" class=" control-label">Término de la inhabilitación:</label>
                        <div>
                            <?= isset($e->termino_habilitacion) ? date( "d-m-Y" ,strtotime($e->termino_habilitacion)) : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="organismo" class=" control-label">Dependencia u organismo que emite la determinación :</label>
                        <div>
                            <?= isset($e->dependencia) ? $e->dependencia : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr  class="mt-3 mb-3"/>
            <?php           
        }
        endif;?>            
        </div>
        </form>
    </div>
</div>
<div class="card card-primary" id="cardSanciRes">
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
        <form class="form-horizontal" id="resoluciones">
            <div id="CardDatosResoluion">
            <?php
        if( !empty($resoluciones) ):
            
            foreach($resoluciones as  $e){
                                        ?> 
                <div class="row">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="emisora" class=" control-label">Institución emisora:</label>
                            <div>
                            <?= isset($e->institucion_emisora) ? $e->institucion_emisora : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="entidad_federativaSE" class=" control-label">Entidad federativa:</label>
                            <div>
                            <?= isset($e->idEstado) ? $e->idEstado : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="delitos" class="control-label">Delitos: </label>
                            <div>
                            <?= isset($e->delitos) ? $e->delitos : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="motivo" class=" control-label">Motivo:
                                </label>
                                <div>
                            <?= isset($e->motivos) ? $e->motivos : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="no_expediente" class="control-label">No. Expediente: </label>
                            <div>
                            <?= isset($e->numero_expediente) ? $e->numero_expediente : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="agencia_mp" class=" control-label">Agencia del MP:
                                </label>
                                <div>
                            <?= isset($e->agencia_mp) ? $e->agencia_mp : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="averiguacion_previa" class="control-label">Averiguación previa: </label>
                            <div>
                            <?= isset($e->averiguacion_previa) ? $e->averiguacion_previa : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="tipo_fuero" class="control-label">Tipo de Fuero: </label>
                            <div>
                            <?= isset($e->idTipoFuero) ? $e->idTipoFuero : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="averiguacion_estado" class="control-label">Estado de la averiguación previa: </label>
                            <div>
                            <?= isset($e->estado_averiguacion) ? $e->estado_averiguacion : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="inicio_averiguacion">Inicio de la averiguación: </label>
                            <div>
                            <?= isset($e->inicio_averiguacion) ? date( "d-m-Y" ,strtotime($e->inicio_averiguacion)) : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="al_dia">Al día: </label>
                            <div>
                            <?= isset($e->aldia_averiguacion) ? date( "d-m-Y" ,strtotime($e->aldia_averiguacion)) : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="juzgado" class=" control-label">Juzgado:</label>
                            <div>
                            <?= isset($e->juzgado) ? $e->juzgado : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="no_proceso" class=" control-label">No. Proceso:</label>
                            <div>
                            <?= isset($e->num_proceso) ? $e->num_proceso : ''  ?>
                        </div>

                        </div>
                    </div>
                    <div class='col-6 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="estado_procesal" class=" control-label">Estado Procesal:</label>
                            <div>
                            <?= isset($e->estado_procesal) ? $e->estado_procesal : ''  ?>
                        </div>

                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="inicio_proceso">Inicio del proceso: </label>
                            <div>
                            <?= isset($e->inicio_proceso) ? date( "d-m-Y" ,strtotime($e->inicio_proceso)) : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="al_dia_proceso">Al día: </label>
                            <div>
                            <?= isset($e->aldia_proceso) ? date( "d-m-Y" ,strtotime($e->aldia_proceso)) : ''  ?>
                        </div>
                        </div>
                    </div>
                </div>
                <hr  class="mt-3 mb-3"/>
                <?php
            
        }
        endif;?>  
            </div>
            
        </form>
    </div>
</div>
<div class="card card-primary" id="cardSancRec">
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
    <form class="form-horizontal" id="estimulo">
            <div id="CardDatosEstimulo">
            <?php
        if( !empty($estimulos) ):
            
            foreach($estimulos as  $e){
                                        ?>  
        <div class="row">
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="tipo_estimulo" class=" control-label">Tipo:</label>
                    <div>
                            <?= isset($e->tipo_estimulo) ? $e->tipo_estimulo : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="descripcion_estimulo" class=" control-label">Descripción:</label>
                    <div>
                            <?= isset($e->descripcion_estimulo) ? $e->descripcion_estimulo : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="dependencia" class=" control-label">Dependencia que otorga:</label>
                    <div>
                            <?= isset($e->dependencia_otorga) ? $e->dependencia_otorga : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label for="otrogado_estimulo">Otorgado: </label>
                    <div>
                            <?= isset($e->otorgado) ? date( "d-m-Y" ,strtotime($e->otorgado)) : ''  ?>
                        </div>
                </div>
            </div>
        </div>
        <hr  class="mt-3 mb-3"/>
        <?php
            
        }
        endif;?>  
    </div>
            
        </form>
    </div>
</div>