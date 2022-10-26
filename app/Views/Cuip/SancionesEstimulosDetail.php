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
        <div class="row">
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="tipo" class="control-label">Tipo: <span class="text-danger">*</span></label>
                    <div>
                            <?= isset($sanciones->tipo_sancion) ? $sanciones->tipo_sancion : ''  ?>
                        </div>
                    </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="determinacion" class=" control-label">Determinación:<span class="text-danger">*</span></label>
                    <div class="input-group date" id="determinacion" data-target-input="nearest">
                    <div>
                            <?= isset($sanciones->determinacion) ? $sanciones->determinacion : ''  ?>
                        </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#determinacion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($sanciones->descripcion_sancion) ? $sanciones->descripcion_sancion : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="situacion" class=" control-label">Situación:<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($sanciones->situacion) ? $sanciones->situacion : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="inicio_inhabilitacion" class=" control-label">Inicio de la inhabilitación:<span class="text-danger">*</span></label>
                    <div class="input-group date" id="inicio_inhabilitacion" data-target-input="nearest">
                    <div>
                            <?= isset($sanciones->inicio_habilitacion) ? $sanciones->inicio_habilitacion : ''  ?>
                        </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#inicio_inhabilitacion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="termino_inhabilitacion" class=" control-label">Término de la inhabilitación:<span class="text-danger">*</span></label>
                    <div class="input-group date" id="termino_inhabilitacion" data-target-input="nearest">
                    <div>
                            <?= isset($sanciones->termino_habilitacion) ? $sanciones->termino_habilitacion : ''  ?>
                        </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#termino_inhabilitacion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label for="organismo" class=" control-label">Dependencia u organismo que emite la determinación :<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($sanciones->dependencia) ? $sanciones->dependencia : ''  ?>
                        </div>
                    </div>
            </div>
        </div>
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
        
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="emisora" class=" control-label">Institución emisora:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($sanciones->institucion_emisora) ? $sanciones->institucion_emisora : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entidad_federativaSE" class=" control-label">Entidad federativa:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($sanciones->estado) ? $sanciones->estado : ''  ?>
                        </div>
                            <script>
                                $(document).ready(function() {
                                    $("#entidad_federativaSE").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="delitos" class="control-label">Delitos: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($sanciones->delitos) ? $sanciones->delitos : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="motivo" class=" control-label">Motivo:
                            <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($sanciones->motivos) ? $sanciones->motivos : ''  ?>
                        </div>
                        </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="no_expediente" class="control-label">No. Expediente: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($sanciones->dependencia) ? $sanciones->dependencia : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="agencia_mp" class=" control-label">Agencia del MP:
                            <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($sanciones->agencia_mp) ? $sanciones->agencia_mp : ''  ?>
                        </div>
                        </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="averiguacion_previa" class="control-label">Averiguación previa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($sanciones->averiguacion_previa) ? $sanciones->averiguacion_previa : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="tipo_fuero" class="control-label">Tipo de Fuero: <span class="text-danger">*</span></label>
                        <div>
                        <div>
                            <?= isset($sanciones->fuero) ? $sanciones->fuero : ''  ?>
                        </div>
                            <script>
                                $(document).ready(function() {
                                    $("#tipo_fuero").select2({
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
                        <label for="averiguacion_estado" class="control-label">Estado de la averiguación previa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($sanciones->estado_averiguacion) ? $sanciones->estado_averiguacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="inicio_averiguacion">Inicio de la averiguación: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="inicio_averiguacion" data-target-input="nearest">
                        <div>
                            <?= isset($sanciones->inicio_averiguacion) ? $sanciones->inicio_averiguacion : ''  ?>
                        </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#inicio_averiguacion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="al_dia">Al día: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
                        <div>
                            <?= isset($sanciones->aldia_averiguacion) ? $sanciones->aldia_averiguacion : ''  ?>
                        </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#al_dia").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="juzgado" class=" control-label">Juzgado:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($sanciones->juzgado) ? $sanciones->juzgado : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="no_proceso" class=" control-label">No. Proceso:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($sanciones->num_proceso) ? $sanciones->num_proceso : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="estado_procesal" class=" control-label">Estado Procesal:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($sanciones->estado_procesal) ? $sanciones->estado_procesal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="inicio_proceso">Inicio del proceso: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="inicio_proceso" data-target-input="nearest">
                        <div>
                            <?= isset($sanciones->inicio_proceso) ? $sanciones->inicio_proceso : ''  ?>
                        </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#inicio_proceso").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="al_dia_proceso">Al día: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="al_dia_proceso" data-target-input="nearest">
                        <div>
                            <?= isset($sanciones->aldia_proceso) ? $sanciones->aldia_proceso : ''  ?>
                        </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#al_dia_proceso").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        
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
       
            <div class="row">

                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_estimulo" class=" control-label">Tipo:<span class="text-danger">*</span></label>
                        
                        <div>
                            <?= isset($sanciones->tipo_estimulo) ? $sanciones->tipo_estimulo : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="descripcion_estimulo" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($sanciones->descripcion_estimulo) ? $sanciones->descripcion_estimulo : ''  ?>
                        </div>                   
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="dependencia" class=" control-label">Dependencia que otorga:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($sanciones->dependencia_otorga) ? $sanciones->dependencia_otorga : ''  ?>
                        </div>                   
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="otrogado_estimulo">Otorgado: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="otrogado_estimulo" data-target-input="nearest">
                        <div>
                            <?= isset($sanciones->otorgado) ? $sanciones->otorgado : ''  ?>
                        </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#otrogado_estimulo").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>