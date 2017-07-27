function recargar_receta(pagina,contenedor){    
       /// Aqui podemos enviarle alguna variable a nuestro script PHP
    var id_receta = $("#id_receta").val();
       /// Invocamos a nuestro script PHP
    $.post("" + pagina, { id_receta: id_receta }, function(data){
       /// Ponemos la respuesta de nuestro script en el DIV recargado
    $('#' + contenedor).html(data);
    });         
}