<div class="card card-primary" id="cardSancionesEst">
    <div class="card-header">
        <h3 class="card-title">SANCIONES / ESTIMULOS</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunsanciones">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-san" id="btnAdddsanciones">Agregar +</a>

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
                        <label for="tipo" class="control-label">Tipo: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($e->tipo_sancion) ? $e->tipo_sancion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="determinacion" class=" control-label">Determinación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($e->determinacion) ? $e->determinacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($e->descripcion_sancion) ? $e->descripcion_sancion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="situacion" class=" control-label">Situación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($e->situacion) ? $e->situacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="inicio_inhabilitacion" class=" control-label">Inicio de la inhabilitación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($e->inicio_habilitacion) ? $e->inicio_habilitacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="termino_inhabilitacion" class=" control-label">Término de la inhabilitación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($e->termino_habilitacion) ? $e->termino_habilitacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="organismo" class=" control-label">Dependencia u organismo que emite la determinación :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($e->dependencia) ? $e->dependencia : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php           
        }
        endif;?>            
        </div>
            <div id="CardDatossancionesB">
            </div>
        </form>
    </div>
</div>
<div class="card card-primary" id="cardSanciRes">
    <div class="card-header">
        <h3 class="card-title">RESOLUCIONES MINISTERIALES Y/O JUDICIALES</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunResolucion">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-res" id="btnAdddResolucion">Agregar +</a>

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
                            <label for="emisora" class=" control-label">Institución emisora:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->institucion_emisora) ? $e->institucion_emisora : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="entidad_federativaSE" class=" control-label">Entidad federativa:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->idEstado) ? $e->idEstado : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="delitos" class="control-label">Delitos: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->delitos) ? $e->delitos : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="motivo" class=" control-label">Motivo:
                                <span class="text-danger">*</span></label>
                                <div>
                            <?= isset($e->motivos) ? $e->motivos : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="no_expediente" class="control-label">No. Expediente: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->numero_expediente) ? $e->numero_expediente : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="agencia_mp" class=" control-label">Agencia del MP:
                                <span class="text-danger">*</span></label>
                                <div>
                            <?= isset($e->agencia_mp) ? $e->agencia_mp : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="averiguacion_previa" class="control-label">Averiguación previa: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->averiguacion_previa) ? $e->averiguacion_previa : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="tipo_fuero" class="control-label">Tipo de Fuero: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->idTipoFuero) ? $e->idTipoFuero : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="averiguacion_estado" class="control-label">Estado de la averiguación previa: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->estado_averiguacion) ? $e->estado_averiguacion : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="inicio_averiguacion">Inicio de la averiguación: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->inicio_averiguacion) ? $e->inicio_averiguacion : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="al_dia">Al día: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->aldia_averiguacion) ? $e->aldia_averiguacion : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="juzgado" class=" control-label">Juzgado:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->juzgado) ? $e->juzgado : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="no_proceso" class=" control-label">No. Proceso:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->num_proceso) ? $e->num_proceso : ''  ?>
                        </div>

                        </div>
                    </div>
                    <div class='col-6 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="estado_procesal" class=" control-label">Estado Procesal:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->estado_procesal) ? $e->estado_procesal : ''  ?>
                        </div>

                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="inicio_proceso">Inicio del proceso: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->inicio_proceso) ? $e->inicio_proceso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="al_dia_proceso">Al día: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($e->aldia_proceso) ? $e->aldia_proceso : ''  ?>
                        </div>
                        </div>
                    </div>
                </div>
                <?php
            
        }
        endif;?>  
            </div>
            <div id="CardDatosResoluionB">
            </div>
        </form>
    </div>
</div>
<div class="card card-primary" id="cardSancRec">
    <div class="card-header">
        <h3 class="card-title">ESTIMULOS RECIBIDOS</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunoestimulo">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-rec" id="btnAdddestimulo">Agregar +</a>


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
                    <label for="tipo_estimulo" class=" control-label">Tipo:<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($e->tipo_estimulo) ? $e->tipo_estimulo : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="descripcion_estimulo" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($e->descripcion_estimulo) ? $e->descripcion_estimulo : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="dependencia" class=" control-label">Dependencia que otorga:<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($e->dependencia_otorga) ? $e->dependencia_otorga : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label for="otrogado_estimulo">Otorgado: <span class="text-danger">*</span></label>
                    <div>
                            <?= isset($e->otorgado) ? $e->otorgado : ''  ?>
                        </div>
                </div>
            </div>
        </div>
        <?php
            
        }
        endif;?>  
    </div>
            <hr class="mt-3 mb-3" />
            <div id="CardDatosEstimuloB">
            </div>
        </form>
    </div>
</div>

<script>
 
</script>