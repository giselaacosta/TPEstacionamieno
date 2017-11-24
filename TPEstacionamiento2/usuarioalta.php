<?php
require './clases/AccesoDatos.php';
require './clases/Empleado.php';

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$clave=$_POST['clave'];
$perfil=$_POST['perfil'];
$turno=$_POST['turno'];
$fechacreacion=$_POST['fechacreacion'];
$foto=$_POST['foto'];


$empleado=new Empleado();

$empleado->nombre=$nombre;
$empleado->apellido=$apellido;
$empleado->mail=$correo;
$empleado->clave=$clave;
$empleado->perfil=$perfil;
$empleado->turno=$turno;
$empleado->fechacreacion=$fechacreacion;
$empleado->foto=$foto;



if(isset($empleado->nombre) && isset($empleado->apellido)  &&  isset($empleado->mail)&&
isset($empleado->clave) && isset($empleado->perfil)  &&  isset($empleado->turno) &&
isset($empleado->fechacreacion) && isset($empleado->foto))


{
    $pdo = AccesoDatos::connect();
    $empleado->InsertarEmpleado();
   
}
else
{

    echo 'ocurrio un error';
}


?>