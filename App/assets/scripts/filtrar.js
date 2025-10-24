const abrir = document.getElementById("abrir-categorias");
const dropdown = document.getElementById("dropdown-categorias");
const buscador = document.getElementById("buscar-categoria");
const lista = document.getElementById("lista-categorias");
const texto = document.getElementById("texto-categoria");
const categoriasSeleccionadas = document.getElementById(
  "categorias-seleccionadas"
);

abrirFiltros();
abrirSelect();
ordenarCheckbox();
buscarCategorias();
abrirSelectCategorias();

function abrirSelect() {
  abrir.addEventListener("click", (e) => {
    e.stopPropagation(); // evita que el click burbujee al document y cierre inmediatamente
    dropdown.classList.toggle("oculto");
  });
}

function ordenarCheckbox() {
  lista.addEventListener("change", () => {
    const elementos = Array.from(lista.querySelectorAll("li"));

    elementos.sort((a, b) => {
      const aChecked = a.querySelector('input[type="checkbox"]').checked;
      const bChecked = b.querySelector('input[type="checkbox"]').checked;
      return aChecked === bChecked ? 0 : aChecked ? -1 : 1;
    });

    lista.innerHTML = "";
    elementos.forEach((el) => lista.appendChild(el));
  });
}

function buscarCategorias() {
  buscador.addEventListener("input", () => {
    const filtro = buscador.value.toLowerCase();
    for (const li of lista.children) {
      const t = li.textContent.toLowerCase();
      li.style.display = t.includes(filtro) ? "block" : "none";
    }
  });
}

function abrirFiltros() {
  const filtroContainer = document.getElementById("filtro-container");
  const toggleFiltros = document.getElementById("toggle-filtros");

  toggleFiltros.addEventListener("click", (e) => {
    e.stopPropagation();
    filtroContainer.classList.toggle("mostrar");

    if (filtroContainer.classList.contains("mostrar")) {
      document.addEventListener("click", cerrarFiltros);
    }
  });

  function cerrarFiltros(e) {
    if (
      !filtroContainer.contains(e.target) &&
      !toggleFiltros.contains(e.target)
    ) {
      filtroContainer.classList.remove("mostrar");
      document.removeEventListener("click", cerrarFiltros);
    }
  }
}


function abrirSelectCategorias(){
document.addEventListener("click", (e) => {
  const estaAbierto = !dropdown.classList.contains("oculto");
  if (
    estaAbierto &&
    !dropdown.contains(e.target) &&
    !abrir.contains(e.target)
  ) {
    dropdown.classList.add("oculto");
  }
});
}
