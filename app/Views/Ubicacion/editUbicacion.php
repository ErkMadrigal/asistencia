<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status">
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Editar Ubicacion</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmMulticatalogo">
            <div class="row">
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="cliente" class="control-label">Cliente: </label>
                        <div>
                            <input type="text" class="form-control " disabled id="cliente" name="cliente" value="<?= $ubicacion->idCliente ?>"><input type="hidden" class="form-control " value=" <?= $id ?> " id="id" name="id"><?= csrf_field() ?>

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="ubicacion" class="control-label">Ubicacion: </label>
                        <div>
                            <input type="text" class="form-control " disabled id="ubicacion" name="ubicacion" value="<?= $ubicacion->nombre_ubicacion ?>">

                        </div>
                    </div>
                </div>
            </div>
        </form>
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
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="calle" class=" control-label">Calle y Número:</label>
                    <input type="text" class="form-control " disabled id="calle" name="calle" value="<?= $ubicacion->calle_num ?>">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="codigo" class=" control-label">Código Postal :</label>
                    <input type="text" class="form-control " disabled id="codigo" name="codigo" value="<?= $ubicacion->idCodigoPostal ?>">
                </div>
            </div>
            <div class='col-12 col-sm-12 col-md-6'>
                <div class="form-group">
                    <label for="coloniacodigo" class=" control-label">Colonia:</label>
                    <div>
                        <input type="text" class="form-control " disabled id="colonia" name="colonia" value="<?= $ubicacion->colonia ?>">

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
                        <input type="text" class="form-control " disabled id="colonia" name="colonia" value="<?= $ubicacion->municipio ?>">
                    </div>

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
                    <input type="text" class="form-control " disabled id="colonia" name="colonia" value="<?= $ubicacion->ciudad ?>">
                </div>
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

        <div class='col-6 col-sm-6'>
            <div class="form-group">
                <label for="estadocodigo" class="control-label">Estado: </label>
                <div>
                    <input type="text" class="form-control " disabled id="colonia" name="colonia" value="<?= $ubicacion->nombre_ubicacion ?>">
                </div>
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
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <label for="Activo" class="control-label">Activo:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="activo" name="activo" <?= ($ubicacion->activo == 1 ? 'checked' : '') ?>>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent clearfix">
            <div class="row">

                <div class="col-12 col-sm-6 col-md-3 ">
                    <button id="editubicacion" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $('#editubicacion').click(function(event) {
            event.preventDefault();
            $('#load').addClass("spinner-border");

            if ($('#activo').is(':checked')) {
                val = 1;
            } else {
                val = 0;
            }
            var formData = new FormData($("form#frmMulticatalogo")[0]);
            formData.append('activo', val);

            $.ajax({
                url: base_url + '/EditInfoUbicacion',
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('.errorparticipante').remove();

                    if (response.succes.succes == 'succes') {

                        $("#exampleModal").modal("hide");

                        toastr.success(response.succes.mensaje);

                        var count = 2;
                        setInterval(function() {
                            count--;
                            if (count == 0) {
                                window.location = base_url + '/ubicacion';
                            }
                        }, 1000);

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
    </script>
    <?= $this->endSection() ?>