<div class="card card-primary" id="CardGenerales">
    <div class="card-header">
        <h3 class="card-title">DATOS GENERALES: SOCIOECONÓMICO</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body  ">
        <form class="form-horizontal" id="SocioEconomico">
            <div class="row">

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="familia" class="control-label">¿Vive con su Familia?: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($estudio->vive) ? $estudio->vive : ''  ?>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#familia").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ingreso" class=" control-label">Ingreso familiar adicional
                            (Mensual):<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($estudio->ingreso_familiar) ? $estudio->ingreso_familiar : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="domicilio_tipo" class="control-label">Su domicilio es: <span class="text-danger">*</span></label>
                        
                            <div>
                                <?= isset($estudio->domicilio) ? $estudio->domicilio : ''  ?>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $("#domicilio_tipo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="actividad" class=" control-label">Actividades culturales o deportivas
                            que practique:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($estudio->actividades_culturales) ? $estudio->actividades_culturales : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especificacion" class=" control-label">Especifiación de inmueble y
                            costo:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($estudio->especificacion_inmueble) ? $estudio->especificacion_inmueble : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="inversion" class=" control-label">Inversiones y monto
                            aproximado:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($estudio->inversiones) ? $estudio->inversiones : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="vehiculo" class=" control-label">Vehiculo y costo Aproximado:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($estudio->vehiculo) ? $estudio->vehiculo : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calidad" class=" control-label">Calidad de Vida:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($estudio->calidad_vida) ? $estudio->calidad_vida : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="vicio" class=" control-label">Vicios:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($estudio->vicios) ? $estudio->vicios : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="imagen" class=" control-label">Imagen Publica:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($estudio->imagen_publica) ? $estudio->imagen_publica : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="comportamiento" class=" control-label">Comportamiento Social:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($estudio->comportamiento) ? $estudio->comportamiento : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="card card-primary" id="CardDependientes">
    <div class="card-header">
        <h3 class="card-title">DATOS DEL CONYUGE Y DEPENDIENTES ECONÓMICOS</h3>

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
                    <label for="apellidoPaterno" class=" control-label">Apellido
                        Paterno:<span class="text-danger">*</span></label>
                    <div>
                        <?= isset($estudio->apellido_paterno) ? $estudio->apellido_paterno : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="apellidoMaterno" class=" control-label">Apellido
                        Materno:<span class="text-danger">*</span></label>
                    <div>
                        <?= isset($estudio->apellido_materno) ? $estudio->apellido_materno : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="primerNombre" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <?= isset($estudio->primer_nombre) ? $estudio->primer_nombre : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="segundoNombre" class=" control-label">Segundo Nombre:</label>
                    <div>
                        <?= isset($estudio->segundo_nombre) ? $estudio->segundo_nombre : ''  ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label for="fecha_nacimiento_dep">Fecha de Nacimiento: <span class="text-danger">*</span></label>
                    <div>
                        <?= isset($estudio->fecha_nacimiento) ? $estudio->fecha_nacimiento : ''  ?>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function() {
                        $("#fecha_nacimiento_dep").datetimepicker({
                            format: 'DD-MM-YYYY',
                            locale: moment.locale('es')
                        });
                    });
                </script>
            </div>
        </div>
        <div class='col-12 col-sm-12 col-md-6'>
            <div class="form-group">
                <label for="sexo_dep" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                <div>
                    <?= isset($estudio->sexo) ? $estudio->sexo : ''  ?>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#sexo_dep").select2({
                            theme: "bootstrap4",
                            width: "100%"
                        });
                    });
                </script>
            </div>
        </div>
        <div class='col-6 col-sm-6'>
            <div class="form-group">
                <label for="parentesco_familiar" class="control-label">Parentesco: <span class="text-danger">*</span></label>

                <div>
                    <?= isset($estudio->parentesco) ? $estudio->parentesco : ''  ?>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#parentesco_familiar").select2({
                            theme: "bootstrap4",
                            width: "100%"
                        });
                    });
                </script>

            </div>
        </div>
    </div>
    </form>
</div>