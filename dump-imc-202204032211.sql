CREATE DATABASE imc
CREATE DATABASE `imc` /*!40100 DEFAULT CHARACTER SET latin1 */

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `idade` char(10) DEFAULT NULL,
  `turma` varchar(100) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `cpf` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `altura` varchar(100) DEFAULT NULL,
  `peso` char(10) DEFAULT NULL,
  `id_aluno` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1