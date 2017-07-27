$(document).ready(function() {
  $('.guardar_consulta').click(function(){


        var nombre_medico = $(".buscar_medico").val();
         if (nombre_medico=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el nombre del medico!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        //Obtenemos el valor del campo nombre
        var id_mascota = $(".buscar_mascota_3").val();
         if (id_mascota=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el nombre de la mascota!!!',
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
            'content': 'Debe ingresar el folio del diagnostico!!!',
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


        var fecha = $(".date3").val();
         if (fecha=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar la fecha de la consulta!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var costo = $(".costo_consulta").val();
         if (costo=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el costo de la consulta!!!',
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
            url: "../PHP/insertar_consultas.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Consulta agregada correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);

            $('#registro_consultas')[0].reset(); //Limpiamos los Input
                
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); 