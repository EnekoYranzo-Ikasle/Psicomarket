const contenedor = document.querySelector(".products");

async function obtenerFavoritos() {
  try {
    const params = new URLSearchParams(window.location.search);
    const comercioId = params.get("id");
    const res = await fetch(
      "index.php?controller=ProductoController&accion=obtenerProductos&comercioid=" +
        comercioId
    );
    const productos = await res.json();

    for (const producto of productos) {
      const formData = new FormData();
      formData.append("producto", JSON.stringify(producto));
      if (window.location.pathname.includes("misProductos.view.php") ||
          window.location.search.includes("ProductoController")) {
        formData.append("gestionarProductos", true);
      }

      const componenteSolicitado = await fetch(
        "views/components/Productos/producto.php",
        {
          method: "POST",
          body: formData,
        }
      );
      const componenteRecogido = await componenteSolicitado.text();
      contenedor.innerHTML += componenteRecogido;
    }
    const script = document.createElement("script");
    script.src = "assets/scripts/productos.js";

    contenedor.appendChild(script);

      const script2 = document.createElement('script');
      script2.src = 'assets/scripts/accionesAnuncioProducto.js';
      script2.onload = function () {
        if (typeof inicializarAcciones === 'function') {
          inicializarAcciones();
        }
      };
      document.body.appendChild(script2);
    document.body.appendChild(script);
  } catch (error) {
    console.error("Error cargando productos:", error);
    contenedor.innerHTML = "<p>Error al cargar los productos.</p>";
  }
}
if (contenedor) {
  obtenerFavoritos();
}
