$(document).ready(function() {
    $('.editar_nota').click(function(){
        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        
        //Obtenemos el valor del campo nombre
        var nombre = $(".editar_titulo_nota").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        console.log(nombre);

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

        var nota = $(".editar_comentario_nota").val();

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


        var obtener = $("#notas_form_editar").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/actualizar_notas.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Nota actualizada correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);

            $('#notas_form_editar')[0].reset(); //Limpiamos los Input
                
            }

        }); //Terminamos la Funcion Ajax
     return false;
     });
});