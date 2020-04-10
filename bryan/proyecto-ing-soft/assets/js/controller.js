$(document).ready(function() {
    $("#btn-login").click(function () {
        document.getElementById("contenedor-email").style.display = "block";
        document.getElementById("principal").style.display = "none";
        document.getElementById("contenedor-signup").style.display = "none";
        document.getElementById("contenedor-password").style.display = "none";
    });
    $("#btn-signup").click(function () {
        document.getElementById("contenedor-signup").style.display = "block";
        document.getElementById("contenedor-email").style.display = "none";
        document.getElementById("principal").style.display = "none";
        document.getElementById("contenedor-password").style.display = "none";
    });
    $("#btn-next").click(function () {
        document.getElementById("contenedor-signup").style.display = "none";
        document.getElementById("contenedor-email").style.display = "none";
        document.getElementById("principal").style.display = "none";
        document.getElementById("contenedor-password").style.display = "block";
    });
    $("#btn-ok").click(function() {
        window.location="landing.php";
    });
});