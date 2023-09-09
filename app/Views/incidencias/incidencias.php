<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>

<div id="load" class=" spinner text-secondary" role="status"></div>
<div class=" mb-2">    
    <div class="row">
        <div class="col-12 col-sm-6 col-md-9 ">
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/addIncidencias " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Asignar Inicidencia</a>

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
</div>

<div class="card-body table-responsive ">
    <table id="dataGrid" class="table text-center table-hover table-head-fixed text-nowrap">
        <thead>
        <tr>
            <th>Nombre Completo</th>
            <th>Incidencia</th>
            <th>Descripcion</th>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>
            <th>Número Empleado</th>
            <th>Ubicacion</th>
            <th>Jefe Inmediato</th>
            <th>Cliente</th>
            <th>Activo</th>
            <th>Editar</th>
            <th>Detalle</th>
        </tr>
        </thead>
    </table>
</div>
    
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Incidencia Actualizar</h5>
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
                                            <?php foreach($incidenciasList as $incidencia):?>
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
<div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Incidencia Detalles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-body table-responsive ">
                        <div class="row">
                            <div class='col-12 col-sm-6'>
                                <div class="form-group">
                                    <label for="matricula" class="control-label">Tipo Incidencia: </label>
                                    <p class="font-weight-light" id="detail_tipo_incidencia">ejemplo</p>
                                </div>
                            </div>
                            <div class='col-12 col-sm-6'>
                                <div class="form-group">
                                    <label for="matricula" class="control-label">Descripcion: </label>
                                    <p class="font-weight-light" id="detail_descripcion">ejemplo</p>
                                </div>
                            </div>
                            <div class='col-12 col-sm-6'>
                                <div class="form-group">
                                    <label for="matricula" class="control-label">Fecha Inicio: </label>
                                    <p class="font-weight-light" id="detail_inicio">ejemplo</p>
                                </div>
                            </div>
                            <div class='col-12 col-sm-6'>
                                <div class="form-group">
                                    <label for="matricula" class="control-label">Fecha final: </label>
                                    <p class="font-weight-light" id="detail_final">ejemplo</p>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="card-footer  clearfix  ">
                        <div class="row callout callout-warning">
                            <div class='col-12 col-sm-6'>
                                <div class="form-group">
                                    <i class="fa fa-user " aria-hidden="true"></i>
                                    <label for="creado" class="control-label">Creado por: </label>
                                    <p class="font-weight-light" id="detail_creado"></p>
                                </div>
                            </div>
                            
                            <div class='col-12 col-sm-6'>
                                <div class="form-group">
                                    <i class="fa fa-calendar " aria-hidden="true"></i>
                                    <label for="createddate" class="control-label">Fecha creación: </label>
                                    <p class="font-weight-light" id="detail_fecha_creado"></p>

                                </div>
                            </div>
                            <div class='col-12 col-sm-6'>
                                <div class="form-group">
                                    <i class="fa fa-user " aria-hidden="true"></i>
                                    <label for="actualizado" class="control-label">Actualizado por: </label>
                                    <p class="font-weight-light" id="detail_actualizado"></p>

                                </div>
                            </div>
                            <div class='col-12 col-sm-6'>
                                <div class="form-group">
                                    <i class="fa fa-calendar " aria-hidden="true"></i>
                                    <label for="updateddate" class="control-label">Fecha actualización: </label>
                                    <p class="font-weight-light" id="detail_fecha_actualizado"></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let modalTitle = document.querySelector("#modalTitle")
    let id_empleado = document.querySelector("#id_empleado")
    let id_incidencia = document.querySelector("#id_incidencia")
    let descripcion = document.querySelector("#descripcion")
    let fecha_inicio = document.querySelector("#fecha_inicio")
    let fecha_final = document.querySelector("#fecha_final")
    let reset = document.querySelector("#reset")
    const  estatusRenderer = (data, type, full, meta) => {
        var src;
        
        if (full.activo == 1) {
            src = "<i class='fa fa-check-circle text-success text-center'></i>";
        } else  {
            src = "<i class='fa fa-times-circle text-danger text-center'></i>";
        } 

        return src;
    }
    
	$('#dataGrid').DataTable({
        data: <?= json_encode($incidencias) ?> ,
        destroy: true,
        deferRender: true,
        paging: true,
        scrollCollapse: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        columns: [
            { data: "nombre"
            },
            { data: "tipo_incidencia"
            },
            { data: "descripcion"
            },
            { data: "fecha_incidencia_inicio"
            },
            { data: "fecha_incidencia_final"
            },
            { data: "numEmpleado"
            },
            { data: "nombre_ubicacion"
            },
            { data: "nomJefe"
            },
            { data: "nombre_corto"
            },
            { data: "activo", render: estatusRenderer },
            {  data: "editar",
                render: function (data, type, full, meta) {
                    return `<button class="btn btn-outline-light text-primary" data-toggle='modal' data-target='#ModalUpdate' onclick="updateModal('${full.id}', '${full.id_tipo_incidencia}', '${full.tipo_incidencia}', '${full.descripcion}', '${full.fecha_incidencia_inicio}', '${full.fecha_incidencia_final}')"><i class='fa fa-edit nav-icon'></i></button>`

                }
            },
            {  data: "detail",
                render: function (data, type, full, meta) {
                    return `<button class="btn btn-outline-light text-primary" data-toggle='modal' data-target='#ModalDetail' onclick="detail('${full.id}')"><i class='fa fa-list-alt nav-icon'></i></button>`

                }
            }
        ]
    });


    const updateModal = (id, idIncidencia, txtIncidencia, descrip, fechaInicio, fechaFin) =>{
        id_empleado.value = id

        let newOption = document.createElement('option');
        newOption.value = idIncidencia;
        newOption.textContent = txtIncidencia;
        newOption.selected = true;
        id_incidencia.appendChild(newOption);

        descripcion.value = descrip
        fecha_inicio.value = fechaInicio
        fecha_final.value = fechaFin
    }

    const asignarInicidencia = () => {
        var formData = new FormData($("form#frmIncidencia")[0]);

        $.ajax({
            url: base_url + '/editIncidencias',
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

    const detail = (id) => {
        let detail_fecha_actualizado = document.querySelector("#detail_fecha_actualizado")
        let detail_actualizado = document.querySelector("#detail_actualizado")
        let detail_fecha_creado = document.querySelector("#detail_fecha_creado")
        let detail_creado = document.querySelector("#detail_creado")
        let detail_final = document.querySelector("#detail_final")
        let detail_inicio = document.querySelector("#detail_inicio")
        let detail_descripcion = document.querySelector("#detail_descripcion")
        let detail_tipo_incidencia = document.querySelector("#detail_tipo_incidencia")
        var formData = new FormData($("form#frmIncidencia")[0]);
        formData.append("idBuqueda", id)
        $.ajax({
            url: base_url + '/detailIncidencias',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {

                if (response.succes.succes == 'succes') {
                    
                    console.log(response.data[0])
                    detail_fecha_actualizado.innerText = response.data[0].updateddate
                    detail_actualizado.innerText = response.data[0].nombreUpdate
                    detail_fecha_creado.innerText = response.data[0].createddate
                    detail_creado.innerText = response.data[0].nombreCreate
                    detail_final.innerText = response.data[0].fecha_incidencia_final
                    detail_inicio.innerText = response.data[0].fecha_incidencia_inicio
                    detail_descripcion.innerText = response.data[0].descripcion
                    detail_tipo_incidencia.innerText = response.data[0].valor

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


</script>

<?= $this->endSection() ?>