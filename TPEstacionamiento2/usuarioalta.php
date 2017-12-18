<?php
require './clases/AccesoDatos.php';
require './clases/Empleado.php';


//$foto = $_FILES['file-0'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$clave=$_POST['clave'];
$perfil=$_POST['perfil'];
$turno=$_POST['turno'];
$fechacreacion=$_POST['fechacreacion'];
/*$nombrefoto = $_FILES['archivo']['name'];
$tipo = $_FILES['archivo']['type'];
$tamanio = $_FILES['archivo']['size'];
$ruta = $_FILES['archivo']['tmp_name'];
$destino = "fotosEmpleados/" . $nombrefoto;

*/



//upload.php

$return = Array('ok'=>TRUE);

$upload_folder ='fotosEmpleados';

$nombre_archivo = $_FILES['archivo']['name'];
 $extension=end(explode(".", $nombre_archivo));

$tipo_archivo = $_FILES['archivo']['type'];

$tamano_archivo = $_FILES['archivo']['size'];

$tmp_archivo = $_FILES['archivo']['tmp_name'];

$archivador = $upload_folder . '/' . $apellido.'-'.$nombre.'.'.$extension;

if (!move_uploaded_file($tmp_archivo, $archivador)) {

$return = Array('ok' => FALSE, 'msg' => "Ocurrio un error al subir el archivo. No pudo guardarse.", 'status' => 'error');

}
$empleado=new Empleado();
$empleado->nombre=$nombre;
$empleado->apellido=$apellido;
$empleado->mail=$correo;
$empleado->clave=$clave;
$empleado->perfil=$perfil;
$empleado->turno=$turno;
$empleado->fechacreacion=$fechacreacion;
$empleado->foto=$apellido.'-'.$nombre.'.'.$extension;
if(isset($_FILES['archivo'])=="")
{
$empleado->foto="pordefecto.jpg";

}

if(isset($empleado->nombre) && isset($empleado->apellido)  &&  isset($empleado->mail)&&
isset($empleado->clave) && isset($empleado->perfil)  &&  isset($empleado->turno) &&
isset($empleado->fechacreacion) &&
isset($empleado->foto) )
{

$pdo = AccesoDatos::connect();
$empleado->InsertarEmpleado();
//echo json_encode($return);
echo json_encode($empleado);


}
else
{

    echo 'ocurrio un error';
}
/*


*/



/*

if(isset($empleado->nombre) && isset($empleado->apellido)  &&  isset($empleado->mail)&&
isset($empleado->clave) && isset($empleado->perfil)  &&  isset($empleado->turno) &&
isset($empleado->fechacreacion) &&
isset($foto->foto) )
*/

/*if(isset($empleado->foto)) 


{



    $pdo = AccesoDatos::connect();
    $empleado->InsertarFoto();
    echo "Se agregó con exito";
}
else
{

    echo 'ocurrio un error';
}
*/

?>