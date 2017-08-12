$(document).ready(function() {
  $('.agregar_empleados').click(function(){

        var nombre = $(".nombre_empleado").val();

        if (nombre=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el nombre del empleado!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }
        var a_paterno = $(".apellido_paterno_empleado").val();

         if (a_paterno=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el Apellido paterno!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var a_materno = $(".apellido_materno_empleado").val();

         if (a_materno=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el Apellido materno!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }


        var fecha_nacimiento = $(".fecha_nacimiento_empleado").val();

         if (fecha_nacimiento=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar la fecha de nacimiento!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#form_empleados").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/insertar_empleados.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Empleado agregado correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);
                $('#form_empleados')[0].reset(); //Limpiamos los Input
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); 