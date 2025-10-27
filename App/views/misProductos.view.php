<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/productos.css">
<link rel="stylesheet" href="assets/styles/misComercios.css">
<link rel="stylesheet" href="assets/styles/accionesAnuncioProducto.css">


<main>
    <div class="misFavoritos">
        <div class="tituloAñadirProducto">
            <h2>Mis Productos</h2>
            <button class="añadirProducto btn">
                <svg width="32" height="32" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M26.5625 15.625H1.5625C0.708333 15.625 0 14.9167 0 14.0625C0 13.2083 0.708333 12.5 1.5625 12.5H26.5625C27.4167 12.5 28.125 13.2083 28.125 14.0625C28.125 14.9167 27.4167 15.625 26.5625 15.625Z"
                        fill="#FDFEFF" />
                    <path
                        d="M14.0625 28.125C13.2083 28.125 12.5 27.4167 12.5 26.5625V1.5625C12.5 0.708333 13.2083 0 14.0625 0C14.9167 0 15.625 0.708333 15.625 1.5625V26.5625C15.625 27.4167 14.9167 28.125 14.0625 28.125Z"
                        fill="#FDFEFF" />
                </svg>
                Producto</button>
        </div>
        <?php
        if (empty($productosComercio)): ?>
            <p class="title">No hay productos</p>
        <?php else: ?>
            <div class="products">

            </div>
            
        <?php endif; ?>
    </div>
    <script src="assets/scripts/misProductos.js"></script>
</main>
<?php require_once('layout/footer.php'); ?>
