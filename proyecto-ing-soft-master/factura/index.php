<?php
session_start();
require_once('../php-connect-db/db-connection.php');

$con = "SELECT MAX(id_factura) AS id FROM tbl_facturas";
$sqli = mysqli_query($conexion, $con);
$result = mysqli_fetch_row($sqli);
$id= $result[0]  ;

$consulta = "SELECT * FROM tbl_facturas a
inner join tbl_detalles_factura b
on (a.id_factura = b.ID_FACTURAS)inner join tbl_personas c
on (a.ID_CLIENTE = c.ID_PERSONA) inner join tbl_clientes d
on (c.ID_PERSONA = d.id_cliente) inner join tbl_producto e
on (b.ID_PRODUCTO = e.id_producto) WHERE id_factura = $id ";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado, MYSQLI_ASSOC);



 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Factura</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo2.jpg">
      </div>
      <div id="company">
        <h2 class="name">Telefonia Mun2</h2>
        <div>Blvd. Morazan, Teg, F.M</div>
        <div>(504) 2221-05654</div>
        <div><a href="mailto:company@example.com">telmun2@gmail.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Factura a nombre de: </div>
          <h2 class="name"><?php echo ($filas['NOMBRE_PERSONA'] .' '.$filas['APELLIDO_PERSONA']) ?> </h2>
          <div class="address"><?php echo ($filas['DIRECCION']) ?></div>
          <div class="email"><a href="mailto:john@example.com"><?php echo ($filas['CORREO_ELECTRONICO']) ?></a></div>
        </div>
        <div id="invoice">
          <h1>Factura No.</h1>
          <h1>0001-001-01-00000<?php echo ($filas['id_factura']) ?></h1>
          <div class="date">Fecha de facturacion: <?php echo ($filas['FECHA_FACTURA']) ?></div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPCION</th>
            <th class="unit">PRECIO UNITARIO</th>
            <th class="qty">CANTIDAD</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>


          <?php
          $consulta2 = "SELECT  modelo, descripcion, PRECIO, CANTIDAD FROM tbl_detalles_factura a
          INNER JOIN tbl_producto b
          on (a.ID_PRODUCTO = b.id_producto) WHERE ID_FACTURAS= $id";
          $resultado2 = mysqli_query($conexion, $consulta2);
          while ($filas2 = mysqli_fetch_array($resultado2, MYSQLI_ASSOC)){ ?>
              <tr>
                <td class="no"></td>
                <td class="desc"><h3><?php echo $filas2['modelo'] ?></h3><?php echo $filas2['descripcion'] ?></td>
                <td class="unit">lps. <?php echo $filas2['PRECIO'] ?></td>
                <td class="qty"><?php echo $filas2['CANTIDAD'] ?></td>
                <td class="total">Lps. <?php echo $filas2['CANTIDAD']*$filas2['PRECIO'] ?></td>
              </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>Lps. <?php echo ($filas['CANTIDAD']*$filas['PRECIO']) ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">ISV 15%</td>
            <td>Lps.     <?php echo ($filas['IMPUESTO']) ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TOTAL</td>
            <td>Lps. <?php echo ($filas['TOTAL_NETP']) ?></td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Gracias por tu compra!</div>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Tiene 30 dias para reclamos y garantia</div>
      </div>
    </main>
    <footer>
      Proyecto creado para la clase de ingenieria de software 1er periodo 2020
    </footer>
  </body>
</html>
