var xmlHttp=new XMLHttpRequest();

function objetoAjax()
{

    var xmlHttp= false;
    try{
        xmlHttp=new ActiveXObject("Msxml2.xmlhttp");
    } catch(e){

        try{

            xmlHttp=new ActiveXObject(Microsoft.xmlHttp);

        }
        catch(E)
        {
          xmlHttp=false;
        }
    }
    if(!xmlHttp && typeof XMLHttpRequest!='undefined')
        {
            xmlHttp=new XMLHttpRequest();
}
return xmlHttp;
}
function Insertar()

{
nombre=document.getElementById("nombre");
apellido=document.getElementById("apellido");
correo=document.getElementById("correo");

clave=document.getElementById("clave");

perfil=document.getElementById("perfil");

turno=document.getElementById("turno");

fechacreacion=document.getElementById("fechacreacion");

foto=document.getElementById("foto");
ajax=objetoAjax();

ajax.open("POST","./usuarioalta.php",true);
ajax.onreadystatechange=function()
{

if(ajax.readyState==4)
    {

        alert("Los datos fueron guardados con exito")
        //window.location.reload(true);
    }

}
ajax.setRequestHeader("content-type","application/x-www-form-urlencoded");
//ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("nombre="+nombre+"apellido="+apellido+"clave="+clave+"perfil="+perfil+"turno="+turno+"fechacreacion="+fechacreacion+"foto="+foto);

}

