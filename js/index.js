/**
 * Created by AlbaLuis on 06/11/2018.
 */

function busqueda(){
    var pagina=1;
    var num_registros=$("#num_registro").val();
    // var num_registros=20;
    var primero=$("#primero").val();
    var ultimo=$("#ultimo").val();
    var siguiente=$("#siguiente").val();
    var anterior=$("#anterior").val();
    var mostrar=$("#mostrar").val();
    var matricula=$("#matricula_filtro").val();
    var marca=$("#marca_filtro").val();
    var anno=$("#anno_filtro").val();
    var modelo=$("#modelo_filtro").val();
    var id_cliente=$("#id_cliente_filtro").val();
    var id_vehiculo_tipo=$("#id_vehiculo_tipo_filtro").val();
    $.post("inc/paginador.php",
        {
            // authkey: localStorage.getItem("authkey")
            pagina:pagina,
            num_registros:num_registros,
            primero:primero,
            ultimo:ultimo,
            siguiente:siguiente,
            anterior:anterior,
            mostrar:mostrar,
            matricula:matricula,
            marca:marca,
            anno:anno,
            modelo:modelo,
            id_cliente:id_cliente,
            id_vehiculo_tipo:id_vehiculo_tipo

        },
        function (data) {
            // alert("Data: " + data.succes);
            if (data.succes) {
                //codigo cuando entra correctamente
                //limpiamos la tabla
                document.getElementById("cuerpo_tabla").innerHTML="";
                // document.getElementById("num_resgistros_respuesta").innerHTML=""+data.num_registros;
                if(data.data==null){
                    alert("nada encontrado")
                }else {
                    $("#pagina").val(pagina);
                    for (i = 0; i < data.data.length; i++) {
                        $('tbody').append('<tr>' +
                            '<td>' + data.data[i].matricula + '</td>' +
                            '<td>' + data.data[i].marca + '</td>' +
                            '<td>' + data.data[i].modelo + '</td>' +
                            '<td>' + data.data[i].anno + '</td>' +
                            '<td>' + data.data[i].color + '</td>' +
                            '<td>' + data.data[i].imagen + '</td>' +
                            '<td>' + data.data[i].id_cliente + '</td>' +
                            '<td>' + data.data[i].id_vehiculo_tipo + '</td>' +

                            '<td><buttonE class="btn-warning btn warning" id="' + data.data[i].matricula + '" data-toggle="modal"\n' +
                            '                        data-target="#exampleModal">Editar</buttonE></td>' +
                            '<td><buttonD class="btn-danger btn alert" id="' + data.data[i].matricula + '">Borrar</buttonD></td>' +
                            '</tr>');
                    }

                    $("buttonE").click(function () {
                        // var test= $("button").getIdentityAssertion();

                        $("#actualizar").show();
                        $("#guardar").removeAttr("style").hide();

                        var matriculaId = this.id;
                        $.post("servicios/vehiculos_editar.php",
                            {
                                matricula: matriculaId,
                            },
                            function (data) {

                                if (data.succes) {
                                    $("#matricula").val(data.data.matricula);
                                    $("#marca").val(data.data.marca);
                                    $("#modelo").val(data.data.modelo);
                                    $("#anno").val(data.data.anno);
                                    $("#color").val(data.data.color);
                                    $("#imagen").val(data.data.imagen);
                                    $("#cliente").val(data.data.cliente);
                                    $("#tipo").val(data.data.tipo);
                                } else {

                                }
                            }, 'json');
                    });
                    $("buttonD").click(function () {
                        // var test= $("button").getIdentityAssertion();
                        var matriculaId = this.id;
                        var confirmar = confirm("¿Quieres borrar el coche con matricula" + matriculaId + "?");
                        if (confirmar == true) {

                            $.post("servicios/vehiculos_borrar.php",
                                {
                                    matricula: matriculaId,
                                },
                                function (data) {
                                    // alert("Data: " + data.succes);
                                    if (data.succes) {
                                        alert(data.msg);
                                    } else {
                                        alert(data.msg)
                                    }
                                }, 'json');
                        } else {

                        }
                    });
                }
            } else {
                alert("Error:   " + data.msg);
                // location.href = "http://localhost/ProyectoLogin/login.html";

            }
        }, 'json');

};
$(document).ready(function () {

    $("#formulario_crud").click(function () {
        busqueda();
    });
    var pagina=1;
    var num_registros=10;
    var primero=false;
    var ultimo=false;
    var siguiente=false;
    var anterior=false;
    var mostrar=true;
    var matricula=$("#matricula").val();
    var marca=$("#marca").val();
    var anno=$("#anno").val();
    var modelo=$("#modelo").val();
    var id_cliente=$("#id_cliente").val();
    var id_vehiculo_tipo=$("#id_vehiculo_tipo").val();


    // var pagina=$("#pagina").val();
    // var num_registros=$("#num_registro").val();
    // var primero=$("#primero").val();
    // var ultimo=$("#ultimo").val();
    // var siguiente=$("#siguiente").val();
    // var anterior=$("#anterior").val();
    // var mostrar=$("#mostrar").val();
    // var matricula=$("#matricula").val();
    // var marca=$("#marca").val();
    // var anno=$("#anno").val();
    // var modelo=$("#modelo").val();
    // var id_cliente=$("#id_cliente").val();
    // var id_vehiculo_tipo=$("#id_vehiculo_tipo").val();



    $.post("inc/paginador.php",
        {
            // authkey: localStorage.getItem("authkey")
            pagina:pagina,
            num_registros:num_registros,
            primero:primero,
            ultimo:ultimo,
            siguiente:siguiente,
            anterior:anterior,
            mostrar:mostrar,
            matricula:matricula,
            marca:marca,
            anno:anno,
            modelo:modelo,
            id_cliente:id_cliente,
            id_vehiculo_tipo:id_vehiculo_tipo

        },
        function (data) {
            // alert("Data: " + data.succes);
            if (data.succes) {
                //codigo cuando entra correctamente
                // document.getElementById("num_resgistros_respuesta").innerHTML("e"+data.num_registros);
               if(data.data==null){
                   alert("nada encontrado")
               }else {
                   for (i = 0; i < data.data.length; i++) {
                       $('tbody').append('<tr>' +
                           '<td>' + data.data[i].matricula + '</td>' +
                           '<td>' + data.data[i].marca + '</td>' +
                           '<td>' + data.data[i].modelo + '</td>' +
                           '<td>' + data.data[i].anno + '</td>' +
                           '<td>' + data.data[i].color + '</td>' +
                           '<td>' + data.data[i].imagen + '</td>' +
                           '<td>' + data.data[i].id_cliente + '</td>' +
                           '<td>' + data.data[i].id_vehiculo_tipo + '</td>' +

                           '<td><buttonE class="btn-warning btn warning" id="' + data.data[i].matricula + '" data-toggle="modal"\n' +
                           '                        data-target="#exampleModal">Editar</buttonE></td>' +
                           '<td><buttonD class="btn-danger btn alert" id="' + data.data[i].matricula + '">Borrar</buttonD></td>' +
                           '</tr>');

                   }

                   $("buttonE").click(function () {
                       // var test= $("button").getIdentityAssertion();
                       $("#actualizar").show();
                       $("#guardar").removeAttr("style").hide();

                       var matriculaId = this.id;
                       $.post("servicios/vehiculos_editar.php",
                           {
                               matricula: matriculaId,
                           },
                           function (data) {

                               if (data.succes) {
                                   $("#matricula").val(data.data.matricula);
                                   $("#marca").val(data.data.marca);
                                   $("#modelo").val(data.data.modelo);
                                   $("#anno").val(data.data.anno);
                                   // $("#color").val(data.data.color);
                                   // $("#imagen").val(data.data.imagen);
                                   // $("#cliente").val(data.data.cliente);
                                   // $("#tipo").val(data.data.tipo);
                               } else {

                               }
                           }, 'json');
                   });
                   $("buttonD").click(function () {
                       // var test= $("button").getIdentityAssertion();
                       var matriculaId = this.id;
                       var confirmar = confirm("¿Quieres borrar el coche con matricula" + matriculaId + "?");
                       if (confirmar == true) {

                           $.post("servicios/vehiculos_borrar.php",
                               {
                                   matricula: matriculaId,
                               },
                               function (data) {
                                   // alert("Data: " + data.succes);
                                   if (data.succes) {
                                       alert(data.msg);
                                   } else {
                                       alert(data.msg)
                                   }
                               }, 'json');
                       } else {

                       }
                   });


               }
            } else {
                alert("Error:   " + data.msg);
                // location.href = "http://localhost/ProyectoLogin/login.html";

            }
        }, 'json');


    $("#logout").click(function () {
        var confirmar = confirm("¿Quieres cerrar sesión?");
        if (confirmar == true) {
            localStorage.removeItem("authkey");
            location.href = "http://localhost/ProyectoLogin/login.html";
        }
    });



    $("#anterior").click(function () {
var paginaInt=parseInt($("#pagina").val())-1;
if(paginaInt<1){
    var pagina=1;
}else{
    var pagina=paginaInt;
}

        // var num_registros=$("#num_registro").val();
        // // var num_registros=20;
        // var primero=$("#primero").val();
        // var ultimo=$("#ultimo").val();
        // var siguiente=$("#siguiente").val();
        // var anterior=true;
        // var mostrar=$("#mostrar").val();
        var matricula=$("#matricula_filtro").val();
        var marca=$("#marca_filtro").val();
        var anno=$("#anno_filtro").val();
        var modelo=$("#modelo_filtro").val();
        var id_cliente=$("#id_cliente_filtro").val();
        var id_vehiculo_tipo=$("#id_vehiculo_tipo_filtro").val();

        // alert("cago endi os");
        $.post("inc/paginador.php",
            {
                // authkey: localStorage.getItem("authkey")
                pagina:pagina,
                // num_registros:num_registros,
                // primero:primero,
                // ultimo:ultimo,
                // siguiente:siguiente,
                // anterior:anterior,
                // mostrar:mostrar,
                matricula:matricula,
                marca:marca,
                anno:anno,
                modelo:modelo,
                id_cliente:id_cliente,
                id_vehiculo_tipo:id_vehiculo_tipo

            },
            function (data) {
                // alert("Data: " + data.succes);
                if (data.succes) {
                    //codigo cuando entra correctamente
                    //limpiamos la tabla
                    document.getElementById("cuerpo_tabla").innerHTML="";
                    // document.getElementById("num_resgistros_respuesta").innerHTML=""+data.num_registros;
                    if(data.data==null){
                        alert("nada encontrado")
                    }else {
                        $("#pagina").val(pagina)
                        for (i = 0; i < data.data.length; i++) {
                            $('tbody').append('<tr>' +
                                '<td>' + data.data[i].matricula + '</td>' +
                                '<td>' + data.data[i].marca + '</td>' +
                                '<td>' + data.data[i].modelo + '</td>' +
                                '<td>' + data.data[i].anno + '</td>' +
                                '<td>' + data.data[i].color + '</td>' +
                                '<td>' + data.data[i].imagen + '</td>' +
                                '<td>' + data.data[i].id_cliente + '</td>' +
                                '<td>' + data.data[i].id_vehiculo_tipo + '</td>' +

                                '<td><buttonE class="btn-warning btn warning" id="' + data.data[i].matricula + '" data-toggle="modal"\n' +
                                '                        data-target="#exampleModal">Editar</buttonE></td>' +
                                '<td><buttonD class="btn-danger btn alert" id="' + data.data[i].matricula + '">Borrar</buttonD></td>' +
                                '</tr>');
                        }

                        $("buttonE").click(function () {
                            // var test= $("button").getIdentityAssertion();

                            $("#actualizar").show();
                            $("#guardar").removeAttr("style").hide();

                            var matriculaId = this.id;
                            $.post("servicios/vehiculos_editar.php",
                                {
                                    matricula: matriculaId,
                                },
                                function (data) {

                                    if (data.succes) {
                                        $("#matricula").val(data.data.matricula);
                                        $("#marca").val(data.data.marca);
                                        $("#modelo").val(data.data.modelo);
                                        $("#anno").val(data.data.anno);
                                        $("#color").val(data.data.color);
                                        $("#imagen").val(data.data.imagen);
                                        $("#cliente").val(data.data.cliente);
                                        $("#tipo").val(data.data.tipo);
                                    } else {

                                    }
                                }, 'json');
                        });
                        $("buttonD").click(function () {
                            // var test= $("button").getIdentityAssertion();
                            var matriculaId = this.id;
                            var confirmar = confirm("¿Quieres borrar el coche con matricula" + matriculaId + "?");
                            if (confirmar == true) {

                                $.post("servicios/vehiculos_borrar.php",
                                    {
                                        matricula: matriculaId,
                                    },
                                    function (data) {
                                        // alert("Data: " + data.succes);
                                        if (data.succes) {
                                            alert(data.msg);
                                        } else {
                                            alert(data.msg)
                                        }
                                    }, 'json');
                            } else {

                            }
                        });
                    }
                } else {
                    alert("Error:   " + data.msg);
                    // location.href = "http://localhost/ProyectoLogin/login.html";

                }
            }, 'json');

    });


    $("#siguiente").click(function () {
        var pagina=parseInt($("#pagina").val())+1;
        // var pagina=2;
        // var num_registros=$("#num_registro").val();
        // // var num_registros=20;
        // var primero=$("#primero").val();
        // var ultimo=$("#ultimo").val();
        // var siguiente=true;
        // var anterior=$("#anterior").val();
        // var mostrar=$("#mostrar").val();
        var matricula=$("#matricula_filtro").val();
        var marca=$("#marca_filtro").val();
        var anno=$("#anno_filtro").val();
        var modelo=$("#modelo_filtro").val();
        var id_cliente=$("#id_cliente_filtro").val();
        var id_vehiculo_tipo=$("#id_vehiculo_tipo_filtro").val();

        // alert("siguiente"+num_registros+true+anterior+siguiente);
        $.post("inc/paginador.php",
            {
                // authkey: localStorage.getItem("authkey")
                pagina:pagina,
                siguiente:true,
                // anterior:anterior,
                // mostrar:mostrar,
                matricula:matricula,
                marca:marca,
                anno:anno,
                modelo:modelo,
                id_cliente:id_cliente,
                id_vehiculo_tipo:id_vehiculo_tipo

            },
            function (data) {
                // alert("Data: " + data.succes);
                if (data.succes) {
                    //codigo cuando entra correctamente
                    //limpiamos la tabla
                    document.getElementById("cuerpo_tabla").innerHTML="";
                    // document.getElementById("num_resgistros_respuesta").innerHTML=""+data.num_registros;
                    if(data.data==null){
                        alert("nada encontrado")
                    }else {
                        $("#pagina").val(pagina)
                        for (i = 0; i < data.data.length; i++) {
                            $('tbody').append('<tr>' +
                                '<td>' + data.data[i].matricula + '</td>' +
                                '<td>' + data.data[i].marca + '</td>' +
                                '<td>' + data.data[i].modelo + '</td>' +
                                '<td>' + data.data[i].anno + '</td>' +
                                '<td>' + data.data[i].color + '</td>' +
                                '<td>' + data.data[i].imagen + '</td>' +
                                '<td>' + data.data[i].id_cliente + '</td>' +
                                '<td>' + data.data[i].id_vehiculo_tipo + '</td>' +

                                '<td><buttonE class="btn-warning btn warning" id="' + data.data[i].matricula + '" data-toggle="modal"\n' +
                                '                        data-target="#exampleModal">Editar</buttonE></td>' +
                                '<td><buttonD class="btn-danger btn alert" id="' + data.data[i].matricula + '">Borrar</buttonD></td>' +
                                '</tr>');
                        }

                        $("buttonE").click(function () {
                            // var test= $("button").getIdentityAssertion();
                            // document.getElementById("guardar").style.display = "none";
                            $("#actualizar").show();
                            $("#guardar").removeAttr("style").hide();
                            var matriculaId = this.id;
                            $.post("servicios/vehiculos_editar.php",
                                {
                                    matricula: matriculaId,
                                },
                                function (data) {

                                    if (data.succes) {
                                        $("#matricula").val(data.data.matricula);
                                        $("#marca").val(data.data.marca);
                                        $("#modelo").val(data.data.modelo);
                                        $("#anno").val(data.data.anno);
                                        $("#color").val(data.data.color);
                                        $("#imagen").val(data.data.imagen);
                                        $("#cliente").val(data.data.cliente);
                                        $("#tipo").val(data.data.tipo);
                                    } else {

                                    }
                                }, 'json');
                        });
                        $("buttonD").click(function () {
                            // var test= $("button").getIdentityAssertion();
                            var matriculaId = this.id;
                            var confirmar = confirm("¿Quieres borrar el coche con matricula" + matriculaId + "?");
                            if (confirmar == true) {

                                $.post("servicios/vehiculos_borrar.php",
                                    {
                                        matricula: matriculaId,
                                    },
                                    function (data) {
                                        // alert("Data: " + data.succes);
                                        if (data.succes) {
                                            alert(data.msg);
                                        } else {
                                            alert(data.msg)
                                        }
                                    }, 'json');
                            } else {

                            }
                        });
                    }
                } else {
                    alert("Error:   " + data.msg);
                    // location.href = "http://localhost/ProyectoLogin/login.html";

                }
            }, 'json');

    });

$("#crear_vehiculo").click(function () {
    $("#guardar").show();
    $("#actualizar").removeAttr("style").hide();
});




});

