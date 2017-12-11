<?php
require './clases/AccesoDatos.php';
require './clases/vehiculo.php';

$id=$_POST['id'];




if(isset($id) )


{
    $pdo = AccesoDatos::connect();
    $unfacturado = vehiculo::TraerUnFacturado($id);
    
   echo json_encode($unfacturado,JSON_FORCE_OBJECT);
    
}
else
{

    echo 'ocurrio un error';
}


?>