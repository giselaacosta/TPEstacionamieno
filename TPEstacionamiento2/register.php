<?php
require './clases/AccesoDatos.php';
require './clases/Empleado.php';

$pdo = AccesoDatos::connect();
var_dump($pdo);
//$sql = 'INSERT INTO empleados( nombre,apellido, clave, mail,turno, perfil, fechacreacion, foto) VALUES (:nombre,:apellido,:clave,:mail,:turno,:perfil,:fechacreacion,:foto)';
$sql=$pdo->query("INSERT INTO `empleados`( `nombre`, `apellido`, `clave`, `mail`, `turno`, `perfil`, `fechacreacion`, `foto`) VALUES ('gise','velez','2222','gi@acosta','tarde','admin','abril2016','foto2.jpg')");
//$q=$pdo->prepare(sql);
//$q->execute(array(':nombre'=>$nombre,':apellido'=>$apellido,':clave'=>$clave,':mail'=>$mail,':turno'=>$turno,':perfil'=>$perfil,':fechacreacion'=>$fechacreacion,':foto'=>$foto));
echo 'Agregado';

?>