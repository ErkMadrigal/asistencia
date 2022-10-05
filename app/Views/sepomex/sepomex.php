<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
    <div id="load" class=" spinner text-secondary" role="status"></div>
    <div class=" mb-2">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 ">
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/AddSepomex " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Agregar Sepomex</a>
            </div>
        </div>    
    </div>    
    <div class="card card-primary ">
        <div class="card-header" id="tabMain">
            <h3 class="card-title">Sepomex</h3>
        
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
                    <th>Codigo Postal</th>
                    <th>Asentamiento</th>
                    <th>Municipio</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    <th>activo</th>
                    <th>Editar</th>
                    <th>Detalle</th>
                </tr>
                </thead>
            </table>
        </div>
        
    </div>


<script>
    const  estatusRenderer = (data, type, full, meta) => {
        var src;
        
        if (full.activo == 1) {
            src = "<i class=\'fa fa-check-circle\'></i>";
        } else  {
            src = "<i class=\'fa fa-times-circle\'></i>";
        } 

        return src;
    }
    var table = $('#dataGrid').DataTable({
        data: <?= json_encode($sepomex) ?> ,
        deferRender: true,
        pageLength: 5,
        columns: [{ data: "codigoPostal"},
                    { data: "asentamiento"},
                    { data: "municipio"},
                    { data: "ciudad"},
                    { data: "estado"},
                    { data: "activo", render: estatusRenderer }, 
                    {  data: "edit",
                        render: (data, type, full, meta) => {
                
                            return "<a href='" + base_url + "/editSepomex?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
                
                        }
                    }, 
                    { data: "detail",
                        render: (data, type, full, meta) => {
                
                            return "<a href='" + base_url + "/detailSepomex?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                
                        }
                    }
                ]
    });

</script>    

<?= $this->endSection() ?>