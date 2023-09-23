<?php

use CodeIgniter\HTTP\RequestInterface;
use App\Models\AdministradorModel;
use App\Libraries\Encrypt;

$encrypt = new Encrypt();

?>
<div class="card card-primary" id="cardRefFamCer">
    <div class="card-header">
        <h3 class="card-title">FAMILIAR CERCANO</h3>

        <div class="card-tools">
            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
        <input type="checkbox" class="form-check-input mt-2" id="btnNingunoFam">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="referencias">
            <div class="row">
                <input type="hidden" class="form-control " id="idReferencia" name="idReferencia" value="<?= isset($referencia->id)?$encrypt->Encrypt($referencia->id):"" ?>">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoPaterno" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="apellidoPaterno" name="apellidoPaterno" value="<?= isset($referencia->apellido_paterno_fam)?$referencia->apellido_paterno_fam:''?>"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="apellidoMaterno" name="apellidoMaterno" value="<?= isset($referencia->apellido_materno_fam)?$referencia->apellido_materno_fam:''?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="primerNombre" name="primerNombre" value="<?= isset($referencia->primer_nombre_fam)? $referencia->primer_nombre_fam:''?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre: <span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="segundoNombre" name="segundoNombre" value="<?= isset($referencia->segundo_nombre_fam) ?$referencia->segundo_nombre_fam:''?>">

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
          <option <?= isset($referencia->idGenero_fam)?($referencia->idGenero_fam) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

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
                        <select class="form-control" id="ocupacion" name="ocupacion">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($ocupacion) ):
                                    foreach($ocupacion as  $a){
                                        ?>
                                            <option <?= isset($referencia->ocupacion_fam)?($referencia->ocupacion_fam) == $a->valor ? 'selected' : '':'' ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
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
                                if (!empty($parentesco_familiar)) :
                                    foreach ($parentesco_familiar as  $a) {
                                ?>
              <option <?= isset($referencia->idParentesco_fam)?($referencia->idParentesco_fam) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
                            <input type="text" class="form-control " id="calle" name="calle" value="<?=isset($referencia->calle_fam)?$referencia->calle_fam:''?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="exterior" name="exterior" value="<?= isset($referencia->numero_exterior_fam) ?$referencia->numero_exterior_fam:''?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="interior" name="interior" value="<?= isset($referencia->numero_interior_fam) ?$referencia->numero_interior_fam:''?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="coloniacodigoRefCer" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                        <select class="form-control" id="coloniacodigoRefCer" name="coloniacodigoRefCer">
                            <option value="">Selecciona una Opcion</option>
                            
                      <option selected value="<?= isset($referencia->colonia_fam)?$referencia->colonia_fam:"" ?>"><?= isset($referencia->colonia_fam)?$referencia->colonia_fam:"" ?></option>
                            
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
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigoRefCer" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="codigoRefCer" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" name="codigoRefCer" value="<?= isset($referencia->idCodigoPostal_fam)? $referencia->idCodigoPostal_fam:''?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                        <div>
                            <input type="text" class="form-control " id="numero" name="numero" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10" value="<?=isset($referencia->numero_telefono_fam)?$referencia->numero_telefono_fam:''?>">

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
                                          <option <?= isset($referencia->idPaisNacimiento_fam)?($referencia->idPaisNacimiento_fam) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="estadocodigoRefCer" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="estadocodigoRefCer" name="estadocodigoRefCer">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($entidad_federativa)) :
                                    foreach ($entidad_federativa as  $a) {
                                ?>
                              <option <?= isset($referencia->idEstado_fam)?($referencia->idEstado_fam) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
                                
                                <option selected value="<?= isset($referencia->idMunciRefer)?$encrypt->Encrypt($referencia->idMunciRefer):"" ?>"><?= isset($referencia->municipio_fam)?$referencia->municipio_fam:"" ?></option>

                                
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
                                
                                <option selected value="<?= isset($referencia->ciudad_fam)?$referencia->ciudad_fam:"" ?>"><?= isset($referencia->ciudad_fam)?$referencia->ciudad_fam:"" ?></option>
                                
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
            </div>
        </form>    
    </div>
</div>

<div class="card card-primary" id="cardrefParCer">
    <div class="card-header">
        <h3 class="card-title">PARIENTE CERCANO</h3>

        <div class="card-tools">
            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunoCer">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="parienteCer">
        <div class="row">
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="apellidoPaternoParCer" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="apellidoPaternoParCer" name="apellidoPaternoParCer" value="<?= isset($referencia->apellido_paterno_pariente)?$referencia->apellido_paterno_pariente:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="apellidoMaternoParCer" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="apellidoMaternoParCer" name="apellidoMaternoParCer" value="<?= isset($referencia->apellido_materno_pariente)?$referencia->apellido_materno_pariente:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="primerNombreParCer" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="primerNombreParCer" name="primerNombreParCer" value="<?= isset($referencia->primer_nombre_pariente)? $referencia->primer_nombre_pariente:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="segundoNombreParCer" class=" control-label">Segundo Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="segundoNombreParCer" name="segundoNombreParCer" value="<?=isset($referencia->segundo_nombre_pariente) ? $referencia->segundo_nombre_pariente:''?>">

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
           <option <?= isset($referencia->idGenero_pariente)?($referencia->idGenero_pariente) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
                    <select class="form-control" id="ocupacionParCer" name="ocupacionParCer">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($ocupacion) ):
                                    foreach($ocupacion as  $a){
                                        ?>
                                            <option <?= isset($referencia->ocupacion_pariente)?($referencia->ocupacion_pariente) == $a->valor ? 'selected' : '':'' ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ocupacionParCer").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                    
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
                                       <option <?= isset($referencia->idParentesco_pariente)?($referencia->idParentesco_pariente) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
                        <input type="text" class="form-control " id="calleParCer" name="calleParCer" value="<?= isset($referencia->calle_pariente) ?$referencia->calle_pariente:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="exteriorParCer" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="exteriorParCer" name="exteriorParCer" value="<?= isset($referencia->numero_exterior_pariente)?$referencia->numero_exterior_pariente:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="interiorParCer" class=" control-label">No. Interior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="interiorParCer" name="interiorParCer" value="<?= isset($referencia->numero_interior_pariente)?$referencia->numero_interior_pariente:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigoParCer" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                    <select class="form-control" id="coloniacodigoParCer" name="coloniacodigoParCer">
                        <option value="">Selecciona una Opcion</option>
                        
                        <option selected value="<?= isset($referencia->colonia_pariente)?$referencia->colonia_pariente:"" ?>"><?= isset($referencia->colonia_pariente)?$referencia->colonia_pariente:"" ?></option>
                        
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
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigoParCer" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="codigoParCer" name="codigoParCer" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" value="<?= isset($referencia->idCodigoPostal_pariente) ? $referencia->idCodigoPostal_pariente : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="numeroParCer" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="numeroParCer" name="numeroParCer" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10" value="<?= isset($referencia->numero_telefono_pariente) ? $referencia->numero_telefono_pariente :''?>">

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
                           <option <?= isset($referencia->idPaisNacimiento_pariente)?($referencia->idPaisNacimiento_pariente) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="estadocodigoParCer" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="estadocodigoParCer" name="estadocodigoParCer">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($entidad_federativa)) :
                                foreach ($entidad_federativa as  $a) {
                            ?>
                                <option <?= isset($referencia->idEstado_pariente)?($referencia->idEstado_pariente) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
                            
                            <option selected value="<?= isset($referencia->idMuniRefPariente)?$encrypt->Encrypt($referencia->idMuniRefPariente):"" ?>"><?= isset($referencia->municipio_pariente)?$referencia->municipio_pariente:"" ?></option>
                            
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
                            
                            <option selected value="<?= isset($referencia->ciudad_pariente)?$referencia->ciudad_pariente:"" ?>"><?= isset($referencia->ciudad_pariente)?$referencia->ciudad_pariente:"" ?></option>
                            
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
        </form>    
        </div>

    </div>
</div>

<div class="card card-primary" id="cardRefPersonal">
    <div class="card-header">
        <h3 class="card-title">PERSONAL</h3>

        <div class="card-tools">
            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunoPer">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="formPersonal">
        <div class="row">
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="apellidoPaternoRefPer" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="apellidoPaternoRefPer" name="apellidoPaternoRefPer" value="<?= isset($referenciaLab->apellido_paterno_personal)?$referenciaLab->apellido_paterno_personal:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="apellidoMaternoRefPer" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="apellidoMaternoRefPer" name="apellidoMaternoRefPer" value="<?= isset($referenciaLab->apellido_materno_personal)?$referenciaLab->apellido_materno_personal:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="primerNombreRefPer" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="primerNombreRefPer" name="primerNombreRefPer" value="<?= isset($referenciaLab->primer_nombre_personal) ? $referenciaLab->primer_nombre_personal:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="segundoNombreRefPer" class=" control-label">Segundo Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="segundoNombreRefPer" name="segundoNombreRefPer" value="<?= isset($referenciaLab->segundo_nombre_personal)?$referenciaLab->segundo_nombre_personal:''?>">

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
                           <option <?= isset($referenciaLab->idGenero_personal)?($referenciaLab->idGenero_personal) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
                    <select class="form-control" id="ocupacionRefPer" name="ocupacionRefPer">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($ocupacion) ):
                                    foreach($ocupacion as  $a){
                                        ?>
                                            <option <?= isset($referenciaLab->ocupacion_personal)?($referenciaLab->ocupacion_personal) == $a->valor ? 'selected' : '':'' ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
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
                            if (!empty($parentesco_personal)) :
                                foreach ($parentesco_personal as  $a) {
                            ?>
                           <option <?= isset($referenciaLab->idParentesco_personal)?($referenciaLab->idParentesco_personal) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
                        <input type="text" class="form-control " id="calleRefPer" name="calleRefPer" value="<?= isset($referenciaLab->calle_personal)?$referenciaLab->calle_personal:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="exteriorRefPer" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="exteriorRefPer" name="exteriorRefPer" value="<?= isset($referenciaLab->numero_exterior_personal)?$referenciaLab->numero_exterior_personal:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="interiorRefPer" class=" control-label">No. Interior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="interiorRefPer" name="interiorRefPer" value="<?= isset($referenciaLab->numero_interior_personal)?$referenciaLab->numero_interior_personal:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigoPersonal" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                    <select class="form-control" id="coloniacodigoPersonal" name="coloniacodigoPersonal">
                        <option value="">Selecciona una Opcion</option>
                        
                        <option selected value="<?= isset($referenciaLab->colonia_personal)?$referenciaLab->colonia_personal:"" ?>"><?= isset($referenciaLab->colonia_personal)?$referenciaLab->colonia_personal:"" ?></option>
                        
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
                    <div>
                        <input type="text" class="form-control " id="codigoPersonal" name="codigoPersonal" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" value="<?= isset($referenciaLab->idCodigoPostal_personal) ? $referenciaLab->idCodigoPostal_personal : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="numeroRefPer" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="numeroRefPer" name="numeroRefPer" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10" value="<?= isset($referenciaLab->numero_telefono_personal) ? $referenciaLab->numero_telefono_personal : ''  ?>">

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
                             <option <?= isset($referenciaLab->idPaisNacimiento_personal)?($referenciaLab->idPaisNacimiento_personal) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

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
           
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="estadocodigoPersonal" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="estadocodigoPersonal" name="estadocodigoPersonal">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($entidad_federativa)) :
                                foreach ($entidad_federativa as  $a) {
                            ?>
                                   <option <?= isset($referenciaLab->idEstado_personal)?($referenciaLab->idEstado_personal) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
                            
                                <option selected value="<?= isset($referenciaLab->idMuniRefePersonal)?$encrypt->Encrypt($referenciaLab->idMuniRefePersonal):"" ?>"><?= isset($referenciaLab->municipio_personal)?$referenciaLab->municipio_personal:"" ?></option>
                            
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
                            
                            <option selected value="<?= isset($referenciaLab->ciudad_personal)?$referenciaLab->ciudad_personal:"" ?>"><?= isset($referenciaLab->ciudad_personal)?$referenciaLab->ciudad_personal:"" ?></option>
                            

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
        </form>
        </div>
    </div>
</div>

<div class="card card-primary" id="cardRefLaboral">
    <div class="card-header">
        <h3 class="card-title">LABORAL</h3>

        <div class="card-tools">
            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunoLa">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="formLaboral">
        <div class="row">
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="apellidoPaternoRefLab" class=" control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="apellidoPaternoRefLab" name="apellidoPaternoRefLab" value="<?= isset($referenciaLab->apellido_paterno_laboral)?$referenciaLab->apellido_paterno_laboral:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="apellidoMaternoRefLab" class=" control-label">Apellido Materno:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="apellidoMaternoRefLab" name="apellidoMaternoRefLab" value="<?= isset($referenciaLab->apellido_materno_laboral)?$referenciaLab->apellido_materno_laboral:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="primerNombreRefLab" class="control-label">Primer Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="primerNombreRefLab" name="primerNombreRefLab" value="<?= isset($referenciaLab->primer_nombre_laboral) ? $referenciaLab->primer_nombre_laboral:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="segundoNombreRefLab" class=" control-label">Segundo Nombre: <span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="segundoNombreRefLab" name="segundoNombreRefLab" value="<?= isset($referenciaLab->segundo_nombre_laboral) ? $referenciaLab->segundo_nombre_laboral:''?>">

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
                             <option <?= isset($referenciaLab->idGenero_laboral)?($referenciaLab->idGenero_laboral) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>

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
                    <select class="form-control" id="ocupacionRefLab" name="ocupacionRefLab">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if( !empty($ocupacion) ):
                                    foreach($ocupacion as  $a){
                                        ?>
                                            <option <?= isset($referenciaLab->ocupacion_laboral)?($referenciaLab->ocupacion_laboral) == $a->valor ? 'selected' : '':'' ?> value="<?=$a->id ?>"><?= $a->valor ?></option>
                                            <?php
                                    }
                                endif;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ocupacionRefLab").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>


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
                                 <option <?= isset($referenciaLab->idParentesco_laboral)?($referenciaLab->idParentesco_laboral) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
                        <input type="text" class="form-control " id="calleRefLab" name="calleRefLab" value="<?= isset($referenciaLab->calle_laboral)?$referenciaLab->calle_laboral:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="exteriorRefLab" class=" control-label">No. Exterior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="exteriorRefLab" name="exteriorRefLab" value="<?= isset($referenciaLab->numero_exterior_laboral)?$referenciaLab->numero_exterior_laboral:''?>">

                    </div>
                </div>
            </div>

            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="interiorRefLab" class=" control-label">No. Interior:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="interiorRefLab" name="interiorRefLab" value="<?= isset($referenciaLab->numero_interior_laboral)?$referenciaLab->numero_interior_laboral:''?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigoLaboral" class=" control-label">Colonia:<span class="text-danger">*</span></label>
                    <select class="form-control" id="coloniacodigoLaboral" name="coloniacodigoLaboral">
                        <option value="">Selecciona una Opcion</option>
                        
                        <option selected value="<?= isset($referenciaLab->colonia_laboral)?$referenciaLab->colonia_laboral:"" ?>"><?= isset($referenciaLab->colonia_laboral)?$referenciaLab->colonia_laboral:"" ?></option>
                        
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
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigoLaboral" class=" control-label">Código Postal :<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="codigoLaboral" name="codigoLaboral" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" value="<?= isset($referenciaLab->idCodigoPostal_laboral) ? $referenciaLab->idCodigoPostal_laboral : ''  ?>">

                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="numeroRefLab" class=" control-label">Numero Telefónico:<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control " id="numeroRefLab" name="numeroRefLab" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10" value="<?= isset($referenciaLab->numero_telefono_laboral) ? $referenciaLab->numero_telefono_laboral : ''  ?>">

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
                <option <?= isset($referenciaLab->idPaisNacimiento_laboral)?($referenciaLab->idPaisNacimiento_laboral) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="estadocodigoLaboral" class="control-label">Entidad Federativa: <span class="text-danger">*</span></label>
                    <div>
                        <select class="form-control" id="estadocodigoLaboral" name="estadocodigoLaboral">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($entidad_federativa)) :
                                foreach ($entidad_federativa as  $a) {
                            ?>
                                     <option <?= isset($referenciaLab->idEstado_laboral)?($referenciaLab->idEstado_laboral) == $a->valor ? 'selected' : '':'' ?> value="<?= $a->id ?>"><?= $a->valor ?></option>
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
                            
                            <option selected value="<?= isset($referenciaLab->idRefeMuniLaboral)?$encrypt->Encrypt($referenciaLab->idRefeMuniLaboral):"" ?>"><?= isset($referenciaLab->municipio_laboral)?$referenciaLab->municipio_laboral:"" ?></option>
                            
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
                            
                            <option selected value="<?= isset($referenciaLab->ciudad_laboral)?$referenciaLab->ciudad_laboral:"" ?>"><?= isset($referenciaLab->ciudad_laboral)?$referenciaLab->ciudad_laboral:"" ?></option>
                            
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
        </form>                
        </div>
        
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


    $('#saveReferencias').click(function(event) {
        event.preventDefault();
        $('#load').addClass("spinner-border");

        var idPersonal = $('#idPersonal').val()
        var idReferencia = $('#idReferencia').val()
        var formData = new FormData();
        formData.append('idPersonal', idPersonal);
        var csrfName = $("input[name=app_csrf]").val();
        
        formData.append('app_csrf', csrfName);
        formData.append('idReferencia', idReferencia);

        if($('#btnNingunoFam').is(':checked')) {
            valFamiliar = 1;
            
        } else {
            valFamiliar = 0;

            var formDataD = new FormData($("form#referencias")[0]);


            for (let [key, value] of formDataD.entries()) {
                formData.append(key, value);
            }
            
        }

        if($('#btnNingunoCer').is(':checked')) {
            valFamCercano = 1;
            
        } else {
            valFamCercano = 0;

            var formDataE = new FormData($("form#parienteCer")[0]);


            for (let [key, value] of formDataE.entries()) {
                formData.append(key, value);
            }
            
        }

        if($('#btnNingunoPer').is(':checked')) {
            valrefpersonal = 1;
            
        } else {
            valrefpersonal = 0;

            var formDataJ = new FormData($("form#formPersonal")[0]);


            for (let [key, value] of formDataJ.entries()) {
                formData.append(key, value);
            }
            
        }

        if($('#btnNingunoLa').is(':checked')) {
            valrefLaboral = 1;
            
        } else {
            valrefLaboral = 0;

            var formDataH = new FormData($("form#formLaboral")[0]);


            for (let [key, value] of formDataH.entries()) {
                formData.append(key, value);
            }
            
        }

        formData.append('familiar', valFamiliar);
        formData.append('cercano', valFamCercano);
        formData.append('personal', valrefpersonal);
        formData.append('laboral', valrefLaboral);

        $.ajax({
            url: base_url + '/EditarReferencias',
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

                    $("html,body").animate({
                        scrollTop: $("#cardRefFamCer").offset().top
                    }, 2000);

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

        $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

    });

    $(document).on('click','#btnNingunoFam',function(){ 

        if($('#btnNingunoFam').is(':checked')) {


            $('#referencias input').attr('disabled','disabled');
            
            $('#referencias select').attr('disabled','disabled');
            

        } else {
            $('#referencias input').attr('disabled',false);
            
            $('#referencias select').attr('disabled',false);
            
        }


    });

    $(document).on('click','#btnNingunoCer',function(){ 

        if($('#btnNingunoCer').is(':checked')) {


            $('#parienteCer input').attr('disabled','disabled');
            
            $('#parienteCer select').attr('disabled','disabled');
            

        } else {
            $('#parienteCer input').attr('disabled',false);
            
            $('#parienteCer select').attr('disabled',false);
            
        }


    });

    $(document).on('click','#btnNingunoPer',function(){ 

        if($('#btnNingunoPer').is(':checked')) {


            $('#formPersonal input').attr('disabled','disabled');
            
            $('#formPersonal select').attr('disabled','disabled');
            

        } else {
            $('#formPersonal input').attr('disabled',false);
            
            $('#formPersonal select').attr('disabled',false);
            
        }


    });

    $(document).on('click','#btnNingunoLa',function(){ 

        if($('#btnNingunoLa').is(':checked')) {


            $('#formLaboral input').attr('disabled','disabled');
            
            $('#formLaboral select').attr('disabled','disabled');
            

        } else {
            $('#formLaboral input').attr('disabled',false);
            
            $('#formLaboral select').attr('disabled',false);
            
        }


    });
</script>