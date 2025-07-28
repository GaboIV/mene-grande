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
                                        <a href="sistema_mn.php?mn=administracion">
                                            Inicio
                                        </a>                                   
                                </li>

                                <li menuItemName="Resúmen" id="Primary_Navbar-Resúmen">
                                    <a href="sistema_mn.php?mn=inmueble">
                                        Inmuebles
                                    </a>
                                </li>

                                <li menuItemName="Services" class="dropdown" id="Primary_Navbar-Services">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="sistema_mn.php?mn=pagos&renglon=todos">
                                        Pagos registrados<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li menuItemName="" id="Primary_Navbar-Services-My_Services">
                                            <a href="sistema_mn.php?mn=pagos&renglon=pendientes">
                                                Pendientes
                                            </a>
                                        </li>

                                        <li menuItemName="" class="nav-divider" id="Primary_Navbar-Services-Services_Divider">
                                            <a href="">
                                                &nbps;
                                            </a>
                                        </li>

                                        <li menuItemName="" id="Primary_Navbar-Services-Order_New_Services">
                                            <a href="sistema_mn.php?mn=pagos&renglon=aprobados">
                                                Aprobadas
                                            </a>
                                        </li>

                                        <li menuItemName="" id="Primary_Navbar-Services-View_Available_Addons">
                                            <a href="sistema_mn.php?mn=pagos&renglon=rechazadas">
                                                Rechazadas
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li menuItemName="Domains" class="dropdown" id="Primary_Navbar-Domains">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Sistema&nbsp;<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li menuItemName="My Domains" id="Primary_Navbar-Domains-My_Domains">
                                            <a href="sistema/backup_gabodb.php">
                                                Respaldar .gabodb
                                            </a>
                                        </li>                                                                     

                                        <li menuItemName="Register a New Domain" id="Primary_Navbar-Domains-Register_a_New_Domain">
                                            <a href="sistema/backup_sql.php">
                                                Respaldar .sql
                                            </a>
                                        </li>

                                        <li menuItemName="Domains Divider 2" class="nav-divider" id="Primary_Navbar-Domains-Domains_Divider_2">
                                            <a href="">
                                                &nbsp;
                                            </a>
                                        </li>

                                        <li menuItemName="Domain Search" id="Primary_Navbar-Domains-Domain_Search">                                            
                                            <a data-toggle="modal" data-target="#modal_restore">
                                                Restaurar .gabodb
                                            </a>                                             
                                        </li>
                                    </ul>
                                </li>

                                <!-- <li menuItemName="Billing" class="dropdown" id="Primary_Navbar-Billing">
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
                                </li> -->

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

                                <form id="amable" name="amable" style="display:none;"></form>

                                <li menuItemName="Support" class="dropdown" id="Primary_Navbar-Support">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Gastos<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php if ($_GET["mn"]=="administracion"): ?>
                                            <li menuItemName="Tickets" id="Primary_Navbar-Support-Tickets">
                                                <a onclick="enviar_formulario('amable','registro_gasto.php','menu')">
                                                    Asignar un gasto
                                                </a>
                                            </li>
                                        <?php endif ?>
                                        

                                        <li menuItemName="Knowledgebase" id="Primary_Navbar-Support-Knowledgebase">
                                            <a href="">
                                                Tabla de gastos
                                            </a>
                                        </li>

                                        <li menuItemName="Downloads" id="Primary_Navbar-Support-Downloads">
                                            <a href="sistema_mn.php?mn=proveedores">
                                                Lista de proveedores
                                            </a>
                                        </li>
                                    </ul>
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