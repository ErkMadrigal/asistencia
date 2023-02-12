<div class="card card-primary" id="cardCapPublica">
    <div class="card-header">
        <h3 class="card-title">CAPACITACIÓN EN SEGURIDAD PUBLICA</h3>

        <div class="card-tools">

            
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="Capacitaciones">
            <div id="CardDatoscapacitacion">
            <?php
        if( !empty($capacitacion_publica) ):
            
            foreach($capacitacion_publica as  $e){
                                        ?>  
                <div class="row">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="dependencia" class=" control-label">Dependencia responsable:</label>
                            <div>
                            <?= isset($e->dependencia) ? $e->dependencia : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="institucion" class=" control-label">Institución Capacitadora:</label>
                            <div>
                            <?= isset($e->inst_capacitadora) ? $e->inst_capacitadora : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="nombre_curso" class=" control-label">Nombre del curso:</label>
                            <div>
                            <?= isset($e->nombre_curso) ? $e->nombre_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="tema_curso" class=" control-label">Tema del curso:</label>
                            <div>
                            <?= isset($e->tema_curso) ? $e->tema_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="nivel_curso" class="control-label">Nivel del curso recibido: </label>
                            <div>
                            <?= isset($e->idNivel_curso) ? $e->idNivel_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="eficienciaCursos" class="control-label">Eficiencia terminal: </label>
                            <div>
                            <?= isset($e->idEficienciaCurso) ? $e->idEficienciaCurso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="inicio" class=" control-label">Inicio:</label>
                            <div>
                            <?= isset($e->inicio_curso) ? date( "d-m-Y" ,strtotime($e->inicio_curso)) : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="conclusion" class=" control-label">Conclusión:</label>
                            <div>
                            <?= isset($e->conclusion_curso) ? date( "d-m-Y" ,strtotime($e->conclusion_curso)) : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="duracion" class=" control-label">Duración en horas:</label>
                            <div>
                            <?= isset($e->duracion_horas_curso) ? $e->duracion_horas_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="comprobante" class=" control-label">Tipo de comprobante:</label>
                            <div>
                            <?= isset($e->tipo_comprobante) ? $e->tipo_comprobante : ''  ?>
                        </div>
                        </div>
                    </div>

                </div>
                <hr  class="mt-3 mb-3"/>
                <?php
            
        }
        endif;?>   
            </div>
            
        </form>
    </div>
</div>

<div class="card card-primary" id="cardCapAdicional">
    <div class="card-header">
        <h3 class="card-title">CAPACITACIÓN ADICIONAL
        </h3>

        <div class="card-tools">

           

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="adicional">
            <div id="CardDatosAdicional">
            <?php
        if( !empty($capacitacion) ):
            
            foreach($capacitacion as  $e){
                                        ?>            
                <div class="row">
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="empresa" class=" control-label">Insitutción o Empresa:</label>
                            <div>
                            <?= isset($e->institucion) ? $e->institucion : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="curso" class=" control-label">Estudio o Curso:</label>
                            <div>
                            <?= isset($e->curso) ? $e->curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="tipo_curso" class=" control-label">Tipo de curso:</label>
                            <div>
                            <?= isset($e->tipo_curso) ? $e->tipo_curso : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="cuso_tomado" class="control-label">¿El curso fue?: </label>
                            <div>
                            <?= isset($e->cursofue) ? $e->cursofue : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="eficiencia" class="control-label">Eficiencia terminal: </label>
                            <div>
                            <?= isset($e->adicional) ? $e->adicional : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="inicioAdicional" class=" control-label">Inicio:</label>
                            <div>
                            <?= isset($e->inicio_adicional) ? date( "d-m-Y" ,strtotime($e->inicio_adicional)) : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="conclusionAdicional" class=" control-label">Conclusión:</label>
                            <div>
                            <?= isset($e->conclusion_adicional) ? date( "d-m-Y" ,strtotime($e->conclusion_adicional)) : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="duracion_horas" class=" control-label">Duración en horas:</label>
                            <div>
                            <?= isset($e->duracion_horas_adicional) ? $e->duracion_horas_adicional : ''  ?>
                        </div>
                        </div>
                    </div>
                </div>
                <hr  class="mt-3 mb-3"/>
                <?php
            
        }
        endif;?>   
            </div>
            
        </form>
    </div>
</div>
<div class="card card-primary" id="cardCapIdiomas">
    <div class="card-header">
        <h3 class="card-title">IDIOMAS O DIALECTOS</h3>
        <div class="card-tools">

            

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
<form class="form-horizontal" id="IDIOMAS">
    <div id="CardIdiomas">
    <?php
        if( !empty($idiomas) ):
            
            foreach($idiomas as  $e){
                                        ?>  
        <div class="row">
            <div class='col-6 col-sm-6'>
                <div class="form-group">
                    <label for="idioma" class="control-label">Idioma o Dialecto: </label>
                    <div>
                            <?= isset($e->idIdioma) ? $e->idIdioma : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="lectura" class=" control-label">% Lectura:</label>
                    <div>
                            <?= isset($e->idIdiomaLectura) ? $e->idIdiomaLectura : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="escritura" class=" control-label">% Escritura:</label>
                    <div>
                            <?= isset($e->idIdiomaEscritura) ? $e->idIdiomaEscritura : ''  ?>
                        </div>
                </div>
            </div>
            <div class='col-6 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="conversacion" class=" control-label">% Conversación:</label>
                    <div>
                            <?= isset($e->idIdiomaConversacion) ? $e->idIdiomaConversacion : ''  ?>
                        </div>
                </div>
            </div>
        </div>
        <hr  class="mt-3 mb-3"/>
        <?php
            
        }
        endif;?>   
    </div>
            
</form>        
    </div>
</div>

<div class="card card-primary" id="cardCapHAbilidades">
    <div class="card-header">
        <h3 class="card-title">HABILIDADES Y APTITUDES</h3>

        <div class="card-tools">

            

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="HABILIDAD">
            <div id="CardDatosHabilidad">
            <?php
        if( !empty($habilidades) ):
            
            foreach($habilidades as  $e){
                                        ?>  
                <div class="row">
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="tipo_habilidad" class="control-label">Tipo: </label>
                            <div>
                            <?= isset($e->idTipoHabilidad) ? $e->idTipoHabilidad : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="especificacion" class=" control-label">Especifique:</label>
                            <div>
                            <?= isset($e->especifique_habilidad) ? $e->especifique_habilidad : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-6 col-sm-6'>
                        <div class="form-group">
                            <label for="grado_habilidadCap" class="control-label">Grado de aptitude o dominio: </label>
                            <div>
                            <?= isset($e->idGradoHabilidad) ? $e->idGradoHabilidad : ''  ?>
                        </div>
                        </div>
                    </div>
                </div>
                <hr  class="mt-3 mb-3"/>
                <?php
            
        }
        endif;?>   
            </div>
            
        </form>
    </div>
</div>
<div class="card card-primary" id="cardCapAfiliacion">
    <div class="card-header">
        <h3 class="card-title">AFILIACION A AGRUPACIONES</h3>

        <div class="card-tools">

            

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">


        <form class="form-horizontal" id="AFILIACION">

            <div id="CardDatosAfiliacion">
            <?php
        if( !empty($agrupaciones) ):
            
            foreach($agrupaciones as  $e){
                                        ?>  
                <div class="row">
                    <div class='col-12 col-sm-12 col-md-12'>
                        <div class="form-group">
                            <label for="nombre" class=" control-label">Nombre:</label>
                            <div>
                            <?= isset($e->nombre_agrupacion) ? $e->nombre_agrupacion : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="tipoAgrupa" class=" control-label">Tipo:</label>
                            <div>
                            <?= isset($e->idTipoAgrupacion) ? $e->idTipoAgrupacion : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="desde" class=" control-label">Desde:</label>
                            <div>
                            <?= isset($e->desde) ? date( "d-m-Y" ,strtotime($e->desde)) : ''  ?>
                        </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-12 col-md-6'>
                        <div class="form-group">
                            <label for="hasta" class=" control-label">Hasta:</label>
                            <div>
                            <?= isset($e->hasta) ? date( "d-m-Y" ,strtotime($e->hasta)) : ''  ?>
                        </div>
                        </div>
                    </div>
                </div>
                <hr  class="mt-3 mb-3"/>
                <?php
            
        }
        endif;?>   
            </div>
            
            
        </form>
    </div>
</div>