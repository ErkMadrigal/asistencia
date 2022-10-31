<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status">
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Detalle Puesto</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="puesto">
            <div class="row">
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="parentesco" class="control-label">Cliente: </label>
                        <div>
                            <input type="text" class="form-control " disabled id="idCliente" name="idCliente" value="<?= $Puesto->idCliente ?>"><input type="hidden" class="form-control " value=" <?= $id ?> " id="id" name="id"><?= csrf_field() ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombre_corto" class=" control-label">Nombre Corto: </label>
                        <div>
                            <input type="text" class="form-control " disabled id="nombre_corto" name="nombre_corto" value="<?= $Puesto->nombre_corto ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="idReferencia" class="control-label">Ubicacion: </label>
                        <div>
                            <input type="text" class="form-control " disabled id="nombre_ubicacion" name="nombre_ubicacion" value="<?= $Puesto->nombre_ubicacion ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="idReferencia" class="control-label">Turno: </label>
                        <div>
                            <input type="text" class="form-control " disabled id="turnos" name="turnos" value="<?= $Puesto->turnos ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="idReferencia" class="control-label">Puesto: </label>
                        <div>
                            <input type="text" class="form-control " disabled id="puesto" name="puesto" value="<?= $Puesto->puesto ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numGuardias" class=" control-label">Numero de Guardias:</label>
                        <div>
                            <input type="text" class="form-control " disabled id="num_guardias" name="num_guardias" value="<?= $Puesto->num_guardias ?>">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cantArmaCorta" class=" control-label">Cantidad Arma Corta:</label>
                        <div>
                            <input type="text" class="form-control " disabled id="cant_arma_corta" name="cant_arma_corta" value="<?= $Puesto->cant_arma_corta ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cantSinarmas" class=" control-label">Cantidad Sin Arma:</label>
                        <div>
                            <input type="text" class="form-control " disabled id="cant_arma_larga" name="cant_arma_larga" value="<?= $Puesto->cant_arma_larga ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cantArmaLarga" class=" control-label">Cantidad Arma Larga:</label>
                        <div>
                            <input type="text" class="form-control " disabled id="cant_sin_arma" name="cant_sin_arma" value="<?= $Puesto->cant_sin_arma ?>">

                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="Activo" class="control-label">Activo:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="activo" name="activo" <?= ($Puesto->activo == 1 ? 'checked' : '') ?>>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer bg-transparent clearfix">
        <div class="row">

            <div class="col-12 col-sm-6 col-md-3 ">
                <button id="editPuesto" class="btn btn-block btn-flat btn-primary " type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#editPuesto').click(function(event) {
        event.preventDefault();
        $('#load').addClass("spinner-border");

            if ($('#activo').is(':checked')) {
                val = 1;
            } else {
                val = 0;
            }
            var formData = new FormData($("form#puesto")[0]);
            formData.append('activo', val);

        $.ajax({
            url: base_url + '/EditInfoPuesto',
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
                            window.location = base_url + '/Puestos';
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