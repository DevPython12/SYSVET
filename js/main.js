jQuery(document).on('submit','#login', function(event) {
	event.preventDefault();

	jQuery.ajax({
		url: 'PHP/login.php',
		type: 'POST',
		dataType: 'json',
		data: $(this).serialize(),
		beforeSend: function() {
			$('.btn btn-default').val('Validando...');
		}
	})
	.done(function(respuesta) {
		console.log(respuesta);
		if(!respuesta.error){
			if(respuesta.tipo == 'admin'){
				location.href = 'admin/index.php';

			} else if(respuesta.tipo == 'veterinario') {
				location.href = 'inicio.php';
			}
		} else {
			$('.error').slideDown('slow');
			setTimeout(function() {
				$('.error').slideUp('slow');
			}, 3000);
			$('.btn btn-default').val('Iniciar Sesion');
		}
	})
	.fail(function(resp) {
		console.log(resp.responseText);
	})
	.always(function() {
		console.log("complete");
	});
});