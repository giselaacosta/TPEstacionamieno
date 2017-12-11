<?php
require './clases/AccesoDatos.php';
require './clases/vehiculo.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

$id=$_POST['id'];




if(isset($id) )


{
    $pdo = AccesoDatos::connect();
    $unauto = vehiculo::TraerUnEstacionado($id);
 

	$inicio = $unauto->fechaingreso." ".$unauto->horaingreso;	
    $ahora=date("Y-m-d h:i:s"); 
 

    //$importe=$diferencia*15;
    
    $autosalida=new vehiculo();

    $id =$unauto->id ;
    $patente =$unauto->patente ;
    $fechaingreso=$unauto->fechaingreso;
    $horaingreso=$unauto->horaingreso;
    $fechasalida=date("Y-m-d");
    $horasalida=date("H:i:s");
    $autosalida->id=$id;
    $autosalida->patente=$patente;
    $autosalida->fechaingreso=$fechaingreso;
    $autosalida->horaingreso=$horaingreso;
    $autosalida->fechasalida=$fechasalida;
    $autosalida->horasalida=$horasalida;

    
    $tiempotranscurrido=$autosalida->diff_sinp($fechaingreso,$fechasalida,$horaingreso,$horasalida);
    $cantdias=$autosalida->before ('dias', $tiempotranscurrido);
    $canthoras=$autosalida->after ('dias', $tiempotranscurrido);
    $importe=$autosalida->CalcularImporte($cantdias,$canthoras);


    $autosalida->tiempotranscurrido=$tiempotranscurrido;
    $autosalida->importe=$importe;
   echo json_encode($autosalida,JSON_FORCE_OBJECT);
    
}
else
{

    echo 'ocurrio un error';
}


?>