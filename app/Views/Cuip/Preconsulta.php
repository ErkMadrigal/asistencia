<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
	<div id="load" class=" spinner text-secondary" role="status">
    </div>
<div class=" mb-2">    
    <div class="row">
        <div class="col-12 col-sm-6 col-md-2 ">
            
        </div>
        <div class="col-12 col-sm-6 col-md-3 ">
            <a class="btn btn-block btn-flat btn-primary Bajas" href="#" class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Bajas</a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 ">
            <button type="button" class="btn btn-block btn-flat btn-secondary" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#fileModal"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Cargar Respuesta Pre-Consulta</button>

        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <a class="btn btn-block btn-flat btn-primary Preconsulta" href="#" class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Crear Plantilla Pre-Consulta</a>
            <?php csrf_field() ?>
        </div>
    </div>    
</div>
<div class="card card-primary">
    <div class="card-header" id="tabMain">
        <h3 class="card-title">Pre-Consulta</h3>
    
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
                <th>Fecha Consulta</th>
                <th>Respuesta Consulta</th>
       		</tr>
            </thead>
        </table>
    </div>
    
</div>
<!-- Modal -->
<div class="modal fade" id="fileModal"  aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content ">
            <div id="loadModal"  style="display:none!important;" class="overlay d-flex justify-content-center align-items-center">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cargar Respuesta Pre-Consulta</h5>
                
            </div>
            <div class="modal-body">
                <form id="frmRegistro" >
                
                    <div class="input-group">
                      <div class="custom-file" lang="es">
                        <input type="file" class="custom-file-input" id="InputFile" name="InputFile" >
                        <label class="custom-file-label" for="InputFile">Seleccionar archivo...</label>
                      </div><?= csrf_field() ?>
                      <div class="input-group-append">
                        <button type="button"  class="cargarRespuestas input-group-text">Cargar</button>
                      </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button"  class="btn btn-flat btn-secondary" data-dismiss="modal">Cerrar</button>
             </div>
        </div>     
    </div>
</div>

<script>
$(function () {
  bsCustomFileInput.init();
});

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
                        { data: "fecha_consulta"
                        },
                        { data: "respuesta"
                        }
                
            ]
        });

    $(document).on('click', '.cargarRespuestas', function (event) {        event.preventDefault();
        $("#loadModal").show();
        var formData = new FormData($("form#frmRegistro")[0]);
        
        $.ajax({
            url: base_url + '/cargarRespuestasConsulta',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                

                if (response.succes.succes == 'succes') {

                    toastr.success(response.succes.mensaje);

                    var count = 2;
                    setInterval(function(){
                      count--;
                      if (count == 0) {
                        window.location = base_url + '/preconsulta'; 
                      }
                    },800);
                    

                } else if (response.dontsucces.error == 'error'){
                    toastr.error(response.dontsucces.mensaje);
                            
                } else if (Object.keys(response.error).length > 0 ){

                        var msg = response.error.InputFile;
                        toastr.error(msg);

                }
                $("#loadModal").attr("style", "display: none !important");
   
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError')?>');
                $("#loadModal").attr("style", "display: none !important");           
            }
        });
            
    });



    $(document).on('click', '.Preconsulta', function (event) {        event.preventDefault();
        $("#loadModal").show();

        var csrfName = $("input[name=app_csrf]").val();
            var data = {
                  
                  app_csrf: csrfName
               };
        

        $.ajax({
            url: base_url + '/validaPreconsulta',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            async: true,
            
            success: function (response) {
                

                if (response.succes.succes == 'succes') {

                    var count = 1;
                    setInterval(function(){
                      count--;
                      if (count == 0) {
                        window.location = base_url + '/exportPreconsulta'; 
                      }
                    },1000);
                    

                } else if (response.dontsucces.error == 'error'){
                    toastr.error(response.dontsucces.mensaje);
                            
                } 

                $("#loadModal").attr("style", "display: none !important");
   
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError')?>');
                $("#loadModal").attr("style", "display: none !important");           
            }
        });
            
    });


$(document).on('click', '.Bajas', function (event) {        
    event.preventDefault();
        $("#loadModal").show();

        var csrfName = $("input[name=app_csrf]").val();
            var data = {
                  
                  app_csrf: csrfName
               };
        

        $.ajax({
            url: base_url + '/validaBajas',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            async: true,
            
            success: function (response) {
                

                if (response.succes.succes == 'succes') {

                    var count = 1;
                    setInterval(function(){
                      count--;
                      if (count == 0) {
                        window.location = base_url + '/exportBajas'; 
                      }
                    },1000);
                    

                } else if (response.dontsucces.error == 'error'){
                    toastr.error(response.dontsucces.mensaje);
                            
                } 

                $("#loadModal").attr("style", "display: none !important");
   
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError')?>');
                $("#loadModal").attr("style", "display: none !important");           
            }
        });
            
    });



</script>
<?= $this->endSection() ?>