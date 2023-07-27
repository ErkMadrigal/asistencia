<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>
	<div id="load" class=" spinner text-secondary" role="status">
    </div>
<div class=" mb-2"> 

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3 ">
            
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <button class="btn btn-block btn-flat btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Carga Masiva</button>
        </div>
        <div class="col-12 col-sm-6 col-md-3 ">
            <a href="<?php echo base_url('/exportCuip'); ?>" class="btn btn-block btn-flat btn-secondary"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Crear Plantilla 45 Campos</a>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <a class="btn btn-block btn-flat btn-primary" href=" <?= base_url() ?>/AddCUIP " class='nav-link'><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Nueva CUIP</a>
        </div>
    </div>    
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cargado masivo de CUIP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class="form-horizontal" id="frmCuip">
                <?= csrf_field() ?>
            </form>
                <button class="btn btn-success" id="select-excel"><i class='fa fa-file-excel-o nav-icon'></i>&nbsp;&nbsp;&nbsp; Excel</button>
                <input class="d-none" type="file" id="archivo_excel" accept=".xlsx, .xls">
                
                <div class="text-center d-none" id="contenedorExcel">
                    <h1>Archivo seleccionado:</h1>
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="180px" height="180px"><rect width="16" height="9" x="28" y="15" fill="#21a366"/><path fill="#185c37" d="M44,24H12v16c0,1.105,0.895,2,2,2h28c1.105,0,2-0.895,2-2V24z"/><rect width="16" height="9" x="28" y="24" fill="#107c42"/><rect width="16" height="9" x="12" y="15" fill="#3fa071"/><path fill="#33c481" d="M42,6H28v9h16V8C44,6.895,43.105,6,42,6z"/><path fill="#21a366" d="M14,6h14v9H12V8C12,6.895,12.895,6,14,6z"/><path d="M22.319,13H12v24h10.319C24.352,37,26,35.352,26,33.319V16.681C26,14.648,24.352,13,22.319,13z" opacity=".05"/><path d="M22.213,36H12V13.333h10.213c1.724,0,3.121,1.397,3.121,3.121v16.425	C25.333,34.603,23.936,36,22.213,36z" opacity=".07"/><path d="M22.106,35H12V13.667h10.106c1.414,0,2.56,1.146,2.56,2.56V32.44C24.667,33.854,23.52,35,22.106,35z" opacity=".09"/><linearGradient id="flEJnwg7q~uKUdkX0KCyBa" x1="4.725" x2="23.055" y1="14.725" y2="33.055" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#18884f"/><stop offset="1" stop-color="#0b6731"/></linearGradient><path fill="url(#flEJnwg7q~uKUdkX0KCyBa)" d="M22,34H6c-1.105,0-2-0.895-2-2V16c0-1.105,0.895-2,2-2h16c1.105,0,2,0.895,2,2v16	C24,33.105,23.105,34,22,34z"/><path fill="#fff" d="M9.807,19h2.386l1.936,3.754L16.175,19h2.229l-3.071,5l3.141,5h-2.351l-2.11-3.93L11.912,29H9.526	l3.193-5.018L9.807,19z"/></svg>
                    <h1 id="title_excel"></h1>
                </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button class="btn btn-secondary">Template</button> -->
        <button class="btn btn-primary" onclick="leerArchivoExcel()">Cargar</button>
      </div>
    </div>
  </div>
</div>
<div class="card card-primary">
    <div class="card-header" id="tabMain">
        <h3 class="card-title">CUIP</h3>
    
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
                <th>Num.Empleado</th>
                <th>No.CUIP</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>CUIP</th>
                <th>Expediente</th>
                <th>Media Filiación</th>
       		</tr>
            </thead>
        </table>
    </div>
    
</div>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script>
    let select_excel = document.querySelector("#select-excel")
    let archivo_excel = document.querySelector("#archivo_excel")
    let title_excel = document.querySelector("#title_excel")
    let contenedorExcel = document.querySelector("#contenedorExcel")

    select_excel.onclick = () => {
        archivo_excel.click()
    }

    archivo_excel.addEventListener('change', function(event) {
    var archivoSeleccionado = event.target.files[0];
    
    if (archivoSeleccionado) {
        title_excel.innerHTML = archivoSeleccionado.name
        contenedorExcel.classList.remove('d-none')
    }
  });

  function leerArchivoExcel() {
    var archivoInput = document.getElementById('archivo_excel');
    var archivo = archivoInput.files[0];

    var lector = new FileReader();

    lector.onload = function(e) {
      var contenidoArchivo = e.target.result;
      var libro = XLSX.read(contenidoArchivo, { type: 'binary' });
      var hojaNombre = libro.SheetNames[1];
      var hoja = libro.Sheets[hojaNombre];
      var datos = XLSX.utils.sheet_to_json(hoja, { header: 1 });

      for (var fila = 1; fila < datos.length; fila++) {
            let apellidoP =  datos[fila][1] 
            let apellidoM =  datos[fila][2]
            let nombreCompeto = datos[fila][3].split(' ')
            let primerN =  nombreCompeto[0]
            let segundoN =  ''
            for (var i = 1; i < nombreCompeto.length; i++) {
                segundoN += nombreCompeto[i]+' '
            }
            let fechaN =  datos[fila][4]
            let estadoNacim =  datos[fila][5]
            let MunNacim =  datos[fila][6]
            let genero =  datos[fila][7]
            let estadoCiv =  datos[fila][8]
            let nivelEdu =  datos[fila][9]
            let escuela =  datos[fila][10]
            let especialidad =  datos[fila][11]
            let rfc =  datos[fila][12]
            let claveEl =  datos[fila][13]
            let cartilla =  datos[fila][14]
            let curp =  datos[fila][15]
            let calleAds =  datos[fila][16]
            let numExAds =  datos[fila][17]
            let numIntAds =  datos[fila][18]
            let coloniaAds =  datos[fila][19]
            let cpAds =  datos[fila][20]
            let telefonoAds =  datos[fila][21]
            let estadoDom =  datos[fila][22]
            let minicipioDom =  datos[fila][23]
            let fecha_ingreso =  datos[fila][24]
            let estadoAds =  datos[fila][25]
            let municipioAds =  datos[fila][26]
            let cuip =  datos[fila][88]

            let paterno =  datos[fila][27]
            let materno =  datos[fila][28]
            let nombreCompetoRef = datos[fila][29].split(' ')
            let nombre1 =  nombreCompetoRef[0]
            let nombre2 =  ''
            for (var i = 1; i < nombreCompetoRef.length; i++) {
                nombre2 += nombreCompetoRef[i]+' '
            }
            let sexo =  datos[fila][30]
            let ocupacion =  datos[fila][31]
            let tipoRef =  datos[fila][32]
            let parentesco =  datos[fila][33]
            let calle =  datos[fila][34]
            let noExterior =  datos[fila][35]
            let noInterior =  datos[fila][36]
            let colonia =  datos[fila][37]
            let cp =  datos[fila][38]
            let telefono =  datos[fila][39]
            let entidad =  datos[fila][40]
            let codMunicipal =  datos[fila][41]
            let ciudad =  datos[fila][42]

            let idSangreTipo = datos[fila][43]
            let idRH =  datos[fila][44]
            let idUsaAnteojos =  datos[fila][45]
            let estatura =  datos[fila][46]
            let peso =  datos[fila][47]
            let idComplexion =  datos[fila][48]
            let idPiel =  datos[fila][49]
            let idCara =  datos[fila][50]
            let idCantidadCabello =  datos[fila][51]
            let idColorCabello =  datos[fila][52]
            let idFormaCabello =  datos[fila][53]
            let idCalvicie =  datos[fila][54]
            let idImplantacionCabello =  datos[fila][55]
            let idAlturaFrente =  datos[fila][56]
            let idInclinacionFrente =  datos[fila][57]
            let idAnchoFrente =  datos[fila][58]
            let idDireccionCejas =  datos[fila][59]
            let idImplantacionCejas =  datos[fila][60]
            let idFormaCejas =  datos[fila][61]
            let idTamanoCejas =  datos[fila][62]
            let idColorOjos =  datos[fila][63]
            let idFormaOjos =  datos[fila][64]
            let idTamanoOjos =  datos[fila][65]
            let idRaiz =  datos[fila][66]
            let idDorso =  datos[fila][67]
            let idAnchoNariz =  datos[fila][68]
            let idBaseNariz =  datos[fila][69]
            let idAlturaNariz =  datos[fila][70]
            let idTamanoBoca =  datos[fila][71]
            let idComisuras =  datos[fila][72]
            let idEspesorLabio =  datos[fila][73]
            let idAlturaNasolabial =  datos[fila][74]
            let idProminenciaLabio =  datos[fila][75]
            let idMentonTipo =  datos[fila][76]
            let idMentonForma =  datos[fila][77]
            let idMentonInclinacion =  datos[fila][78]
            let idFormaOreja =  datos[fila][79]
            let idOriginal =  datos[fila][80]
            let idSuperior =  datos[fila][81]
            let idPosterior =  datos[fila][82]
            let idAdherenciaHelix =  datos[fila][83]
            let idContornoLobulo =  datos[fila][84]
            let idAdherenciaLobulo =  datos[fila][85]
            let idParticularidad =  datos[fila][86]
            let idDimensionLobulo =  datos[fila][87]

            let formData = new FormData($(`#frmCuip`)[0]);
            formData.append("apellidoP", apellidoP)
            formData.append("apellidoM", apellidoM)
            formData.append("primerN", primerN)
            formData.append("segundoN", segundoN)
            formData.append("fechaN", fechaN)
            formData.append("estadoNacim", estadoNacim)
            formData.append("MunNacim", MunNacim)
            formData.append("genero", genero)
            formData.append("estadoCiv", estadoCiv)
            formData.append("nivelEdu", nivelEdu)
            formData.append("escuela", escuela)
            formData.append("especialidad", especialidad)
            formData.append("rfc", rfc)
            formData.append("claveEl", claveEl)
            formData.append("cartilla", cartilla)
            formData.append("curp", curp)
            formData.append("calleAds", calleAds)
            formData.append("numExAds", numExAds)
            formData.append("numIntAds", numIntAds)
            formData.append("coloniaAds", coloniaAds)
            formData.append("cpAds", cpAds)
            formData.append("telefonoAds", telefonoAds)
            formData.append("estadoDom", estadoDom)
            formData.append("minicipioDom", minicipioDom)
            formData.append("fecha_ingreso", fecha_ingreso)
            formData.append("estadoAds", estadoAds)
            formData.append("municipioAds", municipioAds)
            formData.append("cuip", cuip)

            formData.append("paterno", paterno)
            formData.append("materno", materno)
            formData.append("nombre", nombre1)
            formData.append("nombre2", nombre2)
            formData.append("sexo", sexo)
            formData.append("ocupacion", ocupacion)
            formData.append("tipoRef", tipoRef)
            formData.append("parentesco", parentesco)
            formData.append("calle", calle)
            formData.append("noExterior", noExterior)
            formData.append("noInterior", noInterior)
            formData.append("colonia", colonia)
            formData.append("cp", cp)
            formData.append("telefono", telefono)
            formData.append("entidad", entidad)
            formData.append("codMunicipal", codMunicipal)
            formData.append("ciudad", ciudad)

            formData.append("idSangreTipo", idSangreTipo)
            formData.append("idRH", idRH)
            formData.append("idUsaAnteojos", idUsaAnteojos.toUpperCase())
            formData.append("estatura", estatura)
            formData.append("peso", peso)
            formData.append("idComplexion", idComplexion)
            formData.append("idPiel", idPiel)
            formData.append("idCara", idCara)
            formData.append("idCantidadCabello", idCantidadCabello)
            formData.append("idColorCabello", idColorCabello)
            formData.append("idFormaCabello", idFormaCabello)
            formData.append("idCalvicie", idCalvicie)
            formData.append("idImplantacionCabello", idImplantacionCabello)
            formData.append("idAlturaFrente", idAlturaFrente)
            formData.append("idInclinacionFrente", idInclinacionFrente)
            formData.append("idAnchoFrente", idAnchoFrente)
            formData.append("idDireccionCejas", idDireccionCejas)
            formData.append("idImplantacionCejas", idImplantacionCejas)
            formData.append("idFormaCejas", idFormaCejas)
            formData.append("idTamanoCejas", idTamanoCejas)
            formData.append("idColorOjos", idColorOjos)
            formData.append("idFormaOjos", idFormaOjos)
            formData.append("idTamanoOjos", idTamanoOjos)
            formData.append("idRaiz", idRaiz)
            formData.append("idDorso", idDorso)
            formData.append("idAnchoNariz", idAnchoNariz)
            formData.append("idBaseNariz", idBaseNariz)
            formData.append("idAlturaNariz", idAlturaNariz)
            formData.append("idTamanoBoca", idTamanoBoca)
            formData.append("idComisuras", idComisuras)
            formData.append("idEspesorLabio", idEspesorLabio)
            formData.append("idAlturaNasolabial", idAlturaNasolabial)
            formData.append("idProminenciaLabio", idProminenciaLabio)
            formData.append("idMentonTipo", idMentonTipo)
            formData.append("idMentonForma", idMentonForma)
            formData.append("idMentonInclinacion", idMentonInclinacion)
            formData.append("idFormaOreja", idFormaOreja)
            formData.append("idOriginal", idOriginal)
            formData.append("idSuperior", idSuperior)
            formData.append("idPosterior", idPosterior)
            formData.append("idAdherenciaHelix", idAdherenciaHelix)
            formData.append("idContornoLobulo", idContornoLobulo)
            formData.append("idAdherenciaLobulo", idAdherenciaLobulo)
            formData.append("idParticularidad", idParticularidad)
            formData.append("idDimensionLobulo", idDimensionLobulo)

            if(datos[fila][0] != undefined){
                $.ajax({
                    url: base_url + '/cargaMasivaCuip',
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

                            asignData(idPadre)
    
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
            }

      }
    };

    lector.readAsBinaryString(archivo);
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
            data: <?= json_encode($CuipPersonal) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [  { data: "numEmpleado"
                        },
                        { data: "nCuip"
                        },
                        { data: "primer_nombre"
                        },
                        { data: "segundo_nombre"
                        },
                        { data: "apellido_paterno"
                        },
                        { data: "apellido_materno"
                        },
                        {  data: "CUIP",
                        render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/cuipInfo?id=" + full.id + "' class='nav-link'><i class='fa fa-address-card'></i>";
                    
                        }
                    }, {
                    data: "expediente electronico",
                    render: function (data, type, full, meta) {
                    
                        return "<a href='" + base_url + "/expediente?id=" + full.id + "' class='nav-link'><i class='fa fa-file-text'></i>";
                        }
                    },{  data: "MediaFiliación",
                        render: function (data, type, full, meta) {

                            if(full.media_filiacion != null ){

                                return "<i class=\'fa fa-check-circle\'></i>";

                            }else{

                                return "<a href='" + base_url + "/mediafiliacion?id=" + full.id + "' class='nav-link'><i class='fa fa-list'></i>";

                            }
                    
                        
                    
                        }
                    }

                
            ]
        });

</script>
<?= $this->endSection() ?>