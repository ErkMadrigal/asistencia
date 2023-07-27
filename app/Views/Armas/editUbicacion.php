<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status">
</div>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Editar Ubicacion</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmEditUbicacion">
            <div class="row">
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="licencia" class="control-label">Licencia: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=$ubicacion->id_ubicacion ?>" type="text"  class="form-control d-none" id="idUbicacion" name="idUbicacion"><?= csrf_field() ?>
                            <select id="licencias" name="licencias" class="form-control" >
                                <option value="" selected>Selecciona una Opción</option>
                                <?php foreach($licencias as $lic):?>
                                    <option <?= (isset($ubicacion->id_licencia) == $lic->id_licencia ? 'selected' : '') ?> value="<?=$lic->id_licencia?>"><?=$lic->No_oficio?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#licencias").select2({
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
                        <label for="tipo_ubicacion" class="control-label">tipo Ubicacion: <span class="text-danger">*</span></label>
                        <div >
                            <select id="tipoUbicacion" name="tipoUbicacion" class="form-control" >
                                <option value="" selected>Selecciona una Opción</option>
                                <?php foreach($tipoUbicacion as $ubi):?>
                                    <option <?= (isset($ubicacion->id_tipo_ubicacion) == $ubi->id ? 'selected' : '') ?> value="<?=$ubi->id?>"><?=$ubi->valor?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipoUbicacion").select2({
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
                        <label for="calle" class="control-label">Calle: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=$ubicacion->calle?>" type="text"  class="form-control " id="calle" name="calle">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="No.Exterior" class="control-label">No.Exterior: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=$ubicacion->no_exterior?>" type="text"  class="form-control " id="No_Exterior" name="No_Exterior" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="No.Interior" class="control-label">No.Interior: </label>
                        <div >
                            <input value="<?=$ubicacion->no_interior?>" type="text"  class="form-control " id="No_Interior" name="No_Interior" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="CP" class="control-label">Codigo Postal: <span class="text-danger">*</span></label>
                        <div >
                            <input onchange="selectDir()" value="<?=$ubicacion->codigo_postal?>" type="text"  class="form-control " id="CP" name="CP" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Colonia" class="control-label">Colonia: <span class="text-danger">*</span></label>
                        <div >
                            <select id="Colonia" name="Colonia" class="form-control" >
                                <option value="" >Selecciona una Opción</option>
                                <option value="<?=$ubicacion->colonia?>" selected><?=$ubicacion->colonia?></option>
                                
                            </select>
                            <!-- <input value="" type="text"  class="form-control " id="Colonia" name="Colonia" > -->
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Municipio" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=$ubicacion->municipio?>" type="text"  class="form-control " id="Municipio" name="Municipio" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Estado" class="control-label">Estado: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=$ubicacion->estado?>" type="text"  class="form-control " id="Estado" name="Estado" >
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-2'>    
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo: </label>
                        <div class="form-check" >
                            <input class="form-check-input"  type="checkbox" name="activo" id="activo" <?= $ubicacion->activo == 1 ? 'checked' : '' ?> value="<?= $ubicacion->activo == 1 ? '1' : '0' ?>">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-5" id="guardar">Guardar</button>
        </form>


    </div>
    
</div>

<script>

    const selectDir = () => {
        let CP = document.querySelector("#CP").value
        let Colonia = document.querySelector("#Colonia")
        let Municipio = document.querySelector("#Municipio")
        let Estado = document.querySelector("#Estado")
        var formData = new FormData($("form#frmEditUbicacion")[0]);
        formData.append("cp", CP)
        $.ajax({
            url: base_url + '/llenadoCampos',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                Colonia.innerHTML = ``
                response.data.forEach(res => {
                    Colonia.innerHTML += `<option value="${res.asentamiento}">${res.asentamiento}</option>`
                });
                Estado.value = response.data[0].estado
                Municipio.value = response.data[0].municipio   
                
                console.log(response.data[0].estado)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError')?>');
                $('#load').removeClass( "spinner-border" );           
            }
        });
    }

     $('#guardar').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        if($('#activo').is(':checked')) {
            val = 1;
        } else {
            val = 0;
        }
        var formData = new FormData($("form#frmEditUbicacion")[0]);
        formData.append('activo', val);
        
        $.ajax({
            url: base_url + '/editUbicacion',
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
                        window.location = base_url + '/licencias'; 
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