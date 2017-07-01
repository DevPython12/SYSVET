with(document.login){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && username.value==""){
			ok=false;
						
	      $.jAlert({
	        'title': 'Error!!!',
	        'content': 'Debe escribir un nombre de usuario!!!',
	        'theme': 'red',
	        'btns': { 'text': 'Cerrar' }
	      });

			username.focus();
		}
		if(ok && password.value==""){
			ok=false;
			$.jAlert({
	        'title': 'Error!!!',
	        'content': 'Debe escribir su password!!!',
	        'theme': 'red',
	        'btns': { 'text': 'Cerrar' }
	      });
			password.focus();
		}
		if(ok){ submit(); }
	}
}