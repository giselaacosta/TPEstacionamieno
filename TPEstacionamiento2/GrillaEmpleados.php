<!DOCTYPE html>
<html>
     <head>
        <title> Ejempos PHP</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
      <div class="container">
            <div class="page-header">
                <h1>Ejemplos de PHP</h1>      
            </div>
            <div class="jumbotron">

          



            </div>
                    <?php
                    require_once("clases/AccesoDatos.php");
                    require_once("clases/Empleado.php");
                        try
                        {

                        
                         $resultado=Empleado::TraerTodoLosEmpleados(); 
                         var_dump($resultado);
                      
                          
                            foreach($resultado as $fila)
                            {
                              //echo "nombre: ".$fila[1];
                              //echo "- perfil: ".$fila[6];
                              echo '<br>'.$fila->mostrarDatos();

                            }

                          
                         
                        } 
                        catch(PDOException $ex)
                        {
                          echo "error ocurrido!"; 
                            echo $ex->getMessage();
                        }
                    ?>

                    <a class="btn btn-info" href="indexPDO.html">Menu principal</a>

                  </div>

    </body>
</html>



