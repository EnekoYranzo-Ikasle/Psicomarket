function inicializarPopupResenna() {
  const botonValorar = document.getElementById("btn-reviews-toggle");
  const modal = document.getElementById("contenedor-estrellas");

  if (!botonValorar || !modal) return;

  botonValorar.addEventListener("click", () => {
    modal.style.display = "flex";
  });

  modal.addEventListener("click", (e) => {
    if (e.target === modal) modal.style.display = "none";
  });

  cerrarPopup(modal);
}

function inicializarEstrellas() {
  const estrellas = document.querySelectorAll(".estrella");
  const inputValoracion = document.querySelector("input[name='valoracion']");
  let valorSeleccionado = 0;

  estrellas.forEach((estrella, index) => {
    estrella.addEventListener("mouseover", () => {
      estrellas.forEach((e, i) => {
        e.src =
          i <= index
            ? "assets/images/icons/review-star-hover.png"
            : "assets/images/icons/review-star.png";
      });
    });

    estrella.addEventListener("mouseout", () => {
      estrellas.forEach((e, i) => {
        e.src =
          i < valorSeleccionado
            ? "assets/images/icons/review-star-hover.png"
            : "assets/images/icons/review-star.png";
      });
    });

    estrella.addEventListener("click", () => {
      valorSeleccionado = index + 1;
      inputValoracion.value = valorSeleccionado;
    });
  });
}

function cerrarPopup(modal) {
  const cerrarBtn = modal.querySelector(".cerrar-review");
  if (cerrarBtn) {
    cerrarBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      modal.style.display = "none";
    });
  }
}

async function enviarValoracion(e) {
  e.preventDefault();

  const estrellas = document.querySelector("input[name='valoracion']").value;
  const params = new URLSearchParams(window.location.search);
  const idComercio = params.get("id");

  if (!estrellas) {
    alert("Selecciona una valoración antes de enviar.");
    return;
  }

  const datos = new FormData();
  datos.append("idComercio", idComercio);
  datos.append("estrellas", estrellas);

  try {
    const res = await fetch("index.php?controller=ValoracionController&accion=insertValoration", {
      method: "POST",
      body: datos,
    });

    if (!res.ok) {
      throw new Error("Error en la petición");
    }

    const data = await res.json();

    if (data.success) {
      alert(data.success);
      document.getElementById("contenedor-estrellas").style.display = "none";
      // Recargar la página para actualizar la valoración media
      window.location.reload();
    } else if (data.error) {
      alert(data.error);
    }
  } catch (error) {
    console.error("Error al enviar valoración:", error);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  inicializarPopupResenna();
  inicializarEstrellas();

  const form = document.querySelector(".form-valoracion");
  if (form) form.addEventListener("submit", enviarValoracion);
});