<?= $this->extend('layouts/admin') ?>

<!-- Enlaces de estilo para DataTables -->
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<?= $this->section('content') ?>

<!-- Título y breadcrumb -->
<?php $beadcrum = ['Home', 'Estudiantes']; ?>
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
                        
                        <h3 class="card-title">Ingresa nuevo estudiante</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body">
                        <form id="dataForm">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="paterno" class="form-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="paterno" name="paterno" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="materno" class="form-label">Apellido Materno</label>
                                    <input type="text" class="form-control" id="materno" name="materno" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="curp" class="form-label">CURP</label>
                                    <input type="text" class="form-control" id="curp" name="curp" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="matricula" class="form-label">Matricula</label>
                                    <input type="text" class="form-control" id="matricula" name="matricula" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Agregar Datos</button>
                        </form>
                    </div>
                </div>

                <!-- Tabla de datos -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Estudiantes</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body">
                        <table id="estudiantes" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Completo</th>
                                    <th>CURP</th>
                                    <th>Matrícula</th>
                                    <th>Activo</th>
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

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            
                            <h3 class="card-title">Ingresa nuevo número de Contacto</h3>
                            <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                        </div>
                        <div class="card-body">
                            <form id="dataFormContactos">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                <input type="hidden" name="idEstudent" />

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="telefono" class="form-label">telefono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="parentesco" class="form-label">parentesco</label>
                                        <input type="text" class="form-control" id="parentesco" name="parentesco" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-end"><i class="bi bi-plus"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Estudiantes</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div>
                    <div class="card-body">
                        <table id="tableContactos" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>telefono</th>
                                    <th>parentesco</th>
                                    <th>activo</th>
                                    <th>desactivar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Los datos se llenarán con JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
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
        const dataTable = $('#estudiantes').DataTable({
            destroy: true, 
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
            }
        });

        // Función para cargar datos desde la API
        const loadData = async () => {
            try {
                const response = await fetch(base_url+'/GetAllEstudents');
                const data = await response.json();
                dataTable.clear();
                
                data.forEach(record => {
                    dataTable.row.add([
                        record.id,
                        `${record.nombres} ${record.paterno} ${record.materno}`,
                        record.curp,
                        record.matricula,
                        record.activo == 1 ? '<i class="bi bi-power text-center text-success"></i>' : '<i class="bi bi-power text-center text-danger"></i>',
                        `<button class="btn btn-warning text-white btn-edit" data-id="${record.id}"><i class="bi bi-pencil"></i></button>
                         <button class="btn btn-danger btn-delete" data-id="${record.id}"><i class="bi bi-trash"></i></button>
                         <button class="btn btn-primary btn-watch" data-id="${record.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-whatever="${record.nombres} ${record.paterno} ${record.materno}"><i class="bi bi-eye"></i></button>`
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
                nombres: $('#nombres').val(),
                paterno: $('#paterno').val(),
                materno: $('#materno').val(),
                curp: $('#curp').val(),
                matricula: $('#matricula').val(),
            };
            try {
                const url = id ? `/updateEstudiante/${id}` : '/setEstudiante';
                const method = 'POST';

                const response = await fetch(base_url+url, {
                    method,
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(formData)
                });
                console.log(response)
                if (response.ok) {
                    loadData();
                    $('#dataForm')[0].reset();
                    $('#dataForm').removeData('id');
                    $('button[type="submit"]').text('Agregar Datos');
                } else {
                    const errorData = await response.json();
                    alert(errorData.message);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });

        // Manejo de acciones de editar y eliminar
        $('#estudiantes').on('click', '.btn-delete', async function() {
            const id = $(this).data('id');

            try {
                const response = await fetch(base_url+`/deleteEstudiantes/${id}`, { method: 'post' });
                if (response.ok) {
                    loadData();

                    // dataTable.row($(this).closest('tr')).remove().draw();
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });

        $('#estudiantes').on('click', '.btn-edit', async function() {
            const id = $(this).data('id');

            try {
                const response = await fetch(base_url+`/getEstudent/${id}`);
                const record = await response.json();

                $('#nombres').val(record.nombres);
                $('#paterno').val(record.paterno);
                $('#materno').val(record.materno);
                $('#curp').val(record.curp);
                $('#matricula').val(record.matricula);

                $('#dataForm').data('id', id);
                $('#dataForm button[type="submit"]').text('Actualizar Datos');
            } catch (error) {
                console.error('Error al cargar el registro:', error);
            }
        });


        $('#estudiantes').on('click', '.btn-watch', async function() {
            let id_estudiante = $(this).data('id');
            let dataTableContacts = $('#tableContactos').DataTable({
                destroy: true, 
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
                }
            });
            const subtable = async () =>{
                try {
                    const response = await fetch(base_url+'/getContacts/'+id_estudiante);
                    const data = await response.json();
                    dataTableContacts.clear();
                    
                    data.forEach(record => {
                        dataTableContacts.row.add([
                            record.telefono,
                            record.parentesco,
                            record.activo == 1 ? '<i class="bi bi-power text-center text-success"></i>' : '<i class="bi bi-power text-center text-danger"></i>',
                            `<button class="btn btn-warning text-white btn-edit" data-id="${record.id}"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-danger btn-delete" data-id="${record.id}"><i class="bi bi-trash"></i></button>
                            <button class="btn btn-success btn-open" data-id="${record.id}"><i class="bi bi-power"></i></button>`
                        ]);
                    });
    
                    dataTableContacts.draw();
                } catch (error) {
                    console.error('Error al cargar los datos:', error);
                }
                
            }
            subtable();


            // manejo de eliminar
            $('#tableContactos').on('click', '.btn-delete', async function() {
                let id_delete = $(this).data('id');
                const formData = {
                    activo: 0,
                };
                try {
                    const response = await fetch(base_url+`/active_Desactive_Phone/${id_delete}`, { 
                        method: 'post',
                        body: JSON.stringify(formData) 
                    });
                    if (response.ok) {
                        // subtable();
                        console.log(dataTableContacts)
                        // dataTableContacts.row($(this).closest('tr')).remove().draw();
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            });

            // manejo de reactivar
            $('#tableContactos').on('click', '.btn-open', async function() {
                let id_open = $(this).data('id');
                const formData = {
                    activo: 1,
                };
                try {
                    const response = await fetch(base_url+`/active_Desactive_Phone/${id_open}`, { 
                        method: 'post',
                        body: JSON.stringify(formData) 
                    });
                    if (response.ok) {
                        dataTableContacts();
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            });

            // manejo de editar 
            $('#tableContactos').on('click', '.btn-edit', async function() {
                const id = $(this).data('id');

                try {
                    const response = await fetch(base_url+`/getContact/${id}`);
                    const record = await response.json();

                    $('#telefono').val(record.telefono);
                    $('#parentesco').val(record.parentesco);

                    $('#dataFormContactos').data('id', id);
                    $('#dataFormContactos button[type="submit"]').html('<i class="bi bi-arrow-clockwise text-white"></i>');
                } catch (error) {
                    console.error('Error al cargar el registro:', error);
                }
            });

            // Manejo del formulario de agregar/editar datos
            $('#dataFormContactos').on('submit', async function(e) {
                e.preventDefault();
                
                const id = $(this).data('id');
                // const formData = new FormData($('#dataForm')[0]);
                const formData = {
                    id_estudiante: id_estudiante,
                    telefono: $('#telefono').val(),
                    parentesco: $('#parentesco').val(),
                };
                try {
                    const url = id ? `/updateContacts/${id}` : '/setContacts';
                    const method = 'POST';
    
                    const response = await fetch(base_url+url, {
                        method,
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(formData)
                    });
                    if (response.ok) {
                    
                        $('#dataForm')[0].reset();
                        $('#dataForm').removeData('id');
                        $('button[type="submit"]').text('Agregar Datos');
                        subtable();
                    } else {
                        const errorData = await response.json();
                        alert(errorData.message);
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            });
        });


        const exampleModal = document.getElementById('staticBackdrop')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const recipient = button.getAttribute('data-bs-whatever')
                const modalTitle = exampleModal.querySelector('.modal-title')
                const modalBodyInput = exampleModal.querySelector('.modal-body input')

                modalTitle.textContent = `Contactos ${recipient}`
                modalBodyInput.value = recipient


            })
        }

    });


</script>

<?= $this->endSection() ?>
