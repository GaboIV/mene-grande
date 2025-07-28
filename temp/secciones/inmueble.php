<style type="text/css">
	@media all and (max-width: 720px){
		table #email {
			display: none;
		}
	}

	@media all and (max-width: 480px){
		table #telefono {
			display: none;
		}
	}
</style>

<div class="row">

<?php if ($_SESSION["autentificado2"]): ?>
<script type="text/javascript">


	function formular(valor, atributo, forma){		

		if(atributo.charAt(0) == "s") {
			var n1 = parseInt(document.getElementById(valor).innerHTML)
			m1 = n1 + 1;
			document.getElementById(valor).innerHTML = m1;
		}		
		
		form=eval("document."+forma);
		var action=form.action;
		form.target='iframe_null';
		form.action=atributo+"&valur="+valor;
		form.submit();
		form.target="";
		form.action=action;

		$('#modal_cargando').modal({backdrop: 'static', keyboard: false});
	}

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

		formular(valur,"ajusterapido.php?attr="+atributo,forma)

	}
</script>
<?php endif ?>

<style type="text/css">
	table div {
		min-height: 30px;
		
	}
</style>

<?php 

	$sql = "SELECT * FROM inmueble ORDER BY inmueble";
	$ejecutar_sql = $conexion->query($sql);
	$num_regs = $ejecutar_sql->num_rows;
	$arreglo_php = array();

	if($num_regs == 0) {
		array_push($arreglo_php, "No hay datos");
	} else {
		while($registro_sql = $ejecutar_sql->fetch_assoc()){
			array_push($arreglo_php, $registro_sql["propietario"]);
		}
	}

	/*$criterio = "";

	if ($_GET["criterio"]!="") {
		$txt_criterio = $_GET["criterio"];
		$criterio = " WHERE upper(li1.nombre_liga) LIKE upper('%" . $txt_criterio . "%') OR upper(li2.nombre_liga) LIKE upper('%" . $txt_criterio . "%') OR upper(li3.nombre_liga) LIKE upper('%" . $txt_criterio . "%') OR upper(li4.nombre_liga) LIKE upper('%" . $txt_criterio . "%') OR upper(inmueble.nombre) LIKE upper('%" . $txt_criterio . "%') OR upper(acro) LIKE upper('%" . $txt_criterio . "%') OR upper(id_inmueble) LIKE upper('%" . $txt_criterio . "%')";
	} elseif ($_POST["criterio"]!="") {
		$txt_criterio = $_POST["criterio"];
		$criterio = " WHERE upper(li1.nombre_liga) LIKE upper('%" . $txt_criterio . "%') OR upper(li2.nombre_liga) LIKE upper('%" . $txt_criterio . "%') OR upper(li3.nombre_liga) LIKE upper('%" . $txt_criterio . "%') OR upper(li4.nombre_liga) LIKE upper('%" . $txt_criterio . "%') OR upper(inmueble.nombre) LIKE upper('%" . $txt_criterio . "%') OR upper(acro) LIKE upper('%" . $txt_criterio . "%') OR upper(id_inmueble) LIKE upper('%" . $txt_criterio . "%')";
	}*/	

?>

<script>

	$(function(){
		var autocompletar = new Array();

		<?php
			for($p = 0; $p < count($arreglo_php); $p++){  
		?>

		autocompletar.push('<?php echo $arreglo_php[$p]; ?>');
		
		<?php } ?>

		$("#criterio").autocomplete({
			source: autocompletar
		});
	});

</script>

<!-- <div class="volver">
	<a href="agregar/agregar_inmueble.php" target="_blank" onClick="window.open(this.href, this.target, 'width=620,height=650'); return false;">
		<button class="agregar_boton">Agregar un inmueble</button>
	</a>

	<form id="menusuperior" name="menusuperior" action="masterIN.php?pagina=agregar_inmueble&indice=1" method="POST" style="float: right">
		<input  id="criterio" name="criterio" type="text" placeholder="Búsqueda" style="float:right; width:150px; height: 29px; padding: 0 0 0 10px;">
	</form>
</div> -->

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

	$consulta = "SELECT * FROM inmueble ORDER BY inmueble";

	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows;    
	$total_paginas = ceil($num_regs / $TAMANO_PAGINA);

	/*echo "Número de proyectos encontrados: " . $num_regs . "<br>";
	echo "Se muestran páginas de " . $TAMANO_PAGINA . " proyectos cada una<br>";
	echo "Mostrando la página " . $indice . " de " . $total_paginas . "<p>";*/



	$consulta = "SELECT * FROM inmueble ORDER BY inmueble ASC LIMIT " . $inicio . "," . $TAMANO_PAGINA;

	$ejecutar_paginacion = $conexion->query($consulta);

?>


<iframe style="width: 100%; height:40px; overflow: hidden;" frameborder="0" scrolling="no" id="iframe_null" name="iframe_null" src="ajusterapido.php"> </iframe>

<table id="acabando" class="table table-bordered" style="background: white;" cellpadding="0" cellspacing="0">

	
		<tr class="info">			
			<th>Nro.</th>
			<th>Propietario</th>
			<th>Cédula</th>
			<th id="email">E-mail</th>
			<th id="telefono">Teléfono</th>
			<?php if ($_SESSION["autentificado2"]): ?>
			<th>Saldo</th>
			<th>Más</th>
			<?php endif ?>
		</tr>
	

	<?php

		while ($registro = $ejecutar_paginacion->fetch_assoc()){

			$id_inmueble = $registro["id_inmueble"];

				$consulta_correo = "SELECT * FROM correos WHERE id_contacto = $id_inmueble";
				$ejecutar_consulta_correo = $conexion->query($consulta_correo);
				$num_regs_correo = $ejecutar_consulta_correo->num_rows;

			$inmueble = $registro["inmueble"];
			$propietario = $registro["propietario"];
			$cedula = $registro["cedula"];
			$email = $registro["email"];
			$telefono = $registro["telefono"];
			$saldo = $registro["saldo"];
			$contrasena = $registro["clave"];
			$caracteristica_ccs = " display:none;";

	?>

	<tr id="<?php echo "terre".$id_inmueble ?>">
		
		<form name="<?php echo "form_inmueble".$id_inmueble ?>" id="<?php echo "form_inmueble".$id_inmueble ?>" action="" method="post" enctype="multipart/form-data">
			<input name="criterio_txt" type="hidden" value="<?php echo "$txt_criterio" ?>">
			<input name="inmueble_txt" type="hidden" value="<?php echo "$inmueble" ?>">
			<input name="id_inmueble_txt" type="hidden" value="<?php echo "$id_inmueble" ?>">
			<input name="nombre_prop" type="hidden" value="<?php echo "$propietario" ?>">
			<input name="correo_prop" type="hidden" value="<?php echo "$email" ?>">
			<input name="cedula_prop" type="hidden" value="<?php echo "$cedula" ?>">
			<input name="telefono_prop" type="hidden" value="<?php echo "$telefono" ?>">
			<input name="contra_prop" type="hidden" value="<?php echo "$contrasena" ?>">
			


			<td>
				<div id="<?php echo "mod_inmueble".$id_inmueble ?>" onclick="cambio('<?php echo "mod_inmueble".$id_inmueble ?>')" onblur="salir('<?php echo "mod_inmueble".$id_inmueble ?>','inmueble','<?php echo "form_inmueble".$id_inmueble ?>')" style="padding: 5px;"><?php echo $inmueble ?></div>	
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

			<td id="telefono">
				<div id="<?php echo "mod_telefono".$id_inmueble ?>" onclick="cambio('<?php echo "mod_telefono".$id_inmueble ?>')" onblur="salir('<?php echo "mod_telefono".$id_inmueble ?>','telefono','<?php echo "form_inmueble".$id_inmueble ?>')" style="padding: 5px;"><?php echo $telefono ?></div>
			</td>
			<?php if ($_SESSION["autentificado2"]): ?>
			<td id="<?php echo "td_saldo".$id_inmueble ?>">
				<div id="<?php echo "mod_saldo".$id_inmueble ?>" onclick="cambio('<?php echo "mod_saldo".$id_inmueble ?>')" onblur="salir('<?php echo "mod_saldo".$id_inmueble ?>','saldo','<?php echo "form_inmueble".$id_inmueble ?>')" style="padding: 5px;"><?php echo $saldo ?></div>
			</td>
			<td id="<?php echo "td_mas".$id_inmueble ?>" style="max-width:20px;">
				<div id="<?php echo "mod_mas".$id_inmueble ?>" onclick="formular('<?php echo "span_correo".$id_inmueble ?>','secciones/envio_correo.php?attr=correo','<?php echo "form_inmueble".$id_inmueble ?>')" style="padding: 5px; background: #D9EDF7; border-radius: 5px;"><img src="img/envia_correo.png" alt="Enviar correo" height=20 width=20>&nbsp;<span id="<?php echo "span_correo".$id_inmueble ?>"><?php echo "$num_regs_correo"; ?> </span></div>
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

