$(document).ready(function() {
  $('.agregar_nuevo_medicamento').click(function(){

        //Obtenemos el valor del campo nombre
        var nombre = $(".nombre_generico_medicamento").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        
        if (nombre=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el nombre generico del medicamento!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        //Obtenemos el valor del campo apellidos
        var id_tipo_admin_medicamento = $(".tipo_admin_medicamento").val();
        //Validamos el campo Apellidos, simplemente miramos que no esté vacío
         if (id_tipo_admin_medicamento=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el tipo de administracion de medicamento!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var id_tipo_medicamento = $(".tipo_medicamento").val();

         if (id_tipo_medicamento=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar un tipo de medicamento!!!',
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
            url: "../PHP/insertar_medicamentos.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Cliente agregado correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);
                document.getElementById("nombre_generico_medicamento").value = "";
                document.getElementById("nombre_comercial_medicamento").value = "";
                document.getElementById("tipo_admin_medicamento").value = "";
                document.getElementById("tipo_medicamento").value = ""; //Limpiamos los Input
                
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); 