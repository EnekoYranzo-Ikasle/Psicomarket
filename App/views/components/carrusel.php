<link rel="stylesheet" href="assets/styles/carrusel.css">
<script src="assets/scripts/carrusel.js"></script>
<h2>Anuncios Patrocinados</h2>
<?php $cantidadAnunciosPatrocinados = count($comerciosPatrocinados) ?>
<?php if ($cantidadAnunciosPatrocinados > 0): ?>
  <div class="carrusel-container">
    <?php if ($cantidadAnunciosPatrocinados > 1): ?>
      <button class="carrusel-btn prev" onclick="moverCarrusel(-1)">&#10094;</button>
    <?php endif; ?>
    <div class="carrusel" id="carrusel">
      <?php foreach ($comerciosPatrocinados as $comercio): ?>
        <div class="item">
          <div class="item-content">
            <img src="<?= $comercio['Ruta_imagen_comercio'] ?>">
            <div class="overlay"></div>
            <h1><?= $comercio['Nombre_comercio'] ?></h1>
            <i>Patrocinado*</i>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php if ($cantidadAnunciosPatrocinados > 1): ?>
      <button class="carrusel-btn next" onclick="moverCarrusel(1)">&#10095;</button>
    <?php endif; ?>

  </div>
<?php else : ?>
  <div class="noComerciosPatrocinados">
    <p>No hay anuncios patrocinados</p>
  </div>
<?php endif; ?>
