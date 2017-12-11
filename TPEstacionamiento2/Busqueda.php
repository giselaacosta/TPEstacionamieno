<?php
require './clases/AccesoDatos.php';
require './clases/vehiculo.php';

$busqueda=$_POST['search'];




if(isset($id) )


{
    $pdo = AccesoDatos::connect();
    $estacionados = vehiculo::TraerTodoLosEstacionadosPorBusqueda($busqueda);
    
  
    
}
else
{

    echo 'ocurrio un error';
}


?>