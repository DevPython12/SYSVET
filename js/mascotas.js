$(function() {
            $("#buscar_mascota").autocomplete({
                source: "../PHP/mascotas.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
                    $('#buscar_mascota').val(ui.item.buscar_mascota);
                    $('#nombre_mascota').val(ui.item.nombre_mascota);
                    $('#id_mascota').val(ui.item.id_mascota);
                    $('#id_cliente').val(ui.item.id_cliente);
                    $('#edad_mascota').val(ui.item.edad_mascota);
                    $('#color_mascota').val(ui.item.color_mascota);
					$('#longitud_mascota').val(ui.item.longitud_mascota);
					$('#peso_mascota').val(ui.item.peso_mascota);
                    $('#especie').val(ui.item.especie);
                    $('#raza').val(ui.item.raza);
                    $('#tipo_sangre').val(ui.item.tipo_sangre);
                    $('#esterilizado').val(ui.item.esterilizado);
                    $('#sexo').val(ui.item.sexo);        
                    $('#alergias').val(ui.item.alergias);
                    $('#observaciones').val(ui.item.observaciones);

			     }
            });
});


