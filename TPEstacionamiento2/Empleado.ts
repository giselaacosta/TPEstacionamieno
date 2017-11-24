
///<reference path="./Persona.ts"/>
namespace personas{
    export class Empleado extends Persona
 {
    id:string;
    nombre:string;
    apellido:string;
    correo:string;
    password:string;
    perfil:string;
    turno:string;
    fechacreacion:string;
    foto:string;

     constructor(tipo:string,id:string,nombre:string,apellido:string,correo:string,password:string,perfil:string,turno:string,fechacreacion:string,foto:string) {
         
        super(tipo);
        this.id = id;
        this.nombre = nombre;
        this.apellido = apellido;
        this.correo = correo;
        this.password = password;
        this.perfil = perfil;
        this.turno = turno;
        this.fechacreacion = fechacreacion;
        this.foto = foto;
    }
     
        
 

 

 }
 }