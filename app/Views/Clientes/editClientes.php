<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status">
    </div>
    <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">EDITAR DATOS GENERALES</h3>

        <div class="card-tools">
            <input type="hidden" class="form-control " id="idPersonal" name="idPersonal">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="DatosPersonales">
            <div class="row">
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="razon_social" class="control-label">Razón Social: </label>
                        <div>
                        <input type="text"  class="form-control " disabled id="razon_social" name="razon_social"  value="<?= $cliente->razon_social ?>"><input type="hidden"  class="form-control " value =" <?=$id?> " id="id" name="id" ><?= csrf_field() ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_corto" class=" control-label">Nombre Corto: </label>
                        <div>
                        <input type="text"  class="form-control " disabled id="nombre_corto" name="nombre_corto" value="<?= $cliente->nombre_corto ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="nombre_contacto" class=" control-label">Nombre del contacto:</label>
                        <div>
                        <input type="text"  class="form-control " disabled id="nombre_contacto" name="V" value="<?= $cliente->nombre_contacto ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="puesto_contacto" class=" control-label">cliente del Contacto:</label>
                        <div>
                        <input type="text"  class="form-control " disabled id="puesto" name="puesto" value="<?= $cliente->puesto ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="whatsApp" class=" control-label">WhatsApp:</label>
                    <div>
                    <input type="text"  class="form-control " disabled id="whatsapp" name="whatsapp" value="<?= $cliente->whatsapp ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="telefono_oficina" class=" control-label">Teléfono Oficina:</label>
                        <div>
                        <input type="text"  class="form-control " disabled id="tel_oficina" name="tel_oficina" value="<?= $cliente->tel_oficina ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="email" class=" control-label">Email:</label>
                        <div>
                        <input type="text"  class="form-control " disabled id="email" name="email" value="<?= $cliente->email ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_inicio_servicio">Fecha de Inicio Servicio: </label>
                        <div class="input-group date" id="fecha_fin_servicio" data-target-input="nearest">
                        <input type="text"  class="form-control " disabled id="fecha_inicio" name="fecha_inicio" value="<?= $cliente->fecha_inicio ?>">

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
                        <input type="text"  class="form-control " disabled id="fecha_fin" name="fecha_fin" value="<?= $cliente->fecha_fin ?>">

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
                    <label for="calle" class=" control-label">Calle y Número:</label>
                    <div>
                    <input type="text"  class="form-control " disabled id="calle_num" name="calle_num" value="<?= $cliente->calle_num ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigo" class=" control-label">Código Postal :</label>
                    <div>
                    <input type="text"  class="form-control " disabled id="idCodigoPostal" name="idCodigoPostal" value="<?= $cliente->idCodigoPostal ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigo" class=" control-label">Colonia:</label>
                    <div>
                    <input type="text"  class="form-control " disabled id="colonia" name="colonia" value="<?= $cliente->colonia ?>">

                    </div>
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
                    <label for="municipiocodigo" class="control-label">Municipio: </label>
                    <div>
                    <input type="text"  class="form-control " disabled id="municipio" name="municipio" value="<?= $cliente->municipio ?>">

                        
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
                    <label for="ciudadcodigo" class="control-label">Ciudad: </label>
                    <div>
                    <input type="text"  class="form-control " disabled id="ciudad" name="ciudad" value="<?= $cliente->ciudad ?>">

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
                    <label for="estadocodigo" class="control-label">Estado: </label>
                    <div>
                    <input type="text"  class="form-control " disabled id="estado" name="estado" value="<?= $cliente->estado ?>">

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
                    <label for="rfc" class=" control-label">R.F.C:</label>
                    <div>
                    <input type="text"  class="form-control " disabled id="rfc" name="rfc" value="<?= $cliente->rfc ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="calleFiscales" class=" control-label">Calle y Número:</label>
                    <div>
                    <input type="text"  class="form-control " disabled id="calle_num_fiscal" name="calle_num_fiscal" value="<?= $cliente->calle_num_fiscal ?>">

                    </div>
                </div>
            </div>

            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigoDatosFis" class=" control-label">Código Postal :</label>
                    <div>
                    <input type="text"  class="form-control " disabled id="idCodigoPostal_fiscal" name="idCodigoPostal_fiscal" value="<?= $cliente->idCodigoPostal_fiscal ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigoDatosFis" class=" control-label">Colonia:</label>
                    <div>
                    <input type="text"  class="form-control " disabled id="colonia_fiscal" name="colonia_fiscal" value="<?= $cliente->colonia_fiscal ?>">

                    </div>
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
                    <label for="municipiocodigoDatosFis" class="control-label">Municipio: </label>
                    <div>
                    <input type="text"  class="form-control " disabled id="municipio_fiscal" name="municipio_fiscal" value="<?= $cliente->municipio_fiscal ?>">

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
                    <label for="ciudadcodigoDatosFis" class="control-label">Ciudad: </label>
                    <div>
                    <input type="text"  class="form-control " disabled id="ciudad_fiscal" name="ciudad_fiscal" value="<?= $cliente->ciudad_fiscal ?>">

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
                    <label for="estadocodigoDatosFis" class="control-label">Estado: </label>
                    <div>
                    <input type="text"  class="form-control " disabled id="estado_fiscal" name="estado_fiscal" value="<?= $cliente->estado_fiscal ?>">

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
            <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo:</label>
                        <div class="form-check" >
                            <input class="form-check-input"  type="checkbox" id="activo" name="activo" <?= ($cliente->activo == 1 ? 'checked' : '' ) ?>>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    <div class="card-footer bg-transparent clearfix">
        <div class="row">
            
            <div class="col-12 col-sm-6 col-md-3 ">    
                <button id="editCliente" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
            </div>
        </div>    
    </div>
</div>

<script>
     $('#editCliente').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );

        if($('#activo').is(':checked')) {
            val = 1;
        } else {
            val = 0;
        }
        var formData = new FormData($("form#frmMulticatalogo")[0]);
        formData.append('activo', val);

        $.ajax({
            url: base_url + '/EditInfoCliente',
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
                        window.location = base_url + '/clientes'; 
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