<?php

	require_once ("../PHP/config.php");
    $sql = "SELECT * FROM info_medicamentos";
    $result = $con->query($sql);
                                                    
    if($result->num_rows>0){
        echo "<table class='table table-stripped'>
                    <tr>
                        <th>Id_medicamento</th>
                        <th>Nombre generico</th>
                        <th>Nombre comercial</th>
                        <th>Id_tipo_medicamento</th>
                        <th>Id_tipo_administracion</th>
                        <th>Opciones</th>
                    </tr>
                    <tr>";

    while($row=$result->fetch_assoc())
        {
            echo "<td>".$row["id_info_medicamento"]."</td>". 
                 "<td>".$row["nombre_generico"]."</td>".
                 "<td>".$row["nombre_comercial"]."</td>".
                 "<td>".$row["id_tipo_medicamento"]."</td>".
                 "<td>".$row["id_tipo_administracion"]."</td>".
                 "<td><a 
                        data-id_medicamento='$row[id_info_medicamento]'
                        data-nombre_generico='$row[nombre_generico]'
                        data-nombre_comercial='$row[nombre_comercial]'
                        data-id_tipo_medicamento='$row[id_tipo_medicamento]'
                        data-id_tipo_administracion='$row[id_tipo_administracion]'
                        data-toggle='modal'
                        data-target='#editar_medicamentos_admin'
                        data-toggle='tooltip' title='Haz clic primero en actualizar tabla'
                 href=''><span class='glyphicon glyphicon-pencil'></span></a>"."&nbsp;&nbsp;".
                 "<a href='#' id='".$row["id_info_medicamento"]."' onclick='eliminar_medicamento(".$row["id_info_medicamento"].")'><span class='glyphicon glyphicon-remove'></span></a></td>".
                 "</tr>";
        }
        } else {
            echo "No hay medicamentos";
        }       

    echo '<script>
            function eliminar_medicamento(id, data) {
                var id_medicamento = id;
                console.log(id_medicamento);

                $.ajax({
                    type: "POST",
                    url: "../PHP/eliminar_medicamentos.php",
                    data: {id_medicamento: id_medicamento},
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
                        url:'../PHP/tabla_medicamentos.php',
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

                    $('#editar_medicamentos_admin').on('show.bs.modal',function (event) {
                        var button = $(event.relatedTarget)
                        var id_medicamento = button.data('id_medicamento') //Boton que activo el modal
                        var nombre_generico = button.data('nombre_generico') //Extraer la informacion de atributos de datos
                        var nombre_comercial = button.data('nombre_comercial')
                        var id_tipo_medicamento = button.data('id_tipo_medicamento')
                        var id_tipo_administracion = button.data('id_tipo_administracion')

                        var modal = $(this)
                        modal.find('.modal-title').text('Modificar Medicamento:' + id_medicamento)
                        modal.find('.modal-body #id_medicamento_editar').val(id_medicamento)
                        modal.find('.modal-body #nombre_generico_editar').val(nombre_generico)
                        modal.find('.modal-body #nombre_comercial_editar').val(nombre_comercial)
                        modal.find('.modal-body #medicamento_tipo_editar').val(id_tipo_medicamento)
                        modal.find('.modal-body #administracion_tipo_editar').val(id_tipo_administracion)
                        $('alert').hide();
                    })

            </script>

            <script>
                $(document).ready(function() {
                      $('.medicamentos_editar').click(function(){

                            var nombre = $(".nombre_generico_editar").val();

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

                            var tipo = $(".medicamento_tipo_editar").val();

                             if (tipo=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el tipo de medicamento!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var tipo_admin = $(".administracion_tipo_editar").val();

                             if (tipo_admin=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el tipo de administracion!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
                        var obtener = $("#form_medicamentos_editar").serialize();

                        $.ajax({
                            type: "POST",
                            url: "../PHP/actualizar_medicamentos.php",
                            data: obtener,
                            success: function(response) {
                                //Mensaje de Datos Correctamente Insertados
                                $.jAlert({
                            'title': 'Correcto!!!',
                            'content': 'Medicamento actualizado correctamente!!!',
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

    <div class="modal fade" id="editar_medicamentos_admin" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="newModalLabel"  aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
            <h4 class="modal-title">Modificar</h4>
          </div>
        <div class="modal-body">
          <form id="form_medicamentos_editar" role="form" method="post" >
        <div class="form-group">
              <label for="nombre_generico_editar">Nombre Generico</label>
              <input id="nombre_generico_editar" type="text" class="nombre_generico_editar form-control" name="nombre_generico_editar" placeholder="Nombre generico" required>
              <input id="id_medicamento_editar" type="hidden" class="id_medicamento_editar form-control" name="id_medicamento_editar" readonly>
       </div>
        <div class="form-group">
              <label for="nombre_comercial_editar">Nombre Comercial</label>
              <input id="nombre_comercial_editar" type="text" class="nombre_comercial_editar form-control" name="nombre_comercial_editar" placeholder="Nombre comercial" required>
       </div>
        <div class="form-group">
          <label for="medicamento_tipo_editar">Tipo Medicamento</label>
          <select name="medicamento_tipo_editar" id="medicamento_tipo_editar" class="medicamento_tipo_editar form-control" required>
              <option value="">Selecione una opcion...</option>
              <?php    
                require('../PHP/tipo_medicamento.php');                                   
              ?>
          </select>
        </div>
        <div class="form-group">
          <label for="administracion_tipo_editar">Tipo Administracion</label>
          <select name="administracion_tipo_editar" id="administracion_tipo_editar" class="administracion_tipo_editar form-control" required>
              <option value="">Selecione una opcion...</option>
              <?php    
                require('../PHP/tipo_admin_medicamento.php');                                   
              ?>
          </select>
        </div>
            <button id="medicamentos_editar" type="text"  class="medicamentos_editar btn btn-default">Editar</button>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<?php

 ?>