<style type="text/css">

	body{
		margin: 0px;
		padding: 0px 3px;
		font-size: 18px;
	}
	img	{
		vertical-align: middle;
		height: 34px;
		margin-right: 10px;
	}
	div {
		background: #86CA5D;
		display: inline-block;
		color: #fff;
		vertical-align: middle;
		width: 100%;
		height: 38px; 
		padding: 2px 0 2px 10px;
		border-radius: 2px;
		box-sizing: border-box;
	}

	@media all and (max-width: 480px){
		
		body {
			font-size: 10px;
		}
	}

</style>

<?php 
require_once("../conexion.php");

	$id_inmueble = $_POST['id_inmueble_txt'];

	$consulta = "SELECT * FROM inmueble WHERE id_inmueble = $id_inmueble";
	$ejecutar_paginacion = $conexion->query($consulta);
	$registro = $ejecutar_paginacion->fetch_assoc();

	$inmueble = $registro['inmueble'];
	$propietario = $registro['propietario'];
	$cedula = $registro['cedula'];
	$telefono = $registro['telefono'];
	$correo = $registro['email'];
	$password = $registro['clave'];

		$consulta = "INSERT INTO correos (id_contacto, id_tipo_correo, titulo, email) VALUES ('$id_inmueble','1','Datos enviados','$correo')";
		
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			
			// Varios destinatarios
			$para = $correo;

			// título
			$título = 'Registro en el Sistema de Condominio de Mene Grande';

			// mensaje
			$mensaje = '
			<div style="border: 1px #CCCCCC solid; width: 550px; border-radius: 10px; overflow: hidden; color:black;">
			<div style="background: url(http://i64.tinypic.com/2hov4sk.png); background-repeat: repeat;">
			<div style="width: 300px; display: inline-block; vertical-align: middle; text-align: center;"><img src="http://i68.tinypic.com/2gu09z5.png" height="70px"></div>
			<div style="display: inline-block; vertical-align: middle; text-align: center;"><a href="menegrande.com.ve"><button style="width: 200px; margin: 0 auto; height: 37px;">Ir a la página</button></a></div>
			</div>
			<div style="background: white; border-top: #CCCCCC 1px solid; border-bottom: #CCCCCC 1px solid; height: 25px; text-align: center; padding-top: 6px;">Registrado al sistema</div>
			<div style="padding: 10px;">
			<p>Dirigido a '.$propietario.'</p>
			<p>Se le notifica que se le ha registrado en el <b>Sistema de Condominio del Conjunto Residencial Mene Grande</b> como propietario de un inmueble, a continuación se muestran los datos de registro. Se le recuerda que para ingresar al sistema debe hacerlo con el nombre del inmueble ('.$inmueble.') y la contraseña suministrada ('.$password.').</p>
			<table style="background: white; font-weight: bold; font-size: 18px;">
			<tbody>
			<tr><td style="width: 125px;">Inmueble: </td><td>'.$inmueble.'</td></tr>
			<tr><td style="width: 125px;">Propietario</td><td>'.$propietario.'</td></tr>
			<tr><td style="width: 125px;">Cédula: </td><td>'.$cedula.'</td></tr>
			<tr><td style="width: 125px;">Teléfono:</td><td>'.$telefono.'</td></tr>
			<tr><td style="width: 125px;">Email: </td><td>'.$correo.'</td></tr>
			<tr><td style="width: 125px;">Contraseña:</td><td>'.$password.'</td></tr>
			</tbody>
			</table><br>
			<p>Cualquier consulta, puede dirigirse a los siguientes números: 0424-8536733 (Tesorera) y 0414-7959451 (Presidente de la junta de condominio)</p>
			</div>
			</div>
			';

			// Para enviar un correo HTML, debe establecerse la cabecera Content-type
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

			// Cabeceras adicionales
			$cabeceras .= 'To: '.$propietario.' <'.$correo.'>' . "\r\n";
			$cabeceras .= 'From: Condominio de Mene Grande <avisos@menegrande.com.ve>' . "\r\n";
			$cabeceras .= 'Cc: avisos@menegrande.com.ve' . "\r\n";
			$cabeceras .= 'Bcc: avisos@menegrande.com.ve' . "\r\n";

			// Enviarlo
			if (mail($para, $título, $mensaje, $cabeceras)) {
				echo "<div><img src='../img/yeah.png'>Se envió correctamente el correo al propietario (Código: I$codigo)</div>";
			}
				
		};

	echo "<script languaje='javascript' type='text/javascript'>window.parent.cerrar_modal();</script>";

?>




