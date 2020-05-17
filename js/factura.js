var formulario = document.getElementById('formulario');
var alerta = document.getElementById('alerta');
var exito = document.getElementById('modalPush');
formulario.addEventListener('submit', function(e) {
  e.preventDefault();
  console.log('me diste click perro');


  var datos = new FormData(formulario)
  console.log(datos);
  console.log(datos.get('fecha1'));
  console.log(datos.get('impuesto1'));


  fetch('factura1.php', {
      method: 'post',
      body: datos
    })
    .then(res => res.json())
    .then(data => {
      console.log(data)
      if (data === 'error1') {
        alerta.innerHTML =
            `
          <div class="alert alert-danger text-center" role="alert">
            <i class="fas fa-exclamation-triangle cc_pointer"></i>
            Factura vacia
            </div>
            `
      } else if (data === 'error2') {
        alerta.innerHTML =
            `
            <div class="alert alert-warning text-center" role="alert">
              <i class="fas fa-exclamation-triangle cc_pointer"></i>
            No puede imprimir una factura en blanco
            </div>
            `
          } else if (data === 'error3') {
        alerta.innerHTML =
          `
  <div class="alert alert-warning text-center" role="alert">
  <i class="fas fa-exclamation cc_pointer"></i>
      Debe elegir un metodo de pago
 </div>
`
      } else {

        $("#modalPush").modal('show');
        alerta.innerHTML =
          `
          <div class="alert alert-success text-center" role="alert">
            <i class="fas fa-check cc_pointer"></i>
            ${data}
          </div>
          `
      }

    })
})
