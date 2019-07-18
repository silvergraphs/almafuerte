-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb22.awardspace.net
-- Generation Time: Jul 04, 2019 at 04:23 PM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpagina`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `docAlumno` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ano` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `faltas` int(2) NOT NULL,
  `preceptores` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `delegado` tinyint(1) NOT NULL,
  `parteDelCentroDeEstudiantes` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`docAlumno`, `nombre`, `apellido`, `especialidad`, `ano`, `division`, `faltas`, `preceptores`, `delegado`, `parteDelCentroDeEstudiantes`) VALUES
(11111111, 'Bruno Fabrizio', 'Caruso', 'Informatica', 7, 3, 99, 'Marta', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE `asistencia` (
  `documento` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `año` varchar(20) NOT NULL,
  `curso` varchar(20) NOT NULL,
  `codigoBarra` varchar(20) NOT NULL,
  `horaIngreso` varchar(20) NOT NULL,
  `fecha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asistencia`
--

INSERT INTO `asistencia` (`documento`, `apellido`, `nombre`, `año`, `curso`, `codigoBarra`, `horaIngreso`, `fecha`) VALUES
('40000003', 'D', 'A', '1', '1', '', '', '12/7/2018'),
('40000004', 'E', 'B', '1', '3', '', '', '12/7/2018'),
('40000005', 'F', 'C', '1', '3', '', '', '12/7/2018'),
('40000006', 'G', 'A', '1', '3', '', '', '12/7/2018'),
('40000008', 'I', 'C', '2', '1', '', '', '12/7/2018'),
('40000007', 'H', 'B', '2', '3', '', '', '12/7/2018'),
('40000009', 'J', 'A', '2', '3', '', '', '12/7/2018'),
('40000010', 'K', 'B', '3', '3', '', '', '12/7/2018'),
('40000011', 'L', 'C', '3', '6', '', '', '12/7/2018'),
('40000027', 'A', 'A', '7', '3', '', '', '12/7/2018'),
('40000000', 'A', 'B', '7', '3', '', '', '12/7/2018'),
('40000001', 'B', 'A', '7', '3', '', '', '12/7/2018'),
('40000028', 'B', 'B', '7', '3', '', '', '12/7/2018'),
('40000029', 'C', 'C', '7', '3', '', '', '12/7/2018'),
('40000002', 'C', 'D', '7', '3', '', '', '12/7/2018'),
('40000014', 'C', 'I', '7', '3', '', '', '12/7/2018'),
('40000012', 'M', 'A', '7', '3', '', '', '12/7/2018'),
('40000013', 'N', 'B', '7', '3', '', '', '12/7/2018'),
('40000015', 'O', 'A', '7', '3', '', '', '12/7/2018'),
('40000016', 'P', 'B', '7', '3', '', '', '12/7/2018'),
('40000017', 'Q', 'C', '7', '3', '', '', '12/7/2018'),
('40000018', 'R', 'A', '7', '3', '', '', '12/7/2018'),
('40000019', 'S', 'B', '7', '3', '', '', '12/7/2018'),
('40000020', 'T', 'C', '7', '3', '', '', '12/7/2018'),
('40000021', 'U', 'A', '7', '3', '', '', '12/7/2018'),
('40000022', 'V', 'B', '7', '3', '', '', '12/7/2018'),
('4000002', 'W', 'C', '7', '3', '', '', '12/7/2018'),
('40000024', 'X', 'A', '7', '3', '', '', '12/7/2018'),
('40000025', 'Y', 'B', '7', '3', '', '', '12/7/2018'),
('40000026', 'Z', 'C', '7', '3', '', '', '12/7/2018');

-- --------------------------------------------------------

--
-- Table structure for table `directivo`
--

CREATE TABLE `directivo` (
  `docDirectivo` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `horarios` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias` (
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`nombre`) VALUES
('Analisis Matematico'),
('Arte'),
('Biologia'),
('Ciencias Naturales'),
('Ciencias Sociales'),
('Construccion de Ciudadania'),
('Derechos del Trabajo'),
('Educacion Artistica'),
('Filosofia'),
('Fisica'),
('Fisicoquimica'),
('Geografia'),
('Historia'),
('Ingles'),
('Literatura'),
('Matematica'),
('Matematica Aplicada'),
('Politica y Ciudadania'),
('Practicas del Lenguaje'),
('Quimica'),
('Taller');

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `docProfesor` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`docProfesor`, `nombre`, `apellido`, `dni`, `email`, `telefono`) VALUES
(22222222, 'Nelson', 'Lopez', '2222222', 'nelsonlopez74@yahoo.com.ar', '000000000');

-- --------------------------------------------------------

--
-- Table structure for table `recursos`
--

CREATE TABLE `recursos` (
  `idrecursos` int(11) NOT NULL,
  `archivo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `materias_nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tema` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ano` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `fechaSubida` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `subidoPor` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `recursos`
--

INSERT INTO `recursos` (`idrecursos`, `archivo`, `materias_nombre`, `tema`, `ano`, `division`, `fechaSubida`, `subidoPor`) VALUES
(7, 'testFile.txt', 'Analisis Matematico', 'asdas', 7, 3, '20-09-2018', 'Nelson Lopez');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(41) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipoUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `documento`, `usuario`, `clave`, `email`, `tipoUsuario`) VALUES
(4, 11111111, 'silver', '8cb2237d0679ca88db6464eac60da96345513964', 'brunofcaruso@gmail.com', 'Alumno'),
(5, 22222222, 'nelson', '8cb2237d0679ca88db6464eac60da96345513964', 'nelsonlopez74@gmail.com', 'Profesor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`docAlumno`);

--
-- Indexes for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD UNIQUE KEY `año` (`año`,`curso`,`apellido`,`nombre`,`codigoBarra`) USING BTREE;

--
-- Indexes for table `directivo`
--
ALTER TABLE `directivo`
  ADD PRIMARY KEY (`docDirectivo`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`nombre`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`docProfesor`);

--
-- Indexes for table `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`idrecursos`,`materias_nombre`),
  ADD KEY `fk_recursos_materias1` (`materias_nombre`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `docAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42178294;
--
-- AUTO_INCREMENT for table `directivo`
--
ALTER TABLE `directivo`
  MODIFY `docDirectivo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recursos`
--
ALTER TABLE `recursos`
  MODIFY `idrecursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `fk_recursos_materias1` FOREIGN KEY (`materias_nombre`) REFERENCES `materias` (`nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
