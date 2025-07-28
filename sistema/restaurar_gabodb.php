<?php 
ob_start();

	if ($_GET['attr'] == "si") {		

		$target_dir = "restaurar/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Disculpa, el archivo ya está en nuestra base de datos.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Disculpe, el archivo es muy grande para almacenarlo.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "gabodb") {
		    echo "Archivo .gabodb no reconocido. ";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "No se cargó.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "restaurar/propio.php")) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

		        header('Location: restaurar/propio.php');
		    } else {
		        echo "Disculpe, ocurrió un error en la subida del archivo";
		    }
		}

	} elseif ($_GET['attr'] == 'no') {
		echo "<div style='background: #D9EDF7; color: black;'><img src='img/yeah.png'>Cargue el archivo .gabodb para restaurar la base de datos</div>";
	}

ob_end_flush();
?>