const abrir = document.getElementById('abrir-categorias');
const dropdown = document.getElementById('dropdown-categorias');
const buscador = document.getElementById('buscar-categoria');
const lista = document.getElementById('lista-categorias');
const texto = document.getElementById('texto-categoria');

abrir.addEventListener('click', () => {
  dropdown.classList.toggle('oculto');
});

// Cerrar si haces click fuera
document.addEventListener('click', (e) => {
  if (!dropdown.contains(e.target) && !abrir.contains(e.target)) {
    dropdown.classList.add('oculto');
  }
});

// Buscar categorías
buscador.addEventListener('input', () => {
  const filtro = buscador.value.toLowerCase();
  for (const li of lista.children) {
    const texto = li.textContent.toLowerCase();
    li.style.display = texto.includes(filtro) ? 'block' : 'none';
  }
});

document.addEventListener('click');
function resetearFiltros(){
    let boton = document.getElementById('reestablecer');
    
}