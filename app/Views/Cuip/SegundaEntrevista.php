<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">ESTATUS APROBACIÓN</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="">
            <div class="row">

                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_entrevista">Fecha de entrevista: </label>
                        <div class="input-group date" id="fecha_entrevista"
                            data-target-input="nearest">
                            <input type="text" required
                                class="form-control datetimepicker-input"
                                data-target="#fecha_entrevista" id="datetime-fecha_entrevista"
                                name="fecha_entrevista" placeholder="" value="" />
                            <div class="input-group-append" data-target="#fecha_entrevista"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $("#fecha_entrevista").datetimepicker({
                                    format: 'DD-MM-YYYY',
                                    locale: moment.locale('es')
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rrhh" class=" control-label">Aprobación RRHH:</label>
                        <input type="text" class="form-control " id="rrhh" name="rrhh">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="aprobacion" class=" control-label">Aprobación Gte.
                            Solicitante:</label>
                        <input type="text" class="form-control " id="aprobacion"
                            name="aprobacion">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">ELEMENTOS DE PRESENTACION Y ASPECTO FISICO</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="">
            <div class="row">

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="fisica" class=" control-label">Imagen Física:</label>
                        <input type="text" class="form-control " id="fisica" name="fisica">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="formasentarse" class=" control-label">Forma de entrar y
                            sentarse:</label>
                        <input type="text" class="form-control " id="formasentarse"
                            name="formasentarse">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="personal" class=" control-label">Cuidado personal:</label>
                        <input type="text" class="form-control " id="personal" name="personal">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">COMUNICACIÓN NO VERBAL A LO LARGO DE LA ENTREVISTA</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="">
            <div class="row">

                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="contacto" class=" control-label">Contacto Visual:</label>
                        <input type="text" class="form-control " id="contacto" name="contacto">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="formasaludar" class=" control-label">Forma de
                            saludar:</label>
                        <input type="text" class="form-control " id="formasaludar"
                            name="formasaludar">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="tono" class=" control-label">Tono volumen y timbre de
                            voz:</label>
                        <input type="text" class="form-control " id="tono" name="tono">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="formadesentarse" class=" control-label">Forma de
                            sentarse:</label>
                        <input type="text" class="form-control " id="formadesentarse"
                            name="formadesentarse">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="formademoverse" class=" control-label">Forma de
                            moverse:</label>
                        <input type="text" class="form-control " id="formademoverse"
                            name="formademoverse">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="Gesticulación" class=" control-label">Gesticulación:</label>
                        <input type="text" class="form-control " id="Gesticulación"
                            name="Gesticulación">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="Movimiento" class=" control-label">Movimiento manos y
                            brazos:</label>
                        <input type="text" class="form-control " id="Movimiento"
                            name="Movimiento">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">COMUNICACIÓN VERBAL A LO LARGO DE LA ENTREVISTA</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="Fluidez" class=" control-label">Fluidez verbal:</label>
                        <input type="text" class="form-control " id="Fluidez" name="Fluidez">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="vocabulario" class=" control-label">Riqueza de
                            vocabulario:</label>
                        <input type="text" class="form-control " id="vocabulario"
                            name="vocabulario">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="comunicación" class=" control-label">Precisión de la
                            comunicación:</label>
                        <input type="text" class="form-control " id="comunicación"
                            name="comunicación">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sentimientos" class=" control-label">Capacitad para expresar
                            sentimientos:</label>
                        <input type="text" class="form-control " id="sentimientos"
                            name="sentimientos">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">COMPETENCIAS GENERALES DEL PERFIL</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="Fluidez" class=" control-label">Fluidez verbal:</label>
                        <input type="text" class="form-control " id="Fluidez" name="Fluidez">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="vocabulario" class=" control-label">Riqueza de
                            vocabulario:</label>
                        <input type="text" class="form-control " id="vocabulario"
                            name="vocabulario">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="comunicación" class=" control-label">Precisión de la
                            comunicación:</label>
                        <input type="text" class="form-control " id="comunicación"
                            name="comunicación">
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sentimientos" class=" control-label">Capacitad para expresar
                            sentimientos:</label>
                        <input type="text" class="form-control " id="sentimientos"
                            name="sentimientos">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>




            