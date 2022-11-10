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
    <div class=" mb-1">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 ">
            </div>
        </div>    
    </div>   
    <div class="card-body">
        <div class="row">
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Renta</p>
                                    <h5 class="font-weight-bolder mb-0" id="renta">
                                        
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
    <div class="card">
        <div class="card-body row">
            <div class='col-12 col-sm-4'>
                <div class="form-group">
                    <i class="m-2 fa fa-building " aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Cliente</label>
                    <p class="ml-5"><?=$datos[0]->cliente?></p>
                </div>
            </div>
            <div class='col-12 col-sm-4'>
                <div class="form-group">
                    <i class="m-2 fa fa-user " aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Elemento</label>
                    <p class="ml-5"><?=$datos[0]->nombre?></p>
                    <p class="ml-5">Cuip: <?=$datos[0]->Cuip?></p>
                    
                </div>
            </div>
            <div class='col-12 col-sm-4'>
                <div class="form-group">
                    <i class="m-2 fa fa-list " aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Modalidad</label>
                    <p class="ml-5"><?=$datos[0]->modalidad?></p>
                </div>
            </div>
            <div class='col-12 col-sm-4'>
                <div class="form-group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width: 43px;height: 19px;"><path d="M528 56c0-13.3-10.7-24-24-24s-24 10.7-24 24v8H32C14.3 64 0 78.3 0 96V208c0 17.7 14.3 32 32 32H42c20.8 0 36.1 19.6 31 39.8L33 440.2c-2.4 9.6-.2 19.7 5.8 27.5S54.1 480 64 480h96c14.7 0 27.5-10 31-24.2L217 352H321.4c23.7 0 44.8-14.9 52.7-37.2L400.9 240H432c8.5 0 16.6-3.4 22.6-9.4L477.3 208H544c17.7 0 32-14.3 32-32V96c0-17.7-14.3-32-32-32H528V56zM321.4 304H229l16-64h105l-21 58.7c-1.1 3.2-4.2 5.3-7.5 5.3zM80 128H464c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                    <label for="updateddate" class="control-label">Arma</label>
                    <p class="ml-5"><?=$datos[0]->arma?></p>
                    <p class="ml-5">Cartuchos: <?=$datos[0]->cantidad_Cartuchos?></p>
                </div>
            </div>
            
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-body row">
            <div class='col-12 col-sm-4'>
                <div class="form-group">
                    <i class="m-2 fa fa-money-bill " aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Tipo Pago</label>
                    <p class="ml-5"><?=$datos[0]->tipo_pago?></p>
                </div>
            </div>
            <div class='col-12 col-sm-4'>
                <div class="form-group">
                    <i class="m-2 fa fa-hashtag " aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Pagos</label>
                    <p class="ml-5"><?=$datos[0]->pagos?></p>
                </div>
            </div>
            <div class='col-12 col-sm-4'>
                <div class="form-group">
                    <i class="m-2 fa fa-clock" aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">periodicidad</label>
                    <p class="ml-5"><?=$datos[0]->periodicidad?></p>
                </div>
            </div>
            <div class='col-12 col-sm-4'>
                <div class="form-group">
                    <i class="m-2 fa fa-dollar " aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Tramite</label>
                    <p class="ml-5" id="tramite"></p>
                </div>
            </div>
            <div class='col-12 col-sm-4'>
                <div class="form-group">
                    <i class="m-2 fa fa-dollar" aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Asignación</label>
                    <p class="ml-5" id="asigacion"></p>
                </div>
            </div>
            <div class='col-12 col-sm-4'>
                <div class="form-group">
                    <i class="m-2 fa fa-dollar" aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Garantía</label>
                    <p class="ml-5" id="garantia"></p>
                </div>
            </div>    
            <div class='col-12 col-sm-4'>
                <br><br>
                <button class="btn btn-block btn-primary" data-toggle='modal' data-target='#exampleModal' onclick="asignData()"><i class="m-2 fa fa-eye" aria-hidden="true"></i>Ver Compromiso De Pago</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-body row">
            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="m-2 fa fa-calendar" aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Fecha Entrega</label>
                    <p class="ml-5"><?=$datos[0]->entrega?></p>
                </div>
            </div>
            <div class='col-12 col-sm-6'>
                <div class="form-group">
                    <i class="m-2 fa fa-calendar" aria-hidden="true"></i>
                    <label for="updateddate" class="control-label">Fecha Final</label>
                    <p class="ml-5"><?=$datos[0]->final?></p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row callout callout-warning">
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-user " aria-hidden="true"></i>
                <label for="creado" class="control-label">Creado por: </label>
                <div>
                <?=$getById->nombreC ?> <?=$getById->paternoC ?> <?=$getById->maternoC ?>
                </div>
            </div>
        </div>
        
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-calendar " aria-hidden="true"></i>
                <label for="createddate" class="control-label">Fecha creación: </label>
                <div>
                <?=$getById->createddate ?>
                </div>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-user " aria-hidden="true"></i>
                <label for="actualizado" class="control-label">Actualizado por: </label>
                <div>
                <?=$getById->nombreU ?> <?=$getById->paternoU ?> <?=$getById->maternoU ?>
                </div>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class="form-group">
                <i class="fa fa-calendar " aria-hidden="true"></i>
                <label for="updateddate" class="control-label">Fecha actualización: </label>
                <div>
                <?=$getById->updateddate ?>
                </div>
            </div>
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
            <div class="modal-body container-fluid">
                <table id="data" class="table-stripe text-center table-hover table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th>Pago</th>
                        <th>Fecha</th>
                        <th>Concepto</th>
                        <th>Importe</th>
                        <th>Aplicado</th>
                        <th>Saldo</th>
                        <th>Activo</th>
                        <th>Estatus</th>
                        <th>Asignado Por</th>
                    </tr>
                    </thead>
                </table>
            </div>
            
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>

        let AlltotalGeneral = document.querySelector("#totalGeneral")
        let Allsaldo = document.querySelector("#saldo")
        let Allaplicado = document.querySelector("#aplicado")
        let renta = document.querySelector("#renta")
        let tramite = document.querySelector("#tramite")
        let asigacion = document.querySelector("#asigacion")
        let garantia = document.querySelector("#garantia")
        
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
                    if(response.succes.succes == 'succes'){
                        console.log()
                        AlltotalGeneral.innerHTML = `$ ${numeral(response.data.sumSA[0].total).format('0,0')} `
                        Allsaldo.innerHTML = `$ ${numeral(response.data.sumSA[0].saldo).format('0,0')} `
                        Allaplicado.innerHTML = `$ ${numeral(response.data.sumSA[0].aplicado).format('0,0')} `
                    }    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.error('<?=lang('Layout.toastrError') ?>');
                    $('#loadBtn').hide();           
                }
            });
            renta.innerHTML = `$ ${numeral(<?=$datos[0]->renta?>).format('0,0')} `
            tramite.innerHTML = `$ ${numeral(<?=$datos[0]->tramite?>).format('0,0')} `
            asigacion.innerHTML = `$ ${numeral(<?=$datos[0]->asignacion?>).format('0,0')} `
            garantia.innerHTML = `$ ${numeral(<?=$datos[0]->garantia?>).format('0,0')} `
            
        }
                
        setInterval(() => mostrarDatosGen() ,1000);
        
        const  estatusRenderer = (data, type, full, meta) => {
            var src;
            
            if (full.activo == 1) {
                src = "<i class='m-2 fa fa-check-circle text-success'></i>";
            } else  {
                src = "<i class='m-2 fa fa-times-circle text-danger'></i>";
            } 

            return src;
        }

        const asignData = () => {
            
            $('#data').DataTable({
                data: <?= json_encode($datosPagos) ?>,
                destroy: true,
                responsive: true,
                deferRender: true,
                pageLength: 10,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },
                columns: [
                    { data: "pago"},
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
                                campoValor = '<h5 class="text-success">pagado</h5>'
                            }else{
                                campoValor = '<h5 class="text-danger">sin pago</h5>'
                            }
                            return campoValor 
                        }
                    },
                    {data: "pago",
                        render: (data, type, full, meta) => {
                            let nombre = ' '
                            nombre = full.nombre != null ? full.nombre+' ': ' '
                            nombre += full.paterno != null ? full.paterno+' ': ' '

                            return nombre   
                        }
                    }
                ]
            });
        };
    </script>

<?= $this->endSection() ?>