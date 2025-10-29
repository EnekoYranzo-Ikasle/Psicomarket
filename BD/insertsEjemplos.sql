USE `psicomarket`;

-- ----------------------------
-- Usuarios
-- ----------------------------
INSERT INTO `usuarios` (`id`, `Nombre`, `Apellidos`, `Email`, `Contrasenna`, `num_Tel`, `Tipo`, `UserImagePath`) VALUES
(1, 'Ana', 'García', 'ana.garcia@email.com', '$2y$10$TOhDnPutfyH1lu3KMCx/EO4sz./kz.Gu43toWz0ExXX3wwzBVXSvq', 612345001, 'usuario', ''),
(2, 'Luis', 'Martínez', 'luis.martinez@email.com', '$2y$10$jg.U4rrGVFTlE4MVkoGMMe1BhmodMTsSr.SOZSyAB9AKS/b/XuzAq', 612345002, 'comerciante', ''),
(3, 'María', 'Rodríguez', 'maria.rodriguez@email.com', '$2y$10$MIISA7Ash5kcQoSPm8xBk.E80xzRV0qIQpoJr5ZFqswP20XikMLxu', 612345003, 'comerciante', ''),
(4, 'Jorge', 'Fernández', 'jorge.fernandez@email.com', '$2y$10$kpoq3PaNFi7HjhdkioRqC.FXwPjVGmVgxiekVcAPvg1ky1Hkxkpje', 612345004, 'administrador', ''),
(5, 'Clara', 'Pérez', 'clara.perez@email.com', '$2y$10$.90tes7FqTjGGrz.3tq7n.nbYhC$2y$10$ClN0HOgObgypnz.J5ZtjZuOsGXtXeS3jkHpzF86vHDYS14gZqZK', 612345005, 'usuario', ''),
(6, 'Miguel', 'Santos', 'miguel.santos@email.com', 'O5DxpjB3fBoBF5rurUAyBe0fRtBy', 612345006, 'comerciante', ''),
(7, 'Sofia', 'Lopez', 'sofia.lopez@email.com', '$2y$10$4mfUnZ63oS2ofGKIGq3rZ.boU01fek6ucWil6Xp7xauhq/hAo5PkS', 612345007, 'usuario', ''),
(8, 'Pedro', 'Navarro', 'pedro.navarro@email.com', '$2y$10$eqFoHZr3gcdvIaV4ctVva.7r4HJS1eSrDRRpaKkRIEy/0KOLgJv2O', 612345008, 'comerciante', ''),
(9, 'Laura', 'Gil', 'laura.gil@email.com', '$2y$10$LjpmRO61lXhNUZnFS82L3OUX3AHkZK0xqqyKdgflMXQLLf5/XB9pq', 612345009, 'usuario', ''),
(10, 'Carlos', 'Vega', 'carlos.vega@email.com', '$2y$10$7SkojHpgf/ANV6PCd3yXsuX12ZK7X4ncLQSKdYzCVkT0Wypdgs7yy', 612345010, 'comerciante', ''),
(11, 'Elena', 'Ortega', 'elena.ortega@email.com', '$2y$10$edg4Sd7YRIL8pcUMlYHx1.nk/FULyAsuHSyUYtR2EsvGhwfG0bMSm', 612345011, 'usuario', ''),
(12, 'Raúl', 'Herrera', 'raul.herrera@email.com', '$2y$10$zlWqLy8gRmOznuRuQyabxe9U3v2IrPWd.y0SXo/TaPXd/nRWqu3wG', 612345012, 'comerciante', ''),
(13, 'Eneko', 'Yranzo', 'eneko.yranzo@email.com', '$2y$10$T2tgophvhd7AE/N9xqsS0eV/IUJFNwYB2yp57p6nZqnewcIt68GEC', 123456789, 'administrador', ''),
(14, 'Ibai', 'Lopez', 'ibai.lopez@email.com', '$2y$10$BuExTiwc58GK2fOOVlkb8eEmCZiB0xtn7xDqrmlQvXE/4rWm3AJNW', 123456789, 'administrador', ''),
(15, 'Aimar', 'Medina', 'aimar.medina@email.com', '$2y$10$pbMgfTbYBrvbPVAvcIuVm.creAjJegEtDOBFE6uw1IcFdd4JLhXj.', 123456789, 'administrador', '');

-- ----------------------------
-- Comercios
-- ----------------------------
INSERT INTO `comercios` (`id`, `Nombre_comercio`, `Descripcion`, `Patrocinado`, `Latitud`, `Longitud`, `Ruta_imagen_comercio`, `id_usuario`) VALUES
(1,'La Buena Taza','Cafetería con gran variedad de cafés de especialidad',0,42.8467,-2.6727,'uploads/comercios/cafeteria1.jpg',2),  -- Centro
(2,'Librería Norte','Librería independiente con selección de libros técnicos y literatura',0,42.8485,-2.6710,'uploads/comercios/libreria1.jpg',3),  -- Ensanche
(3,'Taller Pedro','Taller de reparación de bicicletas y venta de componentes',1,42.8430,-2.6750,'uploads/comercios/taller1.jpg',8),  -- Judimendi
(4,'Moda Clara','Tienda de ropa sostenible y accesorios',0,42.8400,-2.6810,'uploads/comercios/moda1.jpg',6),  -- Zaramaga
(5,'ElectroVega','Electrónica y reparaciones rápidas',0,42.8610,-2.6720,'uploads/comercios/electro1.jpg',10),  -- Salburua
(6,'Frutería La Huerta','Frutería con producto local y ecológico',0,42.8435,-2.6850,'uploads/comercios/fruteria1.jpg',3),  -- Adurza
(7,'Joyería Central','Joyería y relojería con larga tradición',1,42.8490,-2.6760,'uploads/comercios/joyeria1.jpg',2),  -- Ensanche norte
(8,'Papelería Sol','Papelería, material escolar y oficina',0,42.8315,-2.6670,'uploads/comercios/papeleria1.jpg',12),  -- Zabalgana
(9,'PanaderíaArte','Panadería artesanal con horno propio',0,42.8475,-2.6610,'uploads/comercios/panaderia1.jpg',6),  -- Arriaga
(10,'FitnessHub','Centro de entrenamiento y venta de suplementación',1,42.8540,-2.6590,'uploads/comercios/gym1.jpg',10),  -- El Pilar
(11,'Mercado Verde','Tienda saludable con productos digestivos y suplementos',0,42.8555,-2.6680,'uploads/comercios/mercado1.jpg',12),  -- Salburua norte
(12,'TécnicaPlus','Servicio técnico doméstico y venta de repuestos',0,42.8380,-2.6705,'uploads/comercios/tecnica1.jpg',8);  -- Lakua


-- ------------
-- Categorias
-- ------------
INSERT INTO categorias (nombre) VALUES
('Electrónica'),
('Ordenadores y portátiles'),
('Teléfonos móviles y tablets'),
('Accesorios tecnológicos'),
('Audio y vídeo'),
('Fotografía y cámaras'),
('Televisores y proyectores'),
('Videojuegos y consolas'),
('Tecnología inteligente (IoT y domótica)'),
('Moda para mujer'),
('Moda para hombre'),
('Ropa infantil'),
('Calzado'),
('Complementos de moda'),
('Relojes y joyería'),
('Belleza y cuidado personal'),
('Maquillaje'),
('Perfumes y fragancias'),
('Cuidado del cabello'),
('Salud y bienestar'),
('Vitaminas y suplementos'),
('Productos naturales'),
('Hogar y cocina'),
('Muebles'),
('Decoración'),
('Iluminación'),
('Electrodomésticos'),
('Organización y almacenamiento'),
('Limpieza del hogar'),
('Jardín y exteriores'),
('Herramientas y ferretería'),
('Deportes y fitness'),
('Bicicletas y accesorios'),
('Camping y aventura'),
('Natación y playa'),
('Juguetes y juegos'),
('Bebés y maternidad'),
('Mascotas'),
('Oficina y papelería'),
('Arte y manualidades'),
('Libros y revistas'),
('Instrumentos musicales'),
('Automoción y motocicletas'),
('Recambios y accesorios para vehículos'),
('Seguridad y vigilancia'),
('Productos ecológicos y sostenibles'),
('Alimentación y bebidas'),
('Vinos y licores'),
('Regalos y ocasiones especiales'),
('Ofertas y liquidaciones');


-- ----------------------------
-- Productos
-- ----------------------------
INSERT INTO `productos` (`id`,`Nombre`,`Descripcion`,`Precio`,`id_comercio`,`id_categoria`) VALUES
(1,'Café Espresso 250g','Café tostado de mezcla selecta - bolsas de 250g',0,1,45),
(2,'Taza de cerámica','Taza artesanal 300ml',0,1,46),
(3,'Clean Code (libro)','Manual sobre buenas prácticas de programación',0,2,42),
(4,'Novela "La tarde"','Novela contemporánea en español',0,2,42),
(5,'Cambio de cadena','Servicio completo de cambio de cadena',0,3,48),
(6,'Neumático 26"','Neumático para MTB tamaño 26 pulgadas',0,3,48),
(7,'Vestido veraniego S','Vestido algodón orgánico talla S',0,4,10),
(8,'Camiseta básica M','Camiseta 100% algodón talla M',0,4,11),
(9,'Cargador USB-C','Cargador rápido 30W',0,5,4),
(10,'Pantalla 24"','Monitor 24 pulgadas FullHD',0,5,5),
(11,'Cesta frutal mediana','Selección de frutas de temporada',0,6,45),
(12,'Mermelada casera 300g','Mermelada artesanal de fresa',0,6,45),
(13,'Anillo de plata','Anillo sencillo en plata 925',0,7,15),
(14,'Reloj clásico','Reloj analógico con correa de cuero',0,7,15),
(15,'Cuaderno A4 80 hojas','Cuaderno espiral A4 80 hojas',0,8,38),
(16,'Bolígrafo gel','Pack 3 bolígrafos de gel',0,8,38),
(17,'Baguette artesanal','Pan recién horneado 300g',0,9,45),
(18,'Croissant mantequilla','Croissant tradicional',0,9,45),
(19,'Plan de entrenamiento 12 semanas','Programa personalizado de entrenamiento',0,10,31),
(20,'Proteína whey 1kg','Suplemento proteico sabor vainilla',0,10,21),
(21,'Kale orgánico 200g','Kale lavado y envasado',0,11,22),
(22,'Levadura natural 200g','Levadura para panadería casera',0,11,45),
(23,'Reparación lavadora','Diagnóstico y reparación de lavadora',0,12,26),
(24,'Juego de destornilladores','Set 6 piezas magnéticas',0,12,30),
(25,'Guantes ciclismo','Guantes para manos con gel',0,3,31),
(26,'Libro infantil "Aventuras"','Cuento ilustrado para 4-8 años',0,2,42),
(27,'Bolso sostenible','Bolso hecho de materiales reciclados',0,4,14),
(28,'Cable HDMI 2m','Cable HDMI 2 metros alta velocidad',0,5,4),
(29,'Pack frutas premium','Caja regalo con frutas seleccionadas',0,6,45),
(30,'Mantenimiento reloj','Servicio oficial de mantenimiento y pulido',0,7,15);


-- ----------------------------
-- Imágenes de productos
-- ----------------------------
INSERT INTO `imagenes` (`id`,`Ruta_imagen_producto`,`id_producto`) VALUES
(1,'uploads/productos/cafe_250.jpg',1),
(2,'uploads/productos/taza_ceramica.jpg',2),
(3,'uploads/productos/clean_code.jpg',3),
(4,'uploads/productos/la_tarde.jpg',4),
(5,'uploads/productos/cambio_cadena.jpg',5),
(6,'uploads/productos/neumatico26.jpg',6),
(7,'uploads/productos/vestido_verano.jpg',7),
(8,'uploads/productos/camiseta_basica.jpg',8),
(9,'uploads/productos/cargador_30w.jpg',9),
(10,'uploads/productos/monitor24.jpg',10),
(11,'uploads/productos/cesta_frutas.jpg',11),
(12,'uploads/productos/mermelada_fresa.jpg',12),
(13,'uploads/productos/anillo_plata.jpg',13),
(14,'uploads/productos/reloj_clasico.jpg',14),
(15,'uploads/productos/cuaderno_a4.jpg',15),
(16,'uploads/productos/boligrafo_pack.jpg',16),
(17,'uploads/productos/baguette.jpg',17),
(18,'uploads/productos/croissant.jpg',18),
(19,'uploads/productos/plan_entreno.jpg',19),
(20,'uploads/productos/whey1kg.jpg',20),
(21,'uploads/productos/kale.jpg',21),
(22,'uploads/productos/levadura.jpg',22),
(23,'uploads/productos/servicio_lavadora.jpg',23),
(24,'uploads/productos/destornilladores.jpg',24),
(25,'uploads/productos/guantes_ciclismo.jpg',25),
(26,'uploads/productos/libro_infantil.jpg',26),
(27,'uploads/productos/bolso_sostenible.jpg',27),
(28,'uploads/productos/hdmi_2m.jpg',28),
(29,'uploads/productos/pack_frutas.jpg',29),
(30,'uploads/productos/mantenimiento_reloj.jpg',30),
-- imágenes adicionales para algunos productos (variedad)
(31,'uploads/productos/cafe_250_side.jpg',1),
(32,'uploads/productos/taza_ceramica_box.jpg',2),
(33,'uploads/productos/monitor24_box.jpg',10),
(34,'uploads/productos/whey1kg_close.jpg',20),
(35,'uploads/productos/anillo_plata_box.jpg',13),
(36,'uploads/productos/vestido_verano_detail.jpg',7),
(37,'uploads/productos/camiseta_basica_fold.jpg',8),
(38,'uploads/productos/bolso_sostenible_detail.jpg',27),
(39,'uploads/productos/pack_frutas_open.jpg',29),
(40,'uploads/productos/mermelada_jar.jpg',12),
(41,'uploads/productos/neumatico26_tread.jpg',6),
(42,'uploads/productos/guantes_ciclismo_pair.jpg',25),
(43,'uploads/productos/cargador_30w_box.jpg',9),
(44,'uploads/productos/cuaderno_a4_cover.jpg',15),
(45,'uploads/productos/libro_infantil_open.jpg',26),
(46,'uploads/productos/baguette_close.jpg',17),
(47,'uploads/productos/reloj_clasico_box.jpg',14),
(48,'uploads/productos/hdmi_plug.jpg',28);


-- ----------------------------
-- Favoritos
-- ----------------------------
INSERT INTO `favoritos` (`id`,`Fecha`,`id_producto`,`id_usuario`) VALUES
(1,'2025-09-01',1,1),
(2,'2025-09-02',3,1),
(3,'2025-09-03',11,5),
(4,'2025-09-04',20,7),
(5,'2025-09-05',9,9),
(6,'2025-09-06',2,11),
(7,'2025-09-06',27,1),
(8,'2025-09-07',29,5),
(9,'2025-09-08',15,7),
(10,'2025-09-09',25,1),
(11,'2025-09-10',6,9),
(12,'2025-09-11',13,11),
(13,'2025-09-12',19,1),
(14,'2025-09-13',4,5),
(15,'2025-09-14',10,7),
(16,'2025-09-15',22,9),
(17,'2025-09-16',30,11),
(18,'2025-09-17',8,1),
(19,'2025-09-18',28,5),
(20,'2025-09-19',17,7);

-- ----------------------------
-- Valoraciones
-- ----------------------------
INSERT INTO `valoraciones` (`id`,`estrellas`,`id_usuario`,`id_comercio`) VALUES
(1,5.0,1,1),
(2,4.0,5,1),
(3,4.5,7,1),
(4,4.0,1,2),
(5,5.0,9,2),
(6,4.8,11,7),
(7,4.7,1,3),
(8,4.9,5,3),
(9,4.2,7,4),
(10,3.9,9,5),
(11,4.3,11,6),
(12,4.6,1,6),
(13,4.1,5,8),
(14,4.4,7,9),
(15,5.0,1,7),
(16,4.0,9,10),
(17,4.5,11,10),
(18,3.8,5,12),
(19,4.0,7,11),
(20,4.2,1,4),
(21,4.7,9,3),
(22,4.9,5,7),
(23,3.7,11,5),
(24,4.4,1,8),
(25,4.6,7,6),
(26,4.1,9,2),
(27,4.0,5,1),
(28,4.8,11,3),
(29,4.3,1,12),
(30,4.5,7,10);

-- ------------
-- Chat
-- ------------

INSERT INTO `chat` (`id`, `comercioID`, `usuarioID`) VALUES
(1, 4, 1),  -- Ejemplo: chat entre la tienda Moda Clara y la usuaria Ana
(2, 1, 1);  -- Ejemplo: chat entre La Buena Taza y Ana

-- ------------
-- Mensajes
-- ------------
INSERT INTO `mensajes` (`id`, `mensaje`, `fecha`, `userID`, `chatID`) VALUES
(1, '¿Hola teneis disponible el vestido azul en talla M?', '2025-10-17 11:59:00', 1, 1),
(2, 'Hola', '2025-10-17 12:00:00', 1, 2),
(3, 'Si, tenemos 10 unidades en stock', '2025-10-17 17:20:00', 6, 1),
(4, 'Perfecto, reservame uno para el jueves a la tarde. Gracias', '2025-10-18 12:11:00', 1, 1);



COMMIT;


