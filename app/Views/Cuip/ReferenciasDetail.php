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
                        <label for="apellidoPaterno" class=" control-label">Apellido Paterno:</label>
                        <div>
                            <?= isset($referencia->apellido_paterno_fam) ? $referencia->apellido_paterno_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno:</label>
                        <div>
                            <?= isset($referencia->apellido_materno_fam) ? $referencia->apellido_materno_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: </label>
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
                        <label for="sexo_fam_cer" class=" control-label">Sexo:</label>
                        <div>
                            <?= isset($referencia->idGenero_fam) ? $referencia->idGenero_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacion" class=" control-label">Ocupación:</label>
                        <div>
                            <?= isset($referencia->ocupacion_fam) ? $referencia->ocupacion_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_fam_cercano" class="control-label">Parentesco: </label>
                        <div>
                            <?= isset($referencia->idParentesco_fam) ? $referencia->idParentesco_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle :</label>
                        <div>
                            <?= isset($referencia->calle_fam) ? $referencia->calle_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:</label>
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
                        <label for="numero" class=" control-label">Numero Telefónico:</label>
                        <div>
                            <?= isset($referencia->numero_telefono_fam) ? $referencia->numero_telefono_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoRefCer" class=" control-label">Código Postal :</label>
                        <div>
                            <?= isset($referencia->idCodigoPostal_fam) ? $referencia->idCodigoPostal_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoRefCer" class=" control-label">Colonia:</label>
                        <div>
                            <?= isset($referencia->colonia_fam) ? $referencia->colonia_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoRefCer" class="control-label">Entidad Federativa: </label>
                        <div>
                            <?= isset($referencia->idEstado_fam) ? $referencia->idEstado_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoRefCer" class="control-label">Municipio: </label>
                        <div>
                            <?= isset($referencia->municipio_fam) ? $referencia->municipio_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoRefCer" class="control-label">Ciudad: </label>
                        <div>
                            <?= isset($referencia->ciudad_fam) ? $referencia->ciudad_fam : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="pais" class="control-label">Pais: </label>
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
                        <label for="apellidoPaternoParCer" class=" control-label">Apellido Paterno:</label>
                        <div>
                            <?= isset($referencia->apellido_paterno_pariente) ? $referencia->apellido_paterno_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaternoParCer" class=" control-label">Apellido Materno:</label>
                        <div>
                            <?= isset($referencia->apellido_materno_pariente) ? $referencia->apellido_materno_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombreParCer" class="control-label">Primer Nombre: </label>
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
                        <label for="sexo_par_cer" class=" control-label">Sexo:</label>
                        <div>
                            <?= isset($referencia->idGenero_pariente) ? $referencia->idGenero_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacionParCer" class=" control-label">Ocupación:</label>
                        <div>
                            <?= isset($referencia->ocupacion_pariente) ? $referencia->ocupacion_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_cercano" class="control-label">Parentesco: </label>
                        <div>
                            <?= isset($referencia->idParentesco_pariente) ? $referencia->idParentesco_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calleParCer" class=" control-label">Calle :</label>
                        <div>
                            <?= isset($referencia->calle_pariente) ? $referencia->calle_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exteriorParCer" class=" control-label">No. Exterior:</label>
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
                        <label for="numeroParCer" class=" control-label">Numero Telefónico:</label>
                        <div>
                            <?= isset($referencia->numero_telefono_pariente) ? $referencia->numero_telefono_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoParCer" class=" control-label">Código Postal :</label>
                        <div>
                            <?= isset($referencia->idCodigoPostal_pariente) ? $referencia->idCodigoPostal_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoParCer" class=" control-label">Colonia:</label>
                        <div>
                            <?= isset($referencia->colonia_pariente) ? $referencia->colonia_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoParCer" class="control-label">Entidad Federativa: </label>
                        <div>
                            <?= isset($referencia->idEstado_pariente) ? $referencia->idEstado_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoParCer" class="control-label">Municipio: </label>
                        <div>
                            <?= isset($referencia->municipio_pariente) ? $referencia->municipio_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoParCer" class="control-label">Ciudad: </label>
                        <div>
                            <?= isset($referencia->ciudad_pariente) ? $referencia->ciudad_pariente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="paisParCer" class="control-label">Pais: </label>
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
                        <label for="apellidoPaternoRefPer" class=" control-label">Apellido Paterno:</label>
                        <div>
                            <?= isset($referenciaLab->apellido_paterno_personal) ? $referenciaLab->apellido_paterno_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaternoRefPer" class=" control-label">Apellido Materno:</label>
                        <div>
                            <?= isset($referenciaLab->apellido_materno_personal) ? $referenciaLab->apellido_materno_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombreRefPer" class="control-label">Primer Nombre: </label>
                        <div>
                            <?= isset($referenciaLab->primer_nombre_personal) ? $referenciaLab->primer_nombre_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombreRefPer" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <?= isset($referenciaLab->segundo_nombre_personal) ? $referenciaLab->segundo_nombre_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_per" class=" control-label">Sexo:</label>
                        <div>
                            <?= isset($referenciaLab->idGenero_personal) ? $referenciaLab->idGenero_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacionRefPer" class=" control-label">Ocupación:</label>
                        <div>
                            <?= isset($referenciaLab->ocupacion_personal) ? $referenciaLab->ocupacion_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_personal" class="control-label">Parentesco: </label>
                        <div>
                            <?= isset($referenciaLab->idParentesco_personal) ? $referenciaLab->idParentesco_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calleRefPer" class=" control-label">Calle :</label>
                        <div>
                            <?= isset($referenciaLab->calle_personal) ? $referenciaLab->calle_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exteriorRefPer" class=" control-label">No. Exterior:</label>
                        <div>
                            <?= isset($referenciaLab->numero_exterior_personal) ? $referenciaLab->numero_exterior_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interiorRefPer" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($referenciaLab->numero_interior_personal) ? $referenciaLab->numero_interior_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numeroRefPer" class=" control-label">Numero Telefónico:</label>
                        <div>
                            <?= isset($referenciaLab->numero_telefono_personal) ? $referenciaLab->numero_telefono_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoPersonal" class=" control-label">Código Postal :</label>
                        <div>
                            <?= isset($referenciaLab->idCodigoPostal_personal) ? $referenciaLab->idCodigoPostal_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoPersonal" class=" control-label">Colonia:</label>
                        <div>
                            <?= isset($referenciaLab->colonia_personal) ? $referenciaLab->colonia_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoPersonal" class="control-label">Entidad Federativa: </label>
                        <div>
                            <?= isset($referenciaLab->idEstado_personal) ? $referenciaLab->idEstado_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoPersonal" class="control-label">Municipio: </label>
                        <div>
                            <?= isset($referenciaLab->municipio_personal) ? $referenciaLab->municipio_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoPersonal" class="control-label">Ciudad: </label>
                        <div>
                            <?= isset($referenciaLab->ciudad_personal) ? $referenciaLab->ciudad_personal : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="paisRefPer" class="control-label">Pais: </label>
                        <div>
                            <?= isset($referenciaLab->idPaisNacimiento_personal) ? $referenciaLab->idPaisNacimiento_personal : ''  ?>
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
                        <label for="apellidoPaternoRefLab" class=" control-label">Apellido Paterno:</label>
                        <div>
                            <?= isset($referenciaLab->apellido_paterno_laboral) ? $referenciaLab->apellido_paterno_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaternoRefLab" class=" control-label">Apellido Materno:</label>
                        <div>
                            <?= isset($referenciaLab->apellido_materno_laboral) ? $referenciaLab->apellido_materno_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombreRefLab" class="control-label">Primer Nombre: </label>
                        <div>
                            <?= isset($referenciaLab->primer_nombre_laboral) ? $referenciaLab->primer_nombre_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombreRefLab" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <?= isset($referenciaLab->segundo_nombre_laboral) ? $referenciaLab->segundo_nombre_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_lab" class=" control-label">Sexo:</label>
                        <div>
                            <?= isset($referenciaLab->idGenero_laboral) ? $referenciaLab->idGenero_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacionRefLab" class=" control-label">Ocupación:</label>
                        <div>
                            <?= isset($referenciaLab->ocupacion_laboral) ? $referenciaLab->ocupacion_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_laboral" class="control-label">Parentesco: </label>
                        <div>
                            <?= isset($referenciaLab->idParentesco_laboral) ? $referenciaLab->idParentesco_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calleRefLab" class=" control-label">Calle :</label>
                        <div>
                            <?= isset($referenciaLab->calle_laboral) ? $referenciaLab->calle_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:</label>
                        <div>
                            <?= isset($referenciaLab->numero_exterior_laboral) ? $referenciaLab->numero_exterior_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interiorRefLab" class=" control-label">No. Interior:</label>
                        <div>
                            <?= isset($referenciaLab->numero_interior_laboral) ? $referenciaLab->numero_interior_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numeroRefLab" class=" control-label">Numero Telefónico:</label>
                        <div>
                            <?= isset($referenciaLab->numero_telefono_laboral) ? $referenciaLab->numero_telefono_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoLaboral" class=" control-label">Código Postal :</label>
                        <div>
                            <?= isset($referenciaLab->idCodigoPostal_laboral) ? $referenciaLab->idCodigoPostal_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="colonia_fam_cercano" class=" control-label">Colonia:</label>
                        <div>
                            <?= isset($referenciaLab->colonia_laboral) ? $referenciaLab->colonia_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoLaboral" class="control-label">Entidad Federativa: </label>
                        <div>
                            <?= isset($referenciaLab->idEstado_laboral) ? $referenciaLab->idEstado_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoLaboral" class="control-label">Municipio: </label>
                        <div>
                            <?= isset($referenciaLab->municipio_laboral) ? $referenciaLab->municipio_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigoLaboral" class="control-label">Ciudad: </label>
                        <div>
                            <?= isset($referenciaLab->ciudad_laboral) ? $referenciaLab->ciudad_laboral : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="paisRefLab" class="control-label">Pais: </label>
                        <div>
                            <?= isset($referenciaLab->idPaisNacimiento_laboral) ? $referenciaLab->idPaisNacimiento_laboral : ''  ?>
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
