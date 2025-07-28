<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">

    .cadacontact {
        border-bottom: 1px solid #CFCFCF;
        padding-bottom: 8px;
        margin-bottom: 10px;
    }

</style>

<?php 

    include("conexion_local.php");    

    $id_sesion = $_GET["sesion"];

    

   $consulta_con = "SELECT * FROM contactos WHERE id_propietario=$id_sesion";
    $ejecutar_consulta_con = $conexion->query($consulta_con);                                    
    $num_regs_con = $ejecutar_consulta_con->num_rows;     

    while ($registro_con = $ejecutar_consulta_con->fetch_array()){
        $nombre_con = $registro_con["nombre"];
        $tele_con = $registro_con["telefono"];
        $correo_con = $registro_con["correo"];

        echo "<div class='cadacontact'><b>$nombre_con</b><br><span>$tele_con</span><br><span>$correo_con</span></div>";
    }


 ?>
