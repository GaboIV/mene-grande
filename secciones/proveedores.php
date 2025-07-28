<style type="text/css">


	@media all and (max-width: 720px){
		table #telefono {
			display: none;

		}
	}

	@media all and (max-width: 480px){
		table #email {
			display: none;
		}
	}
</style>

<div class="row">

<?php if ($_SESSION["autentificado2"]): ?>
<script type="text/javascript">

	function cambio(valor){		
		var spanact = document.getElementById(valor);		
		spanact.contentEditable = "true"
		spanact.style.background="#ADE2FF";
	}

	function salir(valor, atributo, forma){		
		var spanact = document.getElementById(valor);
		spanact.contentEditable = "false";
		spanact.style.background="transparent";
		var valur = spanact.textContent;

		form=eval("document."+forma);
		var action=form.action;
		form.target='iframe_null';
		form.action="secciones/ajusteprovee.php?attr="+atributo+"&valur="+valur;
		form.submit();
		form.target="";
		form.action=action;

	}
</script>
<?php endif ?>

<style type="text/css">	table div { min-height: 30px; } </style>

<script type="text/javascript">

	function justNumbers(e) {
		var keynum = window.event ? window.event.keyCode : e.which;
		if ((keynum == 8) || (keynum == 46))
			return true;
			return /\d/.test(String.fromCharCode(keynum));
	}

</script>

<?php

	$TAMANO_PAGINA = 60;
	$indice = $_GET["indice"];
	if (!$indice) {
		$inicio = 0;
		$indice = 1;
	} else {
		$inicio = ($indice - 1) * $TAMANO_PAGINA;
	}

	$consulta = "SELECT * FROM proveedor ORDER BY nombre";

	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows;    
	$total_paginas = ceil($num_regs / $TAMANO_PAGINA);

	/*echo "Número de proyectos encontrados: " . $num_regs . "<br>";
	echo "Se muestran páginas de " . $TAMANO_PAGINA . " proyectos cada una<br>";
	echo "Mostrando la página " . $indice . " de " . $total_paginas . "<p>";*/

	$consulta = "SELECT * FROM proveedor ORDER BY nombre ASC LIMIT " . $inicio . "," . $TAMANO_PAGINA;

	$ejecutar_paginacion = $conexion->query($consulta);

?>


<iframe style="width: 100%; height:40px; overflow: hidden;" frameborder="0" scrolling="no" id="iframe_null" name="iframe_null" src="ajusterapido.php"> </iframe>

<table class="table table-bordered" style="background: white;" cellpadding="0" cellspacing="0">
	
	<tr class="info">			
		<th>Nro.</th>
		<th>Nombre</th>
		<th>RIF / CI</th>
		<th id="email">E-mail</th>
		<th>Teléfono</th>		
		<th id="telefono">Direccion</th>
		
	</tr>
	

	<?php

		while ($registro = $ejecutar_paginacion->fetch_assoc()){

			$id_inmueble = $registro["id_proveedor"];			
			$propietario = $registro["nombre"];
			$cedula = $registro["rif"];
			$email = $registro["email"];
			$telefono = $registro["telefono"];
			$saldo = $registro["direccion"];
			$caracteristica_ccs = " display:none;";

	?>

	<tr id="<?php echo "terre".$id_inmueble ?>">
		
		<form name="<?php echo "form_inmueble".$id_inmueble ?>" id="<?php echo "form_inmueble".$id_inmueble ?>" action="" method="post" enctype="multipart/form-data">
			<input name="criterio_txt" type="hidden" value="<?php echo "$txt_criterio" ?>">
			<input name="id_inmueble_txt" type="hidden" value="<?php echo "$id_inmueble" ?>">
			<input name="name_inmueble_txt" type="hidden" value="<?php echo "$descripcion" ?>">
			<input name="dir_deporte_txt" type="hidden" value="<?php echo "$desc_deporte" ?>">

			<td>
				<div id="<?php echo "mod_inmueble".$id_inmueble ?>" style="padding: 5px;"><?php echo $id_inmueble ?></div>
			</td>

			<td>
				<div id="<?php echo "mod_propietario".$id_inmueble ?>" onclick="cambio('<?php echo "mod_propietario".$id_inmueble ?>')" onblur="salir('<?php echo "mod_propietario".$id_inmueble ?>','propietario','<?php echo "form_inmueble".$id_inmueble ?>')" style="padding: 5px;"><?php echo $propietario ?></div>	
			</td>

			<td>
				<div id="<?php echo "mod_cedula".$id_inmueble ?>" onclick="cambio('<?php echo "mod_cedula".$id_inmueble ?>')" onblur="salir('<?php echo "mod_cedula".$id_inmueble ?>','cedula','<?php echo "form_inmueble".$id_inmueble ?>')" style="padding: 5px;"><?php echo $cedula ?></div>
			</td>

			<td id="email">
				<div id="<?php echo "mod_email".$id_inmueble ?>" onclick="cambio('<?php echo "mod_email".$id_inmueble ?>')" onblur="salir('<?php echo "mod_email".$id_inmueble ?>','email','<?php echo "form_inmueble".$id_inmueble ?>')" style="padding: 5px;"><?php echo $email ?></div>
			</td>

			<td >
				<div id="<?php echo "mod_telefono".$id_inmueble ?>" onclick="cambio('<?php echo "mod_telefono".$id_inmueble ?>')" onblur="salir('<?php echo "mod_telefono".$id_inmueble ?>','telefono','<?php echo "form_inmueble".$id_inmueble ?>')" style="padding: 5px;"><?php echo $telefono ?></div>
			</td>
			<?php if ($_SESSION["autentificado2"]): ?>
			<td id="telefono">
				<div id="<?php echo "mod_saldo".$id_inmueble ?>" onclick="cambio('<?php echo "mod_saldo".$id_inmueble ?>')" onblur="salir('<?php echo "mod_saldo".$id_inmueble ?>','saldo','<?php echo "form_inmueble".$id_inmueble ?>')" style="padding: 5px;"><?php echo $saldo ?></div>
			</td>
			<?php endif ?>
		</form>

			<input type="hidden" value="<?php echo $indice ?>" name="indice">

			
		
	</tr>

	<?php } ?>
</table>

<?php
	$ejecutar_paginacion->free();

	if ($total_paginas > 1){
		for ($i=1;$i<=$total_paginas;$i++){
			if ($indice == $i)
				echo "<a href='#' style='background:#FF614C; padding:5px; margin:5px; border-radius: 5px; text-decoration: none; color:black; font-size: 22px;'>$indice</a>";
			else
				echo "<a href='masterIN.php?pagina=agregar_inmueble&indice=" . $i . "&criterio=" . $txt_criterio . "' style='background:#63B3FF; padding:5px; margin:5px; border-radius: 5px; text-decoration: none; color:black; font-size: 22px;'>" . $i . "</a>";
		}
	}

	echo "<br/>...";

?>

<script type="text/javascript">

	function borrar_inmueble(div_file, input_file, div_img, img, forma) {
		var input = document.getElementById(input_file);

		$("#" + div_file).slideToggle(500);

		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#' + img).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}

		$("#" + div_img).slideToggle(1000);
		form_form = document.getElementById(forma);
		form_form.style.background = "#B2FF70";
	}

</script>

</div>

