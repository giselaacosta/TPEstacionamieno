<?php
require './clases/AccesoDatos.php';
require './clases/vehiculo.php';

$id=$_POST['id'];
$patente=$_POST['patente'];
$horaingreso=$_POST['horaingreso'];
$fechaingreso=$_POST['fechaingreso'];
$horasalida=$_POST['horasalida'];
$fechasalida=$_POST['fechasalida'];
$tiempotranscurrido=$_POST['tiempotranscurrido'];
$importe=$_POST['importe'];



$facturado=new vehiculo();
$facturado->id=$id;
$facturado->patente=$patente;
$facturado->horaingreso=$horaingreso;
$facturado->fechaingreso=$fechaingreso;
$facturado->horasalida=$horasalida;

$facturado->fechasalida=$fechasalida;
$facturado->tiempotranscurrido=$tiempotranscurrido;

$facturado->importe=$importe;




if(isset($facturado->id) && isset($facturado->patente) && isset($facturado->horaingreso)  &&  isset($facturado->fechaingreso)&&
isset($facturado->horasalida) && isset($facturado->fechasalida)  &&  isset($facturado->tiempotranscurrido) &&
isset($facturado->importe))

{

    $pdo = AccesoDatos::connect();
 
    $facturado->ModificarFacturado();
}
else
{

    echo 'ocurrio un error';
}


?>