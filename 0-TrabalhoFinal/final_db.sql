-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 01:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

CREATE TABLE `aluno` (
  `AlunoId` int(11) NOT NULL,
  `AlunoNome` varchar(255) DEFAULT NULL,
  `TurmaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aluno`
--

INSERT INTO `aluno` (`AlunoId`, `AlunoNome`, `TurmaId`) VALUES
(1, 'Lucas Adriano Santoshi', 2),
(3, 'Roberto', 2);

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `CursoId` int(11) NOT NULL,
  `CursoNome` varchar(255) NOT NULL,
  `CursoPeriodo` varchar(255) NOT NULL,
  `CursoDescricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`CursoId`, `CursoNome`, `CursoPeriodo`, `CursoDescricao`) VALUES
(2, 'Analise e Desenvolvimento de Sistemas Teste', 'Diurno', 'Curso de Desenvolvimento'),
(3, 'Engenharia', 'Noturno', 'Curso de Engenharia');

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

CREATE TABLE `disciplina` (
  `CursoId` int(11) NOT NULL,
  `DisciplinaId` int(11) NOT NULL,
  `DisciplinaEmenta` varchar(255) NOT NULL,
  `DisciplinaHorario` varchar(20) NOT NULL,
  `DisciplinaNome` varchar(20) NOT NULL,
  `ProfessorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`CursoId`, `DisciplinaId`, `DisciplinaEmenta`, `DisciplinaHorario`, `DisciplinaNome`, `ProfessorId`) VALUES
(3, 3, 'Ementa 124', 'Horario 143', 'Disciplina 123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `ProfessorId` int(11) NOT NULL,
  `ProfessorNome` varchar(255) DEFAULT NULL,
  `ProfessorTitulo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`ProfessorId`, `ProfessorNome`, `ProfessorTitulo`) VALUES
(2, 'Lucas Adriano Santos', 'Doutor');

-- --------------------------------------------------------

--
-- Table structure for table `turma`
--

CREATE TABLE `turma` (
  `TurmaId` int(11) NOT NULL,
  `TurmaDescricao` varchar(255) DEFAULT NULL,
  `CursoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `turma`
--

INSERT INTO `turma` (`TurmaId`, `TurmaDescricao`, `CursoId`) VALUES
(2, 'Turma A de ADS', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`AlunoId`),
  ADD KEY `TurmaId_FK` (`TurmaId`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`CursoId`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`DisciplinaId`),
  ADD KEY `CursoId_FK` (`CursoId`),
  ADD KEY `ProfessorId_FK` (`ProfessorId`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`ProfessorId`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`TurmaId`),
  ADD KEY `CursoId_FK2` (`CursoId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `AlunoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `CursoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `DisciplinaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `ProfessorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `TurmaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `TurmaId_FK` FOREIGN KEY (`TurmaId`) REFERENCES `turma` (`TurmaId`);

--
-- Constraints for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `CursoId_FK` FOREIGN KEY (`CursoId`) REFERENCES `curso` (`CursoId`),
  ADD CONSTRAINT `ProfessorId_FK` FOREIGN KEY (`ProfessorId`) REFERENCES `professor` (`ProfessorId`);

--
-- Constraints for table `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `CursoId_FK2` FOREIGN KEY (`CursoId`) REFERENCES `curso` (`CursoId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
