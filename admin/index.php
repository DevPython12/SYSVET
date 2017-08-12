<?php

  //require('../PHP/config.php');

  session_start();

  if($_SESSION['username'] == ""){

    header("Location: ../index.php");

  }

?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel Administrativo</title>
<<<<<<< HEAD

=======
<<<<<<< HEAD
>>>>>>> origin/gh-pages
    <link href="../bootstrap337/css/bootstrap.min.css" rel="stylesheet">\

    <link rel="stylesheet" href="../estilos1.css">

    <link rel="stylesheet" href="../bootstrap-datepicker3.css"/>

    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->

    <link rel="stylesheet" href="../bootstrap-iso.css" /> 

    <!--Font Awesome (added because you use icons in your prepend/append)-->

    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" /> 

    <link rel="stylesheet" href="../jquery-ui.css">

    <link rel="stylesheet" href="../jAlert/dist/jAlert.css" />

    <script type="text/javascript" src="../js/jquery-1.12.4.js"></script>

    <script type="text/javascript" src="../js/jquery-ui.js"></script>

    <script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="../js/refrescar_div.js"></script>

    <script type="text/javascript" src="../js/insertar_usuarios.js"></script>

    <script type="text/javascript" src="../js/hora.js"></script>

    <script type="text/javascript" src="../js/cliente.js"></script> 

    <script type="text/javascript" src="../js/mascotas.js"></script>

    <script type="text/javascript" src="../js/medicos.js"></script>

    <script type="text/javascript" src="../js/medicamentos.js"></script>

    <script type="text/javascript" src="../js/medicamentos_nuevos.js"></script>

    <script type="text/javascript" src="../js/enfermedades.js"></script>

    <script type="text/javascript" src="../js/recargar_diagnostico.js"></script>

    <script type="text/javascript" src="../js/recargar_receta.js"></script>

    <script type="text/javascript" src="../js/diagnostico_id.js"></script>

    <script type="text/javascript" src="../js/receta_id.js"></script>

    <script type="text/javascript" src="../js/mascota_id.js"></script>

    <script type="text/javascript" src="../js/mascotas_vacunas.js"></script>

    <script type="text/javascript" src="../js/mascotas_consultas.js"></script>

    <script type="text/javascript" src="../js/mascotas_historial.js"></script>

    <script type="text/javascript" src="../js/cliente_consulta.js"></script>  

    <script type="text/javascript" src="../js/insertar_clientes.js"></script>

    <script type="text/javascript" src="../js/insertar_notas.js"></script>

    <script type="text/javascript" src="../js/insertar_medicamento.js"></script>  

    <script type="text/javascript" src="../js/insertar_mascotas.js"></script>

    <script type="text/javascript" src="../js/insertar_consultas.js"></script>

    <script type="text/javascript" src="../js/insertar_recetas.js"></script>

    <script type="text/javascript" src="../js/eliminar_mascotas.js"></script>

    <script type="text/javascript" src="../js/actualizar_mascotas.js"></script>

    <script type="text/javascript" src="../js/actualizar_notas.js"></script>

    <script type="text/javascript" src="../js/insertar_vacunas.js"></script>

    <script type="text/javascript" src="../js/insertar_medicos.js"></script>

    <script type="text/javascript" src="../js/insertar_diagnosticos.js"></script>

    <script type="text/javascript" src="../js/insertar_empleados.js"></script>

    <script type="text/javascript" src="../js/insertar_notas_admin.js"></script>

    <script type="text/javascript" src="../js/insertar_medicamentos_admin.js"></script>

    <script type="text/javascript" src="../js/insertar_vacuna_admin.js"></script>
<<<<<<< HEAD

=======
=======
	<link href="../bootstrap337/css/bootstrap.min.css" rel="stylesheet">
	 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="../estilos1.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap337/css/bootstrap.css">	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
>>>>>>> origin/gh-pages
>>>>>>> origin/gh-pages
</head>

<body><br><br>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><!--opciones de navegacion del navbar-->

    <div class="container-fluid">

            <div class="navbar-header"><!--navbar con el logo de la clinica-->

              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

                <span class="sr-only">Desplegar navegación</span>

                <span class="glyphicon glyphicon-th"></span>

              </button>

              <a class="navbar-brand-ext" href="index.php">

                <div class="navbar-brand"></div>

                <img src="../logoclinica2.jpg" width="90px" alt=""></a>

            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse"><!--navbar-->

              <ul class="nav navbar-nav navbar-right">

                <li class="active"><a data-toggle="tab" href="#Inicio">Inicio</a></li>

                <li><a href="#Administracion" data-toggle="tab">Administracion</a></li>             

                <li><a data-toggle="tab" href="#Consultas">Consultas</a></li>

                <li><a data-toggle="tab" href="#Historial">Historial Clinico</a></li>

                <li class="dropdown"><!--aqui empieza el menu del navbar para los clientes-->

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    Clientes

                     <b class="caret"></b>

                  </a>

                  <ul class="dropdown-menu">

                    <li><a data-toggle="tab" href="#ClientesAltas">Altas</a></li>

                  </ul>

                </li>

                <li class="dropdown"><!--aqui empieza el menu del navbar para mascotas-->

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    Mascotas

                     <b class="caret"></b>

                  </a>

                  <ul class="dropdown-menu">

                    <li><a data-toggle="tab" href="#MascotasAltas">Altas</a></li>

                    <li><a data-toggle="tab" href="#MascotasBajas">Bajas/Editar</a></li>

                    <li><a data-toggle="tab" href="#MascotasVacunas">Vacunas</a></li>

                  </ul>

                </li>

                <li class="dropdown"><!--aqui esta el menu del navbar para el usuario actual-->

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <span class="glyphicon glyphicon-user"></span>

                     <b class="caret"></b>

                  </a>

                  <ul class="dropdown-menu">

                    <li><a href="#Usuario"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION['username'] ?></a></li>

                    <!--<li><a href="#Configuracion"><span class="glyphicon glyphicon-cog"></span>&nbsp;Configuracion</a></li>-->

                    <li><a href="../PHP/logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Salir</a></li>

                  </ul>

                </li>

              </ul>

            </div>

        </div>

    </nav>

  <div class="container">

      <div class="row">

        <div class="col-sm-12 col-md-12 col-xs-12">
<<<<<<< HEAD

          <div class="tab-content" ><!--formularios de las opciones-->

            <div id="Administracion" class="tab-pane fade"><!--panel de administracion-->

              <h3>Herramientas administrativas</h3>

              <div class="col-xs-12 col-md-12 col-sm-12">

                <h4>Administracion clinica</h4>

                <div class="col-xs-12 col-md-12 col-sm-12">

                  <table class="table table-stripped">

                    <tbody>

                      <th><a href="#Usuarios" data-toggle="tab">Usuarios <span class="glyphicon glyphicon-chevron-down"></span></a></th>

                      <th><a href="#Medicos" data-toggle="tab">Medicos <span class="glyphicon glyphicon-chevron-down"></span></a></th>

                      <th><a href="#Clientes" data-toggle="tab">Clientes<span class="glyphicon glyphicon-chevron-down"></span></a></th>

                      <th><a href="#Empleados" data-toggle="tab">Empleados <span class="glyphicon glyphicon-chevron-down"></span></a></th>

=======
        	<div class="tab-content" ><!--formularios de las opciones-->
        		<div id="Administracion" class="tab-pane fade"><!--panel de administracion-->
        			<h3>Herramientas administrativas</h3>
        			<div class="col-xs-12 col-md-12 col-sm-12">
        				<h4>Administracion clinica</h4>
        				<div class="col-xs-12 col-md-12 col-sm-12">
        					<table class="table table-stripped">
	        					<tbody>
	        						<th><a href="#Usuarios" data-toggle="tab">Usuarios <span class="glyphicon glyphicon-chevron-down"></span></a></th>
	        						<th><a href="#Medicos" data-toggle="tab">Medicos <span class="glyphicon glyphicon-chevron-down"></span></a></th>
<<<<<<< HEAD
	        						<th><a href="#Clientes" data-toggle="tab">Clientes<span class="glyphicon glyphicon-chevron-down"></span></a></th>
	        						<th><a href="#Empleados" data-toggle="tab">Empleados <span class="glyphicon glyphicon-chevron-down"></span></a></th>
>>>>>>> origin/gh-pages
                      <th><a href="#Notas" data-toggle="tab">Notas<span class="glyphicon glyphicon-chevron-down"></span></a></th>

                      <th><a href="#Medicamentos" data-toggle="tab">Medicamentos<span class="glyphicon glyphicon-chevron-down"></span></a></th>

                      <th><a href="#admin_consultas" data-toggle="tab">Consultas<span class="glyphicon glyphicon-chevron-down"></span></a></th>

                      <th><a href="#admin_vacunas" data-toggle="tab">Vacunas<span class="glyphicon glyphicon-chevron-down"></span></a></th>
<<<<<<< HEAD

                    </tbody>

                  </table>

                </div>

                <div class="container">

                  <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                      <div class="tab-content">

                        <div id="Usuarios" class="tab-pane fade">

                          <div class="col-md-12">

=======
=======
	        						<th><a href="#ClientesBajas2" data-toggle="tab">Bajas/Editar Clientes <span class="glyphicon glyphicon-chevron-down"></span></a></th>
	        						<th><a href="#Empleados" data-toggle="tab">Empleados <span class="glyphicon glyphicon-chevron-down"></span></a></th>
>>>>>>> origin/gh-pages
	        					</tbody>
        					</table>
        				</div>
        				<div class="container">
        					<div class="row">
        						<div class="col-xs-12 col-sm-12 col-md-12">
        							<div class="tab-content">
        								<div id="Usuarios" class="tab-pane fade">
<<<<<<< HEAD
        									<div class="col-md-12">
>>>>>>> origin/gh-pages
                            <div class="col-sm-3 col-xs-12 col-md-3">

                              <div class="input-group">

                                <input type="text" class="form-control" placeholder="Buscar">

                                <span class="input-group-btn">

                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>

                                </span>

                              </div>

                            </div>

                                <a data-toggle="modal" href="#agregar_usuarios" class="btn btn-default">Nuevo usuario</a>

                                <a onclick="cargar('#tabla_usuarios','../PHP/tabla_usuarios.php')" class="btn btn-default">Actualizar tabla usuarios</a>

                              

                          </div><br /><br /><br />

                            <div id="tabla_usuarios"  class="col-md-12">

                                <?php

                                  require_once '../PHP/tabla_usuarios.php';

                                ?>

                            </div>

                        </div>



                        

                      <div id="admin_consultas" class="tab-pane fade"><!--pagina de inicio, se usa para notas-->

                          <div class="col-sm-3 col-xs-12 col-md-3">

                            <div class="input-group">

                            <input type="text" class="form-control" placeholder="Buscar">

                            <span class="input-group-btn">

                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>

                            </span>

                          </div>

                          </div>

                              <a onclick="cargar('#tabla_consultas','../PHP/tabla_consultas.php')" class="btn btn-default">Actualizar tabla consultas</a>                            

                          <br /><br />

                         <div id="tabla_consultas" class="col-md-12">



                          <?php  require_once '../PHP/tabla_consultas.php' ?>

                        </div>                 

                      </div>



                        
<<<<<<< HEAD

                        <div id="Medicos" class="tab-pane fade">

                          <div class="col-sm-3 col-xs-12 col-md-3">

                            <div class="input-group">

                            <input type="text" class="form-control" placeholder="Buscar">

                            <span class="input-group-btn">

                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>

                            </span>

                          </div>

                          </div>

=======
=======
        									<div class="col-sm-3 col-xs-12 col-md-3">
        										<div class="input-group">
												    <input type="text" class="form-control" placeholder="Buscar">
												    <span class="input-group-btn">
												    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
												    </span>
											    </div>
        									</div>
        									<div class="col-md-3 col-sm-3 col-xs-12">
        										<button class="btn btn-default" type="button">Nuevo Usuario</button>
        									</div><br><br>
        									<table class="table table-stripped">
        										<tbody>
        											<tr>
        											<th>Nombre de usuario</th>
        											<th>Dueño de la cuenta</th>
        											<th>Opciones</th>
        											</tr>
        											<tr>
        												<th>Usuario1</th>
        												<th>Alexandro Ayala Rodriguez</th>
        												<th>
	        												<a href=""><span class="glyphicon glyphicon-pencil"></span></a>
	        												<a href=""><span class="glyphicon glyphicon-remove"></span></a>
        												</th>
        											</tr>
        										</tbody>
        									</table>
        								</div>
>>>>>>> origin/gh-pages
        								<div id="Medicos" class="tab-pane fade">
        									<div class="col-sm-3 col-xs-12 col-md-3">
        										<div class="input-group">
												    <input type="text" class="form-control" placeholder="Buscar">
												    <span class="input-group-btn">
												    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
												    </span>
											    </div>
        									</div>
<<<<<<< HEAD
>>>>>>> origin/gh-pages
                                <a data-toggle="modal" href="#agregar_medico" class="btn btn-default">Nuevo medico</a>

                                <a onclick="cargar('#tabla_medicos','../PHP/tabla_medicos.php')" class="btn btn-default">Actualizar tabla medicos</a>

                          <br><br>

                                

                            <div id="tabla_medicos" class="col-md-12">



                                  <?php   require_once '../PHP/tabla_medicos.php'; ?>

                            </div>

<<<<<<< HEAD


                        </div>

                        <div id="Empleados" class="tab-pane fade">

                          <div class="col-sm-3 col-xs-12 col-md-3">

                            <div class="input-group">

                            <input type="text" class="form-control" placeholder="Buscar">

                            <span class="input-group-btn">

                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>

                            </span>

                          </div>

                          </div>

                          

=======
=======
        									<div class="col-md-3 col-sm-3 col-xs-12">
        										<button class="btn btn-default" type="button">Nuevo Medico</button>
        									</div><br><br>
        									<table class="table table-stripped">
        										<tbody>
        											<tr>
        											<th>Nombre</th>
        											<th>Apellido Paterno</th>
        											<th>Apellido Materno</th>
        											<th>Opciones</th>
        											</tr>
        											<tr>
        												<th>Alexandro</th>
        												<th>Ayala</th>
        												<th>Rodriguez</th>
        												<th>
	        												<a href=""><span class="glyphicon glyphicon-pencil"></span></a>
	        												<a href=""><span class="glyphicon glyphicon-remove"></span></a>
        												</th>
        											</tr>
        										</tbody>
        									</table>
>>>>>>> origin/gh-pages
        								</div>
        								<div id="Empleados" class="tab-pane fade">
        									<div class="col-sm-3 col-xs-12 col-md-3">
        										<div class="input-group">
												    <input type="text" class="form-control" placeholder="Buscar">
												    <span class="input-group-btn">
												    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
												    </span>
											    </div>
        									</div>
<<<<<<< HEAD
        									
>>>>>>> origin/gh-pages
                              <a data-toggle="modal" href="#agregar_empleados" class="btn btn-default">Nuevo empleado</a>

                              <a onclick="cargar('#tabla_empleado','../PHP/tabla_empleados.php')" class="btn btn-default">Actualizar tabla empleados</a>

                              <br><br>

                              <div id="tabla_empleado" class="col-md-12">



                                <?php   require_once '../PHP/tabla_empleados.php';?>

                              </div>

<<<<<<< HEAD


                        </div>



                        <div id="Clientes" class="tab-pane fade">

                              <div class="col-sm-3 col-xs-12 col-md-3">

                            <div class="input-group">

                            <input type="text" class="form-control" placeholder="Buscar">

                            <span class="input-group-btn">

                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>

                            </span>

                          </div>                         

                          </div>

=======
        								</div>

        								<div id="Clientes" class="tab-pane fade">
=======
        									<div class="col-md-3 col-sm-3 col-xs-12">
        										<button class="btn btn-default" type="button">Nuevo Empleado</button>
        									</div><br><br>
        									<table class="table table-stripped">
        										<tbody>
        											<tr>
        											<th>Nombre</th>
        											<th>Apellido Paterno</th>
        											<th>Apellido Materno</th>
        											<th>Opciones</th>
        											</tr>
        											<tr>
        												<th>Alexandro</th>
        												<th>Ayala</th>
        												<th>Rodriguez</th>
        												<th>
	        												<a href=""><span class="glyphicon glyphicon-pencil"></span></a>
	        												<a href=""><span class="glyphicon glyphicon-remove"></span></a>
        												</th>
        											</tr>
        										</tbody>
        									</table>
        								</div>
        								<div id="ClientesBajas2" class="tab-pane fade"><!-- formulario para dar de baja el cliente-->
>>>>>>> origin/gh-pages
							                <div class="col-sm-3 col-xs-12 col-md-3">
        										<div class="input-group">
												    <input type="text" class="form-control" placeholder="Buscar">
												    <span class="input-group-btn">
												    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
												    </span>
<<<<<<< HEAD
											    </div>                         
        									</div>
>>>>>>> origin/gh-pages
                              <a onclick="cargar('#tabla_clientes','../PHP/tabla_clientes.php')" class="btn btn-default">Actualizar tabla clientes</a>

                            <br><br>

                                            <div id="tabla_clientes" class="col-md-12">



                                                <?php

                                                    require_once '../PHP/tabla_clientes.php';

                                                ?>

                                            </div>



                          </div>

                                        <div id="Notas" class="tab-pane fade">

                                            <div class="col-sm-3 col-xs-12 col-md-3">

                                                <div class="input-group">

                                                    <input type="text" class="form-control" placeholder="Buscar">

                                                    <span class="input-group-btn">

                                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>

                                                    </span>

                                                </div>

                                            </div>

                                                <a data-toggle="modal" href="#agregar_notas" class="btn btn-default">Nueva nota</a>                                                

                                                <a onclick="cargar('#tabla_notas','../PHP/tabla_notas.php')" class="btn btn-default">Actualizar tabla notas</a>                                                

                                            <br><br>

                                            <div id="tabla_notas" class="col-md-12">



                                                <?php



                                                    require_once '../PHP/tabla_notas.php'

                                                ?>

                                            </div>



                                        </div>

                                        <div id="Medicamentos" class="tab-pane fade">

                                            <div class="col-sm-3 col-xs-12 col-md-3">

                                                <div class="input-group">

                                                    <input type="text" class="form-control" placeholder="Buscar">

                                                    <span class="input-group-btn">

                                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>

                                                    </span>

                                                </div>

                                            </div>

                                                <a data-toggle="modal" href="#agregar_medicamentos_modal" class="btn btn-default">Nuevo medicamento</a> 

                                                <a onclick="cargar('#tabla_medicamento','../PHP/tabla_medicamentos.php')" class="btn btn-default">Actualizar tabla medicamentos</a> 

                                            <br><br>

                                            <div  id="tabla_medicamento" class="col-md-12">



                                                <?php

                                                    require_once '../PHP/tabla_medicamentos.php'

                                                ?>

                                            </div>



                                        </div>

                                        <div id="admin_vacunas" class="tab-pane fade">

                                            <div class="col-sm-3 col-xs-12 col-md-3">

                                                <div class="input-group">

                                                    <input type="text" class="form-control" placeholder="Buscar">

                                                    <span class="input-group-btn">

                                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>

                                                    </span>

                                                </div>

                                            </div>

                                                <a data-toggle="modal" href="#agregar_vacunas_modal" class="btn btn-default">Nueva vacuna</a>

                                                <a onclick="cargar('#tabla_vacunas_admin','../PHP/tabla_vacunas_admin.php')" class="btn btn-default">Actualizar tabla vacunas</a>

                                            <br><br>                                            

                                            <div  id="tabla_vacunas_admin" class="col-md-12">



                                                <?php

                                                    require_once '../PHP/tabla_vacunas_admin.php'

                                                ?>

                                            </div>



                                        </div>                               
<<<<<<< HEAD
=======
=======
											    </div>
        									</div>
        									<div class="col-md-3 col-sm-3 col-xs-12">
        										<button class="btn btn-default" type="button">Nuevo Cliente</button>
        									</div><br><br>
        									<table class="table table-stripped">
        										<tbody>
        											<tr>
        											<th>Nombre</th>
        											<th>Apellido Paterno</th>
        											<th>Apellido Materno</th>
        											<th>Opciones</th>
        											</tr>
        											<tr>
        												<th>Alexandro</th>
        												<th>Ayala</th>
        												<th>Rodriguez</th>
        												<th>
	        												<a href=""><span class="glyphicon glyphicon-pencil"></span></a>
	        												<a href=""><span class="glyphicon glyphicon-remove"></span></a>
        												</th>
        											</tr>
        										</tbody>
        									</table><!--
							                <h3>Bajas y Edicion de Clientes</h3>
							                <form action="" method="GET">
							                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#BuscarCliente">Buscar</button><br>
												<label for="">Detalles del Cliente</label><br>
												<div class="col-sm-3 col-md-3 col-xs-12">
												<input type="text" name="nombre" class="form-control" placeholder="Nombre" readonly><br />
									            <input type="text" name="nombre" class="form-control" placeholder="Direccion" readonly><br />
												</div>
												<div class="col-sm-3 col-md-3 col-xs-12">
													<input type="text" name="descripcion" class="form-control" placeholder="Apellido Paterno" readonly><br />
													<input type="text" name="nombre" class="form-control" placeholder="Celular" readonly><br />
												</div>
												<div class="col-sm-3 col-md-3 col-xs-12">
													<input type="text" name="precio" class="form-control" placeholder="Apellido Materno" readonly><br />
													<input type="text" name="nombre" class="form-control" placeholder="Telefono" readonly><br />
												</div>
												<div class="col-sm-3 col-md-3 col-xs-12">
												</div>
												<div class="col-sm-12 col-md-12 col-xs-12 row">
													<label>Fecha de nacimiento</label><br />
												</div>
												<div class="col-xs-12 col-md-12 col-sm-12">
												<div class="col-md-4 col-sm-4 col-xs-12">--><!--menu de fecha de nacimiento
									            		<div class="col-md-4 col-xs-12 col-sm-4">menu de dias
									            		<select name="" id="" class="form-control">
										                   	<option value="">1</option>
										                   	<option value="">2</option>
										                   	<option value="">3</option>
										                   	<option value="">4</option>
										                   	<option value="">5</option>
										                   	<option value="">6</option>
										                   	<option value="">7</option>
										                </select><br>
										                </div>
									                	<div class="col-md-4 col-xs-12 col-sm-4">
										                    <select name="" id="" class="form-control">
										                    	<option value="">Enero</option>
										                    	<option value="">Febrero</option>
										                    	<option value="">Marzo</option>
										                    	<option value="">Abril</option>
										                    	<option value="">Mayo</option>
										                    	<option value="">Junio</option>
										                    	<option value="">Julio</option>
										                    	<option value="">Agosto</option>
										                    	<option value="">Septiembre</option>
										                    	<option value="">Octubre</option>
										                    	<option value="">Noviembre</option>
										                    	<option value="">Diciembre</option>
										                    </select><br />
										                </div>
										                <div class="col-md-4 col-xs-12 col-sm-4">
										            		<select name="" id="" class="form-control">
											                   	<option value="">2017</option>
											                   	<option value="">2016</option>
											                   	<option value="">2015</option>
											                   	<option value="">2014</option>
											                   	<option value="">2013</option>
											                   	<option value="">2012</option>
											                   	<option value="">2011</option>
											                </select><br>
										            	</div>
										            	</div><br>
										        <div class="col-xs-12 col-sm-12 col-md-12">
												<button class="btn btn-default" type="button">Eliminar</button>
												<button class="btn btn-default" type="button">Editar</button>
												</div>
												</div>
							                </form>-->
							            </div>
>>>>>>> origin/gh-pages
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
>>>>>>> origin/gh-pages

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>


              <div id="Inicio" class="tab-pane fade in active"><!--pagina de inicio, se usa para notas-->

                    <?php

                      echo "<br /><h3>Bienvenido ".$_SESSION['username']."</h3>";         

                    ?>  

                                  

                            <h3>Notas <a data-target="#NuevaNota" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span></a></h3>

                            <div class="col-xs-12 col-md-4 col-sm-4">

                            <div class="panel panel-primary">

                      <div class="panel-heading">

                        <h3 class="panel-title">                    

                          <?php 

                              require_once '../PHP/info_notas.php';  

                              echo $titulo;

                          ?>

                          <a data-target="#EditarNota" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>

                      </h3>

                      </div>

                      <div class="panel-body">

                              <?php 

                              require_once '../PHP/info_notas.php';  

                              echo $comentario;

                          ?>          

                      </div>

                    </div>

                    </div>

              </div>

              <div id="Historial" class="tab-pane fade"><!--pagina de inicio, se usa para notas-->

                <h3>Historial Clinico</h3><br /><br />

              <div class="input-group col-md-4 ">

            <span class="input-group-addon" id="basic-addon1">Buscar</span>

            <input id="buscar_mascota_4" type="text" name="buscar_mascota_4" class="buscar_mascota_4 form-control" onmouseout="mascotaID('../PHP/clientes_mascotas.php', 'detalles_cliente','id_mascota_4','');" placeholder="Nombre mascota" aria-describedby="basic-addon1" data-toggle="tooltip" title="Busca por nombre de la mascota.">                     

        </div><br />

        <div class="col-xs-12 col-md-12 col-sm-12">

                <h4><label>Detalles de la Mascota</label></h4><br>

                    <div class="col-xs-12 col-md-4 col-sm-4">

                      <label>Descripcion fisica de la mascota</label><br>

                      <input id="nombre_mascota_4" type="text" name="nombre_mascota_4" class="nombre_mascota_4 form-control" placeholder="Nombre" readonly><br />

                      <input id="color_mascota_4" type="text" name="color_mascota_4" class="color_mascota_4 form-control" placeholder="Color" readonly><br />

                      <input id="sexo_mascota_4" type="text" name="sexo_mascota_4" class="sexo_mascota_4 form-control" placeholder="Sexo" readonly><br />

                      <input id="esterilizado_mascota_4" type="text" name="esterilizado_mascota_4" class="esterilizado_mascota_4 form-control" placeholder="Esterilizado" readonly><br />

                      <input id="id_mascota_4" type="hidden" name="id_mascota_4" class="id_mascota_4 form-control"  readonly><br />

                  </div>

                  <div class="col-xs-12 col-md-4 col-sm-4">

                    <label>Clasificacion de la mascota</label>

                    <input id="tipo_mascota_4" type="text" name="tipo_mascota_4" class="tipo_mascota_4 form-control" placeholder="Tipo de mascota" readonly><br />

                    <input id="raza_4" type="text" name="raza_4" class="raza_4 form-control" placeholder="Raza" readonly><br />

                  </div>

                  <div class="col-xs-12 col-md-4 col-sm-4">

                    <label>Detalles de crecimiento</label><br>

                      <input id="edad_mascota_4" type="text" name="edad_mascota_4" class="edad_mascota_4 form-control" placeholder="Edad" readonly><br />

                      <input id="longitud_mascota_4" type="text" name="longitud_mascota_4" class="longitud_mascota_4 form-control" placeholder="Longitud" readonly><br />

                      <input id="peso_mascota_4" type="text" name="peso_mascota_4" class="peso_mascota_4 form-control" placeholder="Peso" readonly><br>

                    </div>



                    <div class="col-xs-12 col-md-9 col-sm-4">

                      <label>Alergias</label><br>

                      <input id="alergias_4" type="text" name="alergias_4" class="alergias_4 form-control" placeholder="Alergias" readonly><br /><br />

                    </div>

                  </div>

        <h4><label>Detalles del Cliente</label></h4><br>

              <div id="detalles_cliente" class="col-xs-12 col-md-12 col-sm-12">

              </div>



                  <div class="col-xs-12 col-md-6 col-sm-4">

                    <label>Vacunas</label><br /><br />

              <div id="tabla_vacuna" class="col-md-6">

                <p>

                    <a onclick="javascript:mascotaID('../PHP/tabla_vacunas.php','timediv_vacunas','id_mascota_4' ,'');" data-toggle="tooltip" title="Haz clic para ver las vacunas.">Ver vacunas de la mascota</a>

                </p>

                

                <div name="timediv_vacunas" id="timediv_vacunas">

                  

                    </div>

              </div>

          </div>



          <div class="col-xs-12 col-md-12 col-sm-4">

                    <label>Consultas</label><br /><br />

              <div id="tabla_historial" class="col-md-12">

                <p>

                    <a onclick="javascript:mascotaID('../PHP/tabla_historial.php','timediv_historial','id_mascota_4','');" data-toggle="tooltip" title="Haz clic para mostrar el historial.">Ver historial de consultas de la mascota</a>

                </p>

                

                <div name="timediv_historial" id="timediv_historial">

                  

                    </div>

              </div>

          </div>



          <div class="col-xs-12 col-md-12 col-sm-4">

                    <label>Historial de receta en consultas</label><br /><br />

              <div id="tabla_receta_consulta" class="col-md-12">

                <p>

                    <a onclick="javascript:mascotaID('../PHP/tabla_receta_historial.php','timediv_receta_consulta','id_mascota_4','');" data-toggle="tooltip" title="Haz clic para mostrar el historial de las recetas.">Ver historial de las recetas de la mascota</a>

                </p>

                

                <div name="timediv_receta_consulta" id="timediv_receta_consulta">

                  

                    </div>

              </div>

          </div>

              </div>

        <div id="Consultas" class="tab-pane fade"><!--formulario para registrar consultas-->

          <h1>Consulta</h1><br />

                  <form id="registro_consultas" method="POST">

                  <div class="input-group col-md-4">

            <span class="input-group-addon" id="basic-addon1">Buscar</span>

            <input id="buscar_medico" type="text" name="buscar_medico" class="buscar_medico form-control" placeholder="Nombre medico" aria-describedby="basic-addon1" data-toggle="tooltip" title="Busca por nombre del medico.">                    

          </div><br />

                  <div class="col-xs-12 col-md-12 col-sm-12">

                  <h4><label>Detalles del Veterinario</label></h4><br>

                    <input id="id_medico" type="hidden" name="id_medico" class="id_medico form-control" readonly><br />

                    <div class="col-md-3">

                      <input id="nombre_medico" type="text" name="nombre_medico" class="nombre_medico form-control" placeholder="Nombre" readonly><br />

                    </div>

                    <div class="col-md-3">

                      <input id="a_paterno_medico" type="text" name="a_paterno_medico" class="a_paterno_medico form-control" placeholder="Apellido Paterno" readonly><br />

                    </div>

                    <div class="col-md-3">

                      <input id="a_materno_medico" type="text" name="a_materno_medico" class="a_materno_medico form-control" placeholder="Apellido Materno" readonly><br />

                      <br /><br />

                    </div>

                    <div class="col-md-3">

                      <input id="cedula_medico" type="text" name="cedula_medico" class="cedula_medico form-control" placeholder="Cedula" readonly><br />

                      <br /><br />

                    </div>

                  </div>



                  <div class="input-group col-md-4 ">

            <span class="input-group-addon" id="basic-addon1">Buscar</span>

            <input id="buscar_mascota_3" type="text" name="buscar_mascota_3" class="buscar_mascota_3 form-control" placeholder="Nombre mascota" onmouseout="mascotaID('../PHP/cliente_mascota_consulta.php', 'detalles_cliente_consulta','id_mascota_3','');" aria-describedby="basic-addon1" data-toggle="tooltip" title="Busca por nombre de la mascota.">                     

          </div><br />                  



                <div class="col-xs-12 col-md-12 col-sm-12">

                <h4><label>Detalles de la Mascota</label></h4><br>

                    <div class="col-xs-12 col-md-4 col-sm-4">

                      <label>Descripcion fisica de la mascota</label><br>

                      <input id="nombre_mascota_3" type="text" name="nombre_mascota_3" class="nombre_mascota_3 form-control" placeholder="Nombre" readonly><br />

                      <input id="color_mascota_3" type="text" name="color_mascota_3" class="color_mascota_3 form-control" placeholder="Color" readonly><br />

                      <input id="sexo_mascota_3" type="text" name="sexo_mascota_3" class="sexo_mascota_3 form-control" placeholder="Sexo" readonly><br />

                      <input id="esterilizado_mascota_3" type="text" name="esterilizado_mascota_3" class="esterilizado_mascota_3 form-control" placeholder="Esterilizado" readonly><br />

                      <input id="id_mascota_3" type="hidden" name="id_mascota_3" class="id_mascota_3 form-control"  readonly><br />

                  </div>

                  <div class="col-xs-12 col-md-4 col-sm-4">

                    <label>Clasificacion de la mascota</label>

                    <input id="tipo_mascota_3" type="text" name="tipo_mascota_3" class="tipo_mascota_3 form-control" placeholder="Tipo de mascota" readonly><br />

                    <input id="raza_3" type="text" name="raza_3" class="raza_3 form-control" placeholder="Raza" readonly><br />

                  </div>

                  <div class="col-xs-12 col-md-4 col-sm-4">

                    <label>Detalles de crecimiento</label><br>

                      <input id="edad_mascota_3" type="text" name="edad_mascota_3" class="edad_mascota_3 form-control" placeholder="Edad" readonly><br />

                      <input id="longitud_mascota_3" type="text" name="longitud_mascota_3" class="longitud_mascota_3 form-control" placeholder="Longitud" readonly><br />

                      <input id="peso_mascota_3" type="text" name="peso_mascota_3" class="peso_mascota_3 form-control" placeholder="Peso" readonly><br>

                    </div>

                  </div>



                  <h4><label>Detalles del Cliente</label></h4><br>

                  <div id="detalles_cliente_consulta" class="col-xs-12 col-md-12 col-sm-12">

                  

                  </div>



                  <div class="col-xs-12 col-md-12 col-sm-12">

                  <h4><label>Detalles de la Consulta</label></h4>



                    <div class="col-md-4">

                      <label>Fecha de consulta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hora:&nbsp;&nbsp;</label>                                            

                  <label id="hora_consulta"  name="hora_consulta"></label>



                      <div class="input-group col-md-12">



                <div class="input-group-addon">

                    <i class="fa fa-calendar"></i>

                </div>                  

                  <input id="date3" class="date3 form-control" name="date" placeholder="YYYY/MM/DD" type="text" data-toggle="tooltip" title="Fecha de consulta!"/>

              </div><br />

                    </div>                    



                    <div id="div_reloj" class="col-md-3"> 

                    </div>

                



                    <div class="col-md-9">

                      <label>Motivo consulta</label>

                      <input id="motivo_consulta" type="text" name="motivo_consulta" class="motivo_consulta form-control" placeholder="¿Cuál es el motivo de la consulta?"><br />

                    </div>







                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <label>Sintomas</label>

                        <textarea id="sintomas_consulta" class="sintomas_consulta form-control" name="sintomas_consulta" rows="3" placeholder="Empieza a escribir..."></textarea><br>        

                    </div>

  

                    <div class="col-md-12 col-sm-12 col-xs-12">

                      <h4><label>Examen físico</label></h4>

                      

                       <div class="col-md-3">

                        <label>Actitud</label>

                        <textarea id="actitud_consulta" class="actitud_consulta form-control" name="actitud_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                      <div class="col-md-3">

                        <label>Condición corporal</label>

                        <textarea id="corporal_consulta" class="corporal_consulta form-control" name="corporal_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                      <div class="col-md-3">

                        <label>Hidratación</label>

                        <textarea id="hidratacion_consulta" class="hidratacion_consulta form-control" name="hidratacion_consulta" rows="3" placeholder="Descripcion..."></textarea><br>                    

                      </div>



                      <div class="col-md-3">

                        <label>Mucosas</label>

                        <textarea id="mucosas_consulta" class="mucosas_consulta form-control" name="mucosas_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                       <div class="col-md-3">

                        <label>Ojos</label>

                        <textarea id="ojos_consulta" class="ojos_consulta form-control" name="ojos_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                      <div class="col-md-3">

                        <label>Oídos</label>

                        <textarea id="oidos_consulta" class="oidos_consulta form-control" name="oidos_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                      <div class="col-md-3">

                        <label>Nódulos linfáticos</label>

                        <textarea id="linfaticos_consulta" class="linfaticos_consulta form-control" name="linfaticos_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                      <div class="col-md-3">

                        <label>Piel</label>

                        <textarea id="piel_consulta" class="piel_consulta form-control" name="piel_consulta" rows="3" placeholder="Descripcion..."></textarea><br>                     

                      </div>



                      <div class="col-md-3">

                        <label>Locomoción</label>

                        <textarea id="locomocion_consulta" class="locomocion_consulta form-control" name="locomocion_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                       <div class="col-md-3">

                        <label>Musculo esquelético</label>

                        <textarea id="musculo_consulta" class="musculo_consulta form-control" name="musculo_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                      <div class="col-md-3">

                        <label>Sistema nervioso</label>

                        <textarea id="nervioso_consulta" class="nervioso_consulta form-control" name="nervioso_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                       <div class="col-md-3">

                        <label>Sistema cardiovascular</label>

                        <textarea id="cardiovascular_consulta" class="cardiovascular_consulta form-control" name="cardiovascular_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                       <div class="col-md-3">

                        <label>Sistema respiratorio</label>

                        <textarea id="respiratorio_consulta" class="respiratorio_consulta form-control" name="respiratorio_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                      <div class="col-md-3">

                        <label>Sistema digestivo</label>

                        <textarea id="digestivo_consulta" class="digestivo_consulta form-control" name="digestivo_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>



                       <div class="col-md-3">

                        <label>Sistema genitourinario </label>

                        <textarea id="genitourinario_consulta" class="genitourinario_consulta form-control" name="genitourinario_consulta" rows="3" placeholder="Descripcion..."></textarea><br>

                      </div>

                    </div>



                    <div class="col-md-12 col-sm-12 col-xs-12">

                      <h4><label>Diagnostico</label></h4>

              <div class="col-md-12">

                  <textarea id="diagnostico" type="textarea" name="diagnostico" class="diagnostico form-control" rows="3" placeholder="Empieza a escribir..."></textarea><br>       

              </div>

                    </div>



                    <div class="col-md-12 col-sm-12 col-xs-12">

                      <h4><label>Tratamiento</label></h4>

              <div class="col-md-12">

                  <textarea id="tratamiento" type="textarea" name="tratamiento" class="tratamiento form-control" rows="3" placeholder="Empieza a escribir..."></textarea><br>       

              </div>                      

                      <div class="input-group col-md-4 ">

                  <div class="input-group-addon">

                      <i class="glyphicon glyphicon-search"></i>

                  </div>  

                    <input id="buscar_medicamentos" type="text" name="buscar_medicamentos" class="buscar_medicamentos form-control" placeholder="Nombre medicamento" aria-describedby="basic-addon1" data-toggle="tooltip" title="Busca por nombre del medicamento.">                    

              </div><br />



              <div class="col-md-3">

                <input id="id_receta" type="number" name="id_receta" class="id_receta form-control" placeholder="Folio receta">

              </div>



              <div class="col-md-12 col-sm-12 col-xs-12">

                        <h4><label>Receta</label></h4>

                <input id="id_medicamento" type="hidden" name="id_medicamento" class="id_medicamento form-control"><br>

                <div class="col-md-3">

                  <input id="nombre_medicamento" type="text" name="nombre_medicamento" class="nombre_medicamento form-control" placeholder="Nombre del medicamento" readonly><br>

                </div>



                <div class="col-md-3">

                  <input id="cantidad_medicamento" type="number" name="cantidad_medicamento" class="cantidad_medicamento form-control" placeholder="Cantidad de medicamento"><br>

                </div>



                <div class="col-md-3">

                  <input id="frecuencia_medicamento" type="text" name="frecuencia_medicamento" class="frecuencia_medicamento form-control" placeholder="Frecuencia de consumo"><br>

                </div>



                <div class="col-md-3">

                  <input id="duracion_medicamento" type="text" name="duracion_medicamento" class="duracion_medicamento form-control" placeholder="Duracion del uso"><br>

                </div>

                

                <div class="col-md-12">

                  <textarea id="comentarios_medicamento" type="textarea" name="comentarios_medicamento" class="comentarios_medicamento form-control" rows="1" placeholder="Comentarios..."></textarea><br>

                </div>

                  

                <div class="col-md-3">

                  <button id="agregar_medicamentos" type="text" class="agregar_medicamentos btn btn-default" name="agregar_medicamentos" onclick="recetaID('../PHP/tabla_receta.php','timediv_receta','');">Agregar medicamento</button>                

                </div>



                <div class="col-md-9">

                  <a href="#" id="show"><h4><span class="label label-default">Agregar nuevo medicamento</span></h4></a><br />

                </div>



                <div class="col-md-12" id="element" style="display: none;">

                   <div id="close"><a href="#" id="hide"><h4><span class="label label-default">Cerrar</span></h4></a></div><br />



                    <div class="col-md-3">

                      <input id="nombre_generico_medicamento" type="text" name="nombre_generico_medicamento" class="nombre_generico_medicamento form-control" placeholder="Nombre comun del medicamento"><br>

                    </div>



                    <div class="col-md-3">

                      <input id="nombre_comercial_medicamento" type="text" name="nombre_comercial_medicamento" class="nombre_comercial_medicamento form-control" placeholder="Nombre comercial del medicamento"><br>

                    </div>  



                    <div class="col-md-3">

                      <select name="tipo_admin_medicamento" id="tipo_admin_medicamento" class="tipo_admin_medicamento form-control">

                                 <option value="">Selecione una opcion...</option>

                                 <?php    

                                    require('../PHP/tipo_admin_medicamento.php');                                   

                          ?>

                              </select>

                    </div>



                    <div class="col-md-3"> 

                      <select name="tipo_medicamento" id="tipo_medicamento" class="tipo_medicamento form-control">

                                 <option value="">Selecione una opcion...</option>

                                 <?php    

                                    require('../PHP/tipo_medicamento.php');                                   

                          ?>

                              </select><br />

                    </div>



                    <div class="col-md-6">

                      <button id="agregar_nuevo_medicamento" type="text" class="agregar_nuevo_medicamento btn btn-default" name="agregar_nuevo_medicamento">Agregar</button>                

                    </div>                                        

                  

                </div>                  



                <div id="tabla_receta" class="col-md-12">

                  <br />

                  <p>

                      <a onclick="javascript:recargar_receta('../PHP/tabla_receta.php','timediv_receta');" data-toggle="tooltip" title="Haz clic cada vez que agregues un tratamiento">Ver tabla de receta</a>

                  </p>

                

                  <div name="timediv_receta" id="timediv_receta">

                  

                      </div>

                </div>

              </div>          



                    </div>                    



                  </div>



                  <div class="col-md-12">  

                    <label>Instrucciones medicas</label>                

                    <textarea id="instrucciones" type="textarea" name="instrucciones" class="instrucciones form-control" rows="3" placeholder="Empieza a escribir..."></textarea><br>

                  </div>



                  <div class="col-md-3"> 

                    <label>Costo consulta</label>

                    <input id="costo_consulta" type="number" name="costo_consulta" class="costo_consulta form-control" placeholder="Costo consulta" min="0"><br />

                  </div>



                  <div class="col-md-12">

                    <button id="guardar_consulta" type="text" class="guardar_consulta btn btn-default" name="guardar_consulta" >Guardar</button>

                  </div>

                   

                  </form>

        </div>

              <div id="MascotasBajas" class="tab-pane fade"><!--registro para editar o dar de baja mascotas-->

                <h3>Bajas y Edicion de Mascotas</h3>
<<<<<<< HEAD

=======
<<<<<<< HEAD
>>>>>>> origin/gh-pages
                <form id="baja_mascota"  method="post"><br />

                  <div class="container">

                    <div class="input-group col-md-4">

                <span class="input-group-addon" id="basic-addon1">Buscar</span>

                <input id="buscar_mascota" type="text" name="buscar_mascota" class="buscar_mascota form-control" placeholder="Nombre mascota" aria-describedby="basic-addon1" data-toggle="tooltip" title="Busca por nombre de la mascota.">

            </div><br>

            <input id="id_mascota" type="hidden" name="id_mascota" class="id_mascota form-control">

            <input id="id_cliente" type="hidden" name="id_cliente" class="id_cliente form-control">

            <input id="raza" type="hidden" name="raza" class="raza form-control">

            <input id="color_mascota" type="hidden" name="color_mascota" class="color_mascota form-control" placeholder="Color">

            <input id="especie" type="hidden" name="especie" class="especie form-control" placeholder="Especie">

            <input id="sexo" type="hidden" name="sexo" class="sexo form-control">

            <input id="tipo_sangre" type="hidden" name="tipo_sangre" class="tipo_sangre form-control">

            <div class="row">

              <div class="col-sm-12 col-md-12 col-xs-12">

                <label for="">Detalles de la Mascota</label>

              </div>

              <div class="col-sm-3 col-md-3 col-xs-12">

                <input id="nombre_mascota" type="text" name="nombre_mascota" class="nombre_mascota form-control" placeholder="Nombre de la mascota">

              </div>

              <div class="col-sm-3 col-md-3 col-xs-12">

                <input id="edad_mascota" type="text" name="edad_mascota" class="edad_mascota form-control" placeholder="Edad de la mascota">

              </div>

              <div class="col-sm-3 col-md-3 col-xs-12">

                <input id="longitud_mascota" type="text" name="longitud_mascota" class="longitud_mascota form-control" placeholder="Longitud de la mascota">

              </div>

              <div class="col-sm-3 col-md-3 col-xs-12">

                <input id="peso_mascota" type="text" name="peso_mascota" class="peso_mascota form-control" placeholder="Peso de la mascota">

              </div>

            </div>

            <div class="row">

              <div class="col-sm-12 col-md-12 col-xs-12">

                <label>Esterilizado</label>

              </div>

              <div class="col-sm-3 col-md-3 col-xs-12">

                <input id="esterilizado" type="text" name="esterilizado" class="esterilizado form-control"  placeholder="Esterilizado">

              </div>

            </div>

            <div class="row">

              <div class="col-sm-12 col-xs-12 col-md-12">

                <label>Alergias</label><br>

              </div>

              <div class="col-sm-12 col-xs-12 col-md-12">

                <input id="alergias" type="text" name="alergias" class="alergias form-control" placeholder="Alergias">

              </div>

            </div>

            <div class="row">

              <div class="col-md-12 col-xs-12 col-sm-12">

                <label>Observaciones</label>

              </div>

              <div class="col-md-12 col-xs-12 col-sm-12">

                <textarea id="observaciones" name="observaciones" class="observaciones form-control" rows="3" placeholder="Observaciones"></textarea>

              </div>

            </div><br>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <button id="eliminar_mascotas" type="text" name="eliminar_mascotas" class="eliminar_mascotas btn btn-dark">Eliminar</button>                      

                  <button id="editar_mascotas" type="text" name="editar_mascotas" class="editar_mascotas btn btn-dark">Editar</button>

            </div>

          </div>

                </form>

              </div>

              <div id="MascotasVacunas" class="tab-pane fade"><!--registro de vacunas de la mascota-->

                <h3>Registro de Vacunas</h3>

                <form id="registro_vacunas" method="POST">

          <div class="input-group col-md-4">

            <span class="input-group-addon" id="basic-addon1">Buscar</span>

            <input id="buscar_mascota_vacuna" type="text" name="buscar_mascota_vacuna" class="buscar_mascota_vacuna form-control" placeholder="Nombre mascota" aria-describedby="basic-addon1" data-toggle="tooltip" title="Busca por nombre de la mascota.">                    

          </div>

          <div class="container">

            <div class="row">

              <div class="col-md-12 col-xs-12 col-sm-12">

                <label>Detalles de la mascota</label>

              </div>

              <div class="col-xs-12 col-md-3 col-sm-3">

                <input id="id_mascota_2" type="hidden" name="id_mascota_2" class="id_mid_mascota_2ascota form-control" readonly>

                <input id="nombre_mascota_2" type="text" name="nombre_mascota_2" class="nombre_mascota_2 form-control" placeholder="Nombre" readonly><br>

              </div>

              <div class="col-xs-12 col-md-3 col-sm-3">

                <input id="edad_mascota_2" type="text" name="edad_mascota_2" class="edad_mascota_2 form-control" placeholder="Edad" readonly><br>

              </div>

              <div class="col-xs-12 col-md-3 col-sm-3">

                <input id="tipo_mascota_2" type="text" name="tipo_mascota_2" class="tipo_mascota_2 form-control" placeholder="Tipo de mascota" readonly><br>

              </div>

              <div class="col-xs-12 col-md-3 col-sm-3">

                <input id="raza_2" type="text" name="raza_2" class="raza_2 form-control" placeholder="Raza" readonly><br>

              </div>

              <div class="col-xs-12 col-md-3 col-sm-3">

              <label>Vacunas</label>

              <select name="vacunas" id="vacunas" class="vacunas form-control"><!--menu del tipo de mascota dentro de los datos-->

                         <option value="">Selecione una opcion...</option>

                         <?php    

                            require_once('../PHP/config.php');    

                          $sql="SELECT * FROM vacunas";

                      $result = $con->query($sql);

                      while($row=$result->fetch_assoc()) {

                        ?>

                          <option value=" <?php echo $row['id_vacuna'] ?> " >

                          <?php echo $row['nombre']; ?>

                          </option>

                        <?php

                      }

                  ?>

                      </select>

                      <br />

                      </div>

                      <div class="col-xs-12 col-md-3 col-sm-3">

                        <label>Fecha aplicacion de vacuna</label><br>

                        <div class="input-group col-md-8">

                  <div class="input-group-addon">

                      <i class="fa fa-calendar"></i>

                  </div>                  

                    <input id="date2" class="date2 form-control" name="date" placeholder="YYYY/MM/DD" type="text" data-toggle="tooltip" title="Fecha de aplicacion de vacuna.!"/>

                </div>

              </div>

            </div>

          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">

          <label>Detalles sobre la aplicacion de la vacuna</label>

          <textarea id="observacion_vacuna" name="observacion_vacuna" class="observacion_vacuna form-control"  rows="3" placeholder="Descripcion"></textarea>

          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">

            <br />

            <button id="agregar_vacuna" type="text" nombre="agregar_vacuna" class="agregar_vacuna btn btn-dark">Registrar</button>

          </div>
<<<<<<< HEAD

=======
=======
                <form action="" method="GET">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#BuscarMascotayCliente">Buscar</button><br>
                	<div class="row">
                	<div class="col-xs-12 col-sm-12 col-md-12">
                	<label>Detalles del cliente</label><br>
                	</div>
                	<div class="col-sm-3 col-md-3 col-xs-12">
                		<input type="text" name="" class="form-control" placeholder="Nombre" readonly><br>
                	</div>
                	<div class="col-sm-3 col-md-3 col-xs-12">
                		<input type="text" name="" class="form-control" placeholder="Apellido Paterno" readonly><br>
                	</div>
                	<div class="col-sm-3 col-md-3 col-xs-12">
                		<input type="text" name="" class="form-control" placeholder="Apellido Materno" readonly><br>
                	</div>
                	</div>
                	<div class="row">
                	<div class="col-xs-12 col-sm-12 col-md-12">
					<label for="">Detalles de la Mascota</label><br>
					</div>
					<div class="col-sm-3 col-md-3 col-xs-12">
					<input type="text" name="descripcion" class="form-control" placeholder="Nombre" readonly><br />
					<input type="text" name="descripcion" class="form-control" placeholder="Edad" readonly><br />
	                </div>
	                <div class="col-sm-3 col-md-3 col-xs-12">
	                <input type="text" name="nombre" class="form-control" placeholder="Color" readonly><br />
	                <input type="text" name="descripcion" class="form-control" placeholder="Longitud" readonly><br />
	                </div>
	                <div class="col-sm-3 col-md-3 col-xs-12">
	                <input type="text" name="descripcion" class="form-control" placeholder="Peso" readonly><br>
	                <input type="text" name="descripcion" class="form-control" placeholder="Raza" readonly><br />
	                </div>
	                <div class="col-sm-3 col-md-3 col-xs-12">
	                <input type="text" name="nombre" class="form-control" placeholder="Tipo de mascota" readonly><br />
	                </div>
	                </div>
			        <div class="col-xs-12 col-sm-12 col-md-12">
					<button class="btn btn-default" type="button">Eliminar</button>
					<button class="btn btn-default" type="button">Editar</button>
					</div>
                </form>
              </div>
              <div id="MascotasVacunas" class="tab-pane fade"><!--registro de vacunas de la mascota-->
                <h3>Registro de Vacunas</h3>
                <form action="" method="GET">
                	<div class="container">
                	<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#BuscarCliente">Buscar Cliente
					</button><br><br>
					<label>Detalles del cliente</label>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" readonly><br>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3">
						<input type="text" name="nombre" class="form-control" placeholder="Apellido Paterno" readonly><br>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3">
						<input type="text" name="nombre" class="form-control" placeholder="Apellido Materno" readonly><br>
					</div>
					</div>
					<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#BuscarMascotaVacunas">Buscar Mascota
					</button><br><br>
					<label>Detalles de la mascota</label>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" readonly><br>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3">
						<input type="text" name="nombre" class="form-control" placeholder="Edad" readonly><br>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3">
						<input type="text" name="nombre" class="form-control" placeholder="Tipo de mascota" readonly><br>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3">
						<input type="text" name="nombre" class="form-control" placeholder="Raza" readonly><br>
					</div>
					<br>
					</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
					<input type="text" name="descripcion" class="form-control" placeholder="Vacuna"><br />
					<textarea class="form-control" rows="3" placeholder="Descripcion"></textarea>
					</div>
>>>>>>> origin/gh-pages
>>>>>>> origin/gh-pages
                </form>

              </div>

        <div id="MascotasAltas" class="tab-pane fade"><!--registro de altas mascotas-->

                  <h3>Registro</h3>

                    <form id="form_mascotas" method="post">

                    <div class="form-group col-sm-12 col-sm-4 col-md-4">

                      <div class="col-md-10 col-sm-10 col-xs-12">

                      <label>Datos del cliente</label><br>

                        <div class="ui-widget">              

                <input id="nombre" type="text" name="nombre" class="nombre form-control" data-toggle="tooltip" title="Busca por el nombre del cliente." placeholder="Nombre Cliente"><br />

                          <input id="a_paterno" type="text" name="a_paterno" class="a_paterno form-control" placeholder="Apellido Paterno"  readonly><br />

                          <input id="a_materno" type="text" name="a_materno" class="a_materno form-control" placeholder="Apellido Materno"  readonly><br />

                          <input id="id_cliente" type="hidden"  name="id_cliente" class="id_cliente form-control">

                        </div>

                        </div>

                      </div>

                      <div class="form-group col-xs-12 col-sm-4 col-md-4">

                        <div class="col-md-10 col-sm-10 col-xs-12">

                        <label for="">Detalles de la mascota</label><br />

                        <input type="text" name="nombre_mascota" class="nombre_mascota form-control" placeholder="Nombre"><br />

                        <input type="text" name="edad" class="edad form-control" placeholder="Edad"><br />

                        <input type="text" name="color" class="color form-control" placeholder="Color"><br />

                        <input type="text" name="longitud" class="longitud form-control" placeholder="Longitud"><br />

                        <input type="text" name="peso" class="peso form-control" placeholder="Peso">

                        </div>

                      </div>

                      <div class="form-group col-xs-12 col-sm-4 col-md-4">

                        <label>Tipo de Mascota</label><br />

                        <div class="col-md-10 col-sm-10 col-xs-12">

                          <select name="tipoMascota" id="tipoMascota" class="tipoMascota form-control"><!--menu del tipo de mascota dentro de los datos-->

                            <option value="">Selecione una opcion...</option>

                            <option value="Canino">Perro</option>

                            <option value="Felino">Gato</option>

                            <option value="Reptil">Reptil</option>

                            <option value="Pez">Pez</option>

                            <option value="Ave">Ave</option>

                            <option value="Otro">Otro</option>

                          </select>

                        </div>

                        <label>Raza de la mascota</label><br>

                        <div class="col-md-10 col-sm-10 col-xs-12">

                          <input type="text" name="raza" class="raza form-control">

                        </div>

                        <label>Tipo de Sangre</label><br>

                        <div class="col-md-10 col-sm-10 col-xs-12">

                          <input type="text" name="tipo_sangre" class="tipo_sangre form-control">                     

                        </div>

                        <div class="form-group">

                          <label>Esterilizado</label><br>

                          <div class="col-md-10 col-sm-10 container col-xs-12">

                            <label class="radio-inline">

                    <input type="radio" name="esterilizado" class="esterilizado" id="inlineRadio1" value="Si">Si

                  </label>          

                <label class="radio-inline">

                  <input type="radio" name="esterilizado" class="esterilizado" id="inlineRadio2" value="No">No

                </label>

                </div>

              </div>

              <div class="form-group">

                          <label>Sexo de la mascota</label>

                          <div class="col-md-10 col-sm-10 container col-xs-12">

                            <label class="radio-inline">

                      <input type="radio" name="sexo" class="sexo" id="inlineRadio1" value="Macho">Macho

                    </label>          

                  <label class="radio-inline">

                      <input type="radio" name="sexo" class="sexo" id="inlineRadio2" value="Hembra">Hembra

                  </label>

                </div>

              </div>

            </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12">

                      <label>Alergias</label><br>

                      <div class="col-md-12 col-sm-12 col-xs-12">

                        <input type="text" name="alergias" class="alergias form-control" placeholder="Alergias">

                      </div>

                      <label>Observaciones</label>

                      <div class="col-md-12 col-sm-12 col-xs-12">

                        <textarea name="observaciones" class="observaciones form-control" rows="3" placeholder="Observaciones"></textarea>

                      </div>

                    </div>



                    <div class="col-md-1"> 

                    <div class="col-xs-12 col-sm-12 col-md-12">

                      <button id="agregar_mascota" type="text" name="agregar_mascota" class="agregar_mascota btn btn-dark">Registrar</button>

                    </div>

                </div>

                </form>
<<<<<<< HEAD

              </div>

              <div id="ClientesAltas" class="tab-pane fade"><!--registro de altas de clientes-->

=======
	            </div>
            	<div id="ClientesAltas" class="tab-pane fade"><!--registro de altas de clientes-->
<<<<<<< HEAD
>>>>>>> origin/gh-pages
                  <h3>Registro</h3>

                    <div class="form-group"><!--datos a ingresar del cliente-->

                      <div class="container">

                        <form id="form_conte" method="post">

                          <div class="row">

                            <div class="col-xs-12 col-md-12 col-sm-12">

                              <label for="">Detalles del Cliente</label><br>

                            </div>

                            <div class="col-xs-12 col-md-4 col-sm-4">

                              <input type="text" id="nombre_cliente" name="nombre_cliente" class="nombre_cliente form-control" placeholder="Nombre"><br />

                              <input type="text" id="direccion" name="direccion" class="direccion form-control" placeholder="Direccion"><br />

                            </div>

                            <div class="col-xs-12 col-md-4 col-sm-4">

                              <input type="text" id="a_paterno_cliente" name="a_paterno_cliente" class="a_paterno_cliente form-control" placeholder="Apellido Paterno"><br />

                              <input type="tel" maxlength="10" id="celular" name="celular" class="celular form-control" placeholder="Celular"><br />

                            </div>

                            <div class="col-xs-12 col-md-4 col-sm-4">

                              <input type="text" id="a_materno_cliente" name="a_materno_cliente" class="a_materno_cliente form-control" placeholder="Apellido Materno"><br />

                              <input type="tel" maxlength="10" id="telefono" name="telefono" class="telefono form-control" placeholder="Telefono"><br />

                            </div>

                            <div class="form-group col-xs-12 col-md-4 col-sm-4"><!--menu de fecha de nacimiento-->            

                        <div class="input-group">

                          <div class="input-group-addon">

                            <i class="fa fa-calendar"></i>

                          </div>

                          <input class="date form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text" data-toggle="tooltip" title="Fecha de nacimiento!"/>

                        </div>

                      </div>

                  </div>

                  <div class="row">

                  <div class="col-md-1"> 

                          <div class="col-xs-12 col-sm-12 col-md-12">

                            <button id="agregar" type="text" name="agregar" class="agregar btn btn-dark">Registrar</button>

                          </div>

                        </div>

                    </div>

                        </form>

                      </div>

                    </div>
<<<<<<< HEAD

              </div>

=======
=======
	                <h3>Registro</h3>
	                <form action="" method="GET">
                  	<div class="form-group"><!--datos a ingresar del cliente-->
                  		<div class="row">
                  			<div class="col-md-12 col-sm-12 col-xs-12">
                  				<label for="">Detalles del Cliente</label><br>
                  			</div>
                  			<div class="col-md-3 col-sm-3 col-xs-12">
                  				<input type="text" name="nombre" class="form-control" placeholder="Nombre"><br />
                  				<input type="text" name="nombre" class="form-control" placeholder="Direccion"><br />
                  			</div>
                  			<div class="col-md-3 col-sm-3 col-xs-12">
                  				<input type="text" name="descripcion" class="form-control" placeholder="Apellido Paterno"><br />
                  				<input type="text" name="nombre" class="form-control" placeholder="Celular"><br />
                  			</div>
                  			<div class="col-md-3 col-sm-3 col-xs-12">
                  				<input type="text" name="precio" class="form-control" placeholder="Apellido Materno"><br />
                  				<input type="text" name="nombre" class="form-control" placeholder="Telefono"><br />
                  			</div>
                  			<div class="col-md-6 col-sm-6 col-xs-12">
                  				<label>Fecha de nacimiento</label><br /><!--menu de fecha de nacimiento-->
                  				<div class="col-md-4 col-xs-12 col-sm-4"><!--menu de dias-->
		            				<select name="" id="" class="form-control">
			                   	<option value="">1</option>
			                   	<option value="">2</option>
			                   	<option value="">3</option>
			                   	<option value="">4</option>
			                   	<option value="">5</option>
			                   	<option value="">6</option>
			                   	<option value="">7</option>
			                		</select><br>
			                	</div>
		                		<div class="col-md-4 col-xs-12 col-sm-4"><!--menu de meses-->
			                    <select name="" id="" class="form-control">
			                    	<option value="">Enero</option>
			                    	<option value="">Febrero</option>
			                    	<option value="">Marzo</option>
			                    	<option value="">Abril</option>
			                    	<option value="">Mayo</option>
			                    	<option value="">Junio</option>
			                    	<option value="">Julio</option>
			                    	<option value="">Agosto</option>
			                    	<option value="">Septiembre</option>
			                    	<option value="">Octubre</option>
			                    	<option value="">Noviembre</option>
			                    	<option value="">Diciembre</option>
			                    </select><br />
			                	</div>
			                	<div class="col-md-4 col-xs-12 col-sm-4"><!--menu de años-->
			            		<select name="" id="" class="form-control">
				                   	<option value="">2017</option>
				                   	<option value="">2016</option>
				                   	<option value="">2015</option>
				                   	<option value="">2014</option>
				                   	<option value="">2013</option>
				                   	<option value="">2012</option>
				                   	<option value="">2011</option>
				                </select>
			            		</div>
                  			</div>
                  		</div>
            		</div>
					</form>
>>>>>>> origin/gh-pages
	            </div>
>>>>>>> origin/gh-pages
            </div>

        </div>

      </div>

    </div><br>



  <!-- Modal agregar usuarios -->

  <div class="modal fade" id="agregar_usuarios" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="newModalLabel"  aria-hidden="true">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" onclick="cargar('#tabla_usuarios','../PHP/tabla_usuarios.php')" aria-hidden="true">&times;</button>

            <h4 class="modal-title">Agregar</h4>

          </div>

        <div class="modal-body">

          <form id="form_usuarios" role="form" method="post" >

            <div class="form-group">

              <label for="nombre_usuario">Nombre usuario</label>

              <input id="nombre_usuario" type="text" class="nombre_usuario form-control" name="nombre_usuario" placeholder="Nombre del usuario" required>

            </div>

        <div class="form-group">

              <label for="contrasena_usuario">Contraseña</label>

              <input id="contrasena_usuario" type="text" class="contrasena_usuario form-control" name="contrasena_usuario" placeholder="Contraseña del usuario" required>

       </div>

        <div class="form-group">

          <label for="clinicas">Clinica</label>

          <select name="clinica_usuario" id="clinica_usuario" class="clinica_usuario form-control" required>

              <option value="">Selecione una opcion...</option>

              <?php    

                require_once('../PHP/clinicas.php');                                   

              ?>

          </select>

        </div>

        <div class="form-group">

          <label for="privilegio_usuario">Privilegio</label>          

          <input id="privilegio_usuario" type="number" class="privilegio_usuario form-control" placeholder="Privilegio del usuario" name="privilegio_usuario" max="1" min="0" required>

        </div>

            <button id="agregar_usuario" type="text" onclick="cargar('#tabla_usuarios','../PHP/tabla_usuarios.php')" class="agregar_usuario btn btn-default">Agregar</button>

          </form>

        </div>

      </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

  </div><!-- /.modal -->



    <!-- Modal agregar usuarios -->

  <div class="modal fade" id="agregar_medico" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="newModalLabel"  aria-hidden="true">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" onclick="cargar('#tabla_medicos','../PHP/tabla_medicos.php')" aria-hidden="true">&times;</button>

            <h4 class="modal-title">Agregar</h4>

          </div>

        <div class="modal-body">

          <form id="form_medicos" role="form" method="post" >

        <div class="form-group">

          <label for="Empleados">Empleado</label>

          <select name="empleado_medico" id="empleado_medico" class="empleado_medico form-control" required>

              <option value="">Selecione una opcion...</option>

              <?php    

                require('../PHP/empleados.php');                                   

              ?>

          </select>

        </div>

        <div class="form-group">

              <label for="Cedula">Cedula</label>

              <input id="cedula_medicos" type="number" class="cedula_medicos form-control" name="cedula_medicos" placeholder="Cedula del medico" required>

       </div>

            <button id="agregar_medico" type="text" onclick="cargar('#tabla_medicos','../PHP/tabla_medicos.php')" class="agregar_medico btn btn-default">Agregar</button>

          </form>

        </div>

      </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

  </div><!-- /.modal -->



  <div class="modal fade" id="agregar_notas" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="newModalLabel"  aria-hidden="true">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" onclick="cargar('#tabla_notas','../PHP/tabla_notas.php')" aria-hidden="true">&times;</button>

            <h4 class="modal-title">Agregar</h4>

          </div>

        <div class="modal-body">

          <form id="form_notas2" role="form" method="post" >

        <div class="form-group">

          <label for="Usuarios">Usuario</label>

          <select name="usuario_nota" id="usuario_nota" class="usuario_nota form-control" required>

              <option value="">Selecione una opcion...</option>

              <?php    

                require('../PHP/usuarios.php');                                   

              ?>

          </select>

        </div>

        <div class="form-group">

              <label for="titulos_notas">Titulo</label>

              <input id="titulos_notas" type="text" class="titulos_notas form-control" name="titulos_notas" placeholder="Titulo nota" required>

       </div>

        <div class="form-group">

              <label for="cuerpo_notas">Comentarios</label>

              <input id="cuerpo_notas" type="text" class="cuerpo_notas form-control" name="cuerpo_notas" placeholder="Comentarios" required>

       </div>

            <button id="agregar_notas_admin" type="text" onclick="cargar('#tabla_notas','../PHP/tabla_notas.php')" class="agregar_notas_admin btn btn-default">Agregar</button>

          </form>

        </div>

      </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

  </div><!-- /.modal -->



    <div class="modal fade" id="agregar_medicamentos_modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="newModalLabel"  aria-hidden="true">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" onclick="cargar('#tabla_medicamento','../PHP/tabla_medicamentos.php')" aria-hidden="true">&times;</button>

            <h4 class="modal-title">Agregar</h4>

          </div>

        <div class="modal-body">

          <form id="form_medicamentos2" role="form" method="post" >

        <div class="form-group">

              <label for="nombre_generico_2">Nombre Generico</label>

              <input id="nombre_generico_2" type="text" class="nombre_generico_2 form-control" name="nombre_generico_2" placeholder="Nombre generico" required>

       </div>

        <div class="form-group">

              <label for="nombre_comercial_2">Nombre Comercial</label>

              <input id="nombre_comercial_2" type="text" class="nombre_comercial_2 form-control" name="nombre_comercial_2" placeholder="Nombre comercial" required>

       </div>

        <div class="form-group">

          <label for="medicamento_tipo">Tipo Medicamento</label>

          <select name="medicamento_tipo" id="medicamento_tipo" class="medicamento_tipo form-control" required>

              <option value="">Selecione una opcion...</option>

              <?php    

                require('../PHP/tipo_medicamento.php');                                   

              ?>

          </select>

        </div>

        <div class="form-group">

          <label for="administracion_tipo">Tipo Administracion</label>

          <select name="administracion_tipo" id="administracion_tipo" class="administracion_tipo form-control" required>

              <option value="">Selecione una opcion...</option>

              <?php    

                require('../PHP/tipo_admin_medicamento.php');                                   

              ?>

          </select>

        </div>

            <button id="medicamentos_agregar" type="text" onclick="cargar('#tabla_medicamento','../PHP/tabla_medicamentos.php')" class="medicamentos_agregar btn btn-default">Agregar</button>

          </form>

        </div>

      </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

  </div><!-- /.modal -->





      <div class="modal fade" id="agregar_vacunas_modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="newModalLabel"  aria-hidden="true">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" onclick="cargar('#tabla_vacunas_admin','../PHP/tabla_vacunas_admin.php')" aria-hidden="true">&times;</button>

            <h4 class="modal-title">Agregar</h4>

          </div>

        <div class="modal-body">

          <form id="form_vacunas2" role="form" method="post" >

        <div class="form-group">

              <label for="abreviatura_vacuna">Abreviatura Vacuna</label>

              <input id="abreviatura_vacuna" type="text" class="abreviatura_vacuna form-control" name="abreviatura_vacuna" placeholder="Abreviatura vacuna" >

       </div>

        <div class="form-group">

              <label for="nombre_vacuna">Nombre Vacuna</label>

              <input id="nombre_vacuna" type="text" class="nombre_comercial_2 form-control" name="nombre_vacuna" placeholder="Nombre vacuna" required>

       </div>

            <button id="vacunas_agregar" type="text" onclick="cargar('#tabla_vacunas_admin','../PHP/tabla_vacunas_admin.php')" class="vacunas_agregar btn btn-default">Agregar</button>

          </form>

        </div>

      </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

  </div><!-- /.modal -->



    <!-- Modal agregar usuarios -->

  <div class="modal fade" id="agregar_empleados" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="newModalLabel"  aria-hidden="true">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" onclick="cargar('#tabla_empleado','../PHP/tabla_empleados.php')" aria-hidden="true">&times;</button>

            <h4 class="modal-title">Agregar</h4>

          </div>

        <div class="modal-body">

          <form id="form_empleados" role="form" method="post" >

        <div class="form-group">

              <label for="nombre_empleado">Nombre</label>

              <input id="nombre_empleado" type="text" class="nombre_empleado form-control" name="nombre_empleado" placeholder="Nombre del empleado" required>

       </div>

        <div class="form-group">

              <label for="apellido_paterno_empleado">Apellido Paterno</label>

              <input id="apellido_paterno_empleado" type="text" class="apellido_paterno_empleado form-control" name="apellido_paterno_empleado" placeholder="Apellido paterno del empleado" required>

       </div>

        <div class="form-group">

              <label for="apellido_materno_empleado">Apellido Materno</label>

              <input id="apellido_materno_empleado" type="text" class="apellido_materno_empleado form-control" name="apellido_materno_empleado" placeholder="Apellido materno del empleado" required>

       </div>

        <div class="form-group">

              <label for="fecha_nacimiento_empleado">Fecha nacimiento</label>

              <input id="fecha_nacimiento_empleado" type="date" class="fecha_nacimiento_empleado form-control" name="fecha_nacimiento_empleado" placeholder="Fecha de nacimiento" required>

       </div>

        <div class="form-group">

              <label for="direccion_empleado">Direccion</label>

              <input id="direccion_empleado" type="text" class="direccion_empleado form-control" name="direccion_empleado" placeholder="Direccion" required>

       </div>

        <div class="form-group">

              <label for="telefono_empleado">Telefono</label>

              <input id="telefono_empleado" type="number" class="telefono_empleado form-control" name="telefono_empleado" placeholder="Telefono del empleado" required>

       </div>

        <div class="form-group">

              <label for="movil_empleado">Movil</label>

              <input id="movil_empleado" type="number" class="movil_empleado form-control" name="movil_empleado" placeholder="Movil del empleado" required>

       </div>

        <div class="form-group">

              <label for="curp_empleado">CURP</label>

              <input id="curp_empleado" type="text" class="curp_empleado form-control" name="curp_empleado" placeholder="CURP" required>

       </div>

        <div class="form-group">

              <label for="rfc_empleado">RFC</label>

              <input id="rfc_empleado" type="text" class="rfc_empleado form-control" name="rfc_empleado" placeholder="RFC" required>

       </div>

        <div class="form-group">

              <label for="sexo_empleado">Sexo</label>          

              <select name="sexo_empleado" id="sexo_empleado" class="sexo_empleado form-control" required>

                <option value="">Selecione una opcion...</option>

                <option value="M">Hombre</option>

                <option value="F">Mujer</option>

              </select>

       </div>

            <button id="agregar_empleados" type="text" onclick="cargar('#tabla_empleados','../PHP/tabla_empleados.php')" class="agregar_empleados btn btn-default">Agregar</button>

          </form>

        </div>

      </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

  </div><!-- /.modal -->



  <div class="modal fade" id="NuevaNota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!-- Modal para nueva nota-->

            <div class="modal-dialog" role="document">

              <form id="notas_form"  method="post">

              <div class="modal-content">

                <div class="modal-header">

                  <h4 class="modal-title" id="">Nueva Nota

                  <input id="nota_titulo" type="text" name="nota_titulo" class="nota_titulo form-control" aria-label="Nota" placeholder="Titulo nota"></h4>

                </div>

                <div class="modal-body">

                <div class="col-md-12 col-sm-12 col-xs-12 container-fluid">

                        <textarea id="nota_comentario" name="nota_comentario" class="nota_comentario form-control" rows="3" placeholder="Comentarios"></textarea><br />

                      </div>

              </div>

                <div class="modal-footer">

                  <button id="enviar_notas" type="text" class="enviar_notas btn btn-primary" data-dismiss='modal'>Enviar</button>

                </div>

              </div>

            </div>

            </form>

  </div>

  <div class="modal fade" id="EditarNota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!-- Modal para editar nota-->

            <div class="modal-dialog" role="document">

              <form id="notas_form_editar"  method="post">

              <div class="modal-content">

                <div class="modal-header">

                  <h4 class="modal-title" id="">Editar nota</h4>

                    <input id="editar_titulo_nota" name="editar_titulo_nota" type="text" class="editar_titulo_nota form-control" aria-label="Nota" placeholder="Nombre de la nota" value=

                  "<?php 

                      require_once '../PHP/info_notas.php';  

                      echo $titulo;

                  ?>"

                  >                 

                </div>

                <div class="modal-body">

                <div class="col-md-12 col-sm-12 col-xs-12 container-fluid">

                <input id="id_nota" name="id_nota" type="hidden" class="id_nota form-control"  value=

                  "<?php 

                      require_once '../PHP/info_notas.php';  

                      echo $id_nota;

                  ?>"

                  >                     

                        <textarea id="editar_comentario_nota" name="editar_comentario_nota" class="editar_comentario_nota form-control" rows="3" placeholder="Notas">

                        <?php 

                        require_once '../PHP/info_notas.php';  

                        echo $comentario;

                    ?>                          

                        </textarea> <br />

                      </div>

              </div>

                <div class="modal-footer">

                  <button id="editar_nota" name="editar_nota" type="text" class="editar_nota btn btn-primary" data-dismiss='modal'>Aceptar</button>

                </div>

              </div>

              </form>

            </div>

          </div>



    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="../bootstrap337/js/bootstrap.min.js"></script>

      <!-- Include Date Range Picker -->

    <script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="../js/datepicker.js"></script>

    <script src="../jAlert/dist/jAlert.min.js"></script>

    <script src="../jAlert/dist/jAlert-functions.min.js"> //optional!!</script>

</body>

</html>