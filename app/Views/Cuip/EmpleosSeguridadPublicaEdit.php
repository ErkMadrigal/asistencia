<div class="card card-primary" id="cardEmplSeguridad">
    <div class="card-header">
        <h3 class="card-title">EMPLEOS EN SEGURIDAD PUBLICA</h3>
        <div class="card-tools">

<a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
        <input type="checkbox" class="form-check-input mt-2" id="btnNinguno">

<button type="button" class="btn btn-tool" data-card-widget="collapse" >
    <i class="fas fa-minus"></i>
</button>
</div> 
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="EmpleoSeguridadPublica">
        <div id="CardEMPLEOS">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="dependencia" class=" control-label">Dependencia:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="dependencia" name="dependencia"  value="<?=$seguridad->dependencia ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->dependencia) ? $seguridad->dependencia : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="corporacion" class=" control-label">Corporación:<span class="text-danger">*</span></label>
                          <div >    
                                  <input type="text"  class="form-control "  id="corporacion" name="corporacion"  value="<?=$seguridad->corporacion ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->corporacion) ? $seguridad->corporacion : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="calle" name="calle"  value="<?=$seguridad->calle ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->calle) ? $seguridad->calle : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="exterior" name="exterior"  value="<?=$seguridad->numero_exterior ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->numero_exterior) ? $seguridad->numero_exterior : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:</label>
                        <div >    
                                  <input type="text"  class="form-control "  id="interior" name="interior"  value="<?=$seguridad->numero_interior ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->numero_interior) ? $seguridad->numero_interior : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="numero" name="numero" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10" value="<?=$seguridad->numero_telefono ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->numero_telefono) ? $seguridad->numero_telefono : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoSegPub" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="codigoSegPub" name="codigoSegPub" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" value="<?=$seguridad->idCodigoPostal ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->idCodigoPostal) ? $seguridad->idCodigoPostal : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                 
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoSegPub" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <div >    
                        <select id="coloniacodigoSegPub" name="coloniacodigoSegPub" class="form-control" >
                                <?php foreach($seguridad as $colonia => $valor):?>
                                    <option value="<?=$seguridad->colonia?>"><?=$seguridad->colonia?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#coloniacodigoSegPub").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ingresoEmpPublic" class=" control-label">Ingreso:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="ingresoEmpPublic" name="ingresoEmpPublic"  value="<?=$seguridad->ingreso ?>">
                            
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#ingresoEmpPublic").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="separacionEmpSeg" class=" control-label">Separación:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="separacionEmpSeg" name="separacionEmpSeg"  value="<?=$seguridad->separacion ?>">
                            
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#separacionEmpSeg").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="puesto_funcional" class=" control-label">Puesto Funcional:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="puesto_funcional" name="puesto_funcional"  value="<?=$seguridad->funcional ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->funcional) ? $seguridad->funcional : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="funciones" class=" control-label">Funciones:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="funciones" name="funciones"  value="<?=$seguridad->funciones ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->funciones) ? $seguridad->funciones : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especialidad" class=" control-label">Especialidad:<span class="text-danger">*</span></label>
                        <div >    o
                                  <input type="text"  class="frm-control "  id="especialidad" name="especialidad"  value="<?=$seguridad->especialidad ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->especialidad) ? $seguridad->especialidad : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rango" class=" control-label">Rango o categoría:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="rango" name="rango"  value="<?=$seguridad->rango ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->rango) ? $seguridad->rango : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero_placa" class=" control-label">Numero de placa:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="numero_placa" name="numero_placa"  value="<?=$seguridad->numero_placa ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->numero_placa) ? $seguridad->numero_placa : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero_empleado" class=" control-label">Numero de empleado :<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="numero_empleado" name="numero_empleado"  value="<?=$seguridad->numero_empleado ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->numero_empleado) ? $seguridad->numero_empleado : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sueldo" class=" control-label">Sueldo Base (Mensual):<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="sueldo" name="sueldo"  value="<?=$seguridad->sueldo_base ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->sueldo_base) ? $seguridad->sueldo_base : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="compensaciones" class=" control-label">Compensaciones (Mensual):<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="compensaciones" name="compensaciones"  value="<?=$seguridad->compensacion ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->compensacion) ? $seguridad->compensacion : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="area" class=" control-label">Area:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="area" name="area"  value="<?=$seguridad->area ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->area) ? $seguridad->area : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="division" class=" control-label">División:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="division" name="division"  value="<?=$seguridad->division ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->division) ? $seguridad->division : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="jefe_inmediato" class=" control-label">CUIP Jefe Inmediato:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="jefe_inmediato" name="jefe_inmediato"  value="<?=$seguridad->cuip_jefe ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->cuip_jefe) ? $seguridad->cuip_jefe : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_jefe" class=" control-label">Nombre del Jefe Inmediato:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="nombre_jefe" name="nombre_jefe"  value="<?=$seguridad->nombre_jefe ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->nombre_jefe) ? $seguridad->nombre_jefe : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoSegPub" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                        <select id="estadocodigoSegPub" name="estadocodigoSegPub" class="form-control" >
                                <?php foreach($seguridad as $estado => $valor):?>
                                    <option value="<?=$seguridad->estado?>"><?=$seguridad->estado?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estadocodigoSegPub").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoSegPub" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                        <select id="municipiocodigoSegPub" name="municipiocodigoSegPub" class="form-control" >
                                <!--<option selected value="<?=$seguridad->municipio?>"><?=$seguridad->municipio?></option>-->
                                <?php foreach($seguridad as $municipio => $valor):?>
                                    <option value="<?=$seguridad->municipio?>"><?=$seguridad->municipio?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipiocodigoSegPub").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="motivo_separacion" class=" control-label">Motivo de separación:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="motivo_separacion" name="motivo_separacion"  value="<?=$seguridad->separacion ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->separacion) ? $seguridad->separacion : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_separacion" class=" control-label">Tipo de Separación:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="tipo_separacion" name="tipo_separacion"  value="<?=$seguridad->tipo_separacion ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->tipo_separacion) ? $seguridad->tipo_separacion : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_baja" class=" control-label">Tipo de Baja:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="tipo_baja" name="tipo_baja"  value="<?=$seguridad->tipo_baja ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->tipo_baja) ? $seguridad->tipo_baja : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="comentarios" class=" control-label">Comentarios:<span class="text-danger">*</span></label>
                        <div >    
                                  <input type="text"  class="form-control "  id="comentarios" name="comentarios"  value="<?=$seguridad->comentarios ?>"><input type="hidden" class="form-control " value="  <?= isset($seguridad->comentarios) ? $seguridad->comentarios : ''  ?> " id="id" name="id"><?= csrf_field() ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <hr  class="mt-3 mb-3"/>
        <div id="CardEMPLEOS">
        </div>
        </form>
    </div>
</div>
<div class="card-footer bg-transparent clearfix">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9">
            
        </div>
        <div class="col-12 col-sm-6 col-md-3 ">    
            <button id="saveEmpSegPublica" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" ></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>    
</div>
<script>
    
    $("#codigoSegPub").on('keyup', function(){
        getSepomex(this.id)
    });
    

    $('#saveEmpSegPublica').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );

        var idPersonal = $('#idPersonal').val()
        var csrfName = $("input[name=app_csrf]").val();

        if($('#btnNinguno').is(':checked')) {
            val = 1;
            
        } else {
            val = 0;

        }

        var formData = new FormData($("form#EmpleoSeguridadPublica")[0]);
        formData.append('idPersonal', idPersonal);
        formData.append('app_csrf', csrfName);
        formData.append('empleo', val);
        
        $.ajax({
            url: base_url + '/GuardarEmpSegPublica',
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

                    $('#saveEmpSegPublica').addClass( "btn-success" );
                    $('#saveEmpSegPublica').prop( "disabled",true );
                    $('#saveEmpSegPublica').html( "Guardado&nbsp;<i class='fa fa-thumbs-up'></i>" );

                    $("html,body").animate({scrollTop: $("#cardEmpDiversos").offset().top},2000);

                    $('#tabs a[href="#custom-tabs-five-normal"]').trigger('click');

                } else if (response.dontsucces.error == 'error'){

                    toastr.error(response.dontsucces.mensaje);
                            
                } else if (Object.keys(response.error).length > 0 ){

                    for (var clave in response.error){
                                
                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardEmplSeguridad #"+clave+"" );
                            
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

    

    $(document).on('click','#btnNinguno',function(){ 

if($('#btnNinguno').is(':checked')) {


    $('#EmpleoSeguridadPublica input').attr('disabled','disabled');
    $('#EmpleoSeguridadPublica select').attr('disabled','disabled');
    $('#EmpleoSeguridadPublica textarea').attr('disabled','disabled');
} else {
    $('#EmpleoSeguridadPublica input').attr('disabled',false);
    $('#EmpleoSeguridadPublica select').attr('disabled',false);
    $('#EmpleoSeguridadPublica textarea').attr('disabled',false);
}


});
    

</script>