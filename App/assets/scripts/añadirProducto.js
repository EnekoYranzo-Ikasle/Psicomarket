let formulario = document.querySelector(".formularioAñadirProducto");
let btnCancelar = document.querySelector(".btn-cancelar");
let btnGuardar = document.querySelector(".btn-guardar");
let cantidadLetras = document.querySelector(".cantidadLetras");

cantidadLetras.textContent = "0 / 380";
document
  .getElementById("descripcionProducto")
  .addEventListener("input", function () {
    let longitudActual = this.value.length;
    cantidadLetras.textContent = `${longitudActual} / 380`;
    if (longitudActual > 380) {
      this.value = this.value.slice(0, 380);
    }
    if (longitudActual === 380) {
      cantidadLetras.style.color = "red";
    } else {
      cantidadLetras.style.color = "#1a56db";
    }
  });

function limpiarFormulario() {
  document.getElementById("nombreProducto").value = "";
  document.getElementById("descripcionProducto").value = "";
  document.getElementById("precioProducto").value = 0;
  document.getElementById("categoriaMsg").style.display = "none";
}

btnCancelar.addEventListener("click", () => {
  limpiarFormulario();
  formulario.style.display = "none";
  document.body.style.overflow = "auto";
});

btnGuardar.addEventListener("click", async () => {
  try {
    const params = new URLSearchParams(window.location.search);
    const idComercio = params.get("id");

    let datos = new FormData();
    datos.append("idComercio", idComercio);
    datos.append(
      "nombreProducto",
      document.getElementById("nombreProducto").value
    );
    datos.append(
      "descripcionProducto",
      document.getElementById("descripcionProducto").value
    );
    datos.append(
      "precioProducto",
      document.getElementById("precioProducto").value
    );
    datos.append(
      "id_categoria",
      document.getElementById("listaCategorias").value
    );
    document.querySelectorAll("input[type='file']").forEach((inputFile) => {
      for (let i = 0; i < inputFile.files.length; i++) {
        datos.append("imagenes[]", inputFile.files[i]);
      }
    });

    const response = await fetch(
      "index.php?controller=ProductoController&accion=añadirProducto",
      {
        method: "POST",
        body: datos,
      }
    );

    if (!response.ok) {
      throw new Error("Error en la petición: " + response.status);
    }

    formulario.style.display = "none";
    document.body.style.overflow = "auto";
    window.location.reload(true);
  } catch (error) {
    console.error("Error:", error);
  }
});

document.querySelector(".añadirProducto").addEventListener("click", () => {
  formulario.style.display = "flex";
  formulario.style.justifyContent = "center";
  formulario.style.alignItems = "center";
  document.body.style.overflow = "hidden";
  obtenerCategoriasDisponibles(document.getElementById("categoriaInput").value);

  document.getElementById("categoriaInput").addEventListener("input", () => {
    obtenerCategoriasDisponibles(
      document.getElementById("categoriaInput").value
    );
  });
});

async function obtenerCategoriasDisponibles(categoriaInput) {
  try {
    let res = await fetch(
      "index.php?controller=ProductoController&accion=obtenerCategorias&nombre=" +
        categoriaInput
    );
    let datos = await res.json();

    if (datos.length > 0) {
      document.getElementById("listaCategorias").style.display = "block";
      document.getElementById("categoriaMsg").style.display = "none";

      document.getElementById("listaCategorias").innerHTML = "";

      datos.forEach((categoria) => {
        let opt = document.createElement("option");
        opt.value = categoria.id;
        opt.text = categoria.nombre;
        document.getElementById("listaCategorias").appendChild(opt);
      });
    } else {
      document.getElementById("categoriaMsg").style.display = "block";
      document.getElementById("listaCategorias").style.display = "none";
      document.getElementById("categoriaMsg").textContent =
        "Categoría no encontrada";
    }
  } catch (error) {
    console.error(error);
  }
}

const imagenesContainer = document.querySelector(".imagenes-container");
const btnAgregarImagen = document.getElementById("btnAgregarImagen");

let contadorImagenes = 1;
const MAX_IMAGENES = 5;

// Función para actualizar la visibilidad del botón
function actualizarBoton() {
  btnAgregarImagen.style.display =
    contadorImagenes >= MAX_IMAGENES ? "none" : "inline-block";
}

// Función para crear un nuevo input de imagen con botón eliminar
function crearImagen(nombreIndex) {
  const wrapper = document.createElement("div");
  wrapper.classList.add("imagenEliminar");

  const inputImagen = document.createElement("input");
  inputImagen.type = "file";
  inputImagen.name = `imagen${nombreIndex}`;
  inputImagen.accept = "image/*";
  inputImagen.required = true;
  inputImagen.classList.add("input-imagen");

  const btnEliminar = document.createElement("button");
  btnEliminar.type = "button";
  btnEliminar.textContent = "✖";
  btnEliminar.classList.add("btn-eliminar");

  btnEliminar.addEventListener("click", () => {
    wrapper.remove();
    contadorImagenes--;
    actualizarBoton();
  });

  wrapper.appendChild(inputImagen);
  wrapper.appendChild(btnEliminar);
  imagenesContainer.appendChild(wrapper);
}

btnAgregarImagen.addEventListener("click", () => {
  if (contadorImagenes >= MAX_IMAGENES) return;
  contadorImagenes++;
  crearImagen(contadorImagenes);
  actualizarBoton();
});

actualizarBoton();

const primerBtnEliminar = imagenesContainer.querySelector(".btn-eliminar");
primerBtnEliminar.addEventListener("click", () => {
  const primerWrapper = primerBtnEliminar.parentElement;
  primerWrapper.remove();
  contadorImagenes--;
  actualizarBoton();
});
