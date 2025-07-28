<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">

<style type="text/css">
	.form-horizontal {
		margin: 15px;
	}
</style>

<script type="text/javascript">
    function llamar(forma){
        form=eval("document."+forma);

	    var action=form.action;
	    
	    form.target='iframe_null';
	    form.action='procesar_inmueble.php';
	    form.submit();

	    form.target="";
	    form.action=action;
    }
</script>

<div class="col-md-3 pull-md-left sidebar" style="padding: 0;">
    <div menuItemName="Client Details" class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="fa fa-user"></i>&nbsp;Datos del nuevo inmueble
            </h3>
        </div>

        <form class="form-horizontal" name="registrar" id="registrar" action="" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="inmueble_txt" class="col-sm-2 control-label">Inmueble</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="inmueble_txt" placeholder="Letra y número de casa (Ej. A-01)">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="nombre_prop" class="col-sm-2 control-label">Propietario</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="nombre_prop" placeholder="Nombre de propietario">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="cedula_prop" class="col-sm-2 control-label">Cédula</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="cedula_prop" placeholder="Cédula de propietario">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="telefono_prop" class="col-sm-2 control-label">Teléfono</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="telefono_prop" placeholder="Teléfono de propietario">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="correo_prop" class="col-sm-2 control-label">E-mail</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="correo_prop" placeholder="Correo electrónico de propietario">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="contra_prop" class="col-sm-2 control-label">Contraseña</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="contra_prop" placeholder="Contraseña para que el propietario ingrese al sistema">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="saldo_prop" class="col-sm-2 control-label">Saldo</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="saldo_prop" placeholder="Saldo de propietario">
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

<iframe width="500" height="100" style="border:solid 2px; display:none;" id="iframe_null" name="iframe_null"> </iframe>
