<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status">
</div>
<div class="row mb-2">
    
    <div class="col-12 col-sm-6 col-md-9 "></div>
    <div class="col-12 col-sm-6 col-md-3 ">
        <button class="btn btn-block btn-flat btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;&nbsp; agrega Licencia</button>
        
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form class="form-horizontal" id="frmLicencias">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Agregar Licencia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class='col-12 col-sm-6'>
                                    <div class="form-group">
                                        <label for="Oficio" class="control-label">No. Oficio: <span class="text-danger">*</span></label>
                                        <div >
                                            <input type="text"  class="form-control " id="Oficio" name="Oficio"><?= csrf_field() ?>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-6'>    
                                    <div class="form-group">
                                        <label for="folio" class="control-label">Folio: <span class="text-danger">*</span></label>
                                        <div >
                                            <input type="text"  class="form-control " id="Folio" name="Folio" >
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-6'>    
                                    <div class="form-group">
                                        <label for="modalidad" class="control-label">modalidad <span class="text-danger">*</span></label>
                                        <div >
                                            <?= csrf_field() ?>
                                            <select id="modalidad" name="modalidad" class="form-control" >
                                                <option value="" selected>Selecciona una Opción</option>
                                                <?php foreach($modalidad as $mod):?>
                                                    <option value="<?=$mod->id?>"><?=$mod->valor?></option>
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
                                            <input type="text"  class="form-control " id="responsable" name="responsable" >
                                        </div>
                                    </div>
                                </div>

                                <div class='col-12 col-sm-3'>    
                                    <div class="form-group">
                                        <label for="responsable" class="control-label">Fecha Revalidacion: <span class="text-danger">*</span></label>
                                        <div >
                                            <input type="date"  class="form-control " id="fecha" name="fecha" >
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-3'>    
                                    <div class="form-group">
                                        <label for="responsable" class="control-label">Armas Cortas: <span class="text-danger">*</span></label>
                                        <div >
                                            <input type="number"  class="form-control " id="aCorta" name="aCorta" >
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-3'>    
                                    <div class="form-group">
                                        <label for="responsable" class="control-label">Armas Largas: <span class="text-danger">*</span></label>
                                        <div >
                                            <input type="number"  class="form-control " id="aLargas" name="aLargas" >
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-3'>    
                                    <div class="form-group">
                                        <label for="responsable" class="control-label">Total Personas: <span class="text-danger">*</span></label>
                                        <div >
                                            <input type="number"  class="form-control " id="tPersonas" name="tPersonas" >
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-12'>    
                                    <div class="form-group">
                                        <label for="responsable" class="control-label">Cargar Documentos: <span class="text-danger">*</span></label>
                                        <div >
                                        <button class="btn btn-danger" id="select-file"><i class='fa fa-file-pdf-o nav-icon'></i>&nbsp;&nbsp;&nbsp; PDF</button>
                                        <input class="d-none" type="file" id="archivo_file" name="archivo_file" accept=".pdf">
                                            
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
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-primary" id="guardar">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header" id="tabMain">
        <h3 class="card-title">Licencias</h3>
    
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
                <th>No Oficio</th>
                <th>Folio</th>
                <th>Modalidad</th>
                <th>Responsalble</th>
                <th>Fecha Revalidacion</th>
                <th>Armas Cortas</th>
                <th>Armas Largas</th>
                <th>Total Armas</th>
                <th>Total Personas</th>
                <th>Documento</th>
                <th>activo</th>
                <th>editar</th>
                <th>detallles</th>
       		</tr>
            </thead>
        </table>
    </div>
    <div class="modal fade modal-visor" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalVisor">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
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
        var formData = new FormData($("form#frmLicencias")[0]);
        
        $.ajax({
            url: base_url + '/GuardarLic',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.errorField').remove();

                if (response.succes.succes == 'succes') {

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
                        toastr.error('<?=lang('Layout.camposObligatorios')?>');

                }

                $('#load').removeClass( "spinner-border" );    

                        
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError')?>');
                $('#load').removeClass( "spinner-border" );           
            }
        });
            
    });

    const  estatusRenderer = (data, type, full, meta) => {
        var src;
        
        if (full.activo == 1) {
            src = "<i class='fa fa-check-circle text-success'></i>";
        } else  {
            src = "<i class='fa fa-times-circle text-danger'></i>";
        } 

        return src;
    }
    var table = $('#dataGrid').DataTable({
        data: <?= json_encode($licencias) ?> ,
        deferRender: true,
        pageLength: 10,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        columns: [
            { data: "No_oficio"
            },
            { data: "folio"
            },
            { data: "valor"
            },
            { data: "responsable"
            },
            { data: "fecha_revalidacion"
            },
            { data: "armas_Cortas"
            },
            { data: "armas_Largas"
            },
            { data: "total_Armas"
            },
            { data: "total_Personas"
            },
            { data: "docuemento_Licencia",
                render: (data, type, full, meta) => {
                    return `<button data-toggle='modal' data-target='#modal' onclick='asignData("${full.id_licencia}")' class='nav-link btn btn-link'><i class='fa fa-file-pdf-o text-danger'></i></button>`;

                }
            },
            { data: "activo",
                render: estatusRenderer
            },
            { data: "aditar",
                render: (data, type, full, meta) => {
                    return "<a href='" + base_url + "/editarLicenia?id=" + full.id_licencia + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
        
                }
            },
            { data: "detalles",
                render: (data, type, full, meta) => {
                    return "<a href='" + base_url + "/detialLicencia?id=" + full.id_licencia + "' class='nav-link'><i class='fa fa-file nav-icon'></i>";
                }
            },
        ]
    });

    const asignData = (id) => {
        document.querySelector("#modalVisor").innerHTML = `<iframe src="visor?h=${id}" width="100%" height="600"></iframe>`
    }

</script>
<?= $this->endSection() ?>