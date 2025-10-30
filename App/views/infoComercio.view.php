<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/infoComercio.css">
<link rel="stylesheet" href="assets/styles/productos.css">
<main>
  <article class="datos-comercio">
    <h2><?= $comercio['Nombre_comercio'] ?></h2>

    <div class="descripcion-comercio">
      <h4>Descripción</h4>
      <p><?= $comercio['Descripcion'] ?></p>
    </div>
  </article>
  <article>
    <a href="index.php?controller=ChatController&accion=newChat&ComercioID=<?= $comercioID ?>" class="openChat" id="<?= $comercioID ?>">Contactar<img src="assets/images/icons/send-white.png"></a>
  </article>
  <article class="listaProductos">
    <h4>Nuestros productos</h4>
    <div class="products">
      <?php if (!empty($productosDelComercio)): ?>
        <?php foreach ($productosDelComercio as $producto): ?>
          <?php include('views/components/Productos/producto.php'); ?>
        <?php endforeach ?>
      <?php else: ?>
        <p>Este comercio no tiene productos actualmente</p>
      <?php endif ?>
    </div>
  </article>
</main>
<?php require_once('layout/footer.php'); ?>
<script src="assets/scripts/productos.js"></script>
