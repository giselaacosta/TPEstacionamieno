<?php
require './clases/AccesoDatos.php';
require './clases/vehiculo.php';

$id=$_POST['id'];
$patente=$_POST['patente'];
$color=$_POST['color'];
$marca=$_POST['marca'];
$cochera=$_POST['cochera'];
$horaingreso=$_POST['horaingreso'];
$fechaingreso=$_POST['fechaingreso'];
$horasalida=$_POST['horasalida'];
$fechasalida=$_POST['fechasalida'];
$tiempotranscurrido=$_POST['tiempotranscurrido'];
$importe=$_POST['importe'];



$facturado=new vehiculo();
$facturado->id=$id;
$facturado->patente=$patente;
$facturado->color=$color;
$facturado->marca=$marca;
$facturado->cochera=$cochera;
$facturado->horaingreso=$horaingreso;
$facturado->fechaingreso=$fechaingreso;
$facturado->horasalida=$horasalida;

$facturado->fechasalida=$fechasalida;
$facturado->tiempotranscurrido=$tiempotranscurrido;

$facturado->importe=$importe;




if(isset($facturado->id) && isset($facturado->patente)&& isset($facturado->color)&& isset($facturado->marca) && isset($facturado->horaingreso)  &&  isset($facturado->fechaingreso)&&
isset($facturado->horasalida) && isset($facturado->fechasalida)  &&  isset($facturado->tiempotranscurrido) &&
isset($facturado->importe)&&
isset($facturado->cochera))

{

    $pdo = AccesoDatos::connect();
 
    $facturado->ModificarFacturado();
        echo json_encode($facturado);
}
else
{

    echo 'ocurrio un error';
}


?>