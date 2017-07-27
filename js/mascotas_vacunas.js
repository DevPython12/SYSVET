$(function() {
            $("#buscar_mascota_vacuna").autocomplete({
                source: "../PHP/mascotas.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
                    $('#buscar_mascota_vacuna').val(ui.item.buscar_mascota_vacuna);
                    $('#id_mascota_2').val(ui.item.id_mascota_2);
                    $('#nombre_mascota_2').val(ui.item.nombre_mascota_2);
                    $('#edad_mascota_2').val(ui.item.edad_mascota_2);
                    $('#tipo_mascota_2').val(ui.item.tipo_mascota_2);
                    $('#raza_2').val(ui.item.raza_2);
			     }
            });
});