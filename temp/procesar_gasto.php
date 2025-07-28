<?php 
require_once("conexion.php");

	$factura = $_POST['factura_txt'];	
	$fecha = $_POST['fecha_dtp'];	
	$proveedor = $_POST['proveedor_txt'];
	$descripcion = $_POST['descripcion_txt'];	
	$monto = $_POST['monto_txt'];	

	$consulta_cp = "SELECT * FROM proveedor WHERE nombre='$proveedor'";
		$ejecutar_consulta_cp = $conexion->query($consulta_cp);		
		$coincidencias = $ejecutar_consulta_cp->num_rows;

		if ($coincidencias == 0) {
			$consulta = "INSERT INTO proveedor (nombre, repitencia) VALUES ('$proveedor','1')";		
			if ($ejecutar_consulta = $conexion->query($consulta)) {
				echo "Se agregó un proveedor<br>";
			};
		} else {
			$registro_cp = $ejecutar_consulta_cp->fetch_assoc();
			$id_proveedor = $registro_cp["id_proveedor"];
			$repitencia_v = $registro_cp["repitencia"];
			$repitencia_n = $repitencia_v + 1;

			$consulta_up = "UPDATE proveedor SET repitencia='$repitencia_n' WHERE id_proveedor=$id_proveedor";
			$ejecutar_consulta_up = $conexion->query($consulta_up);
		}


	$consulta = "INSERT INTO gastos (factura, fecha, proveedor, descripcion, monto) VALUES ('$factura','$fecha','$proveedor','$descripcion','$monto')";		
		if ($ejecutar_consulta = $conexion->query($consulta)) {	

			$consulta_sal = "SELECT * FROM cuenta_propia WHERE id_cuenta='1'";
			$ejecutar_consulta_sal = $conexion->query($consulta_sal);		
			$registro_sal = $ejecutar_consulta_sal->fetch_assoc();

			$saldo_ant = $registro_sal["saldo"];
			$n_saldo = $saldo_ant - $monto;

			$consulta_sal_2 = "UPDATE cuenta_propia SET saldo='$n_saldo' WHERE id_cuenta='1'";
			if ($ejecutar_consulta_sal_2 = $conexion->query($consulta_sal_2)){
				echo "Todo con orden";
			}
		}
?>

