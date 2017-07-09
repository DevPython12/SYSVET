<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="bootstrap337/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="estilos1.css">
	<script src="js/jquery-3.2.1.min"></script>
	<link rel="stylesheet" href="jAlert/dist/jAlert.css" />
	<!--<script type="text/javascript" src="js/code.js"></script>-->
	<title>SYSVET</title>

</head>
<body background="logosysvetpeque.jpg">
	<div class="container">
	<br><br>
		<div class="row">
		</div>
		<div class="col-sm-4 col-md-4 fondoblanco"></div>
		<div class="col-xs-12 col-sm-4 col-md-4 bordestodos fondoblanco">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 fondoblanco"></div>
			</div>
			<form id="formulario" name ="login" class="form-signin form-login" role="form" action="PHP/login.php" method="post">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 fondoblanco" ><br>
				
					<!--<label for="exampleInputEmail1"><br><br>Usuario:</label>-->
	    			<input type="user" class="form-control"  name ="username" id="username" placeholder="Usuario"></div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 fondoblanco"><br>
					<!--<label for="exampleInputEmail1"><br>Contraseña:</label>-->
	    			<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña"><br></div>
			</div>
			<div class="col-md-12">
				<div>
					<button  id="btn-enviar" type="submit"class="btn btn-lg btn-primary btn-block"><img src="huella.png" width="25" alt="Entrar">&nbsp;Ingresar</button></a>
					<br />
					<p><br></p>
				</div>
				
			</form>
			</div>
		</div>
	</div>

	<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
		<div class="container-fluid">
		<div class="col-xs-12 col-md-12 col-sm-12">
			<div class="navbar-header">
				<div class="col-xs-12 col-md-12 col-sm-12">
	              <button type="button" class="navbar-toggle" data-toggle="collapse"
	            data-target=".navbar-ex1-collapse">
	                <span class="sr-only">Desplegar navegación</span>
	                <span class="glyphicon glyphicon-th"></span>
	              </button>
	              	<img src="logosysvetmod.png" width="150PX" alt="">
	            </div>
	        </div>
	            <div class="collapse navbar-collapse navbar-ex1-collapse">
	            	
		            	<ul class="nav navbar-nav navbar-right">
			                <li><a data-toggle="tab" href="">Contacto</a></li>
			                <li><a data-toggle="tab" href="">Ayuda</a></li>
			        	</ul>
	            </div>
            </div>
        </div>
          </nav>



	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap337/js/bootstrap.min.js"></script>
    <!-- <script src="js/main.js"></script> -->
	<script src="jAlert/dist/jAlert.min.js"></script>
	<script src="jAlert/dist/jAlert-functions.min.js"> //optional!!</script>
    <script type="text/javascript" src="js/valida_login.js"></script>
</body>
</html>