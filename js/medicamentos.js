$(function() {
            $("#buscar_medicamentos").autocomplete({
                source: "../PHP/medicamentos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
                    $('#buscar_medicamentos').val(ui.item.buscar_medicamentos);
                    $('#id_medicamento').val(ui.item.id_medicamento);
                    $('#nombre_medicamento').val(ui.item.nombre_medicamento);
        

			     }
            });
});