<!DOCTYPE html>
<?php 
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    include("conexion_final.php");
    include("auth_helper.php");
    include("switch.php"); 

    // Verificar autenticación
    if (!AuthHelper::isAuthenticated()) {
        header("Location: index.php?error=noauth");
        exit;
    }

    $id_sesion = AuthHelper::getCurrentInmuebleId();
    $usuario_actual = AuthHelper::getCurrentUser();

    $consulta = "SELECT * FROM inmueble WHERE id_inmueble=$id_sesion";
    $ejecutar_consulta = $conexion->query($consulta);
    
    if ($ejecutar_consulta === false) {
        die("Error en la consulta: " . $conexion->error);
    }
    
    $registro_inm = $ejecutar_consulta->fetch_assoc();
    
    if (!$registro_inm) {
        die("No se encontraron datos para el id_inmueble: $id_sesion");
    }

    $casa = $registro_inm["inmueble"];

    $nombre_completo = $usuario_actual;
    $name = explode(" ", $nombre_completo);

    $consulta = "SELECT * FROM renta ORDER BY id_renta DESC LIMIT 1";
    $ejecutar_consulta = $conexion->query($consulta);
    
    if ($ejecutar_consulta === false) {
        die("Error en la consulta de renta: " . $conexion->error);
    }
    
    $registro_inm = $ejecutar_consulta->fetch_assoc(); 
    
    if (!$registro_inm) {
        // Si no hay datos de renta, usar valores por defecto
        $monto_cond = "0,00";
        $mes_ac = date("n");
        $ano_ac = date("Y");
    } else { 

    $monto_cond = number_format(abs($registro_inm["monto"]), 2, ',', '.');

    $mes_ac = $registro_inm["mes"];

    $ano_ac = $registro_inm["ano"];
    }
    
    $mes_en = date("F", mktime(0,0,0,$mes_ac,1,$ano_ac));               

    /*if ($dia_en=="Monday") $dia_es="Lunes";
    if ($dia_en=="Tuesday") $dia_es="Martes";
    if ($dia_en=="Wednesday") $dia_es="Miércoles";
    if ($dia_en=="Thursday") $dia_es="Jueves";
    if ($dia_en=="Friday") $dia_es="Viernes";
    if ($dia_en=="Saturday") $dia_es="Sabado";
    if ($dia_en=="Sunday") $dia_es="Domingo";*/        

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
?>

<style type="text/css">

    body {
        font-family: 'Ubuntu', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }

    .cadacontact {
        border-bottom: 1px solid #CFCFCF;
        padding-bottom: 8px;
        margin-bottom: 10px;
    }

</style>


<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de condominio Mene Grande</title>

        <!-- Fuente Font Ubuntu -->
            <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" href="css/smoothness.css">
            <link rel="stylesheet" href="css/cargando.css">


        <!-- Styling -->
            <link href="css/overrides.css" rel="stylesheet">
            <link href="css/styles.css" rel="stylesheet">

        <!-- jQuery -->
            <script src="js/jquery.min.js"></script>

        <!-- Custom Styling -->
            <link rel="stylesheet" href="css/custom.css">

        <!-- Main Styling e Ícono-->
            <link href="css/main.css" rel="stylesheet">
            <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">

            <script>               

                function cerrar_modal(){
                    $("#modal_cargando").modal("hide");
                }

                function getWindowData(n,i){
                    
                    var ifr=document.getElementById(i).contentWindow.document || document.getElementById(i).contentDocument;
                    var widthViewport,heightViewport,xScroll,yScroll,widthTotal,heightTotal;
                    if (typeof window.frames[n].innerWidth != 'undefined'){
                        widthViewport= window.frames[n].innerWidth;
                        heightViewport= window.frames[n].innerHeight;
                    }else if(typeof ifr.documentElement != 'undefined' && typeof ifr.documentElement.clientWidth !='undefined' && ifr.documentElement.clientWidth != 0){
                        widthViewport=ifr.documentElement.clientWidth;
                        heightViewport=ifr.documentElement.clientHeight;
                    }else{
                        widthViewport= ifr.getElementsByTagName('body')[0].clientWidth;
                        heightViewport=ifr.getElementsByTagName('body')[0].clientHeight;
                    }
                    xScroll=window.frames[n].pageXOffset || (ifr.documentElement.scrollLeft+ifr.body.scrollLeft);
                    yScroll=window.frames[n].pageYOffset || (ifr.documentElement.scrollTop+ifr.body.scrollTop);
                    widthTotal=Math.max(ifr.documentElement.scrollWidth,ifr.body.scrollWidth,widthViewport);
                    heightTotal=Math.max(ifr.documentElement.scrollHeight,ifr.body.scrollHeight,heightViewport);
                    return [widthViewport,heightViewport,xScroll,yScroll,widthTotal,heightTotal];
                } 
                function resizeIframe(ID,NOMBRE){
                document.getElementById(ID).height=null;
                document.getElementById(ID).width=null;
                var m=getWindowData(NOMBRE,ID); 
                document.getElementById(ID).height=m[5];
                document.getElementById(ID).width=m[4]+22;
                }  
            </script>

            <script>
                $(function () {
                    $.datepicker.setDefaults($.datepicker.regional["es"]);
                    $(".datepicker").datepicker({
                        firstDay: 1
                    });
                });
            </script>

            <script type="text/javascript">
                function enviar_formulario(forma, direccion, ventana){                   

                form=eval("document."+forma);
                var action=form.action;
                form.target=ventana;
                form.action=direccion;
                form.submit();
                form.target="";
                form.action=action;

                $('#modal_cargando').modal({backdrop: 'static', keyboard: false});
            }
            </script>
            
    </head>   

    <body>  

        <section id="header">
            <div class="container">
                <!-- Top Bar -->
                <div id="top-nav">
                    <!-- Language -->
                    <div class="pull-right btn-group" role="group" style="margin: 0 0 15px 5px">
                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-credit-card"></span> Registrar Pago
                        </button>
                    </div>                     

                    <!-- Modal para depósitos-->
                    <div class="modal fade" id="myModal" tabindex="-1" show="true" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Registrar pago</h4>
                          </div>
                          <iframe name="pago_iframe" id="pago_iframe" src="generarpago.php" frameborder="0" scrolling="no" style="width: 100%; height: 40px;"></iframe>
                          <div class="modal-body">
                            <form name="registrar_pago" id="registrar_pago" action="" method="post" enctype="multipart/form-data">
                                <?php if ($_SESSION["autentificado1"]): ?>
                                    <input type="hidden" value="<?php echo $id_sesion ?>" name="name_id_txt">
                                <?php endif ?>
                                <?php if ($_SESSION["autentificado2"]): ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Inmueble depositante:</label>
                                        <select class="form-control" name="name_id_txt">
                                            <?php
                                                $consulta_l1 = "SELECT * FROM inmueble WHERE id_rol = 1 ORDER BY inmueble";
                                                $ejecutar_consulta_l1 = $conexion->query($consulta_l1);
                                                while ($registro_l1 = $ejecutar_consulta_l1->fetch_assoc()) {
                                                    $nombre_inmueble = $registro_l1["inmueble"];
                                                    $nombre_propietario = $registro_l1["propietario"];
                                                    $id_propietario = $registro_l1["id_inmueble"];

                                                    echo "<option value='$id_propietario'";                                            
                                                    echo ">$nombre_inmueble - $nombre_propietario</option>"; 
                                                }
                                            ?>                                   
                                        </select>
                                      </div>
                                <?php endif ?>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Desde que banco depositó</label>
                                <select class="form-control" name="banco_emision_sel">
                                    <?php
                                        $consulta_l1 = "SELECT * FROM banco ORDER BY conocido";
                                        $ejecutar_consulta_l1 = $conexion->query($consulta_l1);
                                        while ($registro_l1 = $ejecutar_consulta_l1->fetch_assoc()) {
                                            $nombre_banco = utf8_encode($registro_l1["nombre"]);
                                            $numero_banco = utf8_encode($registro_l1["numeros"]);
                                            $id_banco = $registro_l1["id_banco"];
                                            echo "<option value='$id_banco'";                                            
                                            echo ">$numero_banco - $nombre_banco</option>"; 
                                        }
                                    ?>                                   
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Monto depositado</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="monto_depositado_txt" placeholder="Ej.: 3000">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Banco al que transfirió</label>
                                <select class="form-control" name="banco_receptor_sel">
                                    <?php
                                        $consulta_l1 = "SELECT * FROM cuenta_propia";
                                        $ejecutar_consulta_l1 = $conexion->query($consulta_l1);
                                        while ($registro_l1 = $ejecutar_consulta_l1->fetch_assoc()) {
                                            $nombre_banco = utf8_encode($registro_l1["nombre"]);
                                            $numero_banco = utf8_encode($registro_l1["numeros"]);
                                            $id_banco = $registro_l1["id_cuenta"];
                                            echo "<option value='$id_banco'";
                                            echo ">$nombre_banco - $numero_banco</option>"; 
                                        }
                                    ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Fecha que hizo la operación</label>
                                <input type="text" class="form-control datepicker" autocomplete="off" id="datepicker" name="fecha_deposito_txt"  placeholder="Fecha">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Referencia</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="referencia_txt" placeholder="Referencia bancaria">
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                            <a onclick="enviar_formulario('registrar_pago','generarpago.php?attr=si','pago_iframe')"><button type="button" class="btn btn-primary">Enviar datos</button></a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal para restore-->
                    <div class="modal fade" id="modal_restore" tabindex="-1" show="true" role="dialog" aria-labelledby="modal_restore">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Restaurar base de datos</h4>
                          </div>
                          <iframe name="gabodb_iframe" id="gabodb_iframe" src="sistema/restaurar_gabodb.php?attr=no" frameborder="0" scrolling="no" style="width: 100%; height: 40px;"></iframe>
                          <div class="modal-body">
                            <form name="enviar_gabodb" id="enviar_gabodb" action="" method="post" enctype="multipart/form-data">
                                Seleccione (.gabodb) base de datos para resuarar:<br><br>
                                <input type="file" name="fileToUpload" id="fileToUpload"><br><br>                                
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                            <a onclick="enviar_formulario('enviar_gabodb','sistema/restaurar_gabodb.php?attr=si','gabodb_iframe')"><button type="button" class="btn btn-primary">Enviar archivo</button></a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal para email-->
                      <div class="modal fade" id="modal_cargando" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Enviando información</h4>
                            </div>
                            <div class="modal-body" style="min-height: 50px;">
                            <p>
                                <div class="loading">
                                <div class="loading-bar"></div>
                                <div class="loading-bar"></div>
                                <div class="loading-bar"></div>
                                <div class="loading-bar"></div>
                                </div>
                            </p>
                            </div>
                            <div class="modal-footer">
                              
                            </div>
                          </div>
                        </div>
                      </div>

                    <!-- Login/Account Notifications -->
                    <div class="pull-right btn-group" role="group">
                        <a href="#" class="btn btn-sm btn-default" data-toggle="popover" id="accountNotifications" data-placement="bottom" title="Notificaciones">
                            <i class="fa fa-info"></i> Notificaciones (0)
                        </a>
                        <div id="accountNotificationsContent" class="hidden">
                            <div class="clientalert text-success">
                                <i class="fa fa-check-square-o"></i> No tiene notificaciones en este momento.
                            </div>
                        </div>
                    </div> 

                </div>
                <a href="">
                    <img src="img/escudo-mene.png" height="52px" alt="Sistema de condominio Mene Grande" />
                </a>
            </div>
        </section>

            <?php include($_SESSION['menu_es']); ?> 

        <section id="main-body" class="container">
           
            <?php include($contenido); ?>           

            <div class="clearfix"></div>

        </section>

        <div class="row-fluid">
            

            <div class="footer container">
                <div class="row" align="center">
                    Conjunto Residencial Mene Grande | Todos los derechos reservados. Copyright © 2016                   
                    
                </div>
            </div>
        </div>

        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>

        <script type="text/javascript">
            var csrfToken = '5c335b70d8bcecd590d620fa3ce624b7fc503fa9';
        </script>

        <script src="js/whmcs.js"></script>
    </body>
</html>

