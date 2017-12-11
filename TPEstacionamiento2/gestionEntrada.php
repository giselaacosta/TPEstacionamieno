<?php


require './clases/AccesoDatos.php';
require './clases/vehiculo.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');
$patente = $_POST['patente'];
$fechaingreso=date("Y-m-d");


$horaingreso=date("H:i:s");



$unAuto=new vehiculo();

$unAuto->patente=$patente;
$unAuto->fechaingreso=$fechaingreso;


$unAuto->horaingreso=$horaingreso;




if(isset($unAuto->patente) && isset($unAuto->fechaingreso) )


{
    
    $pdo = AccesoDatos::connect();
   
    $unAuto->InsertarEstacionado();
 

}
else
{

    echo 'ocurrio un error';
}







?>
