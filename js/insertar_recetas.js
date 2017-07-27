$(document).ready(function() {
  $('.agregar_medicamentos').click(function(){



        var id_medicamento = $(".id_medicamento").val();
         if (id_medicamento=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el medicamento!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var id_receta = $(".id_receta").val();
         if (id_receta=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el folio de la receta!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

       
        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#registro_consultas").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/insertar_recetas.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Tratamiento agregado correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);
                document.getElementById("id_medicamento").value = "";
                document.getElementById("buscar_medicamentos").value = "";
                document.getElementById("nombre_medicamento").value = "";
                document.getElementById("cantidad_medicamento").value = "";
                document.getElementById("frecuencia_medicamento").value = "";
                document.getElementById("duracion_medicamento").value = ""; 
                document.getElementById("comentarios_medicamento").value = "";           
                
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
});