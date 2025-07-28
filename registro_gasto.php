<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/smoothness.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>

<style type="text/css">
	.form-horizontal {
		margin: 15px;
	}

	.panel-info>.panel-heading {
		background: #901C1D;
		color: #FBCC34;
		border-color: red;
	}

	.panel-info {
		border-color: #901C1D;
	}

	.btn-success {
		background: #0081BC;
		border-color: #074093;
	}

	.btn-success:hover {
		background: #0099DE;
		border-color: #264699;
	}

	iframe {
		border-radius: 5px;
		border: 2px blue solid;
		margin-bottom: 2px;
	}
</style>

<script type="text/javascript">
    function llamar(forma){
        form=eval("document."+forma);

	    var action=form.action;
	    
	    form.target='iframe_null_2';
	    form.action='procesar_gasto.php';
	    form.submit();

	    form.target="";
	    form.action=action;
    }

          
</script>

<?php 

	include("conexion_local.php");

    $sql = "SELECT * FROM proveedor ORDER BY nombre";
    $ejecutar_sql = $conexion->query($sql);
    $num_regs = $ejecutar_sql->num_rows;
    $arreglo_php = array();

    if($num_regs == 0) {
        array_push($arreglo_php, "No hay datos");
    } else {
        while($registro_sql = $ejecutar_sql->fetch_assoc()){
            array_push($arreglo_php, $registro_sql["nombre"]);
        }
    }

?>

<script>
  $(function(){
    var autocompletar = new Array();
    <?php 
     for($p = 0; $p < count($arreglo_php); $p++){  ?>
       autocompletar.push('<?php echo $arreglo_php[$p]; ?>');          
     <?php } ?>
     $("#proveedor_txt").autocomplete({ 
       source: autocompletar
     });
  });
</script>

<iframe width="100%" height="40px" style="border:solid 2px; display:;" id="iframe_null_2" name="iframe_null_2"> </iframe>

<div class="col-md-3 pull-md-left sidebar" style="padding: 0;">
    <div menuItemName="Client Details" class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="fa fa-user"></i>&nbsp;Datos del gasto a registrar
            </h3>
        </div>

        <form class="form-horizontal" name="registrar" id="registrar" action="" method="post" enctype="multipart/form-data">
        	<div class="form-group">
		    <label for="telefono_prop" class="col-sm-2 control-label">Factura</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="factura_txt" placeholder="Dejar en blanco para labores sin factura">
		    </div>
		  	</div>

		  <div class="form-group">
		    <label for="inmueble_txt" class="col-sm-2 control-label">Fecha</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control datepicker" autocomplete="off" id="datepicker" name="fecha_dtp" placeholder="Clic para seleccionar fecha">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="nombre_prop" class="col-sm-2 control-label">Proveedor</label>
		    <div class="col-sm-10">
		      <input id="proveedor_txt" type="text" class="form-control" name="proveedor_txt" placeholder="Proveedor">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="cedula_prop" class="col-sm-2 control-label">Descripción</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="descripcion_txt" placeholder="Descripción">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="telefono_prop" class="col-sm-2 control-label">Monto</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="monto_txt" placeholder="Monto en Bs.F">
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <a id="btnguardar" name="boton" onClick="llamar('registrar')";><button type="button" class="btn btn-success">Registrar</button></a>
		      <a href="registro_inmueble.php" target="menu"><button type="button" class="btn btn-success">Limpiar campos</button></a>
		    </div>
		  </div>
		</form>                       
    </div>
</div>

<script src="js/bootstrap.min.js"></script>

<script>
    $(function () {
        $.datepicker.setDefaults($.datepicker.regional["es"]);
        $(".datepicker").datepicker({
            firstDay: 1
        });
    });
</script>

