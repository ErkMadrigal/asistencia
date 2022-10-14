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
                        <label for="dependencia" class=" control-label">Dependencia responsable:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="dependencia" name="dependencia">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="institucion" class=" control-label">Institución Capacitadora:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="institucion" name="institucion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_curso" class=" control-label">Nombre del curso:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nombre_curso" name="nombre_curso">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tema_curso" class=" control-label">Tema del curso:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="tema_curso" name="tema_curso">
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="nivel_curso" class="control-label">Nivel del curso recibido: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="nivel_curso" name="nivel_curso">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($nivel_curso)) :
                                    foreach ($nivel_curso as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#nivel_curso").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="eficiencia" class="control-label">Eficiencia terminal: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="eficiencia" name="eficiencia">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($eficiencia)) :
                                    foreach ($eficiencia as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#eficiencia").select2({
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
                        <label for="inicio" class=" control-label">Inicio:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="inicio" name="inicio">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="conclusion" class=" control-label">Conclusión:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="conclusion" name="conclusion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="duracion" class=" control-label">Duración en horas:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="duracion" name="duracion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="comprobante" class=" control-label">Tipo de comprobante:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="comprobante" name="comprobante">
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
                        <label for="empresa" class=" control-label">Insitutción o Empresa:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="empresa" name="empresa">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="curso" class=" control-label">Estudio o Curso:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="curso" name="curso">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_curso" class=" control-label">Tipo de curso:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="tipo_curso" name="tipo_curso">
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="cuso_tomado" class="control-label">¿El curso fue?: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="cuso_tomado" name="cuso_tomado">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($cuso_tomado)) :
                                    foreach ($cuso_tomado as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#cuso_tomado").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="eficiencia" class="control-label">Eficiencia terminal: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="eficiencia" name="eficiencia">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($eficiencia)) :
                                    foreach ($eficiencia as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#eficiencia").select2({
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
                        <label for="inicio" class=" control-label">Inicio:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="inicio" name="inicio">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="conclusion" class=" control-label">Conclusión:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="conclusion" name="conclusion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="duracion_horas" class=" control-label">Duración en horas:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="duracion_horas" name="duracion_horas">
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
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="idioma" class="control-label">Idioma o Dialecto: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="idioma" name="idioma">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($idioma)) :
                                    foreach ($idioma as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#idioma").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="lectura" class=" control-label">% Lectura:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="lectura" name="lectura">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="escritura" class=" control-label">% Escritura:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="escritura" name="escritura">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-4'>
                    <div class="form-group">
                        <label for="conversacion" class=" control-label">% Conversación:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="conversacion" name="conversacion">
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
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="tipo_habilidad" class="control-label">Tipo: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tipo_habilidad" name="tipo_habilidad">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($tipo_habilidad)) :
                                    foreach ($tipo_habilidad as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipo_habilidad").select2({
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
                        <label for="especificacion" class=" control-label">Especifique:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="especificacion" name="especificacion">
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="grado_habilidad" class="control-label">Grado de aptitude o dominio: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="grado_habilidad" name="grado_habilidad">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($grado_habilidad)) :
                                    foreach ($grado_habilidad as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#grado_habilidad").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
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
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="nombre" class=" control-label">Nombre:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nombre" name="nombre">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo" class=" control-label">Tipo:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="tipo" name="tipo">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especificacion" class=" control-label">Especifique:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="especificacion" name="especificacion">
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="grado_habilidad" class="control-label">Grado de aptitude o dominio: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="grado_habilidad" name="grado_habilidad">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($grado_habilidad)) :
                                    foreach ($grado_habilidad as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#grado_habilidad").select2({
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
                        <label for="desde" class=" control-label">Desde:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="desde" name="desde">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="hasta" class=" control-label">Hasta:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="hasta" name="hasta">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-6 col-md-9 ">
    </div>
    <div class="col-12 col-sm-12 col-md-3">
        <button type="button" id="SaveProveedor" class="btn btn-primary">Guardar</button>
    </div>
</div>