var global=[];
var global_productos = [];
var producto_factura=[];

fetch('server.php')
.then((res) => res.json())
.then(response => {
	console.log(response);
	var arreglo = response;
	console.log(arreglo);
global = arreglo;
console.log(global);

	let output = '';
	for(let i in response){
		output += `<tr>
			<td>${response[i].modelo}</td>
			<td>${response[i].descripcion}</td>
			<td>${response[i].DETALLE_COMPRAS_UNIDADES}</td>
			<td>${response[i].PRECIO_VENTA}</td>
			<td><button class="btn btn-primary btn-sm" onclick = "listarFactura (${i});">Agregar</button></td>
		</tr>`;

	}

	document.querySelector('.tabla2').innerHTML = output;
}).catch(error => console.log(error));

// DATA TABLES
$(document).ready(function(){
	$('.tabla1').DataTable();
})

 function listarFactura (indice){
	 var cosas = global[indice];
	 global_productos = cosas;
	 console.log(global_productos);
		 document.getElementById('cuerpo-tabla').innerHTML +=
		 `<tr class="align-top" >
				 <td>${global_productos.TIPO_PRODUCTO}</td>
				 <td>${global_productos.modelo}</td>
				 <td>${global_productos.descripcion}</td>
				 <td>${global_productos.PRECIO_VENTA}</td>
				 <td>${global_productos.CATEGORIA}</td>
				 <td><button class="btn btn-primary btn-sm borrar " type="button" name="button" value="Eliminar" >Eliminar</button></td>
			 </tr>
		 `;
producto_factura.push(global_productos);
console.log(producto_factura);
 }
//borrar elementos de la tabla factura
 $(document).on('click', '.borrar', function (event) {
     event.preventDefault();
     $(this).closest('tr').remove();
 });
