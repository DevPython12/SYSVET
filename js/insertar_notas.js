$(document).ready(function() {
  $('.enviar_notas').click(function(){

        //Obtenemos el valor del campo nombre
        var nombre = $(".nota_titulo").val();
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

        var nota = $(".nota_comentario").val();

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
        var obtener = $("#notas_form").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/insertar_notas.php",
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
                document.getElementById("nota_titulo").value = "";
                document.getElementById("nota_comentario").value = "";
                
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); 