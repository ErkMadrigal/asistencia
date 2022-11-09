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
                        <label for="Nombre" class="control-label">Complexión: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="complexion" name="complexion">
                                <option value="">Seleccionar Complexión</option>
                                <?php
                                if (!empty($complexion)) :
                                    foreach ($complexion as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idComplexion) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#complexion").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="piel" class="control-label">Piel: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="piel" name="piel">
                                <option value="">Seleccionar Complexión</option>
                                <?php
                                if (!empty($piel)) :
                                    foreach ($piel as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idPiel) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#piel").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="cara" class="control-label">Cara: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="cara" name="cara">
                                <option value="">Selecciona un tipo de Cara</option>
                                <?php
                                if (!empty($cara)) :
                                    foreach ($cara as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idCara) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>

                            <script>
                                $(document).ready(function() {
                                    $("#cara").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="anteojos" class="control-label">Uso de Anteojos: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="anteojos" name="anteojos">
                                <option value="">Selecciona si Usa Anteojos</option>
                                <?php
                                if (!empty($SiNo)) :
                                    foreach ($SiNo as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idUsaAnteojos) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#anteojos").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="estatura" class="control-label">Estatura: <span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="estatura" name="estatura" value=" <?= isset($mediaFiliacion->estatura) ? $mediaFiliacion->estatura : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="peso" class="control-label">Peso: <span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="peso" name="peso" value=" <?= isset($mediaFiliacion->peso) ? $mediaFiliacion->peso : ''  ?>">

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
                        <label for="cabello_cantidad" class="control-label">Cantidad: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="cabello_cantidad" name="cabello_cantidad">
                                <option value="">Selecciona una cantidad de Cabello</option>
                                <?php
                                if (!empty($cabello_cantidad)) :
                                    foreach ($cabello_cantidad as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idCantidadCabello) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>

                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#cabello_cantidad").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="color_cabello" class="control-label">Color: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="color_cabello" name="color_cabello">
                                <option value="">Selecciona un color de Cabello</option>
                                <?php
                                if (!empty($color_cabello)) :
                                    foreach ($color_cabello as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idColorCabello) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#color_cabello").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_cabello" class="control-label">Forma: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="forma_cabello" name="forma_cabello">
                                <option value="">Seleccionar forma de Cabello</option>
                                <?php
                                if (!empty($forma_cabello)) :
                                    foreach ($forma_cabello as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idFormaCabello) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#forma_cabello").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="calvicie_cabello" class="control-label">Calvicie: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="calvicie_cabello" name="calvicie_cabello">
                                <option value="">Seleccionar un tipo de Calvicie</option>
                                <?php
                                if (!empty($calvicie_cabello)) :
                                    foreach ($calvicie_cabello as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idCalvicie) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#calvicie_cabello").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="implatacion_cabello" class="control-label">Implantación: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="implatacion_cabello" name="implatacion_cabello">
                                <option value="">Seleccionar un tipo de Implantación</option>
                                <?php
                                if (!empty($implatacion_cabello)) :
                                    foreach ($implatacion_cabello as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idImplantacionCabello) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#implatacion_cabello").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
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
                        <label for="altura" class="control-label">Altura: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="altura" name="altura">
                                <option value="">Selecciona una Altura</option>
                                <?php
                                if (!empty($altura)) :
                                    foreach ($altura as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idAlturaFrente) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#altura").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="inclinacion" class="control-label">Inclinación: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="inclinacion" name="inclinacion">
                                <option value="">Selecciona una Inclinación</option>
                                <?php
                                if (!empty($inclinacion)) :
                                    foreach ($inclinacion as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idInclinacionFrente) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#inclinacion").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="ancho" class="control-label">Ancho: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="ancho" name="ancho">
                                <option value="">Selecciona una Anchura</option>
                                <?php
                                if (!empty($ancho)) :
                                    foreach ($ancho as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idAnchoFrente) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ancho").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
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
                        <label for="direccion_cejas" class="control-label">Dirección: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="direccion_cejas" name="direccion_cejas">
                                <option value="">Selecciona una Dirección</option>
                                <?php
                                if (!empty($direccion_cejas)) :
                                    foreach ($direccion_cejas as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idDireccionCejas) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#direccion_cejas").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="implantacion_cejas" class="control-label">Implantacion: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="implantacion_cejas" name="implantacion_cejas">
                                <option value="">Selecciona una Implantación</option>
                                <?php
                                if (!empty($implantacion_cejas)) :
                                    foreach ($implantacion_cejas as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idImplantacionCejas) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#implantacion_cejas").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma" class="control-label">Forma: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="forma" name="forma">
                                <option value="">Selecciona una Forma</option>
                                <?php
                                if (!empty($forma)) :
                                    foreach ($forma as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idFormaCejas) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#forma").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tamanno" class="control-label">Tamaño: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tamanno" name="tamanno">
                                <option value="">Selecciona un Tamaño</option>
                                <?php
                                if (!empty($tamanno)) :
                                    foreach ($tamanno as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idTamanoCejas) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tamanno").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
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
                        <label for="color" class="control-label">Color: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="color" name="color">
                                <option value="">Selecciona un Color</option>
                                <?php
                                if (!empty($color)) :
                                    foreach ($color as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idColorOjos) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#color").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_ojos" class="control-label">Forma: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="forma_ojos" name="forma_ojos">
                                <option value="">Selecciona una Forma</option>
                                <?php
                                if (!empty($forma_ojos)) :
                                    foreach ($forma_ojos as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idFormaOjos) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#forma_ojos").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tamanno_ojos" class="control-label">Tamaño: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tamanno_ojos" name="tamanno_ojos">
                                <option value="">Selecciona un Tamaño</option>
                                <?php
                                if (!empty($tamanno_ojos)) :
                                    foreach ($tamanno_ojos as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idTamanoOjos) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tamanno_ojos").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
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
                        <label for="raiz" class="control-label">Raíz: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="raiz" name="raiz">
                                <option value="">Selecciona una Raiz</option>
                                <?php
                                if (!empty($raiz)) :
                                    foreach ($raiz as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idRaiz) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#raiz").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="dorso" class="control-label">Dorso: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="dorso" name="dorso">
                                <option value="">Selecciona un Dorso</option>
                                <?php
                                if (!empty($dorso)) :
                                    foreach ($dorso as  $a) {

                                ?>
                                        <option <?= (isset($mediaFiliacion->idDorso) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#dorso").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="ancho_nariz" class="control-label">Ancho: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="ancho_nariz" name="ancho_nariz">
                                <option value="">Selecciona una Anchura</option>
                                <?php
                                if (!empty($ancho_nariz)) :
                                    foreach ($ancho_nariz as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idAnchoNariz) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ancho_nariz").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="base_nariz" class="control-label">Base: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="base_nariz" name="base_nariz">
                                <option value="">Selecciona una Base</option>
                                <?php
                                if (!empty($base_nariz)) :
                                    foreach ($base_nariz as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idBaseNariz) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#base_nariz").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="altura_nariz" class="control-label">Altura: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="altura_nariz" name="altura_nariz">
                                <option value="">Selecciona una Altura</option>
                                <?php
                                if (!empty($altura_nariz)) :
                                    foreach ($altura_nariz as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idAlturaNariz) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#altura_nariz").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
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
                        <label for="tamanno_boca" class="control-label">Tamaño: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tamanno_boca" name="tamanno_boca">
                                <option value="">Selecciona un Tamaño</option>
                                <?php
                                if (!empty($tamanno_boca)) :
                                    foreach ($tamanno_boca as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idTamanoBoca) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tamanno_boca").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="comisura_boca" class="control-label">Comisuras: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="comisura_boca" name="comisura_boca">
                                <option value="">Selecciona una Comisura</option>
                                <?php
                                if (!empty($comisura_boca)) :
                                    foreach ($comisura_boca as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idComisuras) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#comisura_boca").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
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
                        <label for="espesor_labios" class="control-label">Espesor: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="espesor_labios" name="espesor_labios">
                                <option value="">Selecciona un Espesor</option>
                                <?php
                                if (!empty($espesor_labios)) :
                                    foreach ($espesor_labios as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idEspesorLabio) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#espesor_labios").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="altura_labial" class="control-label">Altura Naso-Labial: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="altura_labial" name="altura_labial">
                                <option value="">Selecciona una Altura Naso-Labial</option>
                                <?php
                                if (!empty($altura_labial)) :
                                    foreach ($altura_labial as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idAlturaNasolabial) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#altura_labial").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="prominencia" class="control-label">Prominencia: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="prominencia" name="prominencia">
                                <option value="">Selecciona una Prominencia</option>
                                <?php
                                if (!empty($prominencia)) :
                                    foreach ($prominencia as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idProminenciaLabio) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#prominencia").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
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
                        <label for="tipo_menton" class="control-label">Tipo: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tipo_menton" name="tipo_menton">
                                <option value="">Selecciona un Tipo</option>
                                <?php
                                if (!empty($tipo_menton)) :
                                    foreach ($tipo_menton as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idMentonTipo) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipo_menton").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_menton" class="control-label">Forma: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="forma_menton" name="forma_menton">
                                <option value="">Selecciona una Forma</option>
                                <?php
                                if (!empty($forma_menton)) :
                                    foreach ($forma_menton as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idMentonForma) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#forma_menton").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="inclinacion_menton" class="control-label">Inclinación: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="inclinacion_menton" name="inclinacion_menton">
                                <option value="">Selecciona una Inclinación</option>
                                <?php
                                if (!empty($inclinacion_menton)) :
                                    foreach ($inclinacion_menton as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idMentonInclinacion) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#inclinacion_menton").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
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
                        <label for="forma_ODerecha" class="control-label">Forma: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="forma_ODerecha" name="forma_ODerecha">
                                <option value="">Selecciona una Forma</option>
                                <?php
                                if (!empty($forma_ODerecha)) :
                                    foreach ($forma_ODerecha as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idFormaOreja) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#forma_ODerecha").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
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
                                <label for="original" class="control-label">Original: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="original" name="original">
                                        <option value="">Selecciona una Opcion</option>
                                        <?php
                                        if (!empty($original)) :
                                            foreach ($original as  $a) {
                                        ?>
                                                <option <?= (isset($mediaFiliacion->idOriginal) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                        <?php
                                            }
                                        endif; ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#original").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="superior" class="control-label">Superior: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="superior" name="superior">
                                        <option value="">Selecciona una Opcion</option>
                                        <?php
                                        if (!empty($superior)) :
                                            foreach ($superior as  $a) {
                                        ?>
                                                <option <?= (isset($mediaFiliacion->idSuperior) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                        <?php
                                            }
                                        endif; ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#superior").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="posterior" class="control-label">Posterior: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="posterior" name="posterior">
                                        <option value="">Selecciona una Opcion</option>
                                        <?php
                                        if (!empty($posterior)) :
                                            foreach ($posterior as  $a) {
                                        ?>
                                                <option <?= (isset($mediaFiliacion->idPosterior) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                        <?php
                                            }
                                        endif; ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#posterior").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="adherencia" class="control-label">Adherencia: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="adherencia" name="adherencia">
                                        <option value="">Selecciona una Opcion</option>
                                        <?php
                                        if (!empty($adherencia)) :
                                            foreach ($adherencia as  $a) {
                                        ?>
                                                <option <?= (isset($mediaFiliacion->idAdherenciaHelix) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                        <?php
                                            }
                                        endif; ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#adherencia").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
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
                                <label for="contorno" class="control-label">Contorno: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="contorno" name="contorno">
                                        <option value="">Selecciona una Opcion</option>
                                        <?php
                                        if (!empty($contorno)) :
                                            foreach ($contorno as  $a) {
                                        ?>
                                                <option <?= (isset($mediaFiliacion->idContornoLobulo) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                        <?php
                                            }
                                        endif; ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#contorno").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="adherencia_lobulo" class="control-label">Adherencia: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="adherencia_lobulo" name="adherencia_lobulo">
                                        <option value="">Selecciona una Opcion</option>
                                        <?php
                                        if (!empty($adherencia_lobulo)) :
                                            foreach ($adherencia_lobulo as  $a) {
                                        ?>
                                                <option <?= (isset($mediaFiliacion->idAdherenciaLobulo) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                        <?php
                                            }
                                        endif; ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#adherencia_lobulo").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="particularidad" class="control-label">Particularidad: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="particularidad" name="particularidad">
                                        <option value="">Selecciona una Opcion</option>
                                        <?php
                                        if (!empty($particularidad)) :
                                            foreach ($particularidad as  $a) {
                                        ?>
                                                <option <?= (isset($mediaFiliacion->idParticularidad) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                        <?php
                                            }
                                        endif; ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#particularidad").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="dimension" class="control-label">Dimensión: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="dimension" name="dimension">
                                        <option value="">Selecciona una Opcion</option>
                                        <?php
                                        if (!empty($dimension)) :
                                            foreach ($dimension as  $a) {
                                        ?>
                                                <option <?= (isset($mediaFiliacion->idDimensionLobulo) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                        <?php
                                            }
                                        endif; ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#dimension").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
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
                        <label for="tipo_sangre" class="control-label">Tipo: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tipo_sangre" name="tipo_sangre">
                                <option value="">Selecciona un Tipo</option>
                                <?php
                                if (!empty($tipo_sangre)) :
                                    foreach ($tipo_sangre as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idSangreTipo) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipo_sangre").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="RH_sangre" class="control-label">RH: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="RH_sangre" name="RH_sangre">
                                <option value="">Selecciona un RH</option>
                                <?php
                                if (!empty($RH_sangre)) :
                                    foreach ($RH_sangre as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idRH) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#RH_sangre").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
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
                        <label for="cicatrices" class="control-label">Cicatrices: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="cicatrices" name="cicatrices">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($SiNo)) :
                                    foreach ($SiNo as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idCicatrices) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#cicatrices").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cicatrices_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="cicatrices_descripcion" name="cicatrices_descripcion" value=" <?= isset($mediaFiliacion->descrip_cicatrices) ? $mediaFiliacion->descrip_cicatrices : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tatuajes" class="control-label">Tatuajes: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tatuajes" name="tatuajes">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($SiNo)) :
                                    foreach ($SiNo as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idTatuajes) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tatuajes").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tatuajes_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="tatuajes_descripcion" name="tatuajes_descripcion" value=" <?= isset($mediaFiliacion->descrip_tatuajes) ? $mediaFiliacion->descrip_tatuajes : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="lunares" class="control-label">Lunares: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="lunares" name="lunares">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($SiNo)) :
                                    foreach ($SiNo as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idLunares) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#lunares").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="lunares_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="tatuajes_descripcion" name="tatuajes_descripcion" value=" <?= isset($mediaFiliacion->descrip_lunares) ? $mediaFiliacion->descrip_lunares : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="fisico" class="control-label">Defectos Fisicos: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="fisico" name="fisico">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($SiNo)) :
                                    foreach ($SiNo as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idDefectos) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#fisico").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="fisico_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="fisico_descripcion" name="fisico_descripcion" value=" <?= isset($mediaFiliacion->descrip_defectos) ? $mediaFiliacion->descrip_defectos : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="protesis" class="control-label">Protesis: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="protesis" name="protesis">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($SiNo)) :
                                    foreach ($SiNo as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idProtesis) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> 

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#protesis").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="protesis_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="protesis_descripcion" name="protesis_descripcion" value=" <?= isset($mediaFiliacion->descrip_protesis) ? $mediaFiliacion->descrip_protesis : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="discapacidad" class="control-label">Discapacidad Física: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="discapacidad" name="discapacidad">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($SiNo)) :
                                    foreach ($SiNo as  $a) {
                                ?>
                                        <option <?= (isset($mediaFiliacion->idDiscapacidad) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option> }

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#discapacidad").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="discapacidad_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="discapacidad_descripcion" name="discapacidad_descripcion" value=" <?= isset($mediaFiliacion->descrip_discapacidad) ? $mediaFiliacion->descrip_discapacidad : ''  ?>">

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>