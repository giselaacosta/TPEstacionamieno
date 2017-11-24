
///<reference path="./Persona.ts"/>
namespace personas{
    export class Usuario extends Persona
 {
    correo:string;
    password:string;
 
 
     constructor(tipo:string,correo:string,password:string) {
         
        super(tipo);
        this.correo = correo;
        this.password = password;
    }
     
        
 

 
 toString():string
 {
   super.toString();
    return this.correo+this.password;
 }
 }
 }