<html>
<head>
	<title></title>
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript">

	function formular(forma){
		form=eval("document."+forma);
		var action=form.action;
		form.target='iframe_null';
		form.action='procesa_banco.php';
		form.submit();
		form.target="";
		form.action=action;
	}

	</script>
</head>
<body>
	<iframe style="border: 1px solid black;" frameborder="0" scrolling="no" id="iframe_null" name="iframe_null" src=""> </iframe><br>

	<form name="banco" id="banco" action="" method="post" enctype="multipart/form-data">
		<input type="text" name="banco_txt" Placeholder="Banco"><br><br>
		<input type="text" name="numero_txt" Placeholder="Numero"><br><br>
		<span onclick="formular('banco')">Enviar</span>
	</form>
</body>
</html>