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

obtenerAnuncios();
