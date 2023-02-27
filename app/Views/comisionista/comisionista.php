<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>

    <style>
        .borderSolid{
            /* border: solid 1px !important; */
        }
        .borderLeftSuccess{
            border-left: solid 5px #198754 !important;
        }
        .borderLeftDanger{
            border-left: solid 5px #d9534f !important;
        }
        .borderLeftPrimary{
            border-left: solid 5px #5bc0de !important;
        }
        .selectFechas{
            /* display:none; */
        }
    </style>
    <div id="load" class=" spinner text-secondary" role="status"></div>
    <div class=" mb-2">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 ">
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Agregar Comisionista</button>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Agregar un nuevo Comisionista</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" id="frmComisionista">
                                    <?= csrf_field() ?>
                                    <div class="row">
                                        <div class='col-12 col-sm-6'>    
                                            <div class="form-group">
                                                <label for="comisionista" class="control-label">Nombre del Comisionista <span class="text-danger">*</span></label>
                                                <div >
                                                    <input type="text"  class="form-control " id="comisionista" name="comisionista" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-12 col-sm-6'>    
                                            <div class="form-group">
                                                <label for="telefono" class="control-label">Telefono<span class="text-danger">*</span></label>
                                                <div >
                                                    <input type="text"  class="form-control " id="telefono" name="telefono" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="13" >
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button id="btnGuardar" class="btn btn-primary"><i id="loadBtn" class="fa fa-circle-o-notch fa-spin" style="display:none;"></i>&nbsp&nbsp<i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
                                <button id="btnLimpiar" class="btn btn-danger"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp;&nbsp;Limpiar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>   
     
    <div class="card card-primary ">
        <div class="card-header" id="tabMain">
            <h3 class="card-title">Comisionista</h3>
        
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive w-100">
            <table id="dataGrid" class="table stripe text-center table-hover table-head-fixed text-nowrap">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>activo</th>
                    <th>Editar</th>
                    <th>Detalles</th>
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
                    <div id="modal-Content"></div>
                    <div id="modal-Center"></div>
                    <div id="modal-Body"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    <script>
        let btnLimpiar = document.querySelector("#btnLimpiar")
        let btnGuardar = document.querySelector("#btnGuardar")
        let telefono = document.querySelector("#telefono")
        let comisionista = document.querySelector("#comisionista")
        let modalContent = document.querySelector("#modal-Content")
        let modalCenter = document.querySelector("#modal-Center")
        let modalBody = document.querySelector("#modal-Body")
        let modalTitle = document.querySelector("#modalTitle")
        
        btnLimpiar.onclick = (e) => {
            e.preventDefault()
            telefono.value = ''
            comisionista.value = ''
            
        } 
        btnGuardar.onclick = (event) => {
            event.preventDefault();
            $('#loadBtn').show();
            var formData = new FormData($("form#frmComisionista")[0]);
            $.ajax({
                url: base_url + '/addComisionista',
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                async: true,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('.errorparticipante').remove();

                    if (response.succes.succes == 'succes') {
                        
                        $(".bd-example-modal-lg").modal("hide");

                        toastr.success(response.succes.mensaje);

                        var count = 3;
                        setInterval(function(){
                        count--;
                        if (count == 0) {
                            window.location = base_url + '/comisionista'; 
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

                    
                    $('#loadBtn').hide();
                            
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.error('<?=lang('Layout.toastrError') ?>');
                    $('#loadBtn').hide();           
                }
            });
                
        };
        
        const  estatusRenderer = (data, type, full, meta) => {
            var src;
            
            if (full.activo == 1) {
                src = "<i class='fa fa-check-circle text-success text-center'></i>";
            } else  {
                src = "<i class='fa fa-times-circle text-danger text-center'></i>";
            } 

            return src;
        }

        const table = (datos) =>{
            $('#dataGrid').DataTable({
                data: datos,
                destroy: true,
                deferRender: true,
                paging: false,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },
                pageLength: 5,
                columns: [{ data: "nombre"},
                            { data: "telefono"},
                            { data: "activo", render: estatusRenderer },
                            {  data: "Pago",
                                render: (data, type, full, meta) => {
                                    return `<button class="btn btn-outline-light text-primary" data-toggle="modal" data-target="#exampleModal" onclick='editar("${full.id}", "${full.nombre}", "${full.telefono}", "${full.activo}")'><i class='fa fa-edit nav-icon'></i></button>`
                                    
                                }
                            }, 
                            { data: "detail",
                                render: (data, type, full, meta) => {
                                    return `<button class="btn btn-outline-light text-primary" data-toggle="modal" data-target="#exampleModal" onclick='detalles("${full.id}")'><i id="loadBtnDetail${full.id}" class="fa fa-circle-o-notch fa-spin" style="display:none;"></i>&nbsp&nbsp<i class='fa fa-list-alt nav-icon'></i></button>`
                        
                                }
                            }
                            
                        ]
            });
        }

        table(<?= json_encode($datos) ?>);

        const editar = (dataId, nombre, telefono, activo) => {
            let act = activo == 1 ? 'checked' : ''
            modalTitle.innerHTML = 'Editar Comisionista'
            modalBody.innerHTML = ''
            modalCenter.innerHTML = ''
            modalContent.innerHTML = `
                
                <form class="form-horizontal" id="frmComisionistaUp">
                    <div class="row">
                        <div class='col-12 col-sm-6'>    
                            <div class="form-group">
                                <label for="comisionista" class="control-label">Nombre del Comisionista <span class="text-danger">*</span></label>
                                <div>
                                    <input type="text" value ="${nombre}" class="form-control " id="comisionistaUp" name="comisionistaUp" >
                                    <input type="hidden"  class="form-control " value ="${dataId}" id="id" name="id" ><?= csrf_field() ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-12 col-sm-6'>    
                            <div class="form-group">
                                <label for="telefono" class="control-label">Telefono<span class="text-danger">*</span></label>
                                <div >
                                    <input type="text"  value ="${telefono}" class="form-control " id="telefonoUp" name="telefonoUp" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="13" >
                                </div>
                            </div>
                        </div>
                        <div class='col-12 col-sm-6'>    
                            <div class="form-check">
                                <input class="form-check-input"  type="checkbox" name="activo" id="activo" ${act} value="${activo}">
                                <label class="form-check-label" for="defaultCheck1">
                                    Activo
                                </label>
                            </div>
                        </div>
                    </div> 
                </form>
                <div class=" mt-5 modal-footer">
                    <button id="btnGuardar" onclick="actualizar()" class="btn btn-primary"><i id="loadBtn" class="fa fa-circle-o-notch fa-spin" style="display:none;"></i>&nbsp&nbsp<i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
                </div>
            `

        };
        
        const actualizar = () => {
            let chk = $('#activo').prop('checked') ? 1:0
            $('#loadBtn').show();
            var formData = new FormData($("form#frmComisionistaUp")[0]);
            formData.append("chkActivo", chk); 
            $.ajax({
                url: base_url + '/UpdateComisionista',
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                async: true,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('.errorparticipante').remove();

                    if (response.succes.succes == 'succes') {
                        
                        $("#exampleModal").modal("hide");

                        toastr.success(response.succes.mensaje);

                        var count = 3;
                        setInterval(function(){
                        count--;
                        if (count == 0) {
                            window.location = base_url + '/comisionista'; 
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

                    
                    $('#loadBtn').hide();
                            
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.error('<?=lang('Layout.toastrError') ?>');
                    $('#loadBtn').hide();           
                }
            });

        }

        const detalles = (id) => {
            let tableArms = ''
            modalTitle.innerHTML = 'Detalles Comisionista'

            $(`#loadBtnDetail${id}`).show();
            var formData = new FormData($("form#frmComisionista")[0]);
            formData.append("id", id)

            $.ajax({
                url: base_url + '/detalleComisionista',
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                async: true,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.succes.succes == 'succes'){
                        modalContent.innerHTML = ''
                        modalBody.innerHTML = ''
                        modalCenter.innerHTML = ''

                        modalContent.innerHTML = `
                            <div class="card">
                                <div class="card-body row">
                                    <div class='col-12 col-sm-4'>
                                        <div class="form-group">
                                            <i class="m-2 fa fa-user " aria-hidden="true"></i>
                                            <label for="updateddate" class="control-label">Nombre</label>
                                            <p class="ml-5">${response.data.nombre}</p>
                                        </div>
                                    </div>
                                    <div class='col-12 col-sm-4'>
                                        <div class="form-group">
                                            <i class="m-2 fa fa-phone " aria-hidden="true"></i>
                                            <label for="updateddate" class="control-label">Telefono</label>
                                            <p class="ml-5">${response.data.telefono}</p>
                                        </div>
                                    </div>
                                    <div class='col-12 col-sm-4'>
                                        <div class="form-group">
                                            <i class="m-2 fa fa-power-off " aria-hidden="true"></i>
                                            <label for="updateddate" class="control-label">Estado</label>
                                            <p class="ml-5"><i class='fa fa-power-off text-${response.data.activo == 1 ? 'success' : 'danger' } text-center'></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        
                        if(response.detail.length){
                            tableArms = `<table class="table" id="dataTableArms"> <thead><tr><th>Arma</th><th>Resta</th><th>Acción</th></tr></thead><tbody>`
                            response.detail.forEach( dt => {
                                tableArms += `<tr>
                                    <td>${dt.clase} ${dt.marca} ${dt.calibre}</td>
                                    <td>${dt.comision}</td>
                                    <td><button class="btn btn-primary btn-sm" onclick="detallesComision('${dt.idComision}','${dt.idAsignacion}')"><i class='fa fa-list-alt nav-icon'></i> &nbsp;&nbsp;&nbsp; Detalles</button></td>
                                </tr>`
                            })
                            tableArms += `</tbody></table>`

                        }else{
                            modalCenter.innerHTML = ''
                        }
                        modalCenter.innerHTML = tableArms
                        $("#dataTableArms").DataTable({
                            destroy: true,
                            deferRender: true,
                            paging: true,
                            language: {
                                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                            },
                            pageLength: 5,
                            lengthMenu: [[5, 10, 20], [5, 10, 20]]
                        })
                        
                        modalBody.innerHTML=`
                            <div class="row callout callout-warning m-3">
                                <div class='col-12 col-sm-6'>
                                    <div class="form-group">
                                        <i class="fa fa-user " aria-hidden="true"></i>
                                        <label for="creado" class="control-label">Creado por: </label>
                                        <div>
                                            ${response.data.nombreC} ${response.data.paternoC} 
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='col-12 col-sm-6'>
                                    <div class="form-group">
                                        <i class="fa fa-calendar " aria-hidden="true"></i>
                                        <label for="createddate" class="control-label">Fecha creación: </label>
                                        <div>
                                            ${response.data.createddate}
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-6'>
                                    <div class="form-group">
                                        <i class="fa fa-user " aria-hidden="true"></i>
                                        <label for="actualizado" class="control-label">Actualizado por: </label>
                                        <div>
                                            ${response.data.nombreU == null ?'':response.data.nombreU} ${response.data.paternoU == null ?'':response.data.paternoU} 
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-6'>
                                    <div class="form-group">
                                        <i class="fa fa-calendar " aria-hidden="true"></i>
                                        <label for="updateddate" class="control-label">Fecha actualización: </label>
                                        <div>
                                            ${response.data.updateddate}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    }    
                    $(`#loadBtnDetail${id}`).hide();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.error('<?=lang('Layout.toastrError') ?>');
                    $('#loadBtnDetail').hide();           
                }
            });
            
        }

        const detallesComision = (idComision, idAsignacion) => {
            modalTitle.innerHTML = 'Detalles Comision'
            modalContent.innerHTML = ''
            modalBody.innerHTML = ''
            modalCenter.innerHTML = ''
            modalCenter.classList.remove("card-columns")

            var formData = new FormData($("form#frmComisionista")[0]);
            formData.append("idComision", idComision)
            formData.append("idAsignacion", idAsignacion)

            $.ajax({
                url: base_url + '/detalleComisionistaAsignacion',
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                async: true,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.succes.succes == 'succes'){
                        
                        if(response.data.length){
                            response.data.forEach( dt => {
                                modalCenter.innerHTML +=`
                                    <div class="card">
                                        <div class="card-body row">
                                            <div class='col-12 col-sm-3'>
                                                <div class="form-group">
                                                    <i class="m-2 fa fa-dollar " aria-hidden="true"></i>
                                                    <label for="updateddate" class="control-label">Aportado</label>
                                                    <p class="ml-5">${dt.comision_asignado}</p>
                                                </div>
                                            </div>
                                            <div class='col-12 col-sm-3'>
                                                <div class="form-group">
                                                    <i class="m-2 fa fa-dollar " aria-hidden="true"></i>
                                                    <label for="updateddate" class="control-label">Comisión</label>
                                                    <p class="ml-5">${dt.comision}</p>
                                                </div>
                                            </div>
                                            <div class='col-12 col-sm-6'>
                                                <div class="form-group">
                                                    <i class="m-2 fa fa-user " aria-hidden="true"></i>
                                                    <label for="updateddate" class="control-label">Elemento</label>
                                                    <p class="ml-5">${dt.primer_nombre} ${dt.apellido_paterno} ${dt.apellido_materno} <b></b></p>
                                                </div>
                                            </div>
                                            <div class='col-12 col-sm-6'>
                                                <div class="form-group">
                                                    <i class="m-2 fa fa-building " aria-hidden="true"></i>
                                                    <label for="updateddate" class="control-label">Cliente</label>
                                                    <p class="ml-5">${dt.nombre_corto}</p>
                                                </div>
                                            </div>
                                            <div class='col-12 col-sm-6'>
                                                <div class="form-group">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width: 43px;height: 19px;"><path d="M528 56c0-13.3-10.7-24-24-24s-24 10.7-24 24v8H32C14.3 64 0 78.3 0 96V208c0 17.7 14.3 32 32 32H42c20.8 0 36.1 19.6 31 39.8L33 440.2c-2.4 9.6-.2 19.7 5.8 27.5S54.1 480 64 480h96c14.7 0 27.5-10 31-24.2L217 352H321.4c23.7 0 44.8-14.9 52.7-37.2L400.9 240H432c8.5 0 16.6-3.4 22.6-9.4L477.3 208H544c17.7 0 32-14.3 32-32V96c0-17.7-14.3-32-32-32H528V56zM321.4 304H229l16-64h105l-21 58.7c-1.1 3.2-4.2 5.3-7.5 5.3zM80 128H464c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                                                    <label for="updateddate" class="control-label">Tipo Arma</label>
                                                    <p class="ml-5">${dt.clase} ${dt.marca} ${dt.calibre} ${dt.modelo} ${dt.matricula}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `
                            })
                        }else{
                            modalCenter.innerHTML = ''
                        }
                        modalBody.innerHTML = `
                            <div class="card">
                                <div class="card-body" >
                                    Asignar pago
                                </div>
                                <div class="input-group w-50 m-3">
                                    <input type="text" id="montoComision" name="montoComision" class="form-control" placeholder="Asignar Monto" aria-label="Asignar Monto" aria-describedby="basic-addon2" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5 ">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" onclick="asignarMonto('${response.data[0].comision}', '${response.data[0].idAsignacion}')"><i class="fa fa-dollar " aria-hidden="true"></i> &nbsp; Asignar</button>
                                    </div>
                                </div>
                            </div>
                        `
                    }    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.error('<?=lang('Layout.toastrError') ?>');
                }
            });
        } 

        const asignarMonto = (comision, idAsignacion) => {
            let montoComision = document.querySelector("#montoComision").value
            let mont = parseInt(montoComision)
            let com = parseInt(comision)

            if(montoComision){
                if(mont > com){
                    toastr.error('El monto asignado no debe de superar la comision');
                }else{
                    var formData = new FormData($("form#frmComisionista")[0]);
                    formData.append("idAsignacion", idAsignacion)
                    formData.append("montoComision", montoComision)

                    $.ajax({
                        url: base_url + '/asignarComision',
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        cache: false,
                        async: true,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            $('.errorparticipante').remove();

                            if (response.succes.succes == 'succes') {
                                
                                $("#exampleModal").modal("hide");

                                toastr.success(response.succes.mensaje);

                                var count = 3;
                                setInterval(function(){
                                count--;
                                if (count == 0) {
                                    window.location = base_url + '/comision'; 
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
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            toastr.error('<?=lang('Layout.toastrError') ?>');
                            $('#loadBtn').hide();           
                        }
                    });

                }
            }else{
                toastr.error('Es requerido un monto');
            }

        };

        
    </script>

<?= $this->endSection() ?>


