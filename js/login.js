/**
 * Created by AlbaLuis on 06/11/2018.
 */
// antes del ajax hay que validar, para no hacer las peticiones posts innecesarias y la otra validacion en el server
$(document).ready(function () {
    $("#btnLogin").click(function () {
        $.post("servicios/login.php",
            {
                email: $('#email').val(),
                password: $('#password').val()
            },
            function (data) {
                // alert("Data: " + data.succes);
                if (data.succes) {
                    localStorage.setItem("authkey", data.authkey);
                    // console.log(localStorage.getItem("authkey"));
                    alert("Exito al logearse " + data.msg);
                    location.href = "http://localhost/ProyectoLogin/index.html";
                } else {
                    $("#respuesta").show();
                    $("#respuesta").text(data.msg);
                    $("#respuesta").addClass('btn-danger');
                    $("#respuesta").removeClass('btn-success');
                }
            }, 'json');
    });
});
//funcion para esconder el mensaje de error
$(window).on("load", function () {
    $("#respuesta").hide();
});