let index = 0;

function moverCarrusel(direccion) {
  const carrusel = document.getElementById('carrusel');
  const total = carrusel.children.length;

  index += direccion;

  if (index < 0) index = total - 1;
  if (index >= total) index = 0;

  carrusel.style.transform = `translateX(-${index * 100}%)`;
}
