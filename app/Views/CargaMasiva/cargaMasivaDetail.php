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
                    </tr>
                </thead>    
            <tbody><?php 
        if( !empty($documentos) ):
            $i=1;
        foreach($documentos as  $d){
            
                
            ?>
            <tr><td><?= $i ?></td>
                <td><?=$d->documento?></td>
                <td><div ><p><a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#viewModal" onclick="hrefDoc('<?= $d->id?>')" ><i class="fa fa-file nav-icon" aria-hidden="true"></i></a></p></div>
                </td>
            </tr>       

<?php
            $i++;
        }
        endif; 

        ?>   
            </tbody></table></div>
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


hrefDoc = function(idDocumento){


    $("#inlineFrameExample").attr("src","./getFileIni?h="+ idDocumento + "#toolbar=0&navpanes=0");


}
  

</script>