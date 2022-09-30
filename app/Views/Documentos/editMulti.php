<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status">
    </div>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Editar Multicatalogo</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmMulticatalogo">
            <div class="row">
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="tipo_combo" class="control-label">Tipo Combo: </label>
                        <div >
                            <input type="text"  class="form-control " disabled id="tipo_combo" name="tipo_combo"  value="<?= $catalogo->tipo_combo ?>"><input type="hidden"  class="form-control " value =" <?=$id?> " id="id" name="id" ><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="valor" class="control-label">valor: <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="valor" name="valor" value="<?= $catalogo->valor ?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo:</label>
                        <div class="form-check" >
                            <input class="form-check-input"  type="checkbox" value="<?= $catalogo->activo == 1 ? 'checked' : '' ?>">
                        </div>
                    </div>
                </div>
            </div>        
        </form>
    </div>
    <div class="card-footer bg-transparent clearfix">
        <div class="row">
            
            <div class="col-12 col-sm-6 col-md-3 ">    
                <button id="editMulti" class="btn btn-block btn-flat btn-primary " type="button"><i id="loadBtn" class="fa fa-circle-o-notch fa-spin" style="display:none;"></i>&nbsp&nbspGuardar</button>
            </div>
        </div>    
    </div>
</div>

<script>
     $('#editMulti').click(function (event) {
        event.preventDefault();
        $('#loadBtn').show();
        var formData = new FormData($("form#frmMulticatalogo")[0]);
        
        $.ajax({
            url: base_url + '/EditInfoMulti',
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

                    var count = 3;
                    setInterval(function(){
                      count--;
                      if (count == 0) {
                        window.location = base_url + '/multicatalogo'; 
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
            
    });

    
</script>
<?= $this->endSection() ?>