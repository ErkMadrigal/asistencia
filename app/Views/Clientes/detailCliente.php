<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DETALLE DATOS GENERALES</h3>

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
                        <?= $cliente->razon_social ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_corto" class=" control-label">Nombre Corto: </label>
                        <div>
                        <?= $cliente->nombre_corto ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="nombre_contacto" class=" control-label">Nombre del contacto:</label>
                        <div>
                        <?= $cliente->nombre_contacto ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="puesto_contacto" class=" control-label">cliente del Contacto:</label>
                        <div>
                        <?= $cliente->puesto ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="whatsApp" class=" control-label">WhatsApp:</label>
                    <div>
                        <?= $cliente->whatsapp ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="telefono_oficina" class=" control-label">Teléfono Oficina:</label>
                        <div>
                        <?= $cliente->tel_oficina ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="email" class=" control-label">Email:</label>
                        <div>
                        <?= $cliente->email ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_inicio_servicio">Fecha de Inicio Servicio: </label>
                        <div class="input-group date" id="fecha_fin_servicio" data-target-input="nearest">
                            <?= $cliente->fecha_inicio ?>
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
                            <?= $cliente->fecha_fin ?>
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
        <h3 class="card-title"> DETALLE DATOS DEL DOMICILIO</h3>

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
                    <?= $cliente->calle_num ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigo" class=" control-label">Código Postal :</label>
                    <div>
                    <?= $cliente->idCodigoPostal ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigo" class=" control-label">Colonia:</label>
                    <div>
                    <?= $cliente->colonia ?>
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
                        <?= $cliente->municipio ?>
                        
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
                        <?= $cliente->ciudad ?>
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
                        <?= $cliente->estado ?>
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
                    <?= $cliente->rfc ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="calleFiscales" class=" control-label">Calle y Número:</label>
                    <div>
                    <?= $cliente->calle_num_fiscal ?>
                    </div>
                </div>
            </div>

            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigoDatosFis" class=" control-label">Código Postal :</label>
                    <div>
                    <?= $cliente->idCodigoPostal_fiscal ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigoDatosFis" class=" control-label">Colonia:</label>
                    <div>
                    <?= $cliente->colonia_fiscal ?>
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
                        <?= $cliente->municipio_fiscal ?>
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
                        <?= $cliente->ciudad_fiscal ?>
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
                        <?= $cliente->estado_fiscal ?>
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
                    <label for="Activo" class="control-label">Activo: </label>
                    <div class="form-check">
                        <input class="" onclick="return false;" type="checkbox" <?= ($cliente->activo == 1 ? "checked" : "") ?>>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="card-footer  clearfix  ">
        <div class="row callout callout-warning">
            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="fa fa-user " aria-hidden="true"></i>
                    <label for="creado" class="control-label">Creado por: </label>
                    <div>
                        <?= $cliente->createdby ?>
                    </div>
                </div>
            </div>

            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="fa fa-calendar " aria-hidden="true"></i>
                    <label for="createddate" class="control-label">Fecha creación: </label>
                    <div>
                        <?= $cliente->createddate ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="fa fa-user " aria-hidden="true"></i>
                    <label for="actualizado" class="control-label">Actualizado por: </label>
                    <div>
                        <?= $cliente->updatedby ?>
                    </div>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="fa fa-calendar " aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Fecha actualización: </label>
                    <div>
                        <?= $cliente->updateddate ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>