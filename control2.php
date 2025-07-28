<?php
	include("conexion_local.php");

	$us1992_xTT = $_POST["mom_la12"];   
	$pw_1889_fYr = $_POST["lel_la12"];

	if ($us1992_xTT != "") {
		include("control_salir.php");
	}

	$consulta="SELECT * FROM inmueble WHERE inmueble = '$us1992_xTT' AND id_estatus = 1";
	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows; 

	if ($num_regs == 0) {		
		/*header("Location: index.php?error=bloqueado");	*/
	} else {
		if($registro = $ejecutar_consulta->fetch_assoc()) {
			if($registro["clave"] == $pw_1889_fYr) {
	  			session_start();
	  			
	  			$_SESSION['usuario'] = $registro["propietario"];
	  			$_SESSION['id_inmueble'] = $registro["id_inmueble"];	

	  			if (!$_SESSION['dinamica']) {
	  				$_SESSION['dinamica'] = substr(md5(rand()),0,7);
	  			}
	  			
				if($registro["id_rol"] == "1") {
					$_SESSION['menu_es'] = "menu_propietario.php";
					header("Location: sistema_mn.php?mn=propietario");
					$_SESSION["autentificado1"]=true;
				} else if($registro["id_rol"] == "99") {
					$_SESSION['menu_es'] = "menu_administrador.php";
					header("Location: sistema_mn.php?mn=administracion");
					$_SESSION["autentificado2"]=true;
				}  	 	
	 	} else {
	 		header("Location: index.php?error=usuarioinvalido");				
			}
		}

	}
	
?>
