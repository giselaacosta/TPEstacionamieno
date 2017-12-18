<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/Empleado.php");
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Estacionamiento</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
   
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <link href="css/fondoLogin.css" rel="stylesheet">
    <style>
      .container{margin-top:100px}
    </style>
      <script src="./Persona.js"></script>
      <script src="./Usuario.js"></script>
       <script src="./funciones.js"></script>
       <script src="./node_modules\jquery\dist/jquery.min.js"></script>
      <script type= text/javascript >
      function Usuarionoexiste() {

        alert("usuario no existe en registro,ingrese nuevamente!");
        location.href ="login.html";
       
}
function Usuarioexiste() {
   
        alert("los datos se guardaron correctamente!");
    
       
}
      </script> 
      
  </head>
  <body>
</body>
</html>

<?php
$email = $_POST['email'];
$pass = $_POST['clave'];
$recordar=$_POST["checkbox"];

$existe=false;
$resultado=Empleado::TraerTodoLosEmpleados(); 
foreach($resultado as $fila)
{


  if($fila->GetMail()==$email && $fila->GetClave()==$pass )
  {

   
    if($fila->GetPerfil()=="admin"){
        header('Location: indexAdmin.php');
        
     
    }
    else
    {
        header('Location: indexUser.php');

    }
    $existe=true;
  }
  else
  {
  continue;
  }

}
if($existe==true && isset($recordar))
{

  echo "<script>";
  echo "Usuarioexiste();";
  echo "</script>";
}
if($existe==false)
{

    echo "<script>";
    echo "Usuarionoexiste();";
    echo "</script>";
  
}

?>


