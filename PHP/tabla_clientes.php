<?php

    require_once ("../PHP/config.php");
    $sql = "SELECT * FROM  clientes";
    $result = $con->query($sql);
                                                    
    if($result->num_rows>0){
        echo "<table class='table table-stripped'>
                <tr>
                    <th>Id_cliente</th>
                     <th>Nombre</th>
                     <th>Apellido Paterno</th>
                     <th>Apellido Materno</th>
                     <th>Fecha Nacimiento</th>
                     <th>Direccion</th>
                     <th>Telefono</th>
                     <th>Movil</th>
                     <th>Opciones</th>
                </tr>
                <tr>";

        while($row=$result->fetch_assoc()) {
            
            echo "<td>".$row["id_cliente"]."</td>". 
                  "<td>".$row["nombre"]."</td>".
                   "<td>".$row["apellido_paterno"]."</td>".
                   "<td>".$row["apellido_materno"]."</td>".
                   "<td>".$row["fecha_nacimiento"]."</td>".
                   "<td>".$row["direccion"]."</td>".
                    "<td>".$row["telefono"]."</td>".
                     "<td>".$row["movil"]."</td>".
                        "<td><a 
                        data-id_cliente='$row[id_cliente]'
                        data-nombre='$row[nombre]'
                        data-apellido_paterno='$row[apellido_paterno]'
                        data-apellido_materno='$row[apellido_materno]'
                        data-fecha_nacimiento='$row[fecha_nacimiento]'
                        data-direccion='$row[direccion]'
                        data-telefono='$row[telefono]'
                        data-movil='$row[movil]''
                        data-toggle='modal'
                        data-target='#editar_clientes'
                        data-toggle='tooltip' title='Haz clic primero en actualizar tabla'
                         ><span class='glyphicon glyphicon-pencil'></span></a>"."&nbsp;&nbsp;".
                 "<a href='#' id='".$row["id_cliente"]."' onclick='eliminar_cliente(".$row["id_cliente"].")'><span class='glyphicon glyphicon-remove'></span></a></td>". 
                 "</tr>";
        }

    } else{
        echo "No hay clientes";
    } 

    echo '<script>
            function eliminar_cliente(id, data) {
                var id_cliente = id;
                console.log(id_cliente);

                $.ajax({
                    type: "POST",
                    url: "../PHP/eliminar_cliente.php",
                    data: {id_cliente: id_cliente},
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
                        url:'../PHP/tabla_clientes.php',
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

                    $('#editar_clientes').on('show.bs.modal',function (event) {
                        var button = $(event.relatedTarget)
                        var id_cliente = button.data('id_cliente') //Boton que activo el modal
                        var nombre = button.data('nombre') //Extraer la informacion de atributos de datos
                        var apellido_paterno = button.data('apellido_paterno')
                        var apellido_materno = button.data('apellido_materno')
                        var fecha_nacimiento = button.data('fecha_nacimiento')
                        var direccion = button.data('direccion')
                        var telefono = button.data('telefono')
                        var movil = button.data('movil')

                        var modal = $(this)
                        modal.find('.modal-title').text('Modificar Cliente:' + nombre + " " + apellido_paterno + " " + apellido_materno)
                        modal.find('.modal-body #id_clientes_editar').val(id_cliente)
                        modal.find('.modal-body #nombre_clientes_editar').val(nombre)
                        modal.find('.modal-body #paterno_clientes_editar').val(apellido_paterno)
                        modal.find('.modal-body #materno_clientes_editar').val(apellido_materno)
                        modal.find('.modal-body #fecha_clientes_editar').val(fecha_nacimiento)
                        modal.find('.modal-body #direccion_clientes_editar').val(direccion)
                        modal.find('.modal-body #telefono_clientes_editar').val(telefono)
                        modal.find('.modal-body #movil_clientes_editar').val(movil)
                        $('alert').hide();
                    })

            </script>

            <script>
                $(document).ready(function() {
                      $('.editar_clientes_admin').click(function(){

                            var nombre = $(".nombre_clientes_editar").val();

                            if (nombre=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el nombre del cliente!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var a_paterno = $(".paterno_clientes_editar").val();

                             if (a_paterno=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el Apellido paterno!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var fecha = $(".fecha_clientes_editar").val();

                             if (fecha=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar la fecha de nacimiento!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }


                        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
                        var obtener = $("#form_clientess_editar").serialize();

                        $.ajax({
                            type: "POST",
                            url: "../PHP/actualizar_clientes.php",
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


      <!-- Modal editar medicos -->
          <div class="modal fade" id="editar_clientes" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Editar</h4>
                </div>
              <div class="modal-body">
                  <form id="form_clientess_editar" role="form" method="post" >
                  <div class="form-group">
                        <label for="nombre_clientes_editar">Nombre cliente</label>
                        <input id="nombre_clientes_editar" type="text" class="nombre_clientes_editar form-control" name="nombre_clientes_editar" placeholder="Nombre del cliente" required>
                        <input id="id_clientes_editar" type="hidden" class="id_clientes_editar form-control" name="id_clientes_editar" readonly>
                  </div>
                  <div class="form-group">
                        <label for="paterno_clientes_editar">Apellido paterno cliente</label>
                        <input id="paterno_clientes_editar" type="text" class="paterno_clientes_editar form-control" name="paterno_clientes_editar" placeholder="Apellido paterno del cliente" required>
                  </div>
                  <div class="form-group">
                        <label for="materno_clientes_editar">Apellido materno cliente</label>
                        <input id="materno_clientes_editar" type="text" class="materno_clientes_editar form-control" name="materno_clientes_editar" placeholder="Apellido materno del cliente" >
                  </div>
                  <div class="form-group">
                        <label for="fecha_clientes_editar">Fecha de nacimiento cliente</label>
                        <input id="fecha_clientes_editar" type="date" class="fecha_clientes_editar form-control" name="fecha_clientes_editar" placeholder="Fecha de nacimiento del cliente" required>
                  </div>
                  <div class="form-group">
                        <label for="direccion_clientes_editar">Direccion cliente</label>
                        <input id="direccion_clientes_editar" type="text" class="direccion_clientes_editar form-control" name="direccion_clientes_editar" placeholder="Direccion del cliente" >
                  </div>
                  <div class="form-group">
                        <label for="telefono_clientes_editar">Telefono cliente</label>
                        <input id="telefono_clientes_editar" type="text" class="telefono_clientes_editar form-control" name="telefono_clientes_editar" placeholder="Telefono del cliente">
                  </div>
                  <div class="form-group">
                        <label for="movil_clientes_editar">Movil cliente</label>
                        <input id="movil_clientes_editar" type="text" class="movil_clientes_editar form-control" name="movil_clientes_editar" placeholder="Celular del cliente">
                  </div>
                    <button id="editar_clientes_admin" type="text"  class="editar_clientes_admin btn btn-default">Editar</button>
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