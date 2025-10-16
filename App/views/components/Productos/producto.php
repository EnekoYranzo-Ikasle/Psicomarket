<div class="producto">
    <div class="imageFlag">
        <?php
        foreach ($favorito['rutas_imagenes'] as $ruta_imagen_producto): ?>
            <img src="<?= $ruta_imagen_producto['ruta'] ?>" alt="">
        <?php endforeach; ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M5 14 L19 14 L14.5 9.5 L19 5 L5 5 Z" transform="rotate(90 12 12) translate(0 2.5)" />
        </svg>
    </div>
    <div class="info">
        <h3 class="productName"><?= $favorito['Nombre'] ?></h3>
        <p class="categoria"><?= $favorito['Categoria'] ?></p>
        <span class="precio">
            <?php if ($favorito['Precio'] > 0): ?>
                <?= $favorito['Precio'] ?> €
            <?php else: ?>
                Gratis
            <?php endif; ?>
        </span>
    </div>
</div>

