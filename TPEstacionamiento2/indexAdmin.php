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

	$("#enviar-btn").click(function() {
    var logueos = localStorage.getItem("empleados");
    arrayusuarios = JSON.parse(logueos);
		//Obtenemos el valor del campo nombre
    var nombre = $("input#nombre").val();
    var apellido = $("input#apellido").val();
    var correo = $("input#correo").val();
    var clave = $("input#clave").val();
		var perfil = $("input#perfil").val();
   	var turno = $("input#turno").val();
	var fechacreacion = $("input#fechacreacion").val();

		var foto = $("input#foto").val();
  
    var tipo = "emp";
    var empleado = new personas.Empleado(tipo,nombre,apellido,correo,clave,perfil,turno,fechacreacion,foto);
    console.log(empleado);
    if (arrayusuarios === null) {
        arrayusuarios = new Array();
        arrayusuarios.push(empleado);
    }
    else {
        arrayusuarios.push(empleado);
    }
    localStorage.setItem("empleados", JSON.stringify(arrayusuarios));


		var nombre = $("input#nombre").val();

		//Validamos el campo nombre, simplemente miramos que no esté vacío
		if (nombre == "") {
			$("label#name_error").show();
			$("input#nombre").focus();
			return false;
		}

		//Obtenemos el valor del campo password
		var apellido = $("input#apellido").val();

		//Validamos el campo password, simplemente miramos que no esté vacío
		if (apellido == "") {
			$("label#apell_error").show();
			$("input#apellido").focus();
			return false;
		}

        	//Obtenemos el valor del campo nombre
		var correo = $("input#correo").val();

		//Validamos el campo nombre, simplemente miramos que no esté vacío
		if (correo == "") {
			$("label#correo_error").show();
			$("input#correo").focus();
			return false;
		}

		//Obtenemos el valor del campo password
		var clave = $("input#clave").val();

		//Validamos el campo password, simplemente miramos que no esté vacío
		if (clave == "") {
			$("label#clave_error").show();
			$("input#clave").focus();
			return false;
        }
        
        	//Obtenemos el valor del campo nombre
		var perfil = $("input#perfil").val();

		//Validamos el campo nombre, simplemente miramos que no esté vacío
		if (perfil == "") {
			$("label#perfil_error").show();
			$("input#perfil").focus();
			return false;
		}

		//Obtenemos el valor del campo password
		var turno = $("input#turno").val();

		//Validamos el campo password, simplemente miramos que no esté vacío
		if (turno == "") {
			$("label#turno_error").show();
			$("input#turno").focus();
			return false;
        }
        

        	//Obtenemos el valor del campo nombre
		var fechacreacion = $("input#fechacreacion").val();

		//Validamos el campo nombre, simplemente miramos que no esté vacío
		if (nombre == "") {
			$("label#fecha_error").show();
			$("input#fechacreacion").focus();
			return false;
		}

		//Obtenemos el valor del campo password
		var foto = $("input#foto").val();

		//Validamos el campo password, simplemente miramos que no esté vacío
		if (foto == "") {
			$("label#foto_error").show();
            $("input#foto").focus();
			return false;
		}
		//Construimos la variable que se guardará en el data del Ajax para pasar al archivo php que procesará los datos
		var dataString = 'nombre=' + nombre + '&apellido=' + apellido + '&correo=' + correo + '&clave=' + clave + '&perfil=' + perfil + '&turno=' + turno + '&fechacreacion=' + fechacreacion + '&foto=' + foto;

		$.ajax({
			type: "POST",
			url: "usuarioalta.php",
			data: dataString,
			success: function() {
		    	$('#register_form').html("<div id='message'></div>");
		        $('#message').html("<h2>Tus datos han sido guardados correctamente!</h2>")
		        .hide()
		        .fadeIn(1500, function() {
					window.location.reload(true);
		        });
		    }
		});
		return false;
  });
  
  $('.delete').click(function(){
    

    
       var service = $(this).attr('id');

        var dataString = 'id=' + service ;

        $.ajax({
            type: "POST",
            url: "usuariobaja.php",
            data: dataString,
         
          	success: function() {
              $('#empleados_form').html("<div id='message'></div>");
                $('#message').html("<h2>Se ha eliminado correctamente!</h2>")
                .hide()
                .fadeIn(1500, function() {
              window.location.reload(true);
             
                });
            }
        });
        
        
    });   


    $('.deletefacturado').click(function(){
    

    
       var service = $(this).attr('id');

        var dataString = 'id=' + service ;

        $.ajax({
            type: "POST",
            url: "facturadobaja.php",
            data: dataString,
         
          	success: function() {
              $('#empleados_form').html("<div id='message'></div>");
                $('#message').html("<h2>Se ha eliminado correctamente!</h2>")
                .hide()
                .fadeIn(1500, function() {
              window.location.reload(true);
             
                });
            }
        });
        
        
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
    
    
    $('.grillaempleados').click(function(){
      document.getElementById("grilladeempleados").className ="visible";
      document.getElementById("altaestacionado").className ="oculto";  
      document.getElementById("grilladeestacionados").className ="oculto";  
      document.getElementById("listaprecios").className ="oculto";  
      document.getElementById("listafacturados").className ="oculto";  
    });  

   
    $('.facturados').click(function(){
      document.getElementById("listafacturados").className ="visible";  
      document.getElementById("grilladeempleados").className ="oculto";
      document.getElementById("altaestacionado").className ="oculto";  
      document.getElementById("grilladeestacionados").className ="oculto";  
      document.getElementById("listaprecios").className ="oculto";  
    });  

       
 
   
    $('.altaestacionado').click(function(){
      document.getElementById("grilladeempleados").className ="oculto";
      document.getElementById("altaestacionado").className ="visible";
      document.getElementById("grilladeestacionados").className ="oculto";
      document.getElementById("listaprecios").className ="oculto";
      document.getElementById("listafacturados").className ="oculto";  
    });  
    $('.edit').click(function(){
    

      jQuery('#modal2').modal('show');
       var service = $(this).attr('id');

        var dataString = 'id=' + service ;
        var usuarioamodif;
        var myArr;
        $.ajax({
            type: "POST",
            url: "usuariobusqueda.php",
            data: dataString
         
      })
      .done(function(resultado) {
      
      localStorage.setItem("usuarioamodificar",resultado),
      usuarioamodif=localStorage.getItem("usuarioamodificar"),  
      myArr = JSON.parse(usuarioamodif) , 
      document.getElementById("idamodif").value =myArr.id,
      document.getElementById("nombremodif").value =myArr.nombre,
      document.getElementById("apellidomodif").value =myArr.apellido,
      document.getElementById("correomodif").value =myArr.mail,
      document.getElementById("clavemodif").value =myArr.clave,
      document.getElementById("perfilmodif").value =myArr.perfil,
      document.getElementById("turnomodif").value =myArr.turno,
      document.getElementById("fechacreacionmodif").value =myArr.fechacreacion,
      document.getElementById("fotomodif").value =myArr.foto
      })
      .fail(function(){

        alert('Hubo un error')
      })     


});


$('.editfacturado').click(function(){
    

      jQuery('#modal4').modal('show');
       var service = $(this).attr('id');

        var dataString = 'id=' + service ;
        var usuarioamodif;
        var myArr;
        $.ajax({
            type: "POST",
            url: "facturadobusqueda.php",
            data: dataString
         
      })
      .done(function(resultado) {
      
      localStorage.setItem("facturadoamodificar",resultado),
      facturadoamodif=localStorage.getItem("facturadoamodificar"),  
      myArr = JSON.parse(facturadoamodif) , 
      document.getElementById("idamodificarfact").value =myArr.id,
      document.getElementById("patentemodif").value =myArr.patente,
      document.getElementById("horaingresomodif").value =myArr.horaingreso,
      document.getElementById("fechaingresomodif").value =myArr.fechaingreso,
      document.getElementById("horasalidamodif").value =myArr.horasalida,
      document.getElementById("fechasalidamodif").value =myArr.fechasalida,
      document.getElementById("tiempotranscurridomodif").value =myArr.tiempotranscurrido,
      document.getElementById("importemodif").value =myArr.importe
   
      })
      .fail(function(){

        alert('Hubo un error')
      })     


});


$("#editarfacturado-btn").click(function() {
   

    var id = $("input#idamodificarfact").val();
    var patente = $("input#patentemodif").val();
    var horaingreso = $("input#horaingresomodif").val();
    var fechaingreso = $("input#fechaingresomodif").val();
    var horasalida = $("input#horasalidamodif").val();
		var fechasalida = $("input#fechasalidamodif").val();
   	var tiempotranscurrido = $("input#tiempotranscurridomodif").val();
	var importe = $("input#importemodif").val();

  
		var dataString ='id=' + id + '&patente=' + patente + '&horaingreso=' + horaingreso + '&fechaingreso=' + fechaingreso + '&horasalida=' + horasalida + '&fechasalida=' + fechasalida + '&tiempotranscurrido=' + tiempotranscurrido + '&importe=' + importe;
 alert(dataString);
		$.ajax({
			type: "POST",
			url: "facturadoeditar.php",
			data: dataString,
			success: function() {
		    	$('#edit_form').html("<div id='message'></div>");
		        $('#message').html("<h2>Los datos han sido modificados correctamente!</h2>")
		        .hide()
		        .fadeIn(1500, function() {
					window.location.reload(true);
        
		        });
		    }
		});
		return false;
  });

 

$("#editar-btn").click(function() {
    var logueos = localStorage.getItem("empleados");
    arrayusuarios = JSON.parse(logueos);

    var id = $("input#idamodif").val();
    var nombre = $("input#nombremodif").val();
    var apellido = $("input#apellidomodif").val();
    var correo = $("input#correomodif").val();
    var clave = $("input#clavemodif").val();
		var perfil = $("input#perfilmodif").val();
   	var turno = $("input#turnomodif").val();
	var fechacreacion = $("input#fechacreacionmodif").val();

		var foto = $("input#fotomodif").val();
  
    var tipo = "emp";
    var empleado = new personas.Empleado(tipo,nombre,apellido,correo,clave,perfil,turno,fechacreacion,foto);
    console.log(empleado);
    if (arrayusuarios === null) {
        arrayusuarios = new Array();
        arrayusuarios.push(empleado);
    }
    else {
        arrayusuarios.push(empleado);
    }
    localStorage.setItem("empleados", JSON.stringify(arrayusuarios));


		var nombre = $("input#nombremodif").val();

		//Validamos el campo nombre, simplemente miramos que no esté vacío
		if (nombre == "") {
			$("label#name_error").show();
			$("input#nombremodif").focus();
			return false;
		}

		//Obtenemos el valor del campo password
		var apellido = $("input#apellidomodif").val();

		//Validamos el campo password, simplemente miramos que no esté vacío
		if (apellido == "") {
			$("label#apell_error").show();
			$("input#apellidomodif").focus();
			return false;
		}

        	//Obtenemos el valor del campo nombre
		var correo = $("input#correomodif").val();

		//Validamos el campo nombre, simplemente miramos que no esté vacío
		if (correo == "") {
			$("label#correo_error").show();
			$("input#correomodif").focus();
			return false;
		}

		//Obtenemos el valor del campo password
		var clave = $("input#clavemodif").val();

		//Validamos el campo password, simplemente miramos que no esté vacío
		if (clave == "") {
			$("label#clave_error").show();
			$("input#clavemodif").focus();
			return false;
        }
        
        	//Obtenemos el valor del campo nombre
		var perfil = $("input#perfilmodif").val();

		//Validamos el campo nombre, simplemente miramos que no esté vacío
		if (perfil == "") {
			$("label#perfil_error").show();
			$("input#perfilmodif").focus();
			return false;
		}

		//Obtenemos el valor del campo password
		var turno = $("input#turnomodif").val();

		//Validamos el campo password, simplemente miramos que no esté vacío
		if (turno == "") {
			$("label#turno_error").show();
			$("input#turnomodif").focus();
			return false;
        }
        

        	//Obtenemos el valor del campo nombre
		var fechacreacion = $("input#fechacreacionmodif").val();

		//Validamos el campo nombre, simplemente miramos que no esté vacío
		if (nombre == "") {
			$("label#fecha_error").show();
			$("input#fechacreacionmodif").focus();
			return false;
		}

		//Obtenemos el valor del campo password
		var foto = $("input#fotomodif").val();

		//Validamos el campo password, simplemente miramos que no esté vacío
		if (foto == "") {
			$("label#foto_error").show();
            $("input#fotomodif").focus();
			return false;
		}
		//Construimos la variable que se guardará en el data del Ajax para pasar al archivo php que procesará los datos
		var dataString ='id=' + id + '&nombre=' + nombre + '&apellido=' + apellido + '&correo=' + correo + '&clave=' + clave + '&perfil=' + perfil + '&turno=' + turno + '&fechacreacion=' + fechacreacion + '&foto=' + foto;

		$.ajax({
			type: "POST",
			url: "usuarioeditar.php",
			data: dataString,
			success: function() {
		    	$('#edit_form').html("<div id='message'></div>");
		        $('#message').html("<h2>Tus datos han sido modificados correctamente!</h2>")
		        .hide()
		        .fadeIn(1500, function() {
					window.location.reload(true);
        
		        });
		    }
		});
		return false;
  });


  $('.grillaestacionados').click(function(){
      document.getElementById("grilladeestacionados").className ="visible";
      document.getElementById("grilladeempleados").className ="oculto";
      document.getElementById("altaestacionado").className ="oculto";  
      document.getElementById("listaprecios").className ="oculto";  
      
      document.getElementById("listafacturados").className ="oculto";  
    });
    

    $('.Listaprecios').click(function(){
      document.getElementById("grilladeestacionados").className ="oculto";
      document.getElementById("grilladeempleados").className ="oculto";
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
                            <li><a  class="grillaempleados" href="#">Alta de Empleados</a></li>
                            <li><a class="grillaestacionados" href="#">Estacionados</a></li>
                            <li><a class="altaestacionado" href="#">Alta estacionado</a></li>
                            <li><a class="facturados" href="#">Facturados</a></li>
                            <li><a class="Listaprecios" href="#">Lista de precios</a></li>
            
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>

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
                
      <div id="grilladeempleados" class="oculto">
            <div class="follow_container">
             
                    <div id="contenido" >
                        
                        
                       
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Lista de Usuarios</h3>
                            </div>
                            <div id="empleados_form">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                    <th>#</th>
                                    <th>ID Usuario</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Clave</th>
                                    <th>Email</th>
                                    <th>Turno</th>
                                    <th>Perfil</th>
                                    <th>Fecha de Creacion</th>
                                    <th>Foto</th>
                                    <th>Accion</th>
                                              
                                    </thead>
                                    <tbody>
                                        <?php
                                        require './clases/AccesoDatos.php';
                                        require './clases/Empleado.php';
                                        $pdo = AccesoDatos::connect();
                                       
                                        $sql = 'SELECT * FROM empleados';
                                        $con = 1;
                                        
                                        foreach ($pdo->query($sql) as $row) {
                                            echo "<tr>";
                                           
                                            echo '<td>' . $con . '</td>';
                                            echo '<td>' . $row['id'] . '</td>';
                                         
                                            echo '<td>' . $row['nombre'] . '</td>';
                                            echo '<td>' . $row['apellido'] . '</td>';
                                            echo '<td>' . $row['clave'] . '</td>';
                                            echo '<td>' . $row['mail'] . '</td>';
                                            echo '<td>' . $row['turno'] . '</td>';
                                            echo '<td>' . $row['perfil'] . '</td>';
                                            echo '<td>' . $row['fechacreacion'] . '</td>';
                                            echo '<td>' . $row['foto'] . '</td>';
                                            $unempleado = Empleado::TraerUnEmpleado($row['id']);
                                            $id=$row['id'];
                                            $stringdatos=$unempleado->mostrarDatos();
                                            
                                            
                                            echo '
                                            <td><img src="edit.png" /><a  class="edit" id="'.$row['id'] .'"  href="#"  >Editar</a></td>';
                                            echo '
                                            <td><img src="delete.png" /><a  class="delete" id="'.$row['id'] .'"  href="#"  >Borrar</a></td>';
                  
                                             
                                            echo '</tr>';
                                            $con++;
                                        }
                                    
                                        ?>
                                    </tbody>
                                </table>
                                <input id="btn_usuarios" onclick="Modal()"; type="button" class="btn btn-primary" value="Nuevo Empleado"/><br/><br/>
                            </div>
                        </div>
                    </div>
                    <div id="result">
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
                                        //require './clases/AccesoDatos.php';
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
                                <th>Accion</th>
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
                                            
                                            echo '
                                            <td><img src="edit.png" /><a  class="editfacturado" id="'.$row['id'] .'"  href="#"  >Editar</a></td>';
                                            echo '
                                            <td><img src="delete.png" /><a  class="deletefacturado" id="'.$row['id'] .'"  href="#"  >Borrar</a></td>';
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
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Nuevo Usuario</h4>
                          </div>
                          <div id="register_form">
                          <form role="form" name="register" method="post" action="" >
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label>Nombre</label>
                                <input name="nombre" id="nombre" value="" class="form-control" >
                                <label class="error" for="name" id="name_error">Debe introducir su nombre.</label><br><br>
                              </div>
              
                              <div class="form-group">
                                <label>Apellido</label>
                                <input name="apellido" id="apellido" value="" class="form-control" >
                                <label class="error" for="apellido" id="apell_error">Debe introducir su apellido.</label><br><br>
                              </div>
              
                              <div class="form-group">
                                <label>Correo</label>
                                <input name="correo" id="correo"value="" class="form-control">
                                <label class="error" for="correo" id="correo_error">Debe introducir su correo.</label><br><br>
                              </div>
              
                              <div class="form-group">
                                <label>Contraseña</label>
                                <input name="clave"  id="clave" value="" class="form-control">
                                <label class="error" for="clave" id="clave_error">Debe introducir su contraseña.</label><br><br>
                              </div>
                             
                              <div class="form-group">
                                <label>Perfil</label>
                                <input name="perfil" id="perfil"  value="" class="form-control" >
                                <label class="error" for="perfil" id="perfil_error">Debe introducir su perfil.</label><br><br>
                              </div>
              
                              <div class="form-group">
                                <label>Turno</label>
                                <input name="turno"  id="turno" value=""class="form-control" >
                                <label class="error" for="turno" id="turno_error">Debe introducir su turno.</label><br><br>
                              </div>
              
              
                              <div class="form-group">
                                <label>Fecha de creacion</label>
                                <input name="fechacreacion" id="fechacreacion" value="" class="form-control" >
                                <label class="error" for="fecha" id="fecha_error">Debe introducir su fecha.</label><br><br>
                              </div>
              
              
                              <div class="form-group">
                                <label>Foto</label>
                                <input name="foto" id="foto" value="" class="form-control" >
                                <label class="error" for="foto" id="foto_error">Debe introducir su nombre.</label><br><br>
                              </div>
              
              
                              <button type="submit"   class="btn btn-info btn-lg" id="enviar-btn" >
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Registrar
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
              


              
              
                    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Modificar Usuario</h4>
                          </div>
                          <div id="edit_form">
                          <form role="form" name="register" method="post" action="" >
                            <div class="col-lg-12">
                            
                               
                                <input name="id" id="idamodif" value="" class="form-control" style="visibility:hidden" >
                            
                              <div class="form-group">
                              <label>Nombre</label>
                                <input name="nombre" id="nombremodif" value="" class="form-control" >
                                <label class="error" for="name" id="name_error">Debe introducir su nombre.</label><br><br>
                              </div>
               
                              <div class="form-group">
                                <label>Apellido</label>
                                <input name="apellido" id="apellidomodif" value="" class="form-control" >
                                <label class="error" for="apellido" id="apell_error">Debe introducir su apellido.</label><br><br>
                              </div>
              
                              <div class="form-group">
                                <label>Correo</label>
                                <input name="correo" id="correomodif"value="" class="form-control">
                                <label class="error" for="correo" id="correo_error">Debe introducir su correo.</label><br><br>
                              </div>
              
                              <div class="form-group">
                                <label>Contraseña</label>
                                <input name="clave"  id="clavemodif" value="" class="form-control">
                                <label class="error" for="clave" id="clave_error">Debe introducir su contraseña.</label><br><br>
                              </div>
                             
                              <div class="form-group">
                                <label>Perfil</label>
                                <input name="perfil" id="perfilmodif"  value="" class="form-control" >
                                <label class="error" for="perfil" id="perfil_error">Debe introducir su perfil.</label><br><br>
                              </div>
              
                              <div class="form-group">
                                <label>Turno</label>
                                <input name="turno"  id="turnomodif" value=""class="form-control" >
                                <label class="error" for="turno" id="turno_error">Debe introducir su turno.</label><br><br>
                              </div>
              
              
                              <div class="form-group">
                                <label>Fecha de creacion</label>
                                <input name="fechacreacion" id="fechacreacionmodif" value="" class="form-control" >
                                <label class="error" for="fecha" id="fecha_error">Debe introducir su fecha.</label><br><br>
                              </div>
              
              
                              <div class="form-group">
                                <label>Foto</label>
                                <input name="foto" id="fotomodif" value="" class="form-control" >
                                <label class="error" for="foto" id="foto_error">Debe introducir su foto.</label><br><br>
                              </div>
              
              
                              <button type="submit"   class="btn btn-info btn-lg" id="editar-btn" >
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Modificar
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
         
          
        <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Modificar Facturado</h4>
                          </div>
                          <div id="edit_form">
                          <form role="form" name="register" method="post" action="" >
                            <div class="col-lg-12">
                            
                               
                                <input name="id" id="idamodificarfact" value="" class="form-control" style="visibility:hidden" >
                            
                              <div class="form-group">
                              <label>Patente</label>
                                <input name="patente" id="patentemodif" value="" class="form-control" >
                                <label class="error" for="patente" id="name_error">Debe introducir patente.</label><br><br>
                              </div>
               
                              <div class="form-group">
                                <label>Hora de ingreso</label>
                                <input name="horaingreso" id="horaingresomodif" value="" class="form-control" >
                                <label class="error" for="horaingreso" id="horaingreso_error">Debe introducir hora de ingreso.</label><br><br>
                              </div>
              
                              <div class="form-group">
                                <label>Fecha de  Ingreso</label>
                                <input name="fechaingreso" id="fechaingresomodif"value="" class="form-control">
                                <label class="error" for="fechaingreso" id="fechaingreso_error">Debe introducir fecha de ingreso.</label><br><br>
                              </div>
              
                              <div class="form-group">
                                <label>Hora Salida</label>
                                <input name="horasalida"  id="horasalidamodif" value="" class="form-control">
                                <label class="error" for="horasalida" id="horasalida_error">Debe introducir hora salida.</label><br><br>
                              </div>
                             
                              <div class="form-group">
                                <label>Fecha Salida</label>
                                <input name="fechasalida" id="fechasalidamodif"  value="" class="form-control" >
                                <label class="error" for="fechasalida" id="salida_error">Debe introducir su fecha de salida</label><br><br>
                              </div>
              
                              <div class="form-group">
                                <label>Tiempo Transcurrido</label>
                                <input name="tiempotranscurrido"  id="tiempotranscurridomodif" value=""class="form-control" >
                                <label class="error" for="tiempotranscurrido" id="tiempo_error">Debe introducir tiempo transcurrido</label><br><br>
                              </div>
              
              
                              <div class="form-group">
                                <label>Importe</label>
                                <input name="importe" id="importemodif" value="" class="form-control" >
                                <label class="error" for="importe" id="importe_error">Debe introducir importe.</label><br><br>
                              </div>
              
              
              
                              <button type="submit"   class="btn btn-info btn-lg" id="editarfacturado-btn" >
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Modificar
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