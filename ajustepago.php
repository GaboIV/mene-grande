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

	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    session_start();

	include("conexion_local.php");
	
	$id = $_POST["id_pago_txt"];
	$propietario = $_POST["id_prop_txt"];
	$monto = $_POST["monto_txt"];

		$consulta = "SELECT * FROM inmueble WHERE id_inmueble='$propietario'";
		$ejecutar_consulta = $conexion->query($consulta);
		$registro = $ejecutar_consulta->fetch_assoc();
		
		$saldo_antiguo = $registro["saldo"];
		$nuevosaldo = $saldo_antiguo + $monto;	

		$consulta_cp = "SELECT * FROM cuenta_propia WHERE id_cuenta='1'";
		$ejecutar_consulta_cp = $conexion->query($consulta_cp);
		$registro_cp = $ejecutar_consulta_cp->fetch_assoc();
		
		$saldo_cuenta = $registro_cp["saldo"];
		$nuevo_saldo_cuenta = $saldo_cuenta + $monto;		
		
		$new_estatus = $_GET["attr"];

		$codigo = substr(md5(rand()),0,5);

	$consulta = "UPDATE pago SET id_estatus=$new_estatus WHERE id_pago=$id";
	if ($ejecutar_consulta = $conexion->query($consulta)) {
			$consulta2 = "UPDATE inmueble SET saldo=$nuevosaldo WHERE id_inmueble=$propietario";
			if ($ejecutar_consulta2 = $conexion->query($consulta2)) {
				$consulta3 = "UPDATE cuenta_propia SET saldo=$nuevo_saldo_cuenta WHERE id_cuenta='1'";
				if ($ejecutar_consulta3 = $conexion->query($consulta3)) {
					echo "<div><img src='img/yeah.png'>Se aprobó el pago correctamente (Código: I$codigo)</div>";
					echo "<script languaje='javascript' type='text/javascript'>window.parent.cerrar_modal();</script>";
				}
			}
			
		}
	
	


 ?>
