<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/productos.css">
<main>
    <div class="misFavoritos">
        <h1>Mis favoritos</h1>
        <?php
        if (empty($favoritos)): ?>
            <p class="title">No hay favoritos</p>
        <?php else: ?>
            <div class="products">
                <?php foreach ($favoritos as $favorito): ?>
                    <?php include('components/Productos/producto.php'); ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

</main>

<script src="assets/scripts/productos.js"></script>

<?php require_once('layout/footer.php'); ?>
