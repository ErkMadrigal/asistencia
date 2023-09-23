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
                <th>Editar</th>
                <th>Detalle</th>
                <th>Juridico</th>
                <th>Clase</th>
                <th>Marca</th>
                <th>Matricula</th>
                <th>Folio-Manif</th>
                <th>Folio Manifiesto</th>
                <th>No. Oficio</th>
                <th>Folio</th>
                <th>Modalidad</th>
                <th>Direccion</th>
                <th>Asignado</th>
       		</tr>
            </thead>
        </table>
    </div>
    <div class="modal fade modal-visor" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalVisor">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<form class="form-horizontal" id="frmArmas">
    <?= csrf_field() ?>
</form>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    const data_Bajas = {}

    let array_bajas = <?= json_encode($dataBaja) ?>

    array_bajas.forEach(baja => {
        data_Bajas[baja.id] = baja.valor;
    });

	var table = $('#dataGrid').DataTable({
        data: <?= json_encode($arma) ?> ,
        deferRender: true,
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
        {
            extend: 'excel',  
            text: `<i class='fa fa-file-excel-o nav-icon'></i>&nbsp;&nbsp;&nbsp; Excel`, 
            className: 'btn  btn-flat btn-success' , 
            title: 'Armas'
        }],
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
            columns: [
                {  data: "edit",
                    render: function (data, type, full, meta) {

                    return "<a href='" + base_url + "/editArmas?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";

                    }
                }, {
                data: "detail",
                    render: function (data, type, full, meta) {

                        return "<a href='" + base_url + "/detailArmas?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";

                    }
                },
                {  data: "juridico",
                    render: (data, type, full, meta) => {
                        return `<button onclick='eliminarJuridico("${full.id}")' class='nav-link btn btn-link'><i class='fa fa-trash nav-icon'></i></button>`;

                    }
                },
                { data: "clase"
                },
                { data: "idMarca"
                },
                { data: "matricula"
                },
                { data: "folio_manif"},
                { data: "docuemento",
                    render: (data, type, full, meta) => {
                        return `<a data-toggle='modal' data-target='#modal' onclick='asignData("${full.id}")' class='nav-link btn btn-lin'><i class='fa fa-file-pdf-o text-danger'></i></a>`;
                    }
                },
                { data: "No_oficio"},
                { data: "folio"},
                { data: "Modalidad"},
                { data: "direccion"},
                { data: "activo",
                    render: estatusRenderer
                }, 
            ]
        });

        const eliminarJuridico = (idArma) => {
            Swal.fire({
                title: 'Seguro que lo deseas mandar a Juridico?',
                text: `¡Describe el motivo!`,
                input: 'select',
                inputOptions: data_Bajas,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, bórralo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#loadBtn').show();
                    var formData = new FormData($("form#frmArmas")[0]);
                    formData.append("id", idArma)
                    formData.append("motivo", result.value)
                    $.ajax({
                        url: base_url + '/deleteArmaJuridico',
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        cache: false,
                        async: true,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            $('.errorparticipante').remove();
                            
                            if (response.succes.succes == 'succes') {
                                Swal.fire(
                                    'Eliminado!',
                                    'Su registro ha sido eliminado.',
                                    'success'
                                )
                                var count = 3;
                                setInterval(function(){
                                    count--;
                                    if (count == 0) {
                                        window.location = base_url + '/armas'; 
                                    }
                                },1000);
        
                            } else if (response.dontsucces.error == 'error'){
                                toastr.error(response.dontsucces.mensaje);
                                        
                            } else if (Object.keys(response.error).length > 0 ){
        
                                for (var clave in response.error){
                                            
                                    $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#"+clave+"" );
                                        
                                }
                                    toastr.error('<?= lang('Layout.camposObligatorios') ?>');
        
                            }
        
                            
                            $('#loadBtn').hide();
                                    
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            toastr.error('<?=lang('Layout.toastrError') ?>');
                            $('#loadBtn').hide();           
                        }
                    });
                }
            })
    };

        const asignData = (id) => {
            
            document.querySelector("#modalVisor").innerHTML = `<iframe src="visorFolioManifiesto?h=${id}" width="100%" height="600"></iframe>`
        }

</script>
<?= $this->endSection() ?>