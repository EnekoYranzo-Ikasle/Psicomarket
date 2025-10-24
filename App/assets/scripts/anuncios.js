const contenedor = document.querySelector(".anuncios-container");

async function obtenerAnuncios() {
  try {
    const filtros = getFiltrosSeleccionados();
    const esPaginaMisComercios = window.location.href.includes(
      "ComercianteController"
    );
    let url = "index.php?controller=";

    if (esPaginaMisComercios) {
      url += "ComercianteController&accion=apiGetMisComercios";
    } else {
      url += "ComercioController&accion=apiGetComercios";
      const q = new URLSearchParams();
      if (filtros.busqueda) q.append("busqueda", filtros.busqueda);
      if (filtros.valoracion) q.append("valoracion", filtros.valoracion);
      if (filtros.cantidadProductos)
        q.append("cantidadProductos", filtros.cantidadProductos);
      if (filtros.categorias?.length) {
        filtros.categorias.forEach((id) => q.append("categorias[]", id));
      }
      if (q.toString()) url += `&${q.toString()}`;
    }

    const res = await fetch(url);
    const anuncios = await res.json();

    if (!anuncios.length) {
      contenedor.innerHTML = "<p>No hay anuncios todavía</p>";
      return;
    }

    contenedor.innerHTML = "";
    for (const anuncio of anuncios) {
      const formData = new FormData();
      formData.append("comercio", JSON.stringify(anuncio));
      formData.append("acciones", JSON.stringify(esPaginaMisComercios));

      const componenteSolicitado = await fetch(
        "views/components/anuncios/anuncio.php",
        {
          method: "POST",
          body: formData,
        }
      );
      const componenteRecogido = await componenteSolicitado.text();
      contenedor.innerHTML += componenteRecogido;
    }

    // Cargar el script de acciones solo si estamos en misComercios
    if (esPaginaMisComercios) {
      const script = document.createElement("script");
      script.src = "assets/scripts/accionesAnuncioProducto.js";
      script.onload = function () {
        if (typeof inicializarAcciones === "function") {
          inicializarAcciones();
        }
      };
      document.body.appendChild(script);
    }
  } catch (error) {
    console.error("Error cargando anuncios:", error);
    contenedor.innerHTML = "<p>Error al cargar los anuncios.</p>";
  }
}

const buscadorComercios = document.getElementById("busqueda");

//  Función que pinta los anuncios
async function renderAnuncios(anuncios) {
  contenedor.innerHTML = "";

  if (!anuncios.length) {
    contenedor.innerHTML = "<p>No hay anuncios disponibles.</p>";
    return;
  }

  for (const anuncio of anuncios) {
    const formData = new FormData();
    formData.append("comercio", JSON.stringify(anuncio));

    const componenteSolicitado = await fetch(
      "views/components/anuncios/anuncio.php",
      {
        method: "POST",
        body: formData,
      }
    );
    const componenteRecogido = await componenteSolicitado.text();
    contenedor.innerHTML += componenteRecogido;
  }
}

function getFiltrosSeleccionados() {
  const busqueda = (document.getElementById("busqueda")?.value || "").trim();
  const valoracion = document.getElementById("valoracion")?.value || "";
  const cantidadProductos =
    document.getElementById("cantidadProductos")?.value || "";

  const catChecks = document.querySelectorAll(
    '#lista-categorias input[type="checkbox"]:checked'
  );
  const categorias = Array.from(catChecks).map((chk) => chk.value);

  return { busqueda, valoracion, cantidadProductos, categorias };
}

// Esta función ha sido eliminada porque estaba duplicada

function configurarBuscador() {
  let timeout;
  if (!buscadorComercios) return;

  buscadorComercios.addEventListener("input", () => {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
      obtenerAnuncios();
    }, 300);
  });
}

function aplicarFiltrosBuscador() {
  document
    .getElementById("valoracion")
    ?.addEventListener("change", obtenerAnuncios);
  document
    .getElementById("cantidadProductos")
    ?.addEventListener("change", obtenerAnuncios);

  document
    .getElementById("lista-categorias")
    ?.addEventListener("change", obtenerAnuncios);

  document
    .getElementById("reestablecer")
    ?.addEventListener("click", async () => {
      document.getElementById("form-filtros")?.reset();
      document
        .querySelectorAll('#lista-categorias input[type="checkbox"]')
        .forEach((chk) => (chk.checked = false));
      await obtenerAnuncios();
    });
}
configurarBuscador();
aplicarFiltrosBuscador();
obtenerAnuncios();
