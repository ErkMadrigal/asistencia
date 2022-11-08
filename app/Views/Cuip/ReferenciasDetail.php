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
                            <?= isset($variable->apellido_paterno_fam) ? $variable->apellido_paterno_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->apellido_materno_fam) ? $variable->apellido_materno_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre_fam) ? $variable->primer_nombre_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <?= isset($variable->segundo_nombre_fam) ? $variable->segundo_nombre_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_fam_cer" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idGenero_fam) ? $variable->idGenero_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacion" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->ocupacion_fam) ? $variable->ocupacion_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_fam_cercano" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idParentesco_fam) ? $variable->idParentesco_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->calle_fam) ? $variable->calle_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primnumero_exterior_famer_nombre) ? $variable->numero_exterior_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($variable->numero_interior_fam) ? $variable->numero_interior_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->numero_telefono_fam) ? $variable->numero_telefono_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoRefCer" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idCodigoPostal_fam) ? $variable->idCodigoPostal_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoRefCer" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->colonia_fam) ? $variable->colonia_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoRefCer" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idEstado_fam) ? $variable->idEstado_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoRefCer" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->municipio_fam) ? $variable->municipio_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoRefCer" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->ciudad_fam) ? $variable->ciudad_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="pais" class="control-label">Pais: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idPaisNacimiento_fam) ? $variable->idPaisNacimiento_fam : ''  ?>
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
                            <?= isset($variable->apellido_paterno_pariente) ? $variable->apellido_paterno_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaternoParCer" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->apellido_materno_pariente) ? $variable->apellido_materno_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombreParCer" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre_pariente) ? $variable->primer_nombre_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombreParCer" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <?= isset($variable->segundo_nombre_pariente) ? $variable->segundo_nombre_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_par_cer" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idGenero_pariente) ? $variable->idGenero_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacionParCer" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->ocupacion_pariente) ? $variable->ocupacion_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_cercano" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idParentesco_pariente) ? $variable->idParentesco_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calleParCer" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->calle_pariente) ? $variable->calle_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exteriorParCer" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->numero_exterior_pariente) ? $variable->numero_exterior_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interiorParCer" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($variable->numero_interior_pariente) ? $variable->numero_interior_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numeroParCer" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->numero_telefono_pariente) ? $variable->numero_telefono_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoParCer" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idCodigoPostal_pariente) ? $variable->idCodigoPostal_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoParCer" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->colonia_pariente) ? $variable->colonia_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoParCer" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idEstado_pariente) ? $variable->idEstado_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoParCer" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->municipio_pariente) ? $variable->municipio_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoParCer" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->ciudad_pariente) ? $variable->ciudad_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="paisParCer" class="control-label">Pais: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idPaisNacimiento_pariente) ? $variable->idPaisNacimiento_pariente : ''  ?>
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
                            <?= isset($variable->apellido_paterno_personal) ? $variable->apellido_paterno_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaternoRefPer" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->apellido_materno_personal) ? $variable->apellido_materno_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombreRefPer" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre_personal) ? $variable->primer_nombre_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombreRefPer" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <?= isset($variable->segundo_nombre_personal) ? $variable->segundo_nombre_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_per" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idGenero_personal) ? $variable->idGenero_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacionRefPer" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->ocupacion_personal) ? $variable->ocupacion_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_personal" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idParentesco_personal) ? $variable->idParentesco_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calleRefPer" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->calle_personal) ? $variable->calle_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exteriorRefPer" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->numero_exterior_personal) ? $variable->numero_exterior_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interiorRefPer" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($variable->numero_interior_personal) ? $variable->numero_interior_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numeroRefPer" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->numero_telefono_personal) ? $variable->numero_telefono_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoPersonal" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idCodigoPostal_personal) ? $variable->idCodigoPostal_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoPersonal" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->colonia_personal) ? $variable->colonia_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoPersonal" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idEstado_personal) ? $variable->idEstado_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoPersonal" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->municipio_personal) ? $variable->municipio_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoPersonal" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->ciudad_personal) ? $variable->ciudad_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="paisRefPer" class="control-label">Pais: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idPaisNacimiento_personal) ? $variable->idPaisNacimiento_personal : ''  ?>
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
                            <?= isset($variable->apellido_paterno_laboral) ? $variable->apellido_paterno_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaternoRefLab" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->apellido_materno_laboral) ? $variable->apellido_materno_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombreRefLab" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->primer_nombre_laboral) ? $variable->primer_nombre_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombreRefLab" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <?= isset($variable->segundo_nombre_laboral) ? $variable->segundo_nombre_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_lab" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idGenero_laboral) ? $variable->idGenero_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacionRefLab" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->ocupacion_laboral) ? $variable->ocupacion_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_laboral" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idParentesco_laboral) ? $variable->idParentesco_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calleRefLab" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->calle_laboral) ? $variable->calle_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->numero_exterior_laboral) ? $variable->numero_exterior_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interiorRefLab" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($variable->numero_interior_laboral) ? $variable->numero_interior_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numeroRefLab" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->numero_telefono_laboral) ? $variable->numero_telefono_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoLaboral" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idCodigoPostal_laboral) ? $variable->idCodigoPostal_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="colonia_fam_cercano" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->colonia_laboral) ? $variable->colonia_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoLaboral" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idEstado_laboral) ? $variable->idEstado_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoLaboral" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->municipio_laboral) ? $variable->municipio_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoLaboral" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->ciudad_laboral) ? $variable->ciudad_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="paisRefLab" class="control-label">Pais: <span class="text-danger">*</span></label>
                        <div>
                            <?= isset($variable->idPaisNacimiento_laboral) ? $variable->idPaisNacimiento_laboral : ''  ?>
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
