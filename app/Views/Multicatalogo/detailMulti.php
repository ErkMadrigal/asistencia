<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Detalle Multicatalogo</h3>
    
        <div class="card-tools">
         <button type="button" class="btn btn-tool" data-card-widget="collapse">
             <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
                <div class="row">
                    <div class="col-7">
                    <p class="text-muted text-sm"><b>Tipo Combo: </b><?=$catalogo->tipo_combo ?></b></h2>
                      <p class="text-muted text-sm"><b>valor: </b> <?= $catalogo->valor ?> </p>
                      <p class="text-muted text-sm"><b>Activo: </b> 
                      <input class=""  onclick="return false;" type="checkbox" <?=($catalogo->activo == 1 ? "checked" : "" ) ?>>
                    </p>
                    </div>
                </div>
                
    </div>
    <div class="card-footer  clearfix  ">
    <div class="row callout callout-warning">
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-user " aria-hidden="true"></i>
                <label for="creado" class="control-label">Creado por: </label>
                <div>

                </div>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-calendar " aria-hidden="true"></i>
                <label for="createddate" class="control-label">Fecha creación: </label>
                <div>
                    
                </div>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-user " aria-hidden="true"></i>
                <label for="actualizado" class="control-label">Actualizado por: </label>
                <div>
                    
                </div>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-calendar " aria-hidden="true"></i>
                <label for="updateddate" class="control-label">Fecha actualización: </label>
                <div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
   
</div>
<?= $this->endSection() ?>