SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS llena;

USE llena;

DROP TABLE IF EXISTS arbitro;

CREATE TABLE `arbitro` (
  `dui` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`dui`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO arbitro VALUES("05839224-4","Manuel Isaac","Ramirez","M","Colonia las Flores Cojutepeque","3434-5323","2001-12-10","1");
INSERT INTO arbitro VALUES("09753279-1","Marvin Misael","RamArez Vazquez ","M","Canton el Rosario Candelaria, Cuscatlan","7654-3212","1998-10-10","1");
INSERT INTO arbitro VALUES("84736142-7","Mario Ernesto","Diaz Juarez","M","Colonia Las Delicias, Santa Cruz Michapa, CuscatlÃ¡n ","7867-5322","1998-10-11","1");
INSERT INTO arbitro VALUES("89241031-2","Gabriel Isai","Corena Perez ","M","Carretera Panamericana km 24, San Pedro Perulapan ","7872-2111","1998-10-12","1");



DROP TABLE IF EXISTS cambio;

CREATE TABLE `cambio` (
  `idcambio` int(11) NOT NULL AUTO_INCREMENT,
  `tiempo` time NOT NULL,
  `idjugadora` int(11) NOT NULL,
  `idjugadorb` int(11) NOT NULL,
  `idpartido` int(11) NOT NULL,
  PRIMARY KEY (`idcambio`),
  KEY `idjugadorb` (`idjugadorb`),
  KEY `idpartido` (`idpartido`) USING BTREE,
  KEY `idjugador` (`idjugadora`) USING BTREE,
  CONSTRAINT `cambio_ibfk_1` FOREIGN KEY (`idpartido`) REFERENCES `partido` (`idpartido`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cambio_ibfk_2` FOREIGN KEY (`idjugadora`) REFERENCES `jugador` (`idjugador`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cambio_ibfk_3` FOREIGN KEY (`idjugadorb`) REFERENCES `jugador` (`idjugador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO cambio VALUES("1","00:34:00","2","10","1");
INSERT INTO cambio VALUES("2","00:27:00","61","65","1");
INSERT INTO cambio VALUES("3","00:10:00","15","14","2");
INSERT INTO cambio VALUES("4","00:05:00","47","49","2");
INSERT INTO cambio VALUES("5","00:15:00","61","64","3");
INSERT INTO cambio VALUES("6","00:30:00","23","27","3");
INSERT INTO cambio VALUES("7","00:15:00","27","24","4");
INSERT INTO cambio VALUES("8","00:05:00","10","9","5");
INSERT INTO cambio VALUES("9","00:25:00","62","61","5");
INSERT INTO cambio VALUES("10","00:05:00","61","62","7");
INSERT INTO cambio VALUES("11","00:15:00","28","27","7");
INSERT INTO cambio VALUES("12","00:25:00","49","47","8");
INSERT INTO cambio VALUES("13","00:10:00","3","8","8");
INSERT INTO cambio VALUES("14","00:10:00","14","11","14");



DROP TABLE IF EXISTS cancha;

CREATE TABLE `cancha` (
  `idcancha` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) NOT NULL,
  `latitud` varchar(100) NOT NULL,
  `longitud` varchar(100) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idcancha`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO cancha VALUES("5","Las brumas","-88.9359121032593","13.721505254604734","Colonia Las Brumas, #1 avenida oeste, Cojutepeque Cuscatlán","0");
INSERT INTO cancha VALUES("6","Centro Cojutepeque","-88.9344529815552","13.721755397753736","Parque central de Cojutepeque centro","1");
INSERT INTO cancha VALUES("7","Cancha el Pueblito","-88.9313563712475","13.724628116364018","Carretera Panorámica Cojutepeque","1");



DROP TABLE IF EXISTS empleado;

CREATE TABLE `empleado` (
  `dui` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`dui`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO empleado VALUES("05813820-1","Kevin","Administrador","Masculino","1998-12-25","7420-4444","1");



DROP TABLE IF EXISTS equipo;

CREATE TABLE `equipo` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `camisa` longblob DEFAULT NULL,
  `idrepresentante` varchar(15) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idequipo`),
  KEY `idrepresentante` (`idrepresentante`),
  CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`idrepresentante`) REFERENCES `representante` (`dui`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO equipo VALUES("1","F.C Colombia","����\0JFIF\0\0\0\0\0\0��\0C\0															
INSERT INTO equipo VALUES("2","F.C Chile","����\0JFIF\0\0\0\0\0\0��\0C\0															
INSERT INTO equipo VALUES("3","Gamin","�PNG
v�O�FV�Hс������#󽷘��3aX��h� !Z�+���@.¤�	M]��5f�l��c�F�y���o\0ӿ\'_}�q�P�J����0`XZ-�(я��lG_O�L�o�|e�tuZ§�Da�h;�5\\R�l77ws��ԁ���
�!�\\:��s(ʚF����,3%ej�fV�%؊�Ή�,\\9C1��~i)��������Jev��?n6��
INSERT INTO equipo VALUES("4","F.C Movistar","����\0JFIF\0\0`\0`\0\0��\0;CREATOR: gd-jpeg v1.0 (using IJG JPEG v80), quality = 75\n��\0C\0		\n
d�kklC�\0����Z�����-ws+������[n�B���Z�X|�������}z���iL�,z����i�7-�u��X�m�m�m�m5}<��\"�>`R��3�JM��u?�i���z� be�q�5V�j8�X��:�#�c>+Y��Ը�z�`j4�9oN;��:�tjz�t$QnI�,��(]�Un�[�z��*��_R�T��J�u���t1^����(̞��W�\0�*�&Z�@eљS���6�T<�Q��a�Q�]�U{��O5G�Y����%�Ӥ����&�T�4��xw5^uJ�2Bm������Rv�\\���I�Oj�M�V6J�A^8��t��NZw�&�9-��[
a}AR!Z�J�W5E�VRs�����B�h�r-z���Ke�[6�;0�\"\n�8u#Q��٪T�����t5����1�BN\n��TA���x^�.�&��L�Q;��$�^����-�Z���F���1�q䀇:b�ߘf�\0>|_��aH��*�d��SeFZ:���ا�Ȯ��]�S���ܵ��f�f��]��W�f3\nQ[�C3\n�A0�B>���W�9�\'��˂�}��u�Ӄ�y%��po�����X%V��e�^\n��T�y�F*�V�J�iU����V��X�G��D*�J�`\n�%XEU������ʤR�m�AU���ux-���\np�J1�m���T`ђ�Q��q#�hI���l�vjQD��
�X�%�m\nFa�PzEm�dU�/k�Z���l��.�{�AT�O��l4�l��m�(
{\\�m|��֊�9�:Ţ\\��$\\8��4�/4*�/zVa�޶��:9-��;�5?+r��X}9G��(U�1�D.�sd��FsG�M�B��
INSERT INTO equipo VALUES("5","Las Brumas","����\0JFIF\0\0\0\0\0\0��\0�\0		&\"\"&0-0>>T		&\"\"&0-0>>T��\0\0f\0h\"\0��\0\0\0\0\0\0\0\0\0\0\0\0\0\0	��\0\0\0\0\0��8j�L��ο�^
INSERT INTO equipo VALUES("6","Libertadores","����\0JFIF\0\0`\0`\0\0��Exif\0\0MM\0*\0\0\0\0
INSERT INTO equipo VALUES("7","F.C Cojutepeque ","����\0JFIF\0\0`\0`\0\0��\0;CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 90\n��\0C\0\n\n\n
INSERT INTO equipo VALUES("8","F.C Patriotas","����\0JFIF\0\0\0\0\0\0��\0�\0		&\"\"&0-0>>T		&\"\"&0-0>>T��\0\0�\0�\"\0��\0\0\0\0\0\0\0\0\0\0\0\0\0	\n��\0\0\0\0\0�ؐ\0\0\0��\0\0\0\0\0\0\0\0b@Ӎ�؋D&`Z3�z�B�Pbx��V8��?��Q}�����0��64�B�籠]Ch��_�߼L5ej��O�db���	��Wr#���uۥ�)�����l�c�:���EL�,�E6�?�V��g�	���\\���F+[¾�1M}-e�]K�>|���:����?�NG�o��f�9����;حo��8��Ǧ�Wﶶ�\"~4U��������#e$H\0g�U����fCv�?r\0)n91;��sn�`\0L	>ݻ6��۲޸S1!Ǧ�1gm25�z
INSERT INTO equipo VALUES("9","Espartanos","�PNG
a�u�(1�����w�K��X��(�Q�^�D	;�c�5���f̯���1�\\�f��|.s����ɓ\'�r�Jƍ�k���
*R�C�AY�4PO¶���h/�~�/�Dx



DROP TABLE IF EXISTS falta;

CREATE TABLE `falta` (
  `idfalta` int(11) NOT NULL AUTO_INCREMENT,
  `observacion` varchar(500) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `tiempo` time NOT NULL,
  `idjugador` int(11) NOT NULL,
  `idpartido` int(11) NOT NULL,
  PRIMARY KEY (`idfalta`),
  KEY `idjugador` (`idjugador`) USING BTREE,
  KEY `idpartido` (`idpartido`) USING BTREE,
  CONSTRAINT `falta_ibfk_1` FOREIGN KEY (`idpartido`) REFERENCES `partido` (`idpartido`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `falta_ibfk_2` FOREIGN KEY (`idjugador`) REFERENCES `jugador` (`idjugador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO falta VALUES("1","Golpe al Tobio ","Tarjeta Amarilla","00:20:00","2","1");
INSERT INTO falta VALUES("2","Golpe al Tobio ","Tarjeta Amarilla","00:30:00","4","1");
INSERT INTO falta VALUES("3","Golpe intencional ","Tarjeta Amarilla","00:35:00","59","1");
INSERT INTO falta VALUES("4","Obstruccion ","Tarjeta Amarilla","00:20:00","1","2");
INSERT INTO falta VALUES("5","Golpe ","Tarjeta Amarilla","00:10:00","47","2");
INSERT INTO falta VALUES("6","Golpe intencional ","Tarjeta Roja","00:34:00","47","2");
INSERT INTO falta VALUES("7","Obstruccion ","Tarjeta Amarilla","00:05:00","59","3");
INSERT INTO falta VALUES("8","golpe intencional ","Tarjeta Roja","00:40:00","26","3");
INSERT INTO falta VALUES("9","Golpe ","Tarjeta Amarilla","00:15:00","47","4");
INSERT INTO falta VALUES("10","Golpe Intencional ","Tarjeta Roja","00:38:00","6","5");
INSERT INTO falta VALUES("11","obstruccion ","Tarjeta Amarilla","00:09:00","62","7");
INSERT INTO falta VALUES("12","Golpe ","Tarjeta Amarilla","00:10:00","26","7");
INSERT INTO falta VALUES("13","golpe intencional ","Tarjeta Amarilla","00:36:00","5","8");
INSERT INTO falta VALUES("14","Obstruccion ","Tarjeta Amarilla","00:20:00","62","9");
INSERT INTO falta VALUES("15","Obstruccion ","Tarjeta Amarilla","00:24:00","5","9");
INSERT INTO falta VALUES("16","Golpe Intencional ","Tarjeta Roja","00:25:00","62","11");
INSERT INTO falta VALUES("17","obstruccion ","Tarjeta Amarilla","00:09:00","47","12");
INSERT INTO falta VALUES("18","Golpe Intencional ","Tarjeta Roja","00:11:00","63","15");



DROP TABLE IF EXISTS goles;

CREATE TABLE `goles` (
  `idgoles` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `tiempo` time NOT NULL,
  `idjugador` int(11) NOT NULL,
  `idpartido` int(11) NOT NULL,
  PRIMARY KEY (`idgoles`),
  KEY `idjugador` (`idjugador`) USING BTREE,
  KEY `idpartido` (`idpartido`) USING BTREE,
  CONSTRAINT `goles_ibfk_1` FOREIGN KEY (`idpartido`) REFERENCES `partido` (`idpartido`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goles_ibfk_2` FOREIGN KEY (`idjugador`) REFERENCES `jugador` (`idjugador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

INSERT INTO goles VALUES("1","Jugada","00:38:00","2","1");
INSERT INTO goles VALUES("2","Tiro libre","00:32:00","4","1");
INSERT INTO goles VALUES("3","Penal","00:39:00","60","1");
INSERT INTO goles VALUES("4","Jugada","00:20:00","14","2");
INSERT INTO goles VALUES("5","Jugada","00:10:00","12","2");
INSERT INTO goles VALUES("6","Penal","00:37:00","16","2");
INSERT INTO goles VALUES("8","Jugada","00:15:00","49","2");
INSERT INTO goles VALUES("10","Jugada","00:10:00","63","3");
INSERT INTO goles VALUES("11","Jugada","00:35:00","26","3");
INSERT INTO goles VALUES("12","Jugada","00:10:00","50","4");
INSERT INTO goles VALUES("13","Jugada","00:20:00","24","4");
INSERT INTO goles VALUES("14","Penal","00:10:00","9","5");
INSERT INTO goles VALUES("15","Jugada","00:25:00","9","5");
INSERT INTO goles VALUES("16","Tiro libre","00:35:00","9","5");
INSERT INTO goles VALUES("17","Jugada","00:10:00","62","7");
INSERT INTO goles VALUES("18","Jugada","00:20:00","27","7");
INSERT INTO goles VALUES("19","Jugada","00:10:00","9","8");
INSERT INTO goles VALUES("20","Penal","00:05:00","67","8");
INSERT INTO goles VALUES("21","Jugada","00:15:00","67","8");
INSERT INTO goles VALUES("22","Jugada","00:06:00","67","8");
INSERT INTO goles VALUES("23","Penal","00:37:00","50","8");
INSERT INTO goles VALUES("24","Jugada","00:10:00","62","9");
INSERT INTO goles VALUES("25","Tiro libre","00:20:00","4","9");
INSERT INTO goles VALUES("26","Jugada","00:15:00","50","10");
INSERT INTO goles VALUES("27","Jugada","00:25:00","16","10");
INSERT INTO goles VALUES("28","Tiro libre","00:26:00","67","10");
INSERT INTO goles VALUES("29","Jugada","00:10:00","27","11");
INSERT INTO goles VALUES("30","Jugada","00:10:00","24","12");
INSERT INTO goles VALUES("31","Tiro libre","00:10:00","63","13");
INSERT INTO goles VALUES("32","Tiro libre","00:15:00","24","15");
INSERT INTO goles VALUES("33","Jugada","00:22:00","9","16");
INSERT INTO goles VALUES("34","Penal","00:09:00","2","16");



DROP TABLE IF EXISTS jornada;

CREATE TABLE `jornada` (
  `idjornada` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `clasificacion` varchar(20) NOT NULL,
  `torneo` int(11) NOT NULL,
  PRIMARY KEY (`idjornada`),
  KEY `fk_idtorneo` (`torneo`),
  CONSTRAINT `jornada_ibfk_1` FOREIGN KEY (`torneo`) REFERENCES `torneo` (`idtorneo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO jornada VALUES("1","2022-01-20","2022-01-20","rondas","1");
INSERT INTO jornada VALUES("2","2022-01-22","2022-01-22","rondas","1");
INSERT INTO jornada VALUES("3","2022-01-23","2022-01-23","rondas","1");
INSERT INTO jornada VALUES("4","2022-01-27","2022-01-27","rondas","1");
INSERT INTO jornada VALUES("5","2022-01-29","2022-01-29","rondas","1");
INSERT INTO jornada VALUES("6","2022-01-30","2022-01-30","rondas","1");
INSERT INTO jornada VALUES("7","2022-02-03","2022-02-03","rondas","1");
INSERT INTO jornada VALUES("8","2022-02-05","2022-02-05","rondas","1");
INSERT INTO jornada VALUES("14","2022-01-29","2022-01-29","semifinal","1");
INSERT INTO jornada VALUES("15","2022-01-29","2022-01-29","final","1");



DROP TABLE IF EXISTS jugador;

CREATE TABLE `jugador` (
  `idjugador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `fechanacimiento` varchar(15) NOT NULL,
  `numero_camisa` int(11) NOT NULL,
  `posicion` varchar(100) NOT NULL,
  `idequipo` int(11) NOT NULL,
  `titular` tinyint(1) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `cancha` tinyint(1) NOT NULL,
  PRIMARY KEY (`idjugador`),
  KEY `idequipo` (`idequipo`),
  CONSTRAINT `jugador_ibfk_1` FOREIGN KEY (`idequipo`) REFERENCES `equipo` (`idequipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

INSERT INTO jugador VALUES("1","Bladimir","Lopez","2000-06-24","1","Portero","2","0","1","1");
INSERT INTO jugador VALUES("2","Julio David","Perez","","1","Portero","1","1","1","1");
INSERT INTO jugador VALUES("3","Emilio ","Guevara","","3","Media","1","0","1","0");
INSERT INTO jugador VALUES("4","Daniel ","Ramirez Osorio","2000-05-05","4","Defensa_iz","1","1","1","1");
INSERT INTO jugador VALUES("5","Aurelio","Cacillas","1998-05-05","2","Defensa_der","1","1","1","1");
INSERT INTO jugador VALUES("6","Fabian","Torres","1999-12-25","7","Delantero","1","0","1","0");
INSERT INTO jugador VALUES("7","Marvin.P","Juarez","2004-09-23","3","Defensa_iz","3","0","1","0");
INSERT INTO jugador VALUES("8","Marvin","Neftali","1998-11-10","8","Media","1","1","1","1");
INSERT INTO jugador VALUES("9","Gabriel.A","Ramires","2005-09-08","9","Delantero","1","1","1","1");
INSERT INTO jugador VALUES("10","Kevin.A","Villeda","2001-08-09","15","Portero","1","0","1","0");
INSERT INTO jugador VALUES("11","Ulises","Perez","2005-01-05","7","Delantero","2","0","1","0");
INSERT INTO jugador VALUES("12","Alberto","Simon","1998-11-10","2","Portero","2","0","1","0");
INSERT INTO jugador VALUES("13","Gustabo","Perez","2000-05-19","3","Defensa_der","2","0","1","1");
INSERT INTO jugador VALUES("14","Venjamin","Oledo","2002-06-12","5","Media","2","0","1","1");
INSERT INTO jugador VALUES("15","Fabricio","Corbera","1996-07-01","4","Defensa_iz","2","0","1","1");
INSERT INTO jugador VALUES("16","Hugo Jr","Menjibar","1998-01-09","8","Delantero","2","0","1","1");
INSERT INTO jugador VALUES("17","Elias","Mejia","1998-12-25","4","Defensa_der","3","0","1","0");
INSERT INTO jugador VALUES("18","Alberto","Simon","1999-10-11","7","Delantero","3","0","1","0");
INSERT INTO jugador VALUES("19","Gabriel","Baldemar","1998-10-10","1","Portero","3","0","1","0");
INSERT INTO jugador VALUES("20","Bonifacio","Lopez","1997-10-24","6","Media","3","0","1","0");
INSERT INTO jugador VALUES("21","Trebor","Palacios","2000-12-09","9","Delantero","3","0","1","0");
INSERT INTO jugador VALUES("22","Luis","Velico","2006-07-10","5","Defensa_iz","3","0","1","0");
INSERT INTO jugador VALUES("23","Armando","Guebara","1998-12-25","10","Delantero","4","1","1","1");
INSERT INTO jugador VALUES("24","Diego","Ronaldo","1999-12-25","9","Delantero","4","0","1","0");
INSERT INTO jugador VALUES("25","Anderson","Duran","1999-09-18","1","Portero","4","1","1","1");
INSERT INTO jugador VALUES("26","Geovany","Ramirez","2002-09-19","5","Media","4","1","1","1");
INSERT INTO jugador VALUES("27","David","Lopez","2005-10-21","4","Defensa_iz","4","1","1","1");
INSERT INTO jugador VALUES("28","Edwin","Bolibar","2003-09-10","3","Defensa_der","4","1","1","1");
INSERT INTO jugador VALUES("29","Raymundo","Muñoz","2000-11-22","2","Portero","4","0","1","0");
INSERT INTO jugador VALUES("30","Ernesto","Romero","2004-12-23","1","Portero","5","0","1","0");
INSERT INTO jugador VALUES("31","Antonio","Menjibar","2002-09-24","2","Portero","5","0","1","0");
INSERT INTO jugador VALUES("32","Jonathan","Chavez","2002-09-25","3","Defensa_der","5","0","1","0");
INSERT INTO jugador VALUES("33","Sergio","Carrio","2002-09-26","4","Defensa_iz","5","0","1","0");
INSERT INTO jugador VALUES("34","Augusto","Carpio","2002-09-27","5","Media","5","0","1","0");
INSERT INTO jugador VALUES("35","Pedro","Teylor","2002-09-28","18","Delantero","5","0","1","0");
INSERT INTO jugador VALUES("36","Brandon","Teylor","2002-09-29","9","Delantero","5","0","1","0");
INSERT INTO jugador VALUES("37","Alexis","Gonzales","2002-09-30","1","Portero","6","0","1","0");
INSERT INTO jugador VALUES("38","Nelson","Molina","2002-10-01","2","Portero","6","0","1","0");
INSERT INTO jugador VALUES("39","Jose","Perez","2002-10-02","3","Defensa_der","6","0","1","0");
INSERT INTO jugador VALUES("40","Saul","Dominguez","2002-10-03","4","Defensa_iz","6","0","1","0");
INSERT INTO jugador VALUES("41","Fernando","Lopez","2002-10-04","5","Media","6","0","1","0");
INSERT INTO jugador VALUES("42","Roberto","Furcio","2002-10-05","48","Delantero","6","0","1","0");
INSERT INTO jugador VALUES("43","Rafael","Barahona","2002-10-06","9","Delantero","6","0","1","0");
INSERT INTO jugador VALUES("44","Hernan ","Marvel","2002-10-07","1","Portero","7","0","1","0");
INSERT INTO jugador VALUES("45","Adonay","Muñoz","2002-10-08","2","Portero","7","1","1","1");
INSERT INTO jugador VALUES("46","Ronaldo","Garcia","2002-10-09","3","Defensa_der","7","1","1","1");
INSERT INTO jugador VALUES("47","Cruz","Molina","2002-10-10","4","Defensa_iz","7","1","1","1");
INSERT INTO jugador VALUES("48","Hector","Dominguez","2002-10-11","5","Media","7","1","1","1");
INSERT INTO jugador VALUES("49","Julio.Z","Salazar","2002-10-12","8","Delantero","7","0","1","0");
INSERT INTO jugador VALUES("50","Rene","Martinez","2002-10-13","19","Delantero","7","1","1","1");
INSERT INTO jugador VALUES("51","Cristian","Comayagua","2002-10-14","1","Portero","8","0","1","0");
INSERT INTO jugador VALUES("52","Mauricio","Guevara","2002-10-15","2","Portero","8","0","1","0");
INSERT INTO jugador VALUES("53","Oscar","Marquez","2002-10-16","3","Defensa_der","8","0","1","0");
INSERT INTO jugador VALUES("54","Noelito","Campos","2002-10-17","4","Defensa_iz","8","0","1","0");
INSERT INTO jugador VALUES("55","Franklyn","Lozano","2002-10-18","5","Media","8","0","1","0");
INSERT INTO jugador VALUES("56","Melvin","Lazo","2002-10-19","28","Delantero","8","0","1","0");
INSERT INTO jugador VALUES("57","Wilson","Villalta","2002-10-20","9","Delantero","8","0","1","0");
INSERT INTO jugador VALUES("58","Cesar","Barahona","2002-10-21","17","Media","8","0","1","0");
INSERT INTO jugador VALUES("59","Gerson","Sanchez","2002-10-22","1","Portero","9","0","1","0");
INSERT INTO jugador VALUES("60","Eduardo","Hype","2002-10-23","2","Portero","9","1","1","1");
INSERT INTO jugador VALUES("61","Juan","Flores","2002-10-24","3","Defensa_der","9","1","1","1");
INSERT INTO jugador VALUES("62","Moises","Salazar","2002-10-25","14","Defensa_iz","9","1","1","1");
INSERT INTO jugador VALUES("63","Emanuel","Escoto","2002-10-26","5","Media","9","0","1","0");
INSERT INTO jugador VALUES("64","Oscar","Navarro","2002-10-27","8","Delantero","9","0","1","0");
INSERT INTO jugador VALUES("65","Daniel.V","Ramirez","2002-10-28","19","Delantero","9","1","1","1");
INSERT INTO jugador VALUES("66","Selvin","Alfaro","2002-10-29","37","Media","9","1","1","1");
INSERT INTO jugador VALUES("67","Ricardo","Cortez","2002-10-30","16","Media","7","0","1","0");
INSERT INTO jugador VALUES("68","Antonio","Aparicio","2002-10-31","26","Media","6","0","1","0");



DROP TABLE IF EXISTS partido;

CREATE TABLE `partido` (
  `idpartido` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_partido` datetime NOT NULL,
  `equipoa` int(11) NOT NULL,
  `equipob` int(11) NOT NULL,
  `idarbitroa` varchar(15) NOT NULL,
  `idarbitrob` varchar(15) NOT NULL,
  `idjornada` int(11) NOT NULL,
  `idcancha` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idpartido`),
  KEY `equipoa` (`equipoa`) USING BTREE,
  KEY `equipob` (`equipob`) USING BTREE,
  KEY `idarbitroa` (`idarbitroa`) USING BTREE,
  KEY `idarbitrob` (`idarbitrob`) USING BTREE,
  KEY `idcancha` (`idcancha`) USING BTREE,
  KEY `idjornada` (`idjornada`) USING BTREE,
  CONSTRAINT `partido_ibfk_1` FOREIGN KEY (`idarbitrob`) REFERENCES `arbitro` (`dui`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `partido_ibfk_2` FOREIGN KEY (`idarbitroa`) REFERENCES `arbitro` (`dui`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `partido_ibfk_3` FOREIGN KEY (`idcancha`) REFERENCES `cancha` (`idcancha`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `partido_ibfk_4` FOREIGN KEY (`idjornada`) REFERENCES `jornada` (`idjornada`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `partido_ibfk_5` FOREIGN KEY (`equipoa`) REFERENCES `equipo` (`idequipo`),
  CONSTRAINT `partido_ibfk_6` FOREIGN KEY (`equipob`) REFERENCES `equipo` (`idequipo`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

INSERT INTO partido VALUES("1","2022-01-20 11:00:00","1","9","05839224-4","05839224-4","1","6","0");
INSERT INTO partido VALUES("2","2022-01-20 11:00:00","2","7","09753279-1","09753279-1","1","7","0");
INSERT INTO partido VALUES("3","2022-01-22 11:00:00","9","4","05839224-4","05839224-4","2","6","0");
INSERT INTO partido VALUES("4","2022-01-22 11:00:00","7","4","09753279-1","09753279-1","2","7","0");
INSERT INTO partido VALUES("5","2022-01-23 11:00:00","1","9","05839224-4","05839224-4","3","6","0");
INSERT INTO partido VALUES("6","2022-01-23 11:00:00","2","2","09753279-1","09753279-1","3","7","0");
INSERT INTO partido VALUES("7","2022-01-27 11:00:00","9","4","05839224-4","05839224-4","4","6","0");
INSERT INTO partido VALUES("8","2022-01-27 11:00:00","7","1","09753279-1","09753279-1","4","7","0");
INSERT INTO partido VALUES("9","2022-01-29 11:00:00","9","1","05839224-4","05839224-4","5","6","0");
INSERT INTO partido VALUES("10","2022-01-29 11:00:00","7","2","09753279-1","09753279-1","5","7","0");
INSERT INTO partido VALUES("11","2022-01-30 11:00:00","4","9","05839224-4","05839224-4","6","6","0");
INSERT INTO partido VALUES("12","2022-01-30 11:00:00","4","7","09753279-1","09753279-1","6","7","0");
INSERT INTO partido VALUES("13","2022-02-03 11:00:00","9","1","05839224-4","05839224-4","7","6","0");
INSERT INTO partido VALUES("14","2022-02-03 11:00:00","2","2","09753279-1","09753279-1","7","7","0");
INSERT INTO partido VALUES("15","2022-02-05 11:00:00","4","9","05839224-4","05839224-4","8","6","0");
INSERT INTO partido VALUES("16","2022-02-05 11:00:00","1","7","09753279-1","09753279-1","8","7","0");
INSERT INTO partido VALUES("30","2022-01-29 02:00:00","1","9","05839224-4","05839224-4","14","6","0");
INSERT INTO partido VALUES("31","2022-01-29 02:00:00","4","7","09753279-1","09753279-1","14","7","0");
INSERT INTO partido VALUES("32","2022-01-29 03:00:00","1","4","05839224-4","05839224-4","15","6","0");



DROP TABLE IF EXISTS representante;

CREATE TABLE `representante` (
  `dui` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`dui`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO representante VALUES("05762482-1","Diego Ronaldo","Garcia Carpio","Masculino","1998-05-24","7654-7855","1");
INSERT INTO representante VALUES("05788477-2","Marvin David","De Paz Juarez","Masculino","1978-09-23","4593-9824","1");
INSERT INTO representante VALUES("05813820-5","Kevin Elias","Mejia Martinez","Masculino","1998-12-25","7420-5755","1");
INSERT INTO representante VALUES("05899088-5","Marvin Neftaly","Cruz Paz","Masculino","1999-06-18","6574-8832","1");



DROP TABLE IF EXISTS torneo;

CREATE TABLE `torneo` (
  `idtorneo` int(11) NOT NULL AUTO_INCREMENT,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idtorneo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO torneo VALUES("1","1");



DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idempleado` varchar(15) DEFAULT NULL,
  `idrepresentante` varchar(15) DEFAULT NULL,
  `tipo` varchar(15) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `imagen` longblob DEFAULT NULL,
  `codigore` varchar(15) DEFAULT NULL,
  `nuevo` tinyint(1) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `idpropietario` (`idempleado`),
  KEY `idrepresentante` (`idrepresentante`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`dui`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idrepresentante`) REFERENCES `representante` (`dui`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario VALUES("90","05813820-1","","administrador","canechoplayerwar@gmail.com","administrador","TVUxd1pHaHlnMzdGcE5aMG5kNFptZz09","","","0");
INSERT INTO usuario VALUES("91","","05813820-5","usuario","kevineliasmejia@gmail.com","kevineliasmejia@gmail.com","TVUxd1pHaHlnMzdGcE5aMG5kNFptZz09","","","1");
INSERT INTO usuario VALUES("92","","05762482-1","usuario","20carpioronaldo@gmail.com","20carpioronaldo@gmail.com","cWZIZG41S0Ywb2pLNlloRUVKdzBlQT09","","","1");
INSERT INTO usuario VALUES("93","","05899088-5","usuario","gemelascruzpaz@gmail.com","gemelascruzpaz@gmail.com","QWtnS1Y3dCtWNnN0MHo1SGZQVE93Zz09","","","0");
INSERT INTO usuario VALUES("94","","05788477-2","usuario","marvin.david93@gmail.com","marvin.david93@gmail.com","elhhajlJUERXK2dvd3JLNTMxOXlsQT09","","","0");



SET FOREIGN_KEY_CHECKS=1;