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
                                <strong><?php echo "Casa $casa" ?></strong>
                            </p>
                            <p>Av. José Antonio Anzoátegui, Sector Guayabal, Urb. Mene Grande
                            <br/>Anaco
                            <br/>Anzoátegui                            
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
                                    <div class="stat"><?php echo $saldo_ini ?></div>
                                    <div class="title">Saldo</div>
                                    <div class="highlight bg-color-blue"></div>
                                </a>
                            </div>

                            <div class="col-sm-3 col-xs-6 tile" onclick="window.location='clientarea.php?action=domains'">
                                <a href="">
                                    <div class="icon">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="stat"><?php echo $deuda ?></div>
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

                    <p style="text-align:center;">Creado por <a href="gabrielcaraballo.com.ve" target="_blank">Gabriel Caraballo</a> para <a href="menegrande.com.ve" target="_blank">Conjunto Residencial Mene Grande</a> bajo autorización de la empresa <a href="fantasynetwork.com.ve" target="_blank">Fantasy Network, C.A.</a></p>
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

                                 <iframe name="otro" id="otro" src="<?php echo "contactos.php?sesion=".$id_sesion ?>" frameborder="0" scrolling="no" onload="resizeIframe('otro','otro');" style="width: 100%;"></iframe>

                                <iframe name="menu" id="menu" src="<?php echo "form_contacto.php?sesion=".$id_sesion ?>" frameborder="0" scrolling="no" onload="resizeIframe('menu','menu');" style="width: 100%;"></iframe>
                            </div>

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
                                <i class="fa fa-shopping-cart fa-fw"></i>&nbsp;Editar mis datos
                            </a>
                            <a menuItemName="Register New Domain" href="" class="list-group-item" id="Secondary_Sidebar-Client_Shortcuts-Register_New_Domain">
                                <i class="fa fa-globe fa-fw"></i>&nbsp;Registrar un nuevo pago
                            </a>
                            <a menuItemName="Logout" href="control_salir.php" class="list-group-item" id="Secondary_Sidebar-Client_Shortcuts-Logout">
                                <i class="fa fa-arrow-left fa-fw"></i>&nbsp;Salir del sistema
                            </a>
                        </div>
                    </div>
                </div>