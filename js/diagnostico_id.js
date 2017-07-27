
function cargarPaginaPHP(pagina, contenedor, data) {
        var id_diagnostico = $("#id_diagnostico").val();
        console.log(id_diagnostico);
         var content = $('#' + contenedor);
         $.ajax({
                    type: "POST",
                    url: "" + pagina,
                    data: {id_diagnostico: id_diagnostico},
                    success: function(data) {
                    content.html(data);
                    }
        });
}

/*


*/