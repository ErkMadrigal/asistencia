<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<style>
    .fila-roja {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .fila-azul {
        color: #004085;
        background-color: #cce5ff;
        border-color: #b8daff;
    }
</style>
	<div id="load" class=" spinner text-secondary" role="status">
    </div>
<div class=" mb-2">    
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3 ">
        </div>
        <div class="col-12 col-sm-6 col-md-3 ">
            <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/licencias " class='nav-link'><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;&nbsp;Licencias</a>
        </div>
        <div class="col-12 col-sm-6 col-md-3 ">
            <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/ubicaciones" class='nav-link'><i class="fa fa-map-pin" aria-hidden="true"></i>&nbsp;&nbsp;Ubicaciones</a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/AddArmas " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Agregar Arma</a>
        </div>
    </div>    
</div>
<div class="card card-primary">
    <div class="card-header" id="tabMain">
        <h3 class="card-title">Armas</h3>
    
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
                <th>Clase</th>
                <th>Marca</th>
                <th>Matricula</th>
                <th>Folio-Manif</th>
                <th>Asignado</th>
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
            src = "<i class='fa fa-check-circle text-success'></i>";
        } else  {
            src = "<i class='fa fa-times-circle text-danger'></i>";
        } 

        return src;
    }

	var table = $('#dataGrid').DataTable({
            data: <?= json_encode($arma) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            "createdRow": function(row, data, dataIndex) {
                if (data.activo == 0) { // Supongamos que el primer elemento de cada fila contiene el color
                    $(row).addClass('fila-azul');
                } else if (data.activo == 3) {
                    $(row).addClass('fila-roja');
                }
            },
            columns: [{ data: "clase"
                      },
                      { data: "idMarca"
                      },
                      { data: "matricula"
                      },
                      { data: "folio_manif"
                      },
                      { data: "activo",
                        render: estatusRenderer
                      }, 
                      {  data: "edit",
                        render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/editArmas?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
                    
                        }
                    }, {
                    data: "detail",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/detailArmas?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                    
                    }
                }
            ]
        });

</script>
<?= $this->endSection() ?>