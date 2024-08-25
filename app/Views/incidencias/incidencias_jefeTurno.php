<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>

<div id="load" class=" spinner text-secondary" role="status"></div>
    <div class=" mb-2">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 ">
            </div>
            <div class="col-12 col-sm-6 col-md-3 ">
                <button class="btn btn-block btn-flat btn-primary" data-toggle="modal" data-target="#evidencia"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;alta corta</button>
            </div>
        </div>    
    </div>
    <div class="modal fade" id="evidencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva evidencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="frmEvidencia">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="servicio" class=" control-label">Servicio:<span class="text-danger">*</span></label>
                        <select class="form-control" id="servicio" name="servicio">
                            <option value="">Selecciona una Opcion</option>
                            <?php
                            if( !empty($servicios) ):
                                foreach($servicios as  $servicio):?>
                                    <option  value="<?=$servicio->id ?>"><?= $servicio->nombre_corto ?></option>
                                        <?php
                                endforeach;
                            endif;?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#servicio").select2({
                                    theme: "bootstrap4",
                                    width: "100%"
                                });
                            });
                        </script>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 ">
                            <input type="file" name="fileLista" class="d-none" accept=".jpg, .jpeg, .png"  capture="environment" id="fileLista">
                            <div class="card btn" id="lista">
                                <div class="card-body">
                                    <img id="previewLista" alt="Vista previa" style="display: none; max-width: 100%; height: auto;">
    
                                    <p class="text-center font-weight-lighter mt-3">Imagen lista</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6">
                        <input type="file" name="fileMonta"  class="d-none" accept=".jpg, .jpeg, .png"  capture="environment" id="fileMonta">
                            <div class="card btn" id="monta">
                                <div class="card-body">
                                    <img id="previewMonta" alt="Vista previa" style="display: none; max-width: 100%; height: auto;">
    
                                    <p  class="text-center font-weight-lighter mt-3">Imagen Monta</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button class="btn btn-secondary">Template</button> -->
                <button class="btn btn-primary" id="btnEnviar" onclick="evidencia()">Enviar</button>
            </div>
            </div>
        </div>
    </div>

    <div class=" mb-2">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 ">
            </div>
            <div class="col-12 col-sm-6 col-md-3">
            </div>
        </div>    
    </div>
<div class="card card-primary">
    <div class="card-header" >
        <h3 class="card-title">Empleados</h3>
    </div>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
        </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <table id="dataGrid" class="table text-center table-hover table-head-fixed text-nowrap">
            <thead>
            <tr>
                <th>Asignar</th>
                <th>Nombre Completo</th>
                <th>Número Empleado</th>
                <th>ubicacion</th>
                <th>Jefe Directo</th>
                <th>Cliente</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modal-Content">
                    <form class="form-horizontal" id="frmIncidencia">
                        <div class="row">
                            <div class='col-12 col-sm-6'>    
                                <div class="form-group">
                                    <label for="comisionista" class="control-label">Tipo Incidencia <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="hidden"  class="form-control " id="id_empleado" name="id_empleado" ><?= csrf_field() ?>
                                        <select id="id_incidencia" name="id_incidencia" class="form-control" >
                                            <option value="" selected>Selecciona una Opcion</option>
                                            <?php foreach($incidencias as $incidencia):?>
                                                <option value="<?=$incidencia->id?>"><?=$incidencia->valor?></option>
                                            <?php endforeach;?>
                                        </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#id_incidencia").select2({
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
                                    <label for="comisionista" class="control-label">Descripcion <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="descripcion" name="descripcion" >
                                </div>
                            </div>
                            <div class='col-12 col-sm-6'>    
                                <div class="form-group">
                                    <label for="comisionista" class="control-label">Fecha Inicidencia Inicio <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="date"  class="form-control " id="fecha_inicio" name="fecha_inicio" >
                                    </div>
                                </div>
                            </div>
                            <div class='col-12 col-sm-6'>    
                                <div class="form-group">
                                    <label for="comisionista" class="control-label">Fecha Inicidencia Final<span class="text-danger">*</span></label>
                                    <div>
                                        <input type="date"  class="form-control " id="fecha_final" name="fecha_final" >
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </form>
                    <div class=" mt-5 modal-footer">
                        <button id="btnGuardar" onclick="asignarInicidencia()" class="btn btn-primary"><i id="loadBtn" class="fa fa-circle-o-notch fa-spin" style="display:none;"></i>&nbsp&nbsp<i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
                        <button type="reset" class="d-none" id="reset">Limpiar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    document.querySelector("#monta").onclick = () => {
        document.querySelector("#fileMonta").click()
    }

    document.querySelector("#lista").onclick = () => {
        document.querySelector("#fileLista").click()
    }

    document.getElementById('fileLista').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.getElementById('previewLista');
                img.src = e.target.result;
                img.style.display = 'block'; // Muestra la imagen
            };

            reader.readAsDataURL(file);
        }
    });

    document.getElementById('fileMonta').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.getElementById('previewMonta');
                img.src = e.target.result;
                img.style.display = 'block'; // Muestra la imagen
            };

            reader.readAsDataURL(file);
        }
    });

    let modalTitle = document.querySelector("#modalTitle")
    let id_empleado = document.querySelector("#id_empleado")
    let reset = document.querySelector("#reset")

    const fecha1Input = document.getElementById('fecha_inicio');
    const fecha2Input = document.getElementById('fecha_final');

    fecha1Input.addEventListener('input', () => {
      const fecha1Seleccionada = new Date(fecha1Input.value);

      fecha1Seleccionada.setDate(fecha1Seleccionada.getDate());

      const fechaSiguiente = fecha1Seleccionada.toISOString().split('T')[0];

      fecha2Input.setAttribute('min', fechaSiguiente);

      if (fecha2Input.value < fechaSiguiente) {
        fecha2Input.value = fechaSiguiente;
      }
    });
    
	$('#dataGrid').DataTable({
        data: <?= json_encode($users) ?> ,
        destroy: true,
        deferRender: true,
        paging: true,
        scrollCollapse: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        columns: [
            {  data: "Asignar",
                render: function (data, type, full, meta) {
                    return `<button class="btn btn-outline-light text-primary" data-toggle="modal" data-target="#exampleModal" onclick='edit("${full.id}", "${full.nombre}")'><i class='fa fa-edit nav-icon'></i></button>`

                }
            },
            { data: "nombre"
            },
            { data: "numEmpleado"
            },
            { data: "nombre_ubicacion"
            },
            { data: "nomJefe"
            },
            { data: "nombre_corto"
            },
            
        ]
    });

    const edit = (id, title) => {
        let id_empleado = document.querySelector("#id_empleado")
        let modalTitle = document.querySelector("#modalTitle")
        modalTitle.innerHTML = "ASIGNAR - " + title
        id_empleado.value = id;
    }

    const asignarInicidencia = () => {
        var formData = new FormData($("form#frmIncidencia")[0]);

        $.ajax({
            url: base_url + '/newIncidencias',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {

                if (response.succes.succes == 'succes') {
                    
                    $("#exampleModal").modal("hide");

                    toastr.success(response.succes.mensaje);

                    var count = 3;
                    setInterval(function(){
                    count--;
                    if (count == 0) {
                        window.location = base_url + '/incidencias'; 
                    }
                    },1000);

                } else if (response.dontsucces.error == 'error'){
                    toastr.error(response.dontsucces.mensaje);
                            
                } else if (Object.keys(response.error).length > 0 ){

                    for (var clave in response.error){
                                
                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#"+clave+"" );
                            
                    }
                        toastr.error('<?= lang('Layout.camposObligatorios') ?>');

                }
                reset.click()
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError') ?>');
                $('#loadBtn').hide();           
            }
        });
    }

    const evidencia = () => {
        let formData = new FormData($(`#frmEvidencia`)[0]);

        $.ajax({
            url: base_url + '/evidencia',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.errorField').remove();

                if (response.succes.succes == 'succes') {

                    toastr.success(response.succes.mensaje);

                    // asignData(idPadre)

                } else if (response.dontsucces.error == 'error'){

                    toastr.error(response.dontsucces.mensaje);
                            
                } else if (Object.keys(response.error).length > 0 ){

                    for (var clave in response.error){
                                
                        $( "<div class='errorField text-danger'>" + response.error[clave] +"</div>" ).insertAfter( "#"+clave+"" );
                            
                    }
                        toastr.error('<?=lang('Layout.camposObligatorios')?>');
                }

                $('#load').removeClass( "spinner-border" );    

            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError')?>');
                $('#load').removeClass( "spinner-border" );           
            }
        });
    }

</script>

<?= $this->endSection() ?>