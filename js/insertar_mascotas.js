$(document).ready(function() {
  $('.agregar_mascota').click(function(){

        //Obtenemos el valor del campo nombre
        var id_cliente = $(".id_cliente").val();
         if (id_cliente=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el nombre del cliente!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var nombre = $(".nombre_mascota").val();
        if (nombre=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el nombre de la mascota!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }
        
        var edad = $(".edad").val();
        if (edad=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar la edad de la mascota!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

        var longitud = $(".longitud").val();
        if (longitud=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el tamaño de la mascota!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }
        var peso = $(".peso").val();
        if (peso=="") {
            $.jAlert({
            'title': 'Incorrecto!!!',
            'content': 'Debe ingresar el peso de la mascota!!!',
            'theme': 'red',
            'btns': { 'text': 'Cerrar' }
          }); 
            $("input").focus();
            return false;
        }

       esterilizado = document.getElementsByName("esterilizado");
 
        var seleccionado = false;
        for(var i=0; i<esterilizado.length; i++) {    
          if(esterilizado[i].checked) {
            seleccionado = true;
            break;
          }
        }
         
        if(!seleccionado) {
            $.jAlert({
                    'title': 'Incorrecto!!!',
                    'content': 'Debe ingresar el esterilizado de la mascota!!!',
                    'theme': 'red',
                    'btns': { 'text': 'Cerrar' }
                  });
          return false;
        }
        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#form_mascotas").serialize();

        $.ajax({
            type: "POST",
            url: "../PHP/insertarMascotas.php",
            data: obtener,
            success: function(response) {
                //Mensaje de Datos Correctamente Insertados
                $.jAlert({
            'title': 'Correcto!!!',
            'content': 'Mascota agregada correctamente!!!',
            'theme': 'green',
            'btns': { 'text': 'Cerrar' }
          }); 
                console.log(response);

            $('#form_mascotas')[0].reset(); //Limpiamos los Input
                
            }

        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
    }); //Terminamos la Funcion Click
}); //Terminamos la Funcion Ready