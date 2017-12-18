

// JavaScript Validación
$('document').ready(function(){ 
    // Validación para campos de texto exclusivo, sin caracteres especiales ni números
   
    
    // Máscara para validación de Email
    var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    $.validator.addMethod("validemail", function( value, element ) {
    return this.optional( element ) || eregex.test( value );
    });
    
    $("#formulario-contacto").validate({
    
    rules:
    {
    nombre: {
    required: true,
    minlength: 8
    },
    email: {
    required: true,
    validemail: true
    }, 
  
    },
  
    email: {
    required: "Por Favor, introduzca una dirección de correo",
    validemail: "Introduzca correctamente su correo"
    },
  
    errorPlacement : function(error, element) {
    $(element).closest('.form-group').find('.help-block').html(error.html());
    },
    highlight : function(element) {
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function(element, errorClass, validClass) {
    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    $(element).closest('.form-group').find('.help-block').html('');
    },
    
    submitHandler: function(form) { 
    form.action="pagina que envia el correo.php";
    form.submit(); 
    
    alert('ok');
    }
    }); 

        // Máscara para validación de Email
    var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    $.validator.addMethod("validemail", function( value, element ) {
    return this.optional( element ) || eregex.test( value );
    });
    
    $("#register_form").validate({
    
    rules:
    {
    nombre: {
    required: true,
    minlength: 8
    },
    correo: {
    required: true,
    validemail: true
    }, 
  
    },
  
    correo: {
    required: "Por Favor, introduzca una dirección de correo",
    validemail: "Introduzca correctamente su correo"
    },
  
    errorPlacement : function(error, element) {
    $(element).closest('.form-group').find('.help-block').html(error.html());
    },
    highlight : function(element) {
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function(element, errorClass, validClass) {
    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    $(element).closest('.form-group').find('.help-block').html('');
    },
    
  
    }); 


    $("#edit_form").validate({
    
    rules:
    {
    nombre: {
    required: true,
    minlength: 8
    },
    correo: {
    required: true,
    validemail: true
    }, 
  
    },
  
    correo: {
    required: "Por Favor, introduzca una dirección de correo",
    validemail: "Introduzca correctamente su correo"
    },
  
    errorPlacement : function(error, element) {
    $(element).closest('.form-group').find('.help-block').html(error.html());
    },
    highlight : function(element) {
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function(element, errorClass, validClass) {
    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    $(element).closest('.form-group').find('.help-block').html('');
    },
    
  
    }); 
    })