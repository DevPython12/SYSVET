function hora_actual(){ 
   	momentoActual = new Date() 
   	hora = momentoActual.getHours() 
   	minuto = momentoActual.getMinutes() 
   	segundo = momentoActual.getSeconds() 

   	horaImprimible = hora + " : " + minuto + " : " + segundo 

   	document.getElementById("hora_consulta").innerHTML = horaImprimible

   	setTimeout("hora_actual()",1000)
}