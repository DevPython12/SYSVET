<?php 
	date_default_timezone_set ('America/Mexico_City');
	
	require_once('config.php');

	$sql = 'SELECT * FROM clientes';	
	$res=$con->query($sql);
 
	if(isset($_POST['reporte_clientes'])){
		require_once('../tcpdf/tcpdf.php');
 
		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
 
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Eclipsim');
		
 
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(10, 10, 10, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();
 
	$content = '<table border="0" cellpadding="1" text-align="center">
        		<thead>
          			<tr>
            			<th colspan="1" align="center"><img src="../huella.png" height="75" width="75"></th>
			            <th colspan="3">
			            	<h1 style="text-align:center;">SYSVET</h1>
			            	<p style="text-align:center;">HEADQUARTERS
			            		Las Rosas, 35123 Gómez Palacio, Dgo.
							</p>
							<p style="text-align:center;">
								Teléfono: 01 871 187 3211
							</p>
			            </th>
			            <th colspan="1" align="center"><img src="../logosysvet.png" height="75" width="75"></th>
          			</tr>
        		</thead>
        	</table>';
 
	$content .= '
		<div class="row">
        	<h1 style="text-align:center;">Lista de clientes</h1>
 			<table border="1" cellpadding="5">
        		<thead>
          			<tr>
            			<th>Id de Cliente</th>
 						<th>Nombre</th>
 						<th>Apellido Paterno</th>
 						<th>Apellido Materno</th>
 						<th>Fecha de nacimiento</th>
 						<th>Direccion</th>
 						<th>Telefono</th>
 						<th>Movil</th>
          			</tr>
        		</thead>
	';
 
	while ($row=$res->fetch_assoc()) { 
		
	$content .= '
		<tr>
           <td>'.$row['id_cliente'].    '</td>
 		   <td>'.$row['nombre']. 			'</td>
 		   <td>'.$row['apellido_paterno']. 	'</td>
 		   <td>'.$row['apellido_materno'].        	'</td>
           <td>'.$row['fecha_nacimiento'].  	'</td>
           <td>'.$row['direccion'].  	'</td>
           <td>'.$row['telefono'].  	'</td>
           <td>'.$row['movil'].  	'</td>           
        </tr>
	';
	}
 
	$content .= '</table>';
 
	$content .= '
		<div class="row padding">
        	<div class="col-md-12" style="text-align:center;">
            	<span>By: </span><a href="http://www.eclipsim.com">eclipsim.com</a>
            </div>
        </div>
 
	';
 
	$pdf->writeHTML($content, true, 0, true, 0);
 
	$pdf->lastPage();
	$fecha = date("Ymd");
	$hora = date("His"); 
	$nombrepdf = $fecha.'_'.$hora.'.pdf';
	ob_end_clean();
	$pdf->output($nombrepdf, 'I');
}
 
?>