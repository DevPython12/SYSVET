<?php
	require('../PHP/config.php');
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
	<link href="../bootstrap337/css/bootstrap.min.css" rel="stylesheet">
	 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="../estilos1.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap337/css/bootstrap.css">	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body><br><br><br>
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
              	<li><a href="#Administracion" data-toggle="tab">Administracion</a></li>
                <li class="active"><a data-toggle="tab" href="#Inicio">Inicio</a></li>
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
	        						<th><a href="#ClientesBajas2" data-toggle="tab">Bajas/Editar Clientes <span class="glyphicon glyphicon-chevron-down"></span></a></th>
	        						<th><a href="#Empleados" data-toggle="tab">Empleados <span class="glyphicon glyphicon-chevron-down"></span></a></th>
	        					</tbody>
        					</table>
        				</div>
        				<div class="container">
        					<div class="row">
        						<div class="col-xs-12 col-sm-12 col-md-12">
        							<div class="tab-content">
        								<div id="Usuarios" class="tab-pane fade">
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
        								<div id="Medicos" class="tab-pane fade">
        									<div class="col-sm-3 col-xs-12 col-md-3">
        										<div class="input-group">
												    <input type="text" class="form-control" placeholder="Buscar">
												    <span class="input-group-btn">
												    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
												    </span>
											    </div>
        									</div>
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
							                <div class="col-sm-3 col-xs-12 col-md-3">
        										<div class="input-group">
												    <input type="text" class="form-control" placeholder="Buscar">
												    <span class="input-group-btn">
												    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
												    </span>
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
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
              <div id="Inicio" class="tab-pane fade in active"><!--pagina de inicio, se usa para notas-->
                <h3 class="header">Notas <a data-target="#NuevaNota" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span></a></h3>
                <div class="col-xs-12 col-md-4 col-sm-4">
                <div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Titulo de la nota mas un espacio despues <a data-target="#EditarNota" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a></h3>
				  </div>
				  <div class="panel-body">
				  contenido de la nota
				  </div>
				</div>
				</div>
              </div>
              <div id="Historial" class="tab-pane fade"><!--pagina de inicio, se usa para notas-->
                <h3>Historial Clinico</h3>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#BuscarMascotayCliente">Buscar Mascota
              	</button>
              	<div class="col-xs-12 col-md-12 col-sm-12">
              	<label>Detalles Cliente</label><br>
	              		<div class="col-xs-12 col-md-4 col-sm-4">
	              			<input type="text" name="descripcion" class="form-control" placeholder="Nombre" readonly><br />
	              		</div>
	              		<div class="col-xs-12 col-md-4 col-sm-4">
	              			<input type="text" name="descripcion" class="form-control" placeholder="Apellido Paterno" readonly><br />
	              		</div>
	              		<div class="col-xs-12 col-md-4 col-sm-4">
	              			<input type="text" name="descripcion" class="form-control" placeholder="Apellido Materno" readonly><br />
	              		</div>
              			<div class="col-xs-12 col-md-3 col-sm-3">
              				<label>Descripcion fisica de la mascota</label><br>
              				<input type="text" name="descripcion" class="form-control" placeholder="Nombre" readonly><br />
              				<input type="text" name="nombre" class="form-control" placeholder="Color" readonly><br />
			            </div>
			            <div class="col-xs-12 col-md-3 col-sm-3">
			            	<label>Clasificacion de la mascota</label>
			            	<input type="text" name="nombre" class="form-control" placeholder="Tipo de mascota" readonly><br />
			            	<input type="text" name="descripcion" class="form-control" placeholder="Raza" readonly><br />
			            </div>
			            <div class="col-xs-12 col-md-3 col-sm-3">
			            	<label>Detalles de crecimiento 1° consulta</label><br>
			                <input type="text" name="descripcion" class="form-control" placeholder="Edad" readonly><br />
			                <input type="text" name="descripcion" class="form-control" placeholder="Longitud" readonly><br />
			                <input type="text" name="descripcion" class="form-control" placeholder="Peso" readonly><br>
              			</div>
              			<div class="col-xs-12 col-md-3 col-sm-3">
			            	<label>Detalles de crecimiento actual</label><br>
			                <input type="text" name="descripcion" class="form-control" placeholder="Edad" readonly><br />
			                <input type="text" name="descripcion" class="form-control" placeholder="Longitud" readonly><br />
			                <input type="text" name="descripcion" class="form-control" placeholder="Peso" readonly><br>
              			</div>
              			<table class="table table-condensed">
              			<tr class="">
							  <td class="">Num. Consulta</td>
							  <td class="">Doctor</td>
							  <td class="">Observaciones</td>
							  <td class="">Tratamiento</td>
							  <td class="">Fecha</td>
              			</tr>
              			<tr class="">
							  <td class="">Num. Consulta</td>
							  <td class="">Doctor</td>
							  <td class="">Observaciones</td>
							  <td class="">Tratamiento</td>
							  <td class="">Fecha</td>
              			</tr>
              			<tr class="">
							  <td class="">Num. Consulta</td>
							  <td class="">Doctor</td>
							  <td class="">Observaciones</td>
							  <td class="">Tratamiento</td>
							  <td class="">Fecha</td>
              			</tr>
              			</table>
	              </div>
              </div>
				<div id="Consultas" class="tab-pane fade"><!--formulario para registrar consultas-->
					<h3>Consulta</h3>
              		<form>
              		<div class="col-xs-12 col-md-12 col-sm-12">
              		<label>Detalles del Doctor</label><br>
	              		<div class="col-xs-12 col-md-4 col-sm-4">
	              			<input type="text" name="descripcion" class="form-control" placeholder="Nombre" readonly><br />
	              		</div>
	              		<div class="col-xs-12 col-md-4 col-sm-4">
	              			<input type="text" name="descripcion" class="form-control" placeholder="Apellido Paterno" readonly><br />
	              		</div>
	              		<div class="col-xs-12 col-md-4 col-sm-4">
	              			<input type="text" name="descripcion" class="form-control" placeholder="Apellido Materno" readonly><br />
	              		</div>
              			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#BuscarMascotayCliente">Buscar Mascota
              			</button><br><br>
              			<div class="col-xs-12 col-md-4 col-sm-4">
              				<label>Descripcion fisica de la mascota</label><br>
              				<input type="text" name="descripcion" class="form-control" placeholder="Nombre" readonly><br />
              				<input type="text" name="nombre" class="form-control" placeholder="Color" readonly><br />
			            </div>
			            <div class="col-xs-12 col-md-4 col-sm-4">
			            	<label>Clasificacion de la mascota</label>
			            	<input type="text" name="nombre" class="form-control" placeholder="Tipo de mascota" readonly><br />
			            	<input type="text" name="descripcion" class="form-control" placeholder="Raza" readonly><br />
			            </div>
			            <div class="col-xs-12 col-md-4 col-sm-4">
			            	<label>Detalles de crecimiento</label><br>
			                <input type="text" name="descripcion" class="form-control" placeholder="Edad"><br />
			                <input type="text" name="descripcion" class="form-control" placeholder="Longitud"><br />
			                <input type="text" name="descripcion" class="form-control" placeholder="Peso"><br>
              			</div>
              		</div>
              		<div class="col-xs-12 col-md-12 col-sm-12">
	              		<label>Detalles Cliente</label><br>
	              		<div class="col-xs-12 col-md-4 col-sm-4">
	              			<input type="text" name="descripcion" class="form-control" placeholder="Nombre" readonly><br />
	              		</div>
	              		<div class="col-xs-12 col-md-4 col-sm-4">
	              			<input type="text" name="descripcion" class="form-control" placeholder="Apellido Paterno" readonly><br />
	              		</div>
	              		<div class="col-xs-12 col-md-4 col-sm-4">
	              			<input type="text" name="descripcion" class="form-control" placeholder="Apellido Materno" readonly><br />
	              		</div>
	              		<label>Observaciones</label>
		                <div class="col-md-12 col-sm-12 col-xs-12">
		                <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea><br>
		                <button class="btn btn-default">Guardar</button>
		                <button class="btn btn-default">Eliminar</button>
		                </div>
	                </div>
              		</form>
				</div>
              <div id="MascotasBajas" class="tab-pane fade"><!--registro para editar o dar de baja mascotas-->
                <h3>Bajas y Edicion de Mascotas</h3>
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
                </form>
              </div>
				<div id="MascotasAltas" class="tab-pane fade"><!--registro de altas mascotas-->
	                <h3>Registro</h3>
	                <form action="" method="GET"><!--registro de alta de las mascotas-->
	                  <div class="form-group col-sm-12 col-sm-4 col-md-4">
	                  <div class="col-md-10 col-sm-10 col-xs-12">
	                  <label>Datos del cliente</label><br>
	                  	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#BuscarCliente">Buscar</button><br><br>
						<input type="text" name="descripcion" class="form-control" placeholder="Nombre Cliente" readonly><br />
	                    <input type="text" name="nombre" class="form-control" placeholder="Apellido Paterno" readonly><br />
	                    <input type="text" name="descripcion" class="form-control" placeholder="Apellido Materno" readonly><br />
	                    
	                    </div>
	                    </div>
	                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
	                    <div class="col-md-10 col-sm-10 col-xs-12">
	                    <label for="">Detalles de la mascota</label><br />
	                    <input type="text" name="nombre" class="form-control" placeholder="Nombre"><br />
	                    <input type="text" name="descripcion" class="form-control" placeholder="Edad"><br />
	                    <input type="text" name="nombre" class="form-control" placeholder="Color"><br />
	                    <input type="text" name="descripcion" class="form-control" placeholder="Longitud"><br />
	                    <input type="text" name="descripcion" class="form-control" placeholder="Peso">
	                    </div>
	                    </div>
	                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
	                    <label>Tipo de Mascota</label><br />
	                    <div class="col-md-10 col-sm-10 col-xs-12">
	                    <select name="Tipo de mascota" id="" class="form-control"><!--menu del tipo de mascota dentro de los datos-->
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
	                    <select name="Raza" id="" class="form-control">
	                      <option value="">Selecione una opcion...</option>
	                    </select>
	                    </div>
	                    <label>Tipo de Sangre</label><br>
	                    <div class="col-md-10 col-sm-10 col-xs-12">
	                    <select name="Raza" id="" class="form-control">
	                      <option value="">Selecione una opcion...</option>
	                    </select>
	                    </div>
	                    <div class="form-group">
	                    <label>Esterilizado</label><br>
	                    <div class="col-md-10 col-sm-10 container col-xs-12">
	                    <label class="radio-inline">
						  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option2">Si
						</label>					
						<label class="radio-inline">
						  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">No
						</label>
						</div>
						</div>
						<div class="form-group">
	                    <label>Sexo de la mascota</label>
	                    <div class="col-md-10 col-sm-10 container col-xs-12">
	                    <label class="radio-inline">
						  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option2">Macho
						</label>					
						<label class="radio-inline">
						  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">Hembra
						</label>
						</div>
						</div>
						</div>
	                  <div class="form-group col-xs-12 col-sm-12 col-md-12">
	                  <label>Alergias</label><br>
	                  <div class="col-md-12 col-sm-12 col-xs-12">
	                  <input type="text" name="descripcion" class="form-control" placeholder="Alergias">
	                  </div>
	                  <label>Observaciones</label>
	                  <div class="col-md-12 col-sm-12 col-xs-12">
	                  <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
	                  </div>
	                  </div>
	                </form>
	            </div>
            	<div id="ClientesAltas" class="tab-pane fade"><!--registro de altas de clientes-->
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
	            </div>
            </div>
        </div>
      </div>
    </div><br>
    <!--<div class="container">
		<div class="row">
    		<div class="col-xs-12 col-md-12 col-sm-12 fondonegro">
    			<img src="../logosysvetmod.png" width="150PX" alt="" align="right">
    		</div>
    	</div>
    </div>--><!--logo sysvet e informacion de abajo-->
    <div class="modal fade" id="BuscarMascotayCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!-- Modal busca mascota para dar de baja o editar-->
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="">Buscar Mascota</h4>
					      </div>
					    	<div class="modal-body">
								<div class="input-group container-fluid">
									<input type="text" class="form-control" placeholder="Buscar Cliente">
									<span class="input-group-btn">
									<button class="btn btn-default" type="button">Buscar</button>
									</span>
								</div><br>
								<div class="col-md-4 col-xs-12 col-sm-4">
									<select name="" id="" class="form-control">
										<option value="">Mascota</option>
							        </select>
						        </div>
							</div><br>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss='modal'>Cancelar</button>
					      </div>
					    </div>
					  </div>
					</div><br>
    <div class="modal fade" id="BuscarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!-- Modal busca cliente para dar de baja o editar-->
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="">Buscar Cliente</h4>
					      </div>
					      <div class="modal-body">
					      	<div class="col-lg-6">
							    <div class="input-group">
							      <input type="text" class="form-control" placeholder="Buscar">
							      <span class="input-group-btn">
							        <button class="btn btn-default" type="button">Buscar</button>
							      </span>
							    </div>
							    </div>
							    </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss='modal'>Cancelar</button>
					      </div>
					    </div>
					  </div>
					</div>
    <div class="modal fade" id="BuscarMascotaVacunas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!-- Modal busca la mascota para la vacuna-->
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="">Buscar Mascota</h4>
					      </div>
					      <div class="modal-body">
					      	<div class="col-lg-6">
							    <div class="input-group">
							      <input type="text" class="form-control" placeholder="Buscar">
							      <span class="input-group-btn">
							        <button class="btn btn-default" type="button">Buscar</button>
							      </span>
							    </div>
							    </div>
							    </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss='modal'>Cancelar</button>
					      </div>
					    </div>
					  </div>
					</div>
	<div class="modal fade" id="NuevaNota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!-- Modal para nueva nota-->
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="">Nueva Nota
					        <input type="text" class="form-control" aria-label="Nota" placeholder="Nota1"></h4>
					      </div>
					    	<div class="modal-body">
					    	<div class="col-md-12 col-sm-12 col-xs-12 container-fluid">
			                	<textarea class="form-control" rows="3" placeholder="Notas"></textarea>
			                </div>
							</div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss='modal'>Aceptar</button>
					      </div>
					    </div>
					  </div>
					</div>
	<div class="modal fade" id="EditarNota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!-- Modal para editar nota-->
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="">Editar nota
					        <input type="text" class="form-control" aria-label="Nota" placeholder="Nombre de la nota"></h4>
					      </div>
					    	<div class="modal-body">
					    	<div class="col-md-12 col-sm-12 col-xs-12 container-fluid">
			                	<textarea class="form-control" rows="3" placeholder="Notas"></textarea>
			                </div>
							</div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss='modal'>Aceptar</button>
					      </div>
					    </div>
					  </div>
					</div>

					<div class="container">
 			<div class="row">
 				<div class="col-md-12">
 				<div class="tab-content">
 					
 					<div id="clientes" class="tab-pane fade in active">
 						<h3>Listado de Clientes</h3>

 						<?php
 							$sql = "SELECT * FROM clientes";
 							$result = $con->query($sql);
 							if($result->num_rows>0){
 								echo "<table class='table table-hover'>
 									<tr>
 										<th>Id de Cliente</th>
 										<th>Nombre</th>
 										<th>Apellido Paterno</th>
 										<th>Apellido Materno</th>
 										<th>Fecha_de_nacimiento</th>
 										<th>Direccion</th>
 										<th>Telefono</th>
 										<th>Movil</th>
 									</tr>
 									<tr>";

 									while($row=$result->fetch_assoc())
 									{
 										echo "<td>".$row["id_cliente"].    "</td>".
 											"<td>".$row["nombre"]. 			"</td>".
 											"<td>".$row["apellido_paterno"]. 	"</td>".
 											"<td>".$row["apellido_materno"].        	"</td>".
                                          	"<td>".$row["fecha_nacimiento"].  	"</td>".
                                          	"<td>".$row["direccion"].  	"</td>".
                                          	"<td>".$row["telefono"].  	"</td>".
                                          	"<td>".$row["movil"].  	"</td>".
                                          	"</tr>";
 									}
 							}else{
 								echo " 0 results";
 							}								
 						?>
 							</table>
 											
 					</div>

 					<div class="col-md-12">
                   			 <form method="post" action="../PHP/reporte_clientes.php">
                      		 <input type="submit" name="reporte_clientes" class="btn btn-danger pull-right" value="Reporte de Clientes"> <br /> <br /> <br />
                    		</form>
                  	   </div>
                  	   </div>
                  	   </div>
                  	   </div>
                  	</div>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap337/js/bootstrap.min.js"></script>
</body>
</html>