const thumbs = document.querySelectorAll(".thumb");
const mainImage = document.getElementById("imagen-activa");

thumbs.forEach(thumb => {
  thumb.addEventListener("click", () => {
    // cambia la imagen principal
    mainImage.src = thumb.src;

    // actualiza clase active
    thumbs.forEach(t => t.classList.remove("active"));
    thumb.classList.add("active");
  });
});
