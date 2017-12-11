<?php
require './clases/AccesoDatos.php';
require './clases/vehiculo.php';

$id=$_POST['id'];




if(isset($id) )


{
    $pdo = AccesoDatos::connect();
    $unfacturado = vehiculo::TraerUnFacturado($id);
    $unfacturado->BorrarFacturado();
}
else
{

    echo 'ocurrio un error';
}


?>