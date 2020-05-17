<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorize Request</title>
    <link rel="stylesheet" href="assets/css/bootstrap-personalizado-2.min.css">
    <style>
        body {
            background: #43C6AC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #F8FFAE, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #F8FFAE, #43C6AC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            font-family: 'Roboto' , sans-serif;
        }
        #unauthorize {
            color:red;
        }
        #regresar {
            border-radius: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-sm-12 mx-auto my-auto">
                <h2 id="unauthorize" class="text-center display-4">
                    Necesita Credenciales para Entrar Al Sistema
                </h2>
            </div>
        </div>
        <div class="row">
            <div id="contenedor-imagen" class="col-lg-6 col-sm-12 mx-auto">
                <img src="assets/img/pagina-no-encontrada.png" class="img-fluid" alt="Unauthorize Request"><br>
            </div>
            <div class="col-lg-6 col-sm-12 my-auto mx-auto">
                <img src="assets/img/regresar.gif" id="regresar" class="img-fluid" alt="">
                <input type="button" value="Iniciar Sesion" class="btn btn-danger" id="return">
            </div>
        </div>
        <script>
            document.getElementById("return").addEventListener('click', () => {
                window.location = 'index.php';
            });
        </script>
    </div>
</body>
</html>