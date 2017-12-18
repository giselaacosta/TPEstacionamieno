<?php


require './clases/AccesoDatos.php';
require './clases/vehiculo.php';
require './clases/Cochera.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');
$patente = $_POST['patente'];
$color = $_POST['color'];
$marca = $_POST['marca'];
$cochera = $_POST['cocheraseleccionada'];
$fechaingreso=date("Y-m-d");


$horaingreso=date("H:i:s");



$unAuto=new vehiculo();
$unacochera=new Cochera();
$unAuto->patente=$patente;
$unAuto->fechaingreso=$fechaingreso;


$unAuto->horaingreso=$horaingreso;


$unAuto->marca=$marca;
$unAuto->color=$color;
$unAuto->cochera=$cochera;
$unacochera->id=$cochera;
if(isset($unAuto->patente) && isset($unAuto->fechaingreso) )


{
    
    $pdo = AccesoDatos::connect();
   
    $unAuto->InsertarEstacionado();
    $unacochera->OcuparCochera($cochera);
    echo "Se registró con exito";
    header("location:indexAdmin.php");

}
else
{

    echo "ocurrio un error";
}







?>
