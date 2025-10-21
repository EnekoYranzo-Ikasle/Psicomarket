function moverCarrusel(btn, dir) {
  const imageFlag = btn.closest(".imageFlag");
  const track = imageFlag.querySelector(".images");
  const total = track.children.length;
  if (total <= 1) return;

  let idx = Number(track.dataset.index || 0);
  idx = (idx + dir + total) % total;

  track.style.transform = `translateX(-${idx * 100}%)`;
  track.dataset.index = idx;
}

  const svgs = document.querySelectorAll("path");
  svgs.forEach((svg) => {
    console.log(svg.classList.value)
     agregarClaseFavorito(svg)
     svg.addEventListener("click", async () => {
       const esFavorito = await verificarProductoFavorito(svg.classList.value) ? true : false;
       console.log(esFavorito);
     });
  });




async function añadirFavoritoEliminar(IDproducto, estadoProducto) {
  try {
    const res = await fetch(
      "index.php?controller=FavoritosController&accion=añadirEliminarFavorito&idProducto=" +
        IDproducto +
        "&estadoProducto=" +
        estadoProducto
    );

    if (!res.ok) {
      throw new Error("Error al añadir o eliminar favorito");
    }
  } catch (error) {
    console.error(error);
  }
}
async function verificarProductoFavorito(idProducto) {
  try {
    const res = await fetch(
      "index.php?controller=ProductoController&accion=verificarProductoFavorito&idProducto=" +
        idProducto
    );

    if (!res.ok) {
      throw new Error("Error al verificar producto favorito");
    }

    const favorito = await res.json();
    return favorito;

  } catch (error) {
    console.error(error);
  }
}

async function agregarClaseFavorito(svg){
  const esFavorito = await verificarProductoFavorito(svg.classList.value)
  console.log(svg.classList.value);
  if(esFavorito){
    svg.classList.add("favorito")
  }
}
