 function validarForm(formulario) 
    {
        if(formulario.palabra.value.length==0) 
        { //¿Tiene 0 caracteres?
            formulario.palabra.focus();  // Damos el foco al control
            $.jAlert({
	        'title': 'Error!!!',
	        'content': 'Debes llenar el campo!!!',
	        'theme': 'red',
	        'btns': { 'text': 'Cerrar' }
	      }); //Mostramos el mensaje
            return false; 
         } //devolvemos el foco  
         return true; //Si ha llegado hasta aquí, es que todo es correcto 
     }   