DROP DATABASE  IF EXISTS xenturionit_bd;
CREATE DATABASE IF NOT EXISTS xenturionit_bd;
USE xenturionit_bd;

DROP TABLE IF EXISTS roles;
CREATE TABLE roles(
    id_rol int(11) auto_increment,
    nombre_rol varchar(50),
    descripcion text,
    estado boolean,
fecha_crea DATETIME,
fecha_modifica DATETIME default now(),
    PRIMARY KEY(id_rol)
);  
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(
    id_usuario INT(11) auto_increment,
    nombre  varchar(50),
    apellido  varchar(50),
    foto varchar(250) DEFAULT NULL,
    usuario  varchar(50),
    email  varchar(100),
    ultimo_online boolean DEFAULT 0,
    code text default NULL,
    type_user varchar(50) default NULL,
    id_rol int(11),
    password text,
    estado boolean,
fecha_crea DATETIME,
fecha_modifica DATETIME default now(),
    PRIMARY KEY(id_usuario)
);
DROP TABLE IF EXISTS modulos;
CREATE TABLE modulos(
    id_modulo INT(11) auto_increment,
    nombre varchar(50),
    descripcion text,
    estado boolean,
fecha_crea DATETIME,
fecha_modifica DATETIME default now(),
    PRIMARY KEY(id_modulo)
);
DROP TABLE IF EXISTS permisos;
CREATE TABLE permisos(
    id_permiso int(11)  auto_increment,
    id_modulo int(11),
    id_rol  int(11),
    r int(11),
    w int(11),
    u int(11),
    d int(11),
    PRIMARY KEY(id_permiso)
);

DROP TABLE IF EXISTS categoria_evento;
CREATE TABLE categoria_evento(id_categoria int(11) NOT NULL AUTO_INCREMENT,
                              nombre_categoria varchar(50) DEFAULT NULL,
                              descripcion varchar(50) DEFAULT NULL,
                              icono varchar(40) DEFAULT NULL,
                              estado tinyint(1) DEFAULT NULL,
                              fecha_crea datetime DEFAULT NULL,
                              fecha_modifica datetime DEFAULT NULL,
                              PRIMARY KEY (id_categoria),
                              KEY id_categoria (id_categoria)
);

DROP TABLE IF EXISTS `invitados`;
CREATE TABLE `invitados` (   `id_invitado` int(11) NOT NULL AUTO_INCREMENT,
                             `nombre_invitado` varchar(50) DEFAULT NULL,
                             `apellido_invitado` varchar(50) DEFAULT NULL,
                             `descripcion` varchar(150) DEFAULT NULL,
                             `url_imagen` varchar(250) DEFAULT NULL,
                             `estado` tinyint(1) DEFAULT NULL,
                             `fecha_crea` datetime DEFAULT NULL,
                             `fecha_modifica` datetime DEFAULT NULL,
                             PRIMARY KEY (`id_invitado`)
);


DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(60) DEFAULT NULL,
  `cupo` int(11) DEFAULT NULL,
  `color_evento` varchar(40) DEFAULT NULL,
  `fecha_evento_inicio` date DEFAULT NULL,
  `hora_evento_inicio`  varchar(20) DEFAULT NULL,
  `fecha_evento_fin` date DEFAULT NULL,
  `hora_evento_fin` varchar(20)  DEFAULT NULL,
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
);
DROP TABLE IF EXISTS `bancarias`;

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `planes`;

CREATE TABLE `planes` (`id_plan` tinyint(11) NOT NULL AUTO_INCREMENT,
                        `nombre_plan` varchar(75) NOT NULL,
                        `precio_plan` float(10,2) NOT NULL,
                        `descripcion` varchar(500) NOT NULL,
                        `estado` tinyint(1) DEFAULT NULL,
                        `fecha_crea` datetime DEFAULT NULL,
                        `fecha_modifica` datetime DEFAULT NULL,
                        PRIMARY KEY (`id_plan`)
                        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS website_setting;
CREATE TABLE website_setting(
    id_website_setting INT NOT NULL AUTO_INCREMENT,
    website_title VARCHAR(45) NOT NULL,
    website_about text DEFAULT NULL,
    website_image VARCHAR(250) DEFAULT NULL,
    website_favicon VARCHAR(250) DEFAULT NULL,
    website_clients INT(11) DEFAULT NULL,
    website_expirience INT(11) DEFAULT NULL,
    website_proyects INT(11) DEFAULT NULL,
    fecha_crea DATETIME,
    fecha_modifica DATETIME default now(),
    PRIMARY KEY (id_website_setting)
) ENGINE=InnoDB DEFAULT  CHARSET=utf8mb4;

DROP TABLE IF EXISTS contact_setting;
CREATE TABLE contact_setting(
    id_contact_setting INT NOT NULL AUTO_INCREMENT,
    contact_title VARCHAR(45) DEFAULT NULL,
    contact_address VARCHAR(45) DEFAULT NULL,
    contact_phone VARCHAR(45) DEFAULT NULL,
    contact_email VARCHAR(45) DEFAULT NULL,
    contact_schedule VARCHAR(45) DEFAULT NULL,
    google_map VARCHAR(350) DEFAULT NULL,
    facebook VARCHAR(250) DEFAULT NULL,
    twitter VARCHAR(250) DEFAULT NULL,
    linkedin VARCHAR(250) DEFAULT NULL,
    instagram VARCHAR(250) DEFAULT NULL,
    fecha_crea DATETIME,
    fecha_modifica DATETIME default now(),
    PRIMARY KEY (id_contact_setting)
) ENGINE=InnoDB DEFAULT  CHARSET=utf8mb4;


ALTER TABLE usuarios ADD CONSTRAINT fk_roles FOREIGN KEY (id_rol)  REFERENCES roles(id_rol);
ALTER TABLE permisos ADD CONSTRAINT fk_modulo FOREIGN KEY (id_modulo) REFERENCES modulos(id_modulo);
ALTER TABLE permisos ADD CONSTRAINT fk_rol FOREIGN KEY (id_rol) REFERENCES roles(id_rol);

INSERT INTO modulos (nombre,descripcion,estado,fecha_crea) values('Dashboard','modulo de dashboard',1,now());
INSERT INTO modulos (nombre,descripcion,estado,fecha_crea) values('Usuarios','modulo de usuarios',1,now());
INSERT INTO modulos (nombre,descripcion,estado,fecha_crea) values('Roles','modulo de roles',1,now());
INSERT INTO modulos (nombre,descripcion,estado,fecha_crea) values('Respaldo','modulo de respaldo',1,now());
INSERT INTO modulos (nombre,descripcion,estado,fecha_crea) values('Permisos','modulo de permisos',1,now());
INSERT INTO modulos (nombre,descripcion,estado,fecha_crea) values('Categoria','modulo de categoria',1,now());
INSERT INTO modulos (nombre,descripcion,estado,fecha_crea) values('Invitados','modulo de invitados',1,now());
INSERT INTO modulos (nombre,descripcion,estado,fecha_crea) values('Eventos','modulo de eventos',1,now());
INSERT INTO modulos (nombre,descripcion,estado,fecha_crea) values('Cuentas Bancarias','modulo de cuentas bancarias',1,now());
INSERT INTO modulos (nombre,descripcion,estado,fecha_crea) values('Planes','modulo de planes para eventos',1,now());
INSERT INTO modulos (nombre,descripcion,estado,fecha_crea) values('Website','modulo para configuracion de la web',1,now());


INSERT INTO roles (nombre_rol,descripcion,estado,fecha_crea) values ("Administrador","permisos de acceso a todo el sistema",1,now());

INSERT INTO permisos (id_modulo,id_rol,r,w,u,d) VALUES (1,1,1,1,1,1);
INSERT INTO permisos (id_modulo,id_rol,r,w,u,d) VALUES (2,1,1,1,1,1);
INSERT INTO permisos (id_modulo,id_rol,r,w,u,d) VALUES (3,1,1,1,1,1);
INSERT INTO permisos (id_modulo,id_rol,r,w,u,d) VALUES (4,1,1,1,1,1);
INSERT INTO permisos (id_modulo,id_rol,r,w,u,d) VALUES (5,1,1,1,1,1);
INSERT INTO permisos (id_modulo,id_rol,r,w,u,d) VALUES (6,1,1,1,1,1);
INSERT INTO permisos (id_modulo,id_rol,r,w,u,d) VALUES (7,1,1,1,1,1);
INSERT INTO permisos (id_modulo,id_rol,r,w,u,d) VALUES (8,1,1,1,1,1);
INSERT INTO permisos (id_modulo,id_rol,r,w,u,d) VALUES (9,1,1,1,1,1);
INSERT INTO permisos (id_modulo,id_rol,r,w,u,d) VALUES (10,1,1,1,1,1);
INSERT INTO permisos (id_modulo,id_rol,r,w,u,d) VALUES (11,1,1,1,1,1);

INSERT INTO usuarios (nombre,apellido,usuario,email,type_user,id_rol,password,estado,fecha_crea) VALUES ("joel josue","huacon lopez","josu3","jjhuacon@est.itsgg.edu.ec","dashboard",1,"$2y$10$nLtnKbUrAQnMMfWi9bqsEuQ53U5k1pKCRsKYWEw0x/R5hgKNcHiYK",1,now());

INSERT  INTO `categoria_evento`(`id_categoria`,`nombre_categoria`,`descripcion`,`icono`,`estado`,`fecha_crea`,`fecha_modifica`) VALUES (1,'Seminarios','Seminarios','fas fa-university',1,NULL,'0000-00-00 00:00:00'),(2,'Conferencias','Conferencias','fas fa-comment',1,NULL,'0000-00-00 00:00:00'),(3,'Talleres','Talleres','fas fa-code',1,NULL,'2022-04-18 23:38:01');

INSERT INTO website_setting (website_title,website_about,website_image,website_favicon,website_clients,website_expirience,website_proyects,fecha_crea) 
    VALUES ('XenturiontIT eventos','XenturionIT está conformado por un equipo de profesionales especializados en diferentes campos de TI cuyo propósito es generar valor agregado a nuestros socios estratégicos poniendo a su disposición toda la experiencia adquirida durante la dilatada trayectoria profesional de sus colaboradores y la constante capacitación del personal interno.​','https://i.imgur.com/bjl5fx4.png','https://i.imgur.com/2m15ruv.png',30,8,300,now());

INSERT INTO contact_setting (contact_title,contact_address,contact_phone,contact_email,contact_schedule,google_map,fecha_crea)
    VALUES ('Guayaquil','Pichincha 334 y Elizalde Edificio El Comercio, Piso 6 – Oficina 601, Guayaquil – Ecuador','(04) 232-8580',
    'solucionesit@xenturionit.com','Lunes – Viernes 09:00 – 18:00','https://maps.google.com/maps?q=Pichincha%20%23%20y%20Elizalde&t=m&z=18&output=embed&iwloc=near',now())