<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status">
    </div>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Editar Documento</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmDocumento">
            <div class="row">
                <!-- <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="modalidad" class="control-label">Modalidad: </label>
                        <div >
                            <input type="text"  class="form-control " disabled id="modalidad" name="modalidad"  value="<?= $documento->valor ?>"><input type="hidden"  class="form-control " value =" <?=$id?> " id="id" name="id" ><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div> -->
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="documento" class="control-label">Documento: </label>
                        <div >
                            <input type="text"  class="form-control " disabled id="documento" name="documento" value="<?= $documento->documento ?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="tipo" class="control-label">Tipo: <span class="text-danger">*</span></label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="">Seleccionar tipo</option>
                            <option <?= ($documento->tipo == 'COPIA' ? 'selected' : '' ) ?> value="COPIA">COPIA</option>
                            <option <?= ($documento->tipo == 'ORIGINAL' ? 'selected' : '' ) ?> value="ORIGINAL">ORIGINAL</option>
                        </select><script>$(document).ready(function() {
                                        $("#tipo").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo:</label>
                        <div class="form-check" >
                            <input class="form-check-input" id="activo" name="activo" type="checkbox" <?= ($documento->activo == 1 ? 'checked' : '' ) ?>>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
    </div>
    <div class="card-footer bg-transparent clearfix">
        <div class="row">
            
            <div class="col-12 col-sm-6 col-md-3 ">    
                <button id="editDoc" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
            </div>
        </div>    
    </div>
</div>

<script>
     $('#editDoc').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        
        if($('#activo').is(':checked')) {
            val = 1;
        } else {
            val = 0;
        }
        var formData = new FormData($("form#frmDocumento")[0]);
        formData.append('activo', val);
        
        $.ajax({
            url: base_url + '/EditCatDoc',
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
                    
                    $("#exampleModal").modal("hide");

                    toastr.success(response.succes.mensaje);

                    var count = 2;
                    setInterval(function(){
                      count--;
                      if (count == 0) {
                        window.location = base_url + '/catDocumentos'; 
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

                   
                $('#load').removeClass( "spinner-border" );
                        
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError') ?>');

                $('#load').removeClass( "spinner-border" );
                           
            }
        });
            
    });

    
</script>
<?= $this->endSection() ?>