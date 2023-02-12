<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS GENERALES</h3>

        <div class="card-tools">
            <input type="hidden" class="form-control " id="idPersonal" name="idPersonal"  >
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="DatosPersonales">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="razon_social" class="control-label">Razón Social: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="razon_social" name="razon_social"><?= csrf_field() ?>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_corto" class=" control-label">Nombre Corto: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nombre_corto" name="nombre_corto">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_contacto" class=" control-label">Nombre del contacto:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nombre_contacto" name="nombre_contacto">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="puesto_contacto" class=" control-label">Puesto del Contacto:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="puesto_contacto" name="puesto_contacto">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="whatsApp" class=" control-label">WhatsApp:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="whatsApp" name="whatsApp" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="telefono_oficina" class=" control-label">Teléfono Oficina:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="telefono_oficina" name="telefono_oficina" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-12'>
                    <div class="form-group">
                        <label for="email" class=" control-label">Email:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="email" name="email">
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_inicio_servicio">Fecha de Inicio Servicio: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="fecha_inicio_servicio" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_inicio_servicio" id="datetime-fecha_inicio_servicio" name="fecha_inicio_servicio" placeholder="" value="" />
                            <div class="input-group-append" data-target="#fecha_inicio_servicio" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#fecha_inicio_servicio").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6    '>
                    <div class="form-group">
                        <label for="fecha_fin_servicio" class=" control-label">Fecha Fin Servicio:</label>
                        <div class="input-group date" id="fecha_fin_servicio" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_fin_servicio" id="datetime-fecha_fin_servicio" name="fecha_fin_servicio" placeholder="" value="" />
                            <div class="input-group-append" data-target="#fecha_fin_servicio" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#fecha_fin_servicio").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS DEL DOMICILIO</h3>

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
                        <label for="calle" class=" control-label">Calle y Número:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="calle" name="calle">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigo" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="codigo" name="codigo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigo" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="coloniacodigo" name="coloniacodigo">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#coloniacodigo").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigo" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="municipiocodigo" name="municipiocodigo">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipiocodigo").select2({
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
                        <label for="ciudadcodigo" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="ciudadcodigo" name="ciudadcodigo">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ciudadcodigo").select2({
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
                        <label for="estadocodigo" class="control-label">Estado: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="estadocodigo" name="estadocodigo">
                                <option value="">Selecciona una Opcion</option>
                                
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estadocodigo").select2({
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
</div>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS FISCALES</h3>

        <div class="card-tools">
            <a href="#" class="btn btn-tool form-check-label">Mismos datos fiscales</a>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="form-check-input mt-2" id="btnNingunodged">
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
                        <label for="rfc" class=" control-label">R.F.C:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="rfc" name="rfc" maxlength="13">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calleFiscales" class=" control-label">Calle y Número:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="calleFiscales" name="calleFiscales">
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoDatosFis" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="codigoDatosFis" name="codigoDatosFis" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoDatosFis" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="coloniacodigoDatosFis" name="coloniacodigoDatosFis">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#coloniacodigoDatosFis").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="municipiocodigoDatosFis" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="municipiocodigoDatosFis" name="municipiocodigoDatosFis">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipiocodigoDatosFis").select2({
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
                        <label for="ciudadcodigoDatosFis" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="ciudadcodigoDatosFis" name="ciudadcodigoDatosFis">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ciudadcodigoDatosFis").select2({
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
                        <label for="estadocodigoDatosFis" class="control-label">Estado: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="estadocodigoDatosFis" name="estadocodigoDatosFis">
                                <option value="">Selecciona una Opcion</option>
                                
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estadocodigoDatosFis").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
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
            <button id="saveCliente" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" ></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>    
</div>
<script>
    
    $('#saveCliente').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        var formData = new FormData($("form#DatosPersonales")[0]);



        if($('#btnNingunodged').is(':checked')) {
            val = 1;
            
        } else {
            val = 0;
            
        }

        formData.append('datosFiscales', val);
        
        $.ajax({
            url: base_url + '/GuardarCliente',
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
                        window.location = base_url + '/clientes'; 
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


    $("#codigo").on('keyup', function(){
        getSepomex(this.id)
    });

    $("#codigoDatosFis").on('keyup', function(){
        getSepomex(this.id)
    });


    function getSepomex(id) {



        var elemento = id;
        
        var num = $('#'+elemento).val().length

        if (num === 5) {

            $('#load').addClass( "spinner-border" );

            let selectEstadoDom = document.querySelector("#estado"+elemento)

            let selectMunicipioDom = document.querySelector("#municipio"+elemento)
                
            let selectColoniaDom = document.querySelector("#colonia"+elemento)

            let selectCiudadDom = document.querySelector("#ciudad"+elemento)
            
              

                selectCiudadDom.innerHTML = ''
                selectColoniaDom.innerHTML = ''
                selectEstadoDom.innerHTML = ''
                selectMunicipioDom.innerHTML = ''
              
            
            

            $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

        
        var cp = $('#'+elemento).val()
        var csrfName = $("input[name=app_csrf]").val();
        
            var data    = {
                    cp : cp,
                    app_csrf: csrfName
                };

        $.ajax({
            url: base_url + '/getSepomex',
            type: 'POST',
            dataType: 'json',
            data: data,
            data: data,
            ache: false,
            async: true,
            success: function (response) {
                if(response.succes.succes === "succes"){

                        
                        selectCiudadDom.innerHTML = response.data.ciudad
                        selectColoniaDom.innerHTML = response.data.colonia
                    
                        selectEstadoDom.innerHTML = response.data.estado
                        selectMunicipioDom.innerHTML = response.data.municipio
                        
                
                    
                    
                }

                $('#load').removeClass( "spinner-border" );
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError') ?>');
                           
            }
        });

    }
    };


    $('#cliente').on('select2:select',
        function (e) {    
        
        $('#ubicacion').val(null).empty();
        var cliente = $('#cliente').val()
        var csrfName = $("input[name=app_csrf]").val();
        
            var data    = {
                    cliente : cliente,
                    app_csrf: csrfName
                };

        $.ajax({
            url: base_url + '/getUbicaciones',
            type: 'POST',
            dataType: 'json',
            data: data,
            data: data,
            ache: false,
            async: true,
            success: function (response) {
                if(response.succes.succes === "succes"){

                    $('#ubicacion').append(response.data.ubicaciones);
                        
                    
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


    $(document).on('click','#btnNingunodged',function(){ 

        if($('#btnNingunodged').is(':checked')) {


            $('#calleFiscales').attr('disabled','disabled');
            $('#codigoDatosFis').attr('disabled','disabled');
            $('#coloniacodigoDatosFis').attr('disabled','disabled');
            $('#municipiocodigoDatosFis').attr('disabled','disabled');
            $('#ciudadcodigoDatosFis').attr('disabled','disabled');
            $('#estadocodigoDatosFis').attr('disabled','disabled');
        } else {
            $('#calleFiscales').attr('disabled',false);
            $('#codigoDatosFis').attr('disabled',false);
            $('#coloniacodigoDatosFis').attr('disabled',false);
            $('#municipiocodigoDatosFis').attr('disabled',false);
            $('#ciudadcodigoDatosFis').attr('disabled',false);
            $('#estadocodigoDatosFis').attr('disabled',false);
        }
        
        
    });

</script>
<?= $this->endSection() ?>