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
                            <?= isset($variable->vive) ? $variable->vive : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="ingreso" class=" control-label">Ingreso familiar adicional
                                (Mensual):<span class="text-danger">*</span></label>
                                <div>
                            <?= isset($variable->ingreso_familiar) ? $variable->ingreso_familiar : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="domicilio_tipo" class="control-label">Su domicilio es: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->domicilio) ? $variable->domicilio : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="actividad" class=" control-label">Actividades culturales o deportivas
                                que practique:<span class="text-danger">*</span></label>
                                <div>
                            <?= isset($variable->actividades_culturales) ? $variable->actividades_culturales : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="especificacion" class=" control-label">Especifiación de inmueble y
                                costo:<span class="text-danger">*</span></label>
                                <div>
                            <?= isset($variable->especificacion_inmueble) ? $variable->especificacion_inmueble : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="inversion" class=" control-label">Inversiones y monto
                                aproximado:<span class="text-danger">*</span></label>
                                <div>
                            <?= isset($variable->inversiones) ? $variable->inversiones : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="vehiculo" class=" control-label">Vehiculo y costo Aproximado:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->vehiculo) ? $variable->vehiculo : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="calidad" class=" control-label">Calidad de Vida:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->calidad_vida) ? $variable->calidad_vida : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="vicio" class=" control-label">Vicios:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->vicios) ? $variable->vicios : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="imagen" class=" control-label">Imagen Publica:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->imagen_publica) ? $variable->imagen_publica : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="comportamiento" class=" control-label">Comportamiento Social:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->comportamiento) ? $variable->comportamiento : ''  ?>
                        </div>
                        </div>
                    </div>
                </div>
            
            
        </form>
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

        <form class="form-horizontal" id="DatosDependientes">
            <div id="CardConyuge">
                <div class="row" class="form-block">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="apellidoPaterno" class=" control-label">Apellido
                                Paterno:<span class="text-danger">*</span></label>
                                <div>
                            <?= isset($variable->apellido_paterno) ? $variable->apellido_paterno : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="apellidoMaterno" class=" control-label">Apellido
                                Materno:<span class="text-danger">*</span></label>
                                <div>
                            <?= isset($variable->apellido_materno) ? $variable->apellido_materno : ''  ?>
                        </div>
                        </div>
                    </div>
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
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="fecha_nacimiento_dep">Fecha de Nacimiento: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->fecha_nacimiento) ? $variable->fecha_nacimiento : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="sexo_dep" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="parentesco_familiar" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                            <div>
                            <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr  class="mt-3 mb-3"/>
            <div id="CardConyugeB">
            </div>
        </form>
    </div>
</div>

<script>

</script>