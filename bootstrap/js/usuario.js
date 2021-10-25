const contrasena = document.getElementById('InputPassword');
const contrasena2 = document.getElementById('InputPassword2');

/*$('.btnRegistrar').on('click',function(e){
    console.log('Funciona');
    e.preventDefault();
    $("#myform").validate({
        debug: true
    });
});*/

$(document).ready(function() {  // <-- ensure form's HTML is ready
    
    $("#formRegistroUsuario").validate({  // <-- initialize plugin on the form.
        // your rules and other options,
        rules: {
            nombres: {  // <-- this is the name attribute, NOT id
                required: true,
                minlength: 2
            },
            primerApellido: {
                required: true,
                minlength: 1
            },
            celular: {
                required: true,
                digits: true,
                minlength: 7,
                maxlength:8
            },
            coreo: { 
                required:true,
                email: true
            },
            contrasena:{
                required:true,
                minlength:5
            },
            contrasena2:{
                equalTo : "#contrasena"
            }
        },
        messages: {
			nombres:{
                required:"Este campo es obligatorio.",
                minlength:"El campo debe tener minimo 2 caracteres"
            },
			primerApellido: {
                required:"Este campo es obligatorio.",
                minlength:"El campo debe tener minimo 1 caracteres"
            },
			celular :{
                required: "Este campo es obligatorio.",
                digits: "El campo debe ser de puro digitos",
                minlength: "El campo debe tener minimo 7 caracteres",
                maxlength:"El campo puede tener maximo 8 caracteres"
            },
			correo : {
                required:"El campo es obligatorio",
                email:"El campo debe ser un correo"
		    },
            contrasena:{
                required:"El campo es obligatorio",
                minlength:"La contraseña debe tener minimo 5 caracteres "
		    },
            contrasena2:{
                equalTo:"Las contraseñas no son las mismas"
		    }
    }});

});