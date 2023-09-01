<?php

use CodeIgniter\HTTP\RequestInterface;
use App\Models\ArmasModel;
use App\Libraries\Encrypt;

 $encrypt = new Encrypt();

?>
<div class="card card-primary" id="cardAltaEmpleado">
    <div class="card-header">
        <h3 class="card-title">DATOS RECURSOS HUMANOS</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="altaEmpleado">
            <div class="row">
                <input type="hidden" class="form-control " id="idAltaEmpleado" name="idAltaEmpleado" value="<?= $encrypt->Encrypt($datosEmpleado->id) ?>"><?= csrf_field() ?>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="fecha_ingreso" class=" control-label">Fecha de Ingreso:<span class="text-danger">*</span></label>
                         <div class="input-group date" id="fecha_ingreso" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_ingreso" id="datetime-fecha_ingreso" name="fecha_ingreso" placeholder="" value="<?= isset($datosEmpleado->fecha_ingreso) ? date( "d-m-Y" ,strtotime($datosEmpleado->fecha_ingreso)) : ''  ?>" />
                            <div class="input-group-append" data-target="#fecha_ingreso" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#fecha_ingreso").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                        <div>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="asignacionServ" class=" control-label">Asignación Servicio:<span class="text-danger">*</span></label>
                        <select class="form-control" id="asignacionServ" name="asignacionServ">
                            <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($clientes) ):
                                    foreach($clientes as  $a){
                                        $idCliente = $encrypt->Encrypt($a->id);
                                        ?>
                                            <option <?= isset($datosEmpleado->idCliente)?($datosEmpleado->idCliente) == $a->nombre_corto ? 'selected' : '':'' ?> value="<?=$idCliente ?>"><?= $a->nombre_corto ?></option>
                                            <?php
                                    }
                                endif;?>
                        </select>
                            <script>
                                $(document).ready(function() {
                                    $("#asignacionServ").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ubicacionRH" class=" control-label">Ubicación:<span class="text-danger">*</span></label>
                        <select class="form-control" id="ubicacionRH" name="ubicacionRH">
                                <option value="">Selecciona una Opcion</option>
                                
                                            <option selected value="<?= $encrypt->Encrypt($datosEmpleado->idUbicacion) ?>"><?= $datosEmpleado->nombre_ubicacion ?></option>
                                            
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ubicacionRH").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sueldoRH" class=" control-label">Sueldo:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="sueldoRH" name="sueldoRH" maxlength="25" value="<?= isset($datosEmpleado->sueldo) ? $datosEmpleado->sueldo : ''  ?>">
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="turnoRH" class=" control-label">Turno:<span class="text-danger">*</span></label>
                        <select class="form-control" id="turnoRH" name="turnoRH">
                                <option value="">Selecciona una Opcion</option>
                                
                                            <option selected value="<?= $encrypt->Encrypt($datosEmpleado->idTurno) ?>"><?= $datosEmpleado->turno ?></option>
                                            
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#turnoRH").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="puestoRH" class="control-label">Puesto:<span class="text-danger">*</span></label>
                        <select class="form-control" id="puestoRH" name="puestoRH">
                            <option value="">Selecciona una Opcion</option>
                                
                                            <option selected value="<?= $encrypt->Encrypt($datosEmpleado->idPuesto) ?>"><?= $datosEmpleado->puesto ?></option>
                                            
                        </select>
                            <script>
                                $(document).ready(function() {
                                    $("#puestoRH").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="pagoExterno" class="control-label">Pago Externo:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="pagoExterno" name="pagoExterno" maxlength="25" value="<?= isset($datosEmpleado->pagoExterno) ? $datosEmpleado->pagoExterno : ''  ?>">
                                                
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="telEmpresaRH" class=" control-label">Teléfono Empresa:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="telEmpresaRH" name="telEmpresaRH" maxlength="50" value=" <?= isset($datosEmpleado->telefonoEmpresa) ? $datosEmpleado->telefonoEmpresa : ''  ?>"> 
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nominaPeriodo" class=" control-label">Periodicidad de la nómina:<span class="text-danger">*</span></label>
                        <select class="form-control" id="nominaPeriodo" name="nominaPeriodo">
                                <option value="">Selecciona una Opcion</option>

                                <?php
                                if( !empty($nomina) ):
                                    foreach($nomina as  $a){
                                        
                                        ?>
                                            <option <?= (isset($datosEmpleado->idNomimaPeriodo) == $a->valor ? 'selected' : '') ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#nominaPeriodo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="radioEmpresa" class=" control-label">Radio Empresa:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="radioEmpresa" name="radioEmpresa" maxlength="50" value="<?= isset($datosEmpleado->radioEmpresa) ? $datosEmpleado->radioEmpresa : ''  ?>">
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="jefeInmediatoRH" class=" control-label">Jefe Inmediato:<span class="text-danger">*</span></label>
                        <select class="form-control" id="jefeInmediatoRH" name="jefeInmediatoRH">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($jefes) ):
                                    foreach($jefes as  $a){
                                        $idJefe = $encrypt->Encrypt($a->id);
                                        ?>
                                            <option <?= isset($datosEmpleado->idJefeInmediato)?($datosEmpleado->idJefeInmediato) == $a->nombre ? 'selected' : '':'' ?> value="<?=$idJefe ?>"><?= $a->nombre ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#jefeInmediatoRH").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nssRH" class=" control-label">NSS:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nssRH" name="nssRH" maxlength="11" value="<?= isset($datosEmpleado->nss) ? $datosEmpleado->nss : ''  ?>">
                       
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="infonavit" class=" control-label">Crédito Infonavit:<span class="text-danger">*</span></label>
                        <select class="form-control" id="infonavit" name="infonavit">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($SiNo) ):
                                    foreach($SiNo as  $a){
                                        ?>
                                            <option <?= (isset($datosEmpleado->infonavit) == $a->valor ? 'selected' : '') ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#infonavit").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="pension" class=" control-label">Pensión Alimenticia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="pension" name="pension">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($SiNo) ):
                                    foreach($SiNo as  $a){
                                        ?>
                                            <option <?= (isset($datosEmpleado->pension) == $a->valor ? 'selected' : '') ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#pension").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="fonacot" class=" control-label">Crédito Fonacot:<span class="text-danger">*</span></label>
                        <select class="form-control" id="fonacot" name="fonacot">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($SiNo) ):
                                    foreach($SiNo as  $a){
                                        ?>
                                            <option <?= (isset($datosEmpleado->fonacot) == $a->valor ? 'selected' : '') ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#fonacot").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="soldi" class=" control-label">SOLDI:<span class="text-danger">*</span></label>
                        <select class="form-control" id="soldi" name="soldi">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($SiNo) ):
                                    foreach($SiNo as  $a){
                                        ?>
                                            <option <?= (isset($datosEmpleado->soldi) == $a->valor ? 'selected' : '') ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#soldi").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>               
                               
            </div>
        
    </div>
</div>

<div class="card card-primary" id="carCuentaBancaria">
    <div class="card-header">
        <h3 class="card-title">CUENTA BANCARIA</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
        <div class="row">
                
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="bancoRH" class=" control-label">Banco:<span class="text-danger">*</span></label>
                        <select class="form-control" id="bancoRH" name="bancoRH">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($banco) ):
                                    foreach($banco as  $a){
                                        
                                        ?>
                                            <option <?= (isset($datosEmpleado->idBanco) == $a->valor ? 'selected' : '') ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#bancoRH").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        
                    </div>
                </div>
                
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cuentaRH" class=" control-label">Cuenta:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="cuentaRH" name="cuentaRH" maxlength="50" value="<?= isset($datosEmpleado->cuentaBanco) ? $datosEmpleado->cuentaBanco : ''  ?>">
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="clabeRH" class=" control-label">CLABE:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="clabeRH" name="clabeRH" maxlength="30" value="<?= isset($datosEmpleado->CLABE) ? $datosEmpleado->CLABE : ''  ?>">
                        
                    </div>
                </div>
                          
                
              
                            
            </div>
        
    </div>
</div>

<div class="card card-primary" id="cardUniformes">
    <div class="card-header">
        <h3 class="card-title">UNIFORMES</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
         
        <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle" id="uni">
                  <thead>
                  <tr>
                    
                    <th>Tipo Uniforme</th>
                    <th>Cantidad</th>
                    <th>Talla</th>
                    
                  </tr>
                  </thead>
                  
                </table>
              </div>
    </div>
</div>
<div class="card card-primary" id="cardEquipo">
    <div class="card-header">
        <h3 class="card-title">EQUIPO</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
        <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle" id="equipoAlta">
                  <thead>
                  <tr>
                    
                    <th>Tipo/Modelo</th>
                    <th>Cantidad</th>
                    
                  </tr>
                  </thead>
                  
                </table>
              </div>
    </div>
</div>
<div class="card-footer bg-transparent clearfix">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9">

        </div>
        <div class="col-12 col-sm-6 col-md-3 ">
            <button id="saveRH" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>
</div>
</form>
<script>
function estatusRenderer(data, type, full, meta) {
    var src;
    
    if (full.activo == 1) {
        src = "<i class=\'fa fa-check-circle\'></i>";
    } else  {
        src = "<i class=\'fa fa-times-circle\'></i>";
    } 

   
    return src;
}
    var table = $('#uni').DataTable({
            data: <?= json_encode($uniforme) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [{ data: "uniforme"
                      },
                      { data: "cantidad"
                      },
                      { data: "talla"
                      }
                ]
            });


        var table = $('#equipoAlta').DataTable({
            data: <?= json_encode($equipo) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [{ data: "equipo"
                      },
                      { data: "cantidad"
                      }
            ]
        });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.4.0/jquery.json.min.js"></script>
<script>

    


    $('#asignacionServ').on('select2:select',
        function (e) {    
        
        $('#ubicacionRH').val(null).empty();
        var asignacionServ = $('#asignacionServ').val()
        var csrfName = $("input[name=app_csrf]").val();
        
            var data    = {
                    asignacionServ : asignacionServ,
                    app_csrf: csrfName
                };

        $.ajax({
            url: base_url + '/getUbicacionAlta',
            type: 'POST',
            dataType: 'json',
            data: data,
            data: data,
            ache: false,
            async: true,
            success: function (response) {
                if(response.succes.succes === "succes"){

                    $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

                    $('#ubicacionRH').append(response.data.ubicacionRH);
                        
                    
                    } else {


                        toastr.error(response.dontsucces.mensaje);
                    }

                $('#load').removeClass( "spinner-border" );
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError') ?>');
                           
            }
        });


        $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

    
    });

    $('#ubicacionRH').on('select2:select',
        function (e) {    
        
        $('#turnoRH').val(null).empty();
        var ubicacionRH = $('#ubicacionRH').val()
        var csrfName = $("input[name=app_csrf]").val();
        
            var data    = {
                    ubicacion : ubicacionRH,
                    app_csrf: csrfName
                };

        $.ajax({
            url: base_url + '/getTurnos',
            type: 'POST',
            dataType: 'json',
            data: data,
            data: data,
            ache: false,
            async: true,
            success: function (response) {
                if(response.succes.succes === "succes"){

                    $("input[name=app_csrf]").val('<?= csrf_hash() ?>');
                    $('#turnoRH').append(response.data.turnos);
                        
                    
                    } else {


                        toastr.error(response.dontsucces.mensaje);
                    }

                $('#load').removeClass( "spinner-border" );
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError') ?>');
                           
            }
        });

        $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

    
    });

    $('#turnoRH').on('select2:select',
        function (e) {    
        
        $('#puestoRH').val(null).empty();
        var turnoRH = $('#turnoRH').val()
        var csrfName = $("input[name=app_csrf]").val();
        
            var data    = {
                    turno : turnoRH,
                    app_csrf: csrfName
                };

        $.ajax({
            url: base_url + '/getPuestosAlta',
            type: 'POST',
            dataType: 'json',
            data: data,
            data: data,
            ache: false,
            async: true,
            success: function (response) {
                if(response.succes.succes === "succes"){

                    $("input[name=app_csrf]").val('<?= csrf_hash() ?>');
                    $('#puestoRH').append(response.data.puestos);
                        
                    
                    } else {


                        toastr.error(response.dontsucces.mensaje);
                    }

                $('#load').removeClass( "spinner-border" );
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError') ?>');
                           
            }
        });

        $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

    
    });

    


    $('#saveRH').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );

        var idPersonal = $('#idPersonal').val();
        var csrfName = $("input[name=app_csrf]").val();
        var formData = new FormData($("form#altaEmpleado")[0]);
        formData.append('idPersonal', idPersonal);
        formData.append('app_csrf', csrfName);

        var TableData;
        TableData = $.toJSON(storeTblValues());

        var TableDataEquipo;
        TableDataEquipo = $.toJSON(storeTblValuesEquipo());
        

        formData.append('pTableDataEquipo', TableDataEquipo);
        formData.append('pTableDataUniforme', TableData);
        
        $.ajax({
            url: base_url + '/EditarAltaEmpleado',
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

                    $("html,body").animate({
                        scrollTop: $("#cardAltaEmpleado").offset().top
                    }, 2000);

                } else if (response.dontsucces.error == 'error'){

                    toastr.error(response.dontsucces.mensaje);
                            
                } else if (Object.keys(response.error).length > 0 ){

                    for (var clave in response.error){
                                
                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardAltaEmpleado #"+clave+"" );

                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#carCuentaBancaria #"+clave+"" );

                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardUniformes #"+clave+"" );

                        
                            
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

        $("input[name=app_csrf]").val('<?= csrf_hash() ?>');
            
    });

    $('#btnUniforme').click( function(){

        $('#exampleModalUniforme').modal('show');
    });

    $('#btnEquipo').click( function(){

        $('#exampleModalEquipo').modal('show');
    });



    $('#closeModalUniforme').click( function(){

        $('#frmAddUniforme')[0].reset();
        $('#exampleModalUniforme').modal('hide');


    });

    $('#closeModalEquipo').click( function(){

        $('#frmAddEquipo')[0].reset();
        $('#exampleModalEquipo').modal('hide');


    });

    $('#addUniforme').click( function(){

        var idUniforme = $('#tipoUniforme').val();
        var tipoUniforme = $('#tipoUniforme :selected').text();
        var cantidad = $('#cantidadUniforme').val();
        var talla = $('#tallaUniforme').val();

        if( tipoUniforme == '' || cantidad == '' || talla == '' ){

            toastr.error('<?=lang('Layout.camposObligatorios')?>');

        } else{

            $('#uni tr:last').after('<tr>' +
                    '<td style="display:none;">'+idUniforme+'</td>' +
                    '<td>'+tipoUniforme+'</td>' +
                    '<td>'+cantidad+'</td>' +
                    '<td>'+talla+'</td>' +
                    '<td>' +
                        '<a href="#" class="text-muted">' +
                        '<i class="delete fa fa-trash"></i>' +
                      '</a>'+
                    '</td>' +    
                  '</tr>');

        $("html,body").animate({
                        scrollTop: $("#cardUniformes").offset().top
                    }, 1000);

        $('#frmAddUniforme')[0].reset();
        $('#exampleModalUniforme').modal('hide');

        }

        

    });

    $(document).on('click', '.delete', function() {
   
       
        $(this).parents("tr").remove();
        $("html,body").animate({
                        scrollTop: $("#cardUniformes").offset().top
                    }, 1000);
    });


    $(document).on('click', '.deleteEquipo', function() {
   
       
        $(this).parents("tr").remove();
        $("html,body").animate({
                        scrollTop: $("#cardEquipo").offset().top
                    }, 1000);
    });


    $('#addEquipo').click( function(){

        var idEquipo = $('#tipoEquipo').val();
        var tipoModel = $('#tipoEquipo :selected').text();
        var cantidad = $('#cantidadEquipo').val();
        

        if(  cantidad == '' || tipoModel == '' ){

            toastr.error('<?=lang('Layout.camposObligatorios')?>');

        } else{

            $('#equipoAlta tr:last').after('<tr>' +
                    '<td style="display:none;">'+idEquipo+'</td>' +
                    '<td>'+tipoModel+'</td>' +
                    '<td>'+cantidad+'</td>' +
                    '<td>' +
                        '<a href="#" class="text-muted">' +
                        '<i class="deleteEquipo fa fa-trash"></i>' +
                      '</a>'+
                    '</td>' +    
                  '</tr>');

        $("html,body").animate({
                        scrollTop: $("#cardEquipo").offset().top
                    }, 1000);

        $('#frmAddEquipo')[0].reset();
        $('#exampleModalEquipo').modal('hide');

        }

        

    });


    function storeTblValues(){
    var TableData = new Array();

    $('#uni tr').each(function(row, tr){
        TableData[row]={
            "Uniforme" : $(tr).find('td:eq(0)').text()
            , "Cantidad" :$(tr).find('td:eq(2)').text()
            , "Talla" : $(tr).find('td:eq(3)').text()
            
        }    
    }); 
    TableData.shift();  // first row will be empty - so remove
    return TableData;
    }


    function storeTblValuesEquipo(){
    var TableData = new Array();

    $('#equipoAlta tr').each(function(row, tr){
        TableData[row]={
            "Equipo" : $(tr).find('td:eq(0)').text()
            , "Cantidad" :$(tr).find('td:eq(2)').text()
            
            
        }    
    }); 
    TableData.shift();  // first row will be empty - so remove
    return TableData;
    }




</script>  
