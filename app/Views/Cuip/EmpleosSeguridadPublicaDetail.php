<div class="card card-primary" id="cardEmplSeguridad">
    <div class="card-header">
        <h3 class="card-title">EMPLEOS EN SEGURIDAD PUBLICA</h3>
        <div class="card-tools">

<a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
        <input type="checkbox" class="form-check-input mt-2" id="btnNinguno">

<button type="button" class="btn btn-tool" data-card-widget="collapse" >
    <i class="fas fa-minus"></i>
</button>
</div> 
       
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="EmpleoSeguridadPublica">
        <div id="CardEMPLEOS">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="dependencia" class=" control-label">Dependencia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->dependencia) ? $seguridad->dependencia : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="corporacion" class=" control-label">Corporación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->corporacion) ? $seguridad->corporacion : ''  ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->calle) ? $seguridad->calle : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->numero_exterior) ? $seguridad->numero_exterior : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($seguridad->numero_interior) ? $seguridad->numero_interior : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->numero_telefono) ? $seguridad->numero_telefono : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoSegPub" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->idCodigoPostal) ? $seguridad->idCodigoPostal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoSegPub" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->colonia) ? $seguridad->colonia : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ingresoEmpPublic" class=" control-label">Ingreso:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->ingreso) ? $seguridad->ingreso : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="separacionEmpSeg" class=" control-label">Separación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->separacion) ? $seguridad->separacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="puesto_funcional" class=" control-label">Puesto Funcional:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->funcional) ? $seguridad->funcional : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="funciones" class=" control-label">Funciones:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->funciones) ? $seguridad->funciones : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especialidad" class=" control-label">Especialidad:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->especialidad) ? $seguridad->especialidad : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rango" class=" control-label">Rango o categoría:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->rango) ? $seguridad->rango : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero_placa" class=" control-label">Numero de placa:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->numero_placa) ? $seguridad->numero_placa : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero_empleado" class=" control-label">Numero de empleado :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->numero_empleado) ? $seguridad->numero_empleado : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sueldo" class=" control-label">Sueldo Base (Mensual):<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->sueldo_base) ? $seguridad->sueldo_base : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="compensaciones" class=" control-label">Compensaciones (Mensual):<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->compensacion) ? $seguridad->compensacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="area" class=" control-label">Area:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->area) ? $seguridad->area : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="division" class=" control-label">División:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->division) ? $seguridad->division : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="jefe_inmediato" class=" control-label">CUIP Jefe Inmediato:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->cuip_jefe) ? $seguridad->cuip_jefe : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_jefe" class=" control-label">Nombre del Jefe Inmediato:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->nombre_jefe) ? $seguridad->nombre_jefe : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoSegPub" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->estado) ? $seguridad->estado : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoSegPub" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->municipio) ? $seguridad->municipio : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="motivo_separacion" class=" control-label">Motivo de separación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->separacion) ? $seguridad->separacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_separacion" class=" control-label">Tipo de Separación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->tipo_separacion) ? $seguridad->tipo_separacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_baja" class=" control-label">Tipo de Baja:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->tipo_baja) ? $seguridad->tipo_baja : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="comentarios" class=" control-label">Comentarios:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($seguridad->comentarios) ? $seguridad->comentarios : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <hr  class="mt-3 mb-3"/>
        <div id="CardEMPLEOS">
        </div>
        </form>
    </div>
</div>

<script>
 
</script>