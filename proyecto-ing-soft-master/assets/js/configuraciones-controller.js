$(document).ready(function () {
    function limpiaComponentes(selector) {
        let configuraciones = document.getElementById("configuraciones");
        let contenedorSignUp = document.getElementById("contenedor-signup");
        let contenedorCambiarClave = document.getElementById('contenedor-cambiar-clave');
        let contenedorPrivilegios = document.getElementById('contenedor-privilegios');
        let contenedorCambiarStatus = document.getElementById('contenedor-cambiar-estatus-empleado');
        let contenedorCambiarEmail = document.getElementById('contenedor-cambiar-email');
        let contenedorSucursales = document.getElementById('contenedor-sucursales');


        if(selector === configuraciones){
            selector.style.display = 'block';
            contenedorSignUp.style.display = "none";
            contenedorCambiarClave.style.display = "none";
            contenedorPrivilegios.style.display ='none';
            contenedorCambiarStatus.style.display = 'none';
            contenedorCambiarEmail.style.display = 'none';
            contenedorSucursales.style.display = 'none';

        }

        if (selector === contenedorSignUp) {
            selector.style.display = 'block';
            configuraciones.style.display = "none";
            contenedorCambiarClave.style.display = "none";
            contenedorPrivilegios.style.display ='none';
            contenedorCambiarStatus.style.display = 'none';
            contenedorCambiarEmail.style.display = 'none';
            contenedorSucursales.style.display = 'none';

        }

        if (selector === contenedorCambiarClave) {
            selector.style.display = 'block';
            contenedorSignUp.style.display = "none";
            configuraciones.style.display = "none";
            contenedorPrivilegios.style.display ='none';
            contenedorCambiarStatus.style.display = 'none';
            contenedorCambiarEmail.style.display = 'none';
            contenedorSucursales.style.display = 'none';

        }

        if(selector === contenedorPrivilegios) {
            selector.style.display = 'block';
            contenedorSignUp.style.display = "none";
            configuraciones.style.display = "none";
            contenedorCambiarClave.style.display ='none';
            contenedorCambiarStatus.style.display = 'none';
            contenedorCambiarEmail.style.display = 'none';
            contenedorSucursales.style.display = 'none';

        }

        if(selector === contenedorCambiarStatus) {
            selector.style.display = 'block';
            contenedorSignUp.style.display = "none";
            configuraciones.style.display = "none";
            contenedorCambiarClave.style.display ='none';
            contenedorPrivilegios.style.display = 'none';
            contenedorCambiarEmail.style.display = 'none';
            contenedorSucursales.style.display = 'none';

        }
        if(selector === contenedorCambiarEmail) {
            selector.style.display = 'block';
            contenedorSignUp.style.display = "none";
            configuraciones.style.display = "none";
            contenedorCambiarClave.style.display ='none';
            contenedorPrivilegios.style.display = 'none';
            contenedorCambiarStatus.style.display = 'none';
            contenedorSucursales.style.display = 'none';
        }
        if(selector === contenedorSucursales) {
            selector.style.display = 'block';
            contenedorSignUp.style.display = "none";
            configuraciones.style.display = "none";
            contenedorCambiarClave.style.display ='none';
            contenedorPrivilegios.style.display = 'none';
            contenedorCambiarStatus.style.display = 'none';
            contenedorCambiarEmail.style.display = 'none';
        }
    }


    function limpiarCasillas (selector) {
        formCambioClave = document.getElementById('btn-guardar-cambios');
        if(selector == formCambioClave) {
            document.getElementById('email-actual').value = '';
            document.getElementById('email-nuevo').value = '';
            document.getElementById('repite-email-nuevo').value = '';
            document.getElementById('clave-actual').value = '';
            document.getElementById('clave-nueva').value = '';
            document.getElementById('clave-nueva-repetida').value = '';
            document.getElementById('txt-id-status').value = '';
            document.getElementById('txt-id-privs').value = '';
            document.getElementById('txt-nom-suc').value = '';
            document.getElementById('txt-cor-suc').value = '';
            document.getElementById('txt-dir-suc').value = '';
            document.getElementById('txt-tel-suc').value = '';
            document.getElementById('txt-fax-suc').value = '';
        }
        btnCambioClave = document.getElementById('btn-mostrar-cambio-clave');
        if(selector == btnCambioClave) {
            document.getElementById('email-actual').value = '';
            document.getElementById('email-nuevo').value = '';
            document.getElementById('repite-email-nuevo').value = '';
            document.getElementById('clave-actual').value = '';
            document.getElementById('clave-nueva').value = '';
            document.getElementById('clave-nueva-repetida').value = '';
            document.getElementById('txt-id-status').value = '';
            document.getElementById('txt-id-privs').value = '';
            document.getElementById('txt-nom-suc').value = '';
            document.getElementById('txt-cor-suc').value = '';
            document.getElementById('txt-dir-suc').value = '';
            document.getElementById('txt-tel-suc').value = '';
            document.getElementById('txt-fax-suc').value = '';

        }
    }

    // Desplegar el contenedor de registro de ususarios
    $("#btn-signup").click(function () {
        let selector = document.getElementById("contenedor-signup");
        limpiaComponentes(selector);

        // Peticion para Mostrar en select los generos
        $.ajax({
            url:'ajax/procesar-generos.php',
            method:'GET',
            dataType:'json',
            success:function(response) {
                //console.log(response);
                // Limpiar select con una sola opcion
                document.getElementById('option-genero').innerHTML = '<option value="#">Seleccione Genero</option>';
                for(let i=0;i<response.length;i++) {
                    $("#option-genero").append(`
                        <option value="${response[i].idGenero}">
                            ${response[i].genero}
                        </option>
                    `);
                }
            },
            error:function(error) {
                //console.log(error);
            }
        });

        // Peticion para Mostrar en select los estados civiles
        $.ajax({
            url:'ajax/procesar-estados-civiles.php',
            method:'GET',
            dataType:'json',
            success:function(response) {
                //console.log(response);
                // Limpiar select con una sola opcion
                document.getElementById('opcion-est-civil').innerHTML = '<option value="#">Seleccione Estado Civil</option>';
                for(let i=0;i<response.length;i++) {
                    $("#opcion-est-civil").append(`
                        <option value="${response[i].idEstado}">
                            ${response[i].estado}
                        </option>
                    `);
                }
            },
            error:function(error) {
                console.log(error);
            }
        });

        // Peticion para Mostrar en select las sucursales
        $.ajax({
            url:'ajax/procesar-sucursales.php',
            method:'GET',
            dataType:'json',
            success:function(response) {
                //console.log(response);
                // Limpiar select con una sola opcion
                document.getElementById('sucursal-option').innerHTML = '<option value="#">Seleccione La Sucursal De Trabajo</option>';
                for(let i=0;i<response.length;i++) {
                    $("#sucursal-option").append(`
                        <option value="${response[i].idSucursal}">
                            ${response[i].sucursal}
                        </option>
                    `);
                }
            },
            error:function(error) {
                console.log(error);
            }
        });

        // Muestra cargo de los empleados
        $.ajax({
            url:'ajax/procesar-cargos-empleado.php',
            method:'GET',
            dataType:'json',
            success:function(response) {
                //console.log(response);
                // Limpiar select con una sola opcion
                document.getElementById('cargo-option').innerHTML = '<option value="#">Seleccione Cargo del Empleado</option>';
                for(let i=0;i<response.length;i++) {
                    $("#cargo-option").append(`
                        <option value="${response[i].idCargo}">
                            ${response[i].descripcion}
                        </option>
                    `);
                }
            },
            error:function(error) {
                console.log(error);
            }
        });

        // Muestra Titulaciones de los empleados
        $.ajax({
            url:'ajax/procesar-titulaciones.php',
            method:'GET',
            dataType:'json',
            success:function(response) {
                //console.log(response);
                // Limpiar select con una sola opcion
                document.getElementById('titulacion-option').innerHTML = '<option value="#">Seleccione La titulacion De Trabajo</option>';
                for(let i=0;i<response.length;i++) {
                    $("#titulacion-option").append(`
                        <option value="${response[i].idTitulacion}">
                            ${response[i].titulacion}
                        </option>
                    `);
                }
            },
            error:function(error) {
                console.log(error);
            }
        });
    });

    // Enviar datos del form signup con sus correspondientes validaciones
    $("#btn-send-information").click(function () {
        //alert("Code Here");
        let errores = '';
        var numIdentidad , nombres , genero , apellidos , fecha , estadoCivil, direccion , cargo , sucursal , titulacion , email , verifEmail;

        numIdentidad = document.getElementById("txt-identificacion").value;
        nombres = document.getElementById("txt-nombre").value;
        apellidos = document.getElementById("txt-apellido").value;
        fecha = document.getElementById("txt-fecha-nac").value;
        genero = document.getElementById("option-genero").value;
        estadoCivil = document.getElementById("opcion-est-civil").value;
        direccion = document.getElementById("txt-direccion").value;
        cargo = document.getElementById("cargo-option").value;
        sucursal = document.getElementById("sucursal-option").value;
        titulacion = document.getElementById("titulacion-option").value;
        email = document.getElementById("txt-email").value;
        verifEmail = document.getElementById("txt-email-verif").value;
        let soloTexto = /[A-Za-z ñ]+/;
        ///^[A-Z]+$/i
        let soloNumeros = /[0-9-]{9,12}$/;

        if(numIdentidad === '') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Identidad Vacio</p>';
            $('#txt-identificacion').css('border-bottom-color','#F14B4B');
              document.getElementById("txt-identificacion").style.borderBottom = '2px solid red';
        } else if (!soloNumeros.test(numIdentidad)) {
          errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Identidad solo se acepta numeros</p>';
          document.getElementById("txt-identificacion").style.borderBottom = '2px solid red';
        }else if (!(numIdentidad==='')) {
            document.getElementById("txt-identificacion").style.borderBottom = 'none';
        }
        if(numIdentidad.length > 25) {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Identidad Debe ser menor o igual a 25 Caracteres</p>';
            document.getElementById("txt-identificacion").style.borderBottom = '2px solid red';
        } else if (numIdentidad.length > 25) {
            document.getElementById("txt-identificacion").style.borderBottom = 'none';
        }
        if(nombres === '') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Nombre Vacio</p>';
            document.getElementById("txt-nombre").style.borderBottom = '2px solid red';
        } else if (!soloTexto.test(nombres)) {
          errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Nombre solo se acepta texto (no numeros)</p>';
          document.getElementById("txt-nombre").style.borderBottom = '2px solid red';
        }else if (nombres != ''){
            document.getElementById("txt-nombre").style.borderBottom = 'none';
        }
        if(nombres.length > 60) {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Nombre Debe ser menor o igual a 60 Caracteres</p>';
              document.getElementById("txt-nombre").style.borderBottom = '2px solid red';
        } else if(nombres.length <= 60){
            document.getElementById("txt-nombre").style.borderBottom = 'none';
        }
        if(apellidos === '') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Apellidos Vacio</p>';
            document.getElementById("txt-apellido").style.borderBottom = '2px solid red';
        } else if (!soloTexto.test(apellidos)) {
          errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Apellidos solo se acepta texto (no numeros)</p>';
          document.getElementById("txt-apellido").style.borderBottom = '2px solid red';
        } else {
            document.getElementById("txt-apellido").style.borderBottom = 'none';
        }
        if(apellidos.length > 60) {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Apellidos Debe ser menor o igual a 60 Caracteres</p>';
            document.getElementById("txt-apellido").style.borderBottom = '2px solid red';
        } else {
            document.getElementById("txt-apellido").style.borderBottom = 'none';
        }
        if(fecha === '') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No Ha Seleccionado una Fecha</p>';
        }
        if(genero === '#'){
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No ha Seleccionado el genero del Empleado</p>';
        }
        if(estadoCivil === '#'){
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No ha Seleccionado el Estado Civil del Empleado</p>';
        }
        if(direccion === '') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> El Campo de Direccion del Empleado esta Vacio</p>';
            document.getElementById("txt-direccion").style.borderBottom = '2px solid red';
        }else if (!soloTexto.test(direccion)) {
          errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Direccion solo se acepta texto (no numeros)</p>';
          document.getElementById("txt-direccion").style.borderBottom = '2px solid red';
        } else {
            document.getElementById("txt-direccion").style.borderBottom = 'none';
        }
        if(direccion.length > 150){
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> El Campo Direccion debe ser menor o igual a 150 caracteres</p>'
            document.getElementById("txt-direccion").style.borderBottom = '2px solid red';
        } else {
            document.getElementById("txt-direccion").style.borderBottom = 'none';
        }
        if(cargo === '#') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No ha Seleccionado el Cargo del Empleado</p>';
        }
        if(sucursal === '#') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No ha Seleccionado la sucursal de trabajo para el futuro Empleado</p>';
        }
        if(titulacion === '#') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No ha Seleccionado la certificacion que tiene el futuro Empleado</p>';
        }

        //validando correos con expresion regular
        let expresion = /\w+@\w+\.+[a-z]/;
        if(!expresion.test(email)) {
            console.log("No es un correo");
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No Escribio un correo Correctamente o esta vacio</p>';
        } else {
            if(email === verifEmail) {
                console.log("Los correos son iguales y correctos");
            } else {
                errores += '<p><img src="assets/img/borrar.svg" width="15px"> Los Correo No coinciden</p>';
            }
        }

        if(errores) {
            var despliegueModal =
            '<div class="modal-wrap" id="modal-wrap">'+
                '<div class="container">'+
                    '<br><br>'+
                    '<div class="row ">'+
                        '<div class="col-lg-6 col-sm-12 mx-auto">'+
                            '<div class="mensaje_modal">'+
                                '<h3 class="text-center">Errores encontrados</h3>'+
                                    '<hr>'+
                                        errores+
                                    '<hr>'+
                                    '<span id="btn-cerrar">Cerrar</span></div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';

            $("body").append(despliegueModal);
            $("#btn-cerrar").click(function () {
                $('#modal-wrap').remove();
            });
        } else {
            //alert(errores);
            const parametros = `identidad=${numIdentidad}&nombres=${nombres}&apellidos=${apellidos}&fecha=${fecha}&genero=${genero}&estadoCivil=${estadoCivil}&direccion=${direccion}&cargo=${cargo}&sucursal=${sucursal}&titulacion=${titulacion}&email=${email}&telefono=${$("#txt-telefono").val()}&celular=${$("#txt-cel").val()}&obs=${$("#txt-obs").val()}`;
            console.log(parametros)

            $.ajax({
                url: 'ajax/procesar-insercion-empleado.php' ,
                method: 'POST' ,
                dataType: 'json' ,
                data: parametros ,
                success:function (respuesta) {
                    console.log(respuesta);
                    let valor = respuesta;
                    function mostrar(mensaje) {
                        // imprimiendo credencial
                        document.getElementById("mostrar-credencial").innerHTML =
                        `<div class="alert alert-success alert-dismissible fade show" role="alert text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6-col-sm-12 mx-auto">
                                        <strong class="text-center">
                                            <b>Credenciales: ${valor}</b>
                                        </strong>
                                    </div>
                                    <div class="col-lg-6-col-sm-12 mx-auto">
                                        <button type="button" class="btn btn-danger" id="cerrar-cuadro-insercion">
                                            Cerrar Formulario
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>`;

                        //Limpiando Casillas
                        document.getElementById("txt-identificacion").value="";
                        document.getElementById("txt-nombre").value="";
                        document.getElementById("txt-apellido").value="";
                        document.getElementById("txt-fecha-nac").value="";
                        document.getElementById("option-genero").value="#";
                        document.getElementById("opcion-est-civil").value="#";
                        document.getElementById("txt-direccion").value="";
                        document.getElementById("cargo-option").value="#";
                        document.getElementById("sucursal-option").value="#";
                        document.getElementById("titulacion-option").value="#";
                        document.getElementById("txt-email").value="";
                        document.getElementById("txt-email-verif").value="";
                        document.getElementById("txt-telefono").value="";
                        document.getElementById("txt-cel").value="";
                        document.getElementById("txt-obs").value = "";
                    }
                    mostrar(valor);

                    document.getElementById("cerrar-cuadro-insercion").addEventListener('click', function() {
                        window.location="landing.php";
                    });

                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
    });
    // parte de cambio de clave
    document.getElementById('btn-mostrar-cambio-clave').addEventListener('click' , () => {
        let selectorCasilla = document.getElementById('btn-mostrar-cambio-clave');
        limpiarCasillas(selectorCasilla);
        let selectorComponente = document.getElementById('contenedor-cambiar-clave');
        limpiaComponentes(selectorComponente);
    });
    document.getElementById('btn-guardar-cambios-pass').addEventListener('click', () => {
        let parametros = `clave=${$('#clave-actual').val()}&clave-nueva=${$('#clave-nueva').val()}&clave-nueva-repetida=${$('#clave-nueva-repetida').val()}`;
        //console.log(parametros);
        $.ajax({
            url: 'ajax/procesar-cambio-clave.php' ,
            method: 'POST' ,
            dataType: 'json' ,
            data: parametros ,
            success:function (respuesta) {
                console.log(respuesta);
                if(respuesta === 'noCoinciden') {
                    respuesta = document.getElementById('respuesta-cambio-clave');
                    respuesta.innerHTML =
                        `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="text-white text-center" style="font-weight: 700;">
                                Las nuevas claves que ingreso no coinciden, ingreselas nuevamente.
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`;
                }
                if(respuesta === 'vacios') {
                    respuesta = document.getElementById('respuesta-cambio-clave');
                    respuesta.innerHTML =
                        `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="text-white text-center" style="font-weight: 700;">
                                Uno de los campos o varios estan vacio, llenarlos todos por favor.
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`;
                }
                if(respuesta === 'incorrecto') {
                    respuesta = document.getElementById('respuesta-cambio-clave');
                    respuesta.innerHTML =
                        `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="text-white text-center" style="font-weight: 700;">
                                No ingreso correctamente la credencial actual, vuelva a ingresarla.
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`;
                }
                if(respuesta === 'exito') {
                    respuesta = document.getElementById('respuesta-cambio-clave');
                    respuesta.innerHTML =
                        `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="text-white text-center" style="font-weight: 700;">
                                Clave cambiada exitosamente, al loguearse nuevamente se requerira la nueva clave.
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`;
                }
                let selector = document.getElementById('btn-guardar-cambios');
                limpiarCasillas(selector);
            },
            error:function (error) {
                console.log(error);
            }

        });
    });
    document.getElementById('btn-salir-sin-hacer-nada-pass').addEventListener('click' , () => {
        let selector = document.getElementById('configuraciones');
        limpiaComponentes(selector);
    });
    //---------------------------------------------------------------------------------------



    // parte de cambio de email
    document.getElementById('btn-mostrar-cambio-email').addEventListener('click' , () => {
        let selectorCasilla = document.getElementById('btn-mostrar-cambio-email');
        limpiarCasillas(selectorCasilla);
        let selectorComponente = document.getElementById('contenedor-cambiar-email');
        limpiaComponentes(selectorComponente);
    });
    document.getElementById('btn-guardar-cambios-email').addEventListener('click', () => {
        let parametros =  `email-actual=${$('#email-actual').val()}&email-nuevo=${$('#email-nuevo').val()}&repite-email-nuevo=${$('#repite-email-nuevo').val()}`;
        console.log(parametros);
        $.ajax({
            url: 'ajax/procesar-cambio-email.php' ,
            method: 'POST' ,
            data: parametros ,
            success:function (response) {
                console.log(response);
                if(response === '"noCoinciden"') {
                    document.getElementById('cambio-email').innerHTML =
                        `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="text-white text-center" style="font-weight: 700;">
                                Los nuevos correos que ingreso no coinciden, ingreselas nuevamente.
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`;
                }
                if(response === '"vacios"') {
                    document.getElementById('cambio-email').innerHTML =
                        `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="text-white text-center" style="font-weight: 700;">
                                Uno de los campos o varios estan vacio, llenarlos todos por favor.
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`;
                }
                if(response === '"incorrecto"') {
                    document.getElementById('cambio-email').innerHTML =
                        `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="text-white text-center" style="font-weight: 700;">
                                No ingreso correctamente el correo actual, vuelva a ingresarlo.
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`;
                }
                if(response === '"exito"') {
                    document.getElementById('cambio-email').innerHTML =
                        `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="text-white text-center" style="font-weight: 700;">
                                Correo cambiada exitosamente, al loguearse nuevamente se requerira el nuevo correo.
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`;
                }
                let selector = document.getElementById('btn-guardar-cambios');
                limpiarCasillas(selector);
            },
            error:function (error) {
                console.log(error);
            }

        });
        let selector = document.getElementById('btn-guardar-cambios');
            limpiarCasillas(selector);
    });
    document.getElementById('btn-salir-sin-hacer-nada-email').addEventListener('click' , () => {
        let selector = document.getElementById('configuraciones');
        limpiaComponentes(selector);
    });
    //---------------------------------------------------------------------------------------


    // parte cambio estatus empleado
    document.getElementById('btn-cambio-estatus-empleado').addEventListener('click' , () => {
        document.getElementById('btn-guarda-cambios-estatus').style.display = 'none';
        let selector = document.getElementById('contenedor-cambiar-estatus-empleado');
        limpiaComponentes(selector);
        document.getElementById('btn-busqueda-emple').addEventListener('click' , () => {
            let parametro = `txt-id-status=${$('#txt-id-status').val()}`;
            let id = document.getElementById('txt-id-status').value;
            document.getElementById('id-emple-a-cambiar').value = id;
            //console.log(document.getElementById('id-emple-a-cambiar').value);
            //console.log(parametro);
            if(parametro === 'txt-id-status=') {
                document.getElementById('respuesta-estatus-empleado').innerHTML =
                    `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong class="text-white text-center" style="font-weight: 700;">
                            Debe teclear el identificador del empleado para buscar su estatus.
                        </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`;
                    document.getElementById('btn-guarda-cambios-estatus').style.display= 'none';
            } else {
                //console.log(parametro);

            $.ajax({
                url: 'ajax/procesar-cambio-estatus.php' ,
                dataType: 'json',
                method: 'POST' ,
                data: parametro ,
                success:function (response) {
                    //console.log(response);
                    for(let i=0;i<response.length;i++) {
                        document.getElementById('contenido-mostrar-estatus').innerHTML = `
                        <div class="form-group">
                            <label for="identificador" class="form-control bg-dark text-white">Id Sucursal De Trabajo</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" disabled value="${response[i].idSucursal}">
                        </div>
                        <div class="form-group">
                            <label for="identificador" class="form-control bg-dark text-white">Id Estatus Del Trabajo</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" disabled value="${response[i].idEstatus}">
                        </div>
                        `;
                    }
                    let selector = document.getElementById('btn-guardar-cambios');
                    limpiarCasillas(selector);
                },
                error:function(error) {
                    console.log(error);
                }
            });
            $.ajax({
                url:'ajax/procesar-sucursales.php',
                method:'GET',
                dataType:'json',
                success:function(response) {
                    // console.log(response);
                    // Limpiar select con una sola opcion
                    document.getElementById('sucursales-emple').innerHTML = '';
                    $("#sucursales-emple").append(`<option value="#">Seleccione La Sucursal De Trabajo</option>`);
                    for(let i=0;i<response.length;i++) {
                        $("#sucursales-emple").append(`
                            <option value="${response[i].idSucursal}">
                                ${response[i].sucursal}
                            </option>
                        `);
                    }
                },
                error:function(error) {
                    console.log(error);
                }
            });
            $.ajax({
                url:'ajax/procesar-estatus-empleado.php',
                method:'GET',
                dataType:'json',
                success:function(response) {
                    //console.log(response);
                    // Limpiar select con una sola opcion
                    document.getElementById('estatus-emple').innerHTML = '';
                    $("#estatus-emple").append(`<option value="#">Seleccione estatus del empleado</option>`);
                    for(let i=0;i<response.length;i++) {
                        $("#estatus-emple").append(`
                            <option value="${response[i].idEstatus}">
                                ${response[i].estatus}
                            </option>
                        `);
                    }
                    document.getElementById('btn-guarda-cambios-estatus').style.display= 'block';
                },
                error:function(error) {
                    console.log(error);
                }
            });
            document.getElementById('btn-guarda-cambios-estatus').addEventListener('click', ()=> {
                let parametros = `id-emple-a-cambiar=${$('#id-emple-a-cambiar').val()}&sucursal=${$('#sucursales-emple').val()}&estatus=${$('#estatus-emple').val()}`;
                console.log(parametros);
                $.ajax({
                    url: 'ajax/procesar-cambio-estatus-empleados.php' ,
                    dataType: 'json',
                    method: 'POST' ,
                    data: parametros ,
                    success:function (response) {
                        console.log(response);
                        if(response === 'sucursalV') {
                            document.getElementById('respuesta-estatus-empleado').innerHTML =
                            `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong class="text-white text-center" style="font-weight: 700;">
                                    Seleccione la sucursal en donde trabajara el empleado, no importa si es la misma.
                                </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                            </div>`;
                        }
                        if(response === 'estatusV') {
                            document.getElementById('respuesta-estatus-empleado').innerHTML =
                            `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong class="text-white text-center" style="font-weight: 700;">
                                    Seleccione el estatus de el empleado, no importa si es la misma.
                                </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                            </div>`;
                        }
                        if(response === 'vacios') {
                            document.getElementById('respuesta-estatus-empleado').innerHTML =
                            `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong class="text-white text-center" style="font-weight: 700;">
                                    Las casillas de seleccion estan vacias, seleccione la sucursal y el estatus del empleado
                                </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                            </div>`;
                        }
                        if(response === 'correcto') {
                            document.getElementById('respuesta-estatus-empleado').innerHTML =
                            `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong class="text-white text-center" style="font-weight: 700;">
                                    Cambios realizados exitosamente.
                                </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                            </div>`;
                        }
                        document.getElementById('contenido-mostrar-estatus').innerHTML = '';
                        document.getElementById('sucursales-emple').innerHTML = '';
                        document.getElementById('estatus-emple').innerHTML = '';
                    },
                    error:function (error){
                        console.log(error);
                    }
                });

            });
            }
        });
    });
    document.getElementById('btn-salir-sin-hacer-nada-estatus').addEventListener('click' , () => {
        let selector = document.getElementById('configuraciones');
        document.getElementById('contenido-mostrar-estatus').innerHTML = '';
        document.getElementById('sucursales-emple').innerHTML = '';
        document.getElementById('estatus-emple').innerHTML = '';
        limpiaComponentes(selector);
    });
    //---------------------------------------------------------------------------------------





    // parte asignar privs empleado
    document.getElementById('btn-asignacion-privs').addEventListener('click' , () => {
        document.getElementById('btn-guarda-cambios-privs').style.display= 'none';
        document.getElementById('contenido-mostrar-privs').innerHTML = ``;
        document.getElementById('cargos-emple').innerHTML = '';
        let selector = document.getElementById('contenedor-privilegios');
        limpiaComponentes(selector);
        document.getElementById('btn-busqueda-empleados').addEventListener('click' , () => {
            let parametro = `txt-id-privs=${$('#txt-id-privs').val()}`;
            let id = document.getElementById('txt-id-privs').value;
            document.getElementById('id-emple-a-asignar').value = id;
            console.log(document.getElementById('id-emple-a-cambiar').value);
            console.log(parametro);
            if(parametro === 'txt-id-privs=') {
                document.getElementById('respuesta-privs-empleado').innerHTML =
                    `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong class="text-white text-center" style="font-weight: 700;">
                            Debe teclear el identificador del empleado para asignar privilegios.
                        </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`;
                    document.getElementById('btn-guarda-cambios-privs').style.display= 'none';
            } else {
                $.ajax({
                    url: 'ajax/procesar-cambio-privs-part-uno.php' ,
                    dataType: 'json',
                    method: 'POST' ,
                    data: parametro ,
                    success:function (response) {
                        //console.log(response);
                        for(let i=0;i<response.length;i++) {
                            document.getElementById('contenido-mostrar-privs').innerHTML = `
                            <div class="form-group">
                                <label for="identificador" class="form-control bg-dark text-white">Id Sucursal De Trabajo</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" disabled value="${response[i].cargo}">
                            </div>
                            `;
                        }
                        let selector = document.getElementById('btn-guardar-cambios-privs');
                        limpiarCasillas(selector);
                    },
                    error:function(error) {
                        console.log(error);
                    }
                });
                $.ajax({
                    url:'ajax/procesar-cargos-empleado.php',
                    method:'GET',
                    dataType:'json',
                    success:function(response) {
                        //console.log(response);
                        // Limpiar select con una sola opcion
                        document.getElementById('cargos-emple').innerHTML = '';
                        $("#cargos-emple").append(`<option value="#">Seleccione estatus del empleado</option>`);
                        for(let i=0;i<response.length;i++) {
                            $("#cargos-emple").append(`
                                <option value="${response[i].idCargo}">
                                    ${response[i].descripcion}
                                </option>
                            `);
                        }
                        document.getElementById('btn-guarda-cambios-privs').style.display= 'block';
                    },
                    error:function(error) {
                        console.log(error);
                    }
                });
            }
        });
        document.getElementById('btn-guarda-cambios-privs').addEventListener('click', ()=> {
            let parametros = `id-emple-a-asignar=${$('#id-emple-a-asignar').val()}&cargo=${$('#cargos-emple').val()}`;
            console.log(parametros);
            $.ajax({
                url: 'ajax/procesar-cambio-priv-part-dos.php' ,
                dataType: 'json',
                method: 'POST' ,
                data: parametros ,
                success:function (response) {
                    console.log(response);
                    if(response === 'cargoV') {
                        document.getElementById('respuesta-privs-empleado').innerHTML =
                        `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="text-white text-center" style="font-weight: 700;">
                                Seleccione el privilegio a asignar al empleado, no importa si es la misma.
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`;
                    }
                    if(response === 'correct') {
                        document.getElementById('respuesta-privs-empleado').innerHTML =
                        `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="text-white text-center" style="font-weight: 700;">
                                Cambios realizados exitosamente.
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`;
                    }
                    document.getElementById('contenido-mostrar-privs').innerHTML = ``;
                    document.getElementById('cargos-emple').innerHTML = '';
                },
                error:function (error){
                    console.log(error);
                }
            });

        });
    });
    document.getElementById('btn-salir-sin-hacer-nada-privs').addEventListener('click' , () => {
        let selector = document.getElementById('configuraciones');
        limpiaComponentes(selector);
    });

    // proceso de insercion de sucursales
    document.getElementById('btn-creacion-sucursales').addEventListener('click' , () => {
        let selector = document.getElementById("contenedor-sucursales");
        limpiaComponentes(selector);
        document.getElementById('btn-insercion-suc').addEventListener('click', () => {
            function comprobacionParametros() {
                let bandera = true;
                let nombre = document.getElementById('txt-nom-suc').value;
                let correo = document.getElementById('txt-cor-suc').value;
                let direccion = document.getElementById('txt-dir-suc').value;
                let fax = document.getElementById('txt-fax-suc').value;
                let telefono = document.getElementById('txt-tel-suc').value;

                let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if (re.test(document.getElementById('txt-cor-suc').value)){
                    document.getElementById('txt-cor-suc').classList.remove('input-error');
                    document.getElementById('txt-cor-suc').classList.add('input-success');
                } else{
                    document.getElementById('txt-cor-suc').classList.remove('input-success');
                    document.getElementById('txt-cor-suc').classList.add('input-error');
                    bandera = false;
                }

                if (direccion == ''){
                    document.getElementById('txt-dir-suc').classList.remove('input-success');
                    document.getElementById('txt-dir-suc').classList.add('input-error');
                    bandera = false;
                } else {
                    document.getElementById('txt-dir-suc').classList.remove('input-error');
                    document.getElementById('txt-dir-suc').classList.add('input-success');
                }

                if (nombre == ''){
                    document.getElementById('txt-nom-suc').classList.remove('input-success');
                    document.getElementById('txt-nom-suc').classList.add('input-error');
                    bandera = false;
                } else {
                    document.getElementById('txt-nom-suc').classList.remove('input-error');
                    document.getElementById('txt-nom-suc').classList.add('input-success');
                }

                if (telefono == ''){
                    document.getElementById('txt-tel-suc').classList.remove('input-success');
                    document.getElementById('txt-tel-suc').classList.add('input-error');
                    bandera = false;
                } else {
                    document.getElementById('txt-tel-suc').classList.remove('input-error');
                    document.getElementById('txt-tel-suc').classList.add('input-success');
                }
                return bandera;
            }
            let avanzar = comprobacionParametros();
            if(avanzar) {
                let nombre = document.getElementById('txt-nom-suc').value;
                let correo = document.getElementById('txt-cor-suc').value;
                let direccion = document.getElementById('txt-dir-suc').value;
                let fax = document.getElementById('txt-fax-suc').value;
                let telefono = document.getElementById('txt-tel-suc').value;
                let parametros = `nombre=${nombre}&correo=${correo}&direccion=${direccion}&telefono=${telefono}&fax=${fax}`;
                console.log(parametros);
                $.ajax({
                    url: 'ajax/procesar-insercion-sucursal.php' ,
                    dataType: 'json',
                    method: 'POST' ,
                    data: parametros ,
                    success:function (response) {
                        if(response == 'exito') {
                            document.getElementById('respuesta-notificacion-sucursales').innerHTML =
                            `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="text-white text-center" style="font-weight: 700;">
                                Sucursal Insertada con exito.
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>`;
                            let selector = document.getElementById('btn-guardar-cambios-privs');
                            limpiarCasillas(selector);
                        }

                    },
                    error:function (error) {
                        console.log(error);
                    }
                });
            } else {
                document.getElementById('respuesta-notificacion-sucursales').innerHTML =
                    `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong class="text-white text-center" style="font-weight: 700;">
                        Rellene los campos obligatorios.
                    </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>`;
            }
        });
    });
    document.getElementById('btn-salir-sin-hacer-nada-suc').addEventListener('click' , () => {
        let selector = document.getElementById('configuraciones');
        limpiaComponentes(selector);
    });
});
