$(document).ready(function() {
  $('.agregar_usuario').click(function(){

        var nombre = $(".nombre_usuario").val();

        if (nombre=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el nombre del usuario!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var contrasena = $(".contrasena_usuario").val();

         if (contrasena=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar la contraseña!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var clinica = $(".clinica_usuario").val();

         if (clinica=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar la clinica!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var privilegio = $(".privilegio_usuario").val();

         if (privilegio=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el privilegio!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }


        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#form_usuarios").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/insertar_usuarios.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Usuario agregado correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);
                $('#form_usuarios')[0].reset(); //Limpiamos los Input
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); 