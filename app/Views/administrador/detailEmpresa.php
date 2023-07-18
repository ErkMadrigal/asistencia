<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
    <div id="load" class=" spinner text-secondary" role="status">
    </div>
    <div class=" mb-2">    
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9 ">
        </div>
            <div class="col-12 col-sm-6 col-md-3">
                <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/AddEmpresa " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i> Agregar Empresa</a>
            </div>   
    </div>
</div>
<div class="card card-primary">
    <div class="card-header" id="tabMain">
        <h3 class="card-title">Empresas</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <table id="dataGrid" class="table  text-center table-hover table-head-fixed text-nowrap">
            <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Telefonos</th>
                <th>Activa</th>
                <th>Editar</th>
            </tr>
            </thead>
        </table>
    </div>
    
</div>


<script>
function estatusRenderer(data, type, full, meta) {
    var src;
    
    if (full.activo == 1) {
        src = "<i class=\'fa fa-check-circle\'></i>";
    } else  {
        src = "<i class=\'fa fa-times-circle\'></i>";
    } 

   
    return src;
}
    var table = $('#dataGrid').DataTable({
            data: <?= json_encode($empresa) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [  { data: "nombre"
                        },
                        { data: "nombre"
                        },
                        { data: "telefonos"
                        },
                        { data: "activo",
                            render: estatusRenderer
                        },
                        {  data: "edit",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/editEmpresa?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
                    
                    }
                }
            ]
        });


     

</script>
<?= $this->endSection() ?>
                
            