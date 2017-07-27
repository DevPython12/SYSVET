$(document).ready(function() {
  $('.agregar').click(function(){

        //Obtenemos el valor del campo nombre
        var nombre = $(".nombre_cliente").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        
        if (nombre=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar un nombre!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        //Obtenemos el valor del campo apellidos
        var a_paterno = $(".a_paterno_cliente").val();
        //Validamos el campo Apellidos, simplemente miramos que no esté vacío
         if (a_paterno=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar un a_paterno!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var date = $(".date").val();

         if (date=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar una fecha de nacimiento!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#form_conte").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/insertar.php",
            data: obtener,
            success: function() {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Cliente agregado correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 

            $('#form_conte')[0].reset(); //Limpiamos los Input
                
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); //Terminamos la Funcion Ready