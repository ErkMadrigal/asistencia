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
        .fila-roja {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .fila-azul {
            color: #004085;
            background-color: #cce5ff;
            border-color: #b8daff;
        }
    </style>
    <div id="load" class=" spinner text-secondary" role="status"></div>
    <div class=" mb-2">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 ">
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <a class="btn btn-block btn-flat btn-primary" href="<?= base_url() ?>/adeudos" class='nav-link'><i class="fa fa-bell" aria-hidden="true"></i>&nbsp;&nbsp;Adeudos &nbsp;&nbsp;<?php if($pendientes[0]->total > 0):?><span class="badge badge-pill badge-danger" ><?= $pendientes[0]->total ?></span><?php endif;?></a>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/addAsignacion " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Agregar Asignacion</a>
            </div>
        </div>    
    </div>   
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmAsignacion">
            <div class="row">
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="periodicidad" class="control-label">Periodicidad</label>
                        <div >
                            <?= csrf_field() ?>
                            <select id="periodicidad" name="periodicidad" class="form-control" >
                                <option value="" selected>Selecciona una Opción</option>
                                <option value="mensual" >Mensual</option>
                                <option value="bimestral" >Bimestral</option>
                                <option value="trimestral" >Trimestral</option>
                                <option value="semestral" >Semestral</option>
                                <option value="anual" >Anual</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipoFecha").select2({
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
                        <label for="tipoFecha" class="control-label">Tipo de Fecha</label>
                        <div >
                            <select id="tipoFecha" name="tipoFecha" class="form-control" >
                                <option value="" selected>Selecciona una Opción</option>
                                <option value="inicial" >Inicial</option>
                                <option value="final" >Final</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipoFecha").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6 d-none ' id="selectFecha1">    
                    <div class="form-group">
                        <label for="inicial" class="control-label">Rango Inicial</label>
                        <div >
                            <input type="date"  class="form-control " name="fechaInicial" id="inicial">
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6 d-none ' id="selectFecha2">    
                    <div class="form-group">
                        <label for="final" class="control-label">Rango Final</label>
                        <div >
                            <input type="date"  class="form-control " name="fechaFinal" id="final">
                          
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="cp" class="control-label">Clasificación</label>
                        <div >
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="clasificacion" class="custom-control-input" value="true">
                                <label class="custom-control-label" for="customRadio1">Saldo Pendiente</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="clasificacion" class="custom-control-input" value="false">
                                <label class="custom-control-label" for="customRadio2">Saldadas</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </form>
         
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 ">    
                <button id="btnMostrar" class="btn btn-block btn-flat btn-primary" type="button"><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;&nbsp;Mostrar</button>
            </div> 
            <div class="col-4 col-sm-4 col-md-3 ">    
                <button id="btnLimpiar" class="btn btn-block btn-flat btn-danger" type="button"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp;&nbsp;Limpiar</button>
            </div>      
        </div>
        
        <div class="row mt-4">
            <div class="col-4 col-sm-4 col-md-3">
                <div class="card borderLeftPrimary">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total en General</p>
                                    <h5 class="font-weight-bolder mb-0" id="totalGeneral">
                                        
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-3">
                <div class="card borderLeftDanger">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Saldo</p>
                                    <h5 class="font-weight-bolder mb-0" id="saldo">
                                        
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-3">
                <div class="card borderLeftSuccess">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Aplicado</p>
                                    <h5 class="font-weight-bolder mb-0" id="aplicado">
                                        
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-3">
                <div class="card borderLeftPrimary">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total de Asignaciones</p>
                                    <h5 class="font-weight-bolder mb-0" id="totalAsignaciones">
                                       
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div> 
    <div class="card card-primary ">
        <div class="card-header" id="tabMain">
            <h3 class="card-title">Asignaciones</h3>
        
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataGrid" class="table stripe text-center table-hover table-head-fixed text-nowrap">
                <thead>
                <tr>
                    <th>Detalles</th>
                    <th>Pago</th>
                    <th>Cliente</th>
                    <th>Elemento</th>
                    <th>Arma</th>
                    <th>t. Pago</th>
                    <th>Pagos</th>
                    <th>Periocidad</th>
                    <th>Renta</th>
                    <th>Tramite</th>
                    <th>Asignacion</th>
                    <th>Garantia</th>
                    <th>Total</th>
                    <th>Entrega</th>
                    <th>Final</th>
                    <th>Tipo Mov.</th>
                    <th>Aplicado</th>
                    <th>Saldo</th>
                    <th>Comisionista</th>
                    <th>Comision</th>
                    <th>Activo</th>
                    <th>Baja</th>
                    <th>Juridico</th>
                </tr>
                </thead>
            </table>
        </div>
        
    </div>   
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Compromiso de pagos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button class="btn btn-danger mt-2 mb-4" id="btnModifyMount"><i class='fa fa-dollar nav-icon'></i>&nbsp;&nbsp;&nbsp; Moificar Monto</button>
                    <input type="text" id="id_asignacion" class="d-none">
                    <table id="data" class="table text-center table-hover table-head-fixed">
                        <thead>
                        <tr>
                            <th>Pago</th>
                            <th>Fecha</th>
                            <th>Concepto</th>
                            <th>Importe</th>
                            <th>Saldo</th>
                            <th>Aplicado</th>
                            <th>Activo</th>
                            <th>aplicar Saldo</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        let AlltotalGeneral = document.querySelector("#totalGeneral")
        let Allsaldo = document.querySelector("#saldo")
        let Allaplicado = document.querySelector("#aplicado")
        let AlltotalAsignaciones = document.querySelector("#totalAsignaciones")

        let btnMostrar = document.querySelector("#btnMostrar")
        let btnLimpiar = document.querySelector("#btnLimpiar")
        
        let selectFecha1 = document.querySelector("#selectFecha1")
        let selectFecha2 = document.querySelector("#selectFecha2")
        let tipoFecha = document.querySelector("#tipoFecha")
        let totalPendeintes = document.querySelector("#totalPendeintes")
        let btnModifyMount = document.querySelector("#btnModifyMount")
        let id_asignacion = document.querySelector("#id_asignacion")
       
        tipoFecha.onchange = () => {
            if(tipoFecha.value != ''){
                selectFecha1.classList.remove('d-none')
                selectFecha2.classList.remove('d-none')
            }else{
                selectFecha1.classList.add('d-none')
                selectFecha2.classList.add('d-none')
            }
        }

        btnLimpiar.onclick = () => {
            location.reload();
            
        }

        btnModifyMount.onclick = async () => {
            $("#exampleModal").modal("hide")

            const { value: formValues } = await Swal.fire({
                title: 'Seguro que lo deseas Modificar El monto?',
                html:`
                    <div class="form-group">
                        <label for="monto">Monto</label>
                        <input type="number" id="input1" class="swal2-input"> 
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" id="input2" class="swal2-input">
                    </div>
                    `,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Guardar!',
                    cancelButtonText: 'Cancelar',
                focusConfirm: false,
                preConfirm: () => {
                    return [
                        document.getElementById('input1').value,
                        document.getElementById('input2').value
                    ]
                }
            })

            if (formValues[0] != '' && formValues[1] != '') {
                console.log(formValues)
                var formData = new FormData($("form#frmAsignacion")[0]);
                formData.append("monto", formValues[0])
                formData.append("fecha", formValues[1])
                formData.append("id", id_asignacion.value)
                $.ajax({
                    url: base_url + '/modifyDate',
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
                            Swal.fire({
                                title: '¡Actualizado!',
                                text: 'Se han actualizado los pagos .',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                            })
                            var count = 3;
                            setInterval(function(){
                                count--;
                                if (count == 0) {
                                    window.location = base_url + '/asignaciones'; 
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

            }else{
                Swal.fire({
                    title: '!Ooops! Error',
                    text: 'Los datos son requeridos.',
                    icon: 'error',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Cancelar',
                    
                })
            }
        }

        const mostrarDatosGen = () => {
            $.ajax({
                url: base_url + '/getAllData',
                type: 'GET',
                dataType: 'json',
                cache: false,
                async: true,
                contentType: false,
                processData: false,
                success: function (response) {
                    let saldo = response.data.sumSA[0].total-response.data.sumSA[0].aplicado
                    if(response.succes.succes == 'succes'){
                        AlltotalGeneral.innerHTML = `$ ${numeral(response.data.sumSA[0].total).format('0,0')} `
                        Allsaldo.innerHTML = `$ ${numeral(saldo).format('0,0')} `
                        Allaplicado.innerHTML = `$ ${numeral(response.data.sumSA[0].aplicado).format('0,0')} `
                        AlltotalAsignaciones.innerHTML = `${response.data.asig[0].totalAsign}`
                    }    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.error('<?=lang('Layout.toastrError') ?>');
                    $('#loadBtn').hide();           
                }
            });
           
        }  
           
        mostrarDatosGen(); 
        
        const  estatusRenderer = (data, type, full, meta) => {
            var src;
            
            if (full.activo == 1) {
                src = "<i class='fa fa-check-circle text-success'></i>";
            } else  {
                src = "<i class='fa fa-times-circle text-danger'></i>";
            } 

            return src;
        }
        const table = (datos) =>{
            $('#dataGrid').DataTable({
                data: datos,
                destroy: true,
                deferRender: true,
                scrollX: true,
                paging: true,
                scrollCollapse: true,
                fixedColumns:   {
                    left: 2//Le indico que deje fijas solo las 2 primeras columnas
                },
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },
                pageLength: 5,
                "createdRow": function(row, data, dataIndex) {
                    if (data.activo == 0) { // Supongamos que el primer elemento de cada fila contiene el color
                        $(row).addClass('fila-azul');
                    } else if (data.activo == 3) {
                        $(row).addClass('fila-roja');
                    }
                },
                columns: [
                            { data: "detail",
                                render: (data, type, full, meta) => {
                        
                                    return "<a href='" + base_url + "/detailAsignacion?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                        
                                }
                            },
                            {  data: "Pago",
                                render: (data, type, full, meta) => {
                                    
                                    return `<button data-toggle='modal' data-target='#exampleModal' onclick='asignData("${full.id}")' class='nav-link btn btn-link'><i class='fa fa-dollar nav-icon'></i></button>`;
                                    
                                }
                            },
                            { data: "cliente"},
                            { data: "nombre"},
                            { data: "arma"},
                            { data: "tipo_pago"},
                            { data: "pagos"},
                            { data: "periodicidad"},
                            { data: "renta",  render: (data, type, full, meta) => numeral(full.renta).format('0,0') },
                            { data: "tramite", render: (data, type, full, meta) => numeral(full.tramite).format('0,0')},
                            { data: "asignacion", render: (data, type, full, meta) => numeral(full.asignacion).format('0,0')},
                            { data: "garantia", render: (data, type, full, meta) => numeral(full.garantia).format('0,0')},
                            { data: "total", render: (data, type, full, meta) => numeral(full.total).format('0,0')},
                            { data: "entrega"},
                            { data: "final"},
                            { data: "tipo_movimiento"},
                            { data: "aplicado", render: (data, type, full, meta) => numeral(full.aplicado).format('0,0')},
                            { data: "saldo", render: (data, type, full, meta) => numeral(full.saldo).format('0,0')},
                            { data: "nomComisionista"},
                            { data: "comision"},
                            { data: "activo", render: estatusRenderer },
                            
                            {  data: "eliminar",
                                render: (data, type, full, meta) => {
                                    return `<button onclick='eliminar("${full.id}", "${full.aplicado}", "${full.idArma}")' class='nav-link btn btn-link'><i class='fa fa-trash nav-icon'></i></button>`;
                        
                                }
                            }, 
                            {  data: "juridico",
                                render: (data, type, full, meta) => {
                                    return `<button onclick='eliminarJuridico("${full.id}", "${full.idArma}")' class='nav-link btn btn-link'><i class='fa fa-trash nav-icon'></i></button>`;
                        
                                }
                            }, 
                            
                        ]
            });
        }

        table(<?= json_encode($datos) ?>);

        const asignData = (dataIdAsign) => {
            id_asignacion.value = dataIdAsign
            let formData = new FormData($("form#frmAsignacion")[0]);
            formData.append("pago", dataIdAsign)
            $.ajax({
                url: base_url + '/getCompromisoPago',
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                async: true,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#data').DataTable({
                        data: response.data,
                        destroy: true,
                        responsive: true,
                        deferRender: true,
                        pageLength: 10,
                        language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                    },
                        columns: [{ data: "pago", render: (data, type, full, meta) => numeral(full.pago).format('0,0')},
                                    { data: "fecha"},
                                    { data: "concepto"},
                                    { data: "importe", render: (data, type, full, meta) => numeral(full.importe).format('0,0')},
                                    { data: "aplicado", render: (data, type, full, meta) => numeral(full.aplicado).format('0,0')},
                                    { data: "saldo", render: (data, type, full, meta) => numeral(full.saldo).format('0,0')},
                                    { data: "activo", render: estatusRenderer }, 
                                    { data: "id",
                                        render: (data, type, full, meta) => {

                                            let campoValor = ''
                                            if(parseInt(full.aplicado) == 0){
                                                let datosBanco = ''
                                                if(full.forma_pago != 'efectivo'){
                                                    datosBanco = `Banco: ${full.banco}, Cuenta: ${full.cuenta}`
                                                }
                                                campoValor = `
                                                    <h5 class="text-success">saldo Aplicado</h5>
                                                    <p>${full.forma_pago}</p>
                                                    <strong>${datosBanco}</strong>
                                                `
                                            }else{
                                                if (full.activo == 1) {
                                                    campoValor = `<br><button class="btn btn-primary mt-2" onclick="signarPago('${full.id}', '${dataIdAsign}', '${full.importe}', '${full.saldo}', '${full.aplicado}', '${full.fecha}')">Asignar Monto</button>`
                                                } else  {
                                                    campoValor = ''
                                                } 
                                            }
                                            return campoValor 
                                        }
                                    }
                                ]
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.error('<?=lang('Layout.toastrError') ?>');
                    $('#loadBtn').hide();           
                }
            });
        };

        const signarPago = (id, idPadre, importe, saldo, aplicado, fecha) => {
            $("#exampleModal").modal("hide")

            const { value: formValues } = Swal.fire({
                title: 'Asignar Monto',
                html:
                    `   <p class="font-weight-lighter">fecha: ${fecha} monto: $ ${numeral(aplicado).format('0,0')}</¿>
                        <div class="form-group">
                            <input type="text" placeholder="monto" required class="form-control mt-2" id="asign" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" >
                            <input type="date" placeholder="Fecha" class="form-control mt-2" id="fechaSaldo">
                            <select id="formaPago" class="form-control mt-2" >
                                <option value="">Método de Pago</option>
                                <option value="efectivo" >Efectivo</option>
                                <option value="transferencia" >Transferencia</option>
                            </select>
                            <select id="cuenta" class="form-control mt-2">
                                <option value="">Banco / Cuenta</option>
                                <option value="047 694 5147" >BBVA 047 694 5147</option>
                                <option value="015 491 0931" >BBVA 015 491 0931</option>
                            </select>
                        </div>
                    `,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',    
                confirmButtonText: 'Salvar',
                cancelButtonText: 'Cancelar',
                focusConfirm: false,

                preConfirm: () => {
                    // return [
                    let asign = document.getElementById('asign').value
                    let fechaSaldo = document.getElementById('fechaSaldo').value
                    let formaPago = document.getElementById('formaPago').value
                    let cuenta = document.getElementById('cuenta').value

                    if(parseInt(saldo)+parseInt(asign) > parseInt(importe)){
                        toastr.error("No puede superar el importe asignado");
                    }else{
                        let err = false
                        if(formaPago == "transferencia"){
                            if(cuenta == ''){
                                err = true
                            }
                        }
                        if(!err){
                            let formData = new FormData($(`#frmAsignacion`)[0]);
                            formData.append("id", id)
                            formData.append("saldo", parseInt(saldo)+parseInt(asign))
                            formData.append("fechaSaldo", fechaSaldo)
                            formData.append("formaPago", formaPago)
                            formData.append("banco", 'BBVA')
                            formData.append("cuenta", cuenta)
                            formData.append("idPadre", idPadre)
                            $.ajax({
                                url: base_url + '/setCompromisoPago',
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
                                        asignData(idPadre)
                
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
                        }else{
                            toastr.error("los campos Cuenta o Banco son requeridos al seleccionar Transferencia");
                        }
                    }
                    // ]
                }
            })

            // if (formValues) {
                // console.log(formValues)
                
            // }
        };

        btnMostrar.onclick = (e) => {
            e.preventDefault()
            $('#loadBtn').show();
            var formData = new FormData($("form#frmAsignacion")[0]);
            $.ajax({
                url: base_url + '/buscarData',
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
                        
                        table(response.data)

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

            $.ajax({
                url: base_url + '/getAllDataSearch',
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                async: true,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.succes.succes == 'succes'){
                        AlltotalGeneral.innerHTML = `$ ${numeral(response.data.sumSA[0].total).format('0,0')} `
                        Allsaldo.innerHTML = `$ ${numeral(response.data.sumSA[0].saldo).format('0,0')} `
                        Allaplicado.innerHTML = `$ ${numeral(response.data.sumSA[0].aplicado).format('0,0')} `
                        AlltotalAsignaciones.innerHTML = `${response.data.asig[0].totalAsign}`
                    }    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.error('<?=lang('Layout.toastrError') ?>');
                    $('#loadBtn').hide();           
                }
            });
        };

        const eliminar = (id, val, idArma) => {
            // if(val == 0){
                Swal.fire({
                    title: 'Seguro que lo deseas eliminar?',
                    text: `¡registrar los datos de todos los pagos recibidos antes de borrar!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#loadBtn').show();
                        var formData = new FormData($("form#frmAsignacion")[0]);
                        formData.append("idElimn", id)
                        formData.append("idArma", idArma)
                        formData.append("status", 0)
                        $.ajax({
                            url: base_url + '/deleteData',
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
                                    Swal.fire(
                                        'Eliminado!',
                                        'Su registro ha sido eliminado.',
                                        'success'
                                    )
                                    var count = 3;
                                    setInterval(function(){
                                        count--;
                                        if (count == 0) {
                                            window.location = base_url + '/asignaciones'; 
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
                })
            // }else{
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Oops...',
            //         text: '¡No se puede eliminar despues de un pago procesado!',
            //     })
            // }
        };

        const data_Bajas = {}

        let array_bajas = <?= json_encode($dataBaja) ?>

        array_bajas.forEach(baja => {
            data_Bajas[baja.id] = baja.valor;
        });

        const eliminarJuridico = (id, idArma) => {
                Swal.fire({
                    title: 'Seguro que lo deseas mandar a Juridico?',
                    text: `¡Describe el motivo!`,
                    input: 'select',
                    inputOptions: data_Bajas,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#loadBtn').show();
                        var formData = new FormData($("form#frmAsignacion")[0]);
                        formData.append("idElimn", id)
                        formData.append("idArma", idArma)
                        formData.append("status", 3)
                        formData.append("motivo", result.value)
                        $.ajax({
                            url: base_url + '/deleteData',
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
                                    Swal.fire(
                                        'Eliminado!',
                                        'Su registro ha sido eliminado.',
                                        'success'
                                    )
                                    var count = 3;
                                    setInterval(function(){
                                        count--;
                                        if (count == 0) {
                                            window.location = base_url + '/asignaciones'; 
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
                })
        };

    </script>

<?= $this->endSection() ?>