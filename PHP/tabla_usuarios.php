<?php

	require_once ("../PHP/config.php");
    $sql = "SELECT * FROM usuarios";
    $result = $con->query($sql);
                                                    
    if($result->num_rows>0){
        echo "<table class='table table-stripped'>
                <tr>
                  	<th>Id_usuario</th>
                   	<th>Nombre</th>
                    <th>Contraseña</th>
                    <th>Id_Clinica</th>
                    <th>Privilegio</th>
                    <th>Opciones</th>
                </tr>
                <tr>";

        while($row=$result->fetch_assoc()) {
            
            echo "<td>".$row["id_usuario"]."</td>". 
                 "<td>".$row["nombre_usuario"]."</td>".
                 "<td>".$row["contrasena"]."</td>".
                 "<td>".$row["id_clinica"]."</td>".
                 "<td>".$row["privilegio"]."</td>".
                 "<td><a 
                 		data-id_usuario='$row[id_usuario]'
                        data-nombre='$row[nombre_usuario]'
                        data-contrasena='$row[contrasena]'
                        data-id_clinica='$row[id_clinica]'
                        data-privilegio='$row[privilegio]'
                        data-toggle='modal'
                        data-target='#editar_usuarios'
                        data-toggle='tooltip' title='Haz clic primero en actualizar tabla' ><span class='glyphicon glyphicon-pencil'></span></a>"."&nbsp;&nbsp;".
                 "<a href='#' id='".$row["id_usuario"]."' onclick='eliminar_usuario(".$row["id_usuario"].")'><span class='glyphicon glyphicon-remove'></span></a></td>". 
                 "</tr>";
        }

    } else{
        echo "No hay usuarios";
    }       

    echo '<script>
    		function eliminar_usuario(id, data) {
        		var id_usuario = id;
				console.log(id_usuario);

         		$.ajax({
                    type: "POST",
                    url: "../PHP/eliminar_usuarios.php",
                    data: {id_usuario: id_usuario},
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
						url:'../PHP/tabla_usuarios.php',
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

					$('#editar_usuarios').on('show.bs.modal',function (event) {
						var button = $(event.relatedTarget)
						var id_usuario = button.data('id_usuario') //Boton que activo el modal
						var nombre = button.data('nombre') //Extraer la informacion de atributos de datos
						var contrasena = button.data('contrasena')
						var id_clinica = button.data('id_clinica')
						var privilegio = button.data('privilegio')

						var modal = $(this)
						modal.find('.modal-title').text('Modificar Usuario:' + nombre)
						modal.find('.modal-body #id_editar_usuario').val(id_usuario)
						modal.find('.modal-body #editar_nombre_usuario').val(nombre)
						modal.find('.modal-body #editar_contrasena_usuario').val(contrasena)
						modal.find('.modal-body #editar_clinica_usuario').val(id_clinica)
						modal.find('.modal-body #editar_privilegio_usuario').val(privilegio)
						$('alert').hide();
					})

    		</script>

    		<script>
    			$(document).ready(function() {
					  $('.editar_usuario').click(function(){

					        var nombre = $(".editar_nombre_usuario").val();

					        if (nombre=="") {
					            $.jAlert({
					            'title': 'Incorrecto!!!',
					            'content': 'Debe ingresar el nombre del usuario!!!',
					            'theme': 'red',
					            'btns': { 'text': 'Cerrar' }
					          }); 
					            $("input").focus();
					            return false;
					        }

					        var contrasena = $(".editar_contrasena_usuario").val();

					         if (contrasena=="") {
					            $.jAlert({
					            'title': 'Incorrecto!!!',
					            'content': 'Debe ingresar la contraseña!!!',
					            'theme': 'red',
					            'btns': { 'text': 'Cerrar' }
					          }); 
					            $("input").focus();
					            return false;
					        }

					        var clinica = $(".editar_clinica_usuario").val();

					         if (clinica=="") {
					            $.jAlert({
					            'title': 'Incorrecto!!!',
					            'content': 'Debe ingresar la clinica!!!',
					            'theme': 'red',
					            'btns': { 'text': 'Cerrar' }
					          }); 
					            $("input").focus();
					            return false;
					        }

					        var privilegio = $(".editar_privilegio_usuario").val();

					         if (privilegio=="") {
					            $.jAlert({
					            'title': 'Incorrecto!!!',
					            'content': 'Debe ingresar el privilegio!!!',
					            'theme': 'red',
					            'btns': { 'text': 'Cerrar' }
					          }); 
					            $("input").focus();
					            return false;
        			}


				        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
				        var obtener = $("#form_usuarios_editar").serialize();

				        $.ajax({
				            type: "POST",
				            url: "../PHP/actualizar_usuarios.php",
				            data: obtener,
				            success: function(response) {
				                //Mensaje de Datos Correctamente Insertados
				                $.jAlert({
				            'title': 'Correcto!!!',
				            'content': 'Usuario actualizado correctamente!!!',
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


    	<!-- Modal editar usuarios -->
  				<div class="modal fade" id="editar_usuarios" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
			      <div class="modal-dialog">
			        <div class="modal-content">
			          <div class="modal-header">
			            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			            <h4 class="modal-title">Editar</h4>
			          </div>
			        <div class="modal-body">
			          <form id="form_usuarios_editar" role="form" method="post" >
			            <div class="form-group">
			              <input id="id_editar_usuario" type="hidden" class="id_editar_usuario form-control"  name="id_editar_usuario" readonly> 
			              <label for="editar_nombre_usuario">Nombre usuario</label>
			              <input id="editar_nombre_usuario" type="text" class="editar_nombre_usuario form-control" name="editar_nombre_usuario" placeholder="Nombre del usuario" required>
			            </div>
			        <div class="form-group">
			              <label for="editar_contrasena_usuario">Contraseña</label>
			              <input id="editar_contrasena_usuario" type="text" class="editar_contrasena_usuario form-control" name="editar_contrasena_usuario" placeholder="Contraseña del usuario" required>
			       </div>
			        <div class="form-group">
			          <label for="clinicas">Clinica</label>
			          <input id="editar_clinica_usuario" type="text" class="editar_clinica_usuario form-control" name="editar_clinica_usuario" placeholder="Clinica del usuario" readonly required>
			        </div>
			        <div class="form-group">
			          <label for="editar_privilegio_usuario">Privilegio</label>          
			          <input id="editar_privilegio_usuario" type="number" class="editar_privilegio_usuario form-control" placeholder="Privilegio del usuario" name="editar_privilegio_usuario" max="1" min="0" required>
			        </div>
			            <button id="editar_usuario" type="text" class="editar_usuario btn btn-default">Editar</button>
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