<div class="card card-primary" id="cardRefFamCer">
    <div class="card-header">
        <h3 class="card-title">FAMILIAR CERCANO</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="referencias">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoPaterno" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->apellido_paterno_fam) ? $referencia->apellido_paterno_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->apellido_materno_fam) ? $referencia->apellido_materno_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->primer_nombre_fam) ? $referencia->primer_nombre_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <?= isset($referencia->segundo_nombre_fam) ? $referencia->segundo_nombre_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_fam_cer" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idGenero_fam) ? $referencia->idGenero_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacion" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->ocupacion_fam) ? $referencia->ocupacion_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_fam_cercano" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idParentesco_fam) ? $referencia->idParentesco_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->calle_fam) ? $referencia->calle_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->primnumero_exterior_famer_nombre) ? $referencia->numero_exterior_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($referencia->numero_interior_fam) ? $referencia->numero_interior_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->numero_telefono_fam) ? $referencia->numero_telefono_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoRefCer" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idCodigoPostal_fam) ? $referencia->idCodigoPostal_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoRefCer" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->colonia_fam) ? $referencia->colonia_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoRefCer" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idEstado_fam) ? $referencia->idEstado_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoRefCer" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->municipio_fam) ? $referencia->municipio_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoRefCer" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->ciudad_fam) ? $referencia->ciudad_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="pais" class="control-label">Pais: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idPaisNacimiento_fam) ? $referencia->idPaisNacimiento_fam : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>

<div class="card card-primary" id="cardrefParCer">
    <div class="card-header">
        <h3 class="card-title">PARIENTE CERCANO</h3>

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
                        <label for="apellidoPaternoParCer" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->apellido_paterno_pariente) ? $referencia->apellido_paterno_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaternoParCer" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->apellido_materno_pariente) ? $referencia->apellido_materno_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombreParCer" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->primer_nombre_pariente) ? $referencia->primer_nombre_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombreParCer" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <?= isset($referencia->segundo_nombre_pariente) ? $referencia->segundo_nombre_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_par_cer" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idGenero_pariente) ? $referencia->idGenero_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacionParCer" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->ocupacion_pariente) ? $referencia->ocupacion_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_cercano" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idParentesco_pariente) ? $referencia->idParentesco_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calleParCer" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->calle_pariente) ? $referencia->calle_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exteriorParCer" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->numero_exterior_pariente) ? $referencia->numero_exterior_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interiorParCer" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($referencia->numero_interior_pariente) ? $referencia->numero_interior_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numeroParCer" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->numero_telefono_pariente) ? $referencia->numero_telefono_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoParCer" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idCodigoPostal_pariente) ? $referencia->idCodigoPostal_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoParCer" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->colonia_pariente) ? $referencia->colonia_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoParCer" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idEstado_pariente) ? $referencia->idEstado_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoParCer" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->municipio_pariente) ? $referencia->municipio_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoParCer" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->ciudad_pariente) ? $referencia->ciudad_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="paisParCer" class="control-label">Pais: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idPaisNacimiento_pariente) ? $referencia->idPaisNacimiento_pariente : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>

<div class="card card-primary" id="cardRefPersonal">
    <div class="card-header">
        <h3 class="card-title">PERSONAL</h3>

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
                        <label for="apellidoPaternoRefPer" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->apellido_paterno_personal) ? $referencia->apellido_paterno_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaternoRefPer" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->apellido_materno_personal) ? $referencia->apellido_materno_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombreRefPer" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->primer_nombre_personal) ? $referencia->primer_nombre_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombreRefPer" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <?= isset($referencia->segundo_nombre_personal) ? $referencia->segundo_nombre_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_per" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idGenero_personal) ? $referencia->idGenero_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacionRefPer" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->ocupacion_personal) ? $referencia->ocupacion_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_personal" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idParentesco_personal) ? $referencia->idParentesco_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calleRefPer" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->calle_personal) ? $referencia->calle_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exteriorRefPer" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->numero_exterior_personal) ? $referencia->numero_exterior_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interiorRefPer" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($referencia->numero_interior_personal) ? $referencia->numero_interior_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numeroRefPer" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->numero_telefono_personal) ? $referencia->numero_telefono_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoPersonal" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idCodigoPostal_personal) ? $referencia->idCodigoPostal_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoPersonal" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->colonia_personal) ? $referencia->colonia_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoPersonal" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idEstado_personal) ? $referencia->idEstado_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoPersonal" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->municipio_personal) ? $referencia->municipio_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoPersonal" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->ciudad_personal) ? $referencia->ciudad_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="paisRefPer" class="control-label">Pais: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idPaisNacimiento_personal) ? $referencia->idPaisNacimiento_personal : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>

<div class="card card-primary" id="cardRefLaboral">
    <div class="card-header">
        <h3 class="card-title">LABORAL</h3>

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
                        <label for="apellidoPaternoRefLab" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->apellido_paterno_laboral) ? $referencia->apellido_paterno_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaternoRefLab" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->apellido_materno_laboral) ? $referencia->apellido_materno_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombreRefLab" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->primer_nombre_laboral) ? $referencia->primer_nombre_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombreRefLab" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <?= isset($referencia->segundo_nombre_laboral) ? $referencia->segundo_nombre_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_lab" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idGenero_laboral) ? $referencia->idGenero_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacionRefLab" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->ocupacion_laboral) ? $referencia->ocupacion_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_laboral" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idParentesco_laboral) ? $referencia->idParentesco_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calleRefLab" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->calle_laboral) ? $referencia->calle_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->numero_exterior_laboral) ? $referencia->numero_exterior_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interiorRefLab" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($referencia->numero_interior_laboral) ? $referencia->numero_interior_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numeroRefLab" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->numero_telefono_laboral) ? $referencia->numero_telefono_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoLaboral" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idCodigoPostal_laboral) ? $referencia->idCodigoPostal_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="colonia_fam_cercano" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->colonia_laboral) ? $referencia->colonia_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoLaboral" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idEstado_laboral) ? $referencia->idEstado_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoLaboral" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->municipio_laboral) ? $referencia->municipio_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoLaboral" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->ciudad_laboral) ? $referencia->ciudad_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="paisRefLab" class="control-label">Pais: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($referencia->idPaisNacimiento_laboral) ? $referencia->idPaisNacimiento_laboral : ''  ?>
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
