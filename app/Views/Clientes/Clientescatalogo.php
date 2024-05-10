<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
	<div id="load" class=" spinner text-secondary" role="status">
    </div>
    <div class=" mb-2">    
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 ">
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <button class="btn btn-block btn-flat btn-primary" data-toggle="modal" data-target="#exampleModalCargaCorta"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;alta corta</button>
        </div>  
        <div class="col-12 col-sm-6 col-md-3">
            <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/AddCliente " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i> Agregar Cliente</a>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCargaCorta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carga Corta de CUIP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class="form-horizontal" id="frmCuipCargaCorta">
                <?= csrf_field() ?>
            </form>
            <button class="btn btn-success text-center" id="select-excel_cargaCorta"><i class='fa fa-file-excel-o nav-icon'></i>&nbsp;&nbsp;&nbsp; Excel</button>
            <input class="d-none" type="file" id="archivo_excel_cargaCortal" accept=".xlsx, .xls, .xlsm">
           
            <div class="text-center d-none" id="contenedorExcelCorto">
                <h1>Archivo seleccionado:</h1>
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="180px" height="180px"><rect width="16" height="9" x="28" y="15" fill="#21a366"/><path fill="#185c37" d="M44,24H12v16c0,1.105,0.895,2,2,2h28c1.105,0,2-0.895,2-2V24z"/><rect width="16" height="9" x="28" y="24" fill="#107c42"/><rect width="16" height="9" x="12" y="15" fill="#3fa071"/><path fill="#33c481" d="M42,6H28v9h16V8C44,6.895,43.105,6,42,6z"/><path fill="#21a366" d="M14,6h14v9H12V8C12,6.895,12.895,6,14,6z"/><path d="M22.319,13H12v24h10.319C24.352,37,26,35.352,26,33.319V16.681C26,14.648,24.352,13,22.319,13z" opacity=".05"/><path d="M22.213,36H12V13.333h10.213c1.724,0,3.121,1.397,3.121,3.121v16.425	C25.333,34.603,23.936,36,22.213,36z" opacity=".07"/><path d="M22.106,35H12V13.667h10.106c1.414,0,2.56,1.146,2.56,2.56V32.44C24.667,33.854,23.52,35,22.106,35z" opacity=".09"/><linearGradient id="flEJnwg7q~uKUdkX0KCyBa" x1="4.725" x2="23.055" y1="14.725" y2="33.055" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#18884f"/><stop offset="1" stop-color="#0b6731"/></linearGradient><path fill="url(#flEJnwg7q~uKUdkX0KCyBa)" d="M22,34H6c-1.105,0-2-0.895-2-2V16c0-1.105,0.895-2,2-2h16c1.105,0,2,0.895,2,2v16	C24,33.105,23.105,34,22,34z"/><path fill="#fff" d="M9.807,19h2.386l1.936,3.754L16.175,19h2.229l-3.071,5l3.141,5h-2.351l-2.11-3.93L11.912,29H9.526	l3.193-5.018L9.807,19z"/></svg>
                <h1 id="title_excelCorto"></h1>
            </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button class="btn btn-secondary">Template</button> -->
        <button class="btn btn-primary" id="btnXLSX" onclick="leerArchivoExcelCorto()">Cargar</button>
      </div>
    </div>
  </div>
</div>
<div class="card card-primary">
    <div class="card-header" id="tabMain">
        <h3 class="card-title">CLIENTE / SERVICIO</h3>
    
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
                <th>Razón Social</th>
                <th>Nombre Corto</th>
                <th>Activo</th>
                <th>Ubicaciones</th>
                <th>Turnos</th>
                <th>Puestos</th>
                <th>Editar</th>
                <th>Consultar</th>
       		</tr>
            </thead>
        </table>
    </div>
    
</div>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script>
    let select_excelCorto = document.querySelector("#select-excel_cargaCorta")
    let archivo_excel_corto = document.querySelector("#archivo_excel_cargaCortal")

    select_excelCorto.onclick = () => {
        archivo_excel_corto.click()
    }


    archivo_excel_corto.addEventListener('change', function(event) {
        var archivoSeleccionado = event.target.files[0];
        if (archivoSeleccionado) {
            title_excelCorto.innerHTML = archivoSeleccionado.name
            contenedorExcelCorto.classList.remove('d-none')
        }
    })

    function leerArchivoExcelCorto() {
        var archivoInput = document.getElementById('archivo_excel_cargaCortal');
        var archivo = archivoInput.files[0];

        var lector = new FileReader();

        lector.onload = function(e) {
            var contenidoArchivo = e.target.result;
            var libro = XLSX.read(contenidoArchivo, { type: 'binary' });
            var hojaNombre = libro.SheetNames[0];
            var hoja = libro.Sheets[hojaNombre];
            var datos = XLSX.utils.sheet_to_json(hoja, { header: 1 });

            let razonSocial =  convertirMayusculasSinAcentos(datos[4][1])
            let nombreCorto =  convertirMayusculasSinAcentos(datos[4][6])
            let coordinador =  convertirMayusculasSinAcentos(datos[6][1])
            let telefono =  convertirMayusculasSinAcentos(datos[6][6])


            for (let fila = 10; fila < datos.length; fila++) {
                let ubicacion = datos[fila][1];
                let calle = datos[fila][2];
                let colonia = datos[fila][3];
                let cp = datos[fila][4];
                let elementos = datos[fila][5];
                let puesto = datos[fila][6];
                let turno = datos[fila][7];


                if(ubicacion != undefined){
                    let formData = new FormData($(`#frmCuipCargaCorta`)[0]);
                    formData.append("razonSocial", razonSocial)
                    formData.append("nombreCorto", nombreCorto)
                    formData.append("coordinador", coordinador)
                    formData.append("telefono", telefono)

                    formData.append("ubicacion", ubicacion)
                    formData.append("calle", calle)
                    formData.append("colonia", colonia)
                    formData.append("cp", cp)

                    formData.append("turno", turno)

                    formData.append("elementos", elementos)
                    formData.append("puesto", puesto)


                    $.ajax({
                        url: base_url + '/cargaCortaClientes',
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
    
                                // asignData(idPadre)
        
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
                }else{
                    var count = 2;
                    setInterval(function(){
                      count--;
                      if (count == 0) {
                        window.location = base_url + '/clientes'; 
                      }
                    },1000);
                }

            }
        };

        lector.readAsBinaryString(archivo);
    }


    function convertirMayusculasSinAcentos(texto) {
        if(typeof texto === 'string'){
            return texto.toUpperCase()
                .normalize("NFD")
                .replace(/[\u0300-\u036f]/g, "")
                .replace(/[áÁ]/g, 'A')
                .replace(/[éÉ]/g, 'E')
                .replace(/[íÍ]/g, 'I')
                .replace(/[óÓ]/g, 'O')
                .replace(/[úÚ]/g, 'U')
                .replace(/[üÜ]/g, 'U')
                .replace(/[ñÑ]/g, 'N');
        }else{
            return texto
        }
    }

    function estatusRenderer(data, type, full, meta) {
        var src;
        
        if (full.activo == 1) {
            src = "<i class=\'fa fa-check-circle\'></i>";
        } else  {
            src = "<i class=\'fa fa-times-circle\'></i>";
        } 

    
        return src;
    }
	
    var table = $('#dataGrid').DataTable({
            data: <?= json_encode($cliente) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [{ data: "razon_social"
                      },
                      { data: "nombre_corto"
                      },
                     { data: "activo",
                        render: estatusRenderer
                      }, 
                      {  data: "ubicacion",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/ubicacioncatalogo?id=" + full.id + "' class='nav-link'><i class='fa fa-location-arrow' nav-icon></i>";
                    
                    }
                },
                {  data: "turno",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/turnocatalogo?id=" + full.id + "' class='nav-link'><i class='fa fa-clock-o nav-icon'></i>";
                    
                    }
                },
                {  data: "puesto",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/puestocatalogo?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                    
                    }
                },
                    
                      {  data: "edit",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/editCliente?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
                    
                    }
                }, {
                    data: "detail",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/detailCliente?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                    
                    }
                }
            ]
        });


     /*   var table = $('#dataGridUbica').DataTable({
            data: <?= json_encode($cliente) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [{ data: "nombre_ubicacion"
                      },
                      { data: "calle_num"
                      },
                      { data: "ciudad"
                      },
                      { data: "estado"
                      },
                      { data: "fecha_fin"
                      },
                      { data: "activo",
                        render: estatusRenderer
                      }, 
                      {  data: "edit",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/editCliente?id=" + full.id + "' class='nav-link'><i class='fa fa-pencil-square-o nav-icon'></i>";
                    
                    }
                }, {
                    data: "detail",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/detailCliente?id=" + full.id + "' class='nav-link'><i class='fa fa-list-alt nav-icon'></i>";
                    
                    }
                }
            ]
        });*/

</script>
<?= $this->endSection() ?>