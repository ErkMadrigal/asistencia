<div class="card card-primary" id="cardCapPublica">
    <div class="card-header">
        <h3 class="card-title">CAPACITACIÓN EN SEGURIDAD PUBLICA</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunocapa">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-public" id="btnAdddcapacitacion">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="Capacitaciones">
            <div id="CardDatoscapacitacion">
                <div class="row">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="dependencia" class=" control-label">Dependencia responsable:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="certificado" name="certificado"  value="<?= isset($capacitacion->dependencia) ? $capacitacion->dependencia : ''  ?>">
                            
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="institucion" class=" control-label">Institución Capacitadora:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="institucion" name="institucion"  value=" <?= isset($capacitacion->inst_capacitadora) ? $capacitacion->inst_capacitadora : ''  ?>">

                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="nombre_curso" class=" control-label">Nombre del curso:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="nombre_curso" name="nombre_curso"  value="<?= isset($capacitacion->nombre_curso) ? $capacitacion->nombre_curso : ''  ?>">
                            
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="tema_curso" class=" control-label">Tema del curso:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="tema_curso" name="tema_curso"  value=" <?= isset($capacitacion->tema_curso) ? $capacitacion->tema_curso : ''  ?>">
                            
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="nivel_curso" class="control-label">Nivel del curso recibido: <span class="text-danger">*</span></label>
                            <div>
                            <select class="form-control" id="nivel_curso" name="nivel_curso">
                                    <option value="">Selecciona una Opcion</option>
                                    <?php
                                    if (!empty($nivel_curso)) :
                                        foreach ($nivel_curso as  $a) {
                                    ?>
                                            <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                    <?php
                                        }
                                    endif; ?>
                                </select>
                                <script>
                                    $(document).ready(function() {
                                        $("#nivel_curso").select2({
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
                            <label for="eficienciaCursos" class="control-label">Eficiencia terminal: <span class="text-danger">*</span></label>
                            <div>
                            <select class="form-control" id="eficienciaCursos" name="eficienciaCursos">
                                    <option value="">Selecciona una Opcion</option>
                                    <?php
                                    if (!empty($eficiencia)) :
                                        foreach ($eficiencia as  $a) {
                                    ?>
                                            <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                    <?php
                                        }
                                    endif; ?>
                                </select>
                                <script>
                                    $(document).ready(function() {
                                        $("#eficienciaCursos").select2({
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
                            <label for="inicio" class=" control-label">Inicio:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="inicio" name="inicio"  value=" <?= isset($capacitacion->inicio_curso) ? $capacitacion->inicio_curso : ''  ?>">
                            
                        </div>
                            <script type="text/javascript">
                                $(function() {
                                    $("#inicio").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="conclusion" class=" control-label">Conclusión:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="conclusion" name="conclusion"  value="<?= isset($capacitacion->conclusion_curso) ? $capacitacion->conclusion_curso : ''  ?>">
                            
                        </div>
                            <script type="text/javascript">
                                $(function() {
                                    $("#conclusion").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="duracion" class=" control-label">Duración en horas:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="duracion" name="duracion" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?= isset($capacitacion->duracion_horas_curso) ? $capacitacion->duracion_horas_curso : ''  ?>">
                            
                        </div>
                           
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="comprobante" class=" control-label">Tipo de comprobante:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="comprobante" name="comprobante"  value="<?= isset($capacitacion->tipo_comprobante) ? $capacitacion->tipo_comprobante : ''  ?>">
                            
                        </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr class="mt-3 mb-3" />
            <div id="CardDatoscapacitacionB">
            </div>
        </form>
    </div>
</div>

<div class="card card-primary" id="cardCapAdicional">
    <div class="card-header">
        <h3 class="card-title">CAPACITACIÓN ADICIONAL
        </h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunOADICIONAL">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-adi" id="btnAdddadicional">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="adicional">
            <div id="CardDatosAdicional">
                <div class="row">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="empresa" class=" control-label">Insitutción o Empresa:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="empresa" name="empresa"  value="<?= isset($capacitacion->institucion) ? $capacitacion->institucion : ''  ?>">
                            
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="curso" class=" control-label">Estudio o Curso:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="curso" name="curso"  value="<?= isset($capacitacion->curso) ? $capacitacion->curso : ''  ?>">
                            
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="tipo_curso" class=" control-label">Tipo de curso:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="tipo_curso" name="tipo_curso"  value="<?= isset($capacitacion->tipo_curso) ? $capacitacion->tipo_curso : ''  ?>">
                            
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="cuso_tomado" class="control-label">¿El curso fue?: <span class="text-danger">*</span></label>
                            <div>
                            <select class="form-control" id="cuso_tomado" name="cuso_tomado">
                                    <option value="">Selecciona una Opcion</option>
                                    <?php
                                    if (!empty($cuso_tomado)) :
                                        foreach ($cuso_tomado as  $a) {
                                    ?>
                                            <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                    <?php
                                        }
                                    endif; ?>
                                </select>
                                <script>
                                    $(document).ready(function() {
                                        $("#cuso_tomado").select2({
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
                            <label for="eficiencia" class="control-label">Eficiencia terminal: <span class="text-danger">*</span></label>
                            <div>
                            <select class="form-control" id="eficiencia" name="eficiencia">
                                    <option value="">Selecciona una Opcion</option>
                                    <?php
                                    if (!empty($eficiencia)) :
                                        foreach ($eficiencia as  $a) {
                                    ?>
                                            <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                    <?php
                                        }
                                    endif; ?>
                                </select>
                                <script>
                                    $(document).ready(function() {
                                        $("#eficiencia").select2({
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
                            <label for="inicioAdicional" class=" control-label">Inicio:<span class="text-danger">*</span></label>
                            <div >    
                            <select class="form-control" id="eficiencia" name="eficiencia">
                                    <option value="">Selecciona una Opcion</option>
                                    <?php
                                    if (!empty($eficiencia)) :
                                        foreach ($eficiencia as  $a) {
                                    ?>
                                            <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                    <?php
                                        }
                                    endif; ?>
                                </select>
                            <script type="text/javascript">
                                $(function() {
                                    $("#inicioAdicional").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="conclusionAdicional" class=" control-label">Conclusión:<span class="text-danger">*</span></label>
                            <div >    
                            <div>
                            <input type="text"  class="form-control "  id="tipo_curso" name="tipo_curso"  value="<?= isset($capacitacion->conclusion_adicional) ? $capacitacion->conclusion_adicional : ''  ?>">
                            </div>
                            <script type="text/javascript">
                                $(function() {
                                    $("#conclusionAdicional").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="duracion_horas" class=" control-label">Duración en horas:<span class="text-danger">*</span></label>
                            <div >    
                            <div >    
                                  <input type="text"  class="form-control "  id="duracion_horas" name="duracion_horas"  value="<?= isset($capacitacion->duracion_horas_adicional) ? $capacitacion->duracion_horas_adicional : ''  ?>">
                            
                        </div>
                          
                        </div>
                    </div>
                </div>
                    </div>
            </div>
            <hr class="mt-3 mb-3" />
            <div id="CardDatosAdicionalB">
            </div>
        </form>
    </div>
</div>
<div class="card card-primary" id="cardCapIdiomas">
    <div class="card-header">
        <h3 class="card-title">IDIOMAS O DIALECTOS</h3>
        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunoIDIOMAS">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-idioma" id="btnAdddadicionalIdioma">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
<form class="form-horizontal" id="IDIOMAS">
    <div id="CardIdiomas">
        <div class="row">
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="idioma" class="control-label">Idioma o Dialecto: <span class="text-danger">*</span></label>
                    <div>
                    <select class="form-control" id="idioma" name="idioma">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if (!empty($idioma)) :
                                foreach ($idioma as  $a) {
                            ?>
                                    <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                            <?php
                                }
                            endif; ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#idioma").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="lectura" class=" control-label">% Lectura:<span class="text-danger">*</span></label>
                    <div >    
                    <select class="form-control" id="lectura" name="lectura">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($porsentajeIdioma)) :
                            foreach ($porsentajeIdioma as  $a) {
                        ?>
                                <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#lectura").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
            </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="escritura" class=" control-label">% Escritura:<span class="text-danger">*</span></label>
                    <div >    
                    <select class="form-control" id="escritura" name="escritura">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($porsentajeIdioma)) :
                            foreach ($porsentajeIdioma as  $a) {
                        ?>
                                <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#escritura").select2({
                                theme: "bootstrap4",
                                width: "100%"
                            });
                        });
                    </script>
                </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="conversacion" class=" control-label">% Conversación:<span class="text-danger">*</span></label>
                    <div >    
                    <select class="form-control" id="conversacion" name="conversacion">
                        <option value="">Selecciona una Opcion</option>
                        <?php
                        if (!empty($porsentajeIdioma)) :
                            foreach ($porsentajeIdioma as  $a) {
                        ?>
                                <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                        <?php
                            }
                        endif; ?>
                    </select>
                                  <script>
                        $(document).ready(function() {
                            $("#conversacion").select2({
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
    <hr class="mt-3 mb-3" />
            <div id="CardIdiomasB">
            </div>
</form>        
    </div>
</div>

<div class="card card-primary" id="cardCapHAbilidades">
    <div class="card-header">
        <h3 class="card-title">HABILIDADES Y APTITUDES</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunHABILIDAD">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-hab" id="btnAdddHABILIDAD">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="HABILIDAD">
            <div id="CardDatosHabilidad">
                <div class="row">
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="tipo_habilidad" class="control-label">Tipo: <span class="text-danger">*</span></label>
                            <div>
                            <select class="form-control" id="tipo_habilidad" name="tipo_habilidad">
                                    <option value="">Selecciona una Opcion</option>
                                    <?php
                                    if (!empty($tipo_habilidad)) :
                                        foreach ($tipo_habilidad as  $a) {
                                    ?>
                                            <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                    <?php
                                        }
                                    endif; ?>
                                </select>
                                <script>
                                    $(document).ready(function() {
                                        $("#tipo_habilidad").select2({
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
                            <label for="especificacion" class=" control-label">Especifique:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="especificacion" name="especificacion"  value="<?= isset($capacitacion->especifique_habilidad) ? $capacitacion->especifique_habilidad : ''  ?>">
                            
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="grado_habilidadCap" class="control-label">Grado de aptitude o dominio: <span class="text-danger">*</span></label>
                            <div>
                            <select class="form-control" id="grado_habilidadCap" name="grado_habilidadCap">
                                    <option value="">Selecciona una Opcion</option>
                                    <?php
                                    if (!empty($grado_habilidad)) :
                                        foreach ($grado_habilidad as  $a) {
                                    ?>
                                            <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                    <?php
                                        }
                                    endif; ?>
                                </select>
                                <script>
                                    $(document).ready(function() {
                                        $("#grado_habilidadCap").select2({
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
            <hr class="mt-3 mb-3" />
            <div id="CardDatosHabilidadB">
            </div>
        </form>
    </div>
</div>
<div class="card card-primary" id="cardCapAfiliacion">
    <div class="card-header">
        <h3 class="card-title">AFILIACION A AGRUPACIONES</h3>

        <div class="card-tools">

            <a href="#" class="btn btn-tool form-check-label">Ninguno</a>&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="form-check-input mt-2" id="btnNingunAFILIACION">

            <a href="#" class="btn btn-tool form-check-label add-more-btn-afil" id="btnAdddAFILIACION">Agregar +</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">


        <form class="form-horizontal" id="AFILIACION">

            <div id="CardDatosAfiliacion">
                <div class="row">
                    <div class='col-12 col-sm-12 col-md-12'>
                        <div class="form-group">
                            <label for="nombre" class=" control-label">Nombre:<span class="text-danger">*</span></label>
                            <div >    
                                  <input type="text"  class="form-control "  id="nombre" name="nombre"  value="<?= isset($capacitacion->nombre_agrupacion) ? $capacitacion->nombre_agrupacion : ''  ?>">
                            
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="tipoAgrupa" class=" control-label">Tipo:<span class="text-danger">*</span></label>
                            <div >    
                            <select class="form-control" id="tipoAgrupa" name="tipoAgrupa">
                                <option value="">Selecciona una Opcion</option>
                                <?php
                                if (!empty($tipo_agrupacion)) :
                                    foreach ($tipo_agrupacion as  $a) {
                                ?>
                                        <option value="<?= $a->id ?>"><?= $a->valor ?></option>
                                <?php
                                    }
                                endif; ?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipoAgrupa").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="desde" class=" control-label">Desde:<span class="text-danger">*</span></label>
                            <div >    
                            <div >    
                                  <input type="text"  class="form-control "  id="desde" name="desde"  value="<?= isset($capacitacion->desde) ? $capacitacion->desde : ''  ?>">
                            
                        </div>
                            <script type="text/javascript">
                                $(function() {
                                    $("#desde").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="hasta" class=" control-label">Hasta:<span class="text-danger">*</span></label>
                            <div >    
                            <div >    
                                  <input type="text"  class="form-control "  id="desde" name="desde"  value="<?= isset($capacitacion->hasta) ? $capacitacion->hasta : ''  ?>">
                            
                        </div>
                            <script type="text/javascript">
                                $(function() {
                                    $("#hasta").datetimepicker({
                                        format: 'DD-MM-YYYY',
                                        locale: moment.locale('es')
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-3 mb-3" />
            <div id="CardDatosAfiliacionB">
            </div>
        </form>
    </div>
</div>
<div class="card-footer bg-transparent clearfix">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9">

        </div>
        <div class="col-12 col-sm-6 col-md-3 ">
            <button id="saveCapacitaciones" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Guardar</button>
        </div>
    </div>
</div>


<script>
    $('#saveCapacitaciones').click(function(event) {
        event.preventDefault();
        $('#load').addClass("spinner-border");

        var idPersonal = $('#idPersonal').val()
        var csrfName = $("input[name=app_csrf]").val();

        var formData = new FormData();

        if($('#btnNingunocapa').is(':checked')) {
            valPublica = 1;
            
        } else {
            valPublica = 0;

            var formDataB = new FormData($("form#Capacitaciones")[0]);


            for (let [key, value] of formDataB.entries()) {
                formData.append(key, value);
            }
            
        }


        if($('#btnNingunOADICIONAL').is(':checked')) {
            valCapacitacion = 1;
            
        } else {
            valCapacitacion = 0;

            var formDataC = new FormData($("form#adicional")[0]);


            for (let [key, value] of formDataC.entries()) {
                formData.append(key, value);
            }
            
        }

        if($('#btnNingunoIDIOMAS').is(':checked')) {
            valIdioma = 1;
            
        } else {
            valIdioma = 0;

            var formDataD = new FormData($("form#IDIOMAS")[0]);


            for (let [key, value] of formDataD.entries()) {
                formData.append(key, value);
            }
            
        }

        if($('#btnNingunHABILIDAD').is(':checked')) {
            valHabilidad = 1;
            
        } else {
            valHabilidad = 0;

            var formDataF = new FormData($("form#HABILIDAD")[0]);


            for (let [key, value] of formDataF.entries()) {
                formData.append(key, value);
            }
            
        }

        if($('#btnNingunAFILIACION').is(':checked')) {
            valAfiliacion = 1;
            
        } else {
            valAfiliacion = 0;

            var formDataD = new FormData($("form#AFILIACION")[0]);


            for (let [key, value] of formDataD.entries()) {
                formData.append(key, value);
            }
            
        }

        formData.append('idPersonal', idPersonal);
        formData.append('app_csrf', csrfName);

        formData.append('publica', valPublica);
        formData.append('capacitacion', valCapacitacion);
        formData.append('valIdioma', valIdioma);
        formData.append('habilidad', valHabilidad);
        formData.append('afiliacion', valAfiliacion);

        $.ajax({
            url: base_url + '/GuardarCapacitaciones',
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


                    $("input[name=app_csrf]").val('<?= csrf_hash() ?>');

                    toastr.success(response.succes.mensaje);

                    $('#saveCapacitaciones').addClass("btn-success");
                    $('#saveCapacitaciones').prop("disabled", true);
                    $('#saveCapacitaciones').html("Guardado&nbsp;<i class='fa fa-thumbs-up'></i>");

                    $("html,body").animate({
                        scrollTop: $("#cardSancionesEst").offset().top
                    }, 2000);

                    $('#tabs a[href="#custom-normal"]').trigger('click');



                } else if (response.dontsucces.error == 'error') {

                    toastr.error(response.dontsucces.mensaje);

                } else if (Object.keys(response.error).length > 0) {

                    for (var clave in response.error) {

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardCapPublica #" + clave + "");

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardCapAdicional #" + clave + "");

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardCapIdiomas #" + clave + "");

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardCapHAbilidades #" + clave + "");

                        $("<div class='errorField text-danger'>" + response.error[clave] + "</div>").insertAfter("#cardCapAfiliacion #" + clave + "");

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

    $(document).on('click', '.add-more-btn-public', function() {

        var clone = '<div class="row">   <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">    <label for="dependenciaB" class=" control-label">Dependencia responsable:<span class="text-danger">*</span></label>   <input type="text" class="form-control " id="dependenciaB" name="dependenciaB">   </div>  </div>   <div class="col-12 col-sm-12 col-md-6">    <div class="form-group">    <label for="institucionB" class=" control-label">Institución Capacitadora:<span class="text-danger">*</span></label>   <input type="text" class="form-control " id="institucionB" name="institucionB">   </div>  </div>   <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">    <label for="nombre_cursoB" class=" control-label">Nombre del curso:<span class="text-danger">*</span></label>    <input type="text" class="form-control " id="nombre_cursoB" name="nombre_cursoB">   </div>   </div>   <div class="col-12 col-sm-12 col-md-6">   <div class="form-group"><label for="tema_cursoB" class=" control-label">Tema del curso:<span class="text-danger">*</span></label>   <input type="text" class="form-control " id="tema_cursoB" name="tema_cursoB">   </div>   </div>    <div class="col-6 col-sm-6">    <div class="form-group">    <label for="nivel_cursoB" class="control-label">Nivel del curso recibido: <span class="text-danger">*</span></label>    <div>    <select class="form-control" id="nivel_cursoB" name="nivel_cursoB">     <option value="">Selecciona una Opcion</option>    <?php   if (!empty($nivel_curso)) :  foreach ($nivel_curso as  $a) {    ?>    <option value="<?= $a->id ?>"><?= $a->valor ?></option>    <?php    }    endif; ?>    <\/select>    <script>    $(document).ready(function() { $("#nivel_cursoB").select2({    theme: "bootstrap4",     width: "100%"    });   });     <\/script> </div>    </div>   </div>   <div class="col-6 col-sm-6"> <div class="form-group">    <label for="eficienciaCursosB" class="control-label">Eficiencia terminal: <span class="text-danger">*</span></label>   <div>    <select class="form-control" id="eficienciaCursosB" name="eficienciaCursosB">    <option value="">Selecciona una Opcion</option>    <?php    if (!empty($eficiencia)) :   foreach ($eficiencia as  $a) {   ?>    <option value="<?= $a->id ?>"><?= $a->valor ?></option>    <?php    }    endif; ?> </select>   <script>    $(document).ready(function() {   $("#eficienciaCursosB").select2({    theme: "bootstrap4",    width: "100%"    });    });     <\/script>    </div>   </div> </div>    <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">    <label for="inicioB" class=" control-label">inicio:<span class="text-danger">*</span></label>    <div class="input-group date" id="inicioB" data-target-input="nearest">    <input type="text" required class="form-control datetimepicker-input" data-target="#inicioB" id="datetime-inicioB" name="inicioB" placeholder="" value="" />    <div class="input-group-append" data-target="#inicioB" data-toggle="datetimepicker"> <div class="input-group-text"><i class="far fa-calendar"></i></div>    </div>   </div>    <script type="text/javascript">    $(function() {    $("#inicioB").datetimepicker({    format: "DD-MM-YYYY", locale: moment.locale("es")    });    });    <\/script>    </div>   </div>   <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">   <label for="conclusionB" class=" control-label">Conclusión:<span class="text-danger">*</span></label>    <div class="input-group date" id="conclusionB" data-target-input="nearest">    <input type="text" required class="form-control datetimepicker-input" data-target="#conclusionB" id="datetime-conclusionB" name="conclusionB" placeholder="" value="" />    <div class="input-group-append" data-target="#conclusionB" data-toggle="datetimepicker">   <div class="input-group-text"><i class="far fa-calendar"></i></div>    </div>   </div>     <script type="text/javascript">    $(function() {    $("#conclusionB").datetimepicker({    format: "DD-MM-YYYY",    locale: moment.locale("es")    });    });    <\/script>  </div>   </div>  <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">  <label for="duracionB" class=" control-label">Duración en horas:<span class="text-danger">*</span></label>   <input type="text" class="form-control " id="duracionB" name="duracionB" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">   </div>   </div>   <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">   <label for="comprobanteB" class=" control-label">Tipo de comprobante:<span class="text-danger">*</span></label>   <input type="text" class="form-control " id="comprobanteB" name="comprobanteB">   </div>  </div> </div>';
        $('#CardDatoscapacitacionB').append(clone);
        $('#btnAdddcapacitacion').removeClass('add-more-btn-public');
        $('#btnAdddcapacitacion').addClass('remove-more-btn-public');
        $('#btnAdddcapacitacion').text('Remover -');
    });

    $(document).on('click', '.remove-more-btn-public', function() {
        $('#CardDatoscapacitacionB').empty();
        $('#btnAdddcapacitacion').removeClass('remove-more-btn-public');
        $('#btnAdddcapacitacion').addClass('add-more-btn-public');
        $('#btnAdddcapacitacion').text('Agregar +');
    });

    $(document).on('click', '#btnNingunocapa', function() {

        if ($('#btnNingunocapa').is(':checked')) {


            $('#Capacitaciones input').attr('disabled', 'disabled');
            $('#Capacitaciones select').attr('disabled', 'disabled');
        } else {
            $('#Capacitaciones input').attr('disabled', false);
            $('#Capacitaciones select').attr('disabled', false);
        }

    });

    /*ADICIONAL */

    $(document).on('click', '.add-more-btn-adi', function() {

        var clone = '<div class="row">   <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">   <label for="empresaB" class=" control-label">Insitutción o Empresa:<span class="text-danger">*</span></label>    <input type="text" class="form-control " id="empresaB" name="empresaB"> </div>  </div>    <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">   <label for="cursoB" class=" control-label">Estudio o Curso:<span class="text-danger">*</span></label>    <input type="text" class="form-control " id="cursoB" name="cursoB">    </div>   </div>   <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">    <label for="tipo_cursoB" class=" control-label">Tipo de curso:<span class="text-danger">*</span></label>   <input type="text" class="form-control " id="tipo_cursoB" name="tipo_cursoB">   </div>   </div>    <div class="col-6 col-sm-6">    <div class="form-group">    <label for="cuso_tomadoB" class="control-label">¿El curso fue?: <span class="text-danger">*</span></label>    <div>   <select class="form-control" id="cuso_tomadoB" name="cuso_tomadoB">   <option value="">Selecciona una Opcion</option>    <?php   if (!empty($cuso_tomado)) :   foreach ($cuso_tomado as  $a) {    ?>    <option value="<?= $a->id ?>"><?= $a->valor ?></option>    <?php     }   endif; ?>    </select>   <script>   $(document).ready(function() {    $("#cuso_tomadoB").select2({    theme: "bootstrap4",    width: "100%"    });    });    <\/script>    </div>   </div>   </div> <div class="col-6 col-sm-6">  <div class="form-group">    <label for="eficienciaB" class="control-label">eficiencia terminal: <span class="text-danger">*</span></label>    <div>    <select class="form-control" id="eficienciaB" name="eficienciaB">   <option value="">Selecciona una Opcion</option>    <?php    if (!empty($eficiencia)) :    foreach ($eficiencia as  $a) {    ?>    <option value="<?= $a->id ?>"><?= $a->valor ?></option>    <?php    }    endif; ?>    </select>   <script>    $(document).ready(function() {    $("#eficienciaB").select2({     theme: "bootstrap4",    width: "100%"    });    });   <\/script>  </div>   </div>   </div>  <div class="col-12 col-sm-12 col-md-6">  <div class="form-group">   <label for="inicioAdicionalB" class=" control-label">Inicio:<span class="text-danger">*</span></label>  <div class="input-group date" id="inicioAdicionalB" data-target-input="nearest">     <input type="text" required class="form-control datetimepicker-input" data-target="#inicioAdicionalB" id="datetime-inicioAdicionalB" name="inicioAdicionalB" placeholder="" value="" /> <div class="input-group-append" data-target="#inicioAdicionalB" data-toggle="datetimepicker">    <div class="input-group-text"><i class="far fa-calendar"></i></div>    </div>    </div>   <script type="text/javascript"> $(function() {   $("#inicioAdicionalB").datetimepicker({    format: "DD-MM-YYYY",     locale: moment.locale("es")    });    });   <\/script>   </div>  </div> <div class="col-12 col-sm-12 col-md-6"> <div class="form-group">    <label for="conclusionAdicionalB" class=" control-label">Conclusión:<span class="text-danger">*</span></label>   <div class="input-group date" id="conclusionAdicionalB" data-target-input="nearest">    <input type="text" required class="form-control datetimepicker-input" data-target="#conclusionAdicionalB" id="datetime-conclusionAdicionalB" name="conclusionAdicionalB" placeholder="" value="" />   <div class="input-group-append" data-target="#conclusionAdicionalB" data-toggle="datetimepicker">    <div class="input-group-text"><i class="far fa-calendar"></i></div>   </div> </div>  <script type="text/javascript">   $(function() {    $("#conclusionAdicionalB").datetimepicker({    format: "DD-MM-YYYY",    locale: moment.locale("es")    });   });   <\/script>  </div>  </div>  <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">    <label for="duracion_horasB" class=" control-label">Duración en horas:<span class="text-danger">*</span></label>   <input type="text" class="form-control " id="duracion_horasB" name="duracion_horasB" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">  </div>   </div> </div>';
        $('#CardDatosAdicionalB').append(clone);
        $('#btnAdddadicional').removeClass('add-more-btn-adi');
        $('#btnAdddadicional').addClass('remove-more-btn-adi');
        $('#btnAdddadicional').text('Remover -');
    });

    $(document).on('click', '.remove-more-btn-adi', function() {
        $('#CardDatosAdicionalB').empty();
        $('#btnAdddadicional').removeClass('remove-more-btn-adi');
        $('#btnAdddadicional').addClass('add-more-btn-adi');
        $('#btnAdddadicional').text('Agregar +');
    });

    $(document).on('click', '#btnNingunOADICIONAL', function() {

        if ($('#btnNingunOADICIONAL').is(':checked')) {


            $('#adicional input').attr('disabled', 'disabled');
            $('#adicional select').attr('disabled', 'disabled');
        } else {
            $('#adicional input').attr('disabled', false);
            $('#adicional select').attr('disabled', false);
        }


    });


    $(document).on('click', '.add-more-btn-idioma', function() {


        var clone = '<div class="row">   <div class="col-6 col-sm-6">    <div class="form-group">    <label for="idiomaB" class="control-label">Idioma o Dialecto: <span class="text-danger">*</span></label>   <div>   <select class="form-control" id="idiomaB" name="idiomaB">   <option value="">Selecciona una Opcion</option>  <?php   if (!empty($idioma)) :   foreach ($idioma as  $a) {    ?>     <option value="<?= $a->id ?>"><?= $a->valor ?></option>    <?php    }    endif; ?>    </select>    <script>    $(document).ready(function() {   $("#idiomaB").select2({    theme: "bootstrap4",    width: "100%"   });    });    <\/script>    </div>   </div>   </div>  <div class="col-6 col-sm-12 col-md-6">  <div class="form-group">   <label for="lecturaB" class=" control-label">% Lectura:<span class="text-danger">*</span></label>   <select class="form-control" id="lecturaB" name="lecturaB">     <option value="">Selecciona una Opcion</option>    <?php    if (!empty($porsentajeIdioma)) :    foreach ($porsentajeIdioma as  $a) {   ?>    <option value="<?= $a->id ?>"><?= $a->valor ?></option>   <?php   }    endif; ?>    </select>    <script>    $(document).ready(function() {    $("#lecturaB").select2({    theme: "bootstrap4",    width: "100%"    });    });    <\/script>    </div>   </div>  <div class="col-6 col-sm-12 col-md-6">  <div class="form-group">   <label for="escrituraB" class=" control-label">% Escritura:<span class="text-danger">*</span></label>   <select class="form-control" id="escrituraB" name="escrituraB">  <option value="">Selecciona una Opcion</option>   <?php    if (!empty($porsentajeIdioma)) :   foreach ($porsentajeIdioma as  $a) {   ?>    <option value="<?= $a->id ?>"><?= $a->valor ?></option>    <?php    }    endif; ?>  </select>  <script>   $(document).ready(function() {   $("#escrituraB").select2({    theme: "bootstrap4",    width: "100%"    });    });   <\/script>    </div>  </div> <div class="col-6 col-sm-12 col-md-6">  <div class="form-group">   <label for="conversacionB" class=" control-label">% Conversación:<span class="text-danger">*</span></label>   <select class="form-control" id="conversacionB" name="conversacionB">  <option value="">Selecciona una Opcion</option>  <?php   if (!empty($porsentajeIdioma)) :    foreach ($porsentajeIdioma as  $a) {   ?>    <option value="<?= $a->id ?>"><?= $a->valor ?></option>   <?php    }     endif; ?>   </select>    <script>    $(document).ready(function() {    $("#conversacionB").select2({    theme: "bootstrap4",    width: "100%"    });    });   <\/script>   </div>   </div> </div>';
        $('#CardIdiomasB').append(clone);
        $('#btnAdddadicionalIdioma').removeClass('add-more-btn-idioma');
        $('#btnAdddadicionalIdioma').addClass('remove-more-btn-idioma');
        $('#btnAdddadicionalIdioma').text('Remover -');
    });

    $(document).on('click', '.remove-more-btn-idioma', function() {
        $('#CardIdiomasB').empty();
        $('#btnAdddadicionalIdioma').removeClass('remove-more-btn-idioma');
        $('#btnAdddadicionalIdioma').addClass('add-more-btn-idioma');
        $('#btnAdddadicionalIdioma').text('Agregar +');
    });

    $(document).on('click', '#btnNingunoIDIOMAS', function() {

        if ($('#btnNingunoIDIOMAS').is(':checked')) {


            $('#IDIOMAS input').attr('disabled', 'disabled');
            $('#IDIOMAS select').attr('disabled', 'disabled');
        } else {
            $('#IDIOMAS input').attr('disabled', false);
            $('#IDIOMAS select').attr('disabled', false);

        }
    });

    /*HABILIDADES */

    $(document).on('click', '.add-more-btn-hab', function() {


        var clone = '<div class="row">  <div class="col-6 col-sm-6">  <div class="form-group">  <label for="tipo_habilidadB" class="control-label">Tipo: <span class="text-danger">*</span></label>  <div>   <select class="form-control" id="tipo_habilidadB" name="tipo_habilidadB">    <option value="">Selecciona una Opcion</option>    <?php  if (!empty($tipo_habilidad)) :    foreach ($tipo_habilidad as  $a) {  ?>   <option value="<?= $a->id ?>"><?= $a->valor ?></option>   <?php     }    endif; ?>     </select>    <script>   $(document).ready(function() {   $("#tipo_habilidadB").select2({   theme: "bootstrap4",   width: "100%"   });   });    <\/script>   </div>    </div>  </div>  <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">   <label for="especificacionB" class=" control-label">Especifique:<span class="text-danger">*</span></label>    <input type="text" class="form-control " id="especificacionB" name="especificacionB">   </div>   </div>  <div class="col-6 col-sm-6">  <div class="form-group">    <label for="grado_habilidadCapB" class="control-label">Grado de aptitude o dominio: <span class="text-danger">*</span></label>   <div>   <select class="form-control" id="grado_habilidadCapB" name="grado_habilidadCapB">   <option value="">Selecciona una Opcion</option>  <?php   if (!empty($grado_habilidad)) :    foreach ($grado_habilidad as  $a) {  ?>    <option value="<?= $a->id ?>"><?= $a->valor ?></option>    <?php    }    endif; ?>   </select>   <script>   $(document).ready(function() {   $("#grado_habilidadCapB").select2({   theme: "bootstrap4",   width: "100%"   });    });   <\/script>  </div>  </div>   </div>  </div>';
        $('#CardDatosHabilidadB').append(clone);
        $('#btnAdddHABILIDAD').removeClass('add-more-btn-hab');
        $('#btnAdddHABILIDAD').addClass('remove-btn-hab');
        $('#btnAdddHABILIDAD').text('Remover -');
    });

    $(document).on('click', '.remove-btn-hab', function() {
        $('#CardDatosHabilidadB').empty();
        $('#btnAdddHABILIDAD').removeClass('remove-btn-hab');
        $('#btnAdddHABILIDAD').addClass('add-more-btn-hab');

        $('#btnAdddHABILIDAD').text('Agregar +');
    });

    $(document).on('click', '#btnNingunHABILIDAD', function() {

        if ($('#btnNingunHABILIDAD').is(':checked')) {


            $('#HABILIDAD input').attr('disabled', 'disabled');
            $('#HABILIDAD select').attr('disabled', 'disabled');
        } else {
            $('#HABILIDAD input').attr('disabled', false);
            $('#HABILIDAD select').attr('disabled', false);
        }


    });

    /*AFILIACION */

    $(document).on('click', '.add-more-btn-afil', function() {

      var clone = '<div class="row"> <div class="col-12 col-sm-12 col-md-12">  <div class="form-group">   <label for="nombreB" class=" control-label">Nombre:<span class="text-danger">*</span></label>  <input type="text" class="form-control " id="nombreB" name="nombreB">  </div>  </div>   <div class="col-12 col-sm-12 col-md-6">  <div class="form-group">  <label for="tipoAgrupaB" class=" control-label">Tipo:<span class="text-danger">*</span></label>  <select class="form-control" id="tipoAgrupaB" name="tipoAgrupaB">  <option value="">Selecciona una Opcion</option>    <?php  if (!empty($tipo_agrupacion)) :   foreach ($tipo_agrupacion as  $a) {   ?>    <option value="<?= $a->id ?>"><?= $a->valor ?></option>   <?php    }   endif; ?>   </select>   <script>   $(document).ready(function() {   $("#tipoAgrupaB").select2({  theme: "bootstrap4",   width: "100%"  });   });  <\/script>  </div>  </div> <div class="col-12 col-sm-12 col-md-6">   <div class="form-group">     <label for="desdeB" class=" control-label">Desde:<span class="text-danger">*</span></label>    <div class="input-group date" id="desdeB" data-target-input="nearest">    <input type="text" required class="form-control datetimepicker-input" data-target="#desdeB" id="datetime-desdeB" name="desdeB" placeholder="" value="" />    <div class="input-group-append" data-target="#desdeB" data-toggle="datetimepicker">    <div class="input-group-text"><i class="far fa-calendar"></i></div>    </div>    </div>   <script type="text/javascript">   $(function() {   $("#desdeB").datetimepicker({    format: "DD-MM-YYYY",    locale: moment.locale("es")    });   });    <\/script>   </div>   </div> <div class="col-12 col-sm-12 col-md-6">  <div class="form-group">  <label for="hastaB" class=" control-label">Hasta:<span class="text-danger">*</span></label>   <div class="input-group date" id="hastaB" data-target-input="nearest">     <input type="text" required class="form-control datetimepicker-input" data-target="#hastaB" id="datetime-hastaB" name="hastaB" placeholder="" value="" />   <div class="input-group-append" data-target="#hastaB" data-toggle="datetimepicker">    <div class="input-group-text"><i class="far fa-calendar"></i></div>   </div>   </div>   <script type="text/javascript">    $(function() {    $("#hastaB").datetimepicker({    format: "DD-MM-YYYY",   locale: moment.locale("es")   });   });   <\/script>  </div>  </div> </div>';
        $('#CardDatosAfiliacionB').append(clone);
        $('#btnAdddAFILIACION').removeClass('add-more-btn-afil');
        $('#btnAdddAFILIACION').addClass('remove-more-btn-afil');
        $('#btnAdddAFILIACION').text('Remover -');
    });

    $(document).on('click', '.remove-more-btn-afil', function() {
        $('#CardDatosAfiliacionB').empty();
        $('#btnAdddAFILIACION').removeClass('remove-more-btn-afil');
        $('#btnAdddAFILIACION').addClass('add-more-btn-afil');
        $('#btnAdddAFILIACION').text('Agregar +');
    });

    $(document).on('click', '#btnNingunAFILIACION', function() {

        if ($('#btnNingunAFILIACION').is(':checked')) {



            $('#AFILIACION input').attr('disabled', 'disabled');
            $('#AFILIACION select').attr('disabled', 'disabled');
        } else {
            $('#AFILIACION input').attr('disabled', false);
            $('#AFILIACION select').attr('disabled', false);
        }

    });


</script>