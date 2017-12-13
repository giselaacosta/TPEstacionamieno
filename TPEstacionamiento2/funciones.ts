///<reference path="./Persona.ts"/>
///<reference path="./Usuario.ts"/>
///<reference path="./node_modules/@types/jquery/index.d.ts"/>

var arrayusuarios:Array<personas.Usuario>;



function Agregar():void
{
var logueos = localStorage.getItem("usuarioslogueados"); 
arrayusuarios= JSON.parse(logueos); 
var correo= document.getElementById("email") as HTMLInputElement;

var clave= document.getElementById("clave") as HTMLInputElement;
var tipo="logueo";

var usuario:personas.Usuario=new personas.Usuario(tipo,correo.value,clave.value);

if (arrayusuarios === null) 
  {
    arrayusuarios = new Array<personas.Usuario>();
  

    arrayusuarios.push(usuario);
  }
  else{

    arrayusuarios.push(usuario);
  }
 localStorage.setItem("usuarioslogueados", JSON.stringify(arrayusuarios));

  
}



function IngresoUsuario(){
 
    (document.getElementById("email") as HTMLInputElement).value="gise@gise";
    (document.getElementById("clave") as HTMLInputElement).value="123";

}


function IngresoAdmin(){
    (document.getElementById("email") as HTMLInputElement).value="gi@acosta";
    (document.getElementById("clave") as HTMLInputElement).value="2222";

}


function RecordarDatos()
{
  
	 if ((document.getElementById('checkbox') as HTMLInputElement).checked==true)
  {

    Agregar();
        
        }
       
          
    
  }
