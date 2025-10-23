<?php
if (isset($_POST['comercio'])) {
  $comercio = json_decode($_POST['comercio'], true);
}
?>
<div class="anuncio">
  <img src="<?= $comercio['Ruta_imagen_comercio'] ?>">
  <h3 class="nombre-comercio"><?= $comercio['Nombre_comercio'] ?> </h3>
  <a class="moreInfo" href="index.php?controller=ComercioController&accion=info&id=<?= $comercio['id'] ?>">Más información</a>

  <div class="valoracion">
    <span> <?= $comercio['valoracion'] ?> </span>
    <img src="assets/images/icons/valoracion.svg" alt="estrella">
  </div>
  <?php if (isset($_POST['acciones']) && $_POST['acciones'] === 'true') : ?>
    <div class="acciones-anuncio">
      <?php include("../accionesAnuncios/accionesAnuncio.php"); ?>
    </div>
  <?php endif; ?>
</div>
