<?php 
use App\Libraries\Encrypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;


        
        $this->encrypt = new Encrypt();
        $this->encrypter = \Config\Services::encrypter();
        
    


?>
<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
    <div id="load" class=" spinner text-secondary" role="status">
    </div>
    <div class="card card-primary">
        <div class="card-header" >
            <h3 class="card-title">Expediente</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
        </div>
                    <!-- /.card-header -->
        <div class="card-body table-responsive ">
        <?=csrf_field()?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>
                    Documento
                    </th>
                    <th>
                    </th>
                    <th>
                    </th>
                    </tr>
                </thead>    
            <tbody><?php 
        if( !empty($documentos) ):
            $i=1;
        foreach($documentos as  $d){
            $load= "";
            
                 

                $load ='<div class="input-group ">
                            <button type="button" 
                                id="creaExpediente<?=$i?>" class="btnAdjunta btn btn-block  btn-flat btn-primary"  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#fileModal">Cargar Archivo</button>
                        </div>';
            ?>
            <tr><td><?= $i ?><input type="hidden" id="documento<?=$i?>" name="documento<?=$i?>"  value="<?= $this->encrypt->Encrypt($d->id)?>"></td>
                    <td><?=$d->documento?></td>
                    <td><div id="view<?=$i?>">

                   

                    <div id="<?=$i?>div" ><p><input type = "hidden" value="" id="input" name="input" ></input><a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#viewModal" onclick=" hrefDoc('');" ><i class='fa fa-file nav-icon' aria-hidden='true'></i></a><strong> </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#exampleModal" onclick=" hrefDeleteDoc('' ,'','<?=$i?>');"><i  class=" fa fa-window-close nav-icon" aria-hidden="true"></i></a></p></div>



                </div></td>
                    <td><?=$load?></td></tr>       

<?php
            $i++;
        }
        endif; 

        ?>   
            </tbody></table></div>
                </div>




    <!-- Modal -->
    <div class="modal fade" id="fileModal"  aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
    <div class="modal-content ">
        <div id="loadModal"  style="display:none!important;" class="overlay d-flex justify-content-center align-items-center">
            <i class="fas fa-2x fa-sync fa-spin"></i>
        </div>
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cargar Archivo</h5>
            
        </div>
        <div class="modal-body">
            <form id="frmRegistro" class="form-horizontal">
            <div class="row">
                <div id="metaDataEst" class="col-12 col-sm-12 col-md-12">
                </div>
                <div id="metaDataDoc" class="col-12 col-sm-12 col-md-12">
                </div>
                
                <input type="hidden" class="form-control " id="idDocumento" name="idDocumento"  readonly>
                <input type="hidden" class="form-control " id="idElemento" name="idElemento"  readonly>
            <?=csrf_field()?>
                <div class="input-group">
                    <div class="custom-file" lang="es">
                    <input type="file" class="custom-file-input" id="InputFile" name="InputFile" >
                    <label class="custom-file-label" for="InputFile">Seleccionar Archivo...</label>
                    </div>
                    <div class="input-group-append">
                        <button type="button"  class="crearExp input-group-text">Cargar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button"  class="btn btn-flat btn-secondary" data-dismiss="modal">Cerrar</button>
         </div>
    </div>     
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
    <div class="modal-content ">
        <div id="loadModalDele"  style="display:none!important;" class="overlay d-flex justify-content-center align-items-center">
            <i class="fas fa-2x fa-sync fa-spin"></i>
        </div>
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
            
        </div>
        <div class="modal-body">
            <form id="frmDelete" >
            <input type="hidden"  class="form-control " id="idDelete" name="idDelete" value=""><input type="hidden"  class="form-control " id="idSubElemento" name="idSubElemento" value=""><input type="hidden"  class="form-control " id="idView" name="idView" value=""><?=csrf_field()?>
            <p><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;Realmente desea eliminar el documento ?</p>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button"  class="btn  btn-flat btn-secondary" data-dismiss="modal">Cerrar</button>
            <a href="#" id="deleteDocumento" class="btn  btn-flat btn-primary">Eliminar</a>
        </div>
            </form>
    </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="viewModal"  aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
    <div class="modal-content ">
        <div id="loadModal"  style="display:none!important;" class="overlay d-flex justify-content-center align-items-center">
            <i class="fas fa-2x fa-sync fa-spin"></i>
        </div>
        <div class="modal-body">
                <iframe id="inlineFrameExample" title="Inline Frame Example" width="100%" height="400px" src="">
                </iframe>    
            
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button"  class="btn btn-flat btn-secondary" data-dismiss="modal">Cerrar</button>
         </div>
    </div>     
    </div>
    </div>
<script type="text/javascript">

    $(function () {
  bsCustomFileInput.init();
});


hrefDoc = function(idDocumento){


    $("#inlineFrameExample").attr("src","./getFileIni?h="+ idDocumento + "#toolbar=0&navpanes=0");


}
    
    $(document).on('click', '.cargaArchivo', function (event) {        
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        var formData = new FormData($("form#Archivos")[0]);
        
        
        $.ajax({
            url: base_url + '/uploadFile',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                

                if (response.succes.succes == 'succes') {

                    $('#'+response.data.elemento).append(response.data.archivo);
                    
                   

                    toastr.success(response.succes.mensaje);


                } else if (response.dontsucces.error == 'error'){
                    toastr.error(response.dontsucces.mensaje);
                            
                } else if (Object.keys(response.error).length > 0 ){

                    for (var clave in response.error){

                        if (clave == 'InputFile'){

                            toastr.error(response.error[clave]);
                        } else {
                                
                            $( "<div class=errorField text-danger>" + response.error[clave] +"</div>" ).insertAfter( "#"+clave+"" );
                        }
                            
                    }
                    
                    toastr.error('<?=lang('Layout.camposObligatorios')?>');

                    

                }
                
                    $('#load').removeClass( "spinner-border" );
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError') ?>');           
            }
        });
            
    }); 

</script>

<?= $this->endSection() ?>