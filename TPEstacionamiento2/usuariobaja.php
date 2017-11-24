<?php
require './clases/AccesoDatos.php';
require './clases/Empleado.php';

$id=$_POST['id'];




if(isset($id) )


{
    $pdo = AccesoDatos::connect();
    $unempleado = Empleado::TraerUnEmpleado($id);
    $unempleado->BorrarEmpleado();
}
else
{

    echo 'ocurrio un error';
}


?>