<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Detalle Turno</h3>

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
                            <?= $turno->razon_social ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_corto" class=" control-label">Nombre Corto: </label>
                        <div>
                            <?= $turno->nombre_corto ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="ubicacion" class="control-label">Ubicacion: </label>
                        <div>
                            <?= $turno->nombre_ubicacion ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="idReferencia" class="control-label">turno: </label>
                        <div>
                            <?= $turno->turno ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="horario" class=" control-label">Horario: </label>
                        <div>
                            <?= $turno->horario ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo: </label>
                        <div class="form-check">
                            <input class="" onclick="return false;" type="checkbox" <?= ($turno->activo == 1 ? "checked" : "") ?>>
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
                        <?= $turno->createdby ?>
                    </div>
                </div>
            </div>

            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="fa fa-calendar " aria-hidden="true"></i>
                    <label for="createddate" class="control-label">Fecha creación: </label>
                    <div>
                        <?= $turno->createddate ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="fa fa-user " aria-hidden="true"></i>
                    <label for="actualizado" class="control-label">Actualizado por: </label>
                    <div>
                        <?= $turno->updatedby ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="fa fa-calendar " aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Fecha actualización: </label>
                    <div>
                        <?= $turno->updateddate ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>