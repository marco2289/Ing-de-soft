$(document).ready(function() {
  fetch('id-factura.php')
    .then((res) => res.json())
    .then(response => {
      console.log(response);
      let output = '';
      for (let i in response) {
        var numero = parseFloat(response[i].id);
        var numero2 = numero + 1;
        console.log(numero2);
        output += `<br>
        <label class="font-weight-normal" for="">ID Factura.</label>
        <input class="form-control" type="text" placeholder="${numero2}" readonly>`;
      }
      document.getElementById('last-id').innerHTML = output;
    }).catch(error => console.log(error));



})
