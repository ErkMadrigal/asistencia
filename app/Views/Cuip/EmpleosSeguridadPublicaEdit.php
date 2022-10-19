<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">EMPLEOS EN SEGURIDAD PUBLICA</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="EmpleoSeguridadPublica">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="dependencia" class=" control-label">Dependencia:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control " id="dependencia" name="dependencia" value="<?=$seguridad->dependencia ?>"><input type="hidden"  class="form-control " value =" <?=$id?> " id="id" name="id" ><?= csrf_field() ?>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="corporacion" class=" control-label">Corporacióne:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="corporacion" name="corporacion"  value="<?=$seguridad->corporacion ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="primerNombre" name="primerNombre"  value="<?=$seguridad->primer_nombre ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre: <span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="segundoNombre" name="segundoNombre"  value="<?=$seguridad->segundo_nombre ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="calle" name="calle"  value="<?=$seguridad->calle ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="exterior" name="exterior"  value="<?=$seguridad->numero_exterior ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="interior" name="interior"  value="<?=$seguridad->numero_interior ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="numero" name="numero"  value="<?=$seguridad->numero_telefono ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoSegPub" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="codigoSegPub" name="codigoSegPub"  value="">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoSegPub" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="coloniacodigoSegPub" name="coloniacodigoSegPub">
                                <option value="">Selecciona una Opcion</option>
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
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ingresoEmpPublic" class=" control-label">Ingreso:<span class="text-danger">*</span></label>
                        <div class="input-group date" id="ingresoEmpPublic" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#ingresoEmpPublic" id="datetime-ingresoEmpPublic" name="ingresoEmpPublic" placeholder="" value="" />
                            <div class="input-group-append" data-target="#ingresoEmpPublic" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
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
                        <label for="separacion" class=" control-label">Separación:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="separacion" name="separacion"  value="<?=$seguridad->separacion ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="puesto_funcional" class=" control-label">Puesto Funcional:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="puesto_funcional" name="puesto_funcional"  value="<?=$seguridad->funcional ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="funciones" class=" control-label">Funciones:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="funciones" name="funciones"  value="<?=$seguridad->funciones ?>">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especialidad" class=" control-label">Especialidad:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="especialidad" name="especialidad"  value="<?=$seguridad->especialidad ?>">
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rango" class=" control-label">Rango o categoría:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="rango" name="rango"  value="<?=$seguridad->rango ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero_placa" class=" control-label">Numero de placa:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="numero_placa" name="numero_placa"  value="<?=$seguridad->numero_placa ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero_empleado" class=" control-label">Numero de empleado :<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="numero_empleado" name="numero_empleado"  value=" <?=$seguridad->numero_empleado ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sueldo" class=" control-label">Sueldo Base (Mensual):<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="sueldo" name="sueldo"  value="<?=$seguridad->sueldo_base ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="compensaciones" class=" control-label">Compensaciones (Mensual):<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="compensaciones" name="compensaciones"  value="<?=$seguridad->compensacion ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="area" class=" control-label">Area:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="area" name="area"  value="<?=$seguridad->area ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="division" class=" control-label">División:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="division" name="division"  value="<?=$seguridad->division ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="jefe_inmediato" class=" control-label">CUIP Jefe Inmediato:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="jefe_inmediato" name="jefe_inmediato"  value="<?=$seguridad->cuip_jefe ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_jefe" class=" control-label">Nombre del Jefe Inmediato:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="nombre_jefe" name="nombre_jefe"  value="<?=$seguridad->nombre_jefe ?>">
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoSegPub" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="estadocodigoSegPub" name="estadocodigoSegPub">
                                <option value="">Selecciona una Opcion</option>
                                
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
                            <select class="form-control" id="municipiocodigoSegPub" name="municipiocodigoSegPub">
                                <option value="">Selecciona una Opcion</option>
                                
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
                        <input type="text"  class="form-control "  id="motivo_separacion" name="motivo_separacion"  value="<?=$seguridad->separacion ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_separacion" class=" control-label">Tipo de Separación:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="tipo_separacion" name="tipo_separacion"  value="<?=$seguridad->tipo_separacion ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tipo_baja" class=" control-label">Tipo de Baja:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="tipo_baja" name="tipo_baja"  value="<?=$seguridad->tipo_baja ?>">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="comentarios" class=" control-label">Comentarios:<span class="text-danger">*</span></label>
                        <input type="text"  class="form-control "  id="comentarios" name="comentarios"  value="<?=$seguridad->comentarios ?>">
                    </div>
                </div>
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
        var formData = new FormData($("form#EmpleoSeguridadPublica")[0]);
        formData.append('idPersonal', idPersonal);
        
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

                    toastr.success(response.succes.mensaje);

                    

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