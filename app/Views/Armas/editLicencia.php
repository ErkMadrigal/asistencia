<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status">
</div>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Editar Licencias</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmEditLicencias">
            <div class="row">
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="Oficio" class="control-label">No. Oficio: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=$licencia->id_licencia?>" type="text"  class="form-control d-none" id="idLicencia" name="idLicencia">
                            <input value="<?=$licencia->No_oficio?>" type="text"  class="form-control " id="Oficio" name="Oficio"><?= csrf_field() ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="folio" class="control-label">Folio: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=$licencia->folio?>" type="text"  class="form-control " id="Folio" name="Folio" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="modalidad" class="control-label">modalidad <span class="text-danger">*</span></label>
                        <div >
                            <select id="modalidad" name="modalidad" class="form-control" >
                                <option value="" >Selecciona una Opción</option>
                                <?php foreach($modalidad as $mod):?>
                                    <option <?= (isset($licencia->id_Modalidad) == $mod->id ? 'selected' : '') ?> value="<?=$mod->id?>"><?=$mod->valor?></option>
                                <?php endforeach;?>

                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#modalidad").select2({
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
                        <label for="responsable" class="control-label">responsable: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=$licencia->responsable?>" type="text"  class="form-control " id="responsable" name="responsable" >
                        </div>
                    </div>
                </div>

                <div class='col-12 col-sm-4'>    
                    <div class="form-group">
                        <label for="responsable" class="control-label">Fecha Revalidacion: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=explode(" ", $licencia->fecha_revalidacion)[0]?>" type="date"  class="form-control " id="fecha" name="fecha" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-2'>    
                    <div class="form-group">
                        <label for="responsable" class="control-label">Armas Cortas: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=$licencia->armas_Cortas?>" type="number"  class="form-control " id="aCorta" name="aCorta" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-2'>    
                    <div class="form-group">
                        <label for="responsable" class="control-label">Armas Largas: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=$licencia->armas_Largas?>" type="number"  class="form-control " id="aLargas" name="aLargas" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-2'>    
                    <div class="form-group">
                        <label for="responsable" class="control-label">Total Personas: <span class="text-danger">*</span></label>
                        <div >
                            <input value="<?=$licencia->total_Personas?>" type="number"  class="form-control " id="tPersonas" name="tPersonas" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-2'>    
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo: </label>
                        <div class="form-check" >
                            <input class="form-check-input"  type="checkbox" name="activo" id="activo" <?= $licencia->activo == 1 ? 'checked' : '' ?> value="<?= $licencia->activo == 1 ? '1' : '0' ?>">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" id="guardar">Guardar</button>
        </form>


    </div>
    
</div>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Editar Docuemnto</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
     </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmEditLicenciasDoc">
            <div class="row">
                <div class='col-12 col-sm-12'>    
                    <div class="form-group">
                        <label for="responsable" class="control-label">Cargar Nuevo Documento: <span class="text-danger">*</span></label>
                        <div >
                        <input value="<?=$licencia->id_licencia?>" type="text"  class="form-control d-none" id="idLicenciaFile" name="idLicenciaFile"><?= csrf_field() ?>

                        <button class="btn btn-danger" id="select-file"><i class='fa fa-file-pdf-o nav-icon'></i>&nbsp;&nbsp;&nbsp; PDF</button>
                        <input  class="d-none" type="file" id="archivo_file" name="archivo_file" accept=".pdf">
                            
                            <div class="text-center d-none" id="contenedorPDF">
                                <h1>Archivo seleccionado:</h1>
                                    <svg width="180px" height="180px" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                    <style>.cls-1{fill:#ff402f;}</style>
                                    </defs>
                                    <title/>
                                    <g id="xxx-word">
                                        <path class="cls-1" d="M325,105H250a5,5,0,0,1-5-5V25a5,5,0,0,1,10,0V95h70a5,5,0,0,1,0,10Z"/>
                                        <path class="cls-1" d="M325,154.83a5,5,0,0,1-5-5V102.07L247.93,30H100A20,20,0,0,0,80,50v98.17a5,5,0,0,1-10,0V50a30,30,0,0,1,30-30H250a5,5,0,0,1,3.54,1.46l75,75A5,5,0,0,1,330,100v49.83A5,5,0,0,1,325,154.83Z"/>
                                        <path class="cls-1" d="M300,380H100a30,30,0,0,1-30-30V275a5,5,0,0,1,10,0v75a20,20,0,0,0,20,20H300a20,20,0,0,0,20-20V275a5,5,0,0,1,10,0v75A30,30,0,0,1,300,380Z"/>
                                        <path class="cls-1" d="M275,280H125a5,5,0,0,1,0-10H275a5,5,0,0,1,0,10Z"/>
                                        <path class="cls-1" d="M200,330H125a5,5,0,0,1,0-10h75a5,5,0,0,1,0,10Z"/>
                                        <path class="cls-1" d="M325,280H75a30,30,0,0,1-30-30V173.17a30,30,0,0,1,30-30h.2l250,1.66a30.09,30.09,0,0,1,29.81,30V250A30,30,0,0,1,325,280ZM75,153.17a20,20,0,0,0-20,20V250a20,20,0,0,0,20,20H325a20,20,0,0,0,20-20V174.83a20.06,20.06,0,0,0-19.88-20l-250-1.66Z"/>
                                        <path class="cls-1" d="M145,236h-9.61V182.68h21.84q9.34,0,13.85,4.71a16.37,16.37,0,0,1-.37,22.95,17.49,17.49,0,0,1-12.38,4.53H145Zm0-29.37h11.37q4.45,0,6.8-2.19a7.58,7.58,0,0,0,2.34-5.82,8,8,0,0,0-2.17-5.62q-2.17-2.34-7.83-2.34H145Z"/>
                                        <path class="cls-1" d="M183,236V182.68H202.7q10.9,0,17.5,7.71t6.6,19q0,11.33-6.8,18.95T200.55,236Zm9.88-7.85h8a14.36,14.36,0,0,0,10.94-4.84q4.49-4.84,4.49-14.41a21.91,21.91,0,0,0-3.93-13.22,12.22,12.22,0,0,0-10.37-5.41h-9.14Z"/>
                                        <path class="cls-1" d="M245.59,236H235.7V182.68h33.71v8.24H245.59v14.57h18.75v8H245.59Z"/>
                                    </g>

                                    </svg>
                                <h1 id="title_pdf"></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" id="guardarFile">Guardar</button>
        </form>

        
    </div>
    
</div>
<script>

    let select_excel = document.querySelector("#select-file")
        let archivo_file = document.querySelector("#archivo_file")
        let title_pdf = document.querySelector("#title_pdf")
        let contenedorPDF = document.querySelector("#contenedorPDF")

        select_excel.onclick = (e) => {
            e.preventDefault()
            archivo_file.click()
        }

        archivo_file.addEventListener('change', function(event) {
        var archivoSeleccionado = event.target.files[0];
        
        if (archivoSeleccionado) {
            title_pdf.innerHTML = archivoSeleccionado.name
            contenedorPDF.classList.remove('d-none')
        }
    });
     $('#guardar').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        if($('#activo').is(':checked')) {
            val = 1;
        } else {
            val = 0;
        }
        var formData = new FormData($("form#frmEditLicencias")[0]);
        formData.append('activo', val);
        
        $.ajax({
            url: base_url + '/editLicencia',
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

    $('#guardarFile').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        
        var formData = new FormData($("form#frmEditLicenciasDoc")[0]);
        
        $.ajax({
            url: base_url + '/editDoc',
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