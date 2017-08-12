<?php

	require_once ("../PHP/config.php");
    $sql = "SELECT * FROM vacunas";
    $result = $con->query($sql);
                                                    
    if($result->num_rows>0){
        echo "<table class='table table-stripped'>
                <tr>
                  	<th>Id_vacuna</th>
                   	<th>Abreviatura</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
                <tr>";

        while($row=$result->fetch_assoc()) {
            
            echo "<td>".$row["id_vacuna"]."</td>". 
                 "<td>".$row["abreviatura"]."</td>".
                 "<td>".$row["nombre"]."</td>".
                 "<td><a 
                 		data-id_vacuna='$row[id_vacuna]'
                        data-abreviatura='$row[abreviatura]'
                        data-nombre='$row[nombre]'
                        data-toggle='modal'
                        data-target='#editar_vacunas_modal'
                        data-toggle='tooltip' title='Haz clic primero en actualizar tabla'
                         ><span class='glyphicon glyphicon-pencil'></span></a>"."&nbsp;&nbsp;".
                 "<a href='#' id='".$row["id_vacuna"]."' onclick='eliminar_vacuna(".$row["id_vacuna"].")'><span class='glyphicon glyphicon-remove'></span></a></td>". 
                 "</tr>";
        }

    } else{
        echo "No hay usuarios";
    }       

    echo '<script>
    		function eliminar_vacuna(id, data) {
        		var id_vacuna = id;
				console.log(id_vacuna);

         		$.ajax({
                    type: "POST",
                    url: "../PHP/eliminar_vacunas.php",
                    data: {id_vacuna: id_vacuna},
                    success: function(data) {
                    	console.log(data);
                    }
        		});
			}
		</script>';

    echo "</table>"; 

?>

            <script>
                function load(page){
                    var parametros={"action":"ajax","page":page};
                    $("#loader").fadeIn('slow');
                    $.ajax({
                        url:'../PHP/tabla_vacunas_admin.php',
                        data: parametros,
                        beforeSend:function(objeto){
                            $("#loader").html("<img src='loader.gif'>");
                        },
                        success:function(data){
                            $(".outer_div").html(data).fadeIn('slow');
                            $("#loader").html("");
                        }
                    })

                }

                    $('#editar_vacunas_modal').on('show.bs.modal',function (event) {
                        var button = $(event.relatedTarget)
                        var id_vacuna = button.data('id_vacuna') //Boton que activo el modal
                        var abreviatura = button.data('abreviatura') //Extraer la informacion de atributos de datos
                        var nombre = button.data('nombre')

                        var modal = $(this)
                        modal.find('.modal-title').text('Modificar Vacuna:' + id_vacuna)
                        modal.find('.modal-body #id_editar_vacuna').val(id_vacuna)
                        modal.find('.modal-body #editar_nombre_vacuna').val(nombre)
                        modal.find('.modal-body #editar_abreviatura_vacuna').val(abreviatura)
                        $('alert').hide();
                    })

            </script>

            <script>
                $(document).ready(function() {
                      $('.vacunas_editar').click(function(){

                            var nombre = $(".editar_nombre_vacuna").val();

                            if (nombre=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el nombre de la vacuna!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
                        var obtener = $("#form_vacunas_editar").serialize();

                        $.ajax({
                            type: "POST",
                            url: "../PHP/actualizar_vacunas.php",
                            data: obtener,
                            success: function(response) {
                                //Mensaje de Datos Correctamente Insertados
                                $.jAlert({
                            'title': 'Correcto!!!',
                            'content': 'Vacuna actualizada correctamente!!!',
                            'theme': 'green',
                            'btns': { 'text': 'Cerrar' }
                          }); 
                                console.log(response);
                            }

                        }); //Terminamos la Funcion Ajax
                        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario
                    }); //Terminamos la Funcion Click
                }); 
            </script>


      <div class="modal fade" id="editar_vacunas_modal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel"  aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
            <h4 class="modal-title">Editar</h4>
          </div>
        <div class="modal-body">
          <form id="form_vacunas_editar" role="form" method="post" >
        <div class="form-group">
              <label for="editar_abreviatura_vacuna">Abreviatura Vacuna</label>
              <input id="editar_abreviatura_vacuna" type="text" class="editar_abreviatura_vacuna form-control" name="editar_abreviatura_vacuna" placeholder="Abreviatura vacuna" >
              <input id="id_editar_vacuna" type="hidden" class="id_editar_vacuna form-control" name="id_editar_vacuna" readonly >
       </div>
        <div class="form-group">
              <label for="editar_nombre_vacuna">Nombre Vacuna</label>
              <input id="editar_nombre_vacuna" type="text" class="editar_nombre_vacuna form-control" name="editar_nombre_vacuna" placeholder="Nombre vacuna" required>
       </div>
            <button id="vacunas_editar" type="text"  class="vacunas_editar btn btn-default">Editar</button>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
                    <script>
            $(document).ready(function(){
                load(1);
            });
        </script>

<?php

    ?>