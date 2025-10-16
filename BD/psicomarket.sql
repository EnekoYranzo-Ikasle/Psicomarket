CREATE DATABASE IF NOT EXISTS psicomarket;
USE psicomarket;

CREATE TABLE usuarios (
  id INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(50),
  Nombre_usuario VARCHAR(50),
  Apellidos VARCHAR(50),
  Contrasenna VARCHAR(50),
  num_Tel INT,
  Tipo ENUM('usuario','comerciante','administrador') NOT NULL DEFAULT 'usuario',
  PRIMARY KEY (id)
);

CREATE TABLE comercios (
  id INT NOT NULL AUTO_INCREMENT,
  Nombre_comercio VARCHAR(50),
  Descripcion VARCHAR(1000),
  Patrocinado TINYINT(1),
  Latitud DECIMAL(10,7) NOT NULL,
  Longitud DECIMAL(10,7) NOT NULL,
  Ruta_imagen_comercio VARCHAR(255) NOT NULL,
  Valoracion FLOAT,
  id_usuario INT,
  PRIMARY KEY (id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE productos (
  id INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(50),
  Descripcion VARCHAR(100),
  Categoria VARCHAR(50),
  Estado VARCHAR(20),
  id_comercio INT,
  PRIMARY KEY (id),
  FOREIGN KEY (id_comercio) REFERENCES comercios(id)
);

CREATE TABLE imagenes (
  id INT NOT NULL AUTO_INCREMENT,
  Ruta_imagen_producto VARCHAR(255),
  id_producto INT,
  PRIMARY KEY (id),
  FOREIGN KEY (id_producto) REFERENCES productos(id)
);

CREATE TABLE favoritos (
  id INT NOT NULL AUTO_INCREMENT,
  Fecha DATE,
  id_producto INT,
  id_usuario INT,
  PRIMARY KEY (id),
  FOREIGN KEY (id_producto) REFERENCES productos(id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE mensajes (
  id INT NOT NULL AUTO_INCREMENT,
  Mensaje VARCHAR(1000),
  Fecha DATE,
  Hora TIME,
  id_Comprador INT,
  id_Comerciante INT,
  PRIMARY KEY (id),
  FOREIGN KEY (id_Comprador) REFERENCES usuarios(id),
  FOREIGN KEY (id_Comerciante) REFERENCES usuarios(id)
);

CREATE TABLE valoraciones (
  id INT NOT NULL AUTO_INCREMENT,
  estrellas FLOAT,
  id_usuario INT,
  id_comercio INT,
  PRIMARY KEY (id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
  FOREIGN KEY (id_comercio) REFERENCES comercios(id)
);
