$(function() {
            $("#nombre").autocomplete({
                source: "../PHP/clientes.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
                    $('#nombre').val(ui.item.nombre);
					$('#a_paterno').val(ui.item.a_paterno);
					$('#a_materno').val(ui.item.a_materno);
					$('#id_cliente').val(ui.item.id_cliente);
			     }
            });
});