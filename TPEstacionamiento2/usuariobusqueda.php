<?php
require './clases/AccesoDatos.php';
require './clases/Empleado.php';

$id=$_POST['id'];




if(isset($id) )


{
    $pdo = AccesoDatos::connect();
    $unempleado = Empleado::TraerUnEmpleado($id);
    
   echo json_encode($unempleado,JSON_FORCE_OBJECT);
    
}
else
{

    echo 'ocurrio un error';
}


?>