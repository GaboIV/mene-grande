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

	include("../conexion.php");

	$valur = $_GET["valur"];
	$atributo = $_GET["attr"];
	$id = $_POST["id_inmueble_txt"];

	$codigo = substr(md5(rand()),0,3);


	if ($atributo == "propietario") {
		$consulta = "UPDATE proveedor SET nombre='$valur' WHERE id_proveedor=$id";
	
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='../img/yeah.png'>Se actualizó el nombre de proveedor (Código: N$codigo)</div>";
		}
	} elseif ($atributo == "cedula") {
		$consulta = "UPDATE proveedor SET rif='$valur' WHERE id_proveedor=$id";
	
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='../img/yeah.png'>Se actualizó RIF/CI de proveedor(Código: R$codigo)</div>";
		}
	} elseif ($atributo == "email") {
		$consulta = "UPDATE proveedor SET email='$valur' WHERE id_proveedor=$id";
	
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='../img/yeah.png'>Se actualizó correctamente el email (Código: E$codigo)</div>";
		}
	} elseif ($atributo == "telefono") {
		$consulta = "UPDATE proveedor SET telefono='$valur' WHERE id_proveedor=$id";
	
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='../img/yeah.png'>Se actualizó correctamente el teléfono (Código: T$codigo)</div>";
		}
	} elseif ($atributo == "saldo") {
		$consulta = "UPDATE proveedor SET direccion='$valur' WHERE id_proveedor=$id";
	
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='../img/yeah.png'>Se actualizó correctamente la dirección (Código: S$codigo)</div>";
		}
	} elseif (!$atributo) {
		echo "<div style='background: #D9EDF7; color: black;'><img src='img/yeah.png'>Para editar datos, haz dobleclic sobre alguno.</div>";
	}
	


 ?>