SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `empleados` (
  `Id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Salary` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `empleados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

