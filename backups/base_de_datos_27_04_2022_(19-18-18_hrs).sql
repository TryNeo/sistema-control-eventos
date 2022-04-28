SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE  IF EXISTS xenturionit_bd;
CREATE DATABASE IF NOT EXISTS xenturionit_bd;

USE xenturionit_bd;



CREATE TABLE `categoria_evento` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `icono` varchar(40) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO categoria_evento VALUES("1","Seminarios","Seminarios","fas fa-university","1","","0000-00-00 00:00:00");
INSERT INTO categoria_evento VALUES("2","Conferencias","Conferencias","fas fa-comment","1","","0000-00-00 00:00:00");
INSERT INTO categoria_evento VALUES("3","Talleres","Talleres","fas fa-code","1","","2022-04-18 23:38:01");





CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(60) DEFAULT NULL,
  `cupo` int(11) DEFAULT NULL,
  `color_evento` varchar(40) DEFAULT NULL,
  `fecha_evento_inicio` date DEFAULT NULL,
  `hora_evento_inicio` varchar(20) DEFAULT NULL,
  `fecha_evento_fin` date DEFAULT NULL,
  `hora_evento_fin` varchar(20) DEFAULT NULL,
  `id_cat_evento` int(11) NOT NULL,
  `id_inv` int(11) NOT NULL,
  `clave_evento` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `id_cat_evento` (`id_cat_evento`),
  KEY `id_inv` (`id_inv`),
  CONSTRAINT `rel_evento_categoria` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  CONSTRAINT `rel_invitado_ev` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`id_invitado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






CREATE TABLE `invitados` (
  `id_invitado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_invitado` varchar(50) DEFAULT NULL,
  `apellido_invitado` varchar(50) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `url_imagen` varchar(250) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id_invitado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO invitados VALUES("1","Rafael","Bautista","Bautista","https://i.imgur.com/sohWhy9.png","1","2022-04-20 22:50:54","2022-04-20 22:50:56");





CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO modulos VALUES("1","Dashboard","modulo de dashboard","1","2022-04-27 18:45:32","2022-04-27 18:45:32");
INSERT INTO modulos VALUES("2","Usuarios","modulo de usuarios","1","2022-04-27 18:45:32","2022-04-27 18:45:32");
INSERT INTO modulos VALUES("3","Roles","modulo de roles","1","2022-04-27 18:45:32","2022-04-27 18:45:32");
INSERT INTO modulos VALUES("4","Respaldo","modulo de respaldo","1","2022-04-27 18:45:32","2022-04-27 18:45:32");
INSERT INTO modulos VALUES("5","Permisos","modulo de permisos","1","2022-04-27 18:45:32","2022-04-27 18:45:32");
INSERT INTO modulos VALUES("6","Categoria","modulo de categoria","1","2022-04-27 18:45:32","2022-04-27 18:45:32");
INSERT INTO modulos VALUES("7","Invitados","modulo de invitados","1","2022-04-27 18:45:32","2022-04-27 18:45:32");
INSERT INTO modulos VALUES("8","Eventos","modulo de eventos","1","2022-04-27 18:45:32","2022-04-27 18:45:32");





CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `r` int(11) DEFAULT NULL,
  `w` int(11) DEFAULT NULL,
  `u` int(11) DEFAULT NULL,
  `d` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_permiso`),
  KEY `fk_modulo` (`id_modulo`),
  KEY `fk_rol` (`id_rol`),
  CONSTRAINT `fk_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`),
  CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO permisos VALUES("1","1","1","1","1","1","1");
INSERT INTO permisos VALUES("2","2","1","1","1","1","1");
INSERT INTO permisos VALUES("3","3","1","1","1","1","1");
INSERT INTO permisos VALUES("4","4","1","1","1","1","1");
INSERT INTO permisos VALUES("5","5","1","1","1","1","1");
INSERT INTO permisos VALUES("6","6","1","1","1","1","1");
INSERT INTO permisos VALUES("7","7","1","1","1","1","1");
INSERT INTO permisos VALUES("8","8","1","1","1","1","1");
INSERT INTO permisos VALUES("9","1","2","1","1","1","1");





CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO roles VALUES("1","Administrador","permisos de acceso a todo el sistema","1","2022-04-27 18:45:32","2022-04-27 18:45:32");
INSERT INTO roles VALUES("2","Clienteret","Reeteteteterteterterter","1","2022-04-27 18:51:32","2022-04-27 18:51:32");





CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ultimo_online` tinyint(1) DEFAULT 0,
  `id_rol` int(11) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_usuario`),
  KEY `fk_roles` (`id_rol`),
  CONSTRAINT `fk_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuarios VALUES("1","joel josue","huacon lopez","","josu3","jjhuacon@est.itsgg.edu.ec","1","1","$2y$10$nLtnKbUrAQnMMfWi9bqsEuQ53U5k1pKCRsKYWEw0x/R5hgKNcHiYK","1","2022-04-27 18:45:32","2022-04-27 18:46:54");



SET FOREIGN_KEY_CHECKS=1;