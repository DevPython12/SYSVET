<?php

	require_once ("../PHP/config.php");
    $sql = "SELECT * FROM medicos";
    $result = $con->query($sql);
                                                    
    if($result->num_rows>0){
        echo "<table class='table table-stripped'>
                <tr>
                  	<th>Id_medico</th>
                   	<th>Id_empleado</th>
                    <th>Cedula</th>
                    <th>Opciones</th>
                </tr>
                <tr>";

        while($row=$result->fetch_assoc()) {
            
            echo "<td>".$row["id_medico"]."</td>". 
                 "<td>".$row["id_empleado"]."</td>".
                 "<td>".$row["cedula"]."</td>".
                 "<td><a 
                 		data-id_medico='$row[id_medico]'
                        data-id_empleado='$row[id_empleado]'
                        data-cedula='$row[cedula]'
                        data-toggle='modal'
                        data-target='#editar_medicos'
                        data-toggle='tooltip' title='Haz clic primero en actualizar tabla'
                         ><span class='glyphicon glyphicon-pencil'></span></a>"."&nbsp;&nbsp;".
                 "<a href='#' id='".$row["id_medico"]."' onclick='eliminar_medico(".$row["id_medico"].")';><span class='glyphicon glyphicon-remove'></span></a></td>". 
                 "</tr>";
        }

    } else{
        echo "No hay medicos";
    } 

        echo '<script>
            function eliminar_medico(id, data) {
                var id_medico = id;
                console.log(id_medico);

                $.ajax({
                    type: "POST",
                    url: "../PHP/eliminar_medicos.php",
                    data: {id_medico: id_medico},
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
            url:'../PHP/tabla_medicos.php',
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

          $('#editar_medicos').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget)
            var id_medico = button.data('id_medico') //Boton que activo el modal
            var id_empleado = button.data('id_empleado') //Extraer la informacion de atributos de datos
            var cedula = button.data('cedula')

            var modal = $(this)
            modal.find('.modal-title').text('Modificar Medico:' + id_medico)
            modal.find('.modal-body #id_medicos_editar').val(id_medico)
            modal.find('.modal-body #empleado_medico_editar').val(id_empleado)
            modal.find('.modal-body #cedula_medicos_editar').val(cedula)
            $('alert').hide();
          })

        </script>

        <script>
          $(document).ready(function() {
            $('.editar_medico').click(function(){

                  var empleado = $(".empleado_medico_editar").val();

                   if (empleado=="") {
                      $.jAlert({
                      'title': 'Incorrecto!!!',
                      'content': 'Debe ingresar el empleado!!!',
                      'theme': 'red',
                      'btns': { 'text': 'Cerrar' }
                    }); 
                      $("input").focus();
                      return false;
                  }

                  var cedula = $(".cedula_medicos_editar").val();

                   if (cedula=="") {
                      $.jAlert({
                      'title': 'Incorrecto!!!',
                      'content': 'Debe ingresar la cedula!!!',
                      'theme': 'red',
                      'btns': { 'text': 'Cerrar' }
                    }); 
                      $("input").focus();
                      return false;
              }


                //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
                var obtener = $("#form_medicos_editar").serialize();

                $.ajax({
                    type: "POST",
                    url: "../PHP/actualizar_medicos.php",
                    data: obtener,
                    success: function(response) {
                        //Mensaje de Datos Correctamente Insertados
                        $.jAlert({
                    'title': 'Correcto!!!',
                    'content': 'Medico actualizado correctamente!!!',
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


      <!-- Modal editar medicos -->
          <div class="modal fade" id="editar_medicos" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Editar</h4>
                </div>
              <div class="modal-body">
                  <form id="form_medicos_editar" role="form" method="post" >
                  <div class="form-group">
                    <label for="empleado_medico_editar">Empleado</label>
                    <select name="empleado_medico_editar" id="empleado_medico_editar" class="empleado_medico_editar form-control" required>
                        <option value="">Selecione una opcion...</option>
                        <?php    
                          require_once('../PHP/empleados.php');                                   
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                        <label for="cedula_medicos_editar">Cedula</label>
                        <input id="cedula_medicos_editar" type="number" class="cedula_medicos_editar form-control" name="cedula_medicos_editar" placeholder="Cedula del medico" required>
                        <input id="id_medicos_editar" type="hidden" class="id_medicos_editar form-control" name="id_medicos_editar" readonly>
                  </div>
                    <button id="editar_medico" type="text"  class="editar_medico btn btn-default">Editar</button>
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