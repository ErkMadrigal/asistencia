<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
	<div id="load" class=" spinner text-secondary" role="status">
    </div>
    <div class=" mb-2">    
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9 ">
        </div>
            <div class="col-12 col-sm-6 col-md-3">
                <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/AddCliente " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i> Agregar Cliente</a>
            </div>   
    </div>
</div>
<div class="card card-primary">
    <div class="card-header" id="tabMain">
        <h3 class="card-title">CLIENTE / SERVICIO</h3>
    
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
                <th>Razón Social</th>
                <th>Nombre Corto</th>
                <th>Activo</th>
                <th>Ubicaciones</th>
                <th>Turnos</th>
                <th>Puestos</th>
                <th>Editar</th>
                <th>Consultar</th>
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
            data: <?= json_encode($cliente) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [{ data: "razon_social"
                      },
                      { data: "nombre_corto"
                      },
                     { data: "activo",
                        render: estatusRenderer
                      }, 
                      {  data: "ubicacion",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/ubicacioncatalogo?id=" + full.id + "' class='nav-link'><i class='fa fa-location-arrow' nav-icon></i>";
                    
                    }
                },
                {  data: "turno",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/turnocatalogo?id=" + full.id + "' class='nav-link'><i class='fa fa-clock-o nav-icon'></i>";
                    
                    }
                },
                {  data: "puesto",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/puestocatalogo?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                    
                    }
                },
                    
                      {  data: "edit",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/editCliente?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
                    
                    }
                }, {
                    data: "detail",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/detailCliente?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                    
                    }
                }
            ]
        });


     /*   var table = $('#dataGridUbica').DataTable({
            data: <?= json_encode($cliente) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [{ data: "nombre_ubicacion"
                      },
                      { data: "calle_num"
                      },
                      { data: "ciudad"
                      },
                      { data: "estado"
                      },
                      { data: "fecha_fin"
                      },
                      { data: "activo",
                        render: estatusRenderer
                      }, 
                      {  data: "edit",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/editCliente?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
                    
                    }
                }, {
                    data: "detail",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/detailCliente?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                    
                    }
                }
            ]
        });*/

</script>
<?= $this->endSection() ?>