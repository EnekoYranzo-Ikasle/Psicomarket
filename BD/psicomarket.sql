CREATE DATABASE IF NOT EXISTS psicomarket;
USE psicomarket;

CREATE TABLE usuarios (
  id INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(50) NOT NULL,
  Apellidos VARCHAR(50) NOT NULL,
  Email VARCHAR(255) NOT NULL UNIQUE,
  Contrasenna VARCHAR(255) NOT NULL,
  num_Tel INT NOT NULL,
  Tipo ENUM('usuario','comerciante','administrador') NOT NULL DEFAULT 'usuario',
  UserImagePath VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE comercios (
  id INT NOT NULL AUTO_INCREMENT,
  Nombre_comercio VARCHAR(50) NOT NULL,
  Descripcion VARCHAR(1000) NOT NULL,
  Patrocinado TINYINT(1) NOT NULL,
  Latitud DECIMAL(10,7) NOT NULL,
  Longitud DECIMAL(10,7) NOT NULL,
  Ruta_imagen_comercio VARCHAR(255) NOT NULL,
  id_usuario INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE categorias (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE productos (
  id INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(50) NOT NULL,
  Descripcion VARCHAR(100) NOT NULL,
  Estado VARCHAR(20) NOT NULL,
  id_comercio INT NOT NULL,
  Precio FLOAT NOT NULL,
  id_categoria INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_comercio) REFERENCES comercios(id) ON DELETE CASCADE,
  FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);

CREATE TABLE imagenes (
  id INT NOT NULL AUTO_INCREMENT,
  Ruta_imagen_producto VARCHAR(255) NOT NULL,
  id_producto INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_producto) REFERENCES productos(id) ON DELETE CASCADE
);

CREATE TABLE favoritos (
  id INT NOT NULL AUTO_INCREMENT,
  Fecha DATE NOT NULL,
  id_producto INT NOT NULL,
  id_usuario INT NOT NULL,
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
  mensaje varchar(1000) NOT NULL,
  fecha TIMESTAMP NOT NULL,
  userID INT(11) NOT NULL,
  chatID INT(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (chatID) REFERENCES chat(id)
);

CREATE TABLE valoraciones (
  id INT NOT NULL AUTO_INCREMENT,
  estrellas FLOAT NOT NULL,
  id_usuario INT NOT NULL,
  id_comercio INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
  FOREIGN KEY (id_comercio) REFERENCES comercios(id) ON DELETE CASCADE
);

