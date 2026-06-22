-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 02:38 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fut`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `id` int NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estadio` text,
  `clasico` text,
  `capitan` text,
  `id_zona` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `estadio`, `clasico`, `capitan`, `id_zona`) VALUES
(1, 'Boca Juniors', 'La Bombonera', 'River Plate', 'Leandro Paredes', 2),
(2, 'River Plate', 'Monumental', 'Boca Juniors', 'Marcos Javier Acuña', 1),
(3, 'Racing Club', 'Presidente Perón', 'Independiente', 'Santiago Sosa', 2),
(4, 'San Lorenzo', 'Pedro Bidegain', 'Huracán', 'Nicolas Tripichio', 2),
(5, 'Independiente', 'Libertadores de América', 'Racing Club', 'Rodrigo Rey', 1),
(6, 'Huracán', 'Tomás Adolfo Ducó', 'San Lorenzo', 'Hernan Galindez', 1),
(7, 'Estudiantes LP', 'Jorge luis Hirschi', 'Gimnasia LP', 'Guido Carrillo', 1),
(8, 'Gimnasia LP', 'Juan Carmelo Zerillo', 'Estudiantes LP', 'Nelson Insfran', 2),
(9, 'Velez Sarfield', 'Jose Amalfitani', 'Tigre', 'Elias Gomez', 1),
(10, 'Tigre', 'Jose Dellagiovanna', 'Velez Sarfield', 'Joaquin Laso', 2),
(11, 'Newells', 'Marcelo Bielsa', 'Rosario Central', 'Geronimo Mattar', 1),
(12, 'Rosario Central', 'Gigante de Arroyito', 'Newells', 'Angel Di Maria', 2),
(13, 'Talleres', 'La Boutique', 'Belgrano', 'Guido Herrera', 1),
(14, 'Belgrano', 'Gigante de Alberdi', 'Talleres', 'Lucas Zelarayan', 2),
(15, 'Argentinos Juniors', 'Diego Armando Maradona', 'Platense', 'Federico Fattori', 1),
(16, 'Platense', 'Ciudad de Vicente Lopez', 'Argentinos Juniors', 'Ignacio Vazquez', 2),
(17, 'Union', '15 de abril', 'Instituto', 'Mauro Pitton', 1),
(18, 'Instituto', 'Monumental Presidente Peron', 'Union', 'Fernando Alarcon', 2),
(19, 'Lanus', 'Nestor Diaz Perez', 'Banfield', 'Carlos Izquierdoz', 1),
(20, 'Banfield', 'Florencio Sola', 'Lanus', 'Facundo Sanguinetti', 2);

-- --------------------------------------------------------

--
-- Table structure for table `zona`
--

CREATE TABLE `zona` (
  `id` int NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `zona`
--

INSERT INTO `zona` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Zona A', 'Grupo A de la Primera División Argentina'),
(2, 'Zona B', 'Grupo B de la Primera División Argentina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_zona` (`id_zona`);

--
-- Indexes for table `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `zona`
--
ALTER TABLE `zona`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `fk_zona` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
