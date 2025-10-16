<link rel="stylesheet" href="assets/styles/carrusel.css">
<script src="assets/scripts/carrusel.js"></script>

<div class="carrusel-container">
  <button class="carrusel-btn prev" onclick="moverCarrusel(-1)">&#10094;</button>

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

  <button class="carrusel-btn next" onclick="moverCarrusel(1)">&#10095;</button>
</div>
