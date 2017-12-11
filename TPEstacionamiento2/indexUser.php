<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Estacionamiento Administracion</title>
        <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/fondoAdmin.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/animacion.css" rel="stylesheet">
          <script src="./Persona.js"></script>
          <script src="./Usuario.js"></script>
          <script src="./Empleado.js"></script>
           <script src="./funciones.js"></script>
           
           <script src="./node_modules\jquery\dist/jquery.min.js"></script>
           <script src="./js/ajax.js"></script>
           <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
           <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.6.css" />
<style>
.error {
  color:red;
}
  .container
  {
    margin-top:100px;
  }
  

</style>

<script type="text/javascript" src="./js/jquery-ui-1.8.6.min.js"></script>

<script src="./js/runonload.js"></script>
       


<script type="text/javascript">



function Modal()
{
    jQuery('#modal').modal('show');

}


$(document).ready(function() {

  $('.error').hide();
  
  $('.navbar-brand').click(function(){
      document.getElementById("grilladeempleados").className ="oculto";
      document.getElementById("grilladeestacionados").className ="oculto";
        
    });  

	

 
    

    $('#sacar-btn').click(function(){
    
    
    
       var id = document.getElementById("idsalida").value;
       var fechasalida = document.getElementById("fechasalida").value;
       var horasalida = document.getElementById("horasalida").value;
       var tiempotranscurrido = document.getElementById("tiempotranscurrido").value;
       var importe = document.getElementById("importe").value;
        var dataString = 'id=' + id + '&fechasalida=' + fechasalida + '&horasalida=' + horasalida + '&tiempotranscurrido=' + tiempotranscurrido + '&importe=' + importe;
;
  
        $.ajax({
            type: "POST",
            url: "estacionadobaja.php",
            data: dataString,
         
      })

        .done(function(resultado) {
      
      localStorage.setItem("fact",resultado),
      $('#modal3').html("<div id='message'></div>");
              $('#message').html("<h2>Se ha eliminado correctamente!</h2>")
              .hide()
              .fadeIn(1500, function() {
               
            window.location.reload(true);
      })
      .fail(function(){
        alert(resultado);
        alert('Error al eliminar auto.')
        
      })     


})

   
    });
    
    
    $('#botonIngreso').click(function(){
    
      var service =  document.getElementById("patente").value;
       var dataString = 'patente=' + service ;
     
        $.ajax({
            type: "POST",
            url: "gestionEntrada.php",
            data: dataString
         
      })
      .done(function(resultado) {
      

      $('#altaestacionado').html("<div id='message'></div>");
              $('#message').html("<h2>Se ha agregado correctamente!</h2>")
              .hide()
              .fadeIn(1500, function() {
               
            window.location.reload(true);
      })
      .fail(function(){
        alert('Error al ingresar auto.')
        
      })     


})
   
});   
    
$('#botonBusqueda').click(function(){
    
      var service =  document.getElementById("search").value;
       var dataString = 'busqueda=' + service ;
       
        $.ajax({
            type: "POST",
            url: "Busqueda.php",
            data: dataString
         
      })
      .done(function(resultado) {
      

      $('#busqueda').html("<div id='message'></div>");
              $('#message').html("<h2>Los resultados son:</h2>")
              .hide()
              .fadeIn(1500, function() {
               
           
      })
      .fail(function(){
        alert('No se encuentran registros.')
        
      })     


})
   
});   
    


   
    $('.facturados').click(function(){
      document.getElementById("listafacturados").className ="visible";  

      document.getElementById("altaestacionado").className ="oculto";  
      document.getElementById("grilladeestacionados").className ="oculto";  
      document.getElementById("listaprecios").className ="oculto";  
    });  

       
 
   
    $('.altaestacionado').click(function(){
   
      document.getElementById("altaestacionado").className ="visible";
      document.getElementById("grilladeestacionados").className ="oculto";
      document.getElementById("listaprecios").className ="oculto";
      document.getElementById("listafacturados").className ="oculto";  
    });  



  $('.grillaestacionados').click(function(){
      document.getElementById("grilladeestacionados").className ="visible";
    
      document.getElementById("altaestacionado").className ="oculto";  
      document.getElementById("listaprecios").className ="oculto";  
      
      document.getElementById("listafacturados").className ="oculto";  
    });
    

    $('.Listaprecios').click(function(){
      document.getElementById("grilladeestacionados").className ="oculto";

      document.getElementById("altaestacionado").className ="oculto";  
      document.getElementById("listaprecios").className ="visible"; 
            
      document.getElementById("listafacturados").className ="oculto";   
    });
    $('.sacar').click(function(){
    

      jQuery('#modal3').modal('show');
       var service = $(this).attr('id');

        var dataString = 'id=' + service ;
        var estacionadoaretirar;
        var myArr;
        $.ajax({
            type: "POST",
            url: "estacionadobusqueda.php",
            data: dataString
         
      })
      .done(function(resultado) {
     
      
      localStorage.setItem("estacionadoaretirar",resultado),
      estacionadoaretirar=localStorage.getItem("estacionadoaretirar"),  
      myArr = JSON.parse(estacionadoaretirar), 
      document.getElementById("idsalida").value =myArr.id,
      document.getElementById("patenteasalir").value =myArr.patente,
      document.getElementById("fechaingreso").value =myArr.fechaingreso,
      document.getElementById("horaingreso").value =myArr.horaingreso,
      document.getElementById("fechasalida").value =myArr.fechasalida,
      document.getElementById("horasalida").value =myArr.horasalida,
      document.getElementById("tiempotranscurrido").value =myArr.tiempotranscurrido,
      document.getElementById("importe").value =myArr.importe
      })
      .fail(function(){

        alert('Hubo un error')
      })     




});

runOnLoad(function(){
	$("input#nombre").select().focus();
});

});
</script>
    </head>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top container-fluid" role="navigation">
            <div >
                <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Estacionamiento</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav  clear navbar-right ">
                          
                            <li><a class="grillaestacionados" href="#">Estacionados</a></li>
                            <li><a class="altaestacionado" href="#">Alta estacionado</a></li>
                            <li><a class="facturados" href="#">Facturados</a></li>
                            <li><a class="Listaprecios" href="#">Lista de precios</a></li>
            
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
<div class="container" id="busqueda">
	<div class="row">
        <div class="col-md-2">
    		<h2>Buscar Estacionado</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" name="search" id="search" class="form-control input-lg" placeholder="Buscar" />
                    <span class="input-group-btn">
                        <button id="botonBusqueda" class="btn btn-info btn-lg" type="button" >
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
  </div>
  


        <div class="container">

        <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">   
        <div id="altaestacionado" class="oculto">
        

          <div class="panel panel-default">
        
            
            
            <form action="" method="post" >
         
           <label class="panel-title">Ingrese Patente</label>
            <input type="text" onkeydown="MostrarBoton(this)" name="patente" title="formato de patente: AAA 666" id="patente" required pattern="[a-z]{3}[0-9]{3}" />
            <br>
            <input type="button" id="botonIngreso" class="MiBotonUTN" value="ingreso"  name="estacionar" />
            <br/>
            
          </form>


            </div>
        </div>
      </div>
      </div>

      </div>

 
      </div>
                

           
     
     
       
         <div id="grilladeestacionados" class="oculto">

         <div class="follow_container">

  
             
                    <div id="contenido" >
                        
                        
                       
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Lista de Estacionados</h3>
                            </div>
                            <div id="empleados_form">
                            <div class="panel-body">
                                <table class="table table-striped">
                                <thead>
                                <th>#</th>
                                <th>ID</th>
                                <th>Patente</th>
                                <th>Fecha Ingreso</th>
                                <th>Hora Ingreso</th>
                                
                               
                                 </thead>
                                    <tbody>
                                        <?php
                                        require './clases/AccesoDatos.php';
                                        require './clases/vehiculo.php';
                                        $pdo = AccesoDatos::connect();
                                       
                                        $sql = 'SELECT * FROM estacionados';
                                        $con = 1;
                                        
                                        foreach ($pdo->query($sql) as $row) {
                                            echo "<tr>";
                                           
                                            echo '<td>' . $con . '</td>';
                                            echo '<td>' . $row['id'] . '</td>';
                                         
                                            echo '<td>' . $row['patente'] . '</td>';
                                            echo '<td>' . $row['fechaingreso'] . '</td>';
                                            echo '<td>' . $row['horaingreso'] . '</td>';
                                           
                                        
                                
                                            $unAuto = vehiculo::TraerUnEstacionado($row['id']);
                                            $id=$row['id'];
                                            $stringdatos=$unAuto->mostrarDatos();
                                            
                                            
                                            echo '
                                            <td><img src="auto.png"  width="50" height="50" /><a  class="sacar" id="'.$row['id'] .'"  href="#"  >Se retira</a></td>';
                                         
                                             
                                            echo '</tr>';
                                            $con++;
                                        }
                                    
                                        ?>
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                    <div id="result">
                    </div>
              
                    </div>
                    </div>

            </div>
              
                 
</div>
<div id="listafacturados" class="oculto">
            
         <div class="follow_container">
             
                    <div id="contenido" >
                        
                        
                       
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Facturados</h3>
                            </div>
                            <div id="empleados_form">
                            <div class="panel-body">
                                <table class="table table-striped">
                                <thead>
                                <th>#</th>
                                <th>ID</th>
                                <th>Patente</th>
                                <th>Fecha Ingreso</th>
                                <th>Hora Ingreso</th>
                                <th>Fecha Salida</th>
                                <th>Hora Salida</th>
                                <th>Tiempo Transcurrido</th>
                                <th>Importe $</th>
         
                                 </thead>
                                    <tbody>
                                        <?php
                                        //require './clases/AccesoDatos.php';
                                       // require './clases/vehiculo.php';
                                        $pdo = AccesoDatos::connect();
                                       
                                        $sql = 'SELECT * FROM facturados';
                                        $con = 1;
                                        
                                        foreach ($pdo->query($sql) as $row) {
                                            echo "<tr>";
                                           
                                            echo '<td>' . $con . '</td>';
                                            echo '<td>' . $row['id'] . '</td>';
                                         
                                            echo '<td>' . $row['patente'] . '</td>';
                                            echo '<td>' . $row['fechaingreso'] . '</td>';
                                            echo '<td>' . $row['horaingreso'] . '</td>';
                                            echo '<td>' . $row['fechasalida'] . '</td>';
                                            echo '<td>' . $row['horasalida'] . '</td>';
                                            echo '<td>' . $row['tiempotranscurrido'] . '</td>';
                                            echo '<td>' . $row['importe'] . '</td>';
                                        
                                
                                            $unAuto = vehiculo::TraerUnFacturado($row['id']);
                                            $id=$row['id'];
                                            $stringdatos=$unAuto->mostrarDatos();
                                            
                                        
                                            $con++;
                                        }
                                    
                                        ?>
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                    <div id="result">
                    </div>
              
                    </div>
                    </div>

            </div>
              
                 
</div>
               

              
              

 

    
        <div id="listaprecios" class="oculto">
        

        <div class="container">
        <h2>Lista de Precios</h2>
        <ul class="list-group">
        
          <li class="list-group-item">Precio por hora: $70</li>
          <li class="list-group-item">Precio por dia:  $590</li>
         </ul>
      </div>

      </div>

 
    
                
    

        <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Detalle de estadia</h4>
                          </div>
                          <div id="edit_form">
                          <form role="form" name="register" method="post" action="" >
                          <fieldset disabled>
                            <div class="col-xs-6">
                            
                               
                                <input name="id" id="idsalida" value="" class="form-control" style="visibility:hidden" >
                            
                              <div class="form-group">
                              <label>Patente</label>
                                <input name="patente" id="patenteasalir" value="" class="form-control" >
                               
                              </div>
               
                              <div class="form-group">
                                <label>Fecha Ingreso</label>
                                <input name="fechaingreso" id="fechaingreso" value="" class="form-control" >
                          
                              </div>
              
                              <div class="form-group">
                              <label>Hora Ingreso</label>
                              <input name="horaingreso" id="horaingreso" value="" class="form-control" >
                        
                            </div>
              
                              <div class="form-group">
                                <label>Fecha Salida</label>
                                <input name="fechasalida"  id="fechasalida" value="" class="form-control">
                                
                              </div>
                             
                              <div class="form-group">
                                <label>Hora Salida</label>
                                <input name="horasalida" id="horasalida"  value="" class="form-control" >
                               
                              </div>
                              <div class="form-group">
                                <label>Tiempo Transcurrido</label>
                                <input name="tiempotranscurrido"  id="tiempotranscurrido" value=""class="form-control" >
                                
                              </div>
                              <div class="form-group">
                                <label>Importe  $$ </label>
                                <input name="importe"  id="importe" value=""class="form-control" >
                                
                              </div>
                              </fieldset>
              
                              <div class="form-group">
              
              
              
              
                              <button type="submit"   class="btn btn-info btn-lg" id="sacar-btn" >
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Cobrar
                              </button>
              
                            </div>
                          </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i>x</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
         
          
    


    

    </body>
</html>