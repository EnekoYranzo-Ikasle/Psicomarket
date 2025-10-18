  <link rel="stylesheet" href="assets/styles/anuncios.css">
  <h3>Todos los Anuncios</h3>

  <div class="filtros">
    <div class="categorias">
      <img src="assets/images/icons/categories.svg" alt="Categorias">
      Categorías
    </div>
    <div class="categorias">
      <img src="assets/images/icons/filter.svg" alt="Filtrar">
      Ordenar y filtrar
    </div>
  </div>
  <div class="anuncios-container">

    <?php foreach ($comerciosAnunciados as $comercio): ?>
      <div class="anuncio">
        <img src="<?= $comercio['Ruta_imagen_comercio'] ?>">

        <h3 class="nombre-comercio"><?= $comercio['Nombre_comercio'] ?> </h3>
        <a class="moreInfo" href="index.php?controller=ComercioController&accion=info&id=<?= $comercio['id'] ?>">Más información</a>
        <!-- <div class="descripcion">
          <?= $comercio['Descripcion'] ?>
        </div> -->

        <div class="valoracion">
          <span> <?= $comercio['Valoracion'] ?> </span>
          <img src="assets/images/icons/valoracion.svg" alt="estrella">
        </div>
      </div> <!-- cierre del .anuncio -->

    <?php endforeach ?>


  </div> <!-- cierre de .anuncios-patrocinados -->
