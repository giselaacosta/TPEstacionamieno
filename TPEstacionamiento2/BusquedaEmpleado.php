<?php
require './clases/AccesoDatos.php';
require './clases/Empleado.php';



$busqueda=$_POST['buscar'];




if(isset($busqueda) )


{
    $pdo = AccesoDatos::connect();
    $empleados = Empleado::TraerTodoLosEmpleadosPorBusqueda($busqueda);

   // return $estacionados;
    echo json_encode($empleados,JSON_FORCE_OBJECT);
 
    
}
else
{

    echo 'No hay resultados';
}


?>