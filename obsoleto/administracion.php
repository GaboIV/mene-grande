<!DOCTYPE html>

<?php 

    session_start(); if(!$_SESSION["autentificado2"]){ header("Location: control2.php");  } 

    include("conexion.php");

?>


<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de condominio Mene Grande</title>

        <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/font-awesome.min.css" rel="stylesheet">

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
    </head>

    <?php 

        $id_sesion = $_SESSION['id_inmueble'];

        $consulta = "SELECT * FROM inmueble WHERE id_inmueble=$id_sesion";
        $ejecutar_consulta = $conexion->query($consulta);
        $registro_inm = $ejecutar_consulta->fetch_assoc();

        $casa = $registro_inm["inmueble"];

        $nombre_completo  = $_SESSION["usuario"];
        $name = explode(" ", $nombre_completo);

        $consulta = "SELECT * FROM renta ORDER BY id_renta DESC LIMIT 1";
        $ejecutar_consulta = $conexion->query($consulta);
        $registro_inm = $ejecutar_consulta->fetch_assoc(); 

        $monto_cond = number_format(abs($registro_inm["monto"]), 2, ',', '.');

        $mes_ac = $registro_inm["mes"];

        $ano_ac = $registro_inm["ano"];
        
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

    <body>
        <section id="header">
            <div class="container">
                <!-- Top Bar -->
                <div id="top-nav">
                    <!-- Language -->
                    <div class="pull-right btn-group" role="group" style="margin: 0 0 15px 5px">
                        <a href="" class="btn btn-sm btn-warning">
                            <span class="glyphicon glyphicon-credit-card"></span> Registrar Pago
                        </a>
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
                <a href=""><img src="img/escudo-mene.png" height="52px" alt="Sistema de condominio Mene Grande" /></a>
            </div>
        </section>

        <section id="main-menu">
            <div class="container">
                <nav id="nav" class="navbar navbar-default navbar-main" role="navigation">
                    <div class="container">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li menuItemName="Home" id="Primary_Navbar-Home">
                                    <a href="">
                                        Inicio
                                    </a>
                                </li>

                                <li menuItemName="Resúmen" id="Primary_Navbar-Resúmen">
                                    <a href="">
                                        Menú 1
                                    </a>
                                </li>

                                <li menuItemName="Services" class="dropdown" id="Primary_Navbar-Services">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Menú 2&nbsp;<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li menuItemName="" id="Primary_Navbar-Services-My_Services">
                                            <a href="">
                                                Submenú 1
                                            </a>
                                        </li>

                                        <li menuItemName="" class="nav-divider" id="Primary_Navbar-Services-Services_Divider">
                                            <a href="">
                                                Submenú 2
                                            </a>
                                        </li>

                                        <li menuItemName="" id="Primary_Navbar-Services-Order_New_Services">
                                            <a href="">
                                                Submenú 3
                                            </a>
                                        </li>

                                        <li menuItemName="" id="Primary_Navbar-Services-View_Available_Addons">
                                            <a href="">
                                                Submenú 4
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li menuItemName="Domains" class="dropdown" id="Primary_Navbar-Domains">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Menú 3&nbsp;<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li menuItemName="My Domains" id="Primary_Navbar-Domains-My_Domains">
                                            <a href="">
                                                Submenú 1
                                            </a>
                                        </li>

                                        <li menuItemName="Domains Divider" class="nav-divider" id="Primary_Navbar-Domains-Domains_Divider">
                                            <a href="">
                                                Submenú 2
                                            </a>
                                        </li>

                                        <li menuItemName="Renew Domains" id="Primary_Navbar-Domains-Renew_Domains">
                                            <a href="">
                                                Submenú 3
                                            </a>
                                        </li>

                                        <li menuItemName="Register a New Domain" id="Primary_Navbar-Domains-Register_a_New_Domain">
                                            <a href="">
                                                Submenú 4
                                            </a>
                                        </li>

                                        <li menuItemName="Domains Divider 2" class="nav-divider" id="Primary_Navbar-Domains-Domains_Divider_2">
                                            <a href="">
                                                Submenú 5
                                            </a>
                                        </li>

                                        <li menuItemName="Domain Search" id="Primary_Navbar-Domains-Domain_Search">
                                            <a href="">
                                                Submenú 6
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li menuItemName="Billing" class="dropdown" id="Primary_Navbar-Billing">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Menú 4&nbsp;<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li menuItemName="My Invoices" id="Primary_Navbar-Billing-My_Invoices">
                                            <a href="clientarea.php?action=invoices">
                                                Submenú 1
                                            </a>
                                        </li>

                                        <li menuItemName="My Quotes" id="Primary_Navbar-Billing-My_Quotes">
                                            <a href="clientarea.php?action=quotes">
                                                Submenú 2
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li menuItemName="Support" class="dropdown" id="Primary_Navbar-Support">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Soporte&nbsp;<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li menuItemName="Tickets" id="Primary_Navbar-Support-Tickets">
                                            <a href="">
                                                Pagos registrados
                                            </a>
                                        </li>

                                        <li menuItemName="Knowledgebase" id="Primary_Navbar-Support-Knowledgebase">
                                            <a href="">
                                                Preguntas Frecuentes - FAQ
                                            </a>
                                        </li>

                                        <li menuItemName="Downloads" id="Primary_Navbar-Support-Downloads">
                                            <a href="">
                                                Descargas
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li menuItemName="Open Ticket" id="Primary_Navbar-Open_Ticket">
                                    <a href="">
                                        Notificar pago
                                    </a>
                                </li>         
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li menuItemName="Account" class="dropdown" id="Secondary_Navbar-Account">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Hola, <?php echo $name[0] ?><b class="caret"></b>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li menuItemName="Edit Account Details" id="Secondary_Navbar-Account-Edit_Account_Details">
                                            <a href="">
                                                Editar Detalles de la Cuenta
                                            </a>
                                        </li>

                                        <li menuItemName="Contacts/Sub-Accounts" id="Secondary_Navbar-Account-Contacts_Sub-Accounts">
                                            <a href="">
                                                Contactos Autorizados
                                            </a>
                                        </li>

                                        <li menuItemName="Change Password" id="Secondary_Navbar-Account-Change_Password">
                                            <a href="">
                                                Cambiar Contraseña
                                            </a>
                                        </li>

                                        <li menuItemName="Security Settings" id="Secondary_Navbar-Account-Security_Settings">
                                            <a href="">
                                                Ajustes de Seguridad
                                            </a>
                                        </li>

                                        <li menuItemName="Email History" id="Secondary_Navbar-Account-Email_History">
                                            <a href="">
                                                Emails Enviados
                                            </a>
                                        </li>
                                        <li menuItemName="Divider" class="nav-divider" id="Secondary_Navbar-Account-Divider">
                                            <a href="">
                                                -----
                                            </a>
                                        </li>

                                        <li menuItemName="Logout" id="Secondary_Navbar-Account-Logout">
                                            <a href="control_salir.php">
                                                Salir
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </nav>
            </div>
        </section>


        <section id="main-body" class="container">
            <div class="row">
                <div class="col-md-9 pull-md-right">
                    <div class="header-lined">
                        <h1>Bienvenido, <?php echo "$nombre_completo" ?></h1>
                    </div>
                </div>

                <div class="col-md-3 pull-md-left sidebar">
                    <div menuItemName="Client Details" class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-user"></i>&nbsp;Sus Datos
                            </h3>
                        </div>

                        <div class="panel-body">
                            <p>
                                <strong><?php echo $nombre_completo ?></strong>
                                <br/>
                                <strong><?php echo "Módulo para $nombre_completo" ?></strong>
                            </p>
                            <p>Av. José Antonio Anzoátegui, Sector Guayabal, Urb. Mene Grande
                            <br/>Anaco
                            <br/>Anzoátegui
                            <br/>6003
                            <br/>Venezuela</p>
                        </div>

                        <div class="panel-footer clearfix">
                            <a href="" class="btn btn-success btn-sm btn-block">
                                <i class="fa fa-pencil"></i> Actualizar
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Container for main page display content -->
                <div class="col-md-9 pull-md-right main-content">
                    <div class="alert alert-warning clearfix">
                        <strong>Último monto de mensualidad es&nbsp;</strong> 
                        <b><?php echo $monto_cond ?> BsF&nbsp;</b>
                        <strong>correspondiente al mes de&nbsp;</strong>
                        <b><?php echo "$mes_es-$ano_ac" ?></b>
                    </div>

                    <div class="tiles clearfix">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6 tile" onclick="window.location='clientarea.php?action=services'">
                                <a href="">
                                    <div class="icon">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                    <div class="stat">0,00 BsF</div>
                                    <div class="title">Saldo</div>
                                    <div class="highlight bg-color-blue"></div>
                                </a>
                            </div>

                            <div class="col-sm-3 col-xs-6 tile" onclick="window.location='clientarea.php?action=domains'">
                                <a href="">
                                    <div class="icon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="stat">2.500,00 BsF</div>
                                    <div class="title">Deuda</div>
                                    <div class="highlight bg-color-green"></div>
                                </a>
                            </div>

                            <div class="col-sm-3 col-xs-6 tile" onclick="window.location='supporttickets.php'">
                                <a href="">
                                    <div class="icon">
                                        <i class="fa fa-hourglass-half"></i>
                                    </div>
                                    <div class="stat">0</div>
                                    <div class="title">Pago(s) por aprobar</div>
                                    <div class="highlight bg-color-red"></div>
                                </a>
                            </div>

                            <div class="col-sm-3 col-xs-6 tile" onclick="window.location='clientarea.php?action=invoices'">
                                <a href="">
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="stat">1</div>
                                    <div class="title">Mensaje(s) no leído(s)</div>
                                    <div class="highlight bg-color-gold"></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <form role="form" method="post" action="clientarea.php?action=kbsearch">
                        <input type="hidden" name="token" value="5c335b70d8bcecd590d620fa3ce624b7fc503fa9" />
                        <div class="row">
                            <div class="col-md-12 home-kb-search">
                                <input type="text" name="search" class="form-control input-lg" placeholder="Ingrese una pregunta aquí para obtener respuestas..." />
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </form>

                    <iframe name="menu" id="menu" src="miruta2.php" frameborder="0" scrolling="no" onload="resizeIframe('menu','menu');" style="width: 100%;"></iframe>

                    <div class="client-home-panels">
                        <div class="row">
                            <div class="col-sm-6">
                                <div menuItemName="Active Products/Services" class="panel panel-default panel-accent-gold">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <div class="pull-right">
                                                <a href="" class="btn btn-default bg-color-gold btn-xs">
                                                    <i class="fa fa-plus"></i>Ver Todo
                                                </a>
                                            </div>
                                            <i class="fa fa-cube"></i>&nbsp;Planes de mantenimiento
                                        </h3>
                                    </div>

                                    <div class="list-group">
                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Active_Products_Services-0">
                                            Plan para mejoramiento de sistema de aguas negras #1<br /><span class="text-domain">Ver plan</span>
                                        </a>
                                    </div>

                                    <div class="list-group">
                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Active_Products_Services-0">
                                            Plan para reacondicionamiento de áreas deportivas #1<br /><span class="text-domain">Ver plan</span>
                                        </a>
                                    </div>

                                    <div class="list-group">
                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Active_Products_Services-0">
                                            Plan para mejoramiento de sistema de aguas negras #2<br /><span class="text-domain">Ver plan</span>
                                        </a>
                                    </div>
                                    <div class="panel-footer">
                                    </div>
                                </div>

                                <div menuItemName="Active Products/Services" class="panel panel-default panel-accent-gold">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <div class="pull-right">
                                                <a href="" class="btn btn-default bg-color-gold btn-xs">
                                                    <i class="fa fa-plus"></i>Ver Todo
                                                </a>
                                            </div>
                                            <i class="fa fa-cube"></i>&nbsp;Desglose de gastos por mes
                                        </h3>
                                    </div>

                                    <div class="list-group">
                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Active_Products_Services-0">
                                            Mes: Febrero / Año: 2016<br /><span class="text-domain">Ver hoja de gastos</span>
                                        </a>
                                    </div>
                                    <div class="list-group">
                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Active_Products_Services-0">
                                            Mes: Marzo / Año: 2016<br /><span class="text-domain">Ver hoja de gastos</span>
                                        </a>
                                    </div>
                                    <div class="list-group">
                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Active_Products_Services-0">
                                            Mes: Abril / Año: 2016<br /><span class="text-domain">Ver hoja de gastos</span>
                                        </a>
                                    </div>

                                    <div class="panel-footer">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div menuItemName="Recent News" class="panel panel-default panel-accent-asbestos">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <div class="pull-right">
                                                <a href="" class="btn btn-default bg-color-asbestos btn-xs">
                                                    <i class="fa fa-arrow-right"></i>Ver Todo
                                                </a>
                                            </div>
                                            <i class="fa fa-newspaper-o"></i>&nbsp;Últimas facturas
                                        </h3>
                                    </div>

                                    <div class="list-group">
                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Recent_News-0">
                                            Factura Nro. 001-A<br />
                                            <span class="text-last-updated">14/02/2016</span>
                                        </a>

                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Recent_News-0">
                                            Factura Nro. 025-A<br />
                                            <span class="text-last-updated">14/02/2016</span>
                                        </a>

                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Recent_News-0">
                                            Factura Nro. 033-A<br />
                                            <span class="text-last-updated">14/02/2016</span>
                                        </a>
                                    </div>

                                    <div class="panel-footer">
                                    </div>
                                </div>
                                

                                <div menuItemName="Recent News" class="panel panel-default panel-accent-asbestos">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <div class="pull-right">
                                                <a href="" class="btn btn-default bg-color-asbestos btn-xs">
                                                    <i class="fa fa-arrow-right"></i>Ver Todo
                                                </a>
                                            </div>
                                            <i class="fa fa-newspaper-o"></i>&nbsp;Noticias Recientes
                                        </h3>
                                    </div>

                                    <div class="list-group">
                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Recent_News-0">
                                           Noticias 1<br />
                                            <span class="text-last-updated">14/02/2016</span>
                                        </a>
                                    </div>

                                    <div class="list-group">
                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Recent_News-0">
                                            Noticias 2<br />
                                            <span class="text-last-updated">14/02/2016</span>
                                        </a>
                                    </div>

                                    <div class="list-group">
                                        <a menuItemName="0" href="" class="list-group-item" id="ClientAreaHomePagePanels-Recent_News-0">
                                            Noticias 3<br />
                                            <span class="text-last-updated">14/02/2016</span>
                                        </a>
                                    </div>

                                    <div class="panel-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p style="text-align:center;">Powered by <a href="" target="_blank">WHMCompleteSolution</a></p>
                </div><!-- /.main-content -->

                <div class="col-md-3 pull-md-left sidebar">
                    <div menuItemName="Client Contacts" class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-folder-o"></i>&nbsp;Contactos Autorizados
                            </h3>
                        </div>

                        <div class="list-group">
                            <div menuItemName="No Contacts" class="list-group-item" id="Secondary_Sidebar-Client_Contacts-No_Contacts">
                                No hay contactos registrados
                            </div>
                        </div>

                        <div class="panel-footer clearfix">
                            <a href="" class="btn btn-default btn-sm btn-block">
                                <i class="fa fa-plus"></i> Nuevo Contacto...
                            </a>
                        </div>
                    </div>

                    <div menuItemName="Client Shortcuts" class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-bookmark"></i>&nbsp;Accesos Directos
                            </h3>
                        </div>

                        <div class="list-group">
                            <a menuItemName="Order New Services" href="" class="list-group-item" id="Secondary_Sidebar-Client_Shortcuts-Order_New_Services">
                                <i class="fa fa-shopping-cart fa-fw"></i>&nbsp;Registrar nuevo inmueble
                            </a>
                            <a menuItemName="Register New Domain" href="" class="list-group-item" id="Secondary_Sidebar-Client_Shortcuts-Register_New_Domain">
                                <i class="fa fa-globe fa-fw"></i>&nbsp;Registrar un Nuevo Dominio
                            </a>
                            <a menuItemName="Logout" href="control_salir.php" class="list-group-item" id="Secondary_Sidebar-Client_Shortcuts-Logout">
                                <i class="fa fa-arrow-left fa-fw"></i>&nbsp;Salir
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

        </section>

       <div class="row-fluid">
            <div class="telefonos" align="center">
                <span class="glyphicon glyphicon-phone-alt"></span>
                
            </div>

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

        <script>
            $( "p:contains('Powered by WHMCompleteSolution')" ).css( "display", "none" );
        </script>
    </body>
</html>
