<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/productos.css">
<main>
   <div class="datos-comercio">
  <h2><?= $comercio['Nombre_comercio'] ?></h2>

  <div class="descripcion-comercio">
    <fieldset>
      <legend>Descripción</legend>
      <p><?= $comercio['Descripcion'] ?></p>
    </fieldset>
  </div>
</div>
    <div class="productosComercio">
        <div class="products">

            <?php if(!empty($productosDelComercio)): ?>
                <?php foreach ($productosDelComercio as $producto):?>
                    <a href="index.php?controller=ProductoController&accion=getById&id=<?=$producto['id']?>">
                        <?php  include('views/components/Productos/producto.php'); ?>
                    </a>
                <?php endforeach?>
            <?php else: ?>
                <p>Este comercio no tiene productos actualmente</p>
            <?php endif?>

        </div>

        <a href="index.php" class="moreInfo">Volver</a>
    </div>
</main>
<?php require_once('layout/footer.php'); ?>
<script type="module" src="assets/scripts/productos.js"></script>
