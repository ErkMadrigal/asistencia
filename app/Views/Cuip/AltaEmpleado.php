<div class="card card-primary" id="cardRefFamCer">
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
        <form class="form-horizontal" id="referencias">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoPaterno" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="apellidoPaterno" name="apellidoPaterno">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
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
                        <label for="segundoNombre" class=" control-label">Segundo Nombre:</label>
                        <input type="text" class="form-control " id="segundoNombre" name="segundoNombre">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_fam_cer" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <select class="form-control" id="sexo_fam_cer" name="sexo_fam_cer">
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
                                    $("#sexo_fam_cer").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacion" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                        <select class="form-control" id="ocupacion" name="ocupacion">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($ocupacion) ):
                                    foreach($ocupacion as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ocupacion").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_fam_cercano" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="parentesco_fam_cercano" name="parentesco_fam_cercano">
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
                                    $("#parentesco_fam_cercano").select2({
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
                        <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="calle" name="calle">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="exterior" name="exterior">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:</label>
                        <input type="text" class="form-control " id="interior" name="interior">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoRefCer" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="coloniacodigoRefCer" name="coloniacodigoRefCer">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#coloniacodigoRefCer").select2({
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

<div class="card card-primary" id="cardrefParCer">
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
                        <label for="sexo_par_cer" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <select class="form-control" id="sexo_par_cer" name="sexo_par_cer">
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
                                    $("#sexo_par_cer").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calleParCer" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="calleParCer" name="calleParCer">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exteriorParCer" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="exteriorParCer" name="exteriorParCer">
                    </div>
                </div>
                          
                
              
                            
            </div>
        
    </div>
</div>

<div class="card card-primary" id="cardRefPersonal">
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
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoPaternoRefPer" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="apellidoPaternoRefPer" name="apellidoPaternoRefPer">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaternoRefPer" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="apellidoMaternoRefPer" name="apellidoMaternoRefPer">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombreRefPer" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="primerNombreRefPer" name="primerNombreRefPer">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombreRefPer" class=" control-label">Segundo Nombre:</label>
                        <input type="text" class="form-control " id="segundoNombreRefPer" name="segundoNombreRefPer">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_per" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <select class="form-control" id="sexo_per" name="sexo_per">
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
                                $("#sexo_per").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                });
                            });
                         </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ocupacionRefPer" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                        <select class="form-control" id="ocupacionRefPer" name="ocupacionRefPer">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($ocupacion) ):
                                    foreach($ocupacion as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ocupacionRefPer").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_personal" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="parentesco_personal" name="parentesco_personal">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($parentesco_personal) ):
                                    foreach($parentesco_personal as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#parentesco_personal").select2({
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
                        <label for="calleRefPer" class=" control-label">Calle :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="calleRefPer" name="calleRefPer">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exteriorRefPer" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="exteriorRefPer" name="exteriorRefPer">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interiorRefPer" class=" control-label">No. Interior:</label>
                        <input type="text" class="form-control " id="interiorRefPer" name="interiorRefPer">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoPersonal" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="coloniacodigoPersonal" name="coloniacodigoPersonal">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#coloniacodigoPersonal").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoPersonal" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="codigoPersonal" name="codigoPersonal" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numeroRefPer" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="numeroRefPer" name="numeroRefPer" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10">
                    </div>
                </div> 
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="paisRefPer" class="control-label">Pais: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="paisRefPer" name="paisRefPer">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($pais) ):
                                    foreach($pais as  $a){
                                        ?>
                                            <option <?= ($a->valor == 'México' ? 'selected' : '' ) ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#paisRefPer").select2({
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
                        <label for="estadocodigoPersonal" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="estadocodigoPersonal" name="estadocodigoPersonal">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($entidad_federativa) ):
                                    foreach($entidad_federativa as  $a){
                                        ?>
                                            <option value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estadocodigoPersonal").select2({
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
                        <label for="municipiocodigoPersonal" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="municipiocodigoPersonal" name="municipiocodigoPersonal">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipiocodigoPersonal").select2({
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
                        <label for="ciudadcodigoPersonal" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="ciudadcodigoPersonal" name="ciudadcodigoPersonal">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ciudadcodigoPersonal").select2({
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


<div class="card-footer bg-transparent clearfix">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9">
            
        </div>
        <div class="col-12 col-sm-6 col-md-3 ">    
            <button id="saveReferencias"  class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" ></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>    
</div>
<script>

    $("#codigoRefCer").on('keyup', function(){
        getSepomex(this.id)
    });

    $("#codigoParCer").on('keyup', function(){
        getSepomex(this.id)
    });

    $("#codigoPersonal").on('keyup', function(){
        getSepomex(this.id)
    });

    $("#codigoLaboral").on('keyup', function(){
        getSepomex(this.id)
    });

    $("#estadocodigoRefCer").on('change', function(){
        getEstado(this.id)
    });

    $("#estadocodigoParCer").on('change', function(){
        getEstado(this.id)
    });

    $("#estadocodigoPersonal").on('change', function(){
        getEstado(this.id)
    });

    $("#estadocodigoLaboral").on('change', function(){
        getEstado(this.id)
    });


    $('#saveReferencias').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );

        var idPersonal = $('#idPersonal').val()
        var csrfName = $("input[name=app_csrf]").val();
        var formData = new FormData($("form#referencias")[0]);
        formData.append('idPersonal', idPersonal);
        formData.append('app_csrf', csrfName);
        
        $.ajax({
            url: base_url + '/GuardarReferencias',
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

                    $('#saveReferencias').addClass( "btn-success" );
                    $('#saveReferencias').prop( "disabled",true );
                    $('#saveReferencias').html( "Guardado&nbsp;<i class='fa fa-thumbs-up'></i>" );

                    $("html,body").animate({scrollTop: $("#CardGenerales").offset().top},2000);

                    $('#tabs a[href="#custom-tabs-five-overlay-dark"]').trigger('click');

                    

                } else if (response.dontsucces.error == 'error'){

                    toastr.error(response.dontsucces.mensaje);
                            
                } else if (Object.keys(response.error).length > 0 ){

                    for (var clave in response.error){
                                
                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardRefFamCer #"+clave+"" );

                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardrefParCer #"+clave+"" );

                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardRefPersonal #"+clave+"" );

                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#cardRefLaboral #"+clave+"" );
                            
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