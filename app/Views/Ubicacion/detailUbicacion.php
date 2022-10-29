<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Detalle Ubicacion</h3>
    
        <div class="card-tools">
         <button type="button" class="btn btn-tool" data-card-widget="collapse">
             <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
            <form class="form-horizontal" >
                <div class="row">
                    <div class='col-12 col-sm-6'>
                        <div class="form-group">
                            <label for="cliente" class="control-label">Cliente: </label>
                            <div >
                            <?=$ubicacion->idCliente ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>    
                        <div class="form-group">
                            <label for="ubicacion" class="control-label">Ubicacion: </label>
                            <div >
                            <?= $ubicacion->nombre_ubicacion ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>    
                        <div class="form-group">
                            <label for="Activo" class="control-label">Activo: </label>
                            <div class="form-check" >
                            <input class=""  onclick="return false;" type="checkbox" <?=($ubicacion->activo == 1 ? "checked" : "" ) ?>>                            </div>
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
                <?=$ubicacion->createdby ?>
                </div>
            </div>
        </div>
        
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-calendar " aria-hidden="true"></i>
                <label for="createddate" class="control-label">Fecha creación: </label>
                <div>
                <?=$ubicacion->createddate ?>
                </div>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-user " aria-hidden="true"></i>
                <label for="actualizado" class="control-label">Actualizado por: </label>
                <div>
                <?=$ubicacion->updatedby ?>
                </div>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-calendar " aria-hidden="true"></i>
                <label for="updateddate" class="control-label">Fecha actualización: </label>
                <div>
                <?=$ubicacion->updateddate ?>
                </div>
            </div>
        </div>
    </div>
</div>
   
</div>
<?= $this->endSection() ?>