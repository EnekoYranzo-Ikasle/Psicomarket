let scrollAmount = 0;
const carrusel = document.getElementById('carrusel');

function moverCarrusel(direccion) {
  const width = carrusel.clientWidth / 2;
  scrollAmount += direccion * width;
  carrusel.scrollTo({
    left: scrollAmount,
    behavior: 'smooth',
  });
}
