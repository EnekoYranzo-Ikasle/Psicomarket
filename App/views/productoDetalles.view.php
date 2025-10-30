<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/productoDetalles.css">
<main>
  <div class="producto-detalles">
    <?php if (count($imagenes) <= 1): ?>
      <div class="layout-una">
        <div class="imagen">
          <?php if (!empty($imagenes)): ?>
            <img src="<?= $imagenes[0]['Ruta_imagen_producto'] ?>" alt="">
          <?php else: ?>
            <div class="sin-imagen">
              <p>Este producto no tiene imagen disponible.</p>
            </div>
          <?php endif; ?>
        </div>

        <div class="descripcion">
          <fieldset class="descripcion-fieldset">
            <legend><?= $producto['Nombre'] ?></legend>
            <p class="texto"><?= $producto['Descripcion'] ?></p>

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

    <?php else: ?>

      <div class="layout-una">
        <div class="imagen">
          <div class="botones-detalles">
            <div class="btn-volver">
              <a class="volver-detalles" href="index.php?controller=ComercioController&accion=info&id=<?= $comercio['id'] ?>">Volver</a>
            </div>
          </div>


          <div class="imagen-principal">
            <img id="imagen-activa" src="<?= $imagenes[0]['Ruta_imagen_producto'] ?>" alt="">
          </div>


          <div class="thumbnails">
            <?php foreach ($imagenes as $index => $imagen): ?>
              <img
                src="<?= $imagen['Ruta_imagen_producto'] ?>"
                class="thumb <?= $index === 0 ? 'active' : '' ?>"
                data-index="<?= $index ?>"
                alt="">
            <?php endforeach; ?>
          </div>
        </div>


        <div class="descripcion">
          <fieldset class="descripcion-fieldset">
            <legend><?= $producto['Nombre'] ?></legend>
            <p class="texto-categoria"><?= $categoria['nombre'] ?></p>
            <p class="texto"><?= $producto['Descripcion'] ?></p>

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
    <?php endif; ?>
  </div>
</main>

<?php require_once('layout/footer.php'); ?>
<script src="assets/scripts/productoDetalles.js"></script>