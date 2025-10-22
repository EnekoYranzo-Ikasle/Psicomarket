<link rel="stylesheet" href="assets/styles/anuncios.css">
<h3>Todos los Anuncios</h3>

<div class="filtros">
  <!-- <div class="categorias">
    <img src="assets/images/icons/categories.svg" alt="Categorias">
    Categorías
  </div> -->
  <div class="categorias">
    <img src="assets/images/icons/filter.svg" alt="Filtrar">
    Ordenar y filtrar
    <div id="filtro-container" class="filtros oculto">
      <form id="form-filtros">
        <input type="text" name="busqueda" placeholder="Buscar Comercio">
        <select name="valoracion" id="valoracion">
          <option value="" disabled selected> Ordenar por valoración </option>
          <option value="mayorMenor"> Ordenar de mayor a menor</option>
          <option value="menorMayor"> Ordenar de menor a mayor</option>
        </select>
        <select name="cantidadProductos" id="cantidadProductos">
          <option value="" disabled selected> Ordenar por cantidad de productos </option>
          <option value="mayorMenor"> Ordenar de mayor a menor</option>
          <option value="menorMayor"> Ordenar de menor a mayor</option>
        </select>
        <div class="select-categorias">
          <div class="select-btn" id="abrir-categorias">
            <span id="texto-categoria">Seleccionar categorías</span>
            <img src="assets/images/icons/filter.svg" alt="icono filtro">
          </div>

          <div class="dropdown oculto" id="dropdown-categorias">
            <input type="text" id="buscar-categoria" placeholder="Buscar categoría...">

            <ul id="lista-categorias">
              <?php foreach ($categorias as $categoria): ?>
                <li>
                  <label>
                    <input type="checkbox" value="<?= $categoria['id'] ?>">
                    <?= $categoria['nombre'] ?>
                  </label>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="btn-reestablecer">
          <input type="button" value="Reestablecer filtros" name="reestablecer" id="reestablecer">
        </div>

    </div>


    </form>

  </div>

</div>
</div>

<div class="anuncios-container">

</div>

<script src="assets/scripts/anuncios.js"></script>
<script src="assets/scripts/filtrar.js"></script>