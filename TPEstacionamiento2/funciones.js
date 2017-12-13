///<reference path="./Persona.ts"/>
///<reference path="./Usuario.ts"/>
///<reference path="./node_modules/@types/jquery/index.d.ts"/>
var arrayusuarios;
function Agregar() {
    var logueos = localStorage.getItem("usuarioslogueados");
    arrayusuarios = JSON.parse(logueos);
    var correo = document.getElementById("email");
    var clave = document.getElementById("clave");
    var tipo = "logueo";
    var usuario = new personas.Usuario(tipo, correo.value, clave.value);
    if (arrayusuarios === null) {
        arrayusuarios = new Array();
        arrayusuarios.push(usuario);
    }
    else {
        arrayusuarios.push(usuario);
    }
    localStorage.setItem("usuarioslogueados", JSON.stringify(arrayusuarios));
}
function IngresoUsuario() {
    document.getElementById("email").value = "gise@gise";
    document.getElementById("clave").value = "123";
}
function IngresoAdmin() {
    document.getElementById("email").value = "gi@acosta";
    document.getElementById("clave").value = "2222";
}
function RecordarDatos() {
    if (document.getElementById('checkbox').checked == true) {
        Agregar();
    }
}
