
//ESTILIZANDO LA BARRA DE NAVEGACION
let ubicacionPrincipal = window.pageYOffset;//da la ubicacion de donde estemos

window.addEventListener("scroll",function(){//al hacer scroll sobre la pagina hacer lo siguiente
    let desplazamientoActual = window.pageYOffset;
    //codigo para que el navbar se vea cuando scrolles para arriba , si es para abajo se esconde
    if(ubicacionPrincipal >= desplazamientoActual) {
        document.getElementsByTagName("nav")[0].style.top = "0px";
    }else{
        document.getElementsByTagName("nav")[0].style.top = "-100px";
    }
    ubicacionPrincipal = desplazamientoActual;
});

//ESTILIZANDO LA OPCION DE MENU HAMBURGUESA RESPONSIVE este caso llamar al evento click
let enlacesHeader = document.querySelectorAll(".enlaces-header")[0];
let semaforo = true;
document.querySelectorAll(".hamburguer")[0].addEventListener("click",function() {
    if(semaforo) {
        document.querySelectorAll(".hamburguer")[0].style.color = "#fff";
        semaforo = false;
    } else {
        document.querySelectorAll(".hamburguer")[0].style.color = "#000";
        semaforo = true;
    }
    enlacesHeader.classList.toggle("menudos");
});