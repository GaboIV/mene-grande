<style type="text/css">

* {
	font-size: 0.91em;
}

img {
	width: 15px;
}

</style>


<?php 
require_once("../conexion.php");

	$mes = $_POST['mes_slc'];
	$ano = $_POST['ano_slc'];
	$monto = $_POST['monto_txt'];
	$concepto = $_POST['concepto_txt'];
	$tipo = $_POST['tipo_renta_slc'];



	$consulta = "INSERT INTO renta (mes, ano, monto, concepto, id_tipo) VALUES ('$mes','$ano','$monto','$concepto','$tipo')";
		
	if ($ejecutar_consulta = $conexion->query($consulta)) {
		$consulta = "SELECT * FROM inmueble WHERE id_rol = 1";
		$ejecutar_consulta = $conexion->query($consulta);
		$num_regs = $ejecutar_consulta->num_rows;

		while ($registro = $ejecutar_consulta->fetch_assoc()){

			$id_inmueble = $registro["id_inmueble"];
			$inmueble = $registro["inmueble"];			
			$saldo = $registro["saldo"];

			$nuevo_saldo = $saldo - $monto;
			

			$modificar = "UPDATE inmueble SET saldo='$nuevo_saldo' WHERE id_inmueble=$id_inmueble";
			if ($ejecutar_modificar = $conexion->query($modificar)) {
			echo "<div><img src='../img/yeah.png'> Nuevo saldo $inmueble $nuevo_saldo Bs.F.<br></div>";
		}
		}
	}
	

?>

<script type="text/javascript">

	parent.document.getElementById('menu').src='renta.php';

</script>

