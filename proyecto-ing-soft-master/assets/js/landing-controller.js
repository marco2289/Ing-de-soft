$(document).ready(function () {
    //   Subir Imagen al servidor
    $("#btn-enviar").click(function() {
        //console.log("works");

        //PARA LA IMAGEN DE LA PERSONA EN EL SERVIDOR
        var formData = new FormData($("#formulario")[0]);
        var ruta = "ajax/procesar-imagen-empleado.php";
        console.log(formData);
        $.ajax({
            url: ruta ,
            type: "POST" ,
            data: formData ,
            contentType: false ,
            processData: false ,
            success:function(datos){
                console.log(datos);
                location.href ="landing.php";
            },
            error:function(error){
                $("#respuesta").append(error.responseText);
            }
        });
    });
});