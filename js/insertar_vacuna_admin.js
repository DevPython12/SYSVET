$(document).ready(function() {
  $('.vacunas_agregar').click(function(){

        var nombre = $(".nombre_vacuna").val();

        if (nombre=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el nombre de la vacuna!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#form_vacunas2").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/insertar_vacunas_admin.php",
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
                $('#form_vacunas2')[0].reset(); //Limpiamos los Input
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); 