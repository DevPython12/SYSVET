$(function() {
            $("#buscar_enfermedades1").autocomplete({
                source: "../PHP/enfermedades.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
                    $('#buscar_enfermedades1').val(ui.item.buscar_enfermedades1);
                    $('#id_enfermedad1').val(ui.item.id_enfermedad1);
                    $('#nombre_enfermedad1').val(ui.item.nombre_enfermedad1);
        

			     }
            });
});