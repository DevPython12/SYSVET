$(document).ready(function() {
  $('.agregar_vacuna').click(function(){

        //Obtenemos el valor del campo nombre
        var id_mascota = $(".buscar_mascota_vacuna").val();
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

      
        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#registro_vacunas").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/insertar_vacunas.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Vacuna agregada correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);

            $('#registro_vacunas')[0].reset(); //Limpiamos los Input
                
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); 