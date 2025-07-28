

<html>
<head>
    <title></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">


<style type="text/css">
    
    .form-group {
        margin-bottom: 4px;
    }

</style>

<?php 

    include("../conexion.php");

?>

<script type="text/javascript">
    function llamar(forma){
        form=eval("document."+forma);

        var action=form.action;
        
        form.target='iframe_null';
        form.action='procesar_renta.php';
        form.submit();

        form.target="";
        form.action=action;
        
        parent.document.getElementById('otro').src='secciones/rentas.php';      
    }
</script>
</head>
<body>
<form name="registrar" id="registrar" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    
    <select class="form-control input-sm" name="mes_slc" style="width: 50%; display:inline-block;">
        <?php
            $consulta_l1 = "SELECT * FROM meses ORDER BY id_mes";
            $ejecutar_consulta_l1 = $conexion->query($consulta_l1);
            while ($registro_l1 = $ejecutar_consulta_l1->fetch_assoc()) {
                $nombre_banco = utf8_encode($registro_l1["nombre"]);
                $numero_banco = utf8_encode($registro_l1["numero"]);                
                echo "<option value='$numero_banco'";                                            
                echo ">$nombre_banco</option>"; 
            }
        ?>
    </select><select class="form-control input-sm" name="ano_slc" style="width: 50%; display:inline-block;">

        <?php
            $consulta_l1 = "SELECT * FROM anos ORDER BY id_ano";
            $ejecutar_consulta_l1 = $conexion->query($consulta_l1);
            while ($registro_l1 = $ejecutar_consulta_l1->fetch_assoc()) {
                $nombre_banco = utf8_encode($registro_l1["nombre"]);
                $numero_banco = utf8_encode($registro_l1["numero"]);                
                echo "<option value='$nombre_banco'";                                            
                echo ">$nombre_banco</option>"; 
            }
        ?>

    </select>
  </div>
  <div class="form-group">
    <input class="form-control input-sm" type="text" name="concepto_txt" placeholder="Concepto">
  </div>
  <div class="form-group">
    <input class="form-control input-sm" type="number" name="monto_txt" placeholder="Monto">
  </div>
    <select class="form-control input-sm" name="tipo_renta_slc" style="width: 50%; display:inline-block;">

        <?php
            $consulta_l1 = "SELECT * FROM tipo_renta ORDER BY id_tipo_renta";
            $ejecutar_consulta_l1 = $conexion->query($consulta_l1);
            while ($registro_l1 = $ejecutar_consulta_l1->fetch_assoc()) {
                $nombre_banco = utf8_encode($registro_l1["id_tipo_renta"]);
                $numero_banco = utf8_encode($registro_l1["descripcion"]);                
                echo "<option value='$nombre_banco'";                                            
                echo ">$numero_banco</option>"; 
            }
        ?>

    </select><a id="btnguardar" name="boton" style="width: 50%; display:inline-block;" onClick="llamar('registrar')";><button type="button" style="width: 100%; display:inline-block;" class="btn btn-primary btn-sm">Registrar cobro</button></a>
</form>

<iframe width="100%" height="100" style="border:solid 2px #D9EDF7; border-radius: 3px;" id="iframe_null" name="iframe_null"> </iframe>
</body>
</html>

