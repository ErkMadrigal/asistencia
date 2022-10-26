<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status"></div>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Editar Sepomex</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal needs-validation" id="frmSepomex">
            <div class="row">
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="CP" class="control-label">Codigo Postal: </label>
                        <div >
                            <input type="text"  class="form-control " id="cp" name="cp"  value="<?=$sepomex->codigoPostal?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5"><input type="hidden"  class="form-control " value =" <?=$id?> " id="id" name="id" ><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="estado" class="control-label">Estado: <span class="text-danger">*</span></label>
                        <div >
                            <select id="estado" name="estado" class="form-control" >
                                <option selected value="<?=$sepomex->estado?>"><?=$sepomex->estado?></option>
                                <?php foreach($sepomexEstados as $estado => $valor):?>
                                    <option value="<?=$valor->estado?>"><?=$valor->estado?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estado").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Ciudad" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div >
                            <select id="ciudad" name="ciudad" class="form-control">
                                    <option selected value="<?=$sepomex->ciudad?>"><?=$sepomex->ciudad?></option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ciudad").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="municipio" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div >
                            <select id="municipio" name="municipio" class="form-control">
                                    <option selected value="<?=$sepomex->municipio?>"><?=$sepomex->municipio?></option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipio").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="asentamiento" class="control-label">Asentamiento: <span class="text-danger">*</span></label>
                        <div >
                            <input type="text" class="form-control " id="asentamiento" name="asentamiento" value="<?=$sepomex->asentamiento?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo:</label>
                        <div class="form-check" >
                            <input class="form-check-input"  type="checkbox" name="activo" id="activo" <?= $sepomex->activo == 1 ? 'checked' : '' ?> value="<?= $sepomex->activo == 1 ? '1' : '0' ?>">
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
    let btnGuardar = document.querySelector("#btnGuardar")
    btnGuardar.onclick = (event) => {
        event.preventDefault();
        let chk = $('#activo').prop('checked') ? 1:0
        $('#loadBtn').show();
        var formData = new FormData($("form#frmSepomex")[0]);
        formData.append("chkActivo", chk);
        $.ajax({
            url: base_url + '/editDataSepomex',
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
                        window.location = base_url + '/sepomex'; 
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

        let estado = document.querySelector("#estado")

    let selectMunicipio = document.querySelector("#municipio")
    let selectCiudad = document.querySelector("#ciudad")

    estado.onchange = (e) => {
        selectCiudad.innerHTML = ''
        selectMunicipio.innerHTML = ''

        e.preventDefault()
        let formData = new FormData($("form#frmSepomex")[0]);
        $.ajax({
            url: base_url + '/getDataSepomex',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.succes.succes === "succes"){
                    selectMunicipio.innerHTML = '<option selected>Selecciona una Opción</option>'
                    selectCiudad.innerHTML = '<option selected>Selecciona una Opción</option>'
                    response.dataMunicipio.forEach( municipio => {
                        selectMunicipio.innerHTML += `<option value="${municipio.municipio}">${municipio.municipio}</option>`
                        
                    })
                    response.dataCiudad.forEach( ciudad => {
                        selectCiudad.innerHTML += `<option value="${ciudad.ciudad}">${ciudad.ciudad}</option>`
                    })
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError') ?>');
                $('#loadBtn').hide();           
            }
        });
    };

</script>
<?= $this->endSection() ?>