<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS GENERALES: SOCIOECONÓMICO</h3>

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
                    <label for="familia" class="control-label">¿Vive con su Familia?: </label>
                    <div >
                    <?=$estudio->vive ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="ingreso" class=" control-label">Ingreso familiar adicional
                        (Mensual):</label>
                        <div >
                        <?=$estudio->ingreso_familiar ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="domicilio" class=" control-label">Su domicilio es:</label>
                    <div >
                                <?=$estudio->domicilio ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="actividad" class=" control-label">Actividades culturales o deportivas
                        que practique:</label>
                        <div >
                                <?=$estudio->actividades_culturales ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="especificacion" class=" control-label">Especifiación de inmueble y
                        costo:</label>
                        <div >
                                <?=$estudio->especificacion_inmueble ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="inversion" class=" control-label">Inversiones y monto
                        aproximado:</label>
                        <div >
                                <?=$estudio->inversiones ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="vehiculo" class=" control-label">Vehiculo y costo Aproximado:</label>
                    <div >
                                <?=$estudio->vehiculo ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="calidad" class=" control-label">Calidad de Vida:</label>
                    <div >
                                <?=$estudio->calidad_vida?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="vicio" class=" control-label">Vicios:</label>
                    <div >
                                <?=$estudio->vicios ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="imagen" class=" control-label">Imagen Publica:</label>
                    <div >
                                <?=$estudio->imagen_publica ?>
                                    
                            </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="comportamiento" class=" control-label">Comportamiento Social:</label>
                    <div >
                                <?=$estudio->comportamiento ?>
                                    
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>        
<div class="card card-primary">
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
        <form class="form-horizontal" id="">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoPaterno" class=" control-label">Apellido
                            Paterno:</label>
                            <div >
                                <?=$estudio->apellido_paterno?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido
                            Materno:</label>
                            <div >
                                <?=$estudio->apellido_materno ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: </label>
                        <div >
                                <?=$estudio->primer_nombre ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre:
                            </label>
                            <div >
                                <?=$estudio->segundo_nombre ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_nacimiento">Fecha de Nacimiento: </label>
                        <div class="input-group date" id="fecha_nacimiento" data-target-input="nearest">
                        <div >
                                <?=$estudio->fecha_nacimiento ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo" class=" control-label"> sexo:</label>
                            <div >
                                <?=$estudio->sexo ?>
                                    
                            </div>

                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="parentesco" class=" control-label"> Parentesco:</label>
                            <div >
                                <?=$estudio->parentesco ?>
                                    
                            </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>