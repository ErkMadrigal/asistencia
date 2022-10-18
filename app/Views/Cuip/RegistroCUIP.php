<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="col-md-12">
    <div id="load" class=" spinner text-secondary" role="status">
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
                    <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill"
                        href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark"
                        aria-selected="false">Socio Economico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-tabs-five"
                        role="tab" aria-controls="custom-tabs-five-normal" aria-selected="false">Referencias</a>
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
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content" id="custom-tabs-five-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-five-overlay" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-tab">

                    <?php echo view('Cuip/DatosPersonales') ?>

                </div>


                <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-dark-tab">

                    <?php echo view('Cuip/EstudioSocioEconomico') ?>  

                </div>


                <div class="tab-pane fade" id="custom-tabs-five" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-tab">
                    
                    <?php echo view('Cuip/Referencias') ?> 

                </div>

                <div class="tab-pane fade" id="custom-tabs-five-normal" role="tabpanel"
                    aria-labelledby="custom-tabs-five-normal-tab">
                    
                    <?php echo view('Cuip/EmpleosDiversos') ?>

                </div>


                <div class="tab-pane fade" id="custom-tabs" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-dark-tab">
                    
                    <?php echo view('Cuip/EmpleosSeguridadPublica') ?>

                </div>


                <div class="tab-pane fade" id="custom-overlay" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-dark-tab">

                    <?php echo view('Cuip/Capacitaciones') ?>  

                </div>

                <div class="tab-pane fade" id="custom-normal" role="tabpanel"
                    aria-labelledby="custom-tabs-five-overlay-tab">
                    
                    <?php echo view('Cuip/SancionesEstimulos') ?> 

                </div>
            </div>
        </div>
    </div>    
</div>


        <?= $this->endSection() ?>