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
                            <label for="familia" class="control-label">¿Vive con su Familia?: </label>
                            <div>
                            <?= isset($estudio->vive) ? $estudio->vive : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="ingreso" class=" control-label">Ingreso familiar adicional
                                (Mensual):</label>
                                <div>
                            <?= isset($estudio->ingreso_familiar) ? $estudio->ingreso_familiar : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="domicilio_tipo" class="control-label">Su domicilio es: </label>
                            <div>
                            <?= isset($estudio->domicilio) ? $estudio->domicilio : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="actividad" class=" control-label">Actividades culturales o deportivas
                                que practique:</label>
                                <div>
                            <?= isset($estudio->actividades_culturales) ? $estudio->actividades_culturales : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="especificacion" class=" control-label">Especifiación de inmueble y
                                costo:</label>
                                <div>
                            <?= isset($estudio->especificacion_inmueble) ? $estudio->especificacion_inmueble : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="inversion" class=" control-label">Inversiones y monto
                                aproximado:</label>
                                <div>
                            <?= isset($estudio->inversiones) ? $estudio->inversiones : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="vehiculo" class=" control-label">Vehiculo y costo Aproximado:</label>
                            <div>
                            <?= isset($estudio->vehiculo) ? $estudio->vehiculo : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="calidad" class=" control-label">Calidad de Vida:</label>
                            <div>
                            <?= isset($estudio->calidad_vida) ? $estudio->calidad_vida : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="vicio" class=" control-label">Vicios:</label>
                            <div>
                            <?= isset($estudio->vicios) ? $estudio->vicios : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="imagen" class=" control-label">Imagen Publica:</label>
                            <div>
                            <?= isset($estudio->imagen_publica) ? $estudio->imagen_publica : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="comportamiento" class=" control-label">Comportamiento Social:</label>
                            <div>
                            <?= isset($estudio->comportamiento) ? $estudio->comportamiento : ''  ?>
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
            <?php
        if( !empty($economico_dependientes) ):
            foreach($economico_dependientes as  $e){
                                        ?>   
                <div class="row" class="form-block">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="apellidoPaterno" class=" control-label">Apellido
                                Paterno:</label>
                                <div>
                            <?= isset($e->apellido_paterno) ? $e->apellido_paterno : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="apellidoMaterno" class=" control-label">Apellido
                                Materno:</label>
                                <div>
                            <?= isset($e->apellido_materno) ? $e->apellido_materno : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="primerNombre" class="control-label">Primer Nombre: </label>
                            <div>
                            <?= isset($e->primer_nombre) ? $e->primer_nombre : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="segundoNombre" class=" control-label">Segundo Nombre:</label>
                            <div>
                            <?= isset($e->segundo_nombre) ? $e->segundo_nombre : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="fecha_nacimiento_dep">Fecha de Nacimiento: </label>
                            <div>
                            <?= isset($e->fecha_nacimiento) ? date( "d-m-Y" ,strtotime($e->fecha_nacimiento)) : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="sexo_dep" class=" control-label">Sexo:</label>
                            <div>
                            <?= isset($e->idGenero) ? $e->idGenero : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="parentesco_familiar" class="control-label">Parentesco: </label>
                            <div>
                            <?= isset($e->idParentesco) ? $e->idParentesco : ''  ?>
                        </div>
                        </div>
                    </div>
                </div>
                <hr  class="mt-3 mb-3"/>
                <?php           
        }
        endif;?> 
            </div>
            
            <div id="CardConyugeB">
            </div>
        </form>
    </div>
</div>
