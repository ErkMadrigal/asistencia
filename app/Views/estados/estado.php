<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
    <div id="load" class=" spinner text-secondary" role="status"></div>
    <div class=" mb-2">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 ">
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/addEstado " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Agregar</a>
            </div>
        </div>    
    </div>   
    <div class="card-body table-responsive ">
        <form class="form-horizontal" id="frmEstados">
            <div class="row">
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="estado" class="control-label">Estados</label>
                        <div >
                            <?= csrf_field() ?>
                            <select id="estado" name="estado" class="form-control" >
                                <option value="" selected>Selecciona una Opcion</option>
                                <?php foreach($estados as $est):?>
                                    <option value="<?=$est->estado?>"><?=$est->estado?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>    
                    <div class="form-group">
                        <label for="capital" class="control-label">Capitales</label>
                        <div >
                            <select id="capital" name="capital" class="form-control">
                                <option value="" selected>Selecciona una Opcion</option>
                                    <?php foreach($estados as $est):?>
                                        <option value="<?=$est->capital?>"><?=$est->capital?></option>
                                    <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                
            </div> 
        </form>
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 ">    
                <button id="btnMostrar" class="btn btn-block btn-flat btn-primary" type="button"><i id="loadBtn" class="fa fa-circle-o-notch fa-spin" style="display:none;"></i>&nbsp&nbspMostrar</button>
            </div> 
            <div class="col-4 col-sm-4 col-md-3 ">    
                <button id="btnLimpiar" class="btn btn-block btn-flat btn-danger" type="button">Limpiar</button>
            </div>      
        </div>
    </div> 
    <div class="card card-primary ">
        <div class="card-header" id="tabMain">
            <h3 class="card-title">Estados</h3>
        
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
                    <th>Estado</th>
                    <th>Capital</th>
                    <th>Municipio</th>
                    <th>activo</th>
                    <th>Editar</th>
                    <th>Detalle</th>
                </tr>
                </thead>
            </table>
        </div>
        
    </div>
    <script>
    let btnMostrar = document.querySelector("#btnMostrar")

    let btnLimpiar = document.querySelector("#btnLimpiar")
    let boxCapital = document.querySelector("#capital")
    let boxEstado = document.querySelector("#estado")

    btnLimpiar.onclick = (e) => {
        e.preventDefault()
        boxCapital.value = ''
        boxEstado.value = ''
    }  

    const  estatusRenderer = (data, type, full, meta) => {
        var src;
        
        if (full.activo == 1) {
            src = "<i class=\'fa fa-check-circle\'></i>";
        } else  {
            src = "<i class=\'fa fa-times-circle\'></i>";
        } 

        return src;
    };


    btnMostrar.onclick = (e) => {
        e.preventDefault()
        let formData = new FormData($("form#frmEstados")[0]);
        $.ajax({
            url: base_url + '/mostrarDatosEstados',
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
                    pageLength: 5,
                    columns: [{ data: "estado"},
                                { data: "capital"},
                                { data: "descripcion"},
                                { data: "activo", render: estatusRenderer }, 
                                {  data: "edit",
                                    render: (data, type, full, meta) => {
                            
                                        return "<a href='" + base_url + "/editEstado?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
                            
                                    }
                                }, 
                                { data: "detail",
                                    render: (data, type, full, meta) => {
                            
                                        return "<a href='" + base_url + "/detailEstado?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                            
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