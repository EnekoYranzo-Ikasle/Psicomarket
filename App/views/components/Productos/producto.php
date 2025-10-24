<?php
if (isset($_POST['producto'])) {
    $producto = json_decode($_POST['producto'], true);
}
?>

<div class="producto">
  <div class="imageFlag">
    <div class="images">
      <?php foreach ($producto['rutas_imagenes'] as $ruta_imagen_producto): ?>
        <img src="<?= $ruta_imagen_producto['ruta'] ?>" alt="">
      <?php endforeach; ?>
    </div>

    <?php if (count($producto['rutas_imagenes']) > 1): ?>
      <button type="button" onclick="moverCarrusel(this, -1)">‹</button>
      <button type="button" onclick="moverCarrusel(this,  1)">›</button>
    <?php endif; ?>

    <svg  width="43" height="68" viewBox="0 0 43 68" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path class="<?=$producto['id']?>" d="M13.4166 61.4516L17.4582 55.7934C18.2864 54.4484 19.5121 53.66 20.8703 53.6136C22.3611 53.5209 23.8519 54.3557 24.9451 55.8862L28.9204 61.4516C32.3657 66.275 35.6784 68.0837 38.2955 66.5533C40.8795 65.0691 42.304 60.4777 42.304 53.7064L42.304 1.76239C42.2709 0.788437 41.7077 -4.13808e-08 41.012 -8.96583e-08L1.2588 -2.84838e-06C0.563121 -2.89666e-06 -4.96128e-05 0.788434 -4.96396e-05 1.76239L-5.10698e-05 53.7064C-5.12536e-05 60.3849 1.45756 64.8836 4.07464 66.4141C6.72485 67.9446 10.0045 66.1822 13.4166 61.4516Z" fill="#F8F9FA" />
    </svg>
  </div>

  <div class="info">
    <h3 class="productName"><?= $producto['Nombre'] ?></h3>
    <p class="categoria"><?= $producto['Categoria'] ?></p>
    <span class="precio">
      <?php if ($producto['Precio'] > 0): ?>
        <?= $producto['Precio'] ?> €
      <?php else: ?>
        Gratis
      <?php endif; ?>
    </span>
  </div>
</div>
