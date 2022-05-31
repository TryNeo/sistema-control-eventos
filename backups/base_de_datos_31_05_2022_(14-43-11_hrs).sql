SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE  IF EXISTS xenturionit_bd;
CREATE DATABASE IF NOT EXISTS xenturionit_bd;

USE xenturionit_bd;



CREATE TABLE `bancarias` (
  `id_bancaria` tinyint(11) NOT NULL AUTO_INCREMENT,
  `nombre_banco` varchar(50) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `nro_cuenta` varchar(15) DEFAULT NULL,
  `ced_ruc` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id_bancaria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






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





CREATE TABLE `contact_setting` (
  `id_contact_setting` int(11) NOT NULL AUTO_INCREMENT,
  `contact_title` varchar(45) DEFAULT NULL,
  `contact_address` varchar(45) DEFAULT NULL,
  `contact_phone` varchar(45) DEFAULT NULL,
  `contact_email` varchar(45) DEFAULT NULL,
  `contact_schedule` varchar(45) DEFAULT NULL,
  `google_map` varchar(350) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `linkedin` varchar(250) DEFAULT NULL,
  `instagram` varchar(250) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_contact_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO contact_setting VALUES("1","Guayaquil","Pichincha 334 y Elizalde Edificio El Comercio","(04) 232-8580","solucionesit@xenturionit.com","Lunes – Viernes 09:00 – 18:00","https://maps.google.com/maps?q=Pichincha%20%23%20y%20Elizalde&t=m&z=18&output=embed&iwloc=near","","","","","2022-05-27 14:51:57","2022-05-27 14:51:57");





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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO eventos VALUES("1","Evento Datata","6","#183f27","2022-04-22","8:30 PM","2022-04-22","8:45 PM","1","1","seminarios_1","1","2022-05-28 16:43:25","2022-05-28 16:43:25");





CREATE TABLE `invitados` (
  `id_invitado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_invitado` varchar(50) DEFAULT NULL,
  `apellido_invitado` varchar(50) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `url_imagen` varchar(250) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `linkedin` varchar(250) DEFAULT NULL,
  `instagram` varchar(250) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id_invitado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO invitados VALUES("1","Michel Micaela","Lopez","Asdaddasssssssssssssssssssssssssssda","https://randomuser.me/api/portraits/men/61.jpg","https://www.facebook.com/xenturionit","","","","1","2022-05-28 16:10:04","2022-05-28 17:07:33");
INSERT INTO invitados VALUES("2","Joel Josue","Lopez","Dasdaddddddddddddddddddddddddddd","https://randomuser.me/api/portraits/men/85.jpg","https://www.facebook.com/xenturionit","","","","1","2022-05-28 17:02:17","2022-05-28 17:07:11");
INSERT INTO invitados VALUES("3","Marvin","Gomez","Asdasdasddddddddddddddddd","https://randomuser.me/api/portraits/men/22.jpg","https://www.facebook.com/xenturionit","","","","1","2022-05-28 17:08:16","");
INSERT INTO invitados VALUES("4","Fdfdfdfdfdfd","Lopez","Gggggggggggggggggggggggg","https://randomuser.me/api/portraits/women/85.jpg","https://www.facebook.com/xenturionit","","","","1","2022-05-29 20:57:50","");





CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO modulos VALUES("1","Dashboard","modulo de dashboard","1","2022-05-27 14:51:56","2022-05-27 14:51:56");
INSERT INTO modulos VALUES("2","Usuarios","modulo de usuarios","1","2022-05-27 14:51:56","2022-05-27 14:51:56");
INSERT INTO modulos VALUES("3","Roles","modulo de roles","1","2022-05-27 14:51:56","2022-05-27 14:51:56");
INSERT INTO modulos VALUES("4","Respaldo","modulo de respaldo","1","2022-05-27 14:51:56","2022-05-27 14:51:56");
INSERT INTO modulos VALUES("5","Permisos","modulo de permisos","1","2022-05-27 14:51:56","2022-05-27 14:51:56");
INSERT INTO modulos VALUES("6","Categoria","modulo de categoria","1","2022-05-27 14:51:56","2022-05-27 14:51:56");
INSERT INTO modulos VALUES("7","Invitados","modulo de invitados","1","2022-05-27 14:51:56","2022-05-27 14:51:56");
INSERT INTO modulos VALUES("8","Eventos","modulo de eventos","1","2022-05-27 14:51:56","2022-05-27 14:51:56");
INSERT INTO modulos VALUES("9","Cuentas Bancarias","modulo de cuentas bancarias","1","2022-05-27 14:51:56","2022-05-27 14:51:56");
INSERT INTO modulos VALUES("10","Planes","modulo de planes para eventos","1","2022-05-27 14:51:56","2022-05-27 14:51:56");
INSERT INTO modulos VALUES("11","Website","modulo para configuracion de la web","1","2022-05-27 14:51:56","2022-05-27 14:51:56");





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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO permisos VALUES("1","1","1","1","1","1","1");
INSERT INTO permisos VALUES("2","2","1","1","1","1","1");
INSERT INTO permisos VALUES("3","3","1","1","1","1","1");
INSERT INTO permisos VALUES("4","4","1","1","1","1","1");
INSERT INTO permisos VALUES("5","5","1","1","1","1","1");
INSERT INTO permisos VALUES("6","6","1","1","1","1","1");
INSERT INTO permisos VALUES("7","7","1","1","1","1","1");
INSERT INTO permisos VALUES("8","8","1","1","1","1","1");
INSERT INTO permisos VALUES("9","9","1","1","1","1","1");
INSERT INTO permisos VALUES("10","10","1","1","1","1","1");
INSERT INTO permisos VALUES("11","11","1","1","1","1","1");





CREATE TABLE `planes` (
  `id_plan` tinyint(11) NOT NULL AUTO_INCREMENT,
  `nombre_plan` varchar(75) NOT NULL,
  `precio_plan` float(10,2) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO roles VALUES("1","Administrador","permisos de acceso a todo el sistema","1","2022-05-27 14:51:56","2022-05-27 14:51:56");





CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ultimo_online` tinyint(1) DEFAULT 0,
  `code` text DEFAULT NULL,
  `type_user` varchar(50) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_usuario`),
  KEY `fk_roles` (`id_rol`),
  CONSTRAINT `fk_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuarios VALUES("1","joel josue","huacon lopez","","josu3","jjhuacon@est.itsgg.edu.ec","1","","dashboard","1","$2y$10$nLtnKbUrAQnMMfWi9bqsEuQ53U5k1pKCRsKYWEw0x/R5hgKNcHiYK","1","2022-05-27 14:51:57","2022-05-31 14:07:37");





CREATE TABLE `website_setting` (
  `id_website_setting` int(11) NOT NULL AUTO_INCREMENT,
  `website_title` varchar(45) NOT NULL,
  `website_about` text DEFAULT NULL,
  `website_image` varchar(250) DEFAULT NULL,
  `website_favicon` varchar(250) DEFAULT NULL,
  `website_clients` int(11) DEFAULT NULL,
  `website_expirience` int(11) DEFAULT NULL,
  `website_proyects` int(11) DEFAULT NULL,
  `fecha_crea` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_website_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO website_setting VALUES("1","XenturiontIT eventos","XenturionIT est? conformado por un equipo de profesionales especializados en diferentes campos de TI cuyo prop?sito es generar valor agregado a nuestros socios estrat?gicos poniendo a su disposici?n toda la experiencia adquirida durante la dilatada trayectoria profesional de sus colaboradores y la constante capacitaci?n del personal interno.?","https://i.imgur.com/bJl5fX4.png","https://i.imgur.com/2M15ruV.png","30","8","300","2022-05-27 14:51:57","2022-05-31 14:31:22");



SET FOREIGN_KEY_CHECKS=1;