<link href="css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
	
	.form-group {
		margin-bottom: 4px;
	}

</style>

<?php 

	$id_sesion = $_GET["sesion"];

 ?>

<script type="text/javascript">
    function llamar(forma){
        form=eval("document."+forma);

	    var action=form.action;
	    
	    form.target='iframe_null';
	    form.action='miscript1.php';
	    form.submit();

	    form.target="";
	    form.action=action;

	    
	    parent.document.getElementById('otro').src='contactos.php?sesion=<?php echo $id_sesion ?>';

	    
    }
</script>




<form name="registrar" id="registrar" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="hidden" name="inmueble_txt" value="<?php echo $id_sesion ?>">
    <input type="text" class="form-control" name="nombre_txt" placeholder="Nombre">
  </div>
  <div class="form-group">
    
    <input type="text" class="form-control" name="telefono_txt" name="telefono_con" placeholder="Teléfono">
  </div>
  <div class="form-group">
    
    <input type="text" class="form-control" name="correo_txt" placeholder="correo">

   

  </div>


   <a id="btnguardar" name="boton" onClick="llamar('registrar')";><button type="button" class="btn btn-default">Agregar nuevo contacto</button></a>
</form>

<iframe width="500" height="100" style="border:solid 2px; display:none;" id="iframe_null" name="iframe_null"> </iframe>