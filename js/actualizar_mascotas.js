$(document).ready(function() {
    $('.editar_mascotas').click(function(){
        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
    
        var buscar_mascota = $(".buscar_mascota").val();
        if (buscar_mascota=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe seleccionar un nombre de mascota!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }



        var obtener = $("#baja_mascota").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/actualizar_mascotas.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Mascota actualizada correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);

            $('#baja_mascota')[0].reset(); //Limpiamos los Input
                
            }

        }); //Terminamos la Funcion Ajax
     return false;
     });
}); //Terminamos la Funcion Ready