<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
	<div id="load" class=" spinner text-secondary" role="status">
    </div>
<div class=" mb-2">    
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9 ">
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/AddUser " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Agregar usuario</a>
        </div>
    </div>    
</div>
<div class="card card-primary">
    <div class="card-header" id="tabMain">
        <h3 class="card-title">Usuarios</h3>
    
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
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Email</th>
                <th>Editar</th>
                <th>Detalle</th>
       		</tr>
            </thead>
        </table>
    </div>
</div>

<script>

	var table = $('#dataGrid').DataTable({
            data: <?= json_encode($result) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                    },
            columns: [{ data: "firstname"
                      },
                      { data: "lastname"
                      },
                      { data: "email"
                      }, 
                      {  data: "edit",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/editUser?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
                    
                    }
                }, {
                    data: "detail",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/detailUser?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                    
                    }
                }
            ]
        });

</script>
<?= $this->endSection() ?>