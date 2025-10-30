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
    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="index.php?controller=ChatController&accion=newChat&ComercioID=<?= $comercioID ?>" class="openChat" id="<?= $comercioID ?>">Contactar<img src="assets/images/icons/send-white.png"></a>
      <div class="btn-reviews">
        <button id="btn-reviews-toggle" class="btn-reviews-toggle">Valorar Comercio</button>
      </div>
    <?php endif?> 
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
  <div class="estrellas" id="contenedor-estrellas">
    <form action="" class="form-valoracion">
      <button type="button" class="cerrar-review" aria-label="Cerrar">×</button>
      <fieldset class="descripcion-fieldset">
        <legend> Valoración </legend>

        <div class="estrellas-actions">
          <div>
            <img src="assets/images/icons/review-star.png" data-value="1" alt="estrella" class="estrella">
            <img src="assets/images/icons/review-star.png" data-value="2" alt="estrella" class="estrella">
            <img src="assets/images/icons/review-star.png" data-value="3" alt="estrella" class="estrella">
            <img src="assets/images/icons/review-star.png" data-value="4" alt="estrella" class="estrella">
            <img src="assets/images/icons/review-star.png" data-value="5" alt="estrella" class="estrella">
            <input type="hidden" name="valoracion">
          </div>


          <div>
            <button type="submit" class="enviar-review">Enviar</button>
          </div>
        </div>

      </fieldset>
    </form>

  </div> 
</main>
<?php require_once('layout/footer.php'); ?>
<script src="assets/scripts/productos.js"></script>
<script src="assets/scripts/valoraciones.js"></script>
