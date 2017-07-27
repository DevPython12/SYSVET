$(function() {
            $("#buscar_mascota_3").autocomplete({
                source: "../PHP/mascotas.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
                    $('#buscar_mascota_3').val(ui.item.buscar_mascota_3);
                    $('#nombre_mascota_3').val(ui.item.nombre_mascota_3);
                    $('#color_mascota_3').val(ui.item.color_mascota_3);
                    $('#id_mascota_3').val(ui.item.id_mascota_3);
					$('#tipo_mascota_3').val(ui.item.tipo_mascota_3);
					$('#raza_3').val(ui.item.raza_3);
                    $('#sexo_mascota_3').val(ui.item.sexo_mascota_3);
                    $('#esterilizado_mascota_3').val(ui.item.esterilizado_mascota_3);
                    $('#edad_mascota_3').val(ui.item.edad_mascota_3);
                    $('#longitud_mascota_3').val(ui.item.longitud_mascota_3);
                    $('#peso_mascota_3').val(ui.item.peso_mascota_3);
			     }
            });
});