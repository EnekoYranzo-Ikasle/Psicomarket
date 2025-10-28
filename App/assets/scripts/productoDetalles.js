document.addEventListener("DOMContentLoaded", () => {
    const imagenPrincipal = document.getElementById("imagen-activa");
    const miniaturas = document.querySelectorAll(".thumb");
  
    miniaturas.forEach((miniatura) => {
      miniatura.addEventListener("click", () => {
        // Cambiar imagen principal
        imagenPrincipal.src = miniatura.src;
  
        // Actualizar clase activa
        miniaturas.forEach((img) => img.classList.remove("active"));
        miniatura.classList.add("active");
      });
    });
  });
  