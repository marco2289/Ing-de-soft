var nombreProveedor =  '';
var tipoProveedor = '';
var direccionProveedor = '';
var correo = '';
var telefono = '';
var identified ='';
function limpiaCasillas () {
    document.getElementById('txt-nombre-proveedor').value = '';
    document.getElementById('tipo-proveedor').value = '';
    document.getElementById('direccion-proveedor').value = '';
    document.getElementById('correo').value = '';
    document.getElementById('telefono').value= '';
}

function validarCampoVacio(id){
    const etiqueta = document.getElementById(id);
    if (etiqueta.value==''){
        etiqueta.classList.add('input-error');
        return false;
    }else{
        etiqueta.classList.remove('input-error');
        return true;
    }
}
function validarCorreo(id){
    const etiqueta = document.getElementById(id);
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(etiqueta.value)){
        etiqueta.classList.remove('input-error');
        return true;
    } else{
        etiqueta.classList.add('input-error');
        return false;
    }
}


// Ocultar y mostrar contenedores
function insercion () {
    limpiaCasillas();
    document.querySelector('#insercion').style.display = 'block';
    document.querySelector('#editar').style.display = 'none';
    document.querySelector('#mostrar').style.display = 'none';
}

function mostrar () {
    limpiaCasillas();
    document.querySelector('#insercion').style.display = 'none';
    document.querySelector('#editar').style.display = 'none';
    document.querySelector('#mostrar').style.display = 'block';
    muestraProveedores ();
}

function editar () {
    limpiaCasillas();
    document.querySelector('#insercion').style.display = 'none';
    document.querySelector('#editar').style.display = 'block';
    document.querySelector('#mostrar').style.display = 'none';
}

// PROCESO PARA OBTENER LOS TIPOS DE PROVEEDORES AL CARGAR ESTA SECCION DE PROVEEDORES
function getTipoProveedores () {
    $.ajax({
        url: 'ajax/procesar-lista-proveedores.php' ,
        method: 'GET' ,
        dataType: 'json',
        success:function (res) {
            console.log(res);
            document.querySelector('#tipo-proveedor').innerHTML = `<option value="">Seleccione</option>`;
            for(let i=0;i<res.length;i++) {
                document.querySelector('#tipo-proveedor').innerHTML +=
                `<option value="${ res[i].id }">${ res[i].proveedor }</option>`;
            }
        },
        error:function(err) {
            console.error(err);
        }
    });
}
getTipoProveedores ();

// PROCESO PARA GUARDAR UN PROVEEDOR
function GuardarInformacion () {
  let soloTexto1 = /[A-Za-z ñ]+/;
  let soloNumeros1 = /[0-9-]{9,12}$/;

    if (validarCampoVacio('txt-nombre-proveedor') == true) {
        nombreProveedor = document.getElementById('txt-nombre-proveedor').value;
    } else if(!soloTexto1.test(nombreProveedor)){
      document.getElementById('txt-nombre-proveedor').classList.add('input-error');

    }
    if(validarCampoVacio('tipo-proveedor') == true) {
        tipoProveedor = document.getElementById('tipo-proveedor').value;
    }
    if(validarCampoVacio('direccion-proveedor') == true) {
        direccionProveedor = document.getElementById('direccion-proveedor').value;
    }
    if(validarCampoVacio('correo') == true && validarCorreo('correo') == true) {
        correo = document.getElementById('correo').value;
    } else {
        if(validarCorreo('correo') == true) {
            correo = '-';
        }
    }
    if(validarCampoVacio('telefono') == true) {
        telefono = document.getElementById('telefono').value;
    }

    if (nombreProveedor == '' ||!soloTexto1.test(nombreProveedor) ||tipoProveedor == '' || direccionProveedor == '' || !soloTexto1.test(direccionProveedor)||correo == '' || telefono == '') {

        if(correo != '-') {
            document.getElementById('respuesta-notificacion-proveedores').innerHTML =
            `<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong class="text-white text-center" style="font-weight: 700;">
                    <b>
                        Ha Ocurrido un error, por favor no ingrese numeros en nombre proveedor ni direccion
                    </b>
                </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;
        } else {
            if(correo == '-') {
                document.getElementById('correo').innerHTML =
            `<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong class="text-white text-center" style="font-weight: 700;">
                    <b>
                        Correo no valido , Por favor volver a introducirlo.
                    </b>
                </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;
            }
        }
    } else {
      document.getElementById('respuesta-notificacion-proveedores').innerHTML =
      `<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong class="text-white text-center" style="font-weight: 700;">
              <b>
                  Proveedor ingresado correctamente
              </b>
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>`;
        // peticion aqui
        let data = `nombre=${nombreProveedor}&tipo=${tipoProveedor}&direccion=${direccionProveedor}&correo=${correo}&telefono=${telefono}`;

        console.log(data)

        $.ajax ({
            url: 'ajax/procesar-insercion-proveedor.php' ,
            method: 'POST',
            dataType: 'json' ,
            data: data,
            success:function(res) {
                console.log(res);
                document.getElementById('respuesta-notificacion-proveedores').innerHTML =
                `<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong class="text-white text-center" style="font-weight: 700;">
                        <b>
                            ${ res }
                        </b>
                    </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                limpiaCasillas();
            },
            error:function (err) {
                console.error(err);
            }
        });
    }
}

// funcion para obtener proveedores
function cambiaEstatus(identificador) {
    let id = identificador;
    let data = `id=${id}`;
    console.log(data);
    $.ajax({
        url: 'ajax/procesar-cambio-status-proveedor.php' ,
        method: 'POST' ,
        dataType: 'json' ,
        data: data,
        success:function (res) {
            console.log(res);
            document.getElementById('respuesta-notificacion-proveedores').innerHTML =
                `<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong class="text-white text-center" style="font-weight: 700;">
                        <b>
                            ${ res }
                        </b>
                    </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
            muestraProveedores ();
        },
        error:function (error){
            console.error(error);
        }
    });
}
function muestraProveedores () {
    let img = 'assets/img/contenido.png';
    document.getElementById('muestra-proveedores').innerHTML = ``;
    let val = '';
    $.ajax({
        url: 'ajax/procesar-muestra-proveedores.php' ,
        method: 'GET' ,
        dataType: 'json' ,
        success:function (res) {
            console.log(res);
            for (let i=0;i<res.length;i++) {
                if(res[i].status == 'inactivo') {
                    val = 'btn btn-outline-danger';
                }
                else if (res[i].status == 'activo'){
                    val = 'btn btn-outline-success';
                }
                document.getElementById('muestra-proveedores').innerHTML += `
                    <tr>
                        <td>${ res[i].id }</td>
                        <td>${ res[i].tipo }</td>
                        <td>${ res[i].nombre }</td>
                        <td>${ res[i].direccion }</td>
                        <td>${ res[i].correo }</td>
                        <td>${ res[i].telefono }</td>
                        <td><input type="button" class="${val}" value="${ res[i].status }" onclick="cambiaEstatus(${res[i].id})"></td>
                        <td>
                            <a onclick="buscarProveedor(${res[i].id})" style="cursor: pointer">
                                <img src="${img}" alt="editar" style="width:25px">
                            </a>
                        </td>
                    </tr>
                `;
            }
        },
        error:function (error){
            let identificador = document.getElementById('identificador');
            console.log(identificador);
            data = `id=${identificador}`;

        }
    });
}

function buscarProveedor(identificador) {
    data = `id=${identificador}`;
    console.log(data);
    $.ajax({
        url: 'ajax/procesar-edicion-proveedor.php' ,
        method: 'POST' ,
        dataType: 'json' ,
        data: data ,
        success:function (res) {
            if( res.tipoProv == 1) {
                prov = 'Celulares';
            }
            if( res.tipoProv == 2) {
                prov = 'Repuestos'
            }
            if ( res.tipoProv == 3) {
                prov = 'Accesorios y Celulares'
            }
            getTipoProveedores ();
            console.log(res);
            identified = res.id;
            document.getElementById('p1').value = res.nombreProv;
            document.getElementById('tipo-proveedor2').innerHTML += `
                <option value="${ res.tipoProv }">${ prov }</option>
            `;
            document.getElementById('p3').value = res.direccion;
            document.getElementById('p4').value = res.correo;
            document.getElementById('p5').value = res.telefono;
            document.getElementById('insercion2').style.display = 'block';
            document.getElementById('insercion').style.display = 'none';
            document.getElementById('mostrar').style.display = 'none';


        },
        error:function (error) {
            console.error(error);
        }
    });
}
