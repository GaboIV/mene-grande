<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<?php 

	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	include("conexion_local.php");

	$dia_num = date(d);
    
	$dia_en = date(l);
	
	if ($dia_en=="Monday") $dia_es="Lunes";
    if ($dia_en=="Tuesday") $dia_es="Martes";
    if ($dia_en=="Wednesday") $dia_es="Miércoles";
    if ($dia_en=="Thursday") $dia_es="Jueves";
    if ($dia_en=="Friday") $dia_es="Viernes";
    if ($dia_en=="Saturday") $dia_es="Sabado";
    if ($dia_en=="Sunday") $dia_es="Domingo";

    $mes_en = date(F);       

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

    $ano = date(Y)


 ?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Cache-Control" content="no-cache" />
		<meta name="google-site-verification" content="EV-XxwDH1uH8kH616nCa64maSUQBA3QlhGC4fiYp230" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<script src="js/jquery.min.js"></script>
		<link href="css/shadowbox.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/shadowbox.js"></script>
		
		<script type="text/javascript"> Shadowbox.init({ language: "es", players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv'] }); </script>
		<script type="text/javascript"> 
		$(document).ready(function(){
			setTimeout(function() {
			    Shadowbox.open({
		    	    content:    '<div><img src="img/banner_2.png" width="100%"></div>',
		    	    player:     "html",
		    	    title:      "",
		    	    width:      720,
		    	    height:     512
		    	});
			}, 50);
		});
		</script>

		<title>Conjunto Residencial Mene Grande</title>

		<link rel="stylesheet" media="screen" type="text/css" href="css/ministerio-home.css" />
		<link rel="stylesheet" media="print" type="text/css" href="css/ministerio-home-imprimir.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="css/slider.css" />

		<script type="text/javascript">var textoEnlaceExterno = "Enlace externo, se abre en ventana nueva";</script>
		<script type="text/javascript" src="js/jstarget.js"></script>
		<script type="text/javascript" src="js/dropdown.js"></script>
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

		<script type="text/javascript" src="js/script-jcarousellite.js"></script>
		<script type="text/javascript" src="js/lib-jcarousellite.js"></script>
		<script type="text/javascript" src="js/slides.min.jquery.js"></script>
		<script type="text/javascript" src="js/slides.js"></script>

		<script type="text/javascript">
			window.onload = function(){
				ExternalLinks.init();
			}
		</script>

		<meta content="Inicio" name="description"/>
		<meta content="Inicio" name="keywords"/>
	</head>

	<body>



		<!-- Google Tag Manager -->
		<noscript>
			<div>
				<object data="http://www.googletagmanager.com/ns.html?id=GTM-5FKQHR" class="tagmanager"></object>
			</div>
		</noscript>

		<script type="text/javascript"> (function(w,d,s,l,i){w[l]=w[l]||[]; w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'}); var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= '../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FKQHR');
		</script>
		<!-- End Google Tag Manager -->

		<div id="fondo">
			<div id="head">

				<div id="escudo">
					<a href="index.html">
						<img src="img/escudo-mene.png" alt="¡Mene Grande somos todos!" title="Logo de Mene Grande"/>
					</a>
				</div>

				<div class="fecha">
					Correo de contacto: urbanizacionmenegrande@gmail.com
				</div>

				<div id="menusup">
					<div id="enlaces">
						<ul>							
							<li>
								<a href="">Número de contacto: Evanlucy Figueroa (0424-8536733)</a>
							</li>
						</ul>
					</div>

					<div id="idiomas">
						<ul>
							<li class="primero">
								<a href="index.html">
									<span title="Castellano" xml:lang="es" lang="es"><?php echo "Anaco, $dia_es $dia_num de $mes_es del $ano " ?></span>
								</a>
							</li>							
						</ul>
					</div>
				</div>

				<div id="opciones">
					<div id="redes-sociales">
						
					</div>

					<script type="text/javascript">dropdown('nav', 'hover', 25);</script>

					<div id="traductor">
						<div id="google_translate_element"></div>
					</div>
					<div id="pestanias">
						<ul id="tab" class="2">
							<li class="seleccionado">
								<a href="index.html">Inicio</a>
							</li>
							<li>
								<a href="">El conjunto</a>
							</li>
							<li>
								<a href="">Junta de condominio</a>
							</li>
							<li>
								<a href="">Vecinos</a>
							</li>
							<li>
								<a href="">Noticias</a>
							</li>
							<li>
								<a href="">Cronograma</a>
							</li>
							<li>
								<a href="">Contáctenos</a>
							</li>
						</ul>
					</div>
					<div id="buscador">
						<form class="external" action="http://www.google.com/cse" id="cse-search-box">
							<fieldset>
								<input type="hidden" name="cx" value="006043202724820927248:lkl0norxzhk"/>
								<label for="campotexto">Buscar:</label>
								<input name="q" type="text" value="Buscar" onfocus="if(value=='Buscar'){value=''}" onblur="if(value==''){value='Buscar'}" class="campotexto" id="campotexto"/>
								<input type="submit" name="mec" id="boton_buscar" class="botonbuscar" value=""/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>


			<div id="bloquearriba">
				<div id="izquierda">
					<div id="container">
						<div id="slides">
							<div class="slides_container">

								<div class="slide">
									<img title="" alt="" src="img/slider01.jpg"/>

									<div class="caption">
										<p class="titulo">Entrada de Conjunto Residencial Mene Grande</p>
										<p></p>
										<p class="mas">
											<a href="" >Ver más<span class="ns">Entrada de Conjunto Residencial Mene Grande</span></a>
										</p>
									</div>
								</div>

								<div class="slide">
									<img title="" alt="" src="img/slider02.jpg"/>

									<div class="caption">
										<p class="titulo">Localización Conjunto Residencial Mene Grande</p>
										<p></p>
										<p class="mas">
											<a href="" >Ir a Google Maps<span class="ns">Localización Conjunto Residencial Mene Grande</span></a>
										</p>
									</div>
								</div>
							</div>
							<a class="prev" href="#">
								<img alt="Anterior" src="img/flecha-anterior.png"/>
							</a>
							<a class="next" href="#">
								<img alt="Siguiente" src="img/flecha-siguiente.png"/>
							</a>
						</div>
					</div>
				</div>

				<div id="derecha">
					<div class="banner atencion">
						<a href="">
							<span>Información</span>
							<span>administrativa</span>
						</a>
					</div>
					<div class="banner img">
						<a id="be03" href="" title="" >
							<span>Comunicación</span>
							<span>con el conjunto</span>
							<img alt="" src="img/comunicacion.png"/>
						</a>
					</div>
					<div class="banner sede">
						<a href="">
							<span>Publicaciones de</span>
							<span>venta o alquiler</span>
						</a>
					</div>
					<div class="banner becas">
						<a href="">
							<span>Fechas de </span>
							<span>reuniones</span>
						</a>
					</div>
					<div class="banner img">
						<a id="be16" href="" title="" >
							<span>Gestión de</span>
							<span>la Junta</span>
							<img alt="" src="img/gestion.png"/>
						</a>
					</div>
				</div>
			</div>


			<div id="bloqueabajo">
				<div id="columnas">
					<div id="colprimera">
						<div class="portales educacion">
							<h2>Sistema de condominio</h2>

							<form name="ini_sicon" action="control.php" method="post" enctype="application/x-www-form-urlencoded">
								<span>Usuario:  </span><br><input type="text" name="mom_la12"><br><br>							
								<span>Password: </span><br><input type="password" name="lel_la12"><br><br>
								<input type="submit" class="btn-enviar" value="Iniciar sesión">
							</form>							

							<div class="mas">
								<a href="">Olvidé mi contraseña</a>
							</div>

							<div class="mas">
								<a href="">Acerca del sistema</a>
							</div>
							
						</div>

						<div class="portales cultura">
							<h2></h2>
							<ul>
								<li>
									<a rel="" href="">
										<img title="" alt="" src="img/lectureando.jpg"/>
									</a>
								</li><li>
									<a rel="" href="">
										<img title="" alt="" src="img/nuestros.jpg"/>
									</a>
								</li>
							</ul>

							<div class="mas">
								<a href="">Ver más</a>
							</div>
						</div>

						<div class="portales deporte">
							<h2>Portales de Deporte</h2>
							<ul>
								<li>
									<a rel="" href="">
										<img title="" alt="" src=""/>
									</a>
								</li><li>
									<a rel="" href="">
										<img title="" alt="" src=""/>
									</a>
								</li>
							</ul>

							<div class="mas">
								<a href="">Ver más</a>
							</div>
						</div>						
					</div>


					<div id="colsegunda">
						<div id="actualidad">
							<div class="titulo">
								<div>
									<h1>Actualidad del Conjunto Residencial</h1>
								</div>
							</div>

							<div class="texto">
								<ul>
									<li>
										<span>Lunes, 13 de junio de 2016</span>
										<a class="noticia" href="">En pro de avanzar en la organización y buena administración de nuestro conjunto, se crea el sistema de condominio automatizado vía web</a>
										<p>Creado por Gabriel Caraballo, residente de la casa D-12, se ha empezado a implementar el sistema "Condominio Mene Grande 1.1a" para facilitar y unificar muchas funciones por parte de los propietarios y junta directiva.</p>
									</li>
									<li>
										<span>Jueves, 23 de mayo de 2016</span>
										<a class="noticia" href="">Mediante votación libre de los vecinos de la comunidad se elige la nueva junta de condominio</a>
										<p>Con la asistencia de 28 propietarios, se sometió a consideración de los presentes La Elección de la nueva Junta de Condominio, elegidos los siguientes cargos: Carlos William (Presidente), Carlos López (Vicepresidente), Evaluncy Figueroa (Tesorera), Joana Casique (Secretaria), Luis González (1er vocero), Yuli Torres (2do vocero) y Orelis Medina (3er vocero)</p>
									</li>
									<li>
										<!-- <a href="">
											<img class="img-h" alt="La Reina y Méndez de Vigo" src="../img/noticia02.jpg"/>
										</a> -->
										<span>Martes, 10 de mayo de 2016</span>
										<a class="noticia" href="">Se restablece el sistema de aguas blancas de manera corrida y permanente.</a>
										<p>Luego de 4 días de recortes de agua por motivo de obstrucción de la bomba para aguas residuales, gracias a la ardua labor de los vecinos Christian Tabanji, Evanlucy Figueroa, Corrado Catania, Carlos Williams y todos lo que aportaron su ayuda, se restablece el suminitro de agua de manera continuo.</p>
									</li>
									<li>
										<a href="">
											<img class="img-h" alt="" src="img/noticia03.jpg"/>
										</a>
										<span>Domingo, 08 de mayo de 2016</span>
										<a class="noticia" href="">Se llevó a cabo un proceso de mantenimiento de la bomba de la planta de tratamiento</a>
										<p>En una acción iniciada por el vecino Corrado Catania, residente de la casa D-06, se tomaron cartas en el asunto de la limpieza del filtro de la bomba de aguas negras, durante el proceso se notó que en los objetos obstruyentes iban desde condones hasta pañales, la situación es alarmante.</p>
									</li>									
								</ul>

								<div class="clear"></div>

								<div class="vermas">
									<a href="">Ver más</a>
								</div>
							</div>
						</div>
					</div>

					<div id="coltercera">
						<div class="banner img unaLinea">
							<a id="be05" href="" title="" >
								<img alt="" src=""/>
							</a>
						</div>

						<div class="banner img unaLinea">
							<a id="be23" href="" title="" rel="external">
								<img alt="" src=""/>
							</a>
						</div>

						<div class="banner img unaLinea">
							<a id="be23" href="" title="" rel="external">
								<img alt="" src=""/>
							</a>
						</div>

						<div class="box-listado destacados">
							<h2>Hoy te puede interesar</h2>
							<ul>
								<li class="sinborde">
									<a rel="" href="">
										Lo más consultado en toda nuestra información
									</a>
								</li>
							</ul>
						</div>

						<div class="box-listado">
							<h2>Destacados</h2>
							<ul>
								<li class="">
									<a rel="external" href="">
										En pro de avanzar en la organización y buena administración de nuestro conjunto, se crea el sistema de condominio automatizado vía web
										<img src=""/>
									</a>
								</li>
								<li class="">
									<a rel="external" href="">
										Mediante votación libre de los vecinos de la comunidad se elige la nueva junta de condominio
										<img src=""/>
									</a>
								</li>
								<li class="sinborde">
									<a rel="external" href="">
										Se restablece el sistema de aguas blancas de manera corrida y permanente
										<img src=""/>
									</a>
								</li>
							</ul>
						</div>						
					</div>
				</div>
			</div>		


			<!-- <div id="footer">
				<div class="columna">
					<h3>
						<a href="#">MECD</a>
					</h3>
					<ul>
						<li>
							<a rel="" href="">El Ministerio</a>
						</li>
						<li>
							<a rel="" href="">Servicios al ciudadano</a>
						</li>
						<li>
							<a rel="" href="">Prensa</a>
						</li>
					</ul>
				</div>

				<div class="columna">
					<h3>
						<a href="">Educación</a>
					</h3>
					<ul>
						<li>
							<a rel="" href="">Estudiantes</a>
						</li>
						<li>
							<a rel="" href="">Profesores</a>
						</li>
						<li>
							<a rel="" href="">Universidades</a>
						</li>
					</ul>
				</div>

				<div class="columna">
					<h3>
						<a href="">Cultura</a>
					</h3>
					<ul>
						<li>
							<a rel="" href="">Archivos</a>
						</li>
						<li>
							<a rel="" href="">Artes Escénicas y música</a>
						</li>
						<li>
							<a rel="" href="">Bibliotecas</a>
						</li>
					</ul>
				</div>

				<div class="columna">
					<h3>
						<a href="">Deporte</a>
					</h3>
					<ul>
						<li>
							<a rel="external" href="">Asociaciones Federaciones</a>
						</li>
						<li>
							<a rel="external" href="">Deporte Alta Competición</a>
						</li>
						<li>
							<a rel="external" href="">Deporte y salud</a>
						</li>
					</ul>
				</div>

				<div class="clear"></div>
			</div> -->

			<div id="pie">
				<div id="accessible">
					<p>
						CONJUNTO RESIDENCIAL MENE GRANDE
					</p>
					<p>
						<a href="" rel="external">
							<img src="img/logo-w3c.gif" alt="Logotipo W3C/WAI doble A (WCAG 1.0)" title="Este sitio web cumple con el nivel de accesibilidad doble A segun las pautas WCAG 1.0"/>
						</a>
						<a href="" rel="external">
							<img alt="Este documento es valido XHTML 1.0 Strict" src="img/logo-xhtml1.png"/>
						</a>
						<a href="" rel="external">
							<img alt="Este documento CSS es valido" src="img/logo-css.png"/>
						</a>
					</p>
					<ul>
						<li class="sinborde">
							<a rel="" href="">Mapa web</a>
						</li>
						<li class="sinborde">
							<a rel="" href="">Aviso legal</a>
						</li>
						<li class="ultimo">
							<a rel="" href="">Accesibilidad</a>
						</li>
					</ul>
				</div>
			</div>

<!-- Traductor Google -->
<script type="text/javascript">
	function googleTranslateElementInit() {
		new google.translate.TranslateElement({
			pageLanguage: 'es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE
		}, 'google_translate_element');
	}
</script>

<script type="text/javascript" src="../../translate.google.com/translate_a/elementa0d8.html?cb=googleTranslateElementInit">
</script>			
<!-- Fin Traductor Google -->
		</div>
	</body>
</html>
