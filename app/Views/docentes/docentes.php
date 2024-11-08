<?= $this->extend('layouts/admin') ?>

<!-- Enlaces de estilo para DataTables -->
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<?= $this->section('content') ?>

<!-- Título y breadcrumb -->
<?php $beadcrum = ['Home', 'Docentes']; ?>
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
                        
                        <h3 class="card-title">Ingresa nuevo Docente</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body">
                        <form id="dataForm">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                            <div class="row">
                                <div class="col-md-7 mb-3">
                                    <label for="nombre_Completo" class="form-label">Nombres Completo</label>
                                    <input type="text" class="form-control" id="nombre_Completo" name="nombre_Completo" required>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="matricula" class="form-label">Matricula</label>
                                    <input type="text" class="form-control" id="matricula" name="matricula" required>
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div> -->
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Agregar Datos</button>
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
                                    <th>ID</th>
                                    <th>Nombre Completo</th>
                                    <th>Matrícula</th>
                                    <th>Activo</th>
                                    <th>rol</th>
                                    <th>Acciones</th>
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
                const response = await fetch(base_url+'/GetAllDocents');
                const data = await response.json();
                dataTable.clear();
                
                data.forEach(record => {
                    dataTable.row.add([
                        record.id,
                        `${record.nombre_completo}`,
                        record.matricula,
                        record.activo == 1 ? '<i class="bi bi-power text-center text-success"></i>' : '<i class="bi bi-power text-center text-danger"></i>',
                        record.rol,
                        `<button class="btn btn-warning text-white btn-edit" data-id="${record.id}"><i class="bi bi-pencil"></i></button>
                         <button class="btn btn-danger btn-delete" data-id="${record.id}"><i class="bi bi-trash"></i></button>
                         <button class="btn btn-success btn-active" data-id="${record.id}"><i class="bi bi-power text-center"></i></button>
                         `
                    ]);
                });

                dataTable.draw();
            } catch (error) {
                console.error('Error al cargar los datos:', error);
            }
        };

        // Cargar datos al iniciar
        loadData();

        // Manejo del formulario de agregar/editar datos
        $('#dataForm').on('submit', async function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            // const formData = new FormData($('#dataForm')[0]);
            const formData = {
                nombre_Completo: $('#nombre_Completo').val(),
                matricula: $('#matricula').val(),
                ...(id ? {} : { password: '301006' })
            };
            
            try {
                const url = id ? `/updateDocents/${id}` : '/setDocents';
                const method = 'POST';

                const response = await fetch(base_url+url, {
                    method,
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(formData)
                });
                if (response.ok) {
                    const data = await response.json();
                    loadData();
                    Toast.fire({
                        icon: "success",
                        title: data.message
                    });
                    $('#dataForm')[0].reset();
                    $('#dataForm').removeData('id');
                    $('button[type="submit"]').text('Agregar Datos');
                } else {
                    const errorData = await response.json();
                    Toast.fire({
                        icon: "success",
                        title: errorData.message
                    });
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });

        // Manejo de acciones de editar y eliminar
        $('#docentes').on('click', '.btn-delete', async function() {
            const id = $(this).data('id');
            const formData = {
                activo: 0
            };
            try {
                const response = await fetch(base_url+`/deleteDocents/${id}`, { 
                    method: 'post',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();
                if (response.ok) {
                    loadData();
                
                    Toast.fire({
                        icon: "success",
                        title: data.message
                    });
                    // dataTable.row($(this).closest('tr')).remove().draw();
                }else{
                    Toast.fire({
                        icon: "error",
                        title: data.message
                    });
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });

        $('#docentes').on('click', '.btn-active', async function() {
            const id = $(this).data('id');
            const formData = {
                activo: 1
            };
            try {
                const response = await fetch(base_url+`/deleteDocents/${id}`, { 
                    method: 'post',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(formData)
                });

                // let data = await response.json()
                // console.log(data)
                const data = await response.json();
                if (response.ok) {
                    loadData();
                
                    Toast.fire({
                        icon: "success",
                        title: data.message
                    });
                    // dataTable.row($(this).closest('tr')).remove().draw();
                }else{
                    Toast.fire({
                        icon: "error",
                        title: data.message
                    });
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });

        $('#docentes').on('click', '.btn-edit', async function() {
            const id = $(this).data('id');

            try {
                const response = await fetch(base_url+`/getDocent/${id}`);
                const record = await response.json();

                $('#nombre_Completo').val(record.nombre_completo);
                $('#matricula').val(record.matricula);

                $('#dataForm').data('id', id);
                $('#dataForm button[type="submit"]').text('Actualizar Datos');
            } catch (error) {
                console.error('Error al cargar el registro:', error);
            }
        });

        

    });


</script>

<?= $this->endSection() ?>
