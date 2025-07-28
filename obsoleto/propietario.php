<!DOCTYPE html>

<?php 

    error_reporting(E_ALL ^ E_NOTICE);
    session_start();

    include("conexion.php");
    include("switch.php"); 
    include("control2.php"); 

?>

<style type="text/css">

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
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
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
                <?php include($contenido); ?>
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
