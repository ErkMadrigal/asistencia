<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
    
    <div id="load" class=" spinner text-secondary" role="status"></div>
    <div class=" mb-2">    
        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 ">
            </div>
        </div>    
    </div>   
    <div class="card-body">
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>        
    </div>    
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        $('#table').DataTable({
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
            });
    </script>

<?= $this->endSection() ?>