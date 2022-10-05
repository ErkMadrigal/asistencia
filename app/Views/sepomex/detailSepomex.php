<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Detalle Sepomex</h3>
    
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
                            <label for="empresa" class="control-label">Codigo Postal:</label>
                            <p class="ml-5"><?=$sepomex->codigoPostal?></p>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class="form-group">
                            <label for="empresa" class="control-label">Asentamiento:</label>
                            <p class="ml-5"><?=$sepomex->asentamiento?></p>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class="form-group">
                            <label for="empresa" class="control-label">Municipio:</label>
                            <p class="ml-5"><?=$sepomex->municipio?></p>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>    
                        <div class="form-group">
                            <label for="oficina" class="control-label">Ciudad: </label>
                            <p class="ml-5"><?=$sepomex->ciudad?></p>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class="form-group">
                            <label for="empresa" class="control-label">Estado:</label>
                            <p class="ml-5"><?=$sepomex->estado?></p>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>    
                        <div class="form-group">
                            <label for="Activo" class="control-label">Activo: <input class="ml-2"  onclick="return false;" type="checkbox" <?= $sepomex->activo == 1 ? 'checked':'';?>></label>
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
                <p class="ml-5"><?=$sepomex->createdby?></p>
            </div>
        </div>
        
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-calendar " aria-hidden="true"></i>
                <label for="createddate" class="control-label">Fecha creación: </label>
                <p class="ml-5"><?=$sepomex->createddate?></p>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-user " aria-hidden="true"></i>
                <label for="actualizado" class="control-label">Actualizado por: </label>
                <p class="ml-5"><?=$sepomex->updatedby?></p>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-calendar " aria-hidden="true"></i>
                <label for="updateddate" class="control-label">Fecha actualización: </label>
                <p class="ml-5"><?=$sepomex->updateddate?></p>
            </div>
        </div>
    </div>
</div>
   
</div>
<?= $this->endSection() ?>