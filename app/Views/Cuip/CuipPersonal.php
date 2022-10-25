<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
	<div id="load" class=" spinner text-secondary" role="status">
    </div>
<div class=" mb-2">    
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 ">
            
        </div>
        <div class="col-12 col-sm-6 col-md-3 ">
            <a href="<?php echo base_url('/exportCuip'); ?>" class="btn btn-block btn-flat btn-secondary"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Crear Plantilla CUIP</a>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/AddCUIP " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Nueva CUIP</a>
        </div>
    </div>    
</div>
<div class="card card-primary">
    <div class="card-header" id="tabMain">
        <h3 class="card-title">CUIP</h3>
    
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
                <th>No.CUIP</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>CUIP</th>
                <th>Expediente</th>
                <th>Media Filiación</th>
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
            data: <?= json_encode($CuipPersonal) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [  { data: "nCuip"
                        },
                        { data: "primer_nombre"
                        },
                        { data: "segundo_nombre"
                        },
                        { data: "apellido_paterno"
                        },
                        { data: "apellido_materno"
                        },
                        {  data: "CUIP",
                        render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/cuipInfo?id=" + full.id + "' class='nav-link'><i class='fa fa-address-card'></i>";
                    
                        }
                    }, {
                    data: "expediente electronico",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/expediente?id=" + full.id + "' class='nav-link'><i class='fa fa-file-text'></i>";
                        }
                    },{  data: "MediaFiliación",
                        render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/mediafiliacion?id=" + full.id + "' class='nav-link'><i class='fa fa-list'></i>";
                    
                        }
                    }

                
            ]
        });

</script>
<?= $this->endSection() ?>