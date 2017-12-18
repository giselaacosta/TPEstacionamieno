<?php
require './clases/AccesoDatos.php';
require './clases/vehiculo.php';
require './clases/Cochera.php';

$id=$_POST['id'];
$fechasalida=$_POST['fechasalida'];
$horasalida=$_POST['horasalida'];
$tiempotranscurrido=$_POST['tiempotranscurrido'];
$importe=$_POST['importe'];
$cochera=$_POST['cochera'];
$unacochera=new Cochera();

$unacochera->id=$cochera;


if(isset($id) )


{
    $pdo = AccesoDatos::connect();
    $unestacionado = vehiculo::TraerUnEstacionado($id);

    $unestacionado->fechasalida=$fechasalida;
    $unestacionado->horasalida=$horasalida;
    $unestacionado->tiempotranscurrido=$tiempotranscurrido;
    $unestacionado->importe=$importe;
    $unestacionado->cochera=$cochera;

    $unestacionado->InsertarFacturado();
    $unacochera->LiberarCochera($cochera);
    echo json_encode($unestacionado,JSON_FORCE_OBJECT);
    $unestacionado->BorrarEstacionado();
}
else
{

    echo 'ocurrio un error';
}


?>