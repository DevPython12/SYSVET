function mascotaID(pagina, contenedor, id_paciente, data) {
        var id_mascota = $('#' + id_paciente).val();
        console.log(id_mascota);
         var content = $('#' + contenedor);
         $.ajax({
                    type: "POST",
                    url: "" + pagina,
                    data: {id_mascota: id_mascota},
                    success: function(data) {
                    content.html(data);
                    }
        });
}