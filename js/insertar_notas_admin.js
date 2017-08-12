$(document).ready(function() {
  $('.agregar_notas_admin').click(function(){

        var usuario = $(".usuario_nota").val();


        if (usuario=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el usuario de la nota!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }


        var nombre = $(".titulos_notas").val()

        if (nombre=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el nombre de la nota!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var nota = $(".cuerpo_notas").val();

         if (nota=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar los comentarios!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#form_notas2").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/insertar_notas_admin.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Nota agregada correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);
                $('#form_notas2')[0].reset(); //Limpiamos los Input
                
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); 