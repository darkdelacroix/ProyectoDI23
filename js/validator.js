

$("#EnvioModal").click(function () {
    var matricula=$("#matricula").val();
    var marca=$("#marca").val();
    var modelo=$("#modelo").val();
    var anno=$("#anno").val();
    var color=$("#color").val();
    var imagen=$("#imagen").val();
    var cliente=$("#cliente").val();
    var tipo=$("#tipo").val();
    var respuesta="<ul>";//tipo string para encadenar el mensaje en li
    var valido=true;//tipo boolean que devolvera si es valido o no
    if(matricula=== null){
        respuesta+="<li>La matricula "+matricula+" no es correcta</li>";
        valido=false;
    }else if(marca===null){
        respuesta+="<li>La marca "+marca+" no es correcta</li>";
        valido=false;

    }else if(modelo===null){
        respuesta+="<li>El modelo "+modelo+" no es correcta</li>";
        valido=false;
    }else if(anno===null){
        respuesta+="<li>El año "+anno+" no es correcto</li>";
        valido=false;
    }else if(color===null){
        respuesta+="<li>El color "+color+" no es correcta</li>";
        valido=false;

    }else if(imagen===null){
        respuesta+="<li>La imagen  no es correcta</li>";
        valido=false;

    }else if(cliente===null){
        respuesta+="<li>El cliente "+cliente+" no es correcta</li>";
        valido=false;

    }else if(tipo===null){
        respuesta+="<li>El tipo "+tipo+" no es correcta</li>";
        valido=false;
    }
    respuesta+="</ul>";
    if(!valido){
        $("#msg").append(respuesta);
    }

});