<?php

    require_once ("../PHP/config.php");
    $sql = "SELECT * FROM datos_empleados";
    $result = $con->query($sql);
                                                    
    if($result->num_rows>0){
        echo "<table class='table table-stripped'>
                <tr>
                    <th>Id_empleado</th>
                     <th>Nombre</th>
                     <th>Apellido Paterno</th>
                     <th>Apellido Materno</th>
                     <th>Fecha Nacimiento</th>
                     <th>Direccion</th>
                     <th>Telefono</th>
                     <th>Movil</th>
                     <th>CURP</th>
                     <th>RFC</th>
                     <th>Sexo</th>
                     <th>Opciones</th>
                </tr>
                <tr>";

        while($row=$result->fetch_assoc()) {
            
            echo "<td>".$row["id_empleado"]."</td>". 
                  "<td>".$row["nombre"]."</td>".
                   "<td>".$row["apellido_paterno"]."</td>".
                   "<td>".$row["apellido_materno"]."</td>".
                   "<td>".$row["fecha_nacimiento"]."</td>".
                   "<td>".$row["direccion"]."</td>".
                    "<td>".$row["telefono"]."</td>".
                     "<td>".$row["movil"]."</td>".
                    "<td>".$row["curp"]."</td>".
                     "<td>".$row["rfc"]."</td>".
                    "<td>".$row["sexo"]."</td>".
                        "<td><a 
                        data-id_empleado='$row[id_empleado]'
                        data-nombre='$row[nombre]'
                        data-apellido_paterno='$row[apellido_paterno]'
                        data-apellido_materno='$row[apellido_materno]'
                        data-fecha_nacimiento='$row[fecha_nacimiento]'
                        data-direccion='$row[direccion]'
                        data-telefono='$row[telefono]'
                        data-movil='$row[movil]'
                        data-curp='$row[curp]'
                        data-rfc='$row[rfc]'
                        data-sexo='$row[sexo]'
                        data-toggle='modal'
                        data-target='#editar_empleados'
                        data-toggle='tooltip' title='Haz clic primero en actualizar tabla'
                         ><span class='glyphicon glyphicon-pencil'></span></a>"."&nbsp;&nbsp;".
                 "<a href='#' id='".$row["id_empleado"]."' onclick='eliminar_empleado(".$row["id_empleado"].")'><span class='glyphicon glyphicon-remove'></span></a></td>". 
                 "</tr>";
        }

    } else{
        echo "No hay empleados";
    } 

        echo '<script>
            function eliminar_empleado(id, data) {
                var id_empleado = id;
                console.log(id_empleado);

                $.ajax({
                    type: "POST",
                    url: "../PHP/eliminar_empleados.php",
                    data: {id_empleado: id_empleado},
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
                        url:'../PHP/tabla_empleados.php',
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

                    $('#editar_empleados').on('show.bs.modal',function (event) {
                        var button = $(event.relatedTarget)
                        var id_empleado = button.data('id_empleado') //Boton que activo el modal
                        var nombre = button.data('nombre') //Extraer la informacion de atributos de datos
                        var apellido_paterno = button.data('apellido_paterno')
                        var apellido_materno = button.data('apellido_materno')
                        var fecha_nacimiento = button.data('fecha_nacimiento')
                        var direccion = button.data('direccion')
                        var telefono = button.data('telefono')
                        var movil = button.data('movil')
                        var curp = button.data('curp')
                        var rfc = button.data('rfc')
                        var sexo = button.data('sexo')

                        var modal = $(this)
                        modal.find('.modal-title').text('Modificar Empleado:' + nombre + " " + apellido_paterno + " " + apellido_materno)
                        modal.find('.modal-body #id_empleado_editar').val(id_empleado)
                        modal.find('.modal-body #nombre_empleado_editar').val(nombre)
                        modal.find('.modal-body #paterno_empleado_editar').val(apellido_paterno)
                        modal.find('.modal-body #materno_empleado_editar').val(apellido_materno)
                        modal.find('.modal-body #fecha_empleado_editar').val(fecha_nacimiento)
                        modal.find('.modal-body #direccion_empleado_editar').val(direccion)
                        modal.find('.modal-body #telefono_empleado_editar').val(telefono)
                        modal.find('.modal-body #movil_empleado_editar').val(movil)
                        modal.find('.modal-body #curp_empleado_editar').val(curp)
                        modal.find('.modal-body #rfc_empleado_editar').val(rfc)
                        modal.find('.modal-body #sexo_empleado_editar').val(sexo)
                        $('alert').hide();
                    })

            </script>

            <script>
                $(document).ready(function() {
                      $('.editar_empleado_admin').click(function(){

                            var nombre = $(".nombre_empleado_editar").val();

                            if (nombre=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el nombre del empleado!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var a_paterno = $(".paterno_empleado_editar").val();

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

                            var fecha = $(".fecha_empleado_editar").val();

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
                        var obtener = $("#form_empleados_editar").serialize();

                        $.ajax({
                            type: "POST",
                            url: "../PHP/actualizar_empleados.php",
                            data: obtener,
                            success: function(response) {
                                //Mensaje de Datos Correctamente    Insertados
                                $.jAlert({
                            'title': 'Correcto!!!',
                            'content': 'Empleado actualizado correctamente!!!',
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
          <div class="modal fade" id="editar_empleados" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Editar</h4>
                </div>
              <div class="modal-body">
                  <form id="form_empleados_editar" role="form" method="post" >
                  <div class="form-group">
                        <label for="nombre_empleado_editar">Nombre empleado</label>
                        <input id="nombre_empleado_editar" type="text" class="nombre_empleado_editar form-control" name="nombre_empleado_editar" placeholder="Nombre del empleado" required>
                        <input id="id_empleado_editar" type="hidden" class="id_empleado_editar form-control" name="id_empleado_editar" readonly>
                  </div>
                  <div class="form-group">
                        <label for="paterno_empleado_editar">Apellido paterno empleado</label>
                        <input id="paterno_empleado_editar" type="text" class="paterno_empleado_editar form-control" name="paterno_empleado_editar" placeholder="Apellido paterno del empleado" required>
                  </div>
                  <div class="form-group">
                        <label for="materno_empleado_editar">Apellido materno empleado</label>
                        <input id="materno_empleado_editar" type="text" class="materno_empleado_editar form-control" name="materno_empleado_editar" placeholder="Apellido materno del empleado" >
                  </div>
                  <div class="form-group">
                        <label for="fecha_empleado_editar">Fecha de nacimiento empleado</label>
                        <input id="fecha_empleado_editar" type="date" class="fecha_empleado_editar form-control" name="fecha_empleado_editar" placeholder="Fecha de nacimiento del empleado" required>
                  </div>
                  <div class="form-group">
                        <label for="direccion_empleado_editar">Direccion empleado</label>
                        <input id="direccion_empleado_editar" type="text" class="direccion_empleado_editar form-control" name="direccion_empleado_editar" placeholder="Direccion del empleado" >
                  </div>
                  <div class="form-group">
                        <label for="telefono_empleado_editar">Telefono empleado</label>
                        <input id="telefono_empleado_editar" type="text" class="telefono_empleado_editar form-control" name="telefono_empleado_editar" placeholder="Telefono del empleado">
                  </div>
                  <div class="form-group">
                        <label for="movil_empleado_editar">Movil empleado</label>
                        <input id="movil_empleado_editar" type="text" class="movil_empleado_editar form-control" name="movil_empleado_editar" placeholder="Celular del empleado">
                  </div>
                  <div class="form-group">
                        <label for="curp_empleado_editar">CURP empleado</label>
                        <input id="curp_empleado_editar" type="text" class="curp_empleado_editar form-control" name="curp_empleado_editar" placeholder="CURP del empleado" >
                  </div>
                  <div class="form-group">
                        <label for="rfc_empleado_editar">RFC empleado</label>
                        <input id="rfc_empleado_editar" type="text" class="rfc_empleado_editar form-control" name="rfc_empleado_editar" placeholder="RFC del empleado">
                  </div>
                  <div class="form-group">
                        <label for="sexo_empleado_editar">Sexo empleado</label>
                        <input id="sexo_empleado_editar" type="text" class="sexo_empleado_editar form-control" name="sexo_empleado_editar" placeholder="Sexo del empleado" readonly>
                  </div>
                    <button id="editar_empleado_admin" type="text"  class="editar_empleado_admin btn btn-default">Editar</button>
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