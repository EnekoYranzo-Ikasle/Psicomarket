<div class="carrusel-container">
  <button class="carrusel-btn prev" onclick="moverCarrusel(-1)">&#10094;</button>

  <div class="carrusel" id="carrusel">
    <?php foreach ($comercios as $comercio): ?>
      <div class="item">
        <div class="item-content">
          <h1><?= $comercio['Nombre_comercio'] ?></h1>
          <img src="<?= $comercio['Ruta_imagen_comercio'] ?>">
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <button class="carrusel-btn next" onclick="moverCarrusel(1)">&#10095;</button>
  <script src="assets/scripts/carrusel.js"></script>
</div>
