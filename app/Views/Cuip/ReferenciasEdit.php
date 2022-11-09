<div class="card card-primary" id="cardRefFamCer">
    <div class="card-header">
        <h3 class="card-title">FAMILIAR CERCANO</h3>

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
                        <div>
                            <input type="text" class="form-control " id="apellidoPaterno" name="apellidoPaterno" value=" <?= isset($referencia->apellido_paterno_fam) ? $referencia->apellido_paterno_fam : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="apellidoMaterno" name="apellidoMaterno" value=" <?= isset($referencia->apellido_materno_fam) ? $referencia->apellido_materno_fam : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="primerNombre" name="primerNombre" value=" <?= isset($referencia->primer_nombre_fam) ? $referencia->primer_nombre_fam : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="segundoNombre" name="segundoNombre" value=" <?= isset($referencia->segundo_nombre_fam) ? $referencia->segundo_nombre_fam : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo_fam_cer" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                        <select class="form-control" id="sexo_fam_cer" name="sexo_fam_cer">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($genero)) :
                                foreach ($genero as  $a) {
                            ?>
          <option <?= (isset($referencia->idGenero_fam) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

                            <?php
                                }
                            endif; ?>
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
                        <div>
                            <input type="text" class="form-control " id="ocupacion" name="ocupacion" value=" <?= isset($referencia->ocupacion_fam) ? $referencia->ocupacion_fam : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco_fam_cercano" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="parentesco_fam_cercano" name="parentesco_fam_cercano">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($parentesco_familiar)) :
                                    foreach ($parentesco_familiar as  $a) {
                                ?>
              <option <?= (isset($referencia->idParentesco_fam) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
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
                        <div>
                            <input type="text" class="form-control " id="calle" name="calle" value=" <?= isset($referencia->calle_fam) ? $referencia->calle_fam : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="exterior" name="exterior" value=" <?= isset($referencia->numero_exterior_fam) ? $referencia->numero_exterior_fam : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="interior" name="interior" value=" <?= isset($referencia->numero_interior_fam) ? $referencia->numero_interior_fam : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="numero" name="numero" value=" <?= isset($referencia->numero_telefono_fam) ? $referencia->numero_telefono_fam : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoRefCer" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="codigoRefCer" name="codigoRefCer" value=" <?= isset($referencia->idCodigoPostal_fam) ? $referencia->idCodigoPostal_fam : ''  ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoRefCer" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="coloniacodigoRefCer" name="coloniacodigoRefCer">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($coloniacodigoRefCer)) :
                                foreach ($coloniacodigoRefCer as  $a) {
                            ?>
                      <option <?= (isset($referencia->colonia_fam) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
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
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoRefCer" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="estadocodigoRefCer" name="estadocodigoRefCer">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($estadocodigoRefCer)) :
                                    foreach ($estadocodigoRefCer as  $a) {
                                ?>
                              <option <?= (isset($referencia->idEstado_fam) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estadocodigoRefCer").select2({
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
                        <label for="municipiocodigoRefCer" class="control-label">Municipio: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="municipiocodigoRefCer" name="municipiocodigoRefCer">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($municipiocodigoRefCer)) :
                                    foreach ($municipiocodigoRefCer as  $a) {
                                ?>
          <option <?= (isset($referencia->municipio_fam) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipiocodigoRefCer").select2({
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
                        <label for="ciudadcodigoRefCer" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="ciudadcodigoRefCer" name="ciudadcodigoRefCer">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($ciudadcodigoRefCer)) :
                                    foreach ($ciudadcodigoRefCer as  $a) {
                                ?>
          <option <?= (isset($referencia->cuidad) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ciudadcodigoRefCer").select2({
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
                        <label for="pais" class="control-label">Pais: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="pais" name="pais">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($pais)) :
                                    foreach ($pais as  $a) {
                                ?>
                                          <option <?= (isset($referencia->idPaisNacimiento_fam) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#pais").select2({
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

<div class="card card-primary" id="cardrefParCer">
    <div class="card-header">
        <h3 class="card-title">PARIENTE CERCANO</h3>

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
                    <label for="apellidoPaternoParCer" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="apellidoPaternoParCer" name="apellidoPaternoParCer" value=" <?= isset($referencia->apellido_paterno_pariente) ? $referencia->apellido_paterno_pariente : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="apellidoMaternoParCer" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="apellidoMaternoParCer" name="apellidoMaternoParCer" value=" <?= isset($referencia->apellido_materno_pariente) ? $referencia->apellido_materno_pariente : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="primerNombreParCer" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="primerNombreParCer" name="primerNombreParCer" value=" <?= isset($referencia->primer_nombre_pariente) ? $referencia->primer_nombre_pariente : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="segundoNombreParCer" class=" control-label">Segundo Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="segundoNombreParCer" name="segundoNombreParCer" value=" <?= isset($referencia->segundo_nombre_pariente) ? $referencia->segundo_nombre_pariente : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="sexo_par_cer" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                    <select class="form-control" id="sexo_par_cer" name="sexo_par_cer">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($genero)) :
                            foreach ($genero as  $a) {
                        ?>
           <option <?= (isset($referencia->idGenero_pariente) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
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
                    <label for="ocupacionParCer" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="ocupacionParCer" name="ocupacionParCer" value=" <?= isset($referencia->ocupacion_pariente) ? $referencia->ocupacion_pariente : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="parentesco_cercano" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="parentesco_cercano" name="parentesco_cercano">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($parentesco_familiar)) :
                                foreach ($parentesco_familiar as  $a) {
                            ?>
                                       <option <?= (isset($referencia->idParentesco_pariente) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#parentesco_cercano").select2({
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
                    <label for="calleParCer" class=" control-label">Calle :<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="calleParCer" name="calleParCer" value=" <?= isset($referencia->calle_pariente) ? $referencia->calle_pariente : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="exteriorParCer" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="exteriorParCer" name="exteriorParCer" value=" <?= isset($referencia->numero_exterior_pariente) ? $referencia->numero_exterior_pariente : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="interiorParCer" class=" control-label">No. Interior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="interiorParCer" name="interiorParCer" value=" <?= isset($referencia->numero_interior_pariente) ? $referencia->numero_interior_pariente : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="numeroParCer" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="nombreInstitucion" name="nombreInstitucion" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10" value=" <?= isset($referencia->numero_telefono_pariente) ? $referencia->numero_telefono_pariente : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigoParCer" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="nombreInstitucion" name="nombreInstitucion" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" value=" <?= isset($referencia->idCodigoPostal_pariente) ? $referencia->idCodigoPostal_pariente : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigoParCer" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                    <select class="form-control" id="coloniacodigoParCer" name="coloniacodigoParCer">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($coloniacodigoParCer)) :
                            foreach ($coloniacodigoParCer as  $a) {
                        ?>
                                       <option <?= (isset($referencia->colonia_pariente) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#coloniacodigoParCer").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="estadocodigoParCer" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="estadocodigoParCer" name="estadocodigoParCer">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($estadocodigoParCer)) :
                                foreach ($estadocodigoParCer as  $a) {
                            ?>
                                               <option <?= (isset($referencia->idEstado_pariente) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#estadocodigoParCer").select2({
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
                    <label for="municipiocodigoParCer" class="control-label">Municipio: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="municipiocodigoParCer" name="municipiocodigoParCer">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($municipiocodigoParCer)) :
                                foreach ($municipiocodigoParCer as  $a) {
                            ?>
                                               <option <?= (isset($referencia->municipio_pariente) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#municipiocodigoParCer").select2({
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
                    <label for="ciudadcodigoParCer" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="ciudadcodigoParCer" name="ciudadcodigoParCer">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($ciudadcodigoParCer)) :
                                foreach ($ciudadcodigoParCer as  $a) {
                            ?>
                                               <option <?= (isset($referencia->ciudad_pariente) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#ciudadcodigoParCer").select2({
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
                    <label for="paisParCer" class="control-label">Pais: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="paisParCer" name="paisParCer">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($pais)) :
                                foreach ($pais as  $a) {
                            ?>
                           <option <?= (isset($referencia->idPaisNacimiento_pariente) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#paisParCer").select2({
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

<div class="card card-primary" id="cardRefPersonal">
    <div class="card-header">
        <h3 class="card-title">PERSONAL</h3>

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
                    <div>
                        <input type="text" class="form-control " id="apellidoPaternoRefPer" name="apellidoPaternoRefPer" value=" <?= isset($referencia->apellido_paterno_personal) ? $referencia->apellido_paterno_personal : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="apellidoMaternoRefPer" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="apellidoMaternoRefPer" name="apellidoMaternoRefPer" value=" <?= isset($referencia->apellido_materno_personal) ? $referencia->apellido_materno_personal : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="primerNombreRefPer" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="primerNombreRefPer" name="primerNombreRefPer" value=" <?= isset($referencia->primer_nombre_personal) ? $referencia->primer_nombre_personal : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="segundoNombreRefPer" class=" control-label">Segundo Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="segundoNombreRefPer" name="segundoNombreRefPer" value=" <?= isset($referencia->segundo_nombre_personal) ? $referencia->segundo_nombre_personal : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="sexo_per" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                    <select class="form-control" id="sexo_per" name="sexo_per">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($genero)) :
                            foreach ($genero as  $a) {
                        ?>
                           <option <?= (isset($referencia->idGenero_personal) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
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
                    <div>
                        <input type="text" class="form-control " id="ocupacionRefPer" name="ocupacionRefPer" value=" <?= isset($referencia->ocupacion_personal) ? $referencia->ocupacion_personal : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="parentesco_personal" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="parentesco_personal" name="parentesco_personal">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($parentesco_familiar)) :
                                foreach ($parentesco_familiar as  $a) {
                            ?>
                           <option <?= (isset($referencia->idParentesco_personal) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
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
                    <div>
                        <input type="text" class="form-control " id="calleRefPer" name="calleRefPer" value=" <?= isset($referencia->calle_personal) ? $referencia->calle_personal : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="exteriorRefPer" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="exteriorRefPer" name="exteriorRefPer" value=" <?= isset($referencia->numero_exterior_personal) ? $referencia->numero_exterior_personal : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="interiorRefPer" class=" control-label">No. Interior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="interiorRefPer" name="interiorRefPer" value=" <?= isset($referencia->numero_interior_personal) ? $referencia->numero_interior_personal : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="numeroRefPer" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="numeroRefPer" name="numeroRefPer" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10" value=" <?= isset($referencia->numero_telefono_personal) ? $referencia->numero_telefono_personal : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigoPersonal" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="codigoPersonal" name="codigoPersonal" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" value=" <?= isset($referencia->idCodigoPostal_personal) ? $referencia->idCodigoPostal_personal : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigoPersonal" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                    <select class="form-control" id="coloniacodigoPersonal" name="coloniacodigoPersonal">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($coloniacodigoPersonal)) :
                            foreach ($coloniacodigoPersonal as  $a) {
                        ?>
                               <option <?= (isset($referencia->colonia_personal) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
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
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="estadocodigoPersonal" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="estadocodigoPersonal" name="estadocodigoPersonal">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($estadocodigoPersonal)) :
                                foreach ($estadocodigoPersonal as  $a) {
                            ?>
                                   <option <?= (isset($referencia->idEstado_personal) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
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
                            <?php
                            if (!empty($municipiocodigoPersonal)) :
                                foreach ($municipiocodigoPersonal as  $a) {
                            ?>
                     <option <?= (isset($referencia->municipio_personal) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
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
                            <?php
                            if (!empty($ciudadcodigoPersonal)) :
                                foreach ($ciudadcodigoPersonal as  $a) {
                            ?>
                     <option <?= (isset($referencia->ciudad_personal) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
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
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="paisRefPer" class="control-label">Pais: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="paisRefPer" name="paisRefPer">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($pais)) :
                                foreach ($pais as  $a) {
                            ?>
                             <option <?= (isset($referencia->idPaisNacimiento_personal) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

                            <?php
                                }
                            endif; ?>
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
        </div>

    </div>
</div>

<div class="card card-primary" id="cardRefLaboral">
    <div class="card-header">
        <h3 class="card-title">LABORAL</h3>

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
                    <label for="apellidoPaternoRefLab" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="apellidoPaternoRefLab" name="apellidoPaternoRefLab" value=" <?= isset($referencia->apellido_paterno_laboral) ? $referencia->apellido_paterno_laboral : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="apellidoMaternoRefLab" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="apellidoMaternoRefLab" name="apellidoMaternoRefLab" value=" <?= isset($referencia->apellido_materno_laboral) ? $referencia->apellido_materno_laboral : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="primerNombreRefLab" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="primerNombreRefLab" name="primerNombreRefLab" value=" <?= isset($referencia->primer_nombre_laboral) ? $referencia->primer_nombre_laboral : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="segundoNombreRefLab" class=" control-label">Segundo Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="segundoNombreRefLab" name="segundoNombreRefLab" value=" <?= isset($referencia->segundo_nombre_laboral) ? $referencia->segundo_nombre_laboral : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="sexo_lab" class=" control-label">Sexo:<span class="text-danger">*</span></label>
                    <select class="form-control" id="sexo_lab" name="sexo_lab">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($genero)) :
                            foreach ($genero as  $a) {
                        ?>
                             <option <?= (isset($referencia->idGenero_laboral) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

                        <?php
                            }
                        endif; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#sexo_lab").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="ocupacionRefLab" class=" control-label">Ocupación:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="ocupacionRefLab" name="ocupacionRefLab" value=" <?= isset($referencia->ocupacion_laboral) ? $referencia->ocupacion_laboral : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="parentesco_laboral" class="control-label">Parentesco: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="parentesco_laboral" name="parentesco_laboral">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($parentesco_familiar)) :
                                foreach ($parentesco_familiar as  $a) {
                            ?>
                                 <option <?= (isset($referencia->idParentesco_laboral) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#parentesco_laboral").select2({
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
                    <label for="calleRefLab" class=" control-label">Calle :<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="calleRefLab" name="calleRefLab" value=" <?= isset($referencia->calle_laboral) ? $referencia->calle_laboral : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="exterior" name="exterior" value=" <?= isset($referencia->numero_exterior_laboral) ? $referencia->numero_exterior_laboral : ''  ?>">

                    </div>
                </div>
            </div>

            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="interiorRefLab" class=" control-label">No. Interior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="interiorRefLab" name="interiorRefLab" value=" <?= isset($referencia->numero_interior_laboral) ? $referencia->numero_interior_laboral : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="numeroRefLab" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="numeroRefLab" name="numeroRefLab" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10" value=" <?= isset($referencia->numero_telefono_laboral) ? $referencia->numero_telefono_laboral : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigoLaboral" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="codigoLaboral" name="codigoLaboral" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" value=" <?= isset($referencia->idCodigoPostal_laboral) ? $referencia->idCodigoPostal_laboral : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="colonia_fam_cercano" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                    <select class="form-control" id="colonia_fam_cercano" name="colonia_fam_cercano">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($colonia_fam_cercano)) :
                            foreach ($colonia_fam_cercano as  $a) {
                        ?>
                                 <option <?= (isset($referencia->colonia_laboral) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#coloniacodigoLaboral").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
            </div>
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="estadocodigoLaboral" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="estadocodigoLaboral" name="estadocodigoLaboral">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($estadocodigoLaboral)) :
                                foreach ($estadocodigoLaboral as  $a) {
                            ?>
                                     <option <?= (isset($referencia->idEstado_laboral) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#estadocodigoLaboral").select2({
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
                    <label for="municipiocodigoLaboral" class="control-label">Municipio: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="municipiocodigoLaboral" name="municipiocodigoLaboral">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($municipiocodigoLaboral)) :
                                foreach ($municipiocodigoLaboral as  $a) {
                            ?>
                                         <option <?= (isset($referencia->municipio_laboral) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#municipiocodigoLaboral").select2({
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
                    <label for="ciudadcodigoLaboral" class="control-label">Ciudad: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="ciudadcodigoLaboral" name="ciudadcodigoLaboral">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($ciudadcodigoLaboral)) :
                                foreach ($ciudadcodigoLaboral as  $a) {
                            ?>
            <option <?= (isset($referencia->ciudad_laboral) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#ciudadcodigoLaboral").select2({
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
                    <label for="paisRefLab" class="control-label">Pais: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="paisRefLab" name="paisRefLab">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($pais)) :
                                foreach ($pais as  $a) {
                            ?>
                <option <?= (isset($referencia->idPaisNacimiento_laboral) == $a->valor ? 'selected' : '') ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#paisRefLab").select2({
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
            <button id="saveReferencias" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>
</div>
<script>
    $("#codigoRefCer").on('keyup', function() {
        getSepomex(this.id)
    });

    $("#codigoParCer").on('keyup', function() {
        getSepomex(this.id)
    });

    $("#codigoPersonal").on('keyup', function() {
        getSepomex(this.id)
    });

    $("#codigoLaboral").on('keyup', function() {
        getSepomex(this.id)
    });


    $('#saveReferencias').click(function(event) {
        event.preventDefault();
        $('#load').addClass("spinner-border");

        var idPersonal = $('#idPersonal').val()
        var formData = new FormData($("form#referencias")[0]);
        formData.append('idPersonal', idPersonal);

        $.ajax({
            url: base_url + '/GuardarReferencias',
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

                    toastr.success(response.succes.mensaje);



                } else if (response.dontsucces.error == 'error') {

                    toastr.error(response.dontsucces.mensaje);

                } else if (Object.keys(response.error).length > 0) {

                    for (var clave in response.error) {

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardRefFamCer #" + clave + "");

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardrefParCer #" + clave + "");

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardRefPersonal #" + clave + "");

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardRefLaboral #" + clave + "");

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
</script>