SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `Events` (
  `id` int(4) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `resume` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `date_event` date NOT NULL,
  `created_at` date NOT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `created_by` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `Members` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `title` text,
  `resume` text,
  `content` text,
  `url_img` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `News` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `news_content` text,
  `news_date` date DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `author` varchar(40) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `user` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id_user`, `name`, `user`, `pass`) VALUES
(1, 'admin', 'admin', 'Galeana2020.'),
(2, 'admin', 'admin', 'Galeana2020.');


ALTER TABLE `Events`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Members`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `News`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);


ALTER TABLE `Events`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `News`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
