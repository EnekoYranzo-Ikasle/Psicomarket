<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/productos.css">
<main>
    <div class="productosComercio">
        <div class="products">

            <?php
            if(!empty($productosDelComercio)){
                foreach ($productosDelComercio as $producto){
                    include('views/components/Productos/producto.php');
                }
            }else{
                ?>
                    <p>Este comercio no tiene productos actualemente</p>
                <?php
            }
            ?>
            <a href="index.php" class="moreInfo">Volver</a>
    </div>
</main>
<?php require_once('layout/footer.php'); ?>
