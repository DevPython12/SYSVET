$(function() {
            $("#buscar_cliente2").autocomplete({
                source: "../PHP/clientes.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
                    $('#buscar_cliente2').val(ui.item.buscar_cliente2);
                    $('#nombre_cliente_2').val(ui.item.nombre_cliente_2);
					$('#a_paterno_cliente_2').val(ui.item.a_paterno_cliente_2);
					$('#a_materno_cliente_2').val(ui.item.a_materno_cliente_2);
                    $('#telefono_cliente_2').val(ui.item.telefono_cliente_2);
					$('#id_cliente2').val(ui.item.id_cliente2);
			     }
            });
});