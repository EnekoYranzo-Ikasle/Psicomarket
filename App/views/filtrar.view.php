<link rel="stylesheet" href="assets/styles/anuncios.css">

 <div class="categorias">
    <label for="filtro-container" id="toggle-filtros">
      <img src="assets/images/icons/filter.svg" alt="Filtrar">
      <span> Ordenar y filtrar</span>
    </label>
    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar Comercio">
    <div id="filtro-container" class="filtros oculto">
      <form id="form-filtros">
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
            <div id="categorias-seleccionadas"></div>
            <span id="texto-categoria">Seleccionar categorías</span>
            <img src="assets/images/icons/categories.svg" alt="icono filtro">
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
        <div class="botones">
          <div class="btn-reestablecer">
            <input type="button" value="Reestablecer filtros" name="reestablecer" id="reestablecer">
          </div>
        </div>
        <!-- <div class="btn-filtrar">
          <button type="submit">Aplicar filtros</button>

        </div> -->

    </div>


    </form>

  </div>

</div>
</div>