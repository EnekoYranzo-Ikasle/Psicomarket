function inicializarAcciones() {
  let acciones = document.querySelectorAll(".acciones .btn");
  acciones.forEach((accion) => {

    accion.addEventListener("click", (e) => {
      let id = e.currentTarget.classList[2];
      switch (e.currentTarget.classList[1]) {
        case "editar":
          const anuncio = e.currentTarget.closest(".anuncio");
          const overlay = anuncio.querySelector(".overlay");
          overlay.style.display = "flex";
          overlay.style.justifyContent = "center";
          overlay.style.alignItems = "center";

          overlay
            .querySelector(".confirmarEditarAnuncio")
            .addEventListener("click", () => {
              editarAnuncio(id, {
                nombre: overlay.querySelector("input[name='nombre']").value,
                descripcion: overlay.querySelector("input[name='descripcion']").value,
              });
              overlay.style.display = "none";
            });
          overlay
            .querySelector(".cancelarEditarAnuncio")
            .addEventListener("click", () => {
              overlay.style.display = "none";
            });
          break;
        case "eliminar":
          const anuncio2 = e.currentTarget.closest(".anuncio");
          const overlay2 = anuncio2.querySelector(".overlay2");
          overlay2.style.display = "flex";
          overlay2.style.justifyContent = "center";
          overlay2.style.alignItems = "center";

          overlay2
            .querySelector(".confirmarEliminarAnuncio")
            .addEventListener("click", () => {
              eliminarAnuncio(id);
              overlay2.style.display = "none";
            });
          overlay2
            .querySelector(".cancelarEliminarAnuncio")
            .addEventListener("click", () => {
              overlay2.style.display = "none";
            });
          break;
      }
    });
  });
}

async function eliminarAnuncio(idComercio) {
  try {
    const res = await fetch(
      "index.php?controller=ComercioController&accion=eliminarAnuncio&id=" +
        idComercio
    );
    if (!res.ok) {
      throw new Error("Error al eliminar el anuncio");
    }
    const data = await res.json();
    if (data) {
      window.location.reload();
    }
  } catch (error) {
    console.error("Error al eliminar el anuncio:", error);
  }
}

async function editarAnuncio(idComercio, nuevosDatos) {
  try {
    const res = await fetch(
      "index.php?controller=ComercioController&accion=editarAnuncio&id=" +
        idComercio,
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(nuevosDatos),
      }
    );
    if (!res.ok) {
      throw new Error("Error al editar el anuncio");
    }
    const data = await res.json();
    if (data) {
      window.location.reload();
    }
  } catch (error) {
    console.error("Error al editar el anuncio:", error);
  }
}
