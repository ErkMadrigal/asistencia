<?= $this->extend('layouts/admin') ?>

<!-- Enlaces de estilo para DataTables -->
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<?= $this->section('content') ?>

<!-- Título y breadcrumb -->
<?php $beadcrum = ['Home', 'Asistencias']; ?>
<?= view('components/navar-side') ?>
<main class="app-main">
    <?= view('components/beadcrum', ['data' => $beadcrum]) ?>

    <!-- Contenido de la página -->
    <div class="app-content">
        <div class="container-fluid">
            <section class="content">
                <!-- Formulario para ingresar datos -->
                <div class="card">
                    <div class="card-header">
                        
                        <h3 class="card-title">Buscar</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body">
                        <form id="dataForm">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="curp" class="form-label">CURP</label>
                                    <input type="text" class="form-control" id="curp" name="curp" require>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Buscar</button>
                        </form>
                    </div>
                </div>

                <!-- Tabla de datos -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Docentes</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body">
                        <table id="docentes" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre Alumno</th>
                                    <th>CURP</th>
                                    <th>Docente</th>
                                    <th>Hora de Ingreso</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Los datos se llenarán con JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

</main>

<?= view('components/footer') ?>

<!-- Scripts necesarios -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        const dataTable = $('#docentes').DataTable({
            destroy: true, 
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
            }
        });

        // Función para cargar datos desde la API
        const loadData = async () => {
            try {
                const response = await fetch(base_url+'/GetAllAsistencias');
                const data = await response.json();
                dataTable.clear();
                
                data.forEach(record => {
                    dataTable.row.add([
                        record.nombre_estudiante,
                        record.curp,
                        record.nombre_completo,
                        record.ingreso,
                    ]);
                });

                dataTable.draw();
            } catch (error) {
                console.error('Error al cargar los datos:', error);
            }
        };

        // Cargar datos al iniciar
        loadData();

        $('#dataForm').on('submit', async function(e) {
            e.preventDefault();
            // const formData = new FormData($('#dataForm')[0]);
            const formData = {
                curp: $('#curp').val(),
            };
            
            try {
                const method = 'POST';

                const response = await fetch(base_url+'/searchAsistencia', {
                    method,
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(formData)
                });
                dataTable.clear();

                if (response.ok) {
                    const data = await response.json();
                    console.log(data.data)
                
                    Toast.fire({
                        icon: "success",
                        title: data.message
                    });
                    data.data.forEach(record => {
                        dataTable.row.add([
                            record.nombre_estudiante,
                            record.curp,
                            record.nombre_completo,
                            record.ingreso,
                        ]);
                    });

                    dataTable.draw();
                    
                    $('#dataForm')[0].reset();
                    $('#dataForm').removeData('id');
                    $('button[type="submit"]').text('Buscar');
                } else {
                    const errorData = await response.json();
                    Toast.fire({
                        icon: "danger",
                        title: errorData.message
                    });
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });


    });


</script>

<?= $this->endSection() ?>
