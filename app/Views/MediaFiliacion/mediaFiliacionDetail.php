<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">GENERALES</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="Nombre" class="control-label">Complexión: </label>
                        <div>
                            <?= isset($mediaFiliacion->idComplexion) ? $mediaFiliacion->idComplexion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="piel" class="control-label">Piel: </label>
                        <div>
                        <?= isset($mediaFiliacion->idPiel) ? $mediaFiliacion->idPiel : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="cara" class="control-label">Cara: </label>
                        <div>
                        <?= isset($mediaFiliacion->idCara) ? $mediaFiliacion->idCara : ''  ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="anteojos" class="control-label">Uso de Anteojos: </label>
                        <div>
                        <?= isset($mediaFiliacion->idUsaAnteojos) ? $mediaFiliacion->idUsaAnteojos : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="estatura" class="control-label">Estatura: </label>
                        <div>
                        <?= isset($mediaFiliacion->estatura) ? $mediaFiliacion->estatura : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="peso" class="control-label">Peso: </label>
                        <div>
                        <?= isset($mediaFiliacion->peso) ? $mediaFiliacion->peso : ''  ?>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">CABELLO</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="cabello_cantidad" class="control-label">Cantidad: </label>
                        <div>
                        <?= isset($mediaFiliacion->idCantidadCabello) ? $mediaFiliacion->idCantidadCabello : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="color_cabello" class="control-label">Color: </label>
                        <div>
                        <?= isset($mediaFiliacion->idColorCabello) ? $mediaFiliacion->idColorCabello : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_cabello" class="control-label">Forma: </label>
                        <div>
                        <?= isset($mediaFiliacion->idFormaCabello) ? $mediaFiliacion->idFormaCabello : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="calvicie_cabello" class="control-label">Calvicie: </label>
                        <div>
                        <?= isset($mediaFiliacion->idCalvicie) ? $mediaFiliacion->idCalvicie : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="implatacion_cabello" class="control-label">Implantación: </label>
                        <div>
                        <?= isset($mediaFiliacion->idImplantacionCabello) ? $mediaFiliacion->idImplantacionCabello : ''  ?>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">FRENTE</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="altura" class="control-label">Altura: </label>
                        <div>
                        <?= isset($mediaFiliacion->idAlturaFrente) ? $mediaFiliacion->idAlturaFrente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="inclinacion" class="control-label">Inclinación: </label>
                        <div>
                        <?= isset($mediaFiliacion->idInclinacionFrente) ? $mediaFiliacion->idInclinacionFrente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="ancho" class="control-label">Ancho: </label>
                        <div>
                        <?= isset($mediaFiliacion->idAnchoFrente) ? $mediaFiliacion->idAnchoFrente : ''  ?> 
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">CEJAS</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="direccion_cejas" class="control-label">Dirección: </label>
                        <div>
                        <?= isset($mediaFiliacion->idDireccionCejas) ? $mediaFiliacion->idDireccionCejas : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="implantacion_cejas" class="control-label">Implantacion: </label>
                        <div>
                        <?= isset($mediaFiliacion->idImplantacionCejas) ? $mediaFiliacion->idImplantacionCejas : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma" class="control-label">Forma: </label>
                        <div>
                        <?= isset($mediaFiliacion->idFormaCejas) ? $mediaFiliacion->idFormaCejas : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tamanno" class="control-label">Tamaño: </label>
                        <div>
                        <?= isset($mediaFiliacion->idTamanoCejas) ? $mediaFiliacion->idTamanoCejas : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">OJOS</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="color" class="control-label">Color: </label>
                        <div>
                        <?= isset($mediaFiliacion->idColorOjos) ? $mediaFiliacion->idColorOjos : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_ojos" class="control-label">Forma: </label>
                        <div>
                        <?= isset($mediaFiliacion->idFormaOjos) ? $mediaFiliacion->idFormaOjos : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tamanno_ojos" class="control-label">Tamaño: </label>
                        <div>
                        <?= isset($mediaFiliacion->idTamanoOjos) ? $mediaFiliacion->idTamanoOjos : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">NARIZ</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="raiz" class="control-label">Raíz: </label>
                        <div>
                        <?= isset($mediaFiliacion->idRaiz) ? $mediaFiliacion->idRaiz : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="dorso" class="control-label">Dorso: </label>
                        <div>
                        <?= isset($mediaFiliacion->idDorso) ? $mediaFiliacion->idDorso : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="ancho_nariz" class="control-label">Ancho: </label>
                        <div>
                        <?= isset($mediaFiliacion->idAnchoNariz) ? $mediaFiliacion->idAnchoNariz : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="base_nariz" class="control-label">Base: </label>
                        <div>
                        <?= isset($mediaFiliacion->idBaseNariz) ? $mediaFiliacion->idBaseNariz : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="altura_nariz" class="control-label">Altura: </label>
                        <div>
                        <?= isset($mediaFiliacion->idAlturaNariz) ? $mediaFiliacion->idAlturaNariz : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">BOCA</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tamanno_boca" class="control-label">Tamaño: </label>
                        <div>
                        <?= isset($mediaFiliacion->idTamanoBoca) ? $mediaFiliacion->idTamanoBoca : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="comisura_boca" class="control-label">Comisuras: </label>
                        <div>
                        <?= isset($mediaFiliacion->idComisuras) ? $mediaFiliacion->idComisuras : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">LABIOS</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="espesor_labios" class="control-label">Espesor: </label>
                        <div>
                        <?= isset($mediaFiliacion->idEspesorLabio) ? $mediaFiliacion->idEspesorLabio : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="altura_labial" class="control-label">Altura Naso-Labial: </label>
                        <div>
                        <?= isset($mediaFiliacion->idAlturaNasolabial) ? $mediaFiliacion->idAlturaNasolabial : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="prominencia" class="control-label">Prominencia: </label>
                        <div>
                        <?= isset($mediaFiliacion->idProminenciaLabio) ? $mediaFiliacion->idProminenciaLabio : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">MENTON</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tipo_menton" class="control-label">Tipo: </label>
                        <div>
                        <?= isset($mediaFiliacion->idMentonTipo) ? $mediaFiliacion->idMentonTipo : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_menton" class="control-label">Forma: </label>
                        <div>
                        <?= isset($mediaFiliacion->idMentonForma) ? $mediaFiliacion->idMentonForma : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="inclinacion_menton" class="control-label">Inclinación: </label>
                        <div>
                        <?= isset($mediaFiliacion->idMentonInclinacion) ? $mediaFiliacion->idMentonInclinacion : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">OREJA DERECHA</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_ODerecha" class="control-label">Forma: </label>
                        <div>
                        <?= isset($mediaFiliacion->idFormaOreja) ? $mediaFiliacion->idFormaOreja : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">HELIX</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
                <form class="form-horizontal" id="frmUsuario">
                    <div class="row">
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="original" class="control-label">Original: </label>
                                <div>
                                <?= isset($mediaFiliacion->idOriginal) ? $mediaFiliacion->idOriginal : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="superior" class="control-label">Superior: </label>
                                <div>
                                <?= isset($mediaFiliacion->idSuperior) ? $mediaFiliacion->idSuperior : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="posterior" class="control-label">Posterior: </label>
                                <div>
                                <?= isset($mediaFiliacion->idPosterior) ? $mediaFiliacion->idPosterior : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="adherencia" class="control-label">Adherencia: </label>
                                <div>
                                <?= isset($mediaFiliacion->idAdherenciaHelix) ? $mediaFiliacion->idAdherenciaHelix : ''  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">LOBULO</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
                <form class="form-horizontal" id="frmUsuario">
                    <div class="row">
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="contorno" class="control-label">Contorno: </label>
                                <div>
                                <?= isset($mediaFiliacion->idContornoLobulo) ? $mediaFiliacion->idContornoLobulo : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="adherencia_lobulo" class="control-label">Adherencia: </label>
                                <div>
                                <?= isset($mediaFiliacion->idAdherenciaLobulo) ? $mediaFiliacion->idAdherenciaLobulo : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="particularidad" class="control-label">Particularidad: </label>
                                <div>
                                <?= isset($mediaFiliacion->idParticularidad) ? $mediaFiliacion->idParticularidad : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="dimension" class="control-label">Dimensión: </label>
                                <div>
                                <?= isset($mediaFiliacion->idDimensionLobulo) ? $mediaFiliacion->idDimensionLobulo : ''  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">SANGRE</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tipo_sangre" class="control-label">Tipo: </label>
                        <div>
                        <?= isset($mediaFiliacion->idSangreTipo) ? $mediaFiliacion->idSangreTipo : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="RH_sangre" class="control-label">RH: </label>
                        <div>
                        <?= isset($mediaFiliacion->idRH) ? $mediaFiliacion->idRH : ''  ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">SEÑALES PARTICULARES</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="cicatrices" class="control-label">Cicatrices: </label>
                        <div>
                        <?= isset($mediaFiliacion->idCicatrices) ? $mediaFiliacion->idCicatrices : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cicatrices_descripcion" class=" control-label">Descripción:</label>
                                          </div>
                                          <?= isset($mediaFiliacion->descrip_cicatrices) ? $mediaFiliacion->descrip_cicatrices : ''  ?>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tatuajes" class="control-label">Tatuajes: </label>
                        <div>
                        <?= isset($mediaFiliacion->idTatuajes) ? $mediaFiliacion->idTatuajes : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tatuajes_descripcion" class=" control-label">Descripción:</label>
                                          </div>
                                          <?= isset($mediaFiliacion->descrip_tatuajes) ? $mediaFiliacion->descrip_tatuajes : ''  ?>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="lunares" class="control-label">Lunares: </label>
                        <div>
                        <?= isset($mediaFiliacion->idLunares) ? $mediaFiliacion->idLunares : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="lunares_descripcion" class=" control-label">Descripción:</label>
                                          </div>
                                          <?= isset($mediaFiliacion->descrip_lunares) ? $mediaFiliacion->descrip_lunares : ''  ?>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="fisico" class="control-label">Defectos Fisicos: </label>
                        <div>
                        <?= isset($mediaFiliacion->idDefectos) ? $mediaFiliacion->idDefectos : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="fisico_descripcion" class=" control-label">Descripción:</label>
                                          </div>
                                          <?= isset($mediaFiliacion->descrip_defectos) ? $mediaFiliacion->descrip_defectos : ''  ?>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="protesis" class="control-label">Protesis: </label>
                        <div>
                        <?= isset($mediaFiliacion->idProtesis) ? $mediaFiliacion->idProtesis : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="protesis_descripcion" class=" control-label">Descripción:</label>
                                          </div>
                                          <?= isset($mediaFiliacion->descrip_protesis) ? $mediaFiliacion->descrip_protesis : ''  ?>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="discapacidad" class="control-label">Discapacidad Física: </label>
                        <div>
                        <?= isset($mediaFiliacion->idDiscapacidad) ? $mediaFiliacion->idDiscapacidad : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="discapacidad_descripcion" class=" control-label">Descripción:</label>
                        </div>
                                          <?= isset($mediaFiliacion->descrip_discapacidad) ? $mediaFiliacion->descrip_discapacidad : ''  ?>
                </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>