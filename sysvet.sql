-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2017 a las 04:18:48
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sysvet`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_cliente_mascota` (`id_mascota` INT)  BEGIN

SELECT C.nombre, C.apellido_paterno, C.apellido_materno, C.telefono
FROM pacientes AS P
INNER JOIN clientes AS C ON P.id_cliente=C.id_cliente
WHERE id_paciente=id_mascota;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_diagnostico` (`diagnostico` INT)  BEGIN

SELECT nombre_enfermedad, DE.comentarios
FROM diagnosticos_enfermedades AS DE
INNER JOIN enfermedades AS E ON DE.id_enfermedad=E.id_enfermedad
INNER JOIN diagnosticos AS D ON DE.id_diagnostico=D.id_diagnostico
WHERE D.id_diagnostico=diagnostico;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_historial_consulta` (IN `id_mascota` INT)  BEGIN

SELECT CONCAT(DM.nombre,' ',DM.apellido_paterno,' ', DM.apellido_materno) AS Veterinario,motivo, fecha, hora, sintomas, CONCAT("Actitud:",actitud,". Condicion Cuerpo:",condicion_cuerpo,". Hidratacion:",hidratacion,". Mucosas:",mucosas,". Ojos:",ojos,
". Odios:",odios,". Nodulos:",nodulos,". Piel:",piel,". Locomocion:",locomocion,". Musculo:",musculo,". SistemaNervioso:",s_nervioso,". SistemaCardiovascular:",s_cardiovascular,". SistemaRespiratorio:",s_respiratorio,
". SistemaDigestivo:",s_digestivo,". SistemaGenitourinario:",s_genitourinario) AS "Examen Fisico",diagnostico,tratamiento, instrucciones, costo
FROM consultas AS C
INNER JOIN datos_medico AS DM ON C.id_medico=DM.id_medico
WHERE C.id_paciente = id_mascota;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_receta` (`receta` INT)  BEGIN

SELECT nombre_generico, RM.cantidad, RM.frecuencia, RM.duracion, RM.comentarios
FROM recetas_medicamentos AS RM
INNER JOIN info_medicamentos AS IM ON RM.id_info_medicamento=IM.id_info_medicamento
INNER JOIN recetas AS R ON RM.id_receta=R.id_receta
WHERE R.id_receta=receta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_receta_consulta` (IN `id_mascota` INT)  SELECT fecha AS "Fecha Consulta", GROUP_CONCAT(DISTINCT M.nombre_generico) AS Medicamentos, GROUP_CONCAT(DISTINCT RM.cantidad) AS Cantidad, GROUP_CONCAT(DISTINCT RM.frecuencia) AS Frecuencia, 
GROUP_CONCAT(DISTINCT RM.duracion) AS Duracion, GROUP_CONCAT(DISTINCT RM.comentarios) AS Comentarios
FROM consultas AS C
INNER JOIN recetas_medicamentos AS RM ON C.id_receta=RM.id_receta
INNER JOIN info_medicamentos AS M ON RM.id_info_medicamento=M.id_info_medicamento
WHERE C.id_paciente = id_mascota
GROUP BY C.id_consulta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_vacuna` (`id_mascota` INT)  BEGIN

SELECT nombre, VP.fecha_aplicacion, VP.observaciones
FROM vacunas_pacientes AS VP
INNER JOIN vacunas AS V ON VP.id_vacuna=V.id_vacuna
WHERE VP.id_paciente=id_mascota;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camas`
--

CREATE TABLE `camas` (
  `id_cama` int(11) NOT NULL,
  `num_cama` int(11) NOT NULL,
  `id_tipo_cama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camas_internos`
--

CREATE TABLE `camas_internos` (
  `id_cama_interno` int(11) NOT NULL,
  `id_cama` int(11) NOT NULL,
  `id_interno` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_paterno` varchar(20) NOT NULL,
  `apellido_materno` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `movil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `direccion`, `telefono`, `movil`) VALUES
(1, 'Bladimir', 'Martinez', 'Carlos', '2000-09-06', 'Col.Centro, #453, Gomez Palacio', '1875665555', '8714555987'),
(2, 'Alonso', 'Pimentel', 'Castro', '1997-04-17', 'Col.Margaritas, #f2122, Ciudad Lerdo', '9788554555', '8175669988'),
(3, 'Lencho', 'Gomez', 'Perez', '2017-07-17', 'Gomez Palacio, Col.Centro #505', '7899558888', '187554433'),
(4, 'Luis Eduardo', 'Chavez', 'Perez', '2017-07-31', 'Le France, Col.Centro #12ASs ', '8888844555', '6998888888'),
(5, 'Josue', 'Maximo', 'Segundo', '2017-07-12', 'Las Rosas,Gomez Palacio', '2422342342', '2231232312'),
(6, 'Alexis', 'Arias', 'Machain', '1995-06-02', 'Fracc.El bosque,Gomez Palacio, #wr21', '8889962333', '8998789999'),
(7, 'Manuel', 'Petron', 'Castillo', '1964-02-25', 'Col.Hamburgo City, Gomez Palacio', '7888899898', '9887552544'),
(8, 'Guillermo', 'Hernando', 'Carlos', '1995-08-04', 'Col.Los Alamos,Gomez Palacio', '9854996656', '8799564545'),
(9, 'Pedro', 'Caixinha', 'Perengano', '2017-07-28', 'Portugal,Col.Versalle, Torreon', '9866321223', '8174587788'),
(10, 'Cristian', 'Castro', '', '2017-08-05', '', '', ''),
(11, 'Ema', 'Ema', 'Ema', '2017-07-27', 'Lerdo', '8884823333', '8848848448'),
(12, 'Attila', 'Barack', 'Osama', '2017-06-28', 'USA', '4234234234', '2423423423'),
(13, 'Megamind', 'Tret', 'And', '2017-07-24', '', '', ''),
(14, 'Bladimir de Jesus', 'Perez', 'Garcia', '1997-08-28', 'La popular Dgo.', '', '8712200811');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinicas`
--

CREATE TABLE `clinicas` (
  `id_clinica` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clinicas`
--

INSERT INTO `clinicas` (`id_clinica`, `nombre`, `direccion`, `telefono`, `ciudad`) VALUES
(1, 'Caritas', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinicas_empleados`
--

CREATE TABLE `clinicas_empleados` (
  `id_clinica_empleado` int(11) NOT NULL,
  `id_clinica` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_receta` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `motivo` varchar(100) NOT NULL,
  `sintomas` text NOT NULL,
  `actitud` text,
  `condicion_cuerpo` text,
  `hidratacion` text,
  `mucosas` text,
  `ojos` text,
  `odios` text,
  `nodulos` text,
  `piel` text,
  `locomocion` text,
  `musculo` text,
  `s_nervioso` text,
  `s_cardiovascular` text,
  `s_respiratorio` text,
  `s_digestivo` text,
  `s_genitourinario` text,
  `hora` time DEFAULT NULL,
  `diagnostico` text NOT NULL,
  `tratamiento` text NOT NULL,
  `id_consultorio` int(11) DEFAULT NULL,
  `instrucciones` text,
  `costo` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `id_paciente`, `id_medico`, `id_receta`, `fecha`, `motivo`, `sintomas`, `actitud`, `condicion_cuerpo`, `hidratacion`, `mucosas`, `ojos`, `odios`, `nodulos`, `piel`, `locomocion`, `musculo`, `s_nervioso`, `s_cardiovascular`, `s_respiratorio`, `s_digestivo`, `s_genitourinario`, `hora`, `diagnostico`, `tratamiento`, `id_consultorio`, `instrucciones`, `costo`) VALUES
(1, 4, 1, 1, '2017-07-26', 'Vomito', 'Dolor de estomago, mareos y dolor de musculos.', 'Alterado', 'Debil', 'Buena', 'Limpias', 'En buena condicion', 'Limpios', 'Inflamados', 'En buen estado', 'Falla un poco un pie', 'Inflamados', 'Un poco inestable', 'Bueno', 'Batalla al respirar', 'En condiciones normales', 'En buen estado', '19:19:00', 'Tiene una inflamacion fuerte en el estomago causada por un gastitris.', 'Se tendra que optar por pastilla para disminuir como lo es el CARPROX y mejor la condicion del estomago.', NULL, 'Tratar del que el perro no se levante y que coma solo 1 vez al dia.', 350);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id_contrato` int(11) NOT NULL,
  `id_nomina` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_puesto` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_empleados`
--

CREATE TABLE `datos_empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_paterno` varchar(20) NOT NULL,
  `apellido_materno` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `movil` varchar(20) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_empleados`
--

INSERT INTO `datos_empleados` (`id_empleado`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `direccion`, `telefono`, `movil`, `curp`, `rfc`, `sexo`) VALUES
(1, 'Natanael', 'Lauria', 'Espronceda', '1981-04-02', 'Real del Santa Barbara No. 297,C.P 70153,Gomez Palacio,Dgo', '+52(747)-9110167', '+52(871)-9153187', 'LAEN810402HGTRST02', 'LAEN810402M88', 'M');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `datos_medico`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `datos_medico` (
`id_medico` int(11)
,`nombre` varchar(30)
,`apellido_paterno` varchar(20)
,`apellido_materno` varchar(20)
,`cedula` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre`) VALUES
(1, 'Veterinarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id_diagnostico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos_enfermedades`
--

CREATE TABLE `diagnosticos_enfermedades` (
  `id_diagnostico_enfermedad` int(11) NOT NULL,
  `id_enfermedad` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `comentarios` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE `enfermedades` (
  `id_enfermedad` int(10) UNSIGNED NOT NULL,
  `nombre_enfermedad` varchar(90) NOT NULL,
  `descripcion` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`id_enfermedad`, `nombre_enfermedad`, `descripcion`) VALUES
(1, 'Gastritis', 'Ocurre cuando el revestimiento del estómago resulta hinchado o inflamado.\r\nLa gastritis puede durar solo por un corto tiempo (gastritis aguda). También puede perdurar durante meses o años (gastritis crónica).'),
(2, 'Gastroenteritis', 'Es una inflamación de la membrana interna del intestino causada por un virus, una bacteria o parásitos.'),
(3, 'Rabia', 'Es una enfermedad animal mortal causada por un virus. '),
(4, 'Neuritis', 'Inflamación de los nervios.'),
(5, 'Bronquitis', 'Es la inflamación de los conductos bronquiales, las vías respiratorias que llevan oxígeno a sus pulmones. '),
(6, 'Conjuntivitis', 'Inflamación de la mucosa conjuntival.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `lunes` varchar(15) DEFAULT NULL,
  `martes` varchar(15) DEFAULT NULL,
  `miercoles` varchar(15) DEFAULT NULL,
  `jueves` varchar(15) DEFAULT NULL,
  `viernes` varchar(15) DEFAULT NULL,
  `sabado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_medicamentos`
--

CREATE TABLE `info_medicamentos` (
  `id_info_medicamento` int(11) NOT NULL,
  `nombre_generico` varchar(20) NOT NULL,
  `nombre_comercial` varchar(20) DEFAULT NULL,
  `id_tipo_medicamento` int(11) NOT NULL,
  `id_tipo_administracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `info_medicamentos`
--

INSERT INTO `info_medicamentos` (`id_info_medicamento`, `nombre_generico`, `nombre_comercial`, `id_tipo_medicamento`, `id_tipo_administracion`) VALUES
(1, 'CANIDRYL', NULL, 8, 1),
(2, 'CARPRODYL', NULL, 8, 1),
(3, 'CARPROX', NULL, 8, 1),
(4, 'SYVAQUINOL', NULL, 11, 4),
(5, 'CORTEXONA', NULL, 8, 10),
(6, 'MELOXIDYL', NULL, 8, 1),
(7, 'Artroflex ', '', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `internos`
--

CREATE TABLE `internos` (
  `id_interno` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_medicamentos`
--

CREATE TABLE `inventario_medicamentos` (
  `id_medicamento` int(11) NOT NULL,
  `id_info_medicamento` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id_medico` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `cedula` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id_medico`, `id_empleado`, `cedula`) VALUES
(1, 1, '8188001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos_especialidades`
--

CREATE TABLE `medicos_especialidades` (
  `id_medico_especialidad` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos_horarios`
--

CREATE TABLE `medicos_horarios` (
  `id_medico_horario` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nominas`
--

CREATE TABLE `nominas` (
  `id_nomina` int(11) NOT NULL,
  `salario` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `id_operacion` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_tipo_operacion` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones_medicos`
--

CREATE TABLE `operaciones_medicos` (
  `id_operacion_medico` int(11) NOT NULL,
  `id_operacion` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `especie` varchar(20) DEFAULT NULL,
  `raza` varchar(20) DEFAULT NULL,
  `sexo` char(6) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `esterilizado` char(2) DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `tipo_sangre` varchar(5) DEFAULT NULL,
  `alergias` varchar(200) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `id_cliente`, `nombre`, `edad`, `especie`, `raza`, `sexo`, `color`, `esterilizado`, `longitud`, `peso`, `tipo_sangre`, `alergias`, `observaciones`) VALUES
(1, 2, 'Tifu', 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 6, 'Limones', 2, 'Canino', 'Chihuahu', 'Hembra', 'Negro', 'No', 2.5, 5.6, 'A+', 'A la comida.', 'No se puede mover.'),
(5, 4, 'Lencho', 5, '', '', '', '', '', 4.5, 5.35, '', '', ''),
(6, 11, 'Gatubelo', 4, '', '', '', 'Negro', '', 4.58, 3.56, '', '', ''),
(7, 7, 'Megamind', 2, '', '', '', 'Blacno', 'Si', 42.5, 1.555, '', 'A la cafeÃ­na.', 'Es muy inquieto debido a su alergia.'),
(8, 13, 'Andre', 2, '', '', '', 'Blanco', '', 1.57, 6.57, '', '', ''),
(9, 12, 'Hey', 4, '', '', '', 'Purpura', 'Si', 47, 553, '', '', ''),
(10, 2, 'Timonel', 2, 'Canino', 'Huscky', 'Macho', 'Tiger', 'Si', 3.5, 5.55, 'A+', 'A los gatos', 'Es flojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `id_puesto` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id_receta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id_receta`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas_medicamentos`
--

CREATE TABLE `recetas_medicamentos` (
  `id_receta_medicamento` int(11) NOT NULL,
  `id_info_medicamento` int(11) NOT NULL,
  `id_receta` int(11) NOT NULL,
  `cantidad` int(10) UNSIGNED DEFAULT NULL,
  `frecuencia` varchar(50) DEFAULT NULL,
  `duracion` varchar(50) DEFAULT NULL,
  `comentarios` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recetas_medicamentos`
--

INSERT INTO `recetas_medicamentos` (`id_receta_medicamento`, `id_info_medicamento`, `id_receta`, `cantidad`, `frecuencia`, `duracion`, `comentarios`) VALUES
(1, 3, 1, 2, '2 veces a la semana', '1 mes', 'Por la noche'),
(2, 4, 1, 1, '1 vez al dia', '1 semana', 'Antes de comer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_administracion_medicamentos`
--

CREATE TABLE `tipos_administracion_medicamentos` (
  `id_tipo_administracion` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_administracion_medicamentos`
--

INSERT INTO `tipos_administracion_medicamentos` (`id_tipo_administracion`, `nombre`) VALUES
(1, 'Oral'),
(2, 'Sublingual'),
(3, 'Tópica'),
(4, 'Transdérmica'),
(5, 'Oftálmica'),
(6, 'Ótica'),
(7, 'Intranasal'),
(8, 'Inhalatoria'),
(9, 'Rectal'),
(10, 'Parenteral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_camas`
--

CREATE TABLE `tipos_camas` (
  `id_tipo_cama` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_medicamentos`
--

CREATE TABLE `tipos_medicamentos` (
  `id_tipo_medicamento` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_medicamentos`
--

INSERT INTO `tipos_medicamentos` (`id_tipo_medicamento`, `nombre`) VALUES
(1, 'Antibióticos'),
(2, 'Ansiolíticos'),
(3, 'Antiácidos'),
(5, 'Antidiarreicos'),
(6, 'Antigripales'),
(7, 'Antihistamínicos'),
(8, 'Antiinflamatorios'),
(9, 'Antimicóticos'),
(10, 'Laxantes'),
(11, 'Analgésicos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_operaciones`
--

CREATE TABLE `tipos_operaciones` (
  `id_tipo_operacion` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `especificaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `id_clinica` int(11) NOT NULL,
  `privilegio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contrasena`, `id_clinica`, `privilegio`) VALUES
(1, 'usuario', 'usuario', 1, 1),
(2, 'tripi', 'tripi', 1, 1),
(3, 'admin', 'admin', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `id_vacuna` int(11) NOT NULL,
  `abreviatura` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`id_vacuna`, `abreviatura`, `nombre`) VALUES
(1, NULL, 'Puppy'),
(2, NULL, 'Triple'),
(3, NULL, 'Quintuple'),
(4, NULL, 'Sextuple'),
(5, NULL, 'Rabia'),
(6, NULL, 'Parvovirus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas_pacientes`
--

CREATE TABLE `vacunas_pacientes` (
  `id_vacunas_pacientes` int(11) NOT NULL,
  `id_vacuna` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_aplicacion` date DEFAULT NULL,
  `observaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacunas_pacientes`
--

INSERT INTO `vacunas_pacientes` (`id_vacunas_pacientes`, `id_vacuna`, `id_paciente`, `fecha_aplicacion`, `observaciones`) VALUES
(2, 6, 4, '2017-07-20', 'Cada 3 semanas.'),
(3, 3, 4, '2017-07-17', 'Cada 6 meses.');

-- --------------------------------------------------------

--
-- Estructura para la vista `datos_medico`
--
DROP TABLE IF EXISTS `datos_medico`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `datos_medico`  AS  select `m`.`id_medico` AS `id_medico`,`de`.`nombre` AS `nombre`,`de`.`apellido_paterno` AS `apellido_paterno`,`de`.`apellido_materno` AS `apellido_materno`,`m`.`cedula` AS `cedula` from (`medicos` `m` join `datos_empleados` `de` on((`m`.`id_empleado` = `de`.`id_empleado`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camas`
--
ALTER TABLE `camas`
  ADD PRIMARY KEY (`id_cama`),
  ADD KEY `fk_camas_id_tipo_cama` (`id_tipo_cama`);

--
-- Indices de la tabla `camas_internos`
--
ALTER TABLE `camas_internos`
  ADD PRIMARY KEY (`id_cama_interno`),
  ADD KEY `fk_camas_internos_id_cama` (`id_cama`),
  ADD KEY `fk_camas_internos_id_interno` (`id_interno`),
  ADD KEY `fk_camas_internos_id_departamento` (`id_departamento`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `clinicas`
--
ALTER TABLE `clinicas`
  ADD PRIMARY KEY (`id_clinica`);

--
-- Indices de la tabla `clinicas_empleados`
--
ALTER TABLE `clinicas_empleados`
  ADD PRIMARY KEY (`id_clinica_empleado`),
  ADD KEY `fk_clinicas_empleados_id_clinica` (`id_clinica`),
  ADD KEY `fk_clinicas_empleados_id_empleado` (`id_empleado`),
  ADD KEY `fk_clinicas_empleados_id_contrato` (`id_contrato`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `fk_consultas_id_paciente` (`id_paciente`),
  ADD KEY `fk_consultas_id_medico` (`id_medico`),
  ADD KEY `fk_consultas_id_consultorio` (`id_consultorio`),
  ADD KEY `FK_receta_consulta` (`id_receta`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id_contrato`),
  ADD KEY `fk_contratos_id_puesto` (`id_puesto`),
  ADD KEY `fk_contratos_id_nomina` (`id_nomina`),
  ADD KEY `fk_contratos_id_empleado` (`id_empleado`);

--
-- Indices de la tabla `datos_empleados`
--
ALTER TABLE `datos_empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id_diagnostico`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `diagnosticos_enfermedades`
--
ALTER TABLE `diagnosticos_enfermedades`
  ADD PRIMARY KEY (`id_diagnostico_enfermedad`),
  ADD KEY `fk_diagnostico_enfermedad_enfermedad` (`id_enfermedad`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`id_enfermedad`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `fk_historial_id_paciente` (`id_paciente`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `info_medicamentos`
--
ALTER TABLE `info_medicamentos`
  ADD PRIMARY KEY (`id_info_medicamento`),
  ADD KEY `fk_info_medicamentos_idTipoMedicamento` (`id_tipo_medicamento`),
  ADD KEY `fk_info_medicamentos_idTipoAdministracion` (`id_tipo_administracion`);

--
-- Indices de la tabla `internos`
--
ALTER TABLE `internos`
  ADD PRIMARY KEY (`id_interno`),
  ADD KEY `fk_internos_id_paciente` (`id_paciente`),
  ADD KEY `fk_internos_id_medico` (`id_medico`);

--
-- Indices de la tabla `inventario_medicamentos`
--
ALTER TABLE `inventario_medicamentos`
  ADD PRIMARY KEY (`id_medicamento`),
  ADD KEY `fk_inventario_medicamentos_id_info_medicamento` (`id_info_medicamento`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id_medico`),
  ADD KEY `fk_medicos_id_empleado` (`id_empleado`);

--
-- Indices de la tabla `medicos_especialidades`
--
ALTER TABLE `medicos_especialidades`
  ADD PRIMARY KEY (`id_medico_especialidad`),
  ADD KEY `fk_medicos_especialidades_id_medico` (`id_medico`),
  ADD KEY `fk_medicos_especialidades_id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `medicos_horarios`
--
ALTER TABLE `medicos_horarios`
  ADD PRIMARY KEY (`id_medico_horario`),
  ADD KEY `fk_medicos_horarios_id_medico` (`id_medico`),
  ADD KEY `fk_medicos_horarios_id_horario` (`id_horario`);

--
-- Indices de la tabla `nominas`
--
ALTER TABLE `nominas`
  ADD PRIMARY KEY (`id_nomina`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`id_operacion`),
  ADD KEY `fk_operaciones_id_paciente` (`id_paciente`),
  ADD KEY `fk_operaciones_id_departamento` (`id_departamento`),
  ADD KEY `fk_operaciones_id_tipo_operacion` (`id_tipo_operacion`);

--
-- Indices de la tabla `operaciones_medicos`
--
ALTER TABLE `operaciones_medicos`
  ADD PRIMARY KEY (`id_operacion_medico`),
  ADD KEY `fk_operaciones_medicos_id_operacion` (`id_operacion`),
  ADD KEY `fk_operaciones_medicos_id_medico` (`id_medico`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `fk_pacientes_id_cliente` (`id_cliente`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`id_puesto`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id_receta`),
  ADD KEY `id_receta` (`id_receta`);

--
-- Indices de la tabla `recetas_medicamentos`
--
ALTER TABLE `recetas_medicamentos`
  ADD PRIMARY KEY (`id_receta_medicamento`),
  ADD KEY `fk_recetas_medicamentos_id_info_medicamento` (`id_info_medicamento`),
  ADD KEY `id_receta` (`id_receta`);

--
-- Indices de la tabla `tipos_administracion_medicamentos`
--
ALTER TABLE `tipos_administracion_medicamentos`
  ADD PRIMARY KEY (`id_tipo_administracion`);

--
-- Indices de la tabla `tipos_camas`
--
ALTER TABLE `tipos_camas`
  ADD PRIMARY KEY (`id_tipo_cama`);

--
-- Indices de la tabla `tipos_medicamentos`
--
ALTER TABLE `tipos_medicamentos`
  ADD PRIMARY KEY (`id_tipo_medicamento`);

--
-- Indices de la tabla `tipos_operaciones`
--
ALTER TABLE `tipos_operaciones`
  ADD PRIMARY KEY (`id_tipo_operacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuarios_id_clinica` (`id_clinica`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`id_vacuna`);

--
-- Indices de la tabla `vacunas_pacientes`
--
ALTER TABLE `vacunas_pacientes`
  ADD PRIMARY KEY (`id_vacunas_pacientes`),
  ADD KEY `fk_vacunas_pacientes_id_vacuna` (`id_vacuna`),
  ADD KEY `fk_vacunas_pacientes_id_paciente` (`id_paciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camas`
--
ALTER TABLE `camas`
  MODIFY `id_cama` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `camas_internos`
--
ALTER TABLE `camas_internos`
  MODIFY `id_cama_interno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `clinicas`
--
ALTER TABLE `clinicas`
  MODIFY `id_clinica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `clinicas_empleados`
--
ALTER TABLE `clinicas_empleados`
  MODIFY `id_clinica_empleado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `datos_empleados`
--
ALTER TABLE `datos_empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id_diagnostico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `diagnosticos_enfermedades`
--
ALTER TABLE `diagnosticos_enfermedades`
  MODIFY `id_diagnostico_enfermedad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `id_enfermedad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `info_medicamentos`
--
ALTER TABLE `info_medicamentos`
  MODIFY `id_info_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `internos`
--
ALTER TABLE `internos`
  MODIFY `id_interno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inventario_medicamentos`
--
ALTER TABLE `inventario_medicamentos`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `medicos_especialidades`
--
ALTER TABLE `medicos_especialidades`
  MODIFY `id_medico_especialidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicos_horarios`
--
ALTER TABLE `medicos_horarios`
  MODIFY `id_medico_horario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nominas`
--
ALTER TABLE `nominas`
  MODIFY `id_nomina` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `id_operacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `operaciones_medicos`
--
ALTER TABLE `operaciones_medicos`
  MODIFY `id_operacion_medico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `id_puesto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recetas_medicamentos`
--
ALTER TABLE `recetas_medicamentos`
  MODIFY `id_receta_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipos_administracion_medicamentos`
--
ALTER TABLE `tipos_administracion_medicamentos`
  MODIFY `id_tipo_administracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tipos_camas`
--
ALTER TABLE `tipos_camas`
  MODIFY `id_tipo_cama` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipos_medicamentos`
--
ALTER TABLE `tipos_medicamentos`
  MODIFY `id_tipo_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tipos_operaciones`
--
ALTER TABLE `tipos_operaciones`
  MODIFY `id_tipo_operacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `id_vacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `vacunas_pacientes`
--
ALTER TABLE `vacunas_pacientes`
  MODIFY `id_vacunas_pacientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camas`
--
ALTER TABLE `camas`
  ADD CONSTRAINT `fk_camas_id_tipo_cama` FOREIGN KEY (`id_tipo_cama`) REFERENCES `tipos_camas` (`id_tipo_cama`);

--
-- Filtros para la tabla `camas_internos`
--
ALTER TABLE `camas_internos`
  ADD CONSTRAINT `fk_camas_internos_id_cama` FOREIGN KEY (`id_cama`) REFERENCES `camas` (`id_cama`),
  ADD CONSTRAINT `fk_camas_internos_id_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`),
  ADD CONSTRAINT `fk_camas_internos_id_interno` FOREIGN KEY (`id_interno`) REFERENCES `internos` (`id_interno`);

--
-- Filtros para la tabla `clinicas_empleados`
--
ALTER TABLE `clinicas_empleados`
  ADD CONSTRAINT `fk_clinicas_empleados_id_clinica` FOREIGN KEY (`id_clinica`) REFERENCES `clinicas` (`id_clinica`),
  ADD CONSTRAINT `fk_clinicas_empleados_id_contrato` FOREIGN KEY (`id_contrato`) REFERENCES `contratos` (`id_contrato`),
  ADD CONSTRAINT `fk_clinicas_empleados_id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `datos_empleados` (`id_empleado`);

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `fk_contratos_id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `datos_empleados` (`id_empleado`),
  ADD CONSTRAINT `fk_contratos_id_nomina` FOREIGN KEY (`id_nomina`) REFERENCES `nominas` (`id_nomina`),
  ADD CONSTRAINT `fk_contratos_id_puesto` FOREIGN KEY (`id_puesto`) REFERENCES `puestos` (`id_puesto`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_historial_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `info_medicamentos`
--
ALTER TABLE `info_medicamentos`
  ADD CONSTRAINT `fk_info_medicamentos_idTipoAdministracion` FOREIGN KEY (`id_tipo_administracion`) REFERENCES `tipos_administracion_medicamentos` (`id_tipo_administracion`),
  ADD CONSTRAINT `fk_info_medicamentos_idTipoMedicamento` FOREIGN KEY (`id_tipo_medicamento`) REFERENCES `tipos_medicamentos` (`id_tipo_medicamento`);

--
-- Filtros para la tabla `internos`
--
ALTER TABLE `internos`
  ADD CONSTRAINT `fk_internos_id_medico` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`),
  ADD CONSTRAINT `fk_internos_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `inventario_medicamentos`
--
ALTER TABLE `inventario_medicamentos`
  ADD CONSTRAINT `fk_inventario_medicamentos_id_info_medicamento` FOREIGN KEY (`id_info_medicamento`) REFERENCES `info_medicamentos` (`id_info_medicamento`);

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `fk_medicos_id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `datos_empleados` (`id_empleado`);

--
-- Filtros para la tabla `medicos_especialidades`
--
ALTER TABLE `medicos_especialidades`
  ADD CONSTRAINT `fk_medicos_especialidades_id_especialidad` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`),
  ADD CONSTRAINT `fk_medicos_especialidades_id_medico` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`);

--
-- Filtros para la tabla `medicos_horarios`
--
ALTER TABLE `medicos_horarios`
  ADD CONSTRAINT `fk_medicos_horarios_id_horario` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`),
  ADD CONSTRAINT `fk_medicos_horarios_id_medico` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`);

--
-- Filtros para la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD CONSTRAINT `fk_operaciones_id_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`),
  ADD CONSTRAINT `fk_operaciones_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `fk_operaciones_id_tipo_operacion` FOREIGN KEY (`id_tipo_operacion`) REFERENCES `tipos_operaciones` (`id_tipo_operacion`);

--
-- Filtros para la tabla `operaciones_medicos`
--
ALTER TABLE `operaciones_medicos`
  ADD CONSTRAINT `fk_operaciones_medicos_id_medico` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`),
  ADD CONSTRAINT `fk_operaciones_medicos_id_operacion` FOREIGN KEY (`id_operacion`) REFERENCES `operaciones` (`id_operacion`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `fk_pacientes_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `recetas_medicamentos`
--
ALTER TABLE `recetas_medicamentos`
  ADD CONSTRAINT `fk_receta` FOREIGN KEY (`id_receta`) REFERENCES `recetas` (`id_receta`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_id_clinica` FOREIGN KEY (`id_clinica`) REFERENCES `clinicas` (`id_clinica`);

--
-- Filtros para la tabla `vacunas_pacientes`
--
ALTER TABLE `vacunas_pacientes`
  ADD CONSTRAINT `fk_vacunas_pacientes_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `fk_vacunas_pacientes_id_vacuna` FOREIGN KEY (`id_vacuna`) REFERENCES `vacunas` (`id_vacuna`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
