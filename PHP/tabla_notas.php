<?php

	require_once ("../PHP/config.php");
    $sql = "SELECT * FROM notas";
    $result = $con->query($sql);
                                                    
    if($result->num_rows>0){
        echo "<table class='table table-stripped'>
                <tr>
                  	<th>Id_nota</th>
                   	<th>Id_usuario</th>
                    <th>Titulo</th>
                    <th>Comentario</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
                </tr>
                <tr>";

        while($row=$result->fetch_assoc()) {
            
            echo "<td>".$row["id_nota"]."</td>". 
                 "<td>".$row["id_usuario"]."</td>".
                 "<td>".$row["titulo"]."</td>".
                 "<td>".$row["comentario"]."</td>".
                 "<td>".$row["fecha"]."</td>".
                 "<td><a 
                 		data-id_nota='$row[id_nota]'
                        data-id_usuario='$row[id_usuario]'
                        data-titulo='$row[titulo]'
                        data-comentario='$row[comentario]'
                        data-fecha='$row[fecha]'
                        data-toggle='modal'
                        data-target='#editar_notas_modal'
                        data-toggle='tooltip' title='Haz clic primero en actualizar tabla'
                         ><span class='glyphicon glyphicon-pencil'></span></a>"."&nbsp;&nbsp;".
                 "<a href='#' id='".$row["id_nota"]."' onclick='eliminar_nota(".$row["id_nota"].")'><span class='glyphicon glyphicon-remove'></span></a></td>". 
                 "</tr>";
        }

    } else{
        echo "No hay notas";
    } 

        echo '<script>
            function eliminar_nota(id, data) {
                var id_nota = id;
                console.log(id_nota);

                $.ajax({
                    type: "POST",
                    url: "../PHP/eliminar_notas.php",
                    data: {id_nota: id_nota},
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

                    $('#editar_notas_modal').on('show.bs.modal',function (event) {
                        var button = $(event.relatedTarget)
                        var id_nota = button.data('id_nota') //Boton que activo el modal
                        var id_usuario = button.data('id_usuario') //Extraer la informacion de atributos de datos
                        var titulo = button.data('titulo')
                        var comentario = button.data('comentario')
                        var fecha = button.data('fecha')

                        var modal = $(this)
                        modal.find('.modal-title').text('Modificar Nota:' + id_nota)
                        modal.find('.modal-body #id_editar_nota').val(id_nota)
                        modal.find('.modal-body #usuario_nota_admin').val(id_usuario)
                        modal.find('.modal-body #editar_titulo_nota').val(titulo)
                        modal.find('.modal-body #editar_comentario_nota').val(comentario)
                        modal.find('.modal-body #editar_fecha_nota').val(fecha)
                        $('alert').hide();
                    })

            </script>

            <script>
                $(document).ready(function() {
                      $('.editar_nota_admin').click(function(){

                            var usuario = $(".usuario_nota_admin").val();

                            if (usuario=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el usuario!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var titulo = $(".editar_titulo_nota").val();

                             if (titulo=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el titulo de la nota!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var comentario = $(".editar_comentario_nota").val();

                             if (comentario=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el comentario de la nota!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var fecha = $(".editar_fecha_nota").val();

                             if (fecha=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar la fecha!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                    }


                        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
                        var obtener = $("#form_notas_admin").serialize();

                        $.ajax({
                            type: "POST",
                            url: "../PHP/actualiza_notas_admin.php",
                            data: obtener,
                            success: function(response) {
                                //Mensaje de Datos Correctamente Insertados
                                $.jAlert({
                            'title': 'Correcto!!!',
                            'content': 'Nota actualizada correctamente!!!',
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
                <div class="modal fade" id="editar_notas_modal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Editar</h4>
                      </div>
                    <div class="modal-body">
                      <form id="form_notas_admin" role="form" method="post" >
                    <div class="form-group">
                      <label for="usuario_nota_admin">Tipo Administracion</label>
                      <select name="usuario_nota_admin" id="usuario_nota_admin" class="usuario_nota_admin form-control" required>
                          <option value="">Selecione una opcion...</option>
                          <?php    
                            require('../PHP/usuarios.php');                                   
                          ?>
                      </select>
                    </div>
                        <div class="form-group">
                          <input id="id_editar_nota" type="hidden" class="id_editar_nota form-control"  name="id_editar_nota" readonly> 
                          <label for="editar_titulo_nota">Titulo nota</label>
                          <input id="editar_titulo_nota" type="text" class="editar_titulo_nota form-control" name="editar_titulo_nota" placeholder="Titulo de la nota" required>
                        </div>
                    <div class="form-group">
                      <label for="editar_comentario_nota">Comentario</label>
                      <input id="editar_comentario_nota" type="text" class="editar_comentario_nota form-control" name="editar_comentario_nota" placeholder="Comentario de la nota" required>
                    </div>
                    <div class="form-group">
                      <label for="editar_fecha_nota">Fecha nota</label>
                      <input id="editar_fecha_nota" type="date" class="editar_fecha_nota form-control" name="editar_fecha_nota" placeholder="Fecha de la nota" required>
                    </div>
                        <button id="editar_nota_admin" type="text" class="editar_nota_admin btn btn-default">Editar</button>
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