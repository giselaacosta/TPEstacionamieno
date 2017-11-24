<html>
  <head>
      <meta charset="UTF-8">
      <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      
        <link href="css/fondoLogin.css" rel="stylesheet">
        <style>
          .container{margin-top:100px}
        </style>
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
</style>

<script type="text/javascript" src="./js/jquery-ui-1.8.6.min.js"></script>

<script src="./js/runonload.js"></script>
           <script type="text/javascript">

           function Modal()
{
    jQuery('#modal').modal('show');

}




$(".editar").click(function(e) {
  alert("estoy aca");
	e.preventDefault();
	var id = 26;

	//"nombre del parámetro POST":valor (el cual es el objeto guardado en las variables de arriba)
	datos = {"id":id, };

	$.ajax({
		url: "usuarioedicion.php",
		type: "POST",
		data: datos
	}).done(function(respuesta){
		if (respuesta.estado === "ok") {
			console.log(JSON.stringify(respuesta));

			var id = respuesta.id;

			$(".respuesta").html("Servidor:<br><pre>"+JSON.stringify(respuesta, null, 2)+"</pre>");
		}
	});
});

function Modal2(datos)


{

  var id = id;
  $.post('usuarioedicion.php',{id:id});
  window.location.reload(true);
}
function Otra()
{
  var localStoragearray = localStorage.getItem("empleados");
    arrayempleados = JSON.parse(localStoragearray);
  console.log(correo);
    for (var z in arrayempleados) {
      
      per = arrayempleados[z];
     
        if ( per.correo!= correo) {
            continue;
        }
        else {
             
            document.getElementById("nombre").value =per.nombre;
            document.getElementById("apellido").value =per.apellido
            document.getElementById("correo").value =per.correo;
            document.getElementById("clave").value =per.password;
            document.getElementById("perfil").value =per.perfil;
            document.getElementById("turno").value =per.turno;
            document.getElementById("fechacreacion").value =per.fechacreacion;

            document.getElementById("foto").value =per.foto;
            
            arrayempleados.splice(con, 1);
            localStorage.setItem("empleados", JSON.stringify(arrayempleados));
        
            continue;
        }
    }

                              
    jQuery('#modal').modal('show');

  }

           </script>

<script type="text/javascript">

$(document).ready(function() {

	$('.error').hide();

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
  



});


runOnLoad(function(){
	$("input#nombre").select().focus();
});

function Borrar(id)
{
 
 
  var id = id;
  $.post('usuariobaja.php',{id:id});
  window.location.reload(true);
}
</script>
  </head>
  <body>        
      <div id="contenido" >
          
          <input id="btn_usuarios" onclick="Modal()"; type="button" class="btn btn-primary" value="Nuevo Usuario"/><br/><br/>
          
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <h3 class="panel-title">Lista de Usuarios</h3>
              </div>
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
                              <td><img src="edit.png" /><div class="editar"><h4>Editar</h4></div></td>';
                              echo '
                              <td><img src="delete.png" /><a  onclick="Borrar('.$row['id'] .')" href="#"  >Borrar</a></td>';
    
                               
                              echo '</tr>';
                              $con++;
                          }
                        //  AccesoDatos::disconnect();
                          ?>
                      </tbody>
                  </table>
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

    
  </body>
</html>