<?php
session_start();
require('./php-connect-db/db-connection.php');
if (isset($_SESSION['USER_ID'])) {
    $id = $_SESSION['USER_ID'];
    $nombres = '';
    $apellidos = '';
    $correo = '';
    $fotografia = '';
    $cargo = '';
    $sql = "SELECT A.ID_PERSONA ,A.NOMBRE_PERSONA ,A.APELLIDO_PERSONA ,B.CORREO_EMPLEADO ,B.FOTOGRAFIA_EMPLEADO ,C.DESCRIPCION_CARGO_EMPLEADO FROM tbl_personas A LEFT JOIN tbl_empleados B ON (A.ID_PERSONA = B.ID_EMPLEADO) LEFT JOIN tbl_cargo_empleado C ON (B.ID_CARGO_EMPLEADO = C.ID_CARGO_EMPLEADO) WHERE ID_PERSONA = $id";
    $resultados = mysqli_query($conexion, $sql);
    while (($row = mysqli_fetch_array($resultados, MYSQLI_ASSOC))) {
        $nombres = $row['NOMBRE_PERSONA'];
        $apellidos = $row['APELLIDO_PERSONA'];
        $correo = $row['CORREO_EMPLEADO'];
        $fotografia = $row['FOTOGRAFIA_EMPLEADO'];
        $cargo = $row['DESCRIPCION_CARGO_EMPLEADO'];
    }
} else {
    $nombres = "No existe la var sesion";
}
?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">


    <link rel="stylesheet" href="Ing-de-soft/css/bootstrap.min.css">
  <link rel="stylesheet" href="Ing-de-soft/toast/build/toastr.min.css">
    <link rel="stylesheet" href="Ing-de-soft/css/mdb.min.css">
    <link rel="stylesheet" href="assets/css/estilos2.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Ing-de-soft/mdb/MDB-Free_4.15.0/css/addons/datatables.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="Ing-de-soft/css/ventas.css">



  </head>

  <body>
    <?php
    if (isset($_SESSION['STATUS'])) :
    ?>
      <?php include('partials/header/header.php'); ?>


        <div class="container col-xl-9 col-lg-10 col-md-10 col-10 " id="caja">
          <div class="">
            <ul class="nav nav-tabs" style="">
              <li class="nav-item">
                <a class="nav-link text-dark text-dark font-weight-normal text-center " data-toggle="tab" href="#ventas" >Ventas</a>
              </li>
            </ul>
              <div class="tab-pane fade active show text-dark mr-0" id="ventas" style="">
                <form id="formulario" method="POST" class="mt-2">
                  <div class="container-fluid" style="" id="subcaja1">
                    <div class="row">
                      <div class="col-xl-8" style="">
                        <div class="container-fluid" style="margin-left:0;">
                          <div class="row mt-0">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0;" id="principal">
                              <br>
                              <div id="fecha">

                              </div>
                              <script>
                                var f = new Date();
                                var fecha = (f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate());
                                document.getElementById('fecha').innerHTML =
                                  `
                            <label class="font-weight-normal" >Fecha</label>
                              <input id="fecha-factura" class="form-control " type="text" placeholder="${fecha}" readonly value="${fecha}" name="fecha1">

                             `;
                              </script>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0;">
                              <br>
                              <label class="text-dark font-weight-normal" for="">Vendedor</label>
                              <input class="form-control" type="text" placeholder="<?php echo $nombres  ?>" readonly>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3" id="last-id" style="padding:0;">

                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0;">
                              <br>
                              <label class="font-weight-normal" for="">Sucursal</label>
                              <input class="form-control" type="text" placeholder="Blvd. Morazan" readonly>
                            </div>

                          </div>
                        </div>
                        <!--aqui termina la primera fila-->

                        <div class="container-fluid mt-3">
                          <div class="row">
                            <div class="col-xl-3" style="padding-top:15px;">
                              <button id="btn-modelo" type="button" class="btn btn-success mt-1 btn-pink animated zoomInLeft" data-toggle="modal" data-target="#exampleModal1" onclick="mostrarProductos();" >
                                Seleccione modelo
                              </button>
                            </div>
                            <div class="col-xl-3" style="padding-top:15px;">
                              <button id="btn-cliente" type="button" class="btn mt-1 btn-pink animated zoomIn" data-toggle="modal" data-target="#modal-clientes" onclick="  mostrarCliente();">
                                Seleccione cliente
                              </button>
                            </div>
                            <div class="col-xl-3" style="padding-top:15px;">
                              <button id="btn-reg-cliente" type="button" class="btn mt-1 btn-pink animated zoomInRight " data-toggle="modal" data-target="#modalRegisterForm">
                                Registre cliente nuevo
                              </button>
                            </div>
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-xl-12" style="padding:0;">
                                  <table class="table table-hover tabla-factura" name="tbl" style="margin-top: 20px;" id="tbl-prueba">
                                    <thead>
                                      <tr class="table-primary ">
                                        <th class="font-weight-bold" scope="col">Ingrese cantidad</th>
                                        <th class="font-weight-bold" scope="col">ID Producto</th>
                                        <th class="font-weight-bold" scope="col">Cantidad</th>
                                        <th class="font-weight-bold" scope="col">Modelo</th>
                                        <th class="font-weight-bold" scope="col">Valor Unitario</th>
                                        <th class="font-weight-bold" scope="col">Valor Total</th>
                                        <th class="font-weight-bold" scope="col">Eliminar</button>
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody id="cuerpo-tabla" class="">

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>

                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-xl-3">
                                  <p class="font-weight-normal">Metodo de pago</p>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="radiobtn" class="custom-control-input" value="1">
                                    <label class="custom-control-label text-dark font-weight-normal" for="customRadioInline1">Efectivo</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="radiobtn" class="custom-control-input" value="2">
                                    <label class="custom-control-label text-dark font-weight-normal " for="customRadioInline2">Tarjeta de credito</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline3" name="radiobtn" class="custom-control-input" value="3">
                                    <label class="custom-control-label text-dark font-weight-normal " for="customRadioInline3">Tarjeta de debito</label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-3 ">
                                  <br>
                                  <label class="text-dark font-weight-normal " for="jaja">Sub total</label>
                                  <div class="" id="div-precio">
                                      <input id= "precio_actual" class="form-control font-weight borrar " type="text" placeholder="" readonly value="Lps. 0">
                                  </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                  <br>
                                  <label class="text-dark font-weight-normal " for="">ISV 15% </label>
                                  <div id="impuesto" class="">
                                    <input id="impuesto-factura" class="form-control" type="text" placeholder="" readonly value="Lps. 0" name="impuesto1" >
                                  </div>

                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                  <br>
                                  <label class="text-dark font-weight-normal " for="">Total</label>
                                  <div id="total-factura" class="">
                                      <input id="precio-neto" class="form-control" type="text" placeholder="" readonly value= "Lps. 0" name="total1" >
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="container-fluid" style="">
                              <div class="row">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!--aqui cierra el primer row-->

                      <div class="col-xl-4 mt-5 d-none d-xl-block" style="margin-top: 10px;">
                        <div class="card text-dark bg-light mb-3" style="height: 300px;">
                          <div class="card-header font-weight-normal ">Detalles del cliente <i class="fas fa-user"></i></div>
                          <div class="card-body" id="info-cliente">
                          </div>
                        </div>
                        <div class="col-xl-6 mt-5" style="margin:auto; margin-top:10px;">
                          <button type="submit" id="to" class="btn btn-light btn-lg waves-effect animated bounceInDown" name="" form="formulario"  >Imprimir Factura</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-8" id="alerta">

                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="corte">
              <hr>

            </div>
          </div>


        </div>

        <!--
███    ███  ██████  ██████   █████  ██      ███████ ███████
████  ████ ██    ██ ██   ██ ██   ██ ██      ██      ██
██ ████ ██ ██    ██ ██   ██ ███████ ██      █████   ███████
██  ██  ██ ██    ██ ██   ██ ██   ██ ██      ██           ██
██      ██  ██████  ██████  ██   ██ ███████ ███████ ███████
-->

        <!-- modal de una tabla -->
        <div class="col-xl-12">
          <div class="modal fade bd-example-modal-xl" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl " role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar a factura</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table id="tabla-total " class="table table-hover tabla1 table-sm table-display1" style="margin-top: 20px;">
                    <thead>
                      <tr class="table-primary">
                        <th scope="col">Modelo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Existencia</th>
                        <th scope="col">Valor Unitario</th>
                        <th scope="col">Agregar a factura</th>
                      </tr>
                    </thead>
                    <tbody id="tabla-productos" class="tabla2">


                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
              </div>
            </div>
          </div>

        </div>

        <!--Modal de la otra tabla-->
        <div class="col-xl-12">
          <div class="modal fade bd-example-modal-xl" id="modal-clientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl " role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table id="tabla " class="table table-hover table-display2 " style="margin-top: 20px;">
                    <thead>
                      <tr class="table-primary">
                        <th scope="col">Nombre</th>
                        <th scope="col"></th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Email</th>
                        <th scope="col">RTN</th>
                        <th scope="col">Agregar</th>
                      </tr>
                    </thead>
                    <tbody id="tabla-clientes" class="">


                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
              </div>
            </div>
          </div>

        </div>

        <!--Modal: modalPush-->
        <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-notify modal-info" role="document">
            <div class="modal-content text-center">
              <div class="modal-header d-flex justify-content-center">
                <p class="heading">Operacion realizada con exito</p>
              </div>
              <div class="modal-body">
                <i class="fas fa-bell fa-4x animated rotateIn mb-4"></i>
                <p>Elige una opcion para continuar</p>
              </div>
              <div class="modal-footer flex-center">
                <a type="button" class="btn btn-info"  href="./factura/index.php" target="_blank" >Ver factura</a>
                <a type="button" class="btn btn-outline-info waves-effect" onclick ="location.reload()">Nueva factura</a>
              </div>
            </div>
            <!--/.Content-->
          </div>
        </div>
        <!--Modal: modalPush-->

        <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 ">Registro de clientes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="container">

                <div class="modal-body ">
                  <form id="form-registro">
                    <div class="row">

                      <div class="md-form mb-5 col-xl-4 ">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" id="orangeForm-name" class="form-control validate" name="reg-nombre">
                        <label data-error="wrong" data-success="right" for="orangeForm-name" class="ml-5">Nombre</label>
                      </div>
                      <div class="md-form mb-5 col-xl-4 ">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" id="orangeForm-last-name" class="form-control validate" name="reg-apellido">
                        <label data-error="wrong" data-success="right" for="orangeForm-name" class="ml-5">Apellido</label>
                      </div>
                      <div class="md-form mb-5 col-xl-4">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="email" id="orangeForm-email" class="form-control validate" name="reg-correo">
                        <label data-error="wrong" data-success="right" for="orangeForm-email" class="ml-5">Correo</label>
                      </div>
                      <div class="md-form mb-5 col-xl-4 mb-0 pb-0">
                        <i class="fas fa-phone prefix grey-text"></i>
                        <input type="text" id="orangeForm-phone" class="form-control validate" name="reg-telefono">
                        <label data-error="wrong" data-success="right" for="orangeForm-email" class="ml-5">Telefono</label>
                      </div>
                      <div class="md-form mb-5 col-xl-4 mb-0 pb-0">
                        <i class="fas fa-mobile prefix grey-text"></i>
                        <input type="text" id="orangeForm-cel" class="form-control validate" name="reg-celular">
                        <label data-error="wrong" data-success="right" for="orangeForm-email" class="ml-5">Celular</label>
                      </div>
                      <div class="md-form mb-5 col-xl-4 ">
                        <i class="fas fa-map-marker prefix grey-text"></i>
                        <input type="text" id="orangeForm-address" class="form-control validate" name="reg-direccion">
                        <label data-error="wrong" data-success="right" for="orangeForm-email" class="ml-5">Direccion</label>
                      </div>
                      <div class="md-form mb-5 col-xl-4 ">
                        <i class="fas fa-address-card prefix grey-text"></i>
                        <input type="text" id="orangeForm-rtn" class="form-control validate" name="reg-rtn">
                        <label data-error="wrong" data-success="right" for="orangeForm-email" class="ml-5">RTN</label>
                      </div>
                      <div class="col-xl-3 mt-1">
                        <p class="font-weight-normal text-muted">Sexo</p>
                        <div class="custom-control custom-radio custom-control-inline">

                          <input type="radio" id="customRadioInline4" name="reg-radiobtn" class="custom-control-input" value="1">
                          <label class="custom-control-label text-dark font-weight-normal mr-2" for="customRadioInline4">Hombre</label>
                          <i class="fas fa-male fa-2x prefix grey-text"></i>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline5" name="reg-radiobtn" class="custom-control-input" value="2">
                          <label class="custom-control-label text-dark font-weight-normal mr-2 " for="customRadioInline5">Mujer</label>
                          <i class="fas fa-female fa-2x prefix grey-text"></i>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline mt-2">
                          <input type="radio" id="customRadioInline6" name="reg-radiobtn" class="custom-control-input" value="3">
                          <label class="custom-control-label text-dark font-weight-normal mr-2 " for="customRadioInline6">Otro</label>
                          <i class="fas fa-transgender fa-2x prefix grey-text"></i>
                        </div>
                      </div>
                      <div class="md-form mb-5 col-xl-4 animated bounce " id="reg-alert">

                      </div>
                    </div>

                </div>
                </form>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-deep-orange" form="form-registro">Registrar</button>
                <button type="button" class="btn btn-deep-orange" data-dismiss="modal" aria-label="Close" onClick="location.reload();">Cerrar</button>
              </div>

            </div>
          </div>
        </div>
        <script type="text/javascript" src="Ing-de-soft/js/jquery-3.5.0.min.js"></script>
        <script type="text/javascript" src="Ing-de-soft/js/popper.min.js"></script>
        <script type="text/javascript" src="Ing-de-soft/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="Ing-de-soft/toast/build/toastr.min.js"></script>
        <script type="text/javascript" src="Ing-de-soft/js/animaciones.js"></script>
        <script type="text/javascript" src="Ing-de-soft/js/mdb.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="Ing-de-soft/js/productos.js"></script>

        <script type="text/javascript" src="Ing-de-soft/mdb/MDB-Free_4.15.0/js/addons/datatables.min.js"></script>
        <script type="text/javascript" src="Ing-de-soft/js/factura.js"></script>
        <script type="text/javascript" src="Ing-de-soft/js/id-factura.js"></script>
        <script type="text/javascript" src="Ing-de-soft/js/registro-clientes.js"></script>
        <script src="https://kit.fontawesome.com/a8b47806ff.js" crossorigin="anonymous"></script>


        <?php
    else :
        header('Location: page-not-found.php');
    ?>
          <?php
    endif;
    ?>
  </body>

  </html>
