create database id2987913_sismo2017acopios;
use id2987913_sismo2017acopios;

CREATE TABLE centro_acopio (
  id						int(10) NOT NULL AUTO_INCREMENT,
  Nombre 					varchar(255) NOT NULL,
  Calle						varchar(255) NOT NULL,
  Numero					int(10) NOT NULL,
  Colonia					varchar(255) NOT NULL,
  CodigoPostal				int(10) NOT NULL,
  Del_Municipio				varchar(255) NOT NULL,
  Estado					varchar(255) NOT NULL,
  URLMapa					varchar(255) NOT NULL,
  PRIMARY KEY (id)) ENGINE=InnoDB;
  
CREATE TABLE articulos (
  id						int(10) NOT NULL AUTO_INCREMENT,
  centro_acopio_id			int(10) NOT NULL,
  Nombre 					varchar(255) NOT NULL,
  Cantidad					int(10) NOT NULL,
  Prioridad					int(10) NOT NULL,
  Categoria					varchar(255) NOT NULL,
  PRIMARY KEY (id, centro_acopio_id)) ENGINE=InnoDB;
  
CREATE TABLE usuarios (
  id						int(10) NOT NULL AUTO_INCREMENT,
  username					varchar(255) NOT NULL,
  pass 						varchar(255) NOT NULL,
  centroAcopioId			int NOT NULL,
  PRIMARY KEY (id, username, centroAcopioId)) ENGINE=InnoDB;
  
  ALTER TABLE articulos ADD INDEX FKcentroacopioId (centro_acopio_id), ADD CONSTRAINT FKcentroacopioId FOREIGN KEY (centro_acopio_id) REFERENCES centro_acopio (id);