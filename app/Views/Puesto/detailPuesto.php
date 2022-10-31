<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Detalle Puesto</h3>
    
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
                            <label for="parentesco" class="control-label">Cliente: </label>
                            <div >
                            <?=$Puesto->idCliente ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>    
                        <div class="form-group">
                            <label for="idReferencia" class="control-label">Ubicacion: </label>
                            <div >
                            <?= $Puesto->idUbicacion ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>    
                        <div class="form-group">
                            <label for="idReferencia" class="control-label">Turno: </label>
                            <div >
                            <?= $Puesto->idTurno ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>    
                        <div class="form-group">
                            <label for="idReferencia" class="control-label">Puesto: </label>
                            <div >
                            <?= $Puesto->puesto ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>    
                        <div class="form-group">
                            <label for="Activo" class="control-label">Activo: </label>
                            <div class="form-check" >
                            <input class=""  onclick="return false;" type="checkbox" <?=($Puesto->activo == 1 ? "checked" : "" ) ?>>                            </div>
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
                <?=$Puesto->createdby ?>
                </div>
            </div>
        </div>
        
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-calendar " aria-hidden="true"></i>
                <label for="createddate" class="control-label">Fecha creación: </label>
                <div>
                <?=$Puesto->createddate ?>
                </div>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-user " aria-hidden="true"></i>
                <label for="actualizado" class="control-label">Actualizado por: </label>
                <div>
                <?=$Puesto->updatedby ?>
                </div>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-calendar " aria-hidden="true"></i>
                <label for="updateddate" class="control-label">Fecha actualización: </label>
                <div>
                <?=$Puesto->updateddate ?>
                </div>
            </div>
        </div>
    </div>
</div>
   
</div>
<?= $this->endSection() ?>