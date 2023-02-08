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
        #cardTotal{
            display: none;
        }
    </style>
    <div id="load" class=" spinner text-secondary" role="status"></div>
    <div class=" mb-2">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 ">
            </div>
        </div>    
    </div>   
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmAsignar">
            <div class="row">
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="cliente" class="control-label">Cliente <span class="text-danger">*</span></label>
                        <div >
                            <?= csrf_field() ?>
                            <select id="cliente" name="cliente" class="form-control" >
                                <option value="" selected>Selecciona una Opción</option>
                                <?php foreach($clientes as $cli):?>
                                    <option value="<?=$cli->id?>"><?=$cli->nombre_corto?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#cliente").select2({
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
                        <label for="elemento" class="control-label">Elemento <span class="text-danger">*</span></label>
                        <div >
                            <select id="elemento" name="elemento" class="form-control" >
                                <option value="" selected>Selecciona una Opción</option>
                                <?php foreach($elementos as $elm):?>
                                    <option value="<?=$elm->id?>"><?=$elm->primer_nombre?> <?=$elm->segundo_nombre == null ? '' : $elm->segundo_nombre ?> <?=$elm->apellido_paterno?> <?=$elm->apellido_materno?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#elemento").select2({
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
                        <label for="arma" class="control-label">Tipo de Arma <span class="text-danger">*</span></label>
                        <div >
                            <select id="arma" name="arma" class="form-control" >
                                <option value="" selected>Selecciona una Opción</option>
                                <?php foreach($armas as $arma):?>
                                    <option value="<?=$arma->id?>"><?=$arma->clase?> <?=$arma->marca ?> <?=$arma->modelo?> <?=$arma->matricula?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#arma").select2({
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
                        <label for="cartuchos" class="control-label">Cartuchos <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="cartuchos" name="cartuchos" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="3" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="modalidad" class="control-label">Modalidad<span class="text-danger">*</span></label>
                        <div >
                            <select id="modalidad" name="modalidad" class="form-control" >
                                <option value="" selected>Selecciona una Opción</option>
                                <?php foreach($modalidad as $mod):?>
                                    <option value="<?=$mod->id?>"><?=$mod->valor?></option>
                                <?php endforeach;?>
                                
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#modalidad").select2({
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
                        <label for="tipoPago" class="control-label">Tipo de Pago <span class="text-danger">*</span></label>
                        <div >
                            <select id="tipoPago" name="tipoPago" class="form-control" >
                                <option value="" selected>Selecciona una Opción</option>
                                <option value="efectivo" >Efectivo</option>
                                <option value="factura" >Factura</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#tipoPago").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="pagos" class="control-label">Cantidad de Pagos<span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="pagos" name="pagos" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="periodicidad" class="control-label">Periodicidad <span class="text-danger">*</span></label>
                        <div >
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
                                    $("#periodicidad").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="renta" class="control-label">Renta <span class="text-danger">*</span></label>
                        <div >
                            <input type="text"  class="form-control " id="renta" name="renta" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="tramite" class="control-label">Tramite</label>
                        <div >
                            <input type="text"  class="form-control " id="tramite" name="tramite" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="asignacion" class="control-label">Asignación</label>
                        <div >
                            <input type="text"  class="form-control " id="asignacion" name="asignacion" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="garantia" class="control-label">Garantía</label>
                        <div >
                            <input type="text"  class="form-control " id="garantia" name="garantia" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" >
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-4' id="cardTotal">    
                    <div class="form-group">
                        <label for="estado" class="control-label">Total</label>
                        <input type="text"  class="d-none" id="saldo" name="saldo" >
                        <input type="text"  class="d-none" id="total" name="total" >

                        <div >
                            <div class="card borderLeftPrimary">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total en General</p>
                                                <h5 class="font-weight-bolder mb-0 text-success" id="txtTotal">
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
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="fecha" class="control-label">Fecha de entrega </label>
                        <div >
                            <input type="date"  class="form-control " id="FechaEntrega" name=FechaEntrega>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="comisionista" class="control-label">Comisionista <span class="text-danger">*</span></label>
                        <div >
                            <?= csrf_field() ?>
                            <select id="comisionista" name="comisionista" class="form-control" >
                                <option value="" selected>Selecciona una Opción</option>
                                <?php foreach($comisionista as $com):?>
                                    <option value="<?=$com->id?>"><?=$com->nombre?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#comisionista").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-3'>    
                    <div class="form-group">
                        <label for="comision" class="control-label">Comisión</label>
                        <div >
                            <input type="text"  class="form-control " id="comision" name="comision" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="5" >
                        </div>
                    </div>
                </div>
            </div> 
        </form>
         
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 ">    
                <button id="btnGuardar" class="btn btn-block btn-flat btn-primary" type="button"><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
            </div> 
            <div class="col-4 col-sm-4 col-md-3 ">    
                <button id="btnLimpiar" class="btn btn-block btn-flat btn-danger" type="button"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp;&nbsp;Limpiar</button>
            </div>      
        </div>
        
    </div>    
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        let btnLimpiar = document.querySelector("#btnLimpiar")
        let btnGuardar = document.querySelector("#btnGuardar")
        let cliente = document.querySelector("#cliente")
        let elemento = document.querySelector("#elemento")
        let arma = document.querySelector("#arma")
        let modalidad = document.querySelector("#modalidad")
        let tipoPago = document.querySelector("#tipoPago")
        let periodicidad = document.querySelector("#periodicidad")
        let renta = document.querySelector("#renta")
        let tramite = document.querySelector("#tramite")
        let asignacion = document.querySelector("#asignacion")
        let garantia = document.querySelector("#garantia")
        let cardTotal = document.querySelector("#cardTotal")
        let txtTotal = document.querySelector("#txtTotal")
        let cartuchos = document.querySelector("#cartuchos")


        let saldo = document.querySelector("#saldo")
        let total = document.querySelector("#total")
        let pagos = document.querySelector("#pagos")

        btnLimpiar.onclick = (e) => {
            e.preventDefault()

            cardTotal.style.display = 'none'
            cardTotal.style.transition = '2s'
            
            txtTotal.innerHTML = ''
            cliente.value = ''
            elemento.value = ''
            arma.value = ''
            tipoPago.value = ''
            modalidad.value = ''
            periodicidad.value = ''
            renta.value = ''
            tramite.value = ''
            asignacion.value = ''
            garantia.value = ''
            cartuchos.value = ''
            $("#periodicidad").select2({
                allowClear: true,
                placeholder: "Selecciona una Opción"
            });
            $("#tipoPago").select2({
                allowClear: true,
                placeholder: "Selecciona una Opción"
            });
            $("#elemento").select2({
                allowClear: true,
                placeholder: "Selecciona una Opción"
            });
            $("#cliente").select2({
                allowClear: true,
                placeholder: "Selecciona una Opción"
            });
            $("#arma").select2({
                allowClear: true,
                placeholder: "Selecciona una Opción"
            });
            
            $("#arma").select2({
                allowClear: true,
                placeholder: "Selecciona una Opción"
            });
            
            $("#modalidad").select2({
                allowClear: true,
                placeholder: "Selecciona una Opción"
            });
        } 

        
        renta.onchange = (e) => asignTotal()
        tramite.onchange = (e) => asignTotal()
        asignacion.onchange = (e) => asignTotal()
        garantia.onchange = (e) => asignTotal()
        

        const asignTotal =  () => {
            cardTotal.style.display = 'block'
            cardTotal.style.transition = '2s'

            let _total = 0
            

            let valTramite = tramite.value == '' ? 0 : parseInt(tramite.value)
            let valAsign = asignacion.value == '' ? 0 : parseInt(asignacion.value)
            let valGarantia = garantia.value == '' ? 0 : parseInt(garantia.value)

            _total = (renta.value*pagos.value)+valTramite+valAsign+valGarantia 
            
            saldo.value = _total
            total.value = _total
            txtTotal.innerHTML = `$ ${numeral(_total).format('0,0')}`
        };

        btnGuardar.onclick = (event) => {
            event.preventDefault();
            $('#loadBtn').show();
            var formData = new FormData($("form#frmAsignar")[0]);
            $.ajax({
                url: base_url + '/addDataAsignacion',
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
                
        };
    </script>

<?= $this->endSection() ?>