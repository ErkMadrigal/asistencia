<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS GENERALES: SOCIOECONÓMICO</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body  ">
        <form class="form-horizontal" id="SocioEconomico">
        <div class="row">
            
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="familia" class="control-label">¿Vive con su Familia?: <span class="text-danger">*</span></label>
                    <select class="form-control" id="familia" name="familia">
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
                                    $("#familia").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="ingreso" class=" control-label">Ingreso familiar adicional
                        (Mensual):<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="ingreso" name="ingreso"><?= csrf_field() ?>
                </div>
            </div>
            <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="domicilio_tipo" class="control-label">Su domicilio es: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="domicilio_tipo" name="domicilio_tipo">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($domicilio_tipo) ):
                                    foreach($domicilio_tipo as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#domicilio_tipo").select2({
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
                    <label for="actividad" class=" control-label">Actividades culturales o deportivas
                        que practique:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="actividad" name="actividad">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="especificacion" class=" control-label">Especifiación de inmueble y
                        costo:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="especificacion" name="especificacion">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="inversion" class=" control-label">Inversiones y monto
                        aproximado:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="inversion" name="inversion">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="vehiculo" class=" control-label">Vehiculo y costo Aproximado:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="vehiculo" name="vehiculo">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="calidad" class=" control-label">Calidad de Vida:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="calidad" name="calidad">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="vicio" class=" control-label">Vicios:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="vicio" name="vicio">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="imagen" class=" control-label">Imagen Publica:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="imagen" name="imagen">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="comportamiento" class=" control-label">Comportamiento Social:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="comportamiento" name="comportamiento">
                </div>
            </div>
        </div>
    </div>
</div>        
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS DEL CONYUGE Y DEPENDIENTES ECONÓMICOS</h3>

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
                        <label for="apellidoPaterno" class=" control-label">Apellido
                            Paterno:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="apellidoPaterno" name="apellidoPaterno">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido
                            Materno:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="apellidoMaterno" name="apellidoMaterno">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="primerNombre" name="primerNombre">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre:
                            <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="segundoNombre" name="segundoNombre">
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_nacimiento_dep">Fecha de Nacimiento: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="fecha_nacimiento_dep" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_nacimiento_dep" id="datetime-fecha_nacimiento_dep" name="fecha_nacimiento_dep" placeholder="" value="" />
                            <div class="input-group-append" data-target="#fecha_nacimiento_dep" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#fecha_nacimiento_dep").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_dep" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <select class="form-control" id="sexo_dep" name="sexo_dep">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($genero) ):
                                    foreach($genero as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#sexo_dep").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_familiar" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="parentesco_familiar" name="parentesco_familiar">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($parentesco_familiar) ):
                                    foreach($parentesco_familiar as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#parentesco_familiar").select2({
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
            <button id="saveSocioEconomico" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" ></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>    
</div>
<script>
    

    $('#saveSocioEconomico').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );

        var idPersonal = $('#idPersonal').val()
        var formData = new FormData($("form#SocioEconomico")[0]);
        formData.append('idPersonal', idPersonal);
        
        $.ajax({
            url: base_url + '/GuardarSocioEconomico',
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