<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
<div id="load" class=" spinner text-secondary" role="status">
</div>
<div class=" mb-2">    
    <div class="row">
        <div class="btn col-12 col-sm-6 col-md-6 ">
            <div class="card" style="height: 8rem;">
                <div class="card-body" style="text-align: center;" id="altas">
                    <p class="lead">Mostrar Reporte Altas Empleados</p>
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><rect width="16" height="9" x="28" y="15" fill="#21a366"/><path fill="#185c37" d="M44,24H12v16c0,1.105,0.895,2,2,2h28c1.105,0,2-0.895,2-2V24z"/><rect width="16" height="9" x="28" y="24" fill="#107c42"/><rect width="16" height="9" x="12" y="15" fill="#3fa071"/><path fill="#33c481" d="M42,6H28v9h16V8C44,6.895,43.105,6,42,6z"/><path fill="#21a366" d="M14,6h14v9H12V8C12,6.895,12.895,6,14,6z"/><path d="M22.319,13H12v24h10.319C24.352,37,26,35.352,26,33.319V16.681C26,14.648,24.352,13,22.319,13z" opacity=".05"/><path d="M22.213,36H12V13.333h10.213c1.724,0,3.121,1.397,3.121,3.121v16.425	C25.333,34.603,23.936,36,22.213,36z" opacity=".07"/><path d="M22.106,35H12V13.667h10.106c1.414,0,2.56,1.146,2.56,2.56V32.44C24.667,33.854,23.52,35,22.106,35z" opacity=".09"/><linearGradient id="flEJnwg7q~uKUdkX0KCyBa" x1="4.725" x2="23.055" y1="14.725" y2="33.055" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#18884f"/><stop offset="1" stop-color="#0b6731"/></linearGradient><path fill="url(#flEJnwg7q~uKUdkX0KCyBa)" d="M22,34H6c-1.105,0-2-0.895-2-2V16c0-1.105,0.895-2,2-2h16c1.105,0,2,0.895,2,2v16	C24,33.105,23.105,34,22,34z"/><path fill="#fff" d="M9.807,19h2.386l1.936,3.754L16.175,19h2.229l-3.071,5l3.141,5h-2.351l-2.11-3.93L11.912,29H9.526	l3.193-5.018L9.807,19z"/></svg>

                </div>
            </div>
        </div>
        <div class="btn col-12 col-sm-6 col-md-6">
            <div class="card" style="height: 8rem;">
                <div class="card-body" style="text-align: center;" id="bajas">
                    <p class="lead">Mostrar Reporte Bajas Finiquito</p>
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><rect width="16" height="9" x="28" y="15" fill="#21a366"/><path fill="#185c37" d="M44,24H12v16c0,1.105,0.895,2,2,2h28c1.105,0,2-0.895,2-2V24z"/><rect width="16" height="9" x="28" y="24" fill="#107c42"/><rect width="16" height="9" x="12" y="15" fill="#3fa071"/><path fill="#33c481" d="M42,6H28v9h16V8C44,6.895,43.105,6,42,6z"/><path fill="#21a366" d="M14,6h14v9H12V8C12,6.895,12.895,6,14,6z"/><path d="M22.319,13H12v24h10.319C24.352,37,26,35.352,26,33.319V16.681C26,14.648,24.352,13,22.319,13z" opacity=".05"/><path d="M22.213,36H12V13.333h10.213c1.724,0,3.121,1.397,3.121,3.121v16.425	C25.333,34.603,23.936,36,22.213,36z" opacity=".07"/><path d="M22.106,35H12V13.667h10.106c1.414,0,2.56,1.146,2.56,2.56V32.44C24.667,33.854,23.52,35,22.106,35z" opacity=".09"/><linearGradient id="flEJnwg7q~uKUdkX0KCyBa" x1="4.725" x2="23.055" y1="14.725" y2="33.055" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#18884f"/><stop offset="1" stop-color="#0b6731"/></linearGradient><path fill="url(#flEJnwg7q~uKUdkX0KCyBa)" d="M22,34H6c-1.105,0-2-0.895-2-2V16c0-1.105,0.895-2,2-2h16c1.105,0,2,0.895,2,2v16	C24,33.105,23.105,34,22,34z"/><path fill="#fff" d="M9.807,19h2.386l1.936,3.754L16.175,19h2.229l-3.071,5l3.141,5h-2.351l-2.11-3.93L11.912,29H9.526	l3.193-5.018L9.807,19z"/></svg>
                </div>
            </div>
        </div>   
    </div>
</div>
<table  id="tableAltas" class="table stripe text-center table-hover table-head-fixed text-nowrap d-none">
  <thead>
    <tr>
      <th scope="col">No. Empleado</th>
      <th scope="col">A. Paterno</th>
      <th scope="col">A. Materno</th>
      <th scope="col">Primer Nombre</th>
      <th scope="col">Segundo Nombre</th>
      <th scope="col">Fecha alta</th>
      <th scope="col">NSS</th>
      <th scope="col">RFC</th>
      <th scope="col">CURP</th>
      <th scope="col">CP</th>
      <th scope="col">BANCO</th>
      <th scope="col">Cuenta</th>
      <th scope="col">Clabe</th>
      <th scope="col">Sueldo</th>
      <th scope="col">Pago Externo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Servicio</th>
      <th scope="col">Ubicacion</th>
      <th scope="col">Puesto</th>
      <th scope="col">Turno</th>
      <th scope="col">Jefe Inmediato</th>
      <th scope="col">Usuario Registro</th>
    </tr>
  </thead>
</table>

<table  id="tableBajas" class="table stripe text-center table-hover table-head-fixed text-nowrap d-none">
  <thead>
    <tr>
      <th scope="col">No. Empleado</th>
      <th scope="col">A. Paterno</th>
      <th scope="col">A. Materno</th>
      <th scope="col">Primer Nombre</th>
      <th scope="col">Segundo Nombre</th>
      <th scope="col">Fecha Alta</th>
      <th scope="col">Fecha Baja</th>
      <th scope="col">Fecha Baja Definitiva</th>
      <th scope="col">Servicio</th>
      <th scope="col">Ubicacion</th>
      <th scope="col">Puesto</th>
      <th scope="col">Turno</th>
      <th scope="col">Jefe Inmediato</th>
      <th scope="col">Sueldo</th>
      <th scope="col">Solicito Finiquito</th>
      <th scope="col">Motivo Baja</th>
      <th scope="col">Nota</th>
      <th scope="col">Usuario Registro Baja</th>
    </tr>
  </thead>
</table>

<script>
    let altas = document.querySelector("#altas")
    let bajas = document.querySelector("#bajas")
    let tableAltas = document.querySelector("#tableAltas")
    let tableBajas = document.querySelector("#tableBajas")

    altas.onclick = () => {
        
        tableAltas.classList.remove("d-none")
        tableBajas.classList.add("d-none")
        $.ajax({
            url: base_url + '/getAltasEmpleados',
            type: 'GET',
            dataType: 'json',
            cache: false,
            async: true,
            success: function (response) {
                console.log(response)
                let table = $('#tableAltas').DataTable({
                    data: response.data,
                    destroy: true,
                    deferRender: true,
                    scrollX: true,
                    paging: true,
                    scrollCollapse: true,
                    fixedColumns:   {
                        left: 2//Le indico que deje fijas solo las 2 primeras columnas
                    },
                    dom: 'Bfrtip',
                    buttons: [
                    {
                        extend: 'excel',  
                        text: `<i class='fa fa-file-excel-o nav-icon'></i>&nbsp;&nbsp;&nbsp; Excel`, 
                        className: 'btn  btn-flat btn-success' , 
                        id:"xlsxAltas",
                        title: 'Reporte Altas Empleados'
                    }],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                    },
                    pageLength: 5,
                    
                    columns: [
                                
                                { data: "numEmpleado"},
                                { data: "apellido_paterno"},
                                { data: "apellido_materno"},
                                { data: "primer_nombre"},
                                { data: "segundo_nombre"},
                                { data: "fecha_ingreso"},
                                { data: "nss"},
                                { data: "rfc"},
                                { data: "curp"},
                                { data: "idCodigoPostal"},
                                { data: "banco"},
                                { data: "cuentaBanco"},
                                { data: "CLABE"},
                                { data: "sueldo"},
                                { data: "pagoExterno"},
                                { data: "numero_telefono"},
                                { data: "cliente"},
                                { data: "nombre_ubicacion"},
                                { data: "puesto"},
                                { data: "turno"},
                                { data: "nombre_jefe"},
                                { data: "nombreAlta"},
                            ]
                });


                toastr.success(response.succes.mensaje);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError')?>');
            }
        });

    }
    
    bajas.onclick = () => {
        tableBajas.classList.remove("d-none")
        tableAltas.classList.add("d-none")
        $.ajax({
            url: base_url + '/getBajasEmpleados',
            type: 'GET',
            dataType: 'json',
            cache: false,
            async: true,
            success: function (response) {
                console.log(response)
                let table = $('#tableBajas').DataTable({
                    data: response.data,
                    destroy: true,
                    deferRender: true,
                    scrollX: true,
                    paging: true,
                    scrollCollapse: true,
                    fixedColumns:   {
                        left: 2//Le indico que deje fijas solo las 2 primeras columnas
                    },
                    dom: 'Bfrtip',
                    buttons: [
                    {
                        extend: 'excel',  
                        text: `<i class='fa fa-file-excel-o nav-icon'></i>&nbsp;&nbsp;&nbsp; Excel`, 
                        className: 'btn  btn-flat btn-success' , 
                        id:"xlsxAltas",
                        title: 'Reporte Bajas Empleados'
                    }],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                    },
                    pageLength: 5,
                    
                    columns: [
                                
                                { data: "numEmpleado"},
                                { data: "apellido_paterno"},
                                { data: "apellido_materno"},
                                { data: "primer_nombre"},
                                { data: "segundo_nombre"},
                                { data: "fecha_ingreso"},
                                { data: "fecha_baja"},
                                { data: "fecha_efectiva_baja"},
                                { data: "cliente"},
                                { data: "nombre_ubicacion"},
                                { data: "puesto"},
                                { data: "turno"},
                                { data: "nombre_jefe"},
                                { data: "sueldo"},
                                { data: "finiquito"},
                                { data: "tipoBaja"},
                                { data: "motivo_baja"},
                                { data: "nombreBaja"},
                            ]
                });


                toastr.success(response.succes.mensaje);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError')?>');
            }
        });
    }

</script>

<?= $this->endSection() ?>