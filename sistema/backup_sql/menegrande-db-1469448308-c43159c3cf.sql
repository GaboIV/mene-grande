DROP TABLE IF EXISTS anos;

CREATE TABLE `anos` (
  `id_ano` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(2) NOT NULL,
  `nombre` varchar(4) NOT NULL,
  PRIMARY KEY (`id_ano`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO anos VALUES("1","00","2000");
INSERT INTO anos VALUES("2","01","2001");
INSERT INTO anos VALUES("3","02","2002");
INSERT INTO anos VALUES("4","03","2003");
INSERT INTO anos VALUES("5","04","2004");
INSERT INTO anos VALUES("6","05","2005");
INSERT INTO anos VALUES("7","06","2006");
INSERT INTO anos VALUES("8","07","2007");
INSERT INTO anos VALUES("9","08","2008");
INSERT INTO anos VALUES("10","09","2009");
INSERT INTO anos VALUES("11","10","2010");
INSERT INTO anos VALUES("12","11","2011");
INSERT INTO anos VALUES("13","12","2012");
INSERT INTO anos VALUES("14","13","2013");
INSERT INTO anos VALUES("15","14","2014");
INSERT INTO anos VALUES("16","15","2015");
INSERT INTO anos VALUES("17","16","2016");
INSERT INTO anos VALUES("18","17","2017");
INSERT INTO anos VALUES("19","18","2018");
INSERT INTO anos VALUES("20","19","2019");



DROP TABLE IF EXISTS banco;

CREATE TABLE `banco` (
  `id_banco` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `conocido` int(11) NOT NULL,
  `numeros` varchar(4) NOT NULL,
  PRIMARY KEY (`id_banco`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO banco VALUES("1","Banco Central de Venezuela","0","0001");
INSERT INTO banco VALUES("2","Banco de Venezuela","0","0102");
INSERT INTO banco VALUES("3","Venezolano de Crédito","0","0104");
INSERT INTO banco VALUES("4","Banco Mercantil","0","0105");
INSERT INTO banco VALUES("5","Banco Provincial","0","0108");
INSERT INTO banco VALUES("6","Banco del Caribe","0","0114");
INSERT INTO banco VALUES("7","Banco Exterior","0","0115");
INSERT INTO banco VALUES("8","Banco Occidental de Descuento","0","0116");
INSERT INTO banco VALUES("9","Banco Caroní","0","0128");
INSERT INTO banco VALUES("10","Banesco","0","0134");
INSERT INTO banco VALUES("11","Banco Sofitasa","0","0137");
INSERT INTO banco VALUES("12","Banco Plaza","0","0138");
INSERT INTO banco VALUES("13","Banco de la Gente Emprendedora","0","0146");
INSERT INTO banco VALUES("14","Banco del Pueblo Soberano","0","0149");
INSERT INTO banco VALUES("15","Banco Fondo Común","0","0151");
INSERT INTO banco VALUES("16","100% Banco","0","0156");
INSERT INTO banco VALUES("17","Banco DelSur","0","0157");
INSERT INTO banco VALUES("18","Banco del Tesoro","0","0163");
INSERT INTO banco VALUES("19","Banco Agrícola de Venezuela","0","0166");
INSERT INTO banco VALUES("20","Bancrecer","0","0168");
INSERT INTO banco VALUES("21","Mi Banco","0","0169");
INSERT INTO banco VALUES("22","Banco Activo","0","0171");
INSERT INTO banco VALUES("23","Bancamiga","0","0172");
INSERT INTO banco VALUES("24","Banco Internacional de Desarrollo","0","0173");
INSERT INTO banco VALUES("25","Banplus","0","0174");
INSERT INTO banco VALUES("26","Banco Bicentenario","0","0175");
INSERT INTO banco VALUES("27","Novo Banco","0","0176");
INSERT INTO banco VALUES("28","Banco de la Fuerza Armada Nacional Bolivariana","0","0177");
INSERT INTO banco VALUES("29","Citibank","0","0190");
INSERT INTO banco VALUES("30","Banco Nacional Crédito","0","0191");



DROP TABLE IF EXISTS contactos;

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `id_propietario` int(5) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  PRIMARY KEY (`id_contacto`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

INSERT INTO contactos VALUES("49","48","Pedro Aguilera","","");
INSERT INTO contactos VALUES("48","47","Daniela Romero","","");
INSERT INTO contactos VALUES("47","46","Reina de GuillÃ©n","","");
INSERT INTO contactos VALUES("46","45","Ricardo Reyes","","");
INSERT INTO contactos VALUES("45","44","JosÃ© PÃ©rez","","");
INSERT INTO contactos VALUES("44","43","Jairo RodÃ³n","","");
INSERT INTO contactos VALUES("43","42","JesÃºs Lugo","","");
INSERT INTO contactos VALUES("42","41","Alida Vargas","","");
INSERT INTO contactos VALUES("41","40","Jorge Morillo","","");
INSERT INTO contactos VALUES("40","39","Alberto Ramos","","");
INSERT INTO contactos VALUES("39","38","Carlos LÃ³pez","","");
INSERT INTO contactos VALUES("38","37","Juan PernÃ­a","","");
INSERT INTO contactos VALUES("37","36","Evanlucy Figueroa","","");
INSERT INTO contactos VALUES("36","35","Ã“scar Ayala","gabrielcaraballo1907@gmail.com","");
INSERT INTO contactos VALUES("35","34","Carlos RodrÃ­guez","gabrielcaraballo1907@gmail.com","");
INSERT INTO contactos VALUES("34","0","Arelis Rangel","","");
INSERT INTO contactos VALUES("33","0","Arelis Rangel","","");
INSERT INTO contactos VALUES("32","33","Arelis Rangel","","");
INSERT INTO contactos VALUES("31","0","Marilis Clermont","","");
INSERT INTO contactos VALUES("29","31","Blanca Lugo","","");
INSERT INTO contactos VALUES("30","32","Marilis Clermont","","");
INSERT INTO contactos VALUES("28","30","JosÃ© MartÃ­nez","","");
INSERT INTO contactos VALUES("50","49","AlÃ­ Aponte","","");
INSERT INTO contactos VALUES("51","50","Luis Joel GonzÃ¡lez","","");
INSERT INTO contactos VALUES("52","51","Juan Mendoza","","");
INSERT INTO contactos VALUES("53","52","VÃ­xtor Videaux","","");
INSERT INTO contactos VALUES("54","53","JosÃ© LÃ³pez","","");
INSERT INTO contactos VALUES("55","54","GermÃ¡n JimÃ©nez","","");
INSERT INTO contactos VALUES("56","0","Julio Mujica","","");
INSERT INTO contactos VALUES("57","55","Daniela Loriente","","");
INSERT INTO contactos VALUES("58","56","Rosa Pasquariello","","");
INSERT INTO contactos VALUES("59","57","LÃ©rida DÃ­az ","","");
INSERT INTO contactos VALUES("60","58","VÃ­ctor Rosas","","");
INSERT INTO contactos VALUES("61","59","MarÃ­a Zodda","","");
INSERT INTO contactos VALUES("62","60","Carlos Williams","","");
INSERT INTO contactos VALUES("63","61","Catiuska HenrÃ­quez","","");
INSERT INTO contactos VALUES("64","62","Browil SuÃ¡rez","","");
INSERT INTO contactos VALUES("65","63","Arminda Ruiz","","");
INSERT INTO contactos VALUES("66","64","Rodolfo Valdez","","");
INSERT INTO contactos VALUES("67","65","Gladys Tabanji","","");
INSERT INTO contactos VALUES("68","66","Ã“scar SÃ¡nchez","","");
INSERT INTO contactos VALUES("69","67","Ãngel Cardozo","","");
INSERT INTO contactos VALUES("70","68","Dunian MuÃ±oz","","");
INSERT INTO contactos VALUES("71","69","GermÃ¡n JimÃ©nez","","");
INSERT INTO contactos VALUES("72","70","Carlota de Palacios","","");
INSERT INTO contactos VALUES("73","71","Miguel Castillo","","");
INSERT INTO contactos VALUES("74","72","Corrado Catania","","");
INSERT INTO contactos VALUES("75","73","Gilmer Correa","","");
INSERT INTO contactos VALUES("76","74","Idegaldis Hidrogo","","");
INSERT INTO contactos VALUES("77","75","Ingrid Piedra","","");
INSERT INTO contactos VALUES("78","76","Jhonny SuÃ¡rez","","");
INSERT INTO contactos VALUES("79","77","Jhonny SuÃ¡rez","","");
INSERT INTO contactos VALUES("80","78","Zaida de Caraballo","","");
INSERT INTO contactos VALUES("81","79","Dulce Medina","","");
INSERT INTO contactos VALUES("82","80","Johana Cacique","","");
INSERT INTO contactos VALUES("83","81","Julio Mujica","","");



DROP TABLE IF EXISTS cuenta_propia;

CREATE TABLE `cuenta_propia` (
  `id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `numeros` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO cuenta_propia VALUES("1","Banco Exterior","0115-0073-1130-0060-2021","Corriente");



DROP TABLE IF EXISTS gabodb;

CREATE TABLE `gabodb` (
  `id_gabodb` int(11) NOT NULL AUTO_INCREMENT,
  `momento` varchar(40) NOT NULL,
  `md5` varchar(100) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_gabodb`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO gabodb VALUES("13","1469415409","77035f9569","GABODB");
INSERT INTO gabodb VALUES("14","1469417274","7c2ca52cdb","GABODB");
INSERT INTO gabodb VALUES("15","1469447952","7fe3bfddc3","SQL");
INSERT INTO gabodb VALUES("16","1469448308","c43159c3cf","SQL");



DROP TABLE IF EXISTS inmueble;

CREATE TABLE `inmueble` (
  `id_inmueble` int(3) NOT NULL AUTO_INCREMENT,
  `inmueble` varchar(7) NOT NULL,
  `propietario` varchar(100) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `saldo` int(11) NOT NULL,
  `id_rol` int(1) NOT NULL,
  `id_estatus` int(1) NOT NULL,
  PRIMARY KEY (`id_inmueble`),
  UNIQUE KEY `inmueble` (`inmueble`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

INSERT INTO inmueble VALUES("1","admin","AdministraciÃ³n prueba","---","urbanizacionmenegrande@gmail.com","0424-8536733","mene123","0","99","1");
INSERT INTO inmueble VALUES("54","C-01-A","GermÃ¡n JimÃ©nez","","","","germanC01A","0","1","1");
INSERT INTO inmueble VALUES("53","B-12","JosÃ© LÃ³pez","","","","joseB12","0","1","1");
INSERT INTO inmueble VALUES("52","B-11","VÃ­xtor Videaux","","","","victorB11","0","1","1");
INSERT INTO inmueble VALUES("51","B-10","Juan Mendoza","","","","juanB10","0","1","1");
INSERT INTO inmueble VALUES("50","B-09","Luis Joel GonzÃ¡lez","","ljrgonzalez10@gmail.com","","luisB09","0","1","1");
INSERT INTO inmueble VALUES("49","B-08","AlÃ­ Aponte","","apontealirafael@gmail.com","","aliB08","0","1","1");
INSERT INTO inmueble VALUES("48","B-07","Pedro Aguilera","","paguilera@cantv.net","","pedroB07","0","1","1");
INSERT INTO inmueble VALUES("47","B-06","Daniela Romero","","","","danielaB06","0","1","1");
INSERT INTO inmueble VALUES("46","B-05","Reyna de GuillÃ©n","","reynadeguillen@gmail.com","","reinaB05","0","1","1");
INSERT INTO inmueble VALUES("45","B-04","Ricardo Reyes","","","","ricardoB04","0","1","1");
INSERT INTO inmueble VALUES("44","B-03","JosÃ© PÃ©rez","","","","joseB03","0","1","1");
INSERT INTO inmueble VALUES("43","B-02","Jairo RodÃ³n","","rondonjjx@gmail.com","","jairoB02","0","1","1");
INSERT INTO inmueble VALUES("42","B-01","JesÃºs Lugo","","rafaelmorey1@gmail.com","","jesusB01","0","1","1");
INSERT INTO inmueble VALUES("41","A-12","Alida Vargas","","","","alidaA12","0","1","1");
INSERT INTO inmueble VALUES("40","A-11","Jorge Morillo","","","","jorgeA11","0","1","1");
INSERT INTO inmueble VALUES("39","A-10","Alberto Ramos","","albertoramos1520@gmail.com","","albertoA10","0","1","1");
INSERT INTO inmueble VALUES("38","A-09","Carlos LÃ³pez","","","0414-8388729","carlosA09","0","1","1");
INSERT INTO inmueble VALUES("37","A-08","Juan PernÃ­a","","perniajc0711@gmail.com","","juanA08","0","1","1");
INSERT INTO inmueble VALUES("36","A-07","Evanlucy Figueroa","","","0424-8536733","evanlucyA07","0","1","1");
INSERT INTO inmueble VALUES("35","A-06","Ã“scar Ayala","","","","oscarA06","0","1","1");
INSERT INTO inmueble VALUES("34","A-05","Carlos RodrÃ­guez","","","","carlosA05","0","1","1");
INSERT INTO inmueble VALUES("33","A-04","Arelis Rangel","","","","arelisA04","0","1","1");
INSERT INTO inmueble VALUES("32","A-03","Marylis F. Clemmons","","marylis1306@hotmail.com","","marilisA03","0","1","1");
INSERT INTO inmueble VALUES("30","A-01","JosÃ© MartÃ­nez","","luismartinez@hotmail.com","","joseA01","0","1","1");
INSERT INTO inmueble VALUES("31","A-02","Blanca Lugo","","blancaj09@gmail.com","","blancaA02","0","1","1");
INSERT INTO inmueble VALUES("55","C-02","Daniela Loriente","","danielaloriente@gmail.com","","danielaC02","0","1","1");
INSERT INTO inmueble VALUES("56","C-03","Rosa Pasquariello","","","","rosaC03","0","1","1");
INSERT INTO inmueble VALUES("57","C-04","LÃ©rida DÃ­az ","","","","leridaC04","0","1","1");
INSERT INTO inmueble VALUES("58","C-05","VÃ­ctor Rosas","","vrosas1967@gmail.com","","victorC05","0","1","1");
INSERT INTO inmueble VALUES("59","C-06","MarÃ­a Zodda","","","","mariaC06","0","1","1");
INSERT INTO inmueble VALUES("60","C-07","Carlos Williams","","carlosw89@gmail.com","0414-7959451","carlosC07","0","1","1");
INSERT INTO inmueble VALUES("61","C-08","Catiuska HenrÃ­quez","","catiuskajh@hotmail.com","","catiuskaC08","0","1","1");
INSERT INTO inmueble VALUES("62","C-09","Browil SuÃ¡rez","","juliocesar0506@gmail.com","","browilC09","0","1","1");
INSERT INTO inmueble VALUES("63","C-10","Arminda Ruiz","","urbayluis@hotmail.com","","armindaC10","0","1","1");
INSERT INTO inmueble VALUES("64","C-11","Rodolfo Valdez","","rodolfoluis66@hotmail.com","","rodolfoC11","0","1","1");
INSERT INTO inmueble VALUES("65","C-12","Gladis Sayegh","","gladissayegh@gmail.com","","gladysC12","0","1","1");
INSERT INTO inmueble VALUES("66","C-13","Ã“scar SÃ¡nchez","","oscar.sanchez777@gmail.com","","oscarC13","0","1","1");
INSERT INTO inmueble VALUES("67","D-01","Ãngel Cardozo","","angelcardozo@hotmail.com","","angelD01","0","1","1");
INSERT INTO inmueble VALUES("68","D-02","Dunian MuÃ±oz","","dunianj13@gmail.com","","dunianD02","0","1","1");
INSERT INTO inmueble VALUES("69","D-03","GermÃ¡n JimÃ©nez","","rafaeljimenez95@hotmail.com","","germanD03","0","1","1");
INSERT INTO inmueble VALUES("70","D-04","Carlota de Palacios","","","","carlotaD04","0","1","1");
INSERT INTO inmueble VALUES("71","D-05","Miguel Castillo","9.684.858","miguelecastillo@gmail.com","0414-4505871","miguelD05","0","1","1");
INSERT INTO inmueble VALUES("72","D-06","Corrado Catania","6.831.979","corradocatania20@gmail.com","0416-8812889","corradoD06","0","1","1");
INSERT INTO inmueble VALUES("73","D-07","Gilmer Correa","","","","gilmerD07","0","1","1");
INSERT INTO inmueble VALUES("74","D-08","Idegaldis Hidrogo","","","","idegaldisD08","0","1","1");
INSERT INTO inmueble VALUES("75","D-09","Ingrid Piedra","","ingridpiedra@gmail.com","","ingridD09","0","1","1");
INSERT INTO inmueble VALUES("76","D-10","Jhonny SuÃ¡rez","","suarezjn@pdvsa.com","","jhonnyD10","0","1","1");
INSERT INTO inmueble VALUES("77","D-11","Jhonny SuÃ¡rez","","suarezjn@pdvsa.com","","jhonnyD11","0","1","1");
INSERT INTO inmueble VALUES("78","D-12","Zaida de Caraballo","8.382.888","zaidamarymoya@gmail.com","0424-8979460","zaidaD12","0","1","1");
INSERT INTO inmueble VALUES("79","D-13","Dulce Medina","","","","dulceD13","0","1","1");
INSERT INTO inmueble VALUES("80","D-14","Johana Cacique","","ycasique@atlasoco.com","","johanaD14","0","1","1");
INSERT INTO inmueble VALUES("81","C-01-B","Julio Mujica","","imel86.jm@gmail.com","","julioC01B","0","1","1");



DROP TABLE IF EXISTS meses;

CREATE TABLE `meses` (
  `id_mes` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(2) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO meses VALUES("1","01","Enero");
INSERT INTO meses VALUES("2","02","Febrero");
INSERT INTO meses VALUES("3","03","Marzo");
INSERT INTO meses VALUES("4","04","Abril");
INSERT INTO meses VALUES("5","05","Mayo");
INSERT INTO meses VALUES("6","06","Junio");
INSERT INTO meses VALUES("7","07","Julio");
INSERT INTO meses VALUES("8","08","Agosto");
INSERT INTO meses VALUES("9","09","Septiembre");
INSERT INTO meses VALUES("10","10","Octubre");
INSERT INTO meses VALUES("11","11","Noviembre");
INSERT INTO meses VALUES("12","12","Diciembre");



DROP TABLE IF EXISTS pago;

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_banco_vi` int(5) NOT NULL,
  `id_banco_re` int(2) NOT NULL,
  `monto` decimal(11,0) NOT NULL,
  `fecha_dep` varchar(20) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_reg` varchar(20) NOT NULL,
  `cod_seg` varchar(7) NOT NULL,
  `id_estatus` int(3) NOT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO pago VALUES("9","29","1","1561","21/07/2016","32","78","21/07/2016 11:54:01","b17c090","1");
INSERT INTO pago VALUES("8","18","1","3000","21/07/2016","254","78","21/07/2016 11:50:01","9238b8c","1");
INSERT INTO pago VALUES("7","26","1","1225","21/07/2016","123","34","21/07/2016 10:50:38","aad65b9","1");



DROP TABLE IF EXISTS renta;

CREATE TABLE `renta` (
  `id_renta` int(11) NOT NULL AUTO_INCREMENT,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `id_tipo` int(2) NOT NULL,
  PRIMARY KEY (`id_renta`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO renta VALUES("19","7","2016","1000.00","Condominio 07-2016","1");



DROP TABLE IF EXISTS tipo_renta;

CREATE TABLE `tipo_renta` (
  `id_tipo_renta` int(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tipo_renta VALUES("1","Condominio");
INSERT INTO tipo_renta VALUES("2","Cuota Especial");



