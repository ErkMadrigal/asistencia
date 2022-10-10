<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>

<?php

use CodeIgniter\HTTP\RequestInterface;
use App\Models\AdministradorModel;
use App\Libraries\Encrypt;

$encrypt = new Encrypt();

?>
<div id="load" class=" spinner text-secondary" role="status">
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Generales</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="Nombre" class="control-label">Complexión: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="complexion" name="complexion">
                                <option value="">Seleccionar Complexión</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#complexion").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="piel" class="control-label">Piel: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="piel" name="piel">
                                <option value="">Selecciona un tipo de Piel</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#piel").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="cara" class="control-label">Cara: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="cara" name="cara">
                                <option value="">Selecciona un tipo de Cara</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#cara").select2({
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
    <div class="card-header">
        <h3 class="card-title">Cabello</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="cantidad_cabello" class="control-label">Cantidad: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="cantidad_cabello" name="cantidad_cabello">
                                <option value="">Selecciona una cantidad de Cabello</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#cantidad_cabello").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="color_cabello" class="control-label">Color: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="color_cabello" name="color_cabello">
                                <option value="">Selecciona un color de Cabello</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#color_cabello").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_cabello" class="control-label">Forma: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="forma_cabello" name="forma_cabello">
                                <option value="">Seleccionar forma de Cabello</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#forma_cabello").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="calvicie_cabello" class="control-label">Calvicie: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="calvicie_cabello" name="calvicie_cabello">
                                <option value="">Seleccionar un tipo de Calvicie</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#calvicie_cabello").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="implatacion_cabello" class="control-label">Implantación: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="implatacion_cabello" name="implatacion_cabello">
                                <option value="">Seleccionar un tipo de Implantación</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#implatacion_cabello").select2({
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
    <div class="card-header">
        <h3 class="card-title">Frente</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="altura" class="control-label">Altura: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="altura" name="altura">
                                <option value="">Selecciona una Altura</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#altura").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="inclinacion" class="control-label">Inclinación: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="inclinacion" name="inclinacion">
                                <option value="">Selecciona una Inclinación</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#inclinacion").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="ancho" class="control-label">Ancho: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="ancho" name="ancho">
                                <option value="">Selecciona una Anchura</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ancho").select2({
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
    <div class="card-header">
        <h3 class="card-title">Cejas</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="direccion_cejas" class="control-label">Dirección: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="direccion_cejas" name="direccion_cejas">
                                <option value="">Selecciona una Dirección</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#direccion_cejas").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="implantacion_cejas" class="control-label">Implantacion: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="implantacion_cejas" name="implantacion_cejas">
                                <option value="">Selecciona una Implantación</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#implantacion_cejas").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma" class="control-label">Forma: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="forma" name="forma">
                                <option value="">Selecciona una Forma</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#forma").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tamanno" class="control-label">Tamaño: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tamanno" name="tamanno">
                                <option value="">Selecciona un Tamaño</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tamanno").select2({
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
    <div class="card-header">
        <h3 class="card-title">Ojos</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="color" class="control-label">Color: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="color" name="color">
                                <option value="">Selecciona un Color</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#color").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_ojos" class="control-label">Forma: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="forma_ojos" name="forma_ojos">
                                <option value="">Selecciona una Forma</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#forma_ojos").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tamanno_ojos" class="control-label">Tamaño: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tamanno_ojos" name="tamanno_ojos">
                                <option value="">Selecciona un Tamaño</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tamanno_ojos").select2({
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
    <div class="card-header">
        <h3 class="card-title">Nariz</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="raiz" class="control-label">Raíz: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="raiz" name="raiz">
                                <option value="">Selecciona una Raiz</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#raiz").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="dorso" class="control-label">Dorso: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="dorso" name="dorso">
                                <option value="">Selecciona un Dorso</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#dorso").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="ancho_nariz" class="control-label">Ancho: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="ancho_nariz" name="ancho_nariz">
                                <option value="">Selecciona una Anchura</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ancho_nariz").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="base_nariz" class="control-label">Base: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="base_nariz" name="base_nariz">
                                <option value="">Selecciona una Base</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#base_nariz").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="altura_nariz" class="control-label">Altura: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="altura_nariz" name="altura_nariz">
                                <option value="">Selecciona una Altura</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#altura_nariz").select2({
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
    <div class="card-header">
        <h3 class="card-title">Boca</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tamanno_boca" class="control-label">Tamaño: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tamanno_boca" name="tamanno_boca">
                                <option value="">Selecciona un Tamaño</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tamanno_boca").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="comisura_boca" class="control-label">Comisuras: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="comisura_boca" name="comisura_boca">
                                <option value="">Selecciona una Comisura</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#comisura_boca").select2({
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
    <div class="card-header">
        <h3 class="card-title">Labios</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="espesor_labios" class="control-label">Espesor: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="espesor_labios" name="espesor_labios">
                                <option value="">Selecciona un Espesor</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#espesor_labios").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="altura_labial" class="control-label">Altura Naso-Labial: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="altura_labial" name="altura_labial">
                                <option value="">Selecciona una Altura Naso-Labial</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#altura_labial").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="prominencia" class="control-label">Prominencia: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="prominencia" name="prominencia">
                                <option value="">Selecciona una Prominencia</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#prominencia").select2({
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
    <div class="card-header">
        <h3 class="card-title">Menton</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tipo_menton" class="control-label">Tipo: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tipo_menton" name="tipo_menton">
                                <option value="">Selecciona un Tipo</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipo_menton").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_menton" class="control-label">Forma: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="forma_menton" name="forma_menton">
                                <option value="">Selecciona una Forma</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#forma_menton").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="inclinacion_menton" class="control-label">Inclinación: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="inclinacion_menton" name="inclinacion_menton">
                                <option value="">Selecciona una Inclinación</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#inclinacion_menton").select2({
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
    <div class="card-header">
        <h3 class="card-title">Oreja Derecha</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="forma_ODerecha" class="control-label">Forma: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="forma_ODerecha" name="forma_ODerecha">
                                <option value="">Selecciona una Forma</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#forma_ODerecha").select2({
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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Helix</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
                <form class="form-horizontal" id="frmUsuario">
                    <div class="row">
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="original" class="control-label">Original: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="original" name="original">
                                        <option value="">Selecciona una Opcion</option>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#original").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="superior" class="control-label">Superior: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="superior" name="superior">
                                        <option value="">Selecciona una Opcion</option>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#superior").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="posterior" class="control-label">Posterior: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="posterior" name="posterior">
                                        <option value="">Selecciona una Opcion</option>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#posterior").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="adherencia" class="control-label">Adherencia: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="adherencia" name="adherencia">
                                        <option value="">Selecciona una Opcion</option>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#adherencia").select2({
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
            <div class="card-header">
                <h3 class="card-title">Lobulo</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
                <form class="form-horizontal" id="frmUsuario">
                    <div class="row">
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="contorno" class="control-label">Contorno: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="contorno" name="contorno">
                                        <option value="">Selecciona una Opcion</option>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#contorno").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="adherencia_lobulo" class="control-label">Adherencia: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="adherencia_lobulo" name="adherencia_lobulo">
                                        <option value="">Selecciona una Opcion</option>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#adherencia_lobulo").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="particularidad" class="control-label">Particularidad: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="particularidad" name="particularidad">
                                        <option value="">Selecciona una Opcion</option>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#particularidad").select2({
                                                theme: "bootstrap4",
                                                width: "100%"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class='col-6 col-sm-4'>
                            <div class="form-group">
                                <label for="dimension" class="control-label">Dimensión: <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" id="dimension" name="dimension">
                                        <option value="">Selecciona una Opcion</option>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#dimension").select2({
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
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Sangre</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tipo_sangre" class="control-label">Tipo: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tipo_sangre" name="tipo_sangre">
                                <option value="">Selecciona un Tipo</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipo_sangre").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="RH_sangre" class="control-label">RH: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="RH_sangre" name="RH_sangre">
                                <option value="">Selecciona un RH</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#RH_sangre").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="anteojos" class="control-label">Usa Anteojos: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="anteojos" name="anteojos">
                                <option value="">Selecciona si Usa Anteojos</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#anteojos").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="estatura" class="control-label">Estatura: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="estatura" name="estatura">
                                <option value="">Selecciona un Tipo</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estatura").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="peso" class="control-label">Peso: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="peso" name="peso">
                                <option value="">Selecciona un Tipo</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#peso").select2({
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
    <div class="card-header">
        <h3 class="card-title">Señas Paticulares</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmUsuario">
            <div class="row">
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="cicatrices" class="control-label">Cicatrices: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="cicatrices" name="cicatrices">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#cicatrices").select2({
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
                        <label for="cicatrices_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control " id="cicatrices_descripcion" name="cicatrices_descripcion"></textarea>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="tatuajes" class="control-label">Tatuajes: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="tatuajes" name="tatuajes">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tatuajes").select2({
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
                        <label for="tatuajes_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control " id="tatuajes_descripcion" name="tatuajes_descripcion"></textarea>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="lunares" class="control-label">Lunares: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="lunares" name="lunares">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#lunares").select2({
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
                        <label for="lunares_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control " id="lunares_descripcion" name="lunares_descripcion"></textarea>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="fisico" class="control-label">Defectos Fisicos: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="fisico" name="fisico">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#fisico").select2({
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
                        <label for="fisico_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control " id="fisico_descripcion" name="fisico_descripcion"></textarea>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="protesis" class="control-label">Protesis: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="protesis" name="protesis">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#protesis").select2({
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
                        <label for="protesis_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control " id="protesis_descripcion" name="protesis_descripcion"></textarea>
                    </div>
                </div>
                <div class='col-6 col-sm-4'>
                    <div class="form-group">
                        <label for="discapacidad" class="control-label">Discapacidad Física: <span class="text-danger">*</span></label>
                        <div>
                            <select class="form-control" id="discapacidad" name="discapacidad">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#discapacidad").select2({
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
                        <label for="discapacidad_descripcion" class=" control-label">Descripción:<span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control " id="discapacidad_descripcion" name="discapacidad_descripcion"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>