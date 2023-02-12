<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Empresa</h3>
    
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
                      <h2 class="lead"><b><?=$empresa->nombre ?></b></h2>
                      <p class="text-muted text-sm"><b>teléfonos: </b> <?= $empresa->telefonos ?> </p>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?= base_url() ?>/assets/dist/img/logoPanel.jpg" alt="user-avatar" class=" img-fluid">
                    </div>
                </div>
               
    </div>
    <div class="card-footer bg-transparent clearfix">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3  ">
                <a class="btn btn-block btn-flat btn-primary" href="<?= base_url() ?>/editEmpresa\"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Editar</a>
            </div>
        </div>    
    </div>
</div>
<?= $this->endSection() ?>