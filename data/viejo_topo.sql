-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2017 a las 23:36:07
-- Versión del servidor: 5.6.34
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viejo_topo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_cat` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `imag_category` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `url_category` varchar(200) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `name_cat`, `date`, `imag_category`, `description`, `url_category`, `status`) VALUES
(4, 'CRÓNICAS', '2017-10-19', '1508466661811.jpg', 'Sucesos de la política y de las batallas diarias, reconstruidas en clave narrativa.', 'cronicas', 1),
(5, 'REPORTAJES', '2017-10-17', '1508466783988.jpg', 'Documentando las patrañas del establisment mediático e intelectual, o visibilizando lo que nos ocultan.', 'reportajes', 1),
(6, 'MUNDO', '2017-10-17', '1508466820177.jpg', 'Notas y artículos para describir y explicar el mundo en que vivimos y para actuar en él.', 'mundo', 1),
(7, 'ECOLOGÍA', '2017-10-17', '1508466854300.png', 'La Madre Tierra o Casa Común está siendo destruida por el capitalismo.', 'ecologia', 1),
(8, 'SOCIAL', '2017-10-17', '1508466890739.jpg', 'El ascenso del movimiento social peruano en escena, y su perspectiva.', 'social', 1),
(10, 'SOBERANÍA', '2017-10-19', '1508466941737.jpg', 'Nos han robado el país y se lo han repartido. ¿Qué hacer?', 'soberania', 1),
(11, 'LITERATURA', '2017-10-19', '1508466978846.jpg', 'Las obras que se están creando ahora -a contracorriente-, la crítica y la reflexión teórica.', 'literatura', 0),
(12, 'ECONOMÍA', '2017-10-19', '1508467019574.jpg', 'La actividad productiva, comercial y financiera, y sus conflictos interiores.', 'economia', 1),
(13, 'TECNOLOGÍA', '2017-10-12', 'tecnologia.jpg', 'Technology', 'tecnologia', 1),
(14, 'FILOSOFÍA', '2017-10-12', 'Filosofia.jpg', '', 'filosofia', 1),
(15, 'ARTE', '2017-11-07', 'Arte.jpg', '', 'arte', 1),
(16, 'CIENCIAS', '2017-11-07', 'Ciencias.jpg', '', 'ciencias', 1),
(18, 'POLÍTICA', '2017-11-10', 'politica.jpg', '', 'politica', 1),
(19, 'HISTORIA', '2017-11-14', 'Historia.jpg', 'la historia del peru es una de las mejores cosas del peru\r\nhola mundo como estan', 'historia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'Grupo_1', ''),
(4, 'Grupo_2', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', 'admin', 1512661856),
(2, '::1', 'admin', 1512661862);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(11) NOT NULL,
  `name_logo` varchar(50) DEFAULT NULL,
  `imag_logo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus_bottom`
--

CREATE TABLE `menus_bottom` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menus_bottom`
--

INSERT INTO `menus_bottom` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `status`) VALUES
(1, NULL, 'POLÍTICA', '', 'categoria/politica', 1, '1'),
(3, NULL, 'ECONOMÍA', '', 'categoria/economia', 3, '1'),
(4, NULL, 'SOBERANÍA', '', 'categoria/soberania', 4, '1'),
(6, NULL, 'MUNDO', '', 'categoria/mundo', 6, '1'),
(18, NULL, 'SOCIAL', '', 'categoria/social', 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus_top`
--

CREATE TABLE `menus_top` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menus_top`
--

INSERT INTO `menus_top` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `status`) VALUES
(1, NULL, 'CRÓNICAS', '', 'categoria/cronicas', 1, '1'),
(2, NULL, 'REPORTAJES', '', 'categoria/reportajes', 2, '1'),
(3, NULL, 'ARTE', '', 'categoria/arte', 3, '1'),
(4, NULL, 'LITERATURA', '', 'categoria/literatura', 4, '1'),
(5, NULL, 'HISTORIA', '', 'categoria/historia', 8, '1'),
(6, NULL, 'TECNOLOGÍA', '', 'categoria/tecnologia', 6, '1'),
(7, NULL, 'ECOLOGÍA', '', 'categoria/ecologia', 7, '1'),
(18, NULL, 'CIENCIAS', '', 'categoria/ciencias', 5, '1'),
(19, NULL, 'FILOSOFÍA', '', 'categoria/filosofia', 10, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `redaction` varchar(45) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `imag_news` varchar(50) DEFAULT NULL,
  `description_short` text NOT NULL,
  `description_full` text,
  `url_news` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id_news`, `redaction`, `title`, `date`, `imag_news`, `description_short`, `description_full`, `url_news`, `category`, `status`) VALUES
(1, 'Vanezza Ccora', 'Kenji Fujimori: "Tras esta posible expulsión hay quienes no quieren ver a mi padre libre"', '2017-09-19', '1507060325431.jpg', 'El congresista Kenji Fujimori, actualmente suspendido de su bancada, será sometido a un nuevo proceso disciplinario', 'El actual portero del Tiburones del Veracruz volvió a la titularidad en la blanquirroja tras haber estado ausente ante Bolivia y Ecuador por una lesión sufrida con su club en la liga mexicana.\r\n\r\nSin embargo, Ricardo Gareca apostó por su recuperación y demostró un gran nivel en un partido difícil ante la Argentina de Messi, Di María y Mascherano.\r\n\r\nMister Chip incluso bromeó con la posibilidad de que el Papa Francisco lo beatifique por las salvadas que hizo en su portería ante el poderoso ataque argentino.\r\n\r\nComo es recordado, la vuelta de Gallese a la selección recibió todo tipo de comentarios, no solo de la prensa peruana, quien dio mucho apoyo al ex portero de la Universidad San Martín y Juan Aurich, sino también en los medios argentinos. No obstante, el periodista argentino Horacio Pagani quien tuvo comentarios desafortunados hacia el jugador peruano.\r\n\r\nPerú empató con Argentina y buscará vencer a Colombia en la última fecha para sellar su pase al Mundial de Rusia 2018.', 'female_229', 'TECNOLOGÍA', 1),
(2, 'Vanezza Ccora', 'Juez del Caso Ecoteva: "EE.UU. no acepta arrestos con fines de extradición"', '2017-10-03', '1507014055272.jpg', 'Las URLs amigables es una técnica muy común en la optimización del SEO de una web. Las URLs amigables contienen palabras clave relacionadas con el contenido de la página, y ayudan mejorar tu ranking en los distintos motores de búsqueda. Pongamos un ejemplo, esto sería una URL normal y una amigable:', 'En entrevista con el programa "Todo se sabe" de RPP, el magistrado negó ser el responsable del retraso de la solicitud a las autoridades estadounidense y afirmó que la justicia de EE.UU. no acepta este tipo de arrestos previos, sino cuando ya se trata de una extradición.\r\n\r\n"Estados Unidos no acepta arresto provisorio con fines de extradición, es excepcional que lo acepten. Hay que llevar un caso bien hecho", dijo el juez Concha.\r\n\r\n"Lo único que hago mediante mi intervención como juez es advertirle a la fiscalía que su pedido debería de contener tal o cual cosa, pero no las ordeno. Tengo que tener mucho cuidado [antes de mandar el pedido]. El honor del Perú está en juego", agregó.\r\n\r\nDe acuerdo a documentos a los que tuvo acceso El Comercio, el juez sustentó esa decisión aduciendo que –mediante una serie de escritos– la fiscal de lavado de activos Manuela Villar señaló que no ha podido determinar la ruta del dinero ilegal que salió de las ‘offshores’ del empresario peruano-israelí Josef Maiman hacia la empresa Confiado International Corp., cuyo fin fueron las arcas de Ecoteva Consulting Group.', 'juez-del-caso-ecoteva-eeuu-no-acepta-arrestos-con-fines-de-extradicion', 'TECNOLOGÍA', 1),
(6, 'Juan Torres', 'El animal \'más feo\' del mundo en realidad no es tan feo', '2017-10-14', '1507991930349.jpg', 'Injustamente, el pez borrón [Psychrolutes marcidus], o blobfish, es conocido como el \'animal más feo\' de la naturaleza. Pero la fotografía con la que se hizo viral en Internet hace algunos años no muestra su \'mejor ángulo\'. De hecho, la verdadera apariencia de esta especie es muy diferente cuando se encuentra en su hábitat natural, donde la presión del agua \'arregla\' su rostro y cuerpo deforme.', 'Injustamente, el pez borrón [Psychrolutes marcidus], o blobfish, es conocido como el \'animal más feo\' de la naturaleza. Pero la fotografía con la que se hizo viral en Internet hace algunos años no muestra su \'mejor ángulo\'. De hecho, la verdadera apariencia de esta especie es muy diferente cuando se encuentra en su hábitat natural, donde la presión del agua \'arregla\' su rostro y cuerpo deforme.\r\n\r\nEl pez borrón vive en las profundidades del mar entre las costas de Australia y Tasmania, entre 600 y 1.200 metros de profundidad, donde la presión del agua es 120 veces superior a la del nivel de la superficie. Puede vivir allí porque su cuerpo es gelatinoso ya que carece de esqueleto. Es como un pez cualquiera, mientras está en su \'hogar\', pues al salir de los abismos oceánicos su apariencia cambia a medida que la presión disminuye.', 'el-animal-mas-feo-del-mundo-en-realidad-no-es-tan-feo', 'TECNOLOGÍA', 1),
(7, 'Vanezza Ccora', 'Desmienten mitos sobre el huevo: ¿La yema incrementa el colesterol?', '2017-10-14', '1507992306601.jpg', 'La salmonella es una bacteria que puede estar presente en la superficie del huevo, provocando diarreas. Por eso conviene cocinar el huevo a más de 60°c.', 'La salmonella es una bacteria que puede estar presente en la superficie del huevo, provocando diarreas. Por eso conviene cocinar el huevo a más de 60°c.\r\n\r\nSe debe lavar los huevos antes de guardarlos en el refrigerador: FALSO\r\n\r\nEs aconsejable hacerlo inmediatamente antes de utilizarlos, limpiándolos con agua sobre la cáscara y secándolos. Si la cáscara está rota, evitar su consumo.\r\n\r\nLos huevos de color son más nutritivos que los blancos: FALSO\r\n\r\nEl color de los huevos no influye en su valor nutritivo ni en su calidad.\r\n\r\n¿Cuántos huevos puedo consumir?\r\n\r\nLos nutricionistas del Instituto Nacional de Salud recomiendan consumir un huevo al día, de preferencia comerlos cocidos o escalfados. Es de fácil digestión y lo puede comer un niño a partir de los 6 meses hasta los adultos mayores.', 'desmienten-mitos-sobre-el-huevo-la-yema-incrementa-el-colesterol', 'TECNOLOGÍA', 1),
(8, 'Juan Torres', 'Lanzan sistema que estudiará la fotosíntesis desde el espacio', '2017-10-14', '1507992454011.jpg', 'Investigadores de la Universidad de Sydney y de la Agencia Espacial de EEUU (NASA) desarrollaron una nueva y revolucionaria técnica para analizar la fotosíntesis de las plantas mediante sensores remotos ubicados en satélites, con aplicaciones potenciales para la vigilancia del cambio climático.', 'Investigadores de la Universidad de Sydney y de la Agencia Espacial de EEUU (NASA) desarrollaron una nueva y revolucionaria técnica para analizar la fotosíntesis de las plantas mediante sensores remotos ubicados en satélites, con aplicaciones potenciales para la vigilancia del cambio climático.\r\n\r\nLa absorción de dióxido de carbono por las hojas y su conversión a azúcares mediante la fotosíntesis, denominada producción primaria bruta (GPP), es la base fundamental de la vida en la Tierra y su cuantificación es vital para la investigación sobre la dinámica del ciclo del carbono terrestre.', 'lanzan-sistema-que-estudiara-la-fotosintesis-desde-el-espacio', 'TECNOLOGÍA', 1),
(9, 'Juan Torres', '¿Cómo la investigación está ayudando a combatir el cáncer y las enfermedades digestivas?', '2017-10-13', '1507992550394.jpg', 'La medicina se encuentra en una constante carrera por reducir las alarmantes tasas de mortalidad de enfermedades gastrointestinales complejas. Según las últimas estimaciones de la Organización Mundial de la Salud (OMS), 788.000 personas fallecieron de cáncer de hígado, 774.000 por cáncer de colon y recto, y 753.600 por cáncer de estómago. Estos tumores digestivos son los que acaban con más vidas luego de las neoplasias respiratorias. ', 'La medicina se encuentra en una constante carrera por reducir las alarmantes tasas de mortalidad de enfermedades gastrointestinales complejas. Según las últimas estimaciones de la Organización Mundial de la Salud (OMS), 788.000 personas fallecieron de cáncer de hígado, 774.000 por cáncer de colon y recto, y 753.600 por cáncer de estómago. Estos tumores digestivos son los que acaban con más vidas luego de las neoplasias respiratorias. \r\n\r\nEl doctor Miguel Muñoz Navas, Director del Departamento Digestivo de la Clínica de la Universidad de Navarra (España), señala que, con la detección temprana del cáncer de colon, el 90% de los pacientes pueda recibir un tratamiento exitoso y destaca a la colonoscopia como prueba fundamental para el diagnóstico.', 'como-la-investigacion-esta-ayudando-a-combatir-el-cancer-y-las-enfermedades-digestivas', 'TECNOLOGÍA', 1),
(10, 'Juan Torres', 'Keiko: Anotación de Odebrecht fue "un plan, una intención"', '2017-10-14', '1507992639133.jpg', 'En la primera parte de su presentación ante la Comisión Lava Jato, Keiko Fujimori explicó su interpretación de la anotación hallada en el celular de Marcelo Odebrecht: “Aumentar Keiko para 500 e eu fazer visita”.', 'En la primera parte de su presentación ante la Comisión Lava Jato, Keiko Fujimori explicó su interpretación de la anotación hallada en el celular de Marcelo Odebrecht: “Aumentar Keiko para 500 e eu fazer visita”.\r\n\r\n“En esa anotación, claramente se ve como un plan, una intención. Dice aumentar a Keiko 500 y yo haré visita. Quiero señalar claramente que quien habla ni el partido Fuerza Popular ha recibido dinero alguno de Marcelo Odebrecht ni de ningún funcionario de su empresa ni de ninguna empresa brasileña”, explicó ante la consulta del congresista de Acción Popular, Víctor Andrés García Belaunde.', 'keiko-anotacion-de-odebrecht-fue-un-plan-una-intencion', 'TECNOLOGÍA', 1),
(11, 'Vanezza Ccora', 'Países a favor y en contra de la postura de Trump sobre Irán', '2017-10-14', '1507992717675.jpg', 'Arabia Saudita e Israel se han pronunciado a favor de la estrategia de Trump. El primer ministro israelí, Benjamin Netanyahu, saludó el viernes la "valiente decisión" del presidente estadounidense.\r\n', 'Arabia Saudita e Israel se han pronunciado a favor de la estrategia de Trump. El primer ministro israelí, Benjamin Netanyahu, saludó el viernes la "valiente decisión" del presidente estadounidense.\r\n\r\n"Felicito al presidente Trump por su valiente decisión de enfrentarse al régimen terrorista iraní" afirmó Netanyahu en un video difundido en inglés poco después del discurso del mandatario estadounidense. \r\n\r\nPor su parte, Arabia Saudí también se unió a apoyar la "estrategia firme" del jefe de Estado.\r\n\r\n"Arabia Saudí apoya y saluda la estrategia firme proclamada por el presidente Donald Trump respecto a Irán y su política agresiva", afirmó el gobierno en un comunicado al que tuvo acceso la AFP.\r\n\r\nEl Ministerio de Asuntos Exteriores de Emiratos Árabes Unidos ha cuestionado si el pacto nuclear fue lo que hizo que Teherán "intensifique su comportamiento provocador y desestabilizador". \r\n\r\nSegún el comunicado, Washington toma las medidas "necesarias para hacer frente al mal comportamiento de Irán", en particular, el desarrollo del programa de misiles balísticos.', 'paises-a-favor-y-en-contra-de-la-postura-de-trump-sobre-iran', 'TECNOLOGÍA', 1),
(12, 'Vanezza Ccora', 'El Estado Islámico afronta una inminente derrota en Raqqa', '2017-10-14', '1507992790595.jpg', '"Alrededor del 85 por ciento de Raqqa ya ha sido liberado del Estado Islámico", aseguró.', '"En las últimas 24 horas, aproximadamente unos 100 terroristas del Estado Islámico se rindieron en Raqqa y fueron expulsados de la ciudad", indicó en una conversación por internet el portavoz de la coalición liderada por EE.UU. y que apoya a las Fuerzas de Siria Democrática (FSD), alianza liderada por kurdos, en la ofensiva para expulsar al Estado Islámico de la urbe.\r\n\r\n"Alrededor del 85 por ciento de Raqqa ya ha sido liberado del Estado Islámico", aseguró.\r\n\r\nLas FSD continúan, según la coalición, "realizando constantes progresos para derrotar al Estado Islámico dentro y en los alrededores de Raqqa y evacuando a los civiles atrapados en la ciudad".\r\n\r\nAñadió que alrededor de 1.500 civiles han sido rescatados "de manera segura" por las FSD en la última semana.', 'el-estado-islamico-afronta-una-inminente-derrota-en-raqqa', 'TECNOLOGÍA', 1),
(13, 'Juan Torres', 'Maritza García culpa a congresistas de Nuevo Perú por su situación', '2017-10-14', '1508005357828.jpg', '“Están desesperados y ese es el fondo del asunto. Precisamente, ellos son los que han sacado el audio de mi participación del 4 de octubre. Presumo que hay cierta desesperación por recuperar la presidencia de la Comisión de la Mujer”, dijo Maritza García a "Correo".', '“Están desesperados y ese es el fondo del asunto. Precisamente, ellos son los que han sacado el audio de mi participación del 4 de octubre. Presumo que hay cierta desesperación por recuperar la presidencia de la Comisión de la Mujer”, dijo Maritza García a "Correo".\r\n\r\nVale apuntar que, antes de dividirse, la bancada del Frente Amplio presidía la comisión a través de la parlamentaria Indira Huilca. \r\n\r\nAsimismo, según indicó García, algunas parlamentarias de Nuevo Perú no están habituadas a su forma de trabajo de “proteger a la familia en su conjunto” y que siempre “quieren abordar siempre sus temas, que son igualdad de género”.\r\n\r\n“Si bien ha habido una tergiversación en mi versión, siempre he dicho que hay que proteger a la familia en su conjunto. Parece que este tipo de labor les causa extrañeza a algunas personas”, detalló Maritza García.', 'maritza-garcia-culpa-a-congresistas-de-nuevo-peru-por-su-situacion', 'LITERATURA', 1),
(14, 'Juan Torres', 'Bartra: “Esperamos que el Ejecutivo no sea obstruccionista”', '2017-10-10', '1508023412590.jpg', 'En-esa-línea-la-legisladora-fujimorista-criticó-que-el-mandatario-aún-no-responda-a-la-primera-invitación-ni-a-la-carta-de-reiteración-enviada-a-fin-de-que-reciba-a-la-comisión-en-Palacio-de-', 'En-esa-línea-la-legisladora-fujimorista-criticó-que-el-mandatario-aún-no-responda-a-la-primera-invitación-ni-a-la-carta-de-reiteración-enviada-a-fin-de-que-reciba-a-la-comisión-en-Palacio-de-Gobierno-Cabe-recordar-sin-embargo-que-Kuczynski-ha-manifestado-que-no-se-reunirá-con-el-grupo-parlamentario-porque-no-está-obligado-no-tiene-absolutamente-nada-que-ver-con-los-cuestionamientos-y-además-afirmó-que-no-se-prestará-a-un-circoAhora-lo-que-esperamos-es-que-más-bien-el-Ejecutivo-no-sea-obstruccionista-de-la-labor-del-Congreso-y-permita-aconsejando-bien-al-presidente-Kuczynski-que-colabore-y-dé-el-ejemplo-señaló-Rosa-Bartra', 'bartra-esperamos-que-el-ejecutivo-no-sea-obstruccionista', 'POLÍTICA', 1),
(15, NULL, 'Abogado de Alan García presentó queja contra fiscal José Castellanos', '2017-10-14', '1508023726137.jpg', '“Hemos presentado una queja contra el fiscal, porque consideramos que ha incumplido una serie de normas constitucionales, deberes y funciones que le genera la ley de la carrera fiscal y que tiene su correlato con faltas graves y muy graves”, contó a “Perú 21”.', '“Hemos presentado una queja contra el fiscal, porque consideramos que ha incumplido una serie de normas constitucionales, deberes y funciones que le genera la ley de la carrera fiscal y que tiene su correlato con faltas graves y muy graves”, contó a “Perú 21”.\r\n\r\nHace unos días, José Castellanos, titular de la Primera Fiscalía Corporativa Especializada en Lavado de Activos, determinó adecuar la investigación al ex líder aprista, a su ex esposa Pilar Nores y a otros ex funcionarios de su segundo gobierno basándose en la Ley de Crimen Organizado, que le permite extender la pesquisa por 36 meses.\r\n\r\nSegún Erasmo Reyna, el fiscal habría incurrido en faltas graves y muy graves al “haber comparado al ex presidente Alan García como jefe de una organización criminal como la de la Camorra (Italia)”.', 'abogado-de-alan-garcia-presento-queja-contra-fiscal-jose-castellanos', 'SOCIAL', 1),
(16, 'Richard Diego', 'Video: así reconoció Barata pago de sobornos por el metro de Lima', '2017-10-16', '1512771063635.jpg', 'Un video revelado recientemente por "IDL-Reporteros" y reproducido esta noche en el programa "Cuarto Poder" muestran por primera vez a Jorge Barata, ex jefe de Odebrecht en Perú, reconociendo cómo fue el pago de sobornos por la concesión del Metro de Lima.', 'Un video revelado recientemente por "IDL-Reporteros" y reproducido esta noche en el programa "Cuarto Poder" muestran por primera vez a Jorge Barata, ex jefe de Odebrecht en Perú, reconociendo cómo fue el pago de sobornos por la concesión del Metro de Lima.\r\n\r\nLas imágenes son del 15 diciembre del 2016. En ellas, Jorge Barata testifica en el marco de la colaboración eficaz que Odebrecht firmó con la justicia brasileña. Barata cuenta, entre otras cosas, cómo se acordó el pago ilícito con los funcionarios públicos peruanos.     \r\n\r\nLos sobornos por este proyecto, hecho durante el segundo gobierno aprista, ascendieron los 8 millones de dólares y tienen como principales procesados al ex viceministro Jorge Cuba Hidalgo y el integrante del comité de selección Edwin Luyo Barrientos.', 'video-asi-reconocio-barata-pago-de-sobornos-por-el-metro-de-lima', 'HISTORIA', 1),
(17, 'Juan Torres', '¿Cómo juega Nueva', '2017-10-16', '1508159857723.jpg', 'Es gratis alegrarse. Gratis y fácil. Sencillo ponerse feliz porque habrá más días de fiesta, más ganas de ir al trabajo (y de salir para ver los partidos), más niños jugando con su camiseta puesta. ¿Qué otra cosa insignificante nos ha puesto así antes?', 'Es gratis alegrarse. Gratis y fácil. Sencillo ponerse feliz porque habrá más días de fiesta, más ganas de ir al trabajo (y de salir para ver los partidos), más niños jugando con su camiseta puesta. ¿Qué otra cosa insignificante nos ha puesto así antes? ¿Cuándo ha sido la última vez que estuvo de moda cantar el Himno? Herencia milenaria o espíritu de hater, hay una sensación incrédula y fea que podríamos desterrar ya, ahora que falta tan poco para armar la maleta. Hazte el favor de sonreír para que salgas bien en el selfie: Perú consiguió el quinto puesto en la Eliminatoria a Rusia 2018 después de empatar 1-1 con Colombia, después de ser por meses el ÚLTIMO de la tabla y con eso, hazaña imposible, la resurrección: tener vida para jugar el repechaje. Poder respirar. Eso que parece poco –y que ha costado 32 años, aquella vez que peleamos por ir al Mundial de México y no se pudo– es una noticia enorme para un equipo al que le sobraban enemigos al inicio del proceso. Que no cuesta millones.', 'como-juega-nueva', 'CRÓNICAS', 1),
(18, NULL, '¿How ñato conávert Foóreign chars on Code Igniter?', '2017-10-16', '1508166247949.jpg', 'First, load the Text Helper, or you can put it on autoload config.', 'For example if you use slug on your vietnamese language on url you will get “Disallowed Character” error. Another case if you are working with payment gateway, unfortunately they don’t accept charset except UTF-8, eg : The famous PayPal and others.\r\n\r\nEnough talks, here i show you how.\r\n\r\nFirst, load the Text Helper, or you can put it on autoload config.\r\n\r\n$this->load->helper(\'text\');\r\n\r\nAfter the helper is loaded then here is how you use it. Simply just call this method to convert it.\r\n\r\n$string = convert_accented_characters($string);\r\n\r\nYou can add the character mapping on foreign_chars.php under config directory. Here is the example.', 'how-nato-conavert-fooreign-chars-on-code-igniter', 'CIENCIAS', 1),
(19, 'Juan Torres', 'Galarreta crítica a ONG que no exigen a terroristas pedir perdón', '2017-10-16', '1508175845189.jpg', 'El presidente del Congreso, Luis Galarreta, criticó hoy a las ONG de derechos humanos que no le exigen a los condenados por terrorismo- como la senderista Martha Huatay, que saldrá en libertad en las próximas horas- pedir perdón por sus delitos, pero que sí lo hagan con otros, en aparente referencia al ex mandatario Alberto Fujimori.', '“Claro que hay un montón de ONG que piden que otros pidan perdón, pero a los terroristas nunca les van a pedir que pidan perdón”, manifestó en conferencia de prensa.\r\n\r\nGalarreta también cuestionó que Huatay, ex jefa de Socorro Popular, tenga dinero para pagar mensualmente una cuota al Colegio de Abogados de Lima (CAL), pero no para cumplir con la reparación civil que le adeuda al Estado. La justicia les impuso a ella y a otros 11 miembros de la cúpula senderista el pago solidario de S/3.700 millones.\r\n\r\nEl fujimorista afirmó que la Comisión de Justicia del Parlamento debe analizar esta situación y establecer si hay algún tipo de vacío en la normativa actual.\r\n\r\n“Hay que ver si sale y no va a pagar, si sale y va a estar al día en alguna asociación, como el Colegio de Abogados, pero no le paga la reparación civil que le adeuda al Estado, es un tema importante e interesante para que la Comisión de Justicia lo evalúe y establezca dónde está el vacío y dónde se puede mejorar”, manifestó.', 'galarreta-cr', 'ECOLOGÍA', 1),
(20, 'Juan Torres', 'Teste es mi Titulo de prueba ñumero ??', '2017-10-16', '1508176852414.jpg', 'Stack Overflow en español es un sitio de preguntas y respuestas para programadores y profesionales de la informática. Únete a ellos; toma menos de un minuto: ', 'Luis Galarreta aclaró que nadie puede permanecer en prisión por una deuda, pero sí indicó que se pueden incorporar mecanismos para que las reparaciones sean saldadas.\r\n\r\nEl presidente del Parlamento, además, exhortó a los jóvenes abogados a agruparse en asociaciones que defiendan a las víctimas del terrorismo, así como hay ONG que representan a los subversivos.\r\n\r\nAgregó que ese sería el mejor homenaje que le pueden hacer los héroes de la democracia, entre ellos los policías que capturaron al cabecilla terrorista Abimael Guzmán y los comandos de la operación Chavín de Huántar. ', 'teste-es-mi-titulo-de-prueba', 'ECOLOGÍA', 1),
(21, 'Juan Torres', '¿Por qué Martha Huatay está habilitada para ejercer como abogada?', '2017-10-16', '1508177214098.jpg', 'La condenada por terrorismo Martha Huatay Ruiz aparece como habilitada para desempeñarse en su profesión como abogada, según indica el sitio web del Colegio de Abogados de Lima (CAL).', 'En diálogo con El Comercio, el decano del CAL, Pedro Angulo, confirmó que Martha Huatay "aparece como habilitada" y que esa condición "le sirve a ella para ejercer como abogada".\r\n\r\nAngulo Arana explicó que el CAL "sanciona a un abogado cuando este hace un ejercicio indebido de la profesión, es decir, cuando traiciona a su cliente". Cuando ello ocurre, se hace un proceso y se le castiga, pero indicó que "las sanciones generalmente son multas y suspensiones, es muy raro que haya una expulsión".\r\n\r\nEn esa medida, el decano del CAL señaló que puede haber una inhabilitación permanente cuando un abogado es condenado por un delito relacionado directamente con el ejercicio de su profesión.\r\n\r\n"[Cuando] el delito tuvo que ver directamente con su profesión o cuando se ha mal utilizado lo que aprendieron en su condición de abogados, sí puede haber otra medida", añadió.', 'por-qu', 'ECONOMÍA', 1),
(22, NULL, '¿Hacia dónde va la inteligencia artificial en los negocios?', '2017-10-16', '1508177454025.jpg', 'La Inteligencia Artificial se ha convertido en un elemento clave para mejorar la experiencia de los consumidores.', 'Hace un par de meses dos pesos pesados del mundo de la tecnología se enfrentaron por el uso que se le da a la inteligencia artificial. Por un lado, Elon Musk, CEO de Tesla, afirmó que Mark Zuckerberg posee un conocimiento limitado de la Inteligencia Artificial (AI). “Su visión es apocalíptica”, respondió desde la otra esquina el CEO de Facebook. La controversia comenzó porque Musk aseguró que el desarrollo de esta tecnología podría ser inmanejable. Entre los principales riesgos, Musk identifica el desempleo masivo y la desestabilización social.\r\nZuckerberg, en cambio, asegura que se debe ser optimista respecto de la AI y su potencial para curar enfermedades o mejorar la conducción de automóviles, en un mundo en el que los robots inteligentes nos facilitarán la vida. Sin embargo, poco contribuyó con la defensa cerrada de Zuckerberg el hecho de que, días antes de su declaración, se difundiera la noticia de que Facebook desconectó a dos chatbots –de nombres Bob y Alice- porque habrían desarrollado un lenguaje propio, que les permitía comunicarse sin que sus entrenadores pudieran entender la interacción.', 'hacia-donde-va-la-inteligencia-artificial-en-los-negocios', 'ECOLOGÍA', 1),
(23, 'Juan Torres', 'CADE Ejecutivos 2017: ¿Qué novedades traerá la nueva edición?', '2017-10-16', '1508177737175.jpg', 'CADE Ejecutivos se llevará a cabo del 29 de noviembre al 1 de diciembre. Además de la participación de importantes analistas internacionales, destaca sobre todo el fuerte peso de representantes de IPAE como organizador del evento.', 'Drago Kisic Wagner, miembro del directorio del Banco Central de Reserva (BCR), asiste a CADE Ejecutivos desde hace décadas, en las épocas cuando sus intereses se inclinaban más por la política que por el sector privado. Sin embargo, en los últimos años, el destacado economista ha mantenido su interés en estos dos rubros, no solo fundando un partido político, sino integrando Macroconsult, una de las más importantes consultoras en temas de negocios. Quizá por ese motivo, por esa certeza que posee que la economía exige una dirección política clara ha bautizado como presidente del comité organizador de CADE Ejecutivos 2017 “Un solo Perú, no más cuerdas separadas, desterrando esa vieja creencia de que política y economía van por canales diferentes.\r\nEn ese sentido, según Kisic, no existen países que hayan salido en el largo plazo del subdesarrollo exclusivamente basados en sus políticas económicas. Por el contrario, las economías más sólidas atravesaron profundas reformas institucionales, que exigieron apagar el famoso botón del piloto automático, que consiste en poner en orden la economía para beneficiarse del libre mercado. Sin embargo, cuando el contexto externo es desfavorable, como ahora, salen a relucir la falta de reformas que vayan más allá de la economía, en materia de educación, justicia, barreras burocráticas, reforma electoral, entre otros aspectos clave. Para Kisic, economía y política no deben ir más por cuerdas separadas, como pensaban equivocadamente muchos.', 'cade-ejecutivos-2017-que-novedades-traera-la-nueva-edicion', 'MUNDO', 1),
(24, 'Juan Torres', 'PPK sobre Alberto Fujimori: “Se están analizando los procedimientos”', '2017-11-05', '1509860074837.JPG', 'El presidente Pedro Pablo Kuczynski (PPK) volvió a referirse esta mañana a la situación del ex presidente Alberto Fujimori, quien cumple 25 años de prisión por las matanzas de Barrios Altos y La Cantuta. Ello, luego de que en la víspera, durante su discurso en el XVIII Foro Iberoamérica en Argentina, indicara que “será noticia en algún momento”.\r\n\r\n', 'Comercio)\r\nRedacción EC\r\n04.11.2017 / 10:08 am\r\nEl presidente Pedro Pablo Kuczynski (PPK) volvió a referirse esta mañana a la situación del ex presidente Alberto Fujimori, quien cumple 25 años de prisión por las matanzas de Barrios Altos y La Cantuta. Ello, luego de que en la víspera, durante su discurso en el XVIII Foro Iberoamérica en Argentina, indicara que “será noticia en algún momento”.\r\n\r\nConsultado en RPP por qué habló del tema, indicó que durante el evento alguien le hizo la pregunta antes de dar su discurso. Asimismo, insistió en que “se está analizando, ya veremos qué pasa”.\r\n\r\n“Lo que se está analizando son los procedimientos. La Constitución, en el artículo 117 [sic.], es clarísima. Pero hay procedimientos. La Constitución es una Carta Magna y hay leyes, decretos que luego implementan las cosas”, expresó tras insistir en que es un tema médico y no legal.\r\n\r\nCabe precisar que es el artículo 118 de la Constitución el que señala que, entre otras cosas, corresponde al presidente de la República: “Conceder indultos y conmutar penas. Ejercer el derecho de gracia en beneficio de los procesados en los casos en que la etapa de instrucción haya excedido el doble de su plazo más su ampliatoria”. \r\n\r\n<br>\r\n\r\n<a data-flickr-embed="true"  href="https://www.flickr.com/photos/iwonapodlasinska/38054858802/in/gallery-flickr-72157689551418244/" title="say goodbye..."><img src="https://farm5.staticflickr.com/4486/38054858802_e3ab654ce1_z.jpg" width="640" height="427" alt="say goodbye..."></a><script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>\r\n<br>\r\n<iframe width="260"  src="https://www.youtube.com/embed/acHVJLyTa9g" frameborder="0" allowfullscreen></iframe>', 'ppk-sobre-alberto-fujimori-se-estan-analizando-los-procedimientos', 'FILOSOFÍA', 1),
(25, 'joel sotelo', 'peru le gana francia', '2017-12-08', '1512767213778.jpg', 'arriba peruperu campeon\r\ncontigo peru\r\n', 'arriba peruperu campeon\r\ncontigo peru', 'peru-le-gana-francia', 'MUNDO', 1),
(26, 'Richard Diego Ramos', 'Concepción Carhuancho: “Lo único que hago es cumplir con mi deber”', '2017-12-10', '1512948537803.jpg', 'El titular del 1° juzgado de investigación preparatoria nacional Richard Concepción Carhuancho aseveró que lo único que hace es cumplir con su deber y que toda decisión judicial dictaminada por su persona es apelable.', '“Si solamente lo único que hago es cumplir con mi deber. Nada más. Cumplir con mi deber muy ajustado a ley, y como se dice, toda decisión mía no es definitiva y puede ser apelada ante instancias superiores”, expresó al ser consultado sobre el allanamiento que autorizó a dos locales de Fuerza Popular.\r\n\r\nDe igual manera, Concepción Carhuancho respaldó lo señalado por el presidente del Poder Judicial esta mañana en la que sostuvo que el factor clave en la lucha contra la corrupción es la educación y agregó que se debe de tomar consciencia de la misma para poder hacerle frente.', 'concepcion-carhuancho-lo-unico-que-hago-es-cumplir-con-mi-deber', 'CIENCIAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id_permissions` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_category` varchar(200) DEFAULT NULL,
  `inserted` int(11) NOT NULL,
  `readed` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id_permissions`, `id_rol`, `id_category`, `inserted`, `readed`, `updated`, `deleted`) VALUES
(8, 4, 'ARTE', 1, 1, 1, 0),
(10, 4, 'HISTORIA', 1, 1, 1, 0),
(13, 1, 'CIENCIAS', 1, 1, 1, 1),
(14, 1, 'ARTE', 1, 1, 1, 1),
(15, 1, 'TECNOLOGÍA', 1, 1, 1, 1),
(16, 1, 'MUNDO', 1, 1, 1, 1),
(17, 4, 'TECNOLOGÍA', 1, 1, 1, 1),
(18, 7, 'ARTE', 1, 1, 1, 1),
(19, 7, 'CRÓNICAS', 1, 1, 1, 1),
(20, 7, 'LITERATURA', 1, 1, 1, 1),
(21, 5, 'POLÍTICA', 1, 1, 1, 1),
(22, 5, 'SOCIAL', 1, 1, 1, 1),
(23, 5, 'SOBERANÍA', 1, 1, 1, 1),
(24, 5, 'REPORTAJES', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicity`
--

CREATE TABLE `publicity` (
  `id_publicity` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `imag_publi` varchar(50) DEFAULT NULL,
  `url_publi` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicity`
--

INSERT INTO `publicity` (`id_publicity`, `date`, `description`, `imag_publi`, `url_publi`, `status`) VALUES
(2, '2017-10-18', 'Imagen de santa teresa', '1508344590112.jpg', 'ok', 1),
(3, '2017-10-18', 'descripcion de la publidad mac', '1508344513661.png', 'macdonal', 1),
(4, '2017-10-18', 'descripcion de publi avansys', '1508342631330.jpg', 'avansys', 1),
(5, '2017-10-18', 'Descripcio pato donald', '1508343829949.png', 'http://www.google.com.pe', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `name`, `description`) VALUES
(1, 'Admin', 'Super administrador'),
(4, 'Editor', 'Solo edita'),
(5, 'Politica', 'Tiene control de los siguientes categorías: Política, Social, Soberanía y Reportajes.'),
(7, 'Cultura', 'Control de categorías: Arte, Literatura y Crónicas.'),
(8, 'Mundo', 'Control de categorías: Mundo, Economía y Ecología.'),
(9, 'Director', 'Control de categorías: Ciencia, Tecnología, Historia y Filosofía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `imag_slide` varchar(50) DEFAULT NULL,
  `url_slide` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id_slider`, `date`, `title`, `description`, `imag_slide`, `url_slide`, `status`) VALUES
(3, '2017-09-22', 'slider undertreke', 'slider under trruelkee', '1506119041491.jpg', 'sitioscreativos.com/categorias', 1),
(7, '2017-09-23', 'Los tres chiflados', 'este es  un slider de los tres chiflado', '1506531157003.jpg', 'enlace/chiflado.com', 0),
(8, '2017-09-27', 'asseis', 'aniversario', '1506533233272.jpg', 'google.com', 0),
(9, '2017-09-27', 'Eclipse solar: NASA transmitió en vivo el espectáculo astronómico', 'Eclipse total vista desde marteEE.UU. esperó con pasión su primer gran eclipse solar en un siglo. 11 satélites, 50 globos atmosféricos, telescopios a bordo de aviones y la EEI captaron imágenes del fe', '1506562434533.jpg', 'http://localhost/viejo_topo/detalle/paises-a-favor-y-en-contra-de-la-postura-de-trump-sobre-iran', 1),
(10, '2017-10-01', 'aniversaio', 'aniversario aessi san marcos', '1506898432350.jpg', 'http://localhost/viejo_topo/detalle/how-nato-conavert-fooreign-chars-on-code-igniter', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social`
--

CREATE TABLE `social` (
  `id_social` int(11) NOT NULL,
  `name_social` varchar(45) DEFAULT NULL,
  `imag_social` varchar(45) DEFAULT NULL,
  `url_social` varchar(45) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `social`
--

INSERT INTO `social` (`id_social`, `name_social`, `imag_social`, `url_social`, `status`) VALUES
(1, 'Facebook', '1508434625174.png', 'https://www.facebook.com/solucion.pe', 1),
(2, 'Twitter', '1508434825316.png', 'https://twitter.com/?lang=es', 1),
(3, 'Whatsapp', '1508434852003.png', '981004229', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created` date NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `id_rol`, `username`, `password`, `status`, `created`, `updated`) VALUES
(3, 'Juan', 'Torres', 'juan@hotmail.com', 1, 'admin', '202cb962ac59075b964b07152d234b70', 1, '2017-12-02', '0000-00-00 00:00:00'),
(6, 'joel', 'sotelo', 'pi.sagitario23@hotmail.com', 4, 'peru', '202cb962ac59075b964b07152d234b70', 1, '2017-12-07', '0000-00-00 00:00:00'),
(7, 'Richard', 'Diego', 'diego@gmail.com', 4, 'diegotech', '6344c36cf9108773cd6278d51d9b9051', 1, '2017-12-08', '0000-00-00 00:00:00'),
(8, 'Braulio', 'Morante', 'cultura@viejotopo.com', 7, 'Braulio', '043616eda6ac44f60ce995ea4a781b9d', 1, '2017-12-10', '0000-00-00 00:00:00'),
(9, 'José Carlos ', 'Ramírez', 'ramirez@viejotopo.com', 5, 'ramirez', '9f5cbf232cd3b8667024266c6f895c8c', 1, '2017-12-10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1512661877, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'diego@hotmail.com', '$2y$08$6hYQoZdWMng/pQCbNs/6wuLx1Q92nEYZgaHP9zNCcA158MhEYeblm', NULL, 'diego@hotmail.com', NULL, NULL, NULL, NULL, 1512662035, NULL, 1, 'Juan', 'Asp', 'ok', '76547878');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `name_video` varchar(45) DEFAULT NULL,
  `url_video` text,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id_video`, `name_video`, `url_video`, `date`, `status`) VALUES
(1, 'Inei', '<div style="position:relative;height:0;padding-bottom:56.25%"><iframe src="https://www.youtube.com/embed/eL8joaclQwc?ecver=2" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div>', '2017-10-19', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indices de la tabla `menus_bottom`
--
ALTER TABLE `menus_bottom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indices de la tabla `menus_top`
--
ALTER TABLE `menus_top`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `title` (`title`),
  ADD KEY `url_news` (`url_news`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permissions`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `publicity`
--
ALTER TABLE `publicity`
  ADD PRIMARY KEY (`id_publicity`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indices de la tabla `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id_social`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_rol_2` (`id_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `menus_bottom`
--
ALTER TABLE `menus_bottom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `menus_top`
--
ALTER TABLE `menus_top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permissions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `publicity`
--
ALTER TABLE `publicity`
  MODIFY `id_publicity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `social`
--
ALTER TABLE `social`
  MODIFY `id_social` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menus_bottom`
--
ALTER TABLE `menus_bottom`
  ADD CONSTRAINT `menus_bottom_menus_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menus_bottom` (`id`);

--
-- Filtros para la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
