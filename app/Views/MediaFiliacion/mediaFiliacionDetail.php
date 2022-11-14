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
                            <?= isset($variable->idComplexion) ? $variable->idComplexion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="piel" class="control-label">Piel: </label>
                        <div>
                        <?= isset($variable->idPiel) ? $variable->idPiel : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="cara" class="control-label">Cara: </label>
                        <div>
                        <?= isset($variable->idCara) ? $variable->idCara : ''  ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="anteojos" class="control-label">Uso de Anteojos: </label>
                        <div>
                        <?= isset($variable->idUsaAnteojos) ? $variable->idUsaAnteojos : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="estatura" class="control-label">Estatura: </label>
                        <div>
                        <?= isset($variable->estatura) ? $variable->estatura : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="peso" class="control-label">Peso: </label>
                        <div>
                        <?= isset($variable->peso) ? $variable->peso : ''  ?>
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
                        <?= isset($variable->idCantidadCabello) ? $variable->idCantidadCabello : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="color_cabello" class="control-label">Color: </label>
                        <div>
                        <?= isset($variable->idColorCabello) ? $variable->idColorCabello : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_cabello" class="control-label">Forma: </label>
                        <div>
                        <?= isset($variable->idFormaCabello) ? $variable->idFormaCabello : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="calvicie_cabello" class="control-label">Calvicie: </label>
                        <div>
                        <?= isset($variable->idCalvicie) ? $variable->idCalvicie : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="implatacion_cabello" class="control-label">Implantación: </label>
                        <div>
                        <?= isset($variable->idImplantacionCabello) ? $variable->idImplantacionCabello : ''  ?>
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
                        <?= isset($variable->idAlturaFrente) ? $variable->idAlturaFrente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="inclinacion" class="control-label">Inclinación: </label>
                        <div>
                        <?= isset($variable->idInclinacionFrente) ? $variable->idInclinacionFrente : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="ancho" class="control-label">Ancho: </label>
                        <div>
                        <?= isset($variable->idAnchoFrente) ? $variable->idAnchoFrente : ''  ?> 
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
                        <?= isset($variable->idDireccionCejas) ? $variable->idDireccionCejas : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="implantacion_cejas" class="control-label">Implantacion: </label>
                        <div>
                        <?= isset($variable->idImplantacionCejas) ? $variable->idImplantacionCejas : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma" class="control-label">Forma: </label>
                        <div>
                        <?= isset($variable->idFormaCejas) ? $variable->idFormaCejas : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tamanno" class="control-label">Tamaño: </label>
                        <div>
                        <?= isset($variable->idTamanoCejas) ? $variable->idTamanoCejas : ''  ?>
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
                        <?= isset($variable->idColorOjos) ? $variable->idColorOjos : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_ojos" class="control-label">Forma: </label>
                        <div>
                        <?= isset($variable->idFormaOjos) ? $variable->idFormaOjos : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tamanno_ojos" class="control-label">Tamaño: </label>
                        <div>
                        <?= isset($variable->idTamanoOjos) ? $variable->idTamanoOjos : ''  ?>
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
                        <?= isset($variable->idRaiz) ? $variable->idRaiz : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="dorso" class="control-label">Dorso: </label>
                        <div>
                        <?= isset($variable->idDorso) ? $variable->idDorso : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="ancho_nariz" class="control-label">Ancho: </label>
                        <div>
                        <?= isset($variable->idAnchoNariz) ? $variable->idAnchoNariz : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="base_nariz" class="control-label">Base: </label>
                        <div>
                        <?= isset($variable->idBaseNariz) ? $variable->idBaseNariz : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="altura_nariz" class="control-label">Altura: </label>
                        <div>
                        <?= isset($variable->idAlturaNariz) ? $variable->idAlturaNariz : ''  ?>
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
                        <?= isset($variable->idTamanoBoca) ? $variable->idTamanoBoca : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="comisura_boca" class="control-label">Comisuras: </label>
                        <div>
                        <?= isset($variable->idComisuras) ? $variable->priidComisurasmer_nombre : ''  ?>
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
                        <?= isset($variable->idEspesorLabio) ? $variable->idEspesorLabio : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="altura_labial" class="control-label">Altura Naso-Labial: </label>
                        <div>
                        <?= isset($variable->idAlturaNasolabial) ? $variable->idAlturaNasolabial : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="prominencia" class="control-label">Prominencia: </label>
                        <div>
                        <?= isset($variable->idProminenciaLabio) ? $variable->idProminenciaLabio : ''  ?>
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
                        <?= isset($variable->idMentonTipo) ? $variable->idMentonTipo : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_menton" class="control-label">Forma: </label>
                        <div>
                        <?= isset($variable->idMentonForma) ? $variable->idMentonForma : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="inclinacion_menton" class="control-label">Inclinación: </label>
                        <div>
                        <?= isset($variable->idMentonInclinacion) ? $variable->idMentonInclinacion : ''  ?>
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
                        <?= isset($variable->idFormaOreja) ? $variable->idFormaOreja : ''  ?>
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
                                <?= isset($variable->idOriginal) ? $variable->idOriginal : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="superior" class="control-label">Superior: </label>
                                <div>
                                <?= isset($variable->idSuperior) ? $variable->idSuperior : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="posterior" class="control-label">Posterior: </label>
                                <div>
                                <?= isset($variable->idPosterior) ? $variable->idPosterior : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="adherencia" class="control-label">Adherencia: </label>
                                <div>
                                <?= isset($variable->idAdherenciaHelix) ? $variable->idAdherenciaHelix : ''  ?>
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
                                <?= isset($variable->idContornoLobulo) ? $variable->idContornoLobulo : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="adherencia_lobulo" class="control-label">Adherencia: </label>
                                <div>
                                <?= isset($variable->idAdherenciaLobulo) ? $variable->idAdherenciaLobulo : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="particularidad" class="control-label">Particularidad: </label>
                                <div>
                                <?= isset($variable->idParticularidad) ? $variable->idParticularidad : ''  ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="dimension" class="control-label">Dimensión: </label>
                                <div>
                                <?= isset($variable->idDimensionLobulo) ? $variable->idDimensionLobulo : ''  ?>
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
                        <?= isset($variable->idSangreTipo) ? $variable->idSangreTipo : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="RH_sangre" class="control-label">RH: </label>
                        <div>
                        <?= isset($variable->idRH) ? $variable->idRH : ''  ?>
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
                        <?= isset($variable->idCicatrices) ? $variable->idCicatrices : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cicatrices_descripcion" class=" control-label">Descripción:</label>
                                          </div>
                                          <?= isset($variable->descrip_cicatrices) ? $variable->descrip_cicatrices : ''  ?>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tatuajes" class="control-label">Tatuajes: </label>
                        <div>
                        <?= isset($variable->idTatuajes) ? $variable->idTatuajes : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tatuajes_descripcion" class=" control-label">Descripción:</label>
                                          </div>
                                          <?= isset($variable->descrip_tatuajes) ? $variable->descrip_tatuajes : ''  ?>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="lunares" class="control-label">Lunares: </label>
                        <div>
                        <?= isset($variable->idLunares) ? $variable->idLunares : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="lunares_descripcion" class=" control-label">Descripción:</label>
                                          </div>
                                          <?= isset($variable->descrip_lunares) ? $variable->descrip_lunares : ''  ?>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="fisico" class="control-label">Defectos Fisicos: </label>
                        <div>
                        <?= isset($variable->idDefectos) ? $variable->idDefectos : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="fisico_descripcion" class=" control-label">Descripción:</label>
                                          </div>
                                          <?= isset($variable->descrip_defectos) ? $variable->descrip_defectos : ''  ?>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="protesis" class="control-label">Protesis: </label>
                        <div>
                        <?= isset($variable->idProtesis) ? $variable->idProtesis : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="protesis_descripcion" class=" control-label">Descripción:</label>
                                          </div>
                                          <?= isset($variable->descrip_protesis) ? $variable->descrip_protesis : ''  ?>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="discapacidad" class="control-label">Discapacidad Física: </label>
                        <div>
                        <?= isset($variable->idDiscapacidad) ? $variable->idDiscapacidad : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="discapacidad_descripcion" class=" control-label">Descripción:</label>
                        </div>
                                          <?= isset($variable->descrip_discapacidad) ? $variable->descrip_discapacidad : ''  ?>
                </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>