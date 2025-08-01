

<html>
<head>
    <title></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

    .cadacontact {
        border-bottom: 1px solid #CFCFCF;
        padding-bottom: 8px;
        margin-bottom: 10px;
        font-size: 0.85em;
        font-family: "Ubuntu";
    }

    </style>
</head>
<body>
    <?php 

    include("../conexion_final.php");

    $consulta_con = "SELECT * FROM renta ORDER BY id_renta DESC LIMIT 0,4";
    $ejecutar_consulta_con = $conexion->query($consulta_con);

    if ($ejecutar_consulta_con === false) {
        echo "<div class='cadacontact'><span><b>Error de conexión a la base de datos</b></span></div>";
    } else {
        while ($registro_con = $ejecutar_consulta_con->fetch_array()){

    $concepto_cond = $registro_con["concepto"]; 
    $monto_cond = number_format(abs($registro_con["monto"]), 2, ',', '.');
    $mes_ac = $registro_con["mes"];
    $ano_ac = $registro_con["ano"];    
    $mes_en = date("F", mktime(0,0,0,$mes_ac,1,$ano_ac));               

    if ($mes_en=="January") $mes_es="Enero";
    if ($mes_en=="February") $mes_es="Febrero";
    if ($mes_en=="March") $mes_es="Marzo";
    if ($mes_en=="April") $mes_es="Abril";
    if ($mes_en=="May") $mes_es="Mayo";
    if ($mes_en=="June") $mes_es="Junio";
    if ($mes_en=="July") $mes_es="Julio";
    if ($mes_en=="August") $mes_es="Agosto";
    if ($mes_en=="September") $mes_es="Setiembre";
    if ($mes_en=="October") $mes_es="Octubre";
    if ($mes_en=="November") $mes_es="Noviembre";
    if ($mes_en=="December") $mes_es="Diciembre"; 

        echo "<div class='cadacontact'><span><b>$concepto_cond</b></span><br><span>$mes_es-$ano_ac</span><br><span>Bs.F.: <b>$monto_cond</b></span></div>";
        }
    }


 ?>
</body>
</html>