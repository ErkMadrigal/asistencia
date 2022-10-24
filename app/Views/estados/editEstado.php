<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status"></div>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Editar</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal needs-validation" id="frmEstado">
            <div class="row">
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="claveEstado" class="control-label">Clave Estado </label>
                        <div >
                            <input type="text" disabled class="form-control " id="claveEstado" name="claveEstado"  value="<?=$dataEstado->claveEstado?>"><input type="hidden"  class="form-control " value =" <?=$id?> " id="id" name="id" ><?= csrf_field() ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="estado" class="control-label">Estado: <span class="text-danger">*</span></label>
                        <div >
                            <select id="estado" name="estado" class="form-control" >
                                <option selected value="<?=$dataEstado->estado?>"><?=$dataEstado->estado?></option>
                                <?php foreach($estados as $est):?>
                                    <option value="<?=$est->estado?>"><?=$est->estado?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="claveCapital" class="control-label">Clave Capital </label>
                        <div >
                            <input type="text" disabled class="form-control " id="claveCapital" name="claveCapital"  value="<?=$dataEstado->claveCapital?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="capital" class="control-label">Capital </label>
                        <div >
                            <input type="text" disabled class="form-control " id="capital" name="capital"  value="<?=$dataEstado->capital?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="claveMunicipio" class="control-label">Clave Municipio </label>
                        <div >
                            <input type="text"  class="form-control " id="claveMunicipio" name="claveMunicipio"  value="<?=$dataEstado->claveMunicipio?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="municipio" class="control-label">Municipio </label>
                        <div >
                            <input type="text"  class="form-control " id="municipio" name="municipio"  value="<?=$dataEstado->municipio?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo:</label>
                        <div class="form-check" >
                            <input class="form-check-input"  type="checkbox" name="activo" id="activo" <?= $dataEstado->activo == 1 ? 'checked' : '' ?> value="<?= $dataEstado->activo == 1 ? '1' : '0' ?>">
                        </div>
                    </div>
                </div>
            </div>        
        </form>
    </div>
    <div class="card-footer bg-transparent clearfix">
        <div class="row">
            
            <div class="col-12 col-sm-6 col-md-3 ">    
                <button id="btnGuardar" class="btn btn-block btn-flat btn-primary " type="button"><i id="loadBtn" class="fa fa-circle-o-notch fa-spin" style="display:none;"></i>&nbsp&nbspGuardar</button>
            </div>
        </div>    
    </div>
</div>

<script>

    let estado = document.querySelector("#estado")
    let claveEstado = document.querySelector("#claveEstado")
    let claveCapital = document.querySelector("#claveCapital")
    let capital = document.querySelector("#capital")


    estado.onchange = (e) => {

        e.preventDefault()
        let formData = new FormData($("form#frmEstado")[0]);
        $.ajax({
            url: base_url + '/getDatosEstado',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.succes.succes === "succes"){
                    capital.value =  response.data[0].capital
                    claveCapital.value = response.data[0].claveCapital
                    claveEstado.value =response.data[0].claveEstado
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError') ?>');
                $('#loadBtn').hide();           
            }
        });
    };


    let btnGuardar = document.querySelector("#btnGuardar")
    btnGuardar.onclick = (event) => {
        event.preventDefault();
        let chk = $('#activo').prop('checked') ? 1:0
        $('#loadBtn').show();
        var formData = new FormData($("form#frmEstado")[0]);
        formData.append("chkActivo", chk);
        formData.append("claveEstado", claveEstado.value);
        $.ajax({
            url: base_url + '/editDataEstado',
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
                        window.location = base_url + '/estados'; 
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
            
    };


</script>
<?= $this->endSection() ?>