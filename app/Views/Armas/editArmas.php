<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status">
    </div>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Editar Arma</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmArmas">
            <div class="row">
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="matricula" class="control-label">Matricula: <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="matricula" name="matricula" value="<?= $arma->matricula ?>"><input type="hidden"  class="form-control " value =" <?=$id?> " id="id" name="id" ><?= csrf_field() ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="folio_manif" class="control-label">Folio-Manif: </label>
                        <div >
                            <input type="text"  class="form-control " disabled id="folio_manif" name="folio_manif"  value="<?= $arma->folio_manif ?>">
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="idClase" class="control-label">Clase: </label>
                        <div >
                            <input type="text"  class="form-control " disabled id="idClase" name="idClase"  value="<?= $arma->clase ?>">
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="idCalibre" class="control-label">Calibre: </label>
                        <div >
                            <input type="text"  class="form-control " disabled id="idCalibre" name="idCalibre"  value="<?= $arma->calibre ?>">
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="idMarca" class="control-label">Marca: </label>
                        <div >
                            <input type="text"  class="form-control " disabled id="idMarca" name="idMarca"  value="<?= $arma->marca ?>">
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="idModelo" class="control-label">Modelo: </label>
                        <div >
                            <input type="text"  class="form-control " disabled id="idModelo" name="idModelo"  value="<?= $arma->modelo ?>">
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo:</label>
                        <div class="form-check" >
                            <input class="form-check-input"  type="checkbox" id="activo" name="activo"  value="<?= $arma->activo == 1 ? 'checked' : '' ?>">
                        </div>
                    </div>
                </div>
            </div>        
        </form>
    </div>
    <div class="card-footer bg-transparent clearfix">
        <div class="row">
            
            <div class="col-12 col-sm-6 col-md-3 ">    
                <button id="editArmas" class="btn btn-block btn-flat btn-primary " type="button"><i id="loadBtn" class="fa fa-circle-o-notch fa-spin" style="display:none;"></i><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
            </div>
        </div>    
    </div>
</div>

<script>
     $('#editArmas').click(function (event) {
        event.preventDefault();
        $('#loadBtn').show();
        if($('#activo').is(':checked')) {
            val = 1;
        } else {
            val = 0;
        }
        var formData = new FormData($("form#frmArmas")[0]);
        formData.append('activo', val);
        
        $.ajax({
            url: base_url + '/EditInfoArma',
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
            
    });

    
</script>
<?= $this->endSection() ?>