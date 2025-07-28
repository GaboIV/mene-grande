<?php 
require_once("conexion.php");

	$inmueble = $_POST['inmueble_txt'];
	echo "$inmueble<br>";

	$propietario = $_POST['nombre_prop'];
	echo "$propietario<br>";

	$cedula = $_POST['cedula_prop'];
	echo "$cedula<br>";

	$telefono = $_POST['telefono_prop'];
	echo "$telefono<br>";

	$correo = $_POST['correo_prop'];
	echo "$correo<br>";

	$password = $_POST['contra_prop'];
	echo "$password<br>";

	$saldo = $_POST['saldo_prop'];
	echo "$saldo<br>";


		$consulta = "INSERT INTO inmueble (inmueble, propietario, cedula, email, telefono, clave, saldo, id_rol, id_estatus) VALUES ('$inmueble','$propietario','$cedula','$correo','$telefono','$password','$saldo','1','1')";
		
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			
			// Varios destinatarios
			$para .= $correo;

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
			$cabeceras .= 'From: Condominio de Mene Grande <servicios@gabrielcaraballo.com.ve>' . "\r\n";
			$cabeceras .= 'Cc: servicios@gabrielcaraballo.com.ve' . "\r\n";
			$cabeceras .= 'Bcc: servicios@gabrielcaraballo.com.ve' . "\r\n";

			// Enviarlo
			mail($para, $título, $mensaje, $cabeceras);
				
		};

		$id_prop = $conexion->insert_id;

		$consulta2 = "INSERT INTO contactos (id_propietario, nombre, correo, telefono) VALUES ('$id_prop','$propietario','$correo','$telefono')";
		
		$ejecutar_consulta2 = $conexion->query($consulta2);




?>

