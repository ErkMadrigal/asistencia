<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>

<?php

use CodeIgniter\HTTP\RequestInterface;
use App\Models\AdministradorModel;
use App\Libraries\Encrypt;

 $encrypt = new Encrypt();

?>
<div id="load" class=" spinner text-secondary" role="status">
    </div>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Generales</h3>
    
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="Nombre" class="control-label">Complexión: <span class="text-danger">*</span></label>
                        <div >
                            <select class="form-control" id="complexion" name="complexion">
                                <option value="">Seleccionar Complexión</option>
                            </select>
                                <script>$(document).ready(function() {
                                        $("#complexion").select2({theme: "bootstrap4",width:"100%"});
                                });</script>
                        </div>
                    </div>
                </div>
            </div>
        </form>    
    </div>
</div>

<?= $this->endSection() ?>