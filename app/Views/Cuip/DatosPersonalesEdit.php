<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS PERSONALES</h3>

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
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="primerNombre" name="primerNombre" value="<?= $variable->primer_nombre ?>"><input type="hidden" class="form-control " value=" <?= isset($variable->primer_nombre) ? $variable->primer_nombre : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre:</label>
                        <div>
                            <input type="text" class="form-control " id="segundoNombre" name="segundoNombre" value="   <?= $variable->segundo_nombre ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->segundo_nombre) ? $variable->segundo_nombre : ''  ?> " id="id" name="id"><?= csrf_field() ?>


                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoPaterno" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="apellidoPaterno" name="apellidoPaterno" value="<?= $variable->apellido_paterno ?>"><input type="hidden" class="form-control " value="   <?= isset($variable->apellido_paterno) ? $variable->apellido_paterno : ''  ?>" id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="apellidoMaterno" name="apellidoMaterno" value="<?= $variable->apellido_materno ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->apellido_materno) ? $variable->apellido_materno : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_nacimiento">Fecha de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="fecha_nacimiento" name="fecha_nacimiento" value="<?= $variable->fecha_nacimiento ?>">

                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#fecha_nacimiento").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <select id="sexo" name="sexo" class="form-control" >
                                <!--<option selected value="<?=$variable->sexo?>"><?=$variable->sexo?></option>-->
                                <?php foreach($variable as $sexo => $valor):?>
                                    <option value="<?=$variable->sexo?>"><?=$variable->sexo?></option>
                                <?php endforeach;?>
                            </select>
                        <script>
                            $(document).ready(function() {
                                $("#sexo").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rfc" class=" control-label">R.F.C.:<span class="text-danger">*</span></label>
                        <div>

                            <input type="text" class="form-control " id="rfc" name="rfc" value="<?= $variable->rfc ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->rfc) ? $variable->rfc : ''  ?> " id="id" name="id"><?= csrf_field() ?>


                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="claveE" class=" control-label">Clave Electoral:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="claveE" name="claveE" value="<?= $variable->clave_electoral ?>"><input type="hidden" class="form-control " value=" <?= isset($variable->clave_electoral) ? $variable->clave_electoral : ''  ?>" id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cartilla" class=" control-label">Cartilla SMN:<span class="text-danger">*</span></label>
                        <div>

                            <input type="text" class="form-control " id="cartilla" name="cartilla" value=" <?= $variable->cartilla_smn ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->cartilla_smn) ? $variable->cartilla_smn : ''  ?> " id="id" name="id"><?= csrf_field() ?>


                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="licencia" class=" control-label">Licencia de Conducir:</label>
                        <div>
                            <input type="text" class="form-control " id="licencia" name="licencia" value="<?= $variable->licencia_conducir ?>"><input type="hidden" class="form-control " value=" <?= isset($variable->licencia_conducir) ? $variable->licencia_conducir : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6    '>
                    <div class="form-group">
                        <label for="vigenciaLic" class=" control-label">Vigencia de Licencia:</label>
                        <div>
                            <input type="text" class="form-control " id="vigenciaLic" name="vigenciaLic" value="<?= $variable->vigencia_licencia ?>">

                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#vigenciaLic").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="CURP" class=" control-label">CURP:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="CURP" name="CURP" value="<?= $variable->curp ?>"><input type="hidden" class="form-control " value="   <?= isset($variable->curp) ? $variable->curp : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="pasaporte" class=" control-label">Pasaporte:</label>
                        <div>
                            <input type="text" class="form-control " id="pasaporte" name="pasaporte" value="<?= $variable->pasaporte ?>"><input type="hidden" class="form-control " value="   <?= isset($variable->pasaporte) ? $variable->pasaporte : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="modo_nacionalidad" class="control-label">Modo de Nacionalidad: <span class="text-danger">*</span></label>
                        <div>
                        <select id="modo_nacionalidad" name="modo_nacionalidad" class="form-control" >
                              <!--  <option selected value="<?=$variable->nacionalidad?>"><?=$variable->nacionalidad?></option>-->
                                <?php foreach($variable as $nacionalidad => $valor):?>
                                    <option value="<?=$variable->nacionalidad?>"><?=$variable->nacionalidad?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#modo_nacionalidad").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_naturalizacion">Fecha de Naturalización: <span class="text-danger">*</span></label>
                        <div>
                        <select id="fecha_naturalizacion" name="fecha_naturalizacion" class="form-control" >
                                <!--<option selected value="<?=$variable->fecha_naturalizacion?>"><?=$variable->fecha_naturalizacion?></option>-->
                                <?php foreach($variable as $fecha_naturalizacion => $valor):?>
                                    <option value="<?=$variable->fecha_naturalizacion?>"><?=$variable->fecha_naturalizacion?></option>
                                <?php endforeach;?>
                            </select>
                        <script type="text/javascript">
                            $(function() {
                                $("#fecha_naturalizacion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="pais_nacimiento" class="control-label">Pais de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                        <select id="pais_nacimiento" name="pais_nacimiento" class="form-control" >
                                <!--<option selected value="<?=$variable->pais?>"><?=$variable->pais?></option>-->
                                <?php foreach($variable as $pais => $valor):?>
                                    <option value="<?=$variable->pais?>"><?=$variable->pais?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#pais_nacimiento").select2({
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
                        <label for="entidad_nacimiento" class="control-label">Entidad de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                        <select id="entidad_nacimiento" name="entidad_nacimiento" class="form-control" >
                                <!--<option selected value="<?=$variable->naciE?>"><?=$variable->naciE?></option>-->
                                <?php foreach($variable as $naciE => $valor):?>
                                    <option value="<?=$variable->naciE?>"><?=$variable->naciE?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#entidad_nacimiento").select2({
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
                        <label for="nacionalidad" class="control-label">Nacionalidad: <span class="text-danger">*</span></label>
                        <div>
                        <select id="nacionalidad" name="nacionalidad" class="form-control" >
                                <!--<option selected value="<?=$variable->nacion?>"><?=$variable->nacion?></option>-->
                                <?php foreach($variable as $nacion => $valor):?>
                                    <option value="<?=$variable->nacion?>"><?=$variable->nacion?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#nacionalidad").select2({
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
                        <label for="municipio_nacimiento" class="control-label">Municipio de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                        <select id="municipio_nacimiento" name="municipio_nacimiento" class="form-control" >
                                <!--<option selected value="<?=$variable->municipio?>"><?=$variable->municipio?></option>-->
                                <?php foreach($variable as $municipio => $valor):?>
                                    <option value="<?=$variable->municipio?>"><?=$variable->municipio?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipio_nacimiento").select2({
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
                        <label for="cuidad_nacimiento" class="control-label">Cuidad de Nacimiento: <span class="text-danger">*</span></label>
                        <div>
                        <select id="cuidad_nacimiento" name="cuidad_nacimiento" class="form-control" >
                               <!-- <option selected value="<?=$variable->ciudad?>"><?=$variable->ciudad?></option>-->
                                <?php foreach($variable as $ciudad => $valor):?>
                                    <option value="<?=$variable->ciudad?>"><?=$variable->ciudad?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#cuidad_nacimiento").select2({
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
                        <label for="estado_civil" class="control-label">Estado Civil: <span class="text-danger">*</span></label>
                        <div>
                        <select id="estado_civil" name="estado_civil" class="form-control" >
                                <!--<option selected value="<?=$variable->civil?>"><?=$variable->civil?></option>-->
                                <?php foreach($variable as $civil => $valor):?>
                                    <option value="<?=$variable->civil?>"><?=$variable->civil?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estado_civil").select2({
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
                        <label for="desarrollo_academico" class="control-label">Desarrollo Académico: <span class="text-danger">*</span></label>
                        <div>
                        <select id="desarrollo_academico" name="desarrollo_academico" class="form-control" >
                                <!--<option selected value="<?=$variable->desarrollo_academico?>"><?=$variable->desarrollo_academico?></option>-->
                                <?php foreach($variable as $desarrollo_academico => $valor):?>
                                    <option value="<?=$variable->desarrollo_academico?>"><?=$variable->desarrollo_academico?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#desarrollo_academico").select2({
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
                        <label for="escuela" class=" control-label">Escuela :<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="escuela" name="escuela" value="<?= $variable->escuela ?>"><input type="hidden" class="form-control " value=" <?= isset($variable->escuela) ? $variable->escuela : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especialidad" class=" control-label">Especialidad o Estudio :<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="especialidad" name="especialidad" value="<?= $variable->especialidad ?>"><input type="hidden" class="form-control " value="   <?= isset($variable->especialidad) ? $variable->especialidad : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cedula" class=" control-label">No. Cédula Profesional:</label>
                        <div>
                            <input type="text" class="form-control " id="cedula" name="cedula" value="<?= $variable->cedula_profesional ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->cedula_profesional) ? $variable->cedula_profesional : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="anno_inicio">Año de Inicio: <span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="anno_inicio" name="anno_inicio" value="<?= $variable->año_inicio ?>">

                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#anno_inicio").datetimepicker({
                                    format: 'YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="anno_termino">Año de Termino: <span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="anno_termino" name="anno_termino" value="<?= $variable->año_termino ?>">

                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#anno_termino").datetimepicker({
                                    format: 'YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sep" class=" control-label">Registro SEP:<span class="text-danger">*</span></label>
                        <div>
                        <select id="sep" name="sep" class="form-control" >
                                <!--<option selected value="<?=$variable->registro_sep?>"><?=$variable->registro_sep?></option>-->
                                <?php foreach($variable as $registro_sep => $valor):?>
                                    <option value="<?=$variable->registro_sep?>"><?=$variable->registro_sep?></option>
                                <?php endforeach;?>
                            </select>
                        <script>
                            $(document).ready(function() {
                                $("#registroSep").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="certificado" class=" control-label">Num. de Folio Certificado :<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="certificado" name="certificado" value="<?= $variable->folio_certificado ?>"><input type="hidden" class="form-control " value=" <?= isset($variable->folio_certificado) ? $variable->folio_certificado : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="promedio" class=" control-label">Promedio :<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="promedio" name="promedio" value="<?= $variable->institucion ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->folio_certificado) ? $variable->folio_certificado : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                        </div>
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
            <div class='col-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label for="calle" class=" control-label">Calle :<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="calle" name="calle" value="<?= $variable->calle ?>"><input type="hidden" class="form-control " value=" <?= isset($variable->calle) ? $variable->calle : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="exterior" name="exterior" value="<?= $variable->numero_exterior ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->numero_exterior) ? $variable->numero_exterior : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="interior" class=" control-label">No. Interior:</label>
                    <div>
                        <input type="text" class="form-control " id="interior" name="interior" value="<?= $variable->numero_interior ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->numero_interior) ? $variable->numero_interior : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="numeroTelefono" class=" control-label">Numero
                        Telefónico:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="numeroTelefono" name="numeroTelefono" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?= $variable->numero_telefono ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->numero_telefono) ? $variable->numero_telefono : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="entrecalle" class=" control-label">Entre la calle
                        de:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="entrecalle" name="entrecalle" value="<?= $variable->entre_calle1 ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->entre_calle1) ? $variable->entre_calle1 : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="ylacalle" class=" control-label">Y la calle :<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="ylacalle" name="ylacalle" value="<?= $variable->entre_calle2 ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->entre_calle2) ? $variable->entre_calle2 : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigo" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="codigo" name="codigo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" value="<?= $variable->postal ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->postal) ? $variable->postal : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigo" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                    <select id="coloniacodigo" name="coloniacodigo" class="form-control" >
                                <!--<option selected value="<?=$variable->colonia?>"><?=$variable->colonia?></option>-->
                                <?php foreach($variable as $colonia => $valor):?>
                                    <option value="<?=$variable->colonia?>"><?=$variable->colonia?></option>
                                <?php endforeach;?>
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
                    <label for="estadocodigo" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                    <div>
                    <select id="estadocodigo" name="estadocodigo" class="form-control" >
                               <!-- <option selected value="<?=$variable->naciE?>"><?=$variable->naciE?></option>-->
                                <?php foreach($variable as $naciE => $valor):?>
                                    <option value="<?=$variable->naciE?>"><?=$variable->naciE?></option>
                                <?php endforeach;?>
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
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="municipiocodigo" class="control-label">Municipio: <span class="text-danger">*</span></label>
                    <div>
                    <select id="municipiocodigo" name="municipiocodigo" class="form-control" >
                               <!-- <option selected value="<?=$variable->municipio?>"><?=$variable->municipio?></option>-->
                                <?php foreach($variable as $municipio => $valor):?>
                                    <option value="<?=$variable->municipio?>"><?=$variable->municipio?></option>
                                <?php endforeach;?>
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
                    <select id="ciudadcodigo" name="ciudadcodigo" class="form-control" >
                               <!-- <option selected value="<?=$variable->ciudad?>"><?=$variable->ciudad?></option>-->
                                <?php foreach($variable as $ciudad => $valor):?>
                                    <option value="<?=$variable->ciudad?>"><?=$variable->ciudad?></option>
                                <?php endforeach;?>
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
        </div>
        </form>
    </div>
</div>


<div class="card card-primary">
    <div class="card-header ">

        <h3 class="card-title">DATOS GENERALES: EXPERIENCIA DOCENTE</h3>


        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunodged">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-dged" id="btnAdddged">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="FormDatosGeneralesDocente">
            <div id="CardDatosGeneralesDocente">
                <div class="row form-block-dged">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="nombrecurso" class=" control-label">Nombre del Curso
                                :<span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control " id="nombre_curso" name="nombre_curso" value="<?= $variable->institucion ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->institucion) ? $variable->institucion : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="nombreInstitucion" class=" control-label">Nombre de
                                la Institución:<span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control " id="nombreInstitucion" name="nombreInstitucion" value="<?= $variable->institucion ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->institucion) ? $variable->institucion : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="fecha_inicial">Fecha de Inicio: <span class="text-danger">*</span></label>
                            <div>

                            <select id="ciudadcodigo" name="ciudadcodigo" class="form-control" >
                               <!-- <option selected value="<?=$variable->institucion?>"><?=$variable->institucion?></option>-->
                                <?php foreach($variable as $institucion => $valor):?>
                                    <option value="<?=$variable->institucion?>"><?=$variable->institucion?></option>
                                <?php endforeach;?>
                            </select>
                                
                            <script type="text/javascript">
                                $(function() {
                                    $("#fecha_inicial").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    </div>
                    <div class='col-12 col-sm-6'>
                        <div class='form-group'>
                            <label for="fecha_final">Fecha de Término: <span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control " id="fecha_final" name="fecha_final" value="<?= $variable->institucion  ?>">

                            </div>
                            <script type="text/javascript">
                                $(function() {
                                    $("#fecha_final").datetimepicker({
                                        format: "DD-MM-YYYY",
                                        locale: moment.locale('es')

                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-12'>
                        <div class="form-group">
                            <label for="certificado_por" class=" control-label">Certificado
                                por:<span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control " id="certificado" name="certificado" value="<?= $variable->institucion ?>"><input type="hidden" class="form-control " value="  <?= isset($variable->institucion) ? $variable->institucion : ''  ?> " id="id" name="id"><?= csrf_field() ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-3 mb-3" />
            <div id="CardDatosGeneralesDocenteB">
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">ADSCRIPCION</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="FormAdscripcion">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="dependencia_adscripcion" class=" control-label">Dependencia:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="dependencia_adscripcion" name="dependencia_adscripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="institucion_adscripcion" class=" control-label">Institución:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="institucion_adscripcion" name="institucion_adscripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fechaingreso_adscripcion">Fecha de Ingreso: <span class="text-danger">*</span></label>
                        <div class="input-group date" id="fechaingreso_adscripcion" data-target-input="nearest">
                            <input type="text" required class="form-control datetimepicker-input" data-target="#fechaingreso_adscripcion" id="datetime-fechaingreso_adscripcion" name="fechaingreso_adscripcion" placeholder="" value="" />
                            <div class="input-group-append" data-target="#fechaingreso_adscripcion" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $("#fechaingreso_adscripcion").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="puesto_adscripcion" class=" control-label">Puesto:<span class="text-danger">*</span></label>
                        <select class="form-control" id="puesto_adscripcion" name="puesto_adscripcion">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($puesto)) :
                                foreach ($puesto as  $a) {
                            ?>
                                    <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#puesto_adscripcion").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rango_adscripcion" class=" control-label">Rango o Categoria:<span class="text-danger">*</span></label>
                        <select class="form-control" id="rango_adscripcion" name="rango_adscripcion">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($rango)) :
                                foreach ($rango as  $a) {
                            ?>
                                    <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#rango_adscripcion").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nivel_adscripcion" class=" control-label">Nivel de Mando:<span class="text-danger">*</span></label>
                        <select class="form-control" id="nivel_adscripcion" name="nivel_adscripcion">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($mando)) :
                                foreach ($mando as  $a) {
                            ?>
                                    <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#nivel_adscripcion").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombrejefe_adscripcion" class=" control-label">Nombre del jefe inmediato:<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="nombrejefe_adscripcion" name="nombrejefe_adscripcion">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entidad_adscripcion" class=" control-label">Entidad Federativa:<span class="text-danger">*</span></label>
                        <select class="form-control" id="entidad_adscripcion" name="entidad_adscripcion">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($entidad_federativa)) :
                                foreach ($entidad_federativa as  $a) {
                            ?>
                                    <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#entidad_adscripcion").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="municipio_adscripcion" class=" control-label">Municipio:<span class="text-danger">*</span></label>
                        <select class="form-control" id="municipio_adscripcion" name="municipio_adscripcion">
                            <option value="">Selecciona una Opcion</option>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#municipio_adscripcion").select2({
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
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">ADSCRIPCION: DOMICILIO DE ADSCRIPCION</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div class="row">
            <div class='col-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label for="calle_adscripcion" class=" control-label">Calle:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="calle_adscripcion" name="calle_adscripcion">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="exterior_adscripcion" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="exterior_adscripcion" name="exterior_adscripcion">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="interior_adscripcion" class=" control-label">No. Interior:</label>
                    <input type="text" class="form-control " id="interior_adscripcion" name="interior_adscripcion">
                </div>
            </div>

            <div class='col-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label for="entrecalle_adscripcion" class=" control-label">Entre la calle de:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="entrecalle_adscripcion" name="entrecalle_adscripcion">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label for="ylacalle_adscripcion" class=" control-label">Y la calle:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="ylacalle_adscripcion" name="ylacalle_adscripcion">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="telefono_adscripcion" class=" control-label">Número Telefonico:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="telefono_adscripcion" name="telefono_adscripcion" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigoAds" class=" control-label">Código Postal:<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="codigoAds" name="codigoAds" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigoAds" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                    <select class="form-control" id="coloniacodigoAds" name="coloniacodigoAds">
                        <option value="">Selecciona una Opcion</option>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#coloniacodigoAds").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="federativa_adscripcion" class=" control-label">Entidad Federativa:<span class="text-danger">*</span></label>
                    <select class="form-control" id="federativa_adscripcion" name="federativa_adscripcion">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($entidad_federativa)) :
                            foreach ($entidad_federativa as  $a) {
                        ?>
                                <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#federativa_adscripcion").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="delegacion_adscripcion" class=" control-label">Municipio o Delegación:<span class="text-danger">*</span></label>
                    <select class="form-control" id="delegacion_adscripcion" name="delegacion_adscripcion">
                        <option value="">Selecciona una Opcion</option>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#delegacion_adscripcion").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="ciudadcodigoAds" class=" control-label">Ciudad o Poblacion:<span class="text-danger">*</span></label>
                    <select class="form-control" id="ciudadcodigoAds" name="ciudadcodigoAds">
                        <option value="">Selecciona una Opcion</option>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#ciudadcodigoAds").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
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
            <button id="saveDatosPersonales" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>
</div>
<script>
    $('#saveDatosPersonales').click(function(event) {
        event.preventDefault();


        $('#load').addClass("spinner-border");

        var formData = new FormData($("form#DatosPersonales")[0]);

        if ($('#btnNingunodged').is(':checked')) {
            val = 1;

        } else {
            val = 0;

            var formDataB = new FormData($("form#FormDatosGeneralesDocente")[0]);


            for (let [key, value] of formDataB.entries()) {
                formData.append(key, value);
            }

        }

        var formDataC = new FormData($("form#FormAdscripcion")[0]);


        for (let [key, value] of formDataC.entries()) {
            formData.append(key, value);
        }

        formData.append('expDocente', val);



        $.ajax({
            url: base_url + '/GuardarDatosPersonales',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function(response) {
                $('.errorField').remove();

                if (response.succes.succes == 'succes') {

                    $('#idPersonal').val(response.data.idPersonal);
                    toastr.success(response.succes.mensaje);

                    $('#saveDatosPersonales').addClass("btn-success");
                    $('#saveDatosPersonales').prop("disabled", true);
                    $('#saveDatosPersonales').html("Guardado&nbsp;<i class='fa fa-thumbs-up'></i>");

                    $("html,body").animate({
                        scrollTop: $("#cardRefFamCer").offset().top
                    }, 2000);

                    $('#tabs a[href="#custom-tabs-five"]').trigger('click');

                } else if (response.dontsucces.error == 'error') {

                    toastr.error(response.dontsucces.mensaje);

                } else if (Object.keys(response.error).length > 0) {

                    for (var clave in response.error) {

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#" + clave + "");

                    }
                    toastr.error('<?= lang('Layout.camposObligatorios') ?>');



                }

                $('#load').removeClass("spinner-border");


            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('<?= lang('Layout.toastrError') ?>');
                $('#load').removeClass("spinner-border");
            }
        });

    });



    $("#entidad_nacimiento").on('change', function() {
        getEstado(this.id)
    });

    $("#estadocodigo").on('change', function() {
        getEstado(this.id)
    });

    $("#entidad_adscripcion").on('change', function() {
        getEstado(this.id)
    });

    $("#federativa_adscripcion").on('change', function() {
        getEstado(this.id)
    });



    function getEstado(id) {

        $('#load').addClass("spinner-border");

        var elemento = id;

        var estado = $('#' + elemento).val();


        switch (elemento) {
            case "entidad_nacimiento":

                var selectCiudadDom = document.querySelector("#cuidad_nacimiento")

                var selectMunicipioDom = document.querySelector("#municipio_nacimiento")

                selectCiudadDom.innerHTML = ''
                selectMunicipioDom.innerHTML = ''
                break;
            case "estadocodigo":


                var selectMunicipioDom = document.querySelector("#municipiocodigo")


                selectMunicipioDom.innerHTML = ''
                break;
            case "estadocodigoRefCer":


                var selectMunicipioDom = document.querySelector("#municipiocodigoRefCer")


                selectMunicipioDom.innerHTML = ''
                break;
            case "estadocodigoParCer":


                var selectMunicipioDom = document.querySelector("#municipiocodigoParCer")


                selectMunicipioDom.innerHTML = ''
                break;
            case "estadocodigoPersonal":


                var selectMunicipioDom = document.querySelector("#municipiocodigoPersonal")


                selectMunicipioDom.innerHTML = ''
                break;
            case "estadocodigoLaboral":


                var selectMunicipioDom = document.querySelector("#municipiocodigoLaboral")


                selectMunicipioDom.innerHTML = ''
                break;
            case "entidad_adscripcion":


                var selectMunicipioDom = document.querySelector("#municipio_adscripcion")


                selectMunicipioDom.innerHTML = ''
                break;
            case "federativa_adscripcion":


                var selectMunicipioDom = document.querySelector("#delegacion_adscripcion")


                selectMunicipioDom.innerHTML = ''
                break;


        }


        var csrfName = $("input[name=app_csrf]").val();

        var data = {
            estado: estado,
            app_csrf: csrfName
        };

        $.ajax({
            url: base_url + '/getCiudadEstado',
            type: 'POST',
            dataType: 'json',
            data: data,
            data: data,
            ache: false,
            async: true,
            success: function(response) {
                if (response.succes.succes === "succes") {


                    switch (elemento) {
                        case "entidad_nacimiento":


                            selectCiudadDom.innerHTML = response.data.ciudad
                            selectMunicipioDom.innerHTML = response.data.municipio
                            break;
                        case "estadocodigo":


                            selectMunicipioDom.innerHTML = response.data.municipio
                            break;
                        case "estadocodigoRefCer":


                            selectMunicipioDom.innerHTML = response.data.municipio
                            break;
                        case "estadocodigoParCer":


                            selectMunicipioDom.innerHTML = response.data.municipio
                            break;
                        case "estadocodigoPersonal":


                            selectMunicipioDom.innerHTML = response.data.municipio
                            break;
                        case "estadocodigoLaboral":


                            selectMunicipioDom.innerHTML = response.data.municipio
                            break;
                        case "entidad_adscripcion":


                            selectMunicipioDom.innerHTML = response.data.municipio
                            break;
                        case "federativa_adscripcion":


                            selectMunicipioDom.innerHTML = response.data.municipio
                            break;

                    }

                }

                $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

                $('#load').removeClass("spinner-border");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#load').removeClass("spinner-border");
                toastr.error('<?= lang('Layout.toastrError') ?>');

            }
        });
    };



    $("#codigo").on('keyup', function() {
        getSepomex(this.id)
    });

    $("#codigoAds").on('keyup', function() {
        getSepomex(this.id)
    });


    function getSepomex(id) {



        var elemento = id;

        var num = $('#' + elemento).val().length

        if (num === 5) {

            $('#load').addClass("spinner-border");

            let selectEstadoDom = document.querySelector("#estado" + elemento)

            let selectMunicipioDom = document.querySelector("#municipio" + elemento)

            let selectColoniaDom = document.querySelector("#colonia" + elemento)

            switch (elemento) {
                case "codigo":

                    var selectCiudadDom = document.querySelector("#ciudad" + elemento)

                    selectCiudadDom.innerHTML = ''
                    selectColoniaDom.innerHTML = ''
                    break;
                case "codigoSegPub":


                    selectEstadoDom.innerHTML = ''
                    selectMunicipioDom.innerHTML = ''
                    selectColoniaDom.innerHTML = ''
                    break;
                case "codigoEmpDiv":


                    selectEstadoDom.innerHTML = ''
                    selectMunicipioDom.innerHTML = ''
                    selectColoniaDom.innerHTML = ''
                    break;
                case "codigoRefCer":

                    var selectCiudadDom = document.querySelector("#ciudad" + elemento)


                    selectCiudadDom.innerHTML = ''
                    selectColoniaDom.innerHTML = ''
                    break;
                case "codigoParCer":

                    var selectCiudadDom = document.querySelector("#ciudad" + elemento)


                    selectCiudadDom.innerHTML = ''
                    selectColoniaDom.innerHTML = ''
                    break;
                case "codigoPersonal":

                    var selectCiudadDom = document.querySelector("#ciudad" + elemento)


                    selectCiudadDom.innerHTML = ''
                    selectColoniaDom.innerHTML = ''
                    break;
                case "codigoLaboral":

                    var selectCiudadDom = document.querySelector("#ciudad" + elemento)


                    selectCiudadDom.innerHTML = ''
                    selectColoniaDom.innerHTML = ''
                    break;
                case "codigoAds":
                    var selectCiudadDom = document.querySelector("#ciudad" + elemento)
                    selectCiudadDom.innerHTML = ''
                    selectColoniaDom.innerHTML = ''
                    break;

            }


            $("input[name=app_csrf]").val('<?= csrf_hash() ?>');


            var cp = $('#' + elemento).val()
            var csrfName = $("input[name=app_csrf]").val();

            var data = {
                cp: cp,
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
                success: function(response) {
                    if (response.succes.succes === "succes") {

                        switch (elemento) {
                            case "codigo":


                                selectCiudadDom.innerHTML = response.data.ciudad
                                selectColoniaDom.innerHTML = response.data.colonia
                                break;
                            case "codigoSegPub":

                                selectEstadoDom.innerHTML = response.data.estado
                                selectMunicipioDom.innerHTML = response.data.municipio

                                selectColoniaDom.innerHTML = response.data.colonia


                                break;
                            case "codigoEmpDiv":

                                selectEstadoDom.innerHTML = response.data.estado
                                selectMunicipioDom.innerHTML = response.data.municipio

                                selectColoniaDom.innerHTML = response.data.colonia


                                break;
                            case "codigoRefCer":


                                selectCiudadDom.innerHTML = response.data.ciudad
                                selectColoniaDom.innerHTML = response.data.colonia
                                break;
                            case "codigoParCer":


                                selectCiudadDom.innerHTML = response.data.ciudad
                                selectColoniaDom.innerHTML = response.data.colonia
                                break;
                            case "codigoPersonal":


                                selectCiudadDom.innerHTML = response.data.ciudad
                                selectColoniaDom.innerHTML = response.data.colonia
                                break;
                            case "codigoLaboral":


                                selectCiudadDom.innerHTML = response.data.ciudad
                                selectColoniaDom.innerHTML = response.data.colonia
                                break;
                            case "codigoAds":


                                selectCiudadDom.innerHTML = response.data.ciudad
                                selectColoniaDom.innerHTML = response.data.colonia
                                break;

                        }


                    }

                    $('#load').removeClass("spinner-border");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#load').removeClass("spinner-border");
                    toastr.error('<?= lang('Layout.toastrError') ?>');

                }
            });

        }
    };

    $(document).on('click', '.add-more-btn-dged', function() {

        var clone = '<div class="row form-block-dged">                <div class="col-12 col-sm-12 col-md-6">                    <div class="form-group">                        <label for="nombrecursoB" class=" control-label">Nombre del Curso                            :<span class="text-danger">*</span></label>                        <input type="text" class="form-control " id="nombrecursoB" name="nombrecursoB">                    </div>                </div>                <div class="col-12 col-sm-12 col-md-6">                    <div class="form-group">                        <label for="nombreInstitucionB" class=" control-label">Nombre de                            la Institución:<span class="text-danger">*</span></label>                        <input type="text" class="form-control " id="nombreInstitucionB" name="nombreInstitucionB">                    </div>                </div>                <div class="col-12 col-sm-6">                    <div class="form-group">                        <label for="fecha_inicialB">Fecha de Inicio: <span class="text-danger">*</span></label>                        <div class="input-group date" id="fecha_inicialB" data-target-input="nearest">                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_inicialB" id="datetime-fecha_inicialB" name="fecha_inicialB" placeholder="" value="" />                            <div class="input-group-append" data-target="#fecha_inicialB" data-toggle="datetimepicker">                                <div class="input-group-text"><i class="far fa-calendar"></i></div>                            </div>                        </div>                        <script type="text/javascript">                            $(function() {                                $("#fecha_inicialB").datetimepicker({                                    format: "DD-MM-YYYY",                                    locale: moment.locale("es")                                });                            });                        <\/script>                    </div>                </div>                <div class="col-12 col-sm-6">                    <div class="form-group">                        <label for="fecha_finalB">Fecha de Término: <span class="text-danger">*</span></label>                        <div class="input-group date" id="fecha_finalB" data-target-input="nearest">                            <input type="text" required class="form-control datetimepicker-input" data-target="#fecha_finalB" id="datetime-fecha_finalB" name="fecha_finalB" placeholder="" value="" />                            <div class="input-group-append" data-target="#fecha_finalB" data-toggle="datetimepicker">                                <div class="input-group-text"><i class="far fa-calendar"></i></div>                            </div>                        </div>                        <script type="text/javascript">                            $(function() {                                $("#fecha_finalB").datetimepicker({                                    format: "DD-MM-YYYY",                                    locale: moment.locale("es")                                });                            });                        <\/script>                    </div>                </div>                <div class="col-12 col-sm-12 col-md-12">                    <div class="form-group">                        <label for="certificado_porB" class=" control-label">Certificado                            por:<span class="text-danger">*</span></label>                        <input type="text" class="form-control " id="certificado_porB" name="certificado_porB">                    </div>                </div>            </div>';
        $('#CardDatosGeneralesDocenteB').append(clone);
        $('#btnAdddged').removeClass('add-more-btn');
        $('#btnAdddged').addClass('remove-more-btn');
        $('#btnAdddged').text('Remover -');
    });

    $(document).on('click', '.remove-more-btn', function() {
        $('#CardDatosGeneralesDocenteB').empty();
        $('#btnAdddged').removeClass('remove-more-btn');
        $('#btnAdddged').addClass('add-more-btn');
        $('#btnAdddged').text('Agregar +');
    });

    $(document).on('click', '#btnNingunodged', function() {

        if ($('#btnNingunodged').is(':checked')) {


            $('#FormDatosGeneralesDocente input').attr('disabled', 'disabled');
            $('#FormDatosGeneralesDocente select').attr('disabled', 'disabled');
        } else {
            $('#FormDatosGeneralesDocente input').attr('disabled', false);
            $('#FormDatosGeneralesDocente select').attr('disabled', false);
        }


    });
</script>