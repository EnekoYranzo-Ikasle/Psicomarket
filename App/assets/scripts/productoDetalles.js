// ==== CAMBIO DE IMAGEN PRINCIPAL ====
function cambiarImagenes() {
  const thumbs = document.querySelectorAll(".thumb");
  const mainImage = document.getElementById("imagen-activa");

  thumbs.forEach(thumb => {
    thumb.addEventListener("click", () => {
      mainImage.src = thumb.src;
      thumbs.forEach(t => t.classList.remove("active"));
      thumb.classList.add("active");
    });
  });
}

// ==== POPUP reseña ====
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
  const inputValoracion = document.getElementById("valoracion");
  let valorSeleccionado = 0;

  estrellas.forEach((estrella, index) => {
    estrella.addEventListener("mouseover", () => {
      estrellas.forEach((e, i) => {
        e.src = i <= index
          ? "assets/images/icons/review-star-hover.png"
          : "assets/images/icons/review-star.png";
      });
    });

    estrella.addEventListener("mouseout", () => {
      estrellas.forEach((e, i) => {
        e.src = i < valorSeleccionado
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


  cambiarImagenes();

 
