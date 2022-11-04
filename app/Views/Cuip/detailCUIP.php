<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
    <div class=" mb-2">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/AddCUIP " class='nav-link'><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp;&nbsp;Capturar numero de CUIP</a>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/editarCuip?id=<?= $id ?>" class='nav-link'><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Editar CUIP</a>
            </div>
            <div class="col-12 col-sm-6 col-md-9 ">
            </div>
        </div>
    </div>
    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-five-overlay-tab" data-toggle="pill"
                        href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay"
                        aria-selected="true">Datos Personales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-tabs-five"
                        role="tab" aria-controls="custom-tabs-five-normal" aria-selected="false">Referencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill"
                        href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark"
                        aria-selected="false">Socio Economico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs"
                        role="tab" aria-controls="custom-tabs-five-normal" aria-selected="false">Empleos Seguridad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-normal-tab" data-toggle="pill"
                        href="#custom-tabs-five-normal" role="tab" aria-controls="custom-tabs-five"
                        aria-selected="false">Empleos Diversos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill"
                        href="#custom-overlay" role="tab" aria-controls="custom-tabs-five-normal"
                        aria-selected="false">Capacitaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-normal"
                        role="tab" aria-controls="custom-tabs-five-normal" aria-selected="false">Sanciones-Estimulos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-normal-mf"
                        role="tab" aria-controls="custom-tabs-five-normal" aria-selected="false">Media Filiación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-normal-ex"
                        role="tab" aria-controls="custom-tabs-five-normal" aria-selected="false">Expediente</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content" id="custom-tabs-five-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-five-overlay" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-tab">

                    <?php echo view('Cuip/DatosPersonalesDetail') ?>

                </div>
                <div class="tab-pane fade" id="custom-tabs-five" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-tab">
                    
                    <?php echo view('Cuip/ReferenciasDetail') ?> 

                </div>
                <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-dark-tab">

                    <?php echo view('Cuip/EstudioSocioEconomicoDetail') ?>  

                </div>
                <div class="tab-pane fade" id="custom-tabs-five-normal" role="tabpanel"
                    aria-labelledby="custom-tabs-five-normal-tab">
                    
                    <?php echo view('Cuip/EmpleosDiversosDetail') ?>

                </div>


                <div class="tab-pane fade" id="custom-tabs" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-dark-tab">
                    
                    <?php echo view('Cuip/EmpleosSeguridadPublicaDetail') ?>

                </div>


                <div class="tab-pane fade" id="custom-overlay" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-dark-tab">

                    <?php echo view('Cuip/CapacitacionDetail') ?>  

                </div>

                <div class="tab-pane fade" id="custom-normal" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-tab">
                    
                    <?php echo view('Cuip/SancionesEstimulosDetail') ?> 

                </div>
                <div class="tab-pane fade" id="custom-normal-mf" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-tab">
                    
                    <?php echo view('MediaFiliacion/mediaFiliacionDetail') ?> 

                </div>
                <div class="tab-pane fade" id="custom-normal-ex" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-tab">
                    
                    <?php echo view('CargaMasiva/cargaMasivaDetail') ?> 

                </div>
            </div>
        </div>
    </div>    



        <?= $this->endSection() ?>