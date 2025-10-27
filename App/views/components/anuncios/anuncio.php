<?php
if (isset($_POST['comercio'])) {
  $comercio = json_decode($_POST['comercio'], true);
}
?>
<div class="anuncio">
  <div class="imagenes">
    <img src="<?= $comercio['Ruta_imagen_comercio'] ?>">
  </div>
  <h3 class="nombre-comercio"><?= $comercio['Nombre_comercio'] ?> </h3>
  <a class="moreInfo" href="index.php?controller=ComercioController&accion=info&id=<?= $comercio['id'] ?>">Más información</a>

  <div class="valoracion">
    <span> <?= number_format($comercio['valoracion'] ?? 0, 1, '.', '');  ?> </span>
    <img src="assets/images/icons/valoracion.svg" alt="estrella">
  </div>
  <?php if (isset($_POST['acciones']) && $_POST['acciones'] === 'true') : ?>
    <div class="acciones-anuncio">
      <?php include("../accionesAnuncios/accionesAnuncio.php"); ?>
    </div>
  <?php endif; ?>
  <div class="overlay">
    <div class="editarAnuncio">

        <input type="text" name="nombre" placeholder="Nuevo nombre">
        <input type="text" name="descripcion" placeholder="Nueva descripción">
        <div class="botones">
          <button class="confirmarEditarAnuncio">Guardar cambios</button>
          <button class="cancelarEditarAnuncio">Cancelar</button>
        </div>
    </div>
  </div>
  <div class="overlay2">
    <div class="validarEliminarAnuncio <?= $comercio['id'] ?> ">
      <p>¿Estás seguro de que deseas eliminar este anuncio?</p>
      <div class="botones">
        <button class="confirmarEliminarAnuncio">Sí, eliminar</button>
        <button class="cancelarEliminarAnuncio">Cancelar</button>
      </div>
    </div>
  </div>
</div>
