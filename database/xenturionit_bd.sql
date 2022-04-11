
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
    foto varchar(1000),
    usuario  varchar(50),
    email  varchar(100),
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
