var formulario2 = document.getElementById('form-registro');
var alerta2 = document.getElementById('reg-alert');

formulario2.addEventListener('submit', function(e) {
  e.preventDefault();
  console.log('me diste click perro');


  var dato = new FormData(formulario2)
  console.log(dato);

  fetch('registro-cliente.php', {
      method: 'post',
      body: dato
    })
    .then(res => res.json())
    .then(data => {
      console.log(data)
      if (data === 'error') {
        alerta2.innerHTML =
            `
          <div class="alert alert-danger text-center" role="reg-alert">
          <i class="fas fa-exclamation-triangle cc_pointer"></i>
            Formulario vacio
            </div>
            `
      }else if (data === 'error-2'){
        alerta2.innerHTML =
        `
      <div class="alert alert-warning text-center" role="reg-alert">
      <i class="fas fa-exclamation cc_pointer"></i>
        Formulario incompleto
        </div>
        `

      } else {

        alerta2.innerHTML =
            `
          <div class="alert alert-success text-center" role="reg-alert">
          <i class="fas fa-check cc_pointer"></i>
            Registro exitoso
            </div>
            `
      }

    })
})
