function contador(boton)
{

i = i + 1;
var btn = document.getElementById("" + boton);

if(i < 1) {
	$.jAlert({
		'title': 'Error!!!',
		'content': 'Haz clic en el boton de actualizar tabla!!!',
		'theme': 'red',
		'btns': { 'text': 'Cerrar' }
	}); 
}

}