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
<script src="./js/jquery.validate.js"></script>    
<script src="./js/jquery.validate.min.js"></script>    
<script src="./js/validador.js"></script>

<script type="text/javascript">
function MostrarTabla(response)
{
document.getElementById("grillabusqueda").className ="visible";
document.getElementById("grilladeestacionados").className ="oculto";

resultado=JSON.parse(response);

console.log(resultado.lenght);
if(resultado[0]==null)
{

  alert("No existe en registro");
  document.getElementById("grillabusqueda").className ="oculto";
}
for (x in resultado) {
  document.getElementById("tablita").innerHTML +="<tr><td>"+resultado[x].id+"</td><td>"+resultado[x].patente+"</td><td>"+resultado[x].color+"</td><td>"+resultado[x].marca+"</td><td>"+resultado[x].fechaingreso+"</td><td>"+resultado[x].horaingreso+"</td><td>"+resultado[x].cochera+"</td></tr>";
}

}

function MostrarTablaEmpleados(response)
{
document.getElementById("grillabusquedaempleados").className ="visible";
document.getElementById("grilladeempleados").className ="oculto";

resultado=JSON.parse(response);

console.log(resultado.lenght);
if(resultado[0]==null)
{

  alert("No existe en registro");
  document.getElementById("grillabusquedaempleados").className ="oculto";
}
for (x in resultado) {
  document.getElementById("tablitaempleados").innerHTML +="<tr><td>"+resultado[x].id+"</td><td>"+resultado[x].nombre+"</td><td>"+resultado[x].apellido+"</td><td>"+resultado[x].clave+"</td><td>"+resultado[x].mail+"</td><td>"+resultado[x].turno+"</td><td>"+resultado[x].perfil+"</td><td>"+resultado[x].fechacreacion+"</td></tr>";
}

}
function ObtenerDatos()
{
   var email= localStorage.getItem("useractual"); 


   
  document.getElementById("user").innerHTML +="<h3>"+email+"</h3>";
  

}

function Modal()
{
    jQuery('#modal').modal('show');

}


$(document).ready(function() {

  $('.error').hide();
  
  $('.navbar-brand').click(function(){
     
      document.getElementById("grilladeestacionados").className ="oculto";
        
    });  



	$("#enviar-btn").click(function() {
   var logueos = localStorage.getItem("empleados");
    arrayusuarios = JSON.parse(logueos);
	
    var nombre = $("input#nombre").val();
    var apellido = $("input#apellido").val();
    var correo = $("#correo").val();
    var clave = $("input#clave").val();
		var perfil = $("#perfil").val();
   	var turno = $("#turno").val();
	  var fechacreacion = $("input#fechacreacion").val();
    var foto = $("#foto");

  
    var tipo = "emp";
    var id = 0;
    var empleado = new personas.Empleado(tipo,id,nombre,apellido,correo,clave,perfil,turno,fechacreacion,foto);
    
    if (arrayusuarios === null) {
        arrayusuarios = new Array();
        arrayusuarios.push(empleado);
    }
    else {
        arrayusuarios.push(empleado);
    }
    localStorage.setItem("empleado", JSON.stringify(arrayusuarios));
 
   
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
		var correo = $("#correo").val();

		//Validamos el campo nombre, simplemente miramos que no esté vacío
		if (correo == "") {
			$("label#correo_error").show();
			$("#correo").focus();
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
		var perfil = $("#perfil").val();

		//Validamos el campo nombre, simplemente miramos que no esté vacío
		if (perfil == "") {
			$("label#perfil_error").show();
			$("#perfil").focus();
			return false;
		}

		//Obtenemos el valor del campo password
		var turno = $("#turno").val();

		//Validamos el campo password, simplemente miramos que no esté vacío
		if (turno == "") {
			$("label#turno_error").show();
			$("#turno").focus();
			return false;
        }
        

        	//Obtenemos el valor del campo nombre
		var fechacreacion = $("#fechacreacion").val();


		if (nombre == "") {
			$("label#fecha_error").show();
			$("#fechacreacion").focus();
			return false;
		}




var inputFileImage = document.getElementById("foto");

var file = inputFileImage.files[0];

var data = new FormData();
 data.append('nombre',nombre);
    data.append('apellido',apellido);
    data.append('correo',correo);
    data.append('clave',clave);
    data.append('perfil',perfil);
    data.append('turno',turno);
    data.append('fechacreacion',fechacreacion);
    data.append('archivo',file);


$.ajax({
    url: 'usuarioalta.php',
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    type: 'POST',
   success: function(response) {
                  localStorage.setItem("alta",response);
                $('#register_form').html("<div id='message'></div>");
                $('#message').html("<h2>Se ha registrado correctamente!</h2>")
                .hide()
                .fadeIn(1500, function() {
              window.location.reload(true);
             
                });
            }
  
   });  
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
       var cochera = document.getElementById("cochera").value;
       var dataString='id='+id+'&fechasalida='+fechasalida+'&horasalida='+horasalida+ '&tiempotranscurrido='+tiempotranscurrido+'&cochera='+cochera+'&importe='+importe;
       $.ajax({
            type: "POST",
            url: "estacionadobaja.php",
            data: dataString,
         
      }).done(function(resultado) {
      
      localStorage.setItem("fact",resultado),
      $('#modal3').html("<div id='message'></div>");
              $('#message').html("<h2>Se ha eliminado correctamente!</h2>")
              .hide()
              .fadeIn(1500, function() {
               
            window.location.reload(true);
      }).fail(function(){
        alert(resultado);
        alert('Error al eliminar auto.')
        
      })     


})

   
    });
    

    


   
    $('.facturados').click(function(){

      document.getElementById("altaestacionado").className ="oculto";  
      document.getElementById("grilladeestacionados").className ="oculto";  
      document.getElementById("listaprecios").className ="oculto";  
      document.getElementById("grillabusqueda").className ="oculto";
      document.getElementById("grillabusquedaempleados").className ="oculto";
    });  

       
 
   
    $('.altaestacionado').click(function(){
 
      document.getElementById("altaestacionado").className ="visible";
      document.getElementById("grilladeestacionados").className ="oculto";
      document.getElementById("listaprecios").className ="oculto";
      document.getElementById("grillabusqueda").className ="oculto"; 
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
    document.getElementById("fotoanterior").value=myArr.foto,
 
       document.getElementById("imagenamodificar").src = 'fotosEmpleados/'+myArr.foto
      })
      .fail(function(){

        alert('Hubo un error')
      })     


});


$('#botonbusqueda').click(function(){
    

   
       var service =  document.getElementById("buscar").value;

        var dataString = 'buscar=' + service ;
     
        var myArr;
        $.ajax({
            type: "POST",
            url: "Busqueda.php",
            data: dataString,
            success: function(response) {
              localStorage.setItem("patentes",response);
              MostrarTabla(response);

          
        }
      });
      return false;
      
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
      document.getElementById("colormodif").value =myArr.color,
      document.getElementById("marcamodif").value =myArr.marca,
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
    var color = $("input#colormodif").val();
    var marca = $("input#marcamodif").val();
    var cochera = $("input#cocheramodif").val();
    var horaingreso = $("input#horaingresomodif").val();
    var fechaingreso = $("input#fechaingresomodif").val();
    var horasalida = $("input#horasalidamodif").val();
    var fechasalida = $("input#fechasalidamodif").val();
    var tiempotranscurrido = $("input#tiempotranscurridomodif").val();
     var importe = $("input#importemodif").val();

  
    var dataString ='id=' + id + '&patente=' + patente + '&color=' + color + '&marca=' + marca + '&horaingreso=' + horaingreso + '&fechaingreso=' + fechaingreso + '&horasalida=' + horasalida + '&fechasalida=' + fechasalida + '&tiempotranscurrido=' + tiempotranscurrido + '&importe=' + importe + '&cochera=' + cochera;;

    $.ajax({
      type: "POST",
      url: "facturadoeditar.php",
      data: dataString,
      success: function(response) {
            localStorage.setItem("facturado",response);

          $('#formfacturado').html("<div id='message'></div>");
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
  /*  var nombre = $("input#nombremodif").val();
    var apellido = $("input#apellidomodif").val();
    var correo = $("input#correomodif").val();
    var clave = $("input#clavemodif").val();
    var perfil = $("#perfilmodif").val();
    var turno = $("#turnomodif").val();
    var fechacreacion = $("#fechacreacionmodif").val();

    */
    var fotoanterior = $("#fotoanterior").val();
  


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
    var perfil = $("#perfilmodif").val();

    //Validamos el campo nombre, simplemente miramos que no esté vacío
    if (perfil == "") {
      $("label#perfil_error").show();
      $("#perfilmodif").focus();
      return false;
    }

    //Obtenemos el valor del campo password
    var turno = $("#turnomodif").val();

    //Validamos el campo password, simplemente miramos que no esté vacío
    if (turno == "") {
      $("label#turno_error").show();
      $("#turnomodif").focus();
      return false;
        }
        

          //Obtenemos el valor del campo nombre
    var fechacreacion = $("#fechacreacionmodif").val();

    //Validamos el campo nombre, simplemente miramos que no esté vacío
    if (nombre == "") {
      $("label#fecha_error").show();
      $("#fechacreacionmodif").focus();
      return false;
    }

    //Obtenemos el valor del campo password
    var foto = $("#fotomodif");

  
var inputFileImage = document.getElementById("fotomodif");

var file = inputFileImage.files[0];

var data = new FormData();
 data.append('id',id);
 data.append('nombre',nombre);
    data.append('apellido',apellido);
    data.append('correo',correo);
    data.append('clave',clave);
    data.append('perfil',perfil);
    data.append('turno',turno);
    data.append('fechacreacion',fechacreacion);
    data.append('fotoanterior',fotoanterior);
    data.append('archivo',file);
    console.log(data);
  localStorage.setItem("edicion", data);

    //Construimos la variable que se guardará en el data del Ajax para pasar al archivo php que procesará los datos
   /* var dataString ='id=' + id + '&nombre=' + nombre + '&apellido=' + apellido + '&correo=' + correo + '&clave=' + clave + '&perfil=' + perfil + '&turno=' + turno + '&fechacreacion=' + fechacreacion + '&foto=' + foto;*/


    $.ajax({
      type: "POST",
      url: "usuarioeditar.php",
     cache: false,
    contentType: false,
    processData: false,
      data: data,
      success: function(response) {
          localStorage.setItem("modificacion",response);
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
      document.getElementById("altaestacionado").className ="oculto";  
      document.getElementById("listaprecios").className ="oculto";  
      document.getElementById("grillabusqueda").className ="oculto";
      document.getElementById("listafacturados").className ="oculto";  
      document.getElementById("grillabusquedaempleados").className ="oculto";
    });
    

    $('.Listaprecios').click(function(){
      document.getElementById("grilladeestacionados").className ="oculto";
      document.getElementById("altaestacionado").className ="oculto";  
      document.getElementById("listaprecios").className ="visible"; 
      document.getElementById("grillabusqueda").className ="oculto";
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
      document.getElementById("colorasalir").value =myArr.color,
      document.getElementById("marcaasalir").value =myArr.marca,
      document.getElementById("cochera").value =myArr.cochera,
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

   <body onload=ObtenerDatos();>
      <div class="esquina">
        <div class="sesion">Sesion abierta por... <div id="user" >
        </div>
      </div>
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
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav main-nav  clear navbar-right ">
                      <li><a class="grillaestacionados" href="#">Estacionados</a></li>
                      <li><a class="altaestacionado" href="#">Alta estacionado</a></li>
                      <li><a class="Listaprecios" href="#">Lista de precios</a></li>
                    </ul>
                  </div><!-- /.navbar-collapse -->
              </div>
            </div><!-- /.container-fluid -->
        </nav>
      <div id="mensajes" class="oculto">
      </div>
      <div class="container">
        <div class="row vertical-offset-100">
          <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">   
               <div id="altaestacionado" class="oculto">
                 <div class="panel panel-default">
                  <label class="panel-title">Ingrese Patente</label>
                    <form  action="gestionEntrada1.php" id="altaestacionado" method="post">
                      <input type="text" onkeydown="MostrarBoton(this)" name="patente" title="formato de patente: AAA 666" id="autocomplete" required pattern="[a-z]{3}[0-9]{3}" />
                        <br>
                          <label class="panel-title">Ingrese Color</label>
                            <input type="text" name="color" id="color" required="" />
                        <br>
                          <label class="panel-title">Ingrese Marca</label>
                          <input type="text"  name="marca" id="marca" required="" />
                        <br>
                        <label class="panel-title">Seleccione Cochera</label>
                        <br>
                          <select name="cocheraseleccionada" id="cocheraseleccionada">
                        <?php
           
                        require './clases/AccesoDatos.php';
                        require './clases/vehiculo.php';
                        require './clases/Cochera.php';
                        $conn=mysqli_connect("mysql.hostinger.com.ar","u400470299_gise","123456","u400470299_estac") ;                                 $consulta="select * from cocheras where disponible='SI' ";
                        $resultado=mysqli_query($conn,$consulta);
                        while($lista=mysqli_fetch_array($resultado)){
                        ?> 
                         <option value="<? echo $lista['id']?>">  <? echo $lista['id'].'-'.$lista['cochera']?></option> 
                         <? } ?>
                          </select> 
                        <input type="submit" id="botonIngreso" class="MiBotonUTN" value="ingreso"  name="estacionar" />
                        <br/>
                    </form>
                  </div>
                 </div>
               </div>
            </div>
          </div>
        </div>
      </div>      

      <div id="resp">
      </div>    


      <div id="grillabusqueda" class="oculto">  
          <div class="follow_container">
              <div id="contenido" >
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                         <h3 class="panel-title">Resultado Busqueda</h3>
                      </div>
                          <div id="empleados_form">
                              <div class="panel-body">
                              <table class="table table-striped">
                              <thead>
                              <th>#</th>
                              <th>ID</th>
                              <th>Patente</th>
                              <th>Color</th>
                              <th>Fecha Ingreso</th>
                              <th>Hora Ingreso</th>
                              <th>Cochera</th>
                              </thead>
                              <tbody id="tablita">

                             </tbody>
                            </table>
                               
                              </div>
                          </div>
                    </div>
                   
              
                  </div>
              </div>
      </div>
    


     
      <div id="grilladeestacionados" class="oculto">
          <div class="follow_container">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <h3 class="panel-title">Lista de Estacionados</h3>
                      <h5>Buscar por patente</h5>
                          <form class="busquedaform" name="buscador" method="post"> 
                              <input id="buscar" name="buscar" type="search" autofocus >
                              <input type="submit" name="buscador" id="botonbusqueda" value="buscar">
                                  <div class="contenidobusqueda">
                                  </div> 
                 
                          </form>
                 
              </div>
              <div id="empleados_form" class="visible">
                  <div class="panel-body">
                      <table class="table table-striped">
                          <thead>
                            <th>#</th>
                            <th>ID</th>
                            <th>Patente</th>
                            <th>Color</th>
                            <th>Marca</th>
                            <th>Fecha Ingreso</th>
                            <th>Hora Ingreso</th>
                            <th>Cochera</th>
                          </thead>
                          <tbody>
                            <?php
                                        //require './clases/AccesoDatos.php';
                                        //require './clases/vehiculo.php';
                                        $pdo = AccesoDatos::connect();
                                       
                                        $sql = 'SELECT * FROM estacionados';
                                        $con = 1;
                                        
                                        foreach ($pdo->query($sql) as $row) {
                                            echo "<tr>";
                                           
                                            echo '<td>' . $con . '</td>';
                                            echo '<td>' . $row['id'] . '</td>';
                                             echo '<td>' . $row['patente'] . '</td>';
                                             echo '<td>' . $row['color'] . '</td>';
                                            echo '<td>' . $row['marca'] . '</td>';
                                            echo '<td>' . $row['fechaingreso'] . '</td>';
                                            echo '<td>' . $row['horaingreso'] . '</td>';
                                                echo '<td>' . $row['cochera'] . '</td>';
                                           
                                        
                                
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
    

 

    
      <div id="listaprecios" class="oculto">
        

        <div class="container">
           <h2>Lista de Precios</h2>
              <ul class="list-group">
        
                      <li class="list-group-item">Precio por hora: $10</li>
                      <li class="list-group-item">Precio por media estadia:  $90</li>
                      <li class="list-group-item">Precio por estadia completa:  $170</li>
          
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
                                 <label>Color</label>
                                <input name="color" id="colorasalir" value="" class="form-control" >
                               
                              </div>

                              <div class="form-group">
                                <label>Marca</label>
                                <input name="marca" id="marcaasalir" value="" class="form-control" >
                               
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
                                <input name="tiempotranscurrido"  id="tiempotranscurrido" value="" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label>Cochera</label>
                                <input name="cochera"  id="cochera" value="" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Importe  $$ </label>
                                <input name="importe"  id="importe" value="" class="form-control" >
                              </div>
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