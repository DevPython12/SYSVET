function recetaID(pagina, contenedor, data) {
        var id_receta = $("#id_receta").val();
        console.log(id_receta);
         var content = $('#' + contenedor);
         $.ajax({
                    type: "POST",
                    url: "" + pagina,
                    data: {id_receta: id_receta},
                    success: function(data) {
                    content.html(data);
                    }
        });
}