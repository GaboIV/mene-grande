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

	$valur = $_GET["valur"];
	$atributo = $_GET["attr"];
	$id = $_POST["id_inmueble_txt"];

	$codigo = substr(md5(rand()),0,3);


	if ($atributo == "inmueble") {
		$consulta = "UPDATE inmueble SET inmueble='$valur' WHERE id_inmueble=$id";
	
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='img/yeah.png'>Se actualizó correctamente el inmueble (Código: I$codigo)</div>";
			echo "<script languaje='javascript' type='text/javascript'>window.parent.cerrar_modal();</script>";
		}
	} elseif ($atributo == "propietario") {
		$consulta = "UPDATE inmueble SET propietario='$valur' WHERE id_inmueble=$id";
	
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='img/yeah.png'>Se actualizó correctamente el propietario (Código: P$codigo)</div>";
			echo "<script languaje='javascript' type='text/javascript'>window.parent.cerrar_modal();</script>";
		}
	} elseif ($atributo == "cedula") {
		$consulta = "UPDATE inmueble SET cedula='$valur' WHERE id_inmueble=$id";
	
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='img/yeah.png'>Se actualizó correctamente la cédula (Código: C$codigo)</div>";
			echo "<script languaje='javascript' type='text/javascript'>window.parent.cerrar_modal();</script>";
		}
	} elseif ($atributo == "email") {
		$consulta = "UPDATE inmueble SET email='$valur' WHERE id_inmueble=$id";
	
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='img/yeah.png'>Se actualizó correctamente el email (Código: E$codigo)</div>";
			echo "<script languaje='javascript' type='text/javascript'>window.parent.cerrar_modal();</script>";
		}
	} elseif ($atributo == "telefono") {
		$consulta = "UPDATE inmueble SET telefono='$valur' WHERE id_inmueble=$id";
	
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='img/yeah.png'>Se actualizó correctamente el teléfono (Código: T$codigo)</div>";
			echo "<script languaje='javascript' type='text/javascript'>window.parent.cerrar_modal();</script>";
		}
	} elseif ($atributo == "saldo") {
		$consulta = "UPDATE inmueble SET saldo='$valur' WHERE id_inmueble=$id";
	
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='img/yeah.png'>Se actualizó correctamente el saldo (Código: S$codigo)</div>";
			echo "<script languaje='javascript' type='text/javascript'>window.parent.cerrar_modal();</script>";
		}
	} elseif (!$atributo) {
		echo "<div style='background: #D9EDF7; color: black;'><img src='img/yeah.png'>Para editar datos, haz dobleclic sobre alguno.</div>";
	}

 ?>
