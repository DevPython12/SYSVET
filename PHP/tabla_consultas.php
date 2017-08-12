<?php

	require_once ("../PHP/config.php");
    $sql = "SELECT * FROM consultas";
    $result = $con->query($sql);
                                                    
    if($result->num_rows>0){
        echo "<table class='table table-stripped'>
                <tr>
                  	<th>Id_consulta</th>
                   	<th>Id_paciente</th>
                    <th>Id_medico</th>
                    <th>Id_receta</th>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Sintomas</th>
                    <th>Actitud</th>
                    <th>Condicion_cuerpo</th>
                    <th>Hidratacion</th>
                    <th>Mucosas</th>
                    <th>Ojos</th>
                    <th>Oidos</th>
                    <th>Nodulos</th>
                    <th>Piel</th>
                    <th>Locomocion</th>
                    <th>Musculo</th>
                    <th>S_nervioso</th>
                    <th>S_cardiovascular</th>
                    <th>S_respiratorio</th>
                    <th>S_digestivo</th>
                    <th>S_genitourinario</th>
                    <th>Hora</th>
                    <th>Diagnostico</th>
                    <th>Tratamiento</th>
                    <th>Id_consultorio</th>
                    <th>Instrucciones</th>
                    <th>Costo</th>
                    <th>Opciones</th>
                </tr>
                <tr>";

        while($row=$result->fetch_assoc()) {
            
            echo "<td>".$row["id_consulta"]."</td>". 
                 "<td>".$row["id_paciente"]."</td>".
                 "<td>".$row["id_medico"]."</td>".
                 "<td>".$row["id_receta"]."</td>".
                 "<td>".$row["fecha"]."</td>".
                 "<td>".$row["motivo"]."</td>".
                 "<td>".$row["sintomas"]."</td>".
                 "<td>".$row["actitud"]."</td>".
                 "<td>".$row["condicion_cuerpo"]."</td>".
                 "<td>".$row["hidratacion"]."</td>".
                 "<td>".$row["mucosas"]."</td>".
                 "<td>".$row["ojos"]."</td>".
                 "<td>".$row["odios"]."</td>".
                 "<td>".$row["nodulos"]."</td>".
                 "<td>".$row["piel"]."</td>".
                 "<td>".$row["locomocion"]."</td>".
                 "<td>".$row["musculo"]."</td>".
                 "<td>".$row["s_nervioso"]."</td>".
                 "<td>".$row["s_cardiovascular"]."</td>".
                 "<td>".$row["s_respiratorio"]."</td>".
                 "<td>".$row["s_digestivo"]."</td>".
                 "<td>".$row["s_genitourinario"]."</td>".
                "<td>".$row["hora"]."</td>". 
                 "<td>".$row["diagnostico"]."</td>".
                 "<td>".$row["tratamiento"]."</td>".
                 "<td>".$row["id_consultorio"]."</td>".   
                 "<td>".$row["instrucciones"]."</td>". 
                 "<td>".$row["costo"]."</td>".                                
                 "<td><a 
                        data-id_consulta='$row[id_consulta]'
                        data-id_paciente='$row[id_paciente]'
                        data-id_medico='$row[id_medico]'
                        data-id_receta='$row[id_receta]'
                        data-fecha='$row[fecha]'
                        data-motivo='$row[motivo]'
                        data-sintomas='$row[sintomas]'
                        data-actitud='$row[actitud]'
                        data-condicion_cuerpo='$row[condicion_cuerpo]'
                        data-hidratacion='$row[hidratacion]'
                        data-mucosas='$row[mucosas]'
                        data-ojos='$row[ojos]'
                        data-odios='$row[odios]'
                        data-nodulos='$row[nodulos]'
                        data-piel='$row[piel]'
                        data-locomocion='$row[locomocion]'
                        data-musculo='$row[musculo]'
                        data-s_nervioso='$row[s_nervioso]'
                        data-s_cardiovascular='$row[s_cardiovascular]'
                        data-s_respiratorio='$row[s_respiratorio]'
                        data-s_digestivo='$row[s_digestivo]'
                        data-s_genitourinario='$row[s_genitourinario]'
                        data-hora='$row[hora]'
                        data-diagnostico='$row[diagnostico]'
                        data-tratamiento='$row[tratamiento]'
                        data-instrucciones='$row[instrucciones]'
                        data-tratamiento='$row[tratamiento]'
                        data-costo='$row[costo]'                    
                        data-toggle='modal'
                        data-target='#editar_consultas'
                        data-toggle='tooltip' title='Haz clic primero en actualizar tabla' ><span class='glyphicon glyphicon-pencil'></span></a>"."&nbsp;&nbsp;".
                 "<a href='#' id='".$row["id_consulta"]."' onclick='eliminar_consulta(".$row["id_consulta"].")'><span class='glyphicon glyphicon-remove'></span></a></td>". 
                 "</tr>";
        }

    } else{
        echo "No hay consultas";
    } 

    echo '<script>
            function eliminar_consulta(id, data) {
                var id_consulta = id;
                console.log(id_consulta);

                $.ajax({
                    type: "POST",
                    url: "../PHP/eliminar_consulta.php",
                    data: {id_consulta: id_consulta},
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
                        url:'../PHP/tabla_consultas.php',
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

                    $('#editar_consultas').on('show.bs.modal',function (event) {
                        var button = $(event.relatedTarget)
                        var id_consulta = button.data('id_consulta') //Boton que activo el modal
                        var id_paciente = button.data('id_paciente') //Extraer la informacion de atributos de datos
                        var id_medico = button.data('id_medico')
                        var id_receta = button.data('id_receta')
                        var fecha = button.data('fecha')
                        var motivo = button.data('motivo')
                        var sintomas = button.data('sintomas')
                        var actitud = button.data('actitud')
                        var condicion_cuerpo = button.data('condicion_cuerpo')
                        var hidratacion = button.data('hidratacion')
                        var mucosas = button.data('mucosas')
                        var ojos = button.data('ojos')
                        var odios = button.data('odios')
                        var nodulos = button.data('nodulos')
                        var piel = button.data('piel')
                        var locomocion = button.data('locomocion')
                        var musculo = button.data('musculo')
                        var s_nervioso = button.data('s_nervioso')
                        var s_cardiovascular = button.data('s_cardiovascular')
                        var s_respiratorio = button.data('s_respiratorio')
                        var s_digestivo = button.data('s_digestivo')
                        var s_genitourinario = button.data('s_genitourinario')
                        var hora = button.data('hora')
                        var diagnostico = button.data('diagnostico')
                        var instrucciones = button.data('instrucciones')
                        var tratamiento = button.data('tratamiento')
                        var costo = button.data('costo')                        

                        var modal = $(this)
                        modal.find('.modal-title').text('Modificar Consulta:' + id_consulta)
                        modal.find('.modal-body #id_editar_consulta').val(id_consulta)
                        modal.find('.modal-body #consulta_masc_editar').val(id_paciente)
                        modal.find('.modal-body #consulta_vet_editar').val(id_medico)
                        modal.find('.modal-body #consulta_rec_editar').val(id_receta)
                        modal.find('.modal-body #editar_fecha_cons').val(fecha)
                        modal.find('.modal-body #editar_motivo_consulta').val(motivo)
                        modal.find('.modal-body #editar_sintomas_consulta').val(sintomas)
                        modal.find('.modal-body #editar_actitud_consulta').val(actitud)
                        modal.find('.modal-body #editar_corporal_consulta').val(condicion_cuerpo)
                        modal.find('.modal-body #editar_hidratacion_consulta').val(hidratacion)
                        modal.find('.modal-body #editar_mucosas_consulta').val(mucosas)
                        modal.find('.modal-body #editar_ojos_consulta').val(ojos)
                        modal.find('.modal-body #editar_oidos_consulta').val(odios)
                        modal.find('.modal-body #editar_linfaticos_consulta').val(nodulos)
                        modal.find('.modal-body #editar_piel_consulta').val(piel)
                        modal.find('.modal-body #editar_locomocion_consulta').val(locomocion)
                        modal.find('.modal-body #editar_musculo_consulta').val(musculo)
                        modal.find('.modal-body #editar_nervioso_consulta').val(s_nervioso)
                        modal.find('.modal-body #editar_respiratorio_consulta').val(s_respiratorio)
                        modal.find('.modal-body #editar_cardiovascular_consulta').val(s_cardiovascular)
                        modal.find('.modal-body #editar_digestivo_consulta').val(s_digestivo)
                        modal.find('.modal-body #editar_genitourinario_consulta').val(s_genitourinario)
                        modal.find('.modal-body #editar_hora_consulta').val(hora)
                        modal.find('.modal-body #editar_diagnostico').val(diagnostico)
                        modal.find('.modal-body #editar_instrucciones').val(instrucciones)
                        modal.find('.modal-body #editar_tratamiento').val(tratamiento)
                        modal.find('.modal-body #editar_costo_consulta').val(costo)
                        $('alert').hide();
                    })

            </script>

            <script>
                $(document).ready(function() {
                      $('.editar_consulta').click(function(){

                            var mascota = $(".consulta_masc_editar").val();

                            if (mascota=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar la mascota!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var veterinario= $(".consulta_vet_editar").val();

                             if (veterinario=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el veterinario!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var receta = $(".consulta_rec_editar").val();

                             if (receta=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar la receta!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var motivo = $(".editar_motivo_consulta").val();

                             if (motivo=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el motivo!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                    }

                            var sintomas = $(".editar_sintomas_consulta").val();

                             if (sintomas=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar los sintomas!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var diagnostico = $(".editar_diagnostico").val();

                             if (diagnostico=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el diagnostico!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                            }

                            var tratamiento = $(".editar_tratamiento").val();

                             if (tratamiento=="") {
                                $.jAlert({
                                'title': 'Incorrecto!!!',
                                'content': 'Debe ingresar el tratamiento!!!',
                                'theme': 'red',
                                'btns': { 'text': 'Cerrar' }
                              }); 
                                $("input").focus();
                                return false;
                    }


                        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
                        var obtener = $("#form_editar_consultas").serialize();

                        $.ajax({
                            type: "POST",
                            url: "../PHP/actualizar_consultas.php",
                            data: obtener,
                            success: function(response) {
                                //Mensaje de Datos Correctamente Insertados
                                $.jAlert({
                            'title': 'Correcto!!!',
                            'content': 'Consulta actualizada correctamente!!!',
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
                <div class="modal fade" id="editar_consultas" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Editar</h4>
                    <div class="modal-body">
            <form id="form_editar_consultas" method="POST">
                <div class="col-xs-12 col-md-12 col-sm-12">
                      <label for="consulta_masc_editar">Mascota</label>
                      <select name="consulta_masc_editar" id="consulta_masc_editar" class="consulta_masc_editar form-control" required>
                          <option value="">Selecione una opcion...</option>
                          <?php    
                            require('../PHP/pacientes.php');                                   
                          ?>
                      </select>
                </div>

                  <div class="col-xs-12 col-md-12 col-sm-12">
                      <label for="consulta_vet_editar">Veterinario</label>
                      <select name="consulta_vet_editar" id="consulta_vet_editar" class="consulta_vet_editar form-control" required>
                          <option value="">Selecione una opcion...</option>
                          <?php    
                            require('../PHP/veterinarios.php');                                   
                          ?>
                      </select>
                    </div>
                 
                  <div class="col-xs-12 col-md-12 col-sm-12">
                      <label for="consulta_rec_editar">Recetas</label>
                      <select name="consulta_rec_editar" id="consulta_rec_editar" class="consulta_rec_editar form-control" required>
                          <option value="">Selecione una opcion...</option>
                          <?php    
                            require('../PHP/recetas.php');                                   
                          ?>
                      </select><br />
                    </div>


                  <div class="col-xs-12 col-md-12 col-sm-12">
                  <h5><label>Detalles de la Consulta</label></h5>

                    <div class="input-group col-md-4">
                        <label>Fecha de consulta</label>                 
                        <input id="editar_fecha_cons" class="editar_fecha_cons form-control" name="editar_fecha_cons" placeholder="YYYY/MM/DD" type="date" data-toggle="tooltip" title="Fecha de consulta!"/>
                        <input id="id_editar_consulta" type="hidden" name="id_editar_consulta" class="id_editar_consulta form-control" readonly><br />
                    </div><br />

                  <div class="col-md-4">                     
                      <label>Hora</label>                                            
                      <input id="editar_hora_consulta" type="time" name="editar_hora_consulta" class="editar_hora_consulta form-control" placeholder="Hora de consulta"/><br />
                  </div>
                                
                    <div class="col-md-9">
                      <label>Motivo consulta</label>
                      <input id="editar_motivo_consulta" type="text" name="editar_motivo_consulta" class="editar_motivo_consulta form-control" placeholder="¿Cuál es el motivo de la consulta?"><br />
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>Sintomas</label>
                        <textarea id="editar_sintomas_consulta" class="editar_sintomas_consulta form-control" name="editar_sintomas_consulta" rows="3" placeholder="Empieza a escribir..."></textarea><br>        
                    </div>
  
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <h4><label>Examen físico</label></h4>
                      
                       <div class="col-md-3">
                        <label>Actitud</label>
                        <textarea id="editar_actitud_consulta" class="editar_actitud_consulta form-control" name="editar_actitud_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                      <div class="col-md-3">
                        <label>Condición corporal</label>
                        <textarea id="editar_corporal_consulta" class="editar_corporal_consulta form-control" name="editar_corporal_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                      <div class="col-md-3">
                        <label>Hidratación</label>
                        <textarea id="editar_hidratacion_consulta" class="editar_hidratacion_consulta form-control" name="editar_hidratacion_consulta" rows="3" placeholder="Descripcion..."></textarea><br>                    
                      </div>

                      <div class="col-md-3">
                        <label>Mucosas</label>
                        <textarea id="editar_mucosas_consulta" class="editar_mucosas_consulta form-control" name="editar_mucosas_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                       <div class="col-md-3">
                        <label>Ojos</label>
                        <textarea id="editar_ojos_consulta" class="editar_ojos_consulta form-control" name="editar_ojos_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                      <div class="col-md-3">
                        <label>Oídos</label>
                        <textarea id="editar_oidos_consulta" class="editar_oidos_consulta form-control" name="editar_oidos_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                      <div class="col-md-3">
                        <label>Nódulos linfáticos</label>
                        <textarea id="editar_linfaticos_consulta" class="editar_linfaticos_consulta form-control" name="editar_linfaticos_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                      <div class="col-md-3">
                        <label>Piel</label>
                        <textarea id="editar_piel_consulta" class="editar_piel_consulta form-control" name="editar_piel_consulta" rows="3" placeholder="Descripcion..."></textarea><br>                     
                      </div>

                      <div class="col-md-3">
                        <label>Locomoción</label>
                        <textarea id="editar_locomocion_consulta" class="editar_locomocion_consulta form-control" name="editar_locomocion_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                       <div class="col-md-3">
                        <label>Musculo esquelético</label>
                        <textarea id="editar_musculo_consulta" class="editar_musculo_consulta form-control" name="editar_musculo_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                      <div class="col-md-3">
                        <label>Sistema nervioso</label>
                        <textarea id="editar_nervioso_consulta" class="editar_nervioso_consulta form-control" name="editar_nervioso_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                       <div class="col-md-3">
                        <label>Sistema cardiovascular</label>
                        <textarea id="editar_cardiovascular_consulta" class="editar_cardiovascular_consulta form-control" name="editar_cardiovascular_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                       <div class="col-md-3">
                        <label>Sistema respiratorio</label>
                        <textarea id="editar_respiratorio_consulta" class="editar_respiratorio_consulta form-control" name="editar_respiratorio_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                      <div class="col-md-3">
                        <label>Sistema digestivo</label>
                        <textarea id="editar_digestivo_consulta" class="editar_digestivo_consulta form-control" name="editar_digestivo_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>

                       <div class="col-md-3">
                        <label>Sistema genitourinario </label>
                        <textarea id="editar_genitourinario_consulta" class="editar_genitourinario_consulta form-control" name="editar_genitourinario_consulta" rows="3" placeholder="Descripcion..."></textarea><br>
                      </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <h4><label>Diagnostico</label></h4>
              <div class="col-md-12">
                  <textarea id="editar_diagnostico" type="textarea" name="editar_diagnostico" class="editar_diagnostico form-control" rows="3" placeholder="Empieza a escribir..."></textarea><br>       
              </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <h4><label>Tratamiento</label></h4>
              <div class="col-md-12">
                  <textarea id="editar_tratamiento" type="textarea" name="editar_tratamiento" class="editar_tratamiento form-control" rows="3" placeholder="Empieza a escribir..."></textarea><br>       
              </div>                      

                  <div class="col-md-12">  
                    <label>Instrucciones medicas</label>                
                    <textarea id="editar_instrucciones" type="textarea" name="editar_instrucciones" class="editar_instrucciones form-control" rows="3" placeholder="Empieza a escribir..."></textarea><br>
                  </div>

                  <div class="col-md-3"> 
                    <label>Costo consulta</label>
                    <input id="editar_costo_consulta" type="number" name="editar_costo_consulta" class="editar_costo_consulta form-control" placeholder="Costo consulta" min="0"><br />
                  </div>

                  <div class="col-md-12">
                    <button id="editar_consulta" type="text" class="editar_consulta btn btn-default" name="editar_consulta" >Editar</button>
                  </div>
                 </div>  
                  </form>
                    </div>

                    </div>
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