<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS PERSONALES</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="primerNombre" class="control-label">Primer Nombre:  </label>
                        <div >
                                <?=$variable->primer_nombre?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="segundoNombre" class=" control-label">Segundo Nombre:  </label>
                        <div >
                                <?=$variable->segundo_nombre?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoPaterno" class=" control-label">Apellido Paterno: </label>
                        <div >
                                <?=$variable->apellido_paterno ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="apellidoMaterno" class=" control-label">Apellido Materno: </label>
                        <div >
                                <?=$variable->apellido_materno ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_nacimiento">Fecha de Nacimiento:  </label>
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
                        <div >
                                <?=$variable->fecha_nacimiento ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="sexo" class=" control-label"> sexo: </label>
                        <div >
                                <?=$variable->sexo ?>
                                    
                            </div>

                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="rfc" class=" control-label">R.F.C.: </label>
                        <div >
                                <?=$variable->rfc ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="claveE" class=" control-label">Clave Electoral: </label>
                        <div >
                                <?=$variable->clave_electoral ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-6 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cartilla" class=" control-label">Cartilla SMN: </label>
                        <div >
                                <?=$variable->cartilla_smn ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6 col-md-6'>
                    <div class="form-group">
                        <label for="licencia" class=" control-label">Licencia de Conducir: </label>
                        <div >
                                <?=$variable->licencia_conducir ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6 col-md-6'>
                    <div class="form-group">
                        <label for="vigenciaLic" class=" control-label">Vigencia de Licencia: </label>
                        <div >
                                <?=$variable->vigencia_licencia ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="CURP" class=" control-label">CURP: </label>
                        <div >
                                <?=$variable->curp ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="pasaporte" class=" control-label">Pasaporte: </label>
                        <div >
                                <?=$variable->pasaporte ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="modoNa" class=" control-label">Modo de Nacionalidad: </label>
                        <div >
                                <?=$variable->nacionalidad ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_naturalizacion">Fecha de Naturalización:  </label>
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
                        <div >
                                <?=$variable->fecha_naturalizacion ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="pais" class=" control-label">País de Nacimiento: </label>
                        <div >
                                <?=$variable->pais ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entidad" class=" control-label">Entidad de Nacimiento: </label>
                        <div >
                                <?=$variable->naciE ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nacionalidad" class=" control-label">Nacionalidad : </label>
                        <div >
                                <?=$variable->nacion ?>
                                    
                            </div>
                    </div>
                </div>
                
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="municipio" class=" control-label">Municipio de Nacimiento: </label>
                        <div >
                                <?=$variable->nacionalidad ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ciudad" class=" control-label">Cuidad de Nacimiento: </label>
                        <div >
                                <?=$variable->nacionalidad ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="estadoCivil" class=" control-label">Estado Civil : </label>
                        <div >
                                <?=$variable->civil ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="desarrolloA" class=" control-label">Desarrollo Académico : </label>
                        <div >
                                <?=$variable->institucion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="escuela" class=" control-label">Escuela : </label>
                        <div >
                                <?=$variable->escuela ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="especialidad" class=" control-label">Especialidad o Estudio : </label>
                        <div >
                                <?=$variable->especialidad ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="cedula" class=" control-label">No. Cédula Profesional: </label>
                        <div >
                                <?=$variable->cedula_profesional ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="anno_inicio">Año de Inicio:  </label>
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
                        <div >
                                <?=$variable->año_inicio ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="anno_termino">Año de Termino:  </label>
                        <div class="input-group date" id="al_dia" data-target-input="nearest">
                        <div >
                                <?=$variable->año_termino?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="sep" class=" control-label">Registro SEP : </label>
                        <div >
                                <?=$variable->registro_sep ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="certificado" class=" control-label">Num. de Folio Certificado : </label>
                        <div >
                                <?=$variable->folio_certificado ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="promedio" class=" control-label">Promedio : </label>
                        <div >
                                <?=$variable->institucion ?>
                                    
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS DEL DOMICILIO</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="">
            <div class="row">
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="calle" class=" control-label">Calle : </label>
                        <div >
                                <?=$variable->calle ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="exterior" class=" control-label">No. Exterior: </label>
                        <div >
                                <?=$variable->numero_exterior ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="interior" class=" control-label">No. Interior: </label>
                        <div >
                                <?=$variable->numero_interior ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="colonia" class=" control-label">Colonia: </label>
                        <div >
                                <?=$variable->colonia ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entrecalle" class=" control-label">Entre la calle
                            de: </label>
                            <div >
                                <?=$variable->entre_calle1 ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ylacalle" class=" control-label">Y la calle : </label>
                        <div >
                                <?=$variable->entre_calle2 ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="codigo" class=" control-label">Código Postal : </label>
                        <div >
                                <?=$variable->postal ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="numero" class=" control-label">Numero
                            Telefónico: </label>
                            <div >
                                <?=$variable->numero_telefono ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="entidadF" class=" control-label">Entidad Federativa: </label>
                            <div >
                                <?=$variable->estado ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="municipio" class=" control-label">Municipio: </label>
                            <div >
                                <?=$variable->municipio ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="ciudad" class=" control-label">Ciudad: </label>
                        <div >
                                <?=$variable->ciudad ?>
                                    
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">DATOS GENERALES: EXPERIENCIA DOCENTE</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="form-horizontal" id="">
            <div class="row">
            <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombreInstitucion" class=" control-label">Nombre del curso: </label>
                            <div >
                                <?=$variable->nombre_curso ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <div class="form-group">
                        <label for="nombreInstitucion" class=" control-label">Nombre de
                            la Institución: </label>
                            <div >
                                <?=$variable->nombre_institucion ?>
                                    
                            </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_inicial">Fecha de Inicio:  </label>
                        <div class="input-group date" id="fecha_inicial" data-target-input="nearest">
                        <div >
                                <?=$variable->fecha_inicio ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class='form-group'>
                        <label for="fecha_final">Fecha de Término:  </label>
                        <div class="input-group date" id="fecha_final" data-target-input="nearest">
                        <div >
                                <?=$variable->fecha_termino ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-12 col-sm-6'>
                    <div class="form-group">
                        <label for="certificado" class=" control-label">Certificado
                            por: </label>
                            <div >
                                <?=$variable->certificado_por ?>
                                    
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>