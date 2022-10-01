<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status">
    </div>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Editar Empresa</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmEmpresa">
            <div class="row">
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="empresa" class="control-label">Empresa: <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="empresa" name="empresa"  value="<?= $empresa->nombre ?>"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="telefonos" class="control-label">Teléfonos: </label>
                        <div >
                            <input type="text"  class="form-control " id="telefonos" name="telefonos" value="<?= $empresa->telefonos ?>">
                        </div>
                    </div>
                </div>
            </div>        
        </form>
    </div>
    <div class="card-footer bg-transparent clearfix">
        <div class="row">
            
            <div class="col-12 col-sm-6 col-md-3 ">    
                <button id="editEmpresa" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" ></i>&nbsp;&nbsp;Guardar</button>
            </div>
        </div>    
    </div>
</div>

<script>
     $('#editEmpresa').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        var formData = new FormData($("form#frmEmpresa")[0]);
        
        $.ajax({
            url: base_url + '/EditInfoEmpresa',
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
                        window.location = base_url + '/empresa'; 
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