CREATE DATABASE IF NOT EXISTS psicomarket;
USE psicomarket;

CREATE TABLE usuarios (
  id INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(50),
  Apellidos VARCHAR(50),
  Email VARCHAR(255) UNIQUE,
  Contrasenna VARCHAR(255),
  num_Tel INT,
  Tipo ENUM('usuario','comerciante','administrador') NOT NULL DEFAULT 'usuario',
  UserImagePath VARCHAR(255) NULL,
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
  id_usuario INT,
  PRIMARY KEY (id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE categorias (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE productos (
  id INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(50),
  Descripcion VARCHAR(100),
  Estado VARCHAR(20),
  id_comercio INT,
  Precio FLOAT,
  id_categoria INT,
  PRIMARY KEY (id),
  FOREIGN KEY (id_comercio) REFERENCES comercios(id) ON DELETE CASCADE,
  FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);

CREATE TABLE imagenes (
  id INT NOT NULL AUTO_INCREMENT,
  Ruta_imagen_producto VARCHAR(255),
  id_producto INT,
  PRIMARY KEY (id),
  FOREIGN KEY (id_producto) REFERENCES productos(id) ON DELETE CASCADE
);

CREATE TABLE favoritos (
  id INT NOT NULL AUTO_INCREMENT,
  Fecha DATE,
  id_producto INT,
  id_usuario INT,
  PRIMARY KEY (id),
  FOREIGN KEY (id_producto) REFERENCES productos(id) ON DELETE CASCADE,
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE chat (
  id INT(11) NOT NULL,
  comercioID INT(11) NOT NULL,
  usuarioID INT(11) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE mensajes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  mensaje varchar(1000),
  fecha TIMESTAMP,
  userID INT(11),
  chatID INT(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (chatID) REFERENCES chat(id)
);

CREATE TABLE valoraciones (
  id INT NOT NULL AUTO_INCREMENT,
  estrellas FLOAT,
  id_usuario INT,
  id_comercio INT,
  PRIMARY KEY (id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
  FOREIGN KEY (id_comercio) REFERENCES comercios(id) ON DELETE CASCADE
);

