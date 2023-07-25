<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Detalle ubicacion</h3>
    
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
                    <div class='col-12 col-sm-3'>
                        <div class="form-group">
                            <label for="oficio" class="control-label">No. Oficio: </label>
                            <div >
                            <?=$ubicacion->No_oficio ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-3'>    
                        <div class="form-group">
                            <label for="tipo ubicacion" class="control-label">Tipo Ubicacion: </label>
                            <div >
                            <?= $ubicacion->tipo_ubicacion ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-3'>    
                        <div class="form-group">
                            <label for="calle" class="control-label">Calle: </label>
                            <div >
                            <?= $ubicacion->calle ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-3'>    
                        <div class="form-group">
                            <label for="no Exterior" class="control-label">no Exterior: </label>
                            <div >
                            <?= $ubicacion->no_exterior ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-3'>    
                        <div class="form-group">
                            <label for="no Interior" class="control-label">no Interior: </label>
                            <div >
                            <?= $ubicacion->no_interior ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-3'>    
                        <div class="form-group">
                            <label for="colonia" class="control-label">colonia: </label>
                            <div >
                            <?= $ubicacion->colonia ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-3'>    
                        <div class="form-group">
                            <label for="municipio" class="control-label">municipio: </label>
                            <div >
                            <?= $ubicacion->municipio ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-3'>    
                        <div class="form-group">
                            <label for="codigo postal" class="control-label">codigo postal: </label>
                            <div >
                            <?= $ubicacion->codigo_postal ?>
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