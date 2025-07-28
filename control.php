<?php
include("conexion_final.php");
include("auth_helper.php");

$us1992_xTT = $_POST["mom_la12"];   
$pw_1889_fYr = $_POST["lel_la12"];

if ($us1992_xTT == "") {
    header('Location: control_salir.php');
} else {

    $consulta="SELECT * FROM inmueble WHERE inmueble = '$us1992_xTT' AND id_estatus = 1";
    $ejecutar_consulta = $conexion->query($consulta);
    
    if ($ejecutar_consulta === false) {
        die("Error en la consulta: " . $conexion->error);
    }
    
    $num_regs = $ejecutar_consulta->num_rows; 

    if ($num_regs == 0) {		
        header("Location: index.php?error=bloqueado");
    } else {
        if($registro = $ejecutar_consulta->fetch_assoc()) {
            if($registro["clave"] == $pw_1889_fYr) {
                
                // Establecer autenticación con cookies encriptadas
                AuthHelper::setAuth($registro);
                
                // Redirigir según el rol
                if($registro["id_rol"] == "1") {
                    header("Location: sistema_mn.php?mn=propietario");
                } else if($registro["id_rol"] == "99") {
                    header("Location: sistema_mn.php?mn=administracion");
                }  	 	
            } else {
                header("Location: index.php?error=usuarioinvalido");				
            }
        }
    }
}
?>
