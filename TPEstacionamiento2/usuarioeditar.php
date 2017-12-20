<?php
require './clases/AccesoDatos.php';
require './clases/Empleado.php';

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$clave=$_POST['clave'];
$perfil=$_POST['perfil'];
$turno=$_POST['turno'];
$fechacreacion=$_POST['fechacreacion'];
$fotoanterior=$_POST['fotoanterior'];

if(isset($_FILES['archivo']['name']))
{
$return = Array('ok'=>TRUE);

$upload_folder ='fotosEmpleados';

$nombre_archivo = $_FILES['archivo']['name'];
 $extension=end(explode(".", $nombre_archivo));

$tipo_archivo = $_FILES['archivo']['type'];

$tamano_archivo = $_FILES['archivo']['size'];

$tmp_archivo = $_FILES['archivo']['tmp_name'];

$archivador = $upload_folder . '/' . $apellido.'-'.$nombre.'.'.$extension;

//$fotonombre= $apellido.'-'.$nombre.'.jpg';

}
if (!move_uploaded_file($tmp_archivo, $archivador)) {

$return = Array('ok' => FALSE, 'msg' => "Ocurrio un error al subir el archivo. No pudo guardarse.", 'status' => 'error');

}




if(isset($fotoanterior) && $fotoanterior!="pordefecto.jpg")
{

	$fotonombre=$apellido.'-'.$nombre.'.jpg';
	rename('fotosEmpleados/'.$fotoanterior,'fotosEmpleados/'. $fotonombre);
	
      //move_uploaded_file('fotosEmpleados/'.$fotoanterior,'fotosEmpleados/', $fotonombre);
}



$empleado=new Empleado();
$empleado->id=$id;
$empleado->nombre=$nombre;
$empleado->apellido=$apellido;
$empleado->mail=$correo;
$empleado->clave=$clave;
$empleado->perfil=$perfil;
$empleado->turno=$turno;
$empleado->fechacreacion=$fechacreacion;
$empleado->foto=$fotonombre;



if(isset($empleado->id) && isset($empleado->nombre) && isset($empleado->apellido)  &&  isset($empleado->mail)&&
isset($empleado->clave) && isset($empleado->perfil)  &&  isset($empleado->turno) &&
isset($empleado->fechacreacion) && isset($empleado->foto))

{

    $pdo = AccesoDatos::connect();
 
    $empleado->ModificarEmpleado();
    echo json_encode($empleado);

}
else
{

    echo 'ocurrio un error';
}


?>