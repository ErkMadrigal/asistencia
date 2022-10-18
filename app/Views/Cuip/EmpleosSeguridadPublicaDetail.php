<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">EMPLEOS EN SEGURIDAD PUBLICA</h3>

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
                        <label for="dependencia" class=" control-label">Dependencia:</label>
                        <div >
                                <?=$seguridad->dependencia ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="corporacion" class=" control-label">Corporacióne:</label>
                        <div >
                                <?=$seguridad->corporacion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: </label>
                        <div >
                                <?=$seguridad->primer_nombre ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre: </label>
                        <div >
                                <?=$seguridad->segundo_nombre ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle :</label>
                        <div >
                                <?=$seguridad->calle ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:</label>
                        <div >
                                <?=$seguridad->numero_exterior ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:</label>
                        <div >
                                <?=$seguridad->numero_interior ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="colonia" class=" control-label">Colonia:</label>
                        <div >
                                <?=$seguridad->colonia ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigo" class=" control-label">Código Postal :</label>
                        <div >
                                <?=$seguridad->idCodigoPostal ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero Telefónico:</label>
                        <div >
                                <?=$seguridad->numero_telefono ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ingreso" class=" control-label">Ingreso:</label>
                        <div >
                                <?=$seguridad->ingreso ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="separacion" class=" control-label">Separación:</label>
                        <div >
                                <?=$seguridad->separacion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="puesto_funcional" class=" control-label">Puesto Funcional:</label>
                        <div >
                                <?=$seguridad->funcional ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="funciones" class=" control-label">Funciones:</label>
                        <div >
                                <?=$seguridad->funciones ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="especialidad" class=" control-label">Especialidad:</label>
                        <div >
                                <?=$seguridad->especialidad ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="rango" class=" control-label">Rango o categoría:</label>
                        <div >
                                <?=$seguridad->rango ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero_placa" class=" control-label">Numero de placa:</label>
                        <div >
                                <?=$seguridad->numero_placa ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero_empleado" class=" control-label">Numero de empleado :</label>
                        <div >
                                <?=$seguridad->numero_empleado ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sueldo" class=" control-label">Sueldo Base (Mensual):</label>
                        <div >
                                <?=$seguridad->sueldo_base ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="compensaciones" class=" control-label">Compensaciones (Mensual):</label>
                        <div >
                                <?=$seguridad->compensacion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="area" class=" control-label">Area:</label>
                        <div >
                                <?=$seguridad->area ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="division" class=" control-label">División:</label>
                        <div >
                                <?=$seguridad->division ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="jefe_inmediato" class=" control-label">CUIP Jefe Inmediato:</label>
                        <div >
                                <?=$seguridad->cuip_jefe ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_jefe" class=" control-label">Nombre del Jefe Inmediato:</label>
                        <div >
                                <?=$seguridad->nombre_jefe ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entidad" class=" control-label">Entidad Federativa:</label>
                        <div >
                                <?=$seguridad->estado ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="municipio" class=" control-label">Municipio:</label>
                        <div >
                                <?=$seguridad->municipio ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="motivo_separacion" class=" control-label">Motivo de separación:</label>
                        <div >
                                <?=$seguridad->separacion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_separacion" class=" control-label">Tipo de Separación:</label>
                        <div >
                                <?=$seguridad->tipo_separacion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_baja" class=" control-label">Tipo de Baja:</label>
                        <div >
                                <?=$seguridad->tipo_baja ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="comentarios" class=" control-label">Comentarios:</label>
                        <div >
                                <?=$seguridad->comentarios ?>
                                    
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>