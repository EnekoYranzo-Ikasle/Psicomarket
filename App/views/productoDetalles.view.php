<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/productoDetalles.css">
<!-- Hay que hacerla vista como nike o asi -->
<div class="producto-detalles">
  <?php switch ($grupoImagenes) {
   case 0: ?>
  <div class="layout-una">
    <div class="imagen">
      <?php if (!empty($imagenes) && isset($imagenes[0]['Ruta_imagen_producto'])): ?>
        <img src="<?= $imagenes[0]['Ruta_imagen_producto'] ?>" alt="">
      <?php else: ?>
        <div class="sin-imagen">
          <p>Este producto no tiene imagen disponible.</p>
        </div>
      <?php endif; ?>
    </div>

    <div class="descripcion">
      <fieldset class="descripcion-fieldset">
        <legend><?= htmlspecialchars($producto['Nombre']) ?></legend>
        <p class="texto"><?=$producto['Descripcion'] ?></p>

        <div class="precio-contenedor">
          <?php if (!empty($producto['Precio']) && $producto['Precio'] > 0): ?>
            <span class="precio"><?= $producto['Precio'] ?> €</span>
          <?php else: ?>
            <span class="precio gratis">Gratis</span>
          <?php endif; ?>
        </div>
      </fieldset>
    </div>
  </div>
<?php break; ?>


    case 1: ?>
      <p>Diseño para 2–4 imágenes aquí...</p>
      <?php break;

    case 2: ?>
      <p>Diseño para 5–7 imágenes aquí...</p>
      <?php break;

    case 3: ?>
      <p>Diseño para más de 7 imágenes aquí...</p>
      <?php break;
  } ?>
</div>
    
    <!-- <?php require_once('layout/footer.php'); ?> -->
     