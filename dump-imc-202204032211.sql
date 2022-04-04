CREATE DATABASE imc

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `idade` char(10) DEFAULT NULL,
  `turma` varchar(100) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `cpf` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1