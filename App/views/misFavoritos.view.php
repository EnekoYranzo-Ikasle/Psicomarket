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
                <script src="assets/scripts/misFavoritos.js"></script>
            </div>
        <?php endif; ?>

</main>


<?php require_once('layout/footer.php'); ?>
