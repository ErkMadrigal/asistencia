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
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="fecha_ingreso" class=" control-label">Fecha de Ingreso:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="fecha_ingreso" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_ingreso" id="datetime-fecha_ingreso" name="fecha_ingreso" placeholder="" value="" />
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
                                            <option value="<?=$idCliente ?>"><?= $a->nombre_corto ?></option>
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
                                <?php
                                if( !empty($ubicacionRH) ):
                                    foreach($ubicacionRH as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
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
                        <input type="text" class="form-control " id="sueldoRH" name="sueldoRH" maxlength="25">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="turnoRH" class=" control-label">Turno:<span class="text-danger">*</span></label>
                        <select class="form-control" id="turnoRH" name="turnoRH">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($turnoRH) ):
                                    foreach($turnoRH as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
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
                        <label for="puestoRH" class="control-label">Puesto: <span class="text-danger">*</span></label>
                        <select class="form-control" id="puestoRH" name="puestoRH">
                            <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($puestoRH) ):
                                    foreach($puestoRH as  $a){
                                        $idRegion = $encrypt->Encrypt($a->id);
                                        ?>
                                            <option value="<?=$idRegion ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
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
                        <label for="pagoExterno" class="control-label">Pago Externo: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="pagoExterno" name="pagoExterno" maxlength="25">
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="telEmpresaRH" class=" control-label">Teléfono Empresa:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="telEmpresaRH" name="telEmpresaRH" maxlength="50">
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
                                        $idNomina = $encrypt->Encrypt($a->id);
                                        ?>
                                            <option value="<?=$idNomina ?>"><?= $a->valor ?></option>
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
                        <input type="text" class="form-control " id="radioEmpresa" name="radioEmpresa" maxlength="50">
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
                                            <option value="<?=$idJefe ?>"><?= $a->nombre ?></option>
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
                        <input type="text" class="form-control " id="nssRH" name="nssRH" maxlength="11">
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
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
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
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
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
                                        $idBanco = $encrypt->Encrypt($a->id);
                                        ?>
                                            <option value="<?=$idBanco ?>"><?= $a->valor ?></option>
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
                        <input type="text" class="form-control " id="cuentaRH" name="cuentaRH" maxlength="50">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="clabeRH" class=" control-label">CLABE:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="clabeRH" name="clabeRH" maxlength="30">
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
        
        <div class="row">
                
        </div>
    </div>
</div>


<div class="card-footer bg-transparent clearfix">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9">
            
        </div>
        <div class="col-12 col-sm-6 col-md-3 ">    
            <button id="saveRH"  class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" ></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>    
</div>
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

    
    });

    


    $('#saveRH').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );

        var idPersonal = $('#idPersonal').val()
        var csrfName = $("input[name=app_csrf]").val();
        var formData = new FormData($("form#altaEmpleado")[0]);
        formData.append('idPersonal', idPersonal);
        formData.append('app_csrf', csrfName);
        
        $.ajax({
            url: base_url + '/GuardarAltaEmpleado',
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

                    $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

                    toastr.success(response.succes.mensaje);

                    $('#saveRH').addClass( "btn-success" );
                    $('#saveRH').prop( "disabled",true );
                    $('#saveRH').html( "Guardado&nbsp;<i class='fa fa-thumbs-up'></i>" );

                    

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
            
    });



</script>    