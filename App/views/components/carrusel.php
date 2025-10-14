<div class="carrusel-container">
  <button class="carrusel-btn prev" onclick="moverCarrusel(-1)">&#10094;</button>

  <div class="carrusel" id="carrusel">
    <?php foreach ($comercios as $comercio): ?>
      <div class="item">
        <a href="<?= $comercio['enlace'] ?>" target="_blank">
          <img src="<?= $comercio['logo'] ?>">
          <p><?= $comercio['Nombre_comercio'] ?></p>
        </a>
      </div>
    <?php endforeach; ?>
  </div>

  <button class="carrusel-btn next" onclick="moverCarrusel(1)">&#10095;</button>
</div>
