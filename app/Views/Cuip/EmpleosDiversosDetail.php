<div class="card card-primary" id="cardEmpDiversos">
    <div class="card-header">
        <h3 class="card-title">EMPLEOS DIVERSOS</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunodiversos">


            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="EmpleosDiversos">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="empresa" class=" control-label">Empresa:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->empresa) ? $diversos->empresa : ''  ?>
                        </div>
                    </div>
                </div>

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->calle) ? $diversos->calle : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->numero_exterior) ? $diversos->numero_exterior : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($diversos->numero_interior) ? $diversos->numero_interior : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoEmpDiv" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->idCodigoPostal) ? $diversos->idCodigoPostal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoEmpDiv" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->colonia) ? $diversos->colonia : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoEmpDiv" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                       <div>
                            <?= isset($diversos->estado) ? $diversos->estado : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoEmpDiv" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->municipio) ? $diversos->municipio : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->numero_telefono) ? $diversos->numero_telefono : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ingresoEmpDiv" class=" control-label">Ingreso:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->ingreso) ? $diversos->ingreso : ''  ?>
                        </div>
                    </div>
                </div>

                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="funciones" class=" control-label">Funciones:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->primer_nombre) ? $diversos->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sueldo" class=" control-label">Ingreso Neto (Mensual):<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->sueldo_base) ? $diversos->sueldo_base : ''  ?>
                        </div>
                    </div>
                </div>

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="area" class=" control-label">Area:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->primer_nombre) ? $diversos->primer_nombre : ''  ?>
                        </div>
                    </div>
                </div>

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="motivo_separacion" class=" control-label">Motivo de separación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->separacion) ? $diversos->separacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_separacion" class=" control-label">Tipo de Separación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->tipo_separacion) ? $diversos->tipo_separacion : ''  ?>
                        </div>
                    </div>
                </div>

                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="comentarios" class=" control-label">Comentarios:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($diversos->comentarios) ? $diversos->comentarios : ''  ?>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>

<div class="card card-primary" id="cardEmpDivLaboral">
    <div class="card-header">
        <h3 class="card-title">LABORAL: ACTITUD HACIA EL EMPLEO</h3>

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
                    <label for="empleo" class=" control-label">¿Por qué Eligio este empleo?<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->eligio_empleo) ? $diversos->eligio_empleo : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="puesto" class=" control-label">¿Qué puesto le gustaria tener?<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->puesto_gustaria) ? $diversos->puesto_gustaria : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="area_gustaria" class=" control-label">¿En que area le gustaría estar?<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->area_gustaria) ? $diversos->area_gustaria : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="ascender" class=" control-label">¿En que tiempo desea ascender?<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->tiempo_ascenso) ? $diversos->tiempo_ascenso : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="reglamentacion" class=" control-label">¿Conoce la reglamentación de los reconocimientos?<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->reglamento) ? $diversos->reglamento : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="reconomiento" class=" control-label">¿Razones por las que no ha recibido un reconocimiento?<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->razon_ascenso) ? $diversos->razon_ascenso : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="reglamentacion_ascenso" class=" control-label">¿Conoce la reglamentación de los ascensos?<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->primer_nombre) ? $diversos->primer_nombre : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="razones_ascenso" class=" control-label">¿Razones por las que no ha recibido un ascenso?<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->razon_ascenso) ? $diversos->razon_ascenso : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="capacitacion" class=" control-label">¿Qué capacitación le gustaría recibir?<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->capacitacion) ? $diversos->capacitacion : ''  ?>
                        </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card card-primary" id="cardEmpDivDisc">
    <div class="card-header">
        <h3 class="card-title">LABORAL: DISCIPLINA LABORAL</h3>

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
                    <label for="desciplina" class=" control-label">Tipo de Disciplina:<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->disciplina) ? $diversos->disciplina : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="subtipo_disciplina" class=" control-label">Subtipo de disciplina<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->subtipo_disciplina) ? $diversos->subtipo_disciplina : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="motivo" class=" control-label">Motivo<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->motivo) ? $diversos->motivo : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="tipo" class=" control-label">Tipo<span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->tipo) ? $diversos->tipo : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label for="fecha_inicialDis">Fecha de Inicio: <span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->fecha_inicio) ? $diversos->fecha_inicio : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class='form-group'>
                    <label for="fecha_finalDis">Fecha de Término: <span class="text-danger">*</span></label>
                    <div>
                            <?= isset($diversos->fecha_termino) ? $diversos->fecha_termino : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label for="licencias_medicas" class=" control-label">En caso de licencias médicas:</label>

                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="duracion" class=" control-label">Duración:</label>
                    <div>
                            <?= isset($diversos->duracion) ? $diversos->duracion : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="cantidad" class=" control-label">Cantidad:</label>
                    <div>
                            <?= isset($diversos->cantidad) ? $diversos->cantidad : ''  ?>
                        </div>
                </div>
            </div>
        </div>
        <hr  class="mt-3 mb-3"/>
        </form>
    </div>
</div>

<script>

</script>