$(document).ready(function() {
  $('.agregar_enfermedades').click(function(){



        var id_enfermedad = $(".id_enfermedad1").val();
         if (id_enfermedad=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar la enfermedad!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var id_diagnostico = $(".id_diagnostico").val();
         if (id_diagnostico=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el folio!!!',
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
            url: "../PHP/insertar_diagnosticos.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Diagnostico agregado correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);
                document.getElementById("id_enfermedad1").value = "";
                document.getElementById("buscar_enfermedades1").value = "";
                document.getElementById("nombre_enfermedad1").value = "";
                document.getElementById("comentarios_enfermedad").value = "";         
                
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); 