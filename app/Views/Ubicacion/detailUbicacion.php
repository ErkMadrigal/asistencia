<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Detalle Ubicacion</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal">
            <div class="row">
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="cliente" class="control-label">Cliente: </label>
                        <div>
                            <?= $ubicacion->idCliente ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_corto" class=" control-label">Nombre Corto: </label>
                        <div>
                        <?= $ubicacion->nombre_corto ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="ubicacion" class="control-label">Ubicacion: </label>
                        <div>
                            <?= $ubicacion->nombre_ubicacion ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle y Número:</label>
                        <div>
                        <?= $ubicacion->calle_num ?>   
                        </div>         
                            </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigo" class=" control-label">Código Postal :</label>
                        <div>
                        <?= $ubicacion->idCodigoPostal ?>     
                        </div>
                                   </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigo" class=" control-label">Colonia:</label>
                        <div>
                        <?= $ubicacion->colonia ?>
                        </div>
                            <script>
                                $(document).ready(function() {
                                    $("#coloniacodigo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigo" class="control-label">Municipio: </label>
                        <div>
                        <?= $ubicacion->municipio ?>
                            <script>
                                $(document).ready(function() {
                                    $("#municipiocodigo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="ciudadcodigo" class="control-label">Ciudad: </label>
                        <div>
                        <?= $ubicacion->ciudad ?>
                            <script>
                                $(document).ready(function() {
                                    $("#ciudadcodigo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigo" class="control-label">Estado: </label>
                        <div>
                        <?= $ubicacion->nombre_ubicacion ?>
                            <script>
                                $(document).ready(function() {
                                    $("#estadocodigo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo: </label>
                        <div class="form-check">
                            <input class="" onclick="return false;" type="checkbox" <?= ($ubicacion->activo == 1 ? "checked" : "") ?>>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer  clearfix  ">
        <div class="row callout callout-warning">
            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="fa fa-user " aria-hidden="true"></i>
                    <label for="creado" class="control-label">Creado por: </label>
                    <div>
                        <?= $ubicacion->createdby ?>
                    </div>
                </div>
            </div>

            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="fa fa-calendar " aria-hidden="true"></i>
                    <label for="createddate" class="control-label">Fecha creación: </label>
                    <div>
                        <?= $ubicacion->createddate ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="fa fa-user " aria-hidden="true"></i>
                    <label for="actualizado" class="control-label">Actualizado por: </label>
                    <div>
                        <?= $ubicacion->updatedby ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="fa fa-calendar " aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Fecha actualización: </label>
                    <div>
                        <?= $ubicacion->updateddate ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>