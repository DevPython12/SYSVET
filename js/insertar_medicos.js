$(document).ready(function() {
  $('.agregar_medico').click(function(){

        var empleado = $(".empleado_medico").val();

        if (empleado=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el empleado!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var cedula = $(".cedula_medicos").val();

         if (cedula=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar la cedula!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }


        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#form_medicos").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/insertar_medicos.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Medico agregado correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);
                $('#form_medicos')[0].reset(); //Limpiamos los Input
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); 