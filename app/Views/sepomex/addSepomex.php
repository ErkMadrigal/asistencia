<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status"></div>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Sepomex</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmSepomex">
            <div class="row">
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="cp" class="control-label">Codigo Postal <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="cp" name="cp" ><?= csrf_field() ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="estado" class="control-label">Estado <span class="text-danger">*</span></label>
                        <div >
                            <select id="estado" name="estado" class="form-control">
                                <option selected>Selecciona una Opcion</option>
                                <?php foreach($sepomexEstados as $estado => $valor):?>
                                    <option value="<?=$valor->estado?>"><?=$valor->estado?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="ciudad" class="control-label">Ciudad <span class="text-danger">*</span></label>
                        <div >
                            <select id="ciudad" name="ciudad" class="form-control">
                                    <option selected>Selecciona una Opción</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="municipio" class="control-label">Municipio <span class="text-danger">*</span></label>
                        <div >
                            <select id="municipio" name="municipio" class="form-control">
                                    <option selected>Selecciona una Opción</option>
                                    
                            </select>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="asentamiento" class="control-label">Asentamiento <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="asentamiento" name="asentamiento" >
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo:</label>
                        <div class="form-check" >
                            <input class="form-check-input"  type="checkbox" name="activo" id="activo" value="">
                        </div>
                    </div>
                </div>
            </div>        
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-6 col-md-3">    
        <button id="btnSEpomex" class="btn btn-block btn-flat btn-primary " type="button">Guardar</button>
    </div>
</div>

<script>
    let btnSEpomex = document.querySelector("#btnSEpomex");

    btnSEpomex.onclick = (e) => {
        e.preventDefault()
        let chk = $('#activo').prop('checked') ? 1:0
        $('#loadBtn').show();
        let formData = new FormData($("form#frmSepomex")[0]);
        formData.append("chkActivo", chk);
        $.ajax({
            url: base_url + '/insertDataSepomex',
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
    }

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