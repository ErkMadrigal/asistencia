<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
    <div id="load" class=" spinner text-secondary" role="status"></div>
    <div class=" mb-2">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 ">
            </div>
        </div>    
    </div>   
    <div class="card card-primary ">
        <div class="card-header" id="tabMain">
            <h3 class="card-title">Deudores</h3>
        
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
                    <!-- <th>Detalles</th> -->
                    <th>Cliente</th>
                    <th>Elemento</th>
                    <th>Arma</th>
                    <th>Pagos</th>
                    <th>Periocidad</th>
                    <th>Renta</th>
                    <th>Pagos Atrasados</th>
                    <th>Total</th>
                    <th>Ultimo pago</th>
                </tr>
                </thead>
            </table>
        </div>
        
    </div>  
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        const table = (datos) =>{
            $('#dataGrid').DataTable({
                data: datos,
                destroy: true,
                deferRender: true,
                // scrollX: true,
                paging: true,
                scrollCollapse: true,
                fixedColumns:   {
                    left: 2//Le indico que deje fijas solo las 2 primeras columnas
                },
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },
                pageLength: 12,
                columns: [
                            // { data: "detail",
                            //     render: (data, type, full, meta) => {
                            //         return "<a href='" + base_url + "/detailAsignacion?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                            //     }
                            // },
                            { data: "cliente"},
                            { data: "nombre"},
                            { data: "arma"},
                            { data: "pagos"},
                            { data: "periodicidad"},
                            { data: "renta",  render: (data, type, full, meta) => "$ "+numeral(full.renta).format('0,0') },
                            { data: "pagosVencidos", render: (data, type, full, meta) => numeral(full.pagosVencidos).format('0,0') },
                            { data: "total", render: (data, type, full, meta) => "$ "+numeral(full.pagosVencidos*full.renta).format('0,0') },
                            { data: "ultimoPago"},
                        ]
            });
        }
        table(<?= json_encode($datos) ?>);
    </script>

<?= $this->endSection() ?>