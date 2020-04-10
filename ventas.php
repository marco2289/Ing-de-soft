<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start ();
ob_start();

if (isset($_SESSION['nombre'])){

}else{
  header('location:login.php');
}

$usuario = $_SESSION['nombre'];
$password = $_SESSION['clave'];




 ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/addons/datatables.min.css">
    <link href="css/addons/datatables-select.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/mdb.min.css">
  <link rel="stylesheet" href="css/ventas.css">

</head>

<body>
  <?php
  require("conexion.php");
  $consulta1 = "SELECT a.NOMBRE_PERSONA, a.APELLIDO_PERSONA, b.OBSERVACIONES_EMPLEADO, c.DESCRIPCION_CARGO_EMPLEADO,
  b.CLAVE_EMPLEADO, b.CORREO_EMPLEADO  from tbl_personas a
  inner join tbl_empleados b
  on (a.ID_PERSONA = b.ID_EMPLEADO)
  inner join tbl_cargo_empleado c
  on (b.ID_CARGO_EMPLEADO = c.ID_CARGO_EMPLEADO)WHERE b.CORREO_EMPLEADO = '$usuario' and b.CLAVE_EMPLEADO = '$password'";
  $res = mysqli_query($conectar, $consulta1);
  while ($consulta = mysqli_fetch_array($res))
{
  $nombre = $consulta['NOMBRE_PERSONA'];
  $apellido = $consulta['APELLIDO_PERSONA'];
  $correo = $consulta['CORREO_EMPLEADO'];
}
  ?>

  <!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color" id="barra">
  <a class="navbar-brand text-dark" href="#">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-dark" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="#">Pricing</a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link text-dark dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Inicia secion</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">RRHH</a>
          <a class="dropdown-item" href="#">Administrador</a>
          <a class="dropdown-item" href="#">Colaborador</a>
        </div>
      </li>

    </ul>
    <!-- Links -->

    <form class="form-inline">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      </div>
    </form>
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->

    <div class="container col-xl-10 col-lg-10 col-md-10 col-10 " id="caja">
      <div class="">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active text-dark" data-toggle="tab" href="#home">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark text-dark " data-toggle="tab" href="#ventas">Ventas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" data-toggle="tab" href="#compras">Compras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" data-toggle="tab" href="#reparacion">Reparacion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" data-toggle="tab" href="#inventario">Inventario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark disabled" data-toggle="tab" href="#configuracion">Configuracion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" data-toggle="tab" href="#historiales">Historiales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled text-muted"  href="#">Algo loco</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
              aria-expanded="false"> <?php echo $nombre ?> </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="cerrar-secion.php" >Cerrar sesion</a>
            </div>
          </li>
        </ul>
        <div id="myTabContent" class="tab-content" id="contenido" style="position:static;!important">
          <div class="tab-pane fade active show text-dark text-center" id="home">
            <br>
            <h1>Bienvenido al sistema <?php echo ($nombre); echo (" "); echo ($apellido); ?></h1>
            <h2 class="ml-auto"> Datos Personales</h2>
            <div class="card" style="width: 18rem;">
              <img src="img/user.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $nombre; ?></h5>
                <p class="card-text">Usted esta logueado con el correo: <?php echo $correo?></p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Cambiar foto de perfil
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="file" class="btn btn-primary form-control-file" id="exampleFormControlFile1">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          -------
          <div class="tab-pane fade" id="ventas" style="">
            <div class="container-fluid" style="" id="subcaja1">
              <div class="row">
                <div class="col-xl-8" style="">
                  <div class="container-fluid" style="margin-left:0;">
                    <div class="row">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0;" id="principal">
                        <br>
                        <div id="fecha">

                        </div>
                        <script>
                          var f = new Date();
                          var fecha = (f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                          document.getElementById('fecha').innerHTML = `
                            <label></label>Fecha
                            <input class="form-control" type="text" placeholder="${fecha}" readonly > `;
                        </script>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0;">
                        <br>
                        <label for=""></label>Cliente
                        <input class="form-control" type="text" placeholder="<?php echo $nombre  ?>" readonly>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0;">
                        <br>
                        <label for=""></label>ID Cliente
                        <input class="form-control" type="text" placeholder="" readonly>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0;">
                        <br>
                        <label for=""></label>Factura No.
                        <input class="form-control" type="text" placeholder="" readonly>
                      </div>

                    </div>
                  </div>


                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-xl-3 input-field" style="padding: 0;">
                        <label for=""></label>Producto
                        <select class="form-control">
                          <option>Seleccione Producto</option>
                          <option>Celular</option>
                          <option>Repuesto</option>
                          <option>Reparacion</option>
                        </select>
                      </div>
                      <div class="col-xl-3" style="padding: 0">
                        <label for=""></label>Marca
                        <select class="form-control">
                          <option>Seleccione Marca</option>
                          <option>Samsung</option>
                          <option>Apple</option>
                          <option>Huawei</option>
                        </select>
                      </div>
                      <div class="col-xl-3" style="padding-top:15px;">
                        <button id="btn-modelo" type="button" class="btn btn-success mt-1 btn-pink" data-toggle="modal" data-target="#exampleModal1">
                          Seleccione modelo
                        </button>

                        <!-- Modal -->

                      </div>

                          <div class="col-xl-12">
                            <div class="modal fade bd-example-modal-xl" id="exampleModal1" tabindex="-1" role="dialog"
                              aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-xl " role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agregar a factura</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <table id="tabla-total " class="table table-hover tabla1 table-sm " style="margin-top: 20px;">
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>

                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-xl-12" style="padding:0;" >
                            <table class="table table-hover tabla-factura" style="margin-top: 20px;">
                              <thead>
                                <tr class="table-primary">
                                  <th scope="col">Cantidad</th>
                                  <th scope="col">Descripcion</th>
                                  <th scope="col">Codigo</th>
                                  <th scope="col">Valor Unitario</th>
                                  <th scope="col">Valor Total</th>
                                  <th scope="col"> Eliminar</button>   </th>
                                </tr>
                              </thead>
                              <tbody id="cuerpo-tabla" class="tabla3">

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-xl-3">
                            <p>Metodo de pago</p>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                class="custom-control-input">
                              <label class="custom-control-label text-dark" for="customRadioInline1">Efectivo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2" name="customRadioInline1"
                                class="custom-control-input">
                              <label class="custom-control-label text-dark" for="customRadioInline2">Tarjeta de credito</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline3" name="customRadioInline1"
                                class="custom-control-input">
                              <label class="custom-control-label text-dark" for="customRadioInline3">Tarjeta de debito</label>
                            </div>
                          </div>
                          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-3 ">
                            <br>
                            <label class="text-dark" for="jaja">Sub total</label>
                            <input class="form-control" type="text" placeholder="Fecha" readonly>
                          </div>
                          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <br>
                            <label class="text-dark" for="">ISV %</label>
                            <input class="form-control" type="text" placeholder="" readonly>
                          </div>
                          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <br>
                            <label class="text-dark" for="">Total</label>
                            <input class="form-control" type="text" placeholder="" readonly>
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
                <div class="col-xl-4 mt-5 d-none d-xl-block" style="margin-top: 10px;">
                  <div class="card text-dark bg-light mb-3" style="height: 500px;">
                    <div class="card-header">Panel Auxiliar</div>
                    <div class="card-body">
                      <h5 class="card-title">Primary card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    </div>
                  </div>
                  <div class="col-xl-6 mt-5" style="margin:auto; margin-top:10px;">
                    <button id="btn-imprimir" type="button" class="btn btn-light-green btn-lg waves-effect"><i class="fas fa-money-check-alt"></i>Imprimir Factura</button>
                  </div>
                </div>
              </div>
            </div>
          </div>




          <div class="tab-pane fade" id="compras">
            <p>aqui van las compras</p>

          </div>
          <div class="tab-pane fade" id="reparacion">
            <p>aqui van las reparaciones</p>
          </div>
          <div class="tab-pane fade" id="inventario">
            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1
              labore
              velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
              Qui
              photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo
              nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
          </div>
          <div class="tab-pane fade" id="configuracion">
            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1
              labore
              velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
              Qui
              photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo
              nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
          </div>
          <div class="tab-pane fade" id="historiales">
            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1
              labore
              velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
              Qui
              photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo
              nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
          </div>
          <div class="tab-pane fade" id="dropdown1">
            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny
              pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard
              locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit
              cred pitchfork.</p>
          </div>
          <div class="tab-pane fade" id="dropdown2">
            <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse
              gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf
              cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
              farm-to-table VHS viral locavore cosby sweater.</p>
          </div>
        </div>
      </div>
      <div class="corte">
        <hr>

      </div>

  </div>



  <script src="js/jquery.js"></script>
  <script src="js/addons/datatables.min.js"></script>
  <script src="js/addons/datatables-select.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/mdb.min.js"></script>
  <script src="js/productos.js"></script>

</body>

</html>
