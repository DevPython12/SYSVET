$(function() {
            $("#buscar_medico").autocomplete({
                source: "../PHP/medicos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
                    $('#buscar_medico').val(ui.item.buscar_medico);
                    $('#nombre_medico').val(ui.item.nombre_medico);
                    $('#id_medico').val(ui.item.id_medico);
					$('#a_paterno_medico').val(ui.item.a_paterno_medico);
					$('#a_materno_medico').val(ui.item.a_materno_medico);
					$('#cedula_medico').val(ui.item.cedula_medico);
			     }
            });
});