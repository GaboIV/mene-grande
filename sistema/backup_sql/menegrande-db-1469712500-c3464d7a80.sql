DROP TABLE IF EXISTS anos;

CREATE TABLE `anos` (
  `id_ano` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(2) NOT NULL,
  `nombre` varchar(4) NOT NULL,
  PRIMARY KEY (`id_ano`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO anos () VALUES
	("1","00","2000"),
	("2","01","2001"),
	("3","02","2002"),
	("4","03","2003"),
	("5","04","2004"),
	("6","05","2005"),
	("7","06","2006"),
	("8","07","2007"),
	("9","08","2008"),
	("10","09","2009"),
	("11","10","2010"),
	("12","11","2011"),
	("13","12","2012"),
	("14","13","2013"),
	("15","14","2014"),
	("16","15","2015"),
	("17","16","2016"),
	("18","17","2017"),
	("19","18","2018"),
	("20","19","2019");


DROP TABLE IF EXISTS banco;

CREATE TABLE `banco` (
  `id_banco` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `conocido` int(11) NOT NULL,
  `numeros` varchar(4) NOT NULL,
  PRIMARY KEY (`id_banco`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO banco () VALUES
	("1","Banco Central de Venezuela","0","0001"),
	("2","Banco de Venezuela","0","0102"),
	("3","Venezolano de Cr�dito","0","0104"),
	("4","Banco Mercantil","0","0105"),
	("5","Banco Provincial","0","0108"),
	("6","Banco del Caribe","0","0114"),
	("7","Banco Exterior","0","0115"),
	("8","Banco Occidental de Descuento","0","0116"),
	("9","Banco Caron�","0","0128"),
	("10","Banesco","0","0134"),
	("11","Banco Sofitasa","0","0137"),
	("12","Banco Plaza","0","0138"),
	("13","Banco de la Gente Emprendedora","0","0146"),
	("14","Banco del Pueblo Soberano","0","0149"),
	("15","Banco Fondo Com�n","0","0151"),
	("16","100% Banco","0","0156"),
	("17","Banco DelSur","0","0157"),
	("18","Banco del Tesoro","0","0163"),
	("19","Banco Agr�cola de Venezuela","0","0166"),
	("20","Bancrecer","0","0168"),
	("21","Mi Banco","0","0169"),
	("22","Banco Activo","0","0171"),
	("23","Bancamiga","0","0172"),
	("24","Banco Internacional de Desarrollo","0","0173"),
	("25","Banplus","0","0174"),
	("26","Banco Bicentenario","0","0175"),
	("27","Novo Banco","0","0176"),
	("28","Banco de la Fuerza Armada Nacional Bolivariana","0","0177"),
	("29","Citibank","0","0190"),
	("30","Banco Nacional Cr�dito","0","0191");


DROP TABLE IF EXISTS contactos;

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `id_propietario` int(5) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  PRIMARY KEY (`id_contacto`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

INSERT INTO contactos () VALUES
	("49","48","Pedro Aguilera","",""),
	("48","47","Daniela Romero","",""),
	("47","46","Reina de Guillén","",""),
	("46","45","Ricardo Reyes","",""),
	("45","44","José Pérez","",""),
	("44","43","Jairo Rodón","",""),
	("43","42","Jesús Lugo","",""),
	("42","41","Alida Vargas","",""),
	("41","40","Jorge Morillo","",""),
	("40","39","Alberto Ramos","",""),
	("39","38","Carlos López","",""),
	("38","37","Juan Pernía","",""),
	("37","36","Evanlucy Figueroa","",""),
	("36","35","Óscar Ayala","gabrielcaraballo1907@gmail.com",""),
	("35","34","Carlos Rodríguez","gabrielcaraballo1907@gmail.com",""),
	("34","0","Arelis Rangel","",""),
	("33","0","Arelis Rangel","",""),
	("32","33","Arelis Rangel","",""),
	("31","0","Marilis Clermont","",""),
	("29","31","Blanca Lugo","",""),
	("30","32","Marilis Clermont","",""),
	("28","30","José Martínez","",""),
	("50","49","Alí Aponte","",""),
	("51","50","Luis Joel González","",""),
	("52","51","Juan Mendoza","",""),
	("53","52","Víxtor Videaux","",""),
	("54","53","José López","",""),
	("55","54","Germán Jiménez","",""),
	("56","0","Julio Mujica","",""),
	("57","55","Daniela Loriente","",""),
	("58","56","Rosa Pasquariello","",""),
	("59","57","Lérida Díaz ","",""),
	("60","58","Víctor Rosas","",""),
	("61","59","María Zodda","",""),
	("62","60","Carlos Williams","",""),
	("63","61","Catiuska Henríquez","",""),
	("64","62","Browil Suárez","",""),
	("65","63","Arminda Ruiz","",""),
	("66","64","Rodolfo Valdez","",""),
	("67","65","Gladys Tabanji","",""),
	("68","66","Óscar Sánchez","",""),
	("69","67","Ángel Cardozo","",""),
	("70","68","Dunian Muñoz","",""),
	("71","69","Germán Jiménez","",""),
	("72","70","Carlota de Palacios","",""),
	("73","71","Miguel Castillo","",""),
	("74","72","Corrado Catania","",""),
	("75","73","Gilmer Correa","",""),
	("76","74","Idegaldis Hidrogo","",""),
	("77","75","Ingrid Piedra","",""),
	("78","76","Jhonny Suárez","",""),
	("79","77","Jhonny Suárez","",""),
	("80","78","Zaida M. Moya de C.","zaidamarymoya@gmail.com","0424-8979460"),
	("81","79","Dulce Medina","",""),
	("82","80","Johana Cacique","",""),
	("83","81","Julio Mujica","","");


DROP TABLE IF EXISTS cuenta_propia;

CREATE TABLE `cuenta_propia` (
  `id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `numeros` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO cuenta_propia () VALUES
	("1","Banco Exterior","0115-0073-1130-0060-2021","Corriente");


DROP TABLE IF EXISTS gabodb;

CREATE TABLE `gabodb` (
  `id_gabodb` int(11) NOT NULL AUTO_INCREMENT,
  `momento` varchar(40) NOT NULL,
  `md5` varchar(100) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_gabodb`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

INSERT INTO gabodb () VALUES
	("32","1469563693","8bc205b662","GABODB"),
	("33","1469564890","5427c39f2d","GABODB"),
	("34","1469564893","77f4a4363f","SQL"),
	("35","1469578639","a3b8dd28de","GABODB"),
	("36","1469578799","4f11462978","GABODB"),
	("37","1469578825","68f4246ca0","GABODB"),
	("38","1469630680","bcff55123d","GABODB"),
	("39","1469711865","48e00744da","GABODB"),
	("40","1469712355","1c07205f70","GABODB"),
	("41","1469712377","d05d795091","GABODB"),
	("42","1469712500","c3464d7a80","SQL");


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

INSERT INTO inmueble () VALUES
	("1","admin","Administración","---","urbanizacionmenegrande@gmail.com","0424-8536733","mene123","0","99","1"),
	("54","C-01-A","Germán Jiménez","","","","germanC01A","0","1","1"),
	("53","B-12","José López","","","","joseB12","0","1","1"),
	("52","B-11","Víxtor Videaux","","","","victorB11","0","1","1"),
	("51","B-10","Juan Mendoza","","","","juanB10","0","1","1"),
	("50","B-09","Luis Joel González","","ljrgonzalez10@gmail.com","","luisB09","0","1","1"),
	("49","B-08","Alí Aponte","","apontealirafael@gmail.com","","aliB08","0","1","1"),
	("48","B-07","Pedro Aguilera","","paguilera@cantv.net","","pedroB07","0","1","1"),
	("47","B-06","Daniela Romero","","","","danielaB06","0","1","1"),
	("46","B-05","Reyna de Guillén","","reynadeguillen@gmail.com","","reinaB05","0","1","1"),
	("45","B-04","Ricardo Reyes","","","","ricardoB04","0","1","1"),
	("44","B-03","José Pérez","","","","joseB03","0","1","1"),
	("43","B-02","Jairo Rodón","","rondonjjx@gmail.com","","jairoB02","0","1","1"),
	("42","B-01","Jesús Lugo","","rafaelmorey1@gmail.com","","jesusB01","0","1","1"),
	("41","A-12","Alida Vargas","","","","alidaA12","0","1","1"),
	("40","A-11","Jorge Morillo","","","","jorgeA11","0","1","1"),
	("39","A-10","Alberto Ramos","","albertoramos1520@gmail.com","","albertoA10","0","1","1"),
	("38","A-09","Carlos López","","","0414-8388729","carlosA09","0","1","1"),
	("37","A-08","Juan Pernía","","perniajc0711@gmail.com","","juanA08","0","1","1"),
	("36","A-07","Evanlucy Figueroa","","","0424-8536733","evanlucyA07","0","1","1"),
	("35","A-06","Óscar Ayala","","","","oscarA06","0","1","1"),
	("34","A-05","Carlos Rodríguez","","","","carlosA05","0","1","1"),
	("33","A-04","Arelis Rangel","","","","arelisA04","0","1","1"),
	("32","A-03","Marylis F. Clemmons","","marylis1306@hotmail.com","","marilisA03","0","1","1"),
	("30","A-01","José Martínez","","luismartinez@hotmail.com","","joseA01","0","1","1"),
	("31","A-02","Blanca Lugo","","blancaj09@gmail.com","","blancaA02","0","1","1"),
	("55","C-02","Daniela Loriente","","danielaloriente@gmail.com","","danielaC02","0","1","1"),
	("56","C-03","Rosa Pasquariello","","","","rosaC03","0","1","1"),
	("57","C-04","Lérida Díaz ","","","","leridaC04","0","1","1"),
	("58","C-05","Víctor Rosas","","vrosas1967@gmail.com","","victorC05","0","1","1"),
	("59","C-06","María Zodda","","","","mariaC06","0","1","1"),
	("60","C-07","Carlos Williams","","carlosw89@gmail.com","0414-7959451","carlosC07","0","1","1"),
	("61","C-08","Catiuska Henríquez","","catiuskajh@hotmail.com","","catiuskaC08","0","1","1"),
	("62","C-09","Brovil J. Suárez M.","3.155.637","juliocesar0506@gmail.com","","browilC09","0","1","1"),
	("63","C-10","Arminda Ruiz","","urbayluis@hotmail.com","","armindaC10","0","1","1"),
	("64","C-11","Rodolfo Valdez","","rodolfoluis66@hotmail.com","","rodolfoC11","0","1","1"),
	("65","C-12","Gladis Sayegh","","gladissayegh@gmail.com","","gladysC12","0","1","1"),
	("66","C-13","Óscar Sánchez","","oscar.sanchez777@gmail.com","","oscarC13","0","1","1"),
	("67","D-01","Ángel Cardozo","","angelcardozo@hotmail.com","","angelD01","0","1","1"),
	("68","D-02","Dunian Muñoz","","dunianj13@gmail.com","","dunianD02","0","1","1"),
	("69","D-03","Germán Jiménez","","rafaeljimenez95@hotmail.com","","germanD03","0","1","1"),
	("70","D-04","Carlota de Palacios","","","","carlotaD04","0","1","1"),
	("71","D-05","Miguel E. Castillo O.","9.684.858","miguelecastillo@gmail.com","0414-4505871","miguelD05","0","1","1"),
	("72","D-06","Corrado J. Catania E.","6.831.979","corradocatania20@gmail.com","0416-8812889","corradoD06","0","1","1"),
	("73","D-07","Gilmer Correa","","","0426-5826048","gilmerD07","0","1","1"),
	("74","D-08","Idegaldis Hidrogo","","","","idegaldisD08","0","1","1"),
	("75","D-09","Ingrid Piedra","","ingridpiedra@gmail.com","","ingridD09","0","1","1"),
	("76","D-10","Jhonny Suárez","","suarezjn@pdvsa.com","","jhonnyD10","0","1","1"),
	("77","D-11","Jhonny Suárez","","suarezjn@pdvsa.com","","jhonnyD11","0","1","1"),
	("78","D-12","Zaida M. Moya de C.","8.382.888","zaidamarymoya@gmail.com","0424-8979460","zaidaD12","0","1","1"),
	("79","D-13","Dulce Medina","","","","dulceD13","0","1","1"),
	("80","D-14","Johana Cacique","","ycasique@atlasoco.com","","johanaD14","0","1","1"),
	("81","C-01-B","Julio Mujica","","imel86.jm@gmail.com","","julioC01B","0","1","1");


DROP TABLE IF EXISTS meses;

CREATE TABLE `meses` (
  `id_mes` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(2) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO meses () VALUES
	("1","01","Enero"),
	("2","02","Febrero"),
	("3","03","Marzo"),
	("4","04","Abril"),
	("5","05","Mayo"),
	("6","06","Junio"),
	("7","07","Julio"),
	("8","08","Agosto"),
	("9","09","Septiembre"),
	("10","10","Octubre"),
	("11","11","Noviembre"),
	("12","12","Diciembre");


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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO pago () VALUES


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

INSERT INTO renta () VALUES


DROP TABLE IF EXISTS tipo_renta;

CREATE TABLE `tipo_renta` (
  `id_tipo_renta` int(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tipo_renta () VALUES


