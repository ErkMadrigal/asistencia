<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>

<div id="load" class=" spinner text-secondary" role="status">
</div>
<div class="row mb-2">
    
    <div class="col-12 col-sm-6 col-md-9 "></div>
    <div class="col-12 col-sm-6 col-md-3 ">
        <button class="btn btn-block btn-flat btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;&nbsp; agrega ubicacion</button>
        
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form class="form-horizontal" id="frmUbicacion">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Agregar Licencia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class='col-12 col-sm-6'>    
                                    <div class="form-group">
                                        <label for="licencias" class="control-label">Licencia <span class="text-danger">*</span></label>
                                        <div >
                                            <?= csrf_field() ?>
                                            <select id="licencias" name="licencias" class="form-control" >
                                                <option value="" selected>Selecciona una Opción</option>
                                                <?php foreach($licencias as $lic):?>
                                                    <option value="<?=$lic->id_licencia?>"><?=$lic->No_oficio?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#licencias").select2({
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
                                        <label for="tipoUbicacion" class="control-label">Tipo Ubicacion <span class="text-danger">*</span></label>
                                        <div >
                                            <select id="tipoUbicacion" name="tipoUbicacion" class="form-control" >
                                                <option value="" selected>Selecciona una Opción</option>
                                                <?php foreach($tipoUbicacion as $ubicacion):?>
                                                    <option value="<?=$ubicacion->id?>"><?=$ubicacion->valor?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#tipoUbicacion").select2({
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
                                        <label for="calle" class="control-label">Calle: <span class="text-danger">*</span></label>
                                        <div >
                                            <input type="text"  class="form-control " id="calle" name="calle">
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-3'>    
                                    <div class="form-group">
                                        <label for="No.Exterior" class="control-label">No.Exterior: <span class="text-danger">*</span></label>
                                        <div >
                                            <input type="text"  class="form-control " id="No_Exterior" name="No_Exterior" >
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-3'>    
                                    <div class="form-group">
                                        <label for="No.Interior" class="control-label">No.Interior: </label>
                                        <div >
                                            <input type="text"  class="form-control " id="No_Interior" name="No_Interior" >
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-6'>    
                                    <div class="form-group">
                                        <label for="CP" class="control-label">Codigo Postal: <span class="text-danger">*</span></label>
                                        <div >
                                            <input type="text" onchange="selectDir()" class="form-control " id="CP" name="CP" >
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-6'>    
                                    <div class="form-group">
                                        <label for="Colonia" class="control-label">Colonia: <span class="text-danger">*</span></label>
                                        <div >
                                            <select id="Colonia" name="Colonia" class="form-control" >
                                                <option value="" selected>Selecciona una Opción</option>
                                                
                                            </select>
                                            <!-- <input type="text"  class="form-control " id="Colonia" name="Colonia" > -->
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-6'>    
                                    <div class="form-group">
                                        <label for="Municipio" class="control-label">Municipio: <span class="text-danger">*</span></label>
                                        <div >
                                            <input type="text"  class="form-control " id="Municipio" name="Municipio" >
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12 col-sm-6'>    
                                    <div class="form-group">
                                        <label for="Estado" class="control-label">Estado: <span class="text-danger">*</span></label>
                                        <div >
                                            <input type="text"  class="form-control " id="Estado" name="Estado" >
                                        </div>
                                    </div>
                                </div>
                               
                                
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-primary" id="guardar">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header" id="tabMain">
        <h3 class="card-title">Ubicaciones</h3>
    
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
     </div>
</div>

    <!-- /.card-header -->
    <div class="card-body table-responsive ">
        <table id="dataGrid" class="table  text-center table-hover table-head-fixed text-nowrap">
            <thead>
            <tr>
                <th>Licencia</th>
                <th>tipo Ubicación</th>
                <th>Dirección</th>
                <th>estado</th>
                <th>Codigo Postal</th>
                <th>Activo</th>
                <th>Editar</th>
                <th>Detalles</th>
       		</tr>
            </thead>
        </table>
    </div>
    
</div>
 <script>
    
    $('#guardar').click(function (event) {
        event.preventDefault();
        $('#load').addClass( "spinner-border" );
        var formData = new FormData($("form#frmUbicacion")[0]);
        
        $.ajax({
            url: base_url + '/GuardarUbicacionArmas',
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

                    var count = 2;
                    setInterval(function(){
                      count--;
                      if (count == 0) {
                        window.location = base_url + '/ubicaciones'; 
                      }
                    },1000);

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
            
    });

    const selectDir = () => {
        let CP = document.querySelector("#CP").value
        let Colonia = document.querySelector("#Colonia")
        let Municipio = document.querySelector("#Municipio")
        let Estado = document.querySelector("#Estado")
        var formData = new FormData($("form#frmUbicacion")[0]);
        formData.append("cp", CP)
        $.ajax({
            url: base_url + '/llenadoCampos',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                Colonia.innerHTML = ``
                response.data.forEach(res => {
                    Colonia.innerHTML += `<option value="${res.asentamiento}">${res.asentamiento}</option>`
                });
                Estado.value = response.data[0].estado
                Municipio.value = response.data[0].municipio   
                
                console.log(response.data[0].estado)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError')?>');
                $('#load').removeClass( "spinner-border" );           
            }
        });
    }

    const  estatusRenderer = (data, type, full, meta) => {
        var src;
        
        if (full.activo == 1) {
            src = "<i class='fa fa-check-circle text-success'></i>";
        } else  {
            src = "<i class='fa fa-times-circle text-danger'></i>";
        } 

        return src;
    }
    var table = $('#dataGrid').DataTable({
            data: <?= json_encode($allubicacion) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [
                { data: "No_oficio"
                },
                { data: "tipo_ubicacion"
                },
                { data: "direccion"
                },
                { data: "estado"
                },
                { data: "codigo_postal"
                },
                { data: "activo",
                    render: estatusRenderer
                },
                { data: "aditar",
                    render: (data, type, full, meta) => {
                        return "<a href='" + base_url + "/editarUbicacion?id=" + full.id_ubicacion  + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
            
                    }
                },
                { data: "detalles",
                    render: (data, type, full, meta) => {
                        return "<a href='" + base_url + "/detialUbicacion?id=" + full.id_ubicacion  + "' class='nav-link'><i class='fa fa-file nav-icon'></i>";
            
                    }
                },
            ]
        });

</script>
<?= $this->endSection() ?>