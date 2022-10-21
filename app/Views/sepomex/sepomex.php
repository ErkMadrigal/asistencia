<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
    <div id="load" class=" spinner text-secondary" role="status"></div>
    <div class=" mb-2">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 ">
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/AddSepomex " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Agregar Sepomex</a>
            </div>
        </div>    
    </div>   
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmSepomex">
            <div class="row">
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="cp" class="control-label">Codigo Postal</label>
                        <div >
                            <input type="text"  class="form-control " id="cp" name="cp" ><?= csrf_field() ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="estado" class="control-label">Estado</label>
                        <div >
                            <select id="estado" name="estado" class="form-control" >
                                <option value="" selected>Selecciona una Opcion</option>
                                <?php foreach($sepomexEstados as $estado => $valor):?>
                                    <option value="<?=$valor->estado?>"><?=$valor->estado?></option>
                                <?php endforeach;?>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#estado").select2({
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
                        <label for="ciudad" class="control-label">Ciudad</label>
                        <div >
                            <select id="ciudad" name="ciudad" class="form-control">
                                    <option value="" selected>Selecciona una Opción</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#ciudad").select2({
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
                        <label for="municipio" class="control-label">Municipio</label>
                        <div >
                            <select id="municipio" name="municipio" class="form-control">
                                    <option value="" selected>Selecciona una Opción</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#municipio").select2({
                                        theme: "bootstrap4",
                                        width: "100%"
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div> 
        </form>
        <div class="col-12 col-sm-6 col-md-3 ">    
            <button id="btnMostrar" class="btn btn-block btn-flat btn-primary" type="button"><i id="loadBtn" class="fa fa-circle-o-notch fa-spin" style="display:none;"></i>&nbsp&nbspMostrar</button>
        </div>       
    </div> 
    <div class="card card-primary ">
        <div class="card-header" id="tabMain">
            <h3 class="card-title">Sepomex</h3>
        
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
                    <th>Codigo Postal</th>
                    <th>Asentamiento</th>
                    <th>Municipio</th>
                    <th>Estado</th>
                    <th>activo</th>
                    <th>Editar</th>
                    <th>Detalle</th>
                </tr>
                </thead>
            </table>
        </div>
        
    </div>


<script>
    const  estatusRenderer = (data, type, full, meta) => {
        var src;
        
        if (full.activo == 1) {
            src = "<i class=\'fa fa-check-circle\'></i>";
        } else  {
            src = "<i class=\'fa fa-times-circle\'></i>";
        } 

        return src;
    }
    // var table = $('#dataGrid').DataTable({
    //     data: <?= json_encode($sepomex) ?> ,
    //     deferRender: true,
    //     pageLength: 5,
    //     columns: [{ data: "codigoPostal"},
    //                 { data: "asentamiento"},
    //                 { data: "municipio"},
    //                 { data: "ciudad"},
    //                 { data: "estado"},
    //                 { data: "activo", render: estatusRenderer }, 
    //                 {  data: "edit",
    //                     render: (data, type, full, meta) => {
                
    //                         return "<a href='" + base_url + "/editSepomex?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
                
    //                     }
    //                 }, 
    //                 { data: "detail",
    //                     render: (data, type, full, meta) => {
                
    //                         return "<a href='" + base_url + "/detailSepomex?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                
    //                     }
    //                 }
    //             ]
    // });

    let estado = document.querySelector("#estado")

    let selectMunicipio = document.querySelector("#municipio")
    let selectCiudad = document.querySelector("#ciudad")

    estado.onchange = (e) => {
        selectCiudad.innerHTML = ''
        selectMunicipio.innerHTML = ''

        e.preventDefault()
        let formData = new FormData($("form#frmSepomex")[0]);
        $.ajax({
            url: base_url + '/getDataSepomex',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.succes.succes === "succes"){
                    selectMunicipio.innerHTML = '<option value="" selected>Selecciona una Opción</option>'
                    selectCiudad.innerHTML = '<option value="" selected>Selecciona una Opción</option>'
                    response.dataMunicipio.forEach( municipio => {
                        selectMunicipio.innerHTML += `<option value="${municipio.municipio}">${municipio.municipio}</option>`
                        
                    })
                    response.dataCiudad.forEach( ciudad => {
                        selectCiudad.innerHTML += `<option value="${ciudad.ciudad}">${ciudad.ciudad}</option>`
                    })
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('<?=lang('Layout.toastrError') ?>');
                $('#loadBtn').hide();           
            }
        });
    };

    let btnMostrar = document.querySelector("#btnMostrar")

    btnMostrar.onclick = (e) => {
        e.preventDefault()
        let formData = new FormData($("form#frmSepomex")[0]);
        $.ajax({
            url: base_url + '/mostrarDatosSepomex',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                $('#dataGrid').DataTable({
                    data: response.data,
                    destroy: true,
                    deferRender: true,
                    pageLength: 10,
                    columns: [{ data: "codigoPostal"},
                                { data: "asentamiento"},
                                { data: "municipio"},
                                { data: "estado"},
                                { data: "activo", render: estatusRenderer }, 
                                {  data: "edit",
                                    render: (data, type, full, meta) => {
                            
                                        return "<a href='" + base_url + "/editSepomex?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
                            
                                    }
                                }, 
                                { data: "detail",
                                    render: (data, type, full, meta) => {
                            
                                        return "<a href='" + base_url + "/detailSepomex?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                            
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
    }

</script>    

<?= $this->endSection() ?>