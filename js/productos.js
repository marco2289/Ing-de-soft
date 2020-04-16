var global = [];
var clientes = [];
var global_productos = [];
var global_clientes = [];
var producto_factura = [];
var precio;
var precio2;
var facturas = [{}];

//arreglo que acumula los productos para mandarlos a la BD

$(document).ready(function() {
  //FETCH PARA LOS PRODUCTOS
  fetch('producto-factura.php')
    .then((res) => res.json())
    .then(response => {
      var arreglo = response;
      global = arreglo;
      let output = '';
      for (let i in response) {
        output += `<tr>
      			<td>${response[i].modelo}</td>
      			<td>${response[i].descripcion}</td>
      			<td>${response[i].UNIDADES}</td>
      			<td>${response[i].PRECIO_VENTA}</td>
      			<td><button class="btn btn-primary mt-0 mb-0" " onclick = "listarFactura(${i});subTotal(${i}); calcular();"  >Agregar</button></td>
      		</tr>`;

      }
      document.getElementById('tabla-productos').innerHTML = output;
    }).catch(error => console.log(error));



  fetch('cliente-factura.php')
    .then((res) => res.json())
    .then(respuesta => {
      var arreglo_clientes = respuesta;
      clientes = arreglo_clientes;
      let salida = '';
      for (let i in respuesta) {
        salida += `<tr>
        			<td>${respuesta[i].NOMBRE_PERSONA}<td>
        			<td>${respuesta[i].TELEFONO}</td>
        			<td>${respuesta[i].DIRECCION}</td>
        			<td>${respuesta[i].CORREO_ELECTRONICO}</td>
        			<td>${respuesta[i].DNI}</td>
        			<td><button class="btn btn-primary mt-0 mb-0" onclick = "listarCliente(${i});"  >Agregar</button></td>
        		</tr>`;
      }
      document.getElementById('tabla-clientes').innerHTML = salida;
      $('.table-display').DataTable({
        "pagingType": "full_numbers",
        "language": {
          "sLengthMenu": "Mostrar MENU registros",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningún dato disponible en esta tabla =(",
          "sInfo": "Mostrando registros del START al END de un total de TOTAL registros",
          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered": "(filtrado de un total de MAX registros)",
          "sInfoPostFix": "",
          "sSearch": "Buscar:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          },
        }

      });
    }).catch(error => console.log(error));


})



//TIPO_PRODCUTO va en la primera td
function listarFactura(indice) {
  var cosas = global[indice];
  console.log(cosas);
  global_productos = cosas
  document.getElementById('cuerpo-tabla').innerHTML +=
    `<tr class="align-top  " >
				 <td class="font-weight-normal" >${global_productos.TIPO_PRODUCTO}</td>
				 <td class="font-weight-normal" >${global_productos.descripcion}</td>
				 <td class="font-weight-normal" >${global_productos.modelo}</td>
				 <td class="font-weight-normal" id="precio" >${global_productos.PRECIO_VENTA}</td>
				 <td class="font-weight-normal" >${global_productos.CATEGORIA}</td>
				 <td  class="pt-0 pb-0"><button class="btn btn-primary borrar mt-1 mb-0" type="button" name="button" value="Eliminar" onclick="limpiarFactura(${indice});">Eliminar</button></td>
			 </tr>
		 `;


  producto_factura.push(global_productos);
  console.log(producto_factura);

}

// calculos para la suma total de la Factura

function calcular() {

  var filas = document.querySelectorAll(".tabla-factura tbody tr");
  var total = 0;
  var precio_final;
  filas.forEach(function(e) {
    var columnas = e.querySelectorAll("td");
    var cantidad = parseFloat(columnas[3].textContent);
    total += cantidad;
    precio = total;
    precio_final = precio * 0.18 + precio;
  });
  document.getElementById('div-precio').innerHTML = `
			 <input id= "precio_actual" class="form-control font-weight borrar " type="text" placeholder="Lps. ${precio} " readonly>
			 `
  document.getElementById('total-factura').innerHTML = `
		 			<input id="precio-neto" class="form-control" type="text" placeholder="Lps. ${precio_final}" readonly value="${precio_final}" name="total1" >
		 			 `
  document.getElementById('impuesto').innerHTML = `
				 			<input id="impuesto-factura" class="form-control" type="text" placeholder="Lps. ${precio*0.18}" readonly value="${precio*0.18}" name="impuesto1" >
				 			 `
}


function subTotal() {} // no la use jajaja xD

function limpiarFactura(indice) {
  var variable;
  var cosas = global[indice];
  var precio_final;
  global_productos = cosas;
  variable = global_productos.PRECIO_VENTA;
  precio -= variable;
  precio_final = precio * 0.18 + precio;
  for (let i = 0; i < global.length; i++) {
    document.getElementById('div-precio').innerHTML = `
		 <input id= "precio_actual" class="form-control font-weight borrar " type="text" placeholder="Lps. ${precio} " readonly>
		 `
    document.getElementById('total-factura').innerHTML = `

				<input id="precio-neto" class="form-control" type="text" placeholder="Lps. ${precio_final}" readonly value="${precio_final}" name="total1" >

				 `
    document.getElementById('impuesto').innerHTML = `
						<input id="impuesto-factura" class="form-control" type="text" placeholder="Lps. ${precio*0.18}" readonly value="${precio*0.18}" name="impuesto1">
						 `
  }
}


//borrar elementos de la tabla factura class="table-success"
$(document).on('click', '.borrar', function(event) {
  event.preventDefault();
  $(this).closest('tr').remove();
});
// PINTAR LOS CLIENTES EN LA card

function listarCliente(indice) {
  var cositas = clientes[indice];
  global_clientes = cositas;
  console.log(global_clientes);
  document.getElementById('info-cliente').innerHTML =
    `<h4 class="card-title">${global_clientes.NOMBRE_PERSONA} ${global_clientes.APELLIDO_PERSONA} </h4>
		<h6>Direccion: ${global_clientes.DIRECCION}</h6>
		<h6>Telefono: ${global_clientes.TELEFONO}</h6>
		<h6>Email: ${global_clientes.CORREO_ELECTRONICO}</h6>
		<h6>RTN: ${global_clientes.DNI}</h6>
		<button class="btn btn-primary borrar  " type="button" onclick="limpiarCliente();">Eliminar</button>
		`;
  //producto_factura.push(global_productos);
  //console.log(producto_factura);
}
//borrar elementos de la tarjeta de clientes
function limpiarCliente() {
  document.getElementById('info-cliente').innerHTML = '';
}



function guardarFactura() {
  let factura = {
    ID_DESCUENTOS: '',
    ID_MODOS_DE_PAGO: $('input[name=customRadioInline1]:checked', '#metodo').val(),
    FECHA_FACTURA: document.getElementById('fecha-factura').value,
    IMPUESTO: document.getElementById('impuesto-factura').value,
    TOTAL_NETP: document.getElementById('precio-neto').value,
  }
  facturas.push(factura);
  console.log(facturas);

}

  var sendData = function() {
    $.post('factura.php', {
      data: facturas,
      }, function(response) {
        console.log(response);
      });

    }
sendData();
