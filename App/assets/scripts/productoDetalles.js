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

// === POPUP reseña ===
function inicializarPopupResenna() {
  const botonValorar = document.getElementById("btn-reviews-toggle");
  const contenedorEstrellas = document.getElementById("contenedor-estrellas");


  if (!botonValorar || !contenedorEstrellas) return;

  // Mostrar modal solo cuando se hace click en el botón
  botonValorar.addEventListener("click", () => {
    contenedorEstrellas.style.display='flex';
  });

  // Cerrar modal haciendo click fuera del formulario
  contenedorEstrellas.addEventListener("click", (e) => {
    if (e.target === contenedorEstrellas) {
      contenedorEstrellas.classList.remove("activo");
    }
  });
}
// === Efecto visual de estrellas ===
function inicializarEstrellas() {
  const estrellas = document.querySelectorAll(".estrella");

  estrellas.forEach((estrella, index) => {
    estrella.addEventListener("mouseover", () => {
      estrellas.forEach((e, i) => {
        e.classList.toggle("activa", i <= index);
      });
    });

    estrella.addEventListener("mouseout", () => {
      estrellas.forEach(e => e.classList.remove("activa"));
    });

    estrella.addEventListener("click", () => {
      estrellas.forEach((e, i) => {
        e.classList.toggle("seleccionada", i <= index);
      });
    });
  });
}


cambiarImagenes();
inicializarPopupResenna();
