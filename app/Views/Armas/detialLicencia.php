<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Detalle licencia</h3>
    
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
                            <?=$licencia->No_oficio ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-3'>    
                        <div class="form-group">
                            <label for="folio" class="control-label">Folio: </label>
                            <div >
                            <?= $licencia->folio ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-3'>    
                        <div class="form-group">
                            <label for="Modalidad " class="control-label">Modalidad : </label>
                            <div >
                            <?= $licencia->Modalidad  ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-3'>    
                        <div class="form-group">
                            <label for="responsable" class="control-label">Responsable: </label>
                            <div >
                            <?= $licencia->responsable ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>    
                        <div class="form-group">
                            <label for="fecha revalidacion" class="control-label">Fecha Revalidacion: </label>
                            <div >
                            <?= $licencia->fecha_revalidacion ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-12 col-sm-6'>    
                        <div class="form-group">
                            <label for="Activo" class="control-label">Activo: </label>
                            <div class="form-check" >
                                <input class=""  onclick="return false;" type="checkbox" <?=($licencia->activo == 1 ? "checked" : "" ) ?>>                            
                            </div>
                        </div>
                    </div>
                </div>        
            </form>
        </div>
        <div class="card-footer  clearfix  ">
            <div class="row callout callout-warning">
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="armas Cortas" class="control-label">Total Armas Cortas Atorizadas: </label>
                        <div >
                        <?= $licencia->armas_Cortas ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="armas largas" class="control-label">Total Armas Largas Atorizadas: </label>
                        <div >
                        <?= $licencia->armas_Largas ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="total armas" class="control-label">Total Armas Atorizadas: </label>
                        <div >
                        <?= $licencia->total_Armas ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="total personas" class="control-label">Total de Personas Atorizadas: </label>
                        <div >
                        <?= $licencia->total_Personas ?>
                        </div>
                    </div>
                </div>
            
                
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="total armas" class="control-label">Total Armas Cortas Asignadas: </label>
                        <div >
                        <?= $licencia->armas_cortas_asg ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="armas largas" class="control-label">Total Armas Largas Asignadas: </label>
                        <div >
                        <?= $licencia->armas_largas_asg ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="armas largas" class="control-label">Total Armas Asignadas: </label>
                        <div >
                        <?= $licencia->armas_largas_asg + $licencia->armas_cortas_asg ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="total personas" class="control-label">Total de Personas Asignadas: </label>
                        <div >
                        <?= $licencia->personas_asignadas ?>
                        </div>
                    </div>
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
                        <?=$licencia->createdby ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <i class="fa fa-calendar " aria-hidden="true"></i>
                        <label for="createddate" class="control-label">Fecha creación: </label>
                        <div>
                        <?=$licencia->createddate ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <i class="fa fa-user " aria-hidden="true"></i>
                        <label for="actualizado" class="control-label">Actualizado por: </label>
                        <div>
                        <?=$licencia->updatedby ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <i class="fa fa-calendar " aria-hidden="true"></i>
                        <label for="updateddate" class="control-label">Fecha actualización: </label>
                        <div>
                        <?=$licencia->updateddate ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
</div>
<?= $this->endSection() ?>