<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>

<?php

use CodeIgniter\HTTP\RequestInterface;
use App\Models\ArmasModel;
use App\Libraries\Encrypt;

 $encrypt = new Encrypt();

?>
<div id="load" class=" spinner text-secondary" role="status">
    </div>

<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Agregar Arma</h3>
    
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
                            <input type="text"  class="form-control " id="matricula" name="matricula"><?= csrf_field() ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="clase" class="control-label">Clase: <span class="text-danger">*</span></label>
                        <select class="form-control" id="clase" name="clase">
                        <option value="">Selecciona una Clase</option>';
                        <?php
                                if( !empty($clase) ):
                                    foreach($clase as  $a){
                                        $idClase = $encrypt->Encrypt($a->id);?>
                                            <option value="<?=$idClase?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                                    </select><script>$(document).ready(function() {
                                        $("#clase").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="calibre" class="control-label">Calibre: <span class="text-danger">*</span></label>
                        <select class="form-control" id="calibre" name="calibre">
                        <option value="">Selecciona un Calibre</option>';
                        <?php
                                if( !empty($calibre) ):
                                    foreach($calibre as  $a){
                                        $idCalibre = $encrypt->Encrypt($a->id);?>
                                            <option value="<?=$idCalibre?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                                    </select><script>$(document).ready(function() {
                                        $("#calibre").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="marca" class="control-label">Marca: <span class="text-danger">*</span></label>
                        <select class="form-control" id="marca" name="marca">
                        <option value="">Selecciona una Marca</option>';
                        <?php
                                if( !empty($marca) ):
                                    foreach($marca as  $a){
                                        $idMarca = $encrypt->Encrypt($a->id);?>
                                            <option value="<?=$idMarca?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                                    </select><script>$(document).ready(function() {
                                        $("#marca").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>

                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="modelo" class="control-label">Modelo: <span class="text-danger">*</span></label>
                        <select class="form-control" id="modelo" name="modelo">
                        <option value="">Selecciona un Modelo</option>';
                        <?php
                                if( !empty($modelo) ):
                                    foreach($modelo as  $a){
                                        $idModelo = $encrypt->Encrypt($a->id);?>
                                            <option value="<?=$idModelo?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                                    </select><script>$(document).ready(function() {
                                        $("#modelo").select2({theme: "bootstrap4",width:"100%"});
                                        });</script>

                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="tipo de Arma" class="control-label">Tipo de Arma: <span class="text-danger">*</span></label>
                        <select id="tipoArma" name="tipoArma" class="form-control" >
                            <option value="" selected>Selecciona una Opción</option>
                            <?php foreach($tipoArma as $tipoAr):?>
                                <option value="<?=$tipoAr->id?>"><?=$tipoAr->valor?></option>
                            <?php endforeach;?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#tipoArma").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="modelo" class="control-label">Ubicacion: <span class="text-danger">*</span></label>
                        <select id="ubicaciones" name="ubicaciones" class="form-control" >
                            <option value="" selected>Selecciona una Opción</option>
                            <?php foreach($ubicaciones as $ubicacion):?>
                                <option value="<?=$ubicacion->id_ubicacion?>"><?=$ubicacion->direccion?></option>
                            <?php endforeach;?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#ubicaciones").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="folio_manif" class="control-label">Folio Manif: <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="folio_manif" name="folio_manif" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12'>    
                    <div class="form-group">
                        <label for="responsable" class="control-label">Cargar Documento Folio Manifiesto: <span class="text-danger">*</span></label>
                        <div >

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
        
    </div>
</div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">    
                    <button id="SaveArmas" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
                </div>
            </div>
            </form>
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
    
    $('#SaveArmas').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        var formData = new FormData($("form#frmArmas")[0]);
        
        $.ajax({
            url: base_url + '/GuardarArma',
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
                        window.location = base_url + '/armas'; 
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

</script>
<?= $this->endSection() ?>