<style type="text/css">

	body{
		margin: 0px;
		padding: 2px 15px;
		font-size: 1em;
	}
	img	{
		vertical-align: middle;
		height: 30px;
		margin-right: 10px;
	}
	div {
		background: #86CA5D;
		display: inline-block;
		color: #fff;
		vertical-align: middle;
		width: 100%;
		height: 34px; 
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
	
	$atributo = $_GET["attr"];
	$id_depositante = $_POST["name_id_txt"];
	$banco_emision = $_POST["banco_emision_sel"];
	$monto = $_POST["monto_depositado_txt"];
	$banco_receptor = $_POST["banco_receptor_sel"];
	$fecha = $_POST["fecha_deposito_txt"];
	$referencia = $_POST["referencia_txt"];
	$fecha_final_normal = date("d/m/o H:i:s");

	$codigo = substr(md5(rand()),0,3);

	

	if ($atributo) {
		
		$consulta = "INSERT INTO pago (id_banco_vi, id_banco_re, monto, fecha_dep, referencia, id_usuario, fecha_reg, cod_seg, id_estatus) VALUES ('$banco_emision','$banco_receptor','$monto','$fecha','$referencia','$id_depositante','$fecha_final_normal','$codigo','0')";
			
		if ($ejecutar_consulta = $conexion->query($consulta)) {
			echo "<div><img src='img/yeah.png'>La notificación de transferencia se realizó correctamente (Código: P$codigo)</div>";
			echo "<script languaje='javascript' type='text/javascript'>window.parent.cerrar_modal();</script>";

		}	
	
	} elseif (!$atributo) {
		echo "<div style='background: #D9EDF7; color: black;'><img src='img/yeah.png'>Para editar datos, haz dobleclic sobre alguno.</div>";
	}
	


 ?>
