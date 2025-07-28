<style type="text/css">
	@media all and (max-width: 720px){
		table #email {
			display: none;
		}

		table #banco {
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


<style type="text/css">
	table div {
		min-height: 30px;
		
	}
</style>

<?php 

	$sql = "SELECT * FROM pagos ORDER BY id_pago";
	$ejecutar_sql = $conexion->query($sql);
	$num_regs = $ejecutar_sql->num_rows;
	$arreglo_php = array();

	if($num_regs == 0) {
		array_push($arreglo_php, "No hay datos");
	} else {
		while($registro_sql = $ejecutar_sql->fetch_assoc()){
			array_push($arreglo_php, $registro_sql["monto"]);
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

	function cambioAprobado(botonPendiente, botonAprobar, botonRechazar, forma) {

		form=eval("document."+forma);
		var action=form.action;
		form.target='iframe_null';
		form.action='ajustepago.php?attr=1';
		form.submit();
		form.target="";
		form.action=action;

		aprobado = document.getElementById(botonAprobar);
		rechazado = document.getElementById(botonRechazar);
		pendiente = document.getElementById(botonPendiente);

		pendiente.style.display = "none";
		rechazado.style.display = "none";
		aprobado.style.display = "block";	

	}

	function cambioRechazado(botonPendiente, botonAprobar, botonRechazar, forma) {

		form=eval("document."+forma);
		var action=form.action;
		form.target='iframe_null';
		form.action='ajustepago.php?attr=1';
		form.submit();
		form.target="";
		form.action=action;

		aprobado = document.getElementById(botonAprobar);
		rechazado = document.getElementById(botonRechazar);
		pendiente = document.getElementById(botonPendiente);

		pendiente.style.display = "none";
		rechazado.style.display = "block";
		aprobado.style.display = "none";
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

	$consulta = "SELECT * FROM pago ORDER BY id_pago";

	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows;    
	$total_paginas = ceil($num_regs / $TAMANO_PAGINA);

	/*echo "Número de proyectos encontrados: " . $num_regs . "<br>";
	echo "Se muestran páginas de " . $TAMANO_PAGINA . " proyectos cada una<br>";
	echo "Mostrando la página " . $indice . " de " . $total_paginas . "<p>";*/

	if ($_SESSION["autentificado1"]){
		$consulta = "SELECT * FROM pago WHERE id_usuario = $id_sesion ORDER BY id_pago ASC LIMIT " . $inicio . "," . $TAMANO_PAGINA;		
	} elseif ($_SESSION["autentificado2"]){
		$consulta = "SELECT * FROM pago ORDER BY id_pago ASC LIMIT " . $inicio . "," . $TAMANO_PAGINA;		
	}
		$ejecutar_paginacion = $conexion->query($consulta);
?>




<iframe style="width: 100%; height:40px; overflow: hidden;" frameborder="0" scrolling="no" id="iframe_null" name="iframe_null" src="ajusterapido.php"> </iframe>

<table class="table table-bordered" style="background: white;" cellpadding="0" cellspacing="0">

	
		<tr class="info">
			<th>Nº</th>
			<th id="banco">Banco emisor</th>
			<th>Casa</th>
			<th>Fecha</th>
			<th id="email">Referencia</th>
			<th id="telefono">Monto</th>
			<th>Estatus</th>
		</tr>
	

	<?php

		while ($registro = $ejecutar_paginacion->fetch_assoc()){

			$id_inmueble = $registro["id_pago"];
			$id_banco = $registro["id_banco_vi"];

				$consulta_banco_vi = "SELECT * FROM banco WHERE id_banco='$id_banco'";
				$ejecutar_consulta_banco_vi = $conexion->query($consulta_banco_vi);
				$registro_banco_vi = $ejecutar_consulta_banco_vi->fetch_assoc();
				
				$inmueble = utf8_encode($registro_banco_vi["nombre"]);

			$id_propietario = $registro["id_usuario"];

				$consulta_banco_vi = "SELECT * FROM inmueble WHERE id_inmueble='$id_propietario'";
				$ejecutar_consulta_banco_vi = $conexion->query($consulta_banco_vi);
				$registro_banco_vi = $ejecutar_consulta_banco_vi->fetch_assoc();
				
				$propietario = $registro_banco_vi["inmueble"];

			$cedula = $registro["fecha_dep"];
			$email = $registro["referencia"];
			$telefono = $registro["monto"];
			$saldo = $registro["id_estatus"];
			$caracteristica_ccs = " display:none;";

			if ($saldo == '0') {
				$pendiente = "display: block";
				$aprobado = "display: none";
				$rechazado = "display: none";
			} elseif ($saldo == '1') {
				$pendiente = "display: none";
				$aprobado = "display: block";
				$rechazado = "display: none";
			} elseif ($saldo == '2') {
				$pendiente = "display: none";
				$aprobado = "display: none";
				$rechazado = "display: block";
			}

	?>

	<tr id="<?php echo "terre".$id_inmueble ?>">
		
		<form name="<?php echo "form_inmueble".$id_inmueble ?>" id="<?php echo "form_inmueble".$id_inmueble ?>" action="" method="post" enctype="multipart/form-data">
			<input name="criterio_txt" type="hidden" value="<?php echo "$txt_criterio" ?>">
			<input type="hidden" name="id_pago_txt" value="<?php echo $id_inmueble ?>" />
			<input type="hidden" name="id_prop_txt" value="<?php echo $id_propietario ?>" />
			<input type="hidden" name="monto_txt" value="<?php echo $telefono ?>" />			

			<td>
				<div id="<?php echo "mod_inmueble".$id_inmueble ?>" style="padding: 5px;"><?php echo $id_inmueble ?></div>	
			</td>

			<td id="banco">
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
			
			<td id="<?php echo "td_saldo".$id_inmueble ?>">
			<?php if ($_SESSION["autentificado2"]): ?>
					<div class="modal fade" id="<?php echo "modal".$id_inmueble ?>" tabindex="-1" show="true" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document" style="max-width: 350px;">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Cambio de estátus (Nro. <?php echo $id_inmueble ?>)</h4>
                          </div>
                          
                          <div class="modal-body">
                            <br><button type="button" class="btn btn-primary btn-lg" onclick="cambioAprobado('<?php echo "pend$id_inmueble" ?>', '<?php echo "apro$id_inmueble" ?>', '<?php echo "rech$id_inmueble" ?>','<?php echo "form_inmueble".$id_inmueble ?>')" data-dismiss="modal" style="display: inline-block; width:100%;">Aprobar pago</button><br><br>
                            <button type="button" class="btn btn-warning btn-lg" onclick="cambioRechazado('<?php echo "pend$id_inmueble" ?>', '<?php echo "apro$id_inmueble" ?>', '<?php echo "rech$id_inmueble" ?>')" data-dismiss="modal" style="display: inline-block; width:100%;">Rechazar pago</button><br><br>
                          </div>                          
                        </div>
                      </div>
                    </div>
            <?php endif ?>
				<button type="button" class="btn btn-info btn-sm" id="<?php echo "pend$id_inmueble" ?>" style="<?php echo $pendiente ?>" data-toggle="modal" data-target="<?php echo "#modal$id_inmueble" ?>">Pendiente</button>
				<button type="button" class="btn btn-success btn-sm" id="<?php echo "apro$id_inmueble" ?>" style="<?php echo $aprobado ?>">Aprobado</button>
				<button type="button" class="btn btn-danger btn-sm" id="<?php echo "rech$id_inmueble" ?>" style="<?php echo $rechazado ?>">Rechazado</button>
			</td>

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

