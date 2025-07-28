<link rel="stylesheet" href="css/avisos.css" />

<script type="text/javascript">

	function formular(forma){
		form=eval("document."+forma);
		var action=form.action;
		form.target='iframe_null';
		form.action='miscript.php';
		form.submit();
		form.target="";
		form.action=action;
	}

</script>

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

	$TAMANO_PAGINA = 30;
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

<br>

<iframe style="border:solid 2px; display: none;" id="iframe_null" name="iframe_null"> </iframe>

<table class="table table-bordered">

	<thead>
		<tr class="info">
			
			<th>Inmueble</th>
			<th>Propietario</th>
			<th>Cédula</th>
			<th>E-mail</th>
			<th>Teléfono</th>
			<th>Saldo</th>
			<th></th>
		</tr>
	</thead>

	<?php

		while ($registro = $ejecutar_paginacion->fetch_assoc()){

			$id_inmueble = $registro["id_inmueble"];
			$inmueble = $registro["inmueble"];
			$propietario = $registro["propietario"];
			$cedula = $registro["cedula"];
			$email = $registro["email"];
			$telefono = $registro["telefono"];
			$saldo = $registro["saldo"];
			$caracteristica_ccs = "font-size:14px; display:none;";

	?>

	<tr id="<?php echo "terre".$id_inmueble ?>">
		<form name="<?php echo "inmueble".$id_inmueble ?>" id="<?php echo "inmueble".$id_inmueble ?>" action="" method="post" enctype="multipart/form-data" "background:red">

			<input name="criterio_txt" type="hidden" value="<?php echo "$txt_criterio" ?>">
			<input name="id_inmueble_txt" type="hidden" value="<?php echo "$id_inmueble" ?>">
			<input name="name_inmueble_txt" type="hidden" value="<?php echo "$descripcion" ?>">
			<input name="dir_deporte_txt" type="hidden" value="<?php echo "$desc_deporte" ?>">

			<td>
				<span id="<?php echo "inmueble".$id_inmueble ?>"><?php echo "$inmueble" ?></span>
				<span>
					<input id="<?php echo "mod_inmueble".$id_inmueble ?>" type="text" name="propietario_txt" value="<?php echo $inmueble ?>" style="<?php echo $caracteristica_ccs ?>" onkeyup="<?php echo $caracteristica_js ?>"/>
				</span>
			</td>

			<td>
				<span id="<?php echo "propietario".$id_inmueble ?>"><?php echo "$propietario" ?></span>
				<span>
					<input id="<?php echo "mod_propietario".$id_inmueble ?>" type="text" name="propietario_txt" value="<?php echo $propietario ?>" style="<?php echo $caracteristica_ccs ?>" onkeyup="<?php echo $caracteristica_js ?>"/>
				</span>
			</td>

			<td>
				<span id="<?php echo "cedula".$id_inmueble ?>"><?php echo "$cedula" ?></span>
				<span>
					<input id="<?php echo "mod_cedula".$id_inmueble ?>" type="text" name="cedula_txt" value="<?php echo $cedula ?>" style="<?php echo $caracteristica_ccs ?>" onkeyup="<?php echo $caracteristica_js ?>"/>
				</span>
			</td>

			<td>
				<span id="<?php echo "email".$id_inmueble ?>"><?php echo "$email" ?></span>
				<span>
					<input id="<?php echo "mod_email".$id_inmueble ?>" type="text" name="email_txt" value="<?php echo $email ?>" style="<?php echo $caracteristica_ccs ?>" onkeyup="<?php echo $caracteristica_js ?>"/>
				</span>
			</td>

			<td>
				<span id="<?php echo "telefono".$id_inmueble ?>"><?php echo "$telefono" ?></span>
				<span>
					<input id="<?php echo "mod_telefono".$id_inmueble ?>" type="text" name="telefono_txt" value="<?php echo $telefono ?>" style="<?php echo $caracteristica_ccs ?>" onkeyup="<?php echo $caracteristica_js ?>"/>
				</span>
			</td>

			<td>
				<span id="<?php echo "saldo".$id_inmueble ?>"><?php echo "$saldo" ?></span>
				<span>
					<input id="<?php echo "mod_saldo".$id_inmueble ?>" type="text" name="saldo_txt" value="<?php echo $saldo ?>" style="<?php echo $caracteristica_ccs ?>" onkeyup="<?php echo $caracteristica_js ?>"/>
				</span>
			</td>

			<td>
				<a id='<?php echo "boton-mod".$id_inmueble ?>' onclick="

					document.getElementById('<?php echo "propietario".$id_inmueble ?>').style.display='none';
					document.getElementById('<?php echo "mod_propietario".$id_inmueble ?>').style.display='inline-block';

					document.getElementById('<?php echo "cedula".$id_inmueble ?>').style.display='none';
					document.getElementById('<?php echo "mod_cedula".$id_inmueble ?>').style.display='inline-block';

					document.getElementById('<?php echo "email".$id_inmueble ?>').style.display='none';
					document.getElementById('<?php echo "mod_email".$id_inmueble ?>').style.display='inline-block';

					document.getElementById('<?php echo "telefono".$id_inmueble ?>').style.display='none';
					document.getElementById('<?php echo "mod_telefono".$id_inmueble ?>').style.display='inline-block';

					document.getElementById('<?php echo "saldo".$id_inmueble ?>').style.display='none';
					document.getElementById('<?php echo "mod_saldo".$id_inmueble ?>').style.display='inline-block';

					document.getElementById('<?php echo "boton-mod".$id_inmueble ?>').style.display='none';
					document.getElementById('<?php echo "boton-guar".$id_inmueble ?>').style.display='inline-block';

					document.getElementById('<?php echo "boton-elim".$id_inmueble ?>').style.display='inline-block';

					">
					<button type="button" class="btn btn-primary btn-xs btn-success">Editar</button>  					
				</a>

				<a id="<?php echo "boton-guar".$id_inmueble ?>" name="boton" onClick="llamar('<?php echo "inmueble".$id_inmueble ?>')"; value="Guardar" style="display:none">
					<button type="button" class="btn btn-primary btn-xs btn-success">Guardar</button>
				</a>

				<a id="<?php echo "boton-elim".$id_inmueble ?>" name="boton" href="<?php echo "#modal".$id_inmueble ?>" class="btn-elim" value="X" style="display:none">
					<button type="button" class="btn btn-primary btn-xs btn-danger">Borrar</button>
				</a>
			</td>

			<input type="hidden" value="<?php echo $indice ?>" name="indice">

			<div id="<?php echo "modal".$id_inmueble ?>" class="modalmask">
				<div class="modalbox movedown">
					<div class="cerrar">
						<a href="#close" title="Cerrar" class="close">X</a>
						CONFIRMACIÓN DE ELIMINACIÓN DE inmueble
					</div>

					<div class="cuerpo_aviso">
						<img id='logo' style='float:left; margin:5px 0 0 13px;' src='../imagenes/aviso.png' height='86' width='86'>
						<p>¿Está seguro de eliminar el inmueble <b><?php echo "$descripcion" ?></b>?</p>
					</div>

					<a id='<?php echo "boton_si".$id_partido ?>' class='boton-gestion si' onClick="document.<?php echo "inmueble".$id_inmueble ?>.action='agregar/eliminar_inmueble.php'; document.<?php echo "inmueble".$id_inmueble ?>.submit()"; href="#close">
						<span>Sí</span>
					</a>

					<a id="<?php echo "boton_no".$id_partido ?>" class="boton-gestion no" href="#close">
						<span>No</span>
					</a>
				</div>
			</div>
		</form>
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

