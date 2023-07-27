<?php

use CodeIgniter\HTTP\RequestInterface;
use App\Models\ArmasModel;
use App\Libraries\Encrypt;

 $encrypt = new Encrypt();

?>
<div class="card card-primary" id="cardAltaEmpleado">
    <div class="card-header">
        <h3 class="card-title">DATOS RECURSOS HUMANOS</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="altaEmpleado">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="fecha_ingreso" class=" control-label">Fecha de Ingreso:</label>
                        <div>
                            <?= isset($datosEmpleado->fecha_ingreso) ? date( "d-m-Y" ,strtotime($datosEmpleado->fecha_ingreso)) : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="asignacionServ" class=" control-label">Asignación Servicio:</label>
                        <div>
                            <?= isset($datosEmpleado->idCliente) ? $datosEmpleado->idCliente : ''  ?>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ubicacionRH" class=" control-label">Ubicación:</label>
                        <div>
                            <?= isset($datosEmpleado->idUbicacion) ? $datosEmpleado->idUbicacion : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sueldoRH" class=" control-label">Sueldo:</label>
                        <div>
                            <?= isset($datosEmpleado->sueldo) ? $datosEmpleado->sueldo : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="turnoRH" class=" control-label">Turno:</label>
                        <div>
                            <?= isset($datosEmpleado->idTurno) ? $datosEmpleado->idTurno : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="puestoRH" class="control-label">Puesto: </label>
                        <div>
                            <?= isset($datosEmpleado->idPuesto) ? $datosEmpleado->idPuesto : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6'>
                    <div class="form-group">
                        <label for="pagoExterno" class="control-label">Pago Externo: </label>
                        <div>
                            <?= isset($datosEmpleado->pagoExterno) ? $datosEmpleado->pagoExterno : ''  ?>
                        </div>
                        
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="telEmpresaRH" class=" control-label">Teléfono Empresa:</label>
                        <div>
                            <?= isset($datosEmpleado->telefonoEmpresa) ? $datosEmpleado->telefonoEmpresa : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nominaPeriodo" class=" control-label">Periodicidad de la nómina:</label>
                        <div>
                            <?= isset($datosEmpleado->idNomimaPeriodo) ? $datosEmpleado->idNomimaPeriodo : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="radioEmpresa" class=" control-label">Radio Empresa:</label>
                        <div>
                            <?= isset($datosEmpleado->radioEmpresa) ? $datosEmpleado->radioEmpresa : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="jefeInmediatoRH" class=" control-label">Jefe Inmediato:</label>
                        <div>
                            <?= isset($datosEmpleado->idJefeInmediato) ? $datosEmpleado->idJefeInmediato : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nssRH" class=" control-label">NSS:</label>
                        <div>
                            <?= isset($datosEmpleado->nss) ? $datosEmpleado->nss : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="infonavit" class=" control-label">Crédito Infonavit:</label>
                        <div>
                            <?= isset($datosEmpleado->infonavit) ? $datosEmpleado->infonavit : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="pension" class=" control-label">Pensión Alimenticia:</label>
                        <div>
                            <?= isset($datosEmpleado->pension) ? $datosEmpleado->pension : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="fonacot" class=" control-label">Crédito Fonacot:</label>
                        <div>
                            <?= isset($datosEmpleado->fonacot) ? $datosEmpleado->fonacot : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="soldi" class=" control-label">SOLDI:</label>
                        <div>
                            <?= isset($datosEmpleado->soldi) ? $datosEmpleado->soldi : ''  ?>
                        </div>
                    </div>
                </div>               
                               
            </div>
        
    </div>
</div>

<div class="card card-primary" id="carCuentaBancaria">
    <div class="card-header">
        <h3 class="card-title">CUENTA BANCARIA</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
        <div class="row">
                
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="bancoRH" class=" control-label">Banco:</label>
                        <div>
                            <?= isset($datosEmpleado->idBanco) ? $datosEmpleado->idBanco : ''  ?>
                        </div>
                    </div>
                </div>
                
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cuentaRH" class=" control-label">Cuenta:</label>
                        <div>
                            <?= isset($datosEmpleado->cuentaBanco) ? $datosEmpleado->cuentaBanco : ''  ?>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="clabeRH" class=" control-label">CLABE:</label>
                        <div>
                            <?= isset($datosEmpleado->CLABE) ? $datosEmpleado->CLABE : ''  ?>
                        </div>
                    </div>
                </div>
                          
                
              
                            
            </div>
        
    </div>
</div>

<div class="card card-primary" id="cardUniformes">
    <div class="card-header">
        <h3 class="card-title">UNIFORMES</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
         
        <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle" id="uni">
                  <thead>
                  <tr>
                    
                    <th>Tipo Uniforme</th>
                    <th>Cantidad</th>
                    <th>Talla</th>
                    
                  </tr>
                  </thead>
                  
                </table>
              </div>
    </div>
</div>
<div class="card card-primary" id="cardEquipo">
    <div class="card-header">
        <h3 class="card-title">EQUIPO</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
        <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle" id="equipoAlta">
                  <thead>
                  <tr>
                    
                    <th>Tipo/Modelo</th>
                    <th>Cantidad</th>
                    
                  </tr>
                  </thead>
                  
                </table>
              </div>
    </div>
</div>
</form>
<script>
function estatusRenderer(data, type, full, meta) {
    var src;
    
    if (full.activo == 1) {
        src = "<i class=\'fa fa-check-circle\'></i>";
    } else  {
        src = "<i class=\'fa fa-times-circle\'></i>";
    } 

   
    return src;
}
    var table = $('#uni').DataTable({
            data: <?= json_encode($uniforme) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [{ data: "uniforme"
                      },
                      { data: "cantidad"
                      },
                      { data: "talla"
                      }
                ]
            });


        var table = $('#equipoAlta').DataTable({
            data: <?= json_encode($equipo) ?> ,
            deferRender: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            columns: [{ data: "equipo"
                      },
                      { data: "cantidad"
                      }
            ]
        });

</script>

