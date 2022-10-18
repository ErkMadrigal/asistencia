<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
	<div id="load" class=" spinner text-secondary" role="status">
    </div>
<div class="card card-primary">
    <div class="card-header" id="tabMain">
        <h3 class="card-title">Expediente Digital</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">

    <?php
            if( !empty($documentos) ):
                foreach($documentos as  $a){ ?>
                    <div class='col-12 col-sm-12 col-md-12 mt-3'>
                        <div class="input-group">
                            <label for="empresaCsv" class="control-label"><?=$a->documento ?> (<?=$a->tipo ?>): <span class="text-danger">*</span></label>
                        </div>
                    </div>

                    <div class='col-12 col-sm-12 col-md-12'>
                        <div class="input-group">
                            
                            <div class="custom-file" lang="es">
                            <input type="file" class="custom-file-input" id="InputFile" name="InputFile" accept=".csv">
                            <label class="custom-file-label" for="InputFile">Seleccionar Archivo...</label>
                            </div>
                            <div class="input-group-append">
                                <button type="button"  class="cargaArchivo input-group-text">Cargar</button>
                            </div>
                        </div>
                    </div>
                <?php                         
                }
            endif;?>
            
        </div>
    </div>
    
</div>

<?= $this->endSection() ?>