<?php 
require_once("conexion_local.php");

	$id_inmueble = $_POST['inmueble_txt'];
	echo "$id_inmueble<br>";

	$nombre = $_POST['nombre_txt'];
	echo "$nombre<br>";

	$telefono = $_POST['telefono_txt'];
	echo "$telefono<br>";

	$correo = $_POST['correo_txt'];
	echo "$correo<br>";

	$consulta = "INSERT INTO contactos (id_propietario, nombre, correo, telefono) VALUES ('$id_inmueble','$nombre','$correo','$telefono')";
		
	$ejecutar_consulta = $conexion->query($consulta);

?>

<script type="text/javascript">

	parent.document.getElementById('menu').src='contactos.php?sesion=<?php echo $id_inmueble ?>';

</script>


