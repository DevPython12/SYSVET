$(function() {
            $("#buscar_mascota_4").autocomplete({
                source: "../PHP/mascotas.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
                    $('#buscar_mascota_4').val(ui.item.buscar_mascota_4);
                    $('#nombre_mascota_4').val(ui.item.nombre_mascota_4);
                    $('#color_mascota_4').val(ui.item.color_mascota_4);
                    $('#sexo_mascota_4').val(ui.item.sexo_mascota_4);
					$('#esterilizado_mascota_4').val(ui.item.esterilizado_mascota_4);
					$('#id_mascota_4').val(ui.item.id_mascota_4);
                    $('#tipo_mascota_4').val(ui.item.tipo_mascota_4);
                    $('#raza_4').val(ui.item.raza_4);
                    $('#edad_mascota_4').val(ui.item.edad_mascota_4);
                    $('#longitud_mascota_4').val(ui.item.longitud_mascota_4);
                    $('#peso_mascota_4').val(ui.item.peso_mascota_4);
                    $('#alergias_4').val(ui.item.alergias_4);
			     }
            });
});