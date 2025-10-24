const contenedor = document.querySelector(".anuncios-container");


async function obtenerAnuncios() {
  try {
    let funcion = "";
    let controller = "";
    const esPaginaMisComercios = window.location.href.includes(
      "ComercianteController"
    );
    if (esPaginaMisComercios) {
      controller = "ComercianteController";
      funcion = "apiGetMisComercios";
    } else {
      controller = "ComercioController";
      funcion = "apiGetComercios";
    }
    const res = await fetch(
      "index.php?controller=" + controller + "&accion=" + funcion
    );
    const anuncios = await res.json();

    // const res3 = await fetch("index.php?controller=ComercianteController&accion=apiGetMisComercios");
    // const misComercios = await res3.json();

    // comerciosDelUsuario = [];
    //     Array.from(misComercios).forEach(comercio => {
    //     comerciosDelUsuario.push({ 'id': comercio.id ,'idPropietario': comercio.id_usuario });

    // });
    // console.log(comerciosDelUsuario);

    if (!anuncios.length) {
      contenedor.innerHTML = "<p> No hay anuncios todavía </p>";
      return;
    }

    for (const anuncio of anuncios) {
      const esPaginaMisComercios = window.location.href.includes(
        "ComercianteController"
      );
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
    const script = document.createElement("script");
    script.src = "assets/scripts/accionesAnuncioProducto.js";
    script.onload = function () {
      inicializarAcciones();
    };
    document.body.appendChild(script);
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

async function obtenerAnuncios() {
  try {
    const filtros = getFiltrosSeleccionados(); //coger los filtros para iterar en los if

    const q = new URLSearchParams();
    //en cada if: si el array de filtros tiene ese parametro, añadelo a la url
    if (filtros.busqueda) q.append("busqueda", filtros.busqueda);
    if (filtros.valoracion) q.append("valoracion", filtros.valoracion);
    if (filtros.cantidadProductos)
      q.append("cantidadProductos", filtros.cantidadProductos);
    if (filtros.categorias.length) {
      filtros.categorias.forEach((id) => q.append("categorias[]", id));
    }

    //hace el fetch y  si no tiene nada pone ''(vacio y devuelve todos los auncios por ende)
    const res = await fetch(
      `index.php?controller=ComercioController&accion=apiGetComercios${
        q.toString() ? `&${q.toString()}` : ""
      }`
    );

    const anuncios = await res.json();
    await renderAnuncios(anuncios); //llamar a la función de pintar los anuncios en base a la respuesta del fetch
  } catch (error) {
    console.error("Error cargando anuncios:", error);
    contenedor.innerHTML = "<p>Error al cargar los anuncios.</p>";
  }
}

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


function aplicarFiltrosBuscador(){

document.getElementById('valoracion')?.addEventListener('change', obtenerAnuncios);
document.getElementById('cantidadProductos')?.addEventListener('change', obtenerAnuncios);


document.getElementById('lista-categorias')?.addEventListener('change', obtenerAnuncios);

document.getElementById('reestablecer')?.addEventListener('click', async () => {
  document.getElementById('form-filtros')?.reset();
  document.querySelectorAll('#lista-categorias input[type="checkbox"]').forEach(chk => chk.checked = false);
  await obtenerAnuncios();
});
 
}
configurarBuscador();
aplicarFiltrosBuscador();
obtenerAnuncios();


