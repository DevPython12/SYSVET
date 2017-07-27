function recargar(pagina,contenedor){    
       /// Aqui podemos enviarle alguna variable a nuestro script PHP
    var id_diagnostico = $("#id_diagnostico").val();
       /// Invocamos a nuestro script PHP
    $.post("" + pagina, { id_diagnostico: id_diagnostico }, function(data){
       /// Ponemos la respuesta de nuestro script en el DIV recargado
    $('#' + contenedor).html(data);
    });         
}