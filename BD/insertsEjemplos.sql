USE `psicomarket`;

-- ----------------------------
-- Usuarios
-- ----------------------------
INSERT INTO `usuarios` (`id`,`Nombre`,`Nombre_usuario`,`Apellidos`,`Contrasenna`,`num_Tel`,`Tipo`) VALUES
(1,'Ana','ana92','García','passAna2025',612345001,'usuario'),
(2,'Luis','luis_dev','Martínez','luisPwd!','612345002','comerciante'),
(3,'María','maria_shop','Rodríguez','maria123','612345003','comerciante'),
(4,'Jorge','jorge_admin','Fernández','adminJ2025','612345004','administrador'),
(5,'Clara','clara_p','Pérez','clarapass','612345005','usuario'),
(6,'Miguel','miguel87','Santos','miguelPass','612345006','comerciante'),
(7,'Sofia','sofia98','Lopez','sofiasegura','612345007','usuario'),
(8,'Pedro','pedro_m','Navarro','pedro1234','612345008','comerciante'),
(9,'Laura','laura_c','Gil','lauraPwd','612345009','usuario'),
(10,'Carlos','carlos_v','Vega','cvPass','612345010','comerciante'),
(11,'Elena','elenaweb','Ortega','elen@2025','612345011','usuario'),
(12,'Raúl','raul_store','Herrera','raulStrong','612345012','comerciante');

-- ----------------------------
-- Comercios
-- ----------------------------
INSERT INTO `comercios` (`id`,`Nombre_comercio`,`Descripcion`,`Patrocinado`,`Latitud`,`Longitud`,`Ruta_imagen_comercio`,`Valoracion`,`id_usuario`) VALUES
(1,'La Buena Taza','Cafetería con gran variedad de cafés de especialidad',0,40.4167750,-3.7037900,'uploads/comercios/cafeteria1.jpg',4.6,2),
(2,'Librería Norte','Librería independiente con selección de libros técnicos y literatura',0,40.4234410,-3.6923450,'uploads/comercios/libreria1.jpg',4.4,3),
(3,'Taller Pedro','Taller de reparación de bicicletas y venta de componentes',1,40.4153630,-3.7073980,'uploads/comercios/taller1.jpg',4.7,8),
(4,'Moda Clara','Tienda de ropa sostenible y accesorios',0,40.4180560,-3.7072220,'uploads/comercios/moda1.jpg',4.2,6),
(5,'ElectroVega','Electrónica y reparaciones rápidas',0,40.4123450,-3.7001230,'uploads/comercios/electro1.jpg',4.1,10),
(6,'Frutería La Huerta','Frutería con producto local y ecológico',0,40.4190000,-3.6950000,'uploads/comercios/fruteria1.jpg',4.5,3),
(7,'Joyería Central','Joyería y relojería con larga tradición',1,40.4145000,-3.7060000,'uploads/comercios/joyeria1.jpg',4.8,2),
(8,'Papelería Sol','Papelería, material escolar y oficina',0,40.4200000,-3.7005000,'uploads/comercios/papeleria1.jpg',4.0,12),
(9,'PanaderíaArte','Panadería artesanal con horno propio',0,40.4160000,-3.7040000,'uploads/comercios/panaderia1.jpg',4.3,6),
(10,'FitnessHub','Centro de entrenamiento y venta de suplementación',1,40.4175000,-3.7025000,'uploads/comercios/gym1.jpg',4.6,10),
(11,'Mercado Verde','Tienda saludable con productos digestivos y suplementos',0,40.4197000,-3.6997000,'uploads/comercios/mercado1.jpg',4.2,12),
(12,'TécnicaPlus','Servicio técnico doméstico y venta de repuestos',0,40.4112000,-3.7082000,'uploads/comercios/tecnica1.jpg',4.0,8);


-- ----------------------------
-- Productos
-- ----------------------------
INSERT INTO `productos` (`id`,`Nombre`,`Descripcion`,`Categoria`,`Estado`,`id_comercio`) VALUES
(1,'Café Espresso 250g','Café tostado de mezcla selecta - bolsas de 250g','Alimentos','nuevo',1),
(2,'Taza de cerámica','Taza artesanal 300ml','Hogar','nuevo',1),
(3,'Clean Code (libro)','Manual sobre buenas prácticas de programación','Libros','nuevo',2),
(4,'Novela "La tarde"','Novela contemporánea en español','Libros','nuevo',2),
(5,'Cambio de cadena','Servicio completo de cambio de cadena','Servicios','nuevo',3),
(6,'Neumático 26"','Neumático para MTB tamaño 26 pulgadas','Deportes','nuevo',3),
(7,'Vestido veraniego S','Vestido algodón orgánico talla S','Ropa','nuevo',4),
(8,'Camiseta básica M','Camiseta 100% algodón talla M','Ropa','nuevo',4),
(9,'Cargador USB-C','Cargador rápido 30W','Electrónica','nuevo',5),
(10,'Pantalla 24"','Monitor 24 pulgadas FullHD','Electrónica','nuevo',5),
(11,'Cesta frutal mediana','Selección de frutas de temporada','Alimentos','nuevo',6),
(12,'Mermelada casera 300g','Mermelada artesanal de fresa','Alimentos','nuevo',6),
(13,'Anillo de plata','Anillo sencillo en plata 925','Joyería','nuevo',7),
(14,'Reloj clásico','Reloj analógico con correa de cuero','Joyería','nuevo',7),
(15,'Cuaderno A4 80 hojas','Cuaderno espiral A4 80 hojas','Papelería','nuevo',8),
(16,'Bolígrafo gel','Pack 3 bolígrafos de gel','Papelería','nuevo',8),
(17,'Baguette artesanal','Pan recién horneado 300g','Alimentos','nuevo',9),
(18,'Croissant mantequilla','Croissant tradicional','Alimentos','nuevo',9),
(19,'Plan de entrenamiento 12 semanas','Programa personalizado de entrenamiento','Servicios','nuevo',10),
(20,'Proteína whey 1kg','Suplemento proteico sabor vainilla','Salud','nuevo',10),
(21,'Kale orgánico 200g','Kale lavado y envasado','Alimentos','nuevo',11),
(22,'Levadura natural 200g','Levadura para panadería casera','Alimentos','nuevo',11),
(23,'Reparación lavadora','Diagnóstico y reparación de lavadora','Servicios','nuevo',12),
(24,'Juego de destornilladores','Set 6 piezas magnéticas','Hogar','nuevo',12),
(25,'Guantes ciclismo','Guantes para manos con gel','Deportes','nuevo',3),
(26,'Libro infantil "Aventuras"','Cuento ilustrado para 4-8 años','Libros','nuevo',2),
(27,'Bolso sostenible','Bolso hecho de materiales reciclados','Ropa','nuevo',4),
(28,'Cable HDMI 2m','Cable HDMI 2 metros alta velocidad','Electrónica','nuevo',5),
(29,'Pack frutas premium','Caja regalo con frutas seleccionadas','Alimentos','nuevo',6),
(30,'Mantenimiento reloj','Servicio oficial de mantenimiento y pulido','Servicios','nuevo',7);

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
-- Mensajes
-- ------------
INSERT INTO `mensajes` (`id`, `mensaje`, `fecha`, `userID`, `chatID`) VALUES
(1, '¿Hola teneis disponible el vestido azul en talla M?', '2025-10-17 11:59:00', 1, 1),
(2, 'Hola', '2025-10-17 12:00:00', 1, 2),
(3, 'Si, tenemos 10 unidades en stock', '2025-10-17 17:20:00', 6, 1),
(4, 'Perfecto, reservame uno para el jueves a la tarde. Gracias', '2025-10-18 12:11:00', 1, 1);




--------------------------------------------------------------------------------------------------------
-------------------------CATEGORIAS---------------------------------------------------------------------
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

COMMIT;


