function inicializarAcciones() {
  let acciones = document.querySelectorAll('.acciones .btn');
  acciones.forEach((accion) => {
    accion.addEventListener('click', (e) => {
      let id = e.currentTarget.classList[2];
      switch (e.currentTarget.classList[1]) {
        case "editarAnuncio":
          const anuncio = e.currentTarget.closest(".anuncio");
          const overlay = anuncio.querySelector(".overlay");
          overlay.style.display = "flex";
          overlay.style.justifyContent = "center";
          overlay.style.alignItems = "center";
          overlay.querySelector(".confirmarEditarAnuncio").addEventListener("click", () => {
              const datos = {
                nombre: overlay.querySelector("input[name='nombre']").value,
                descripcion: overlay.querySelector("input[name='descripcion']").value
              }
              editarAnuncio(id, datos);
              overlay.style.display = "none";
            });
          overlay.querySelector(".cancelarEditarAnuncio").addEventListener("click", () => {
              overlay.style.display = "none";
            });
          overlay.querySelector('.cancelarEditarAnuncio').addEventListener('click', () => {
            overlay.style.display = 'none';
          });
          break;
        case 'eliminarAnuncio':
          const anuncio2 = e.currentTarget.closest('.anuncio');
          const overlay2 = anuncio2.querySelector('.overlay2');
          overlay2.style.display = 'flex';
          overlay2.style.justifyContent = 'center';
          overlay2.style.alignItems = 'center';

          overlay2.querySelector('.confirmarEliminarAnuncio').addEventListener('click', () => {
            eliminarAnuncio(id);
            overlay2.style.display = 'none';
          });
          overlay2.querySelector('.cancelarEliminarAnuncio').addEventListener('click', () => {
            overlay2.style.display = 'none';
          });
          break;
      }
    });
  });

  let accionesProducto = document.querySelectorAll('.accionesProducto .btn');
  accionesProducto.forEach((accion) => {
    accion.addEventListener('click', (e) => {
      console.log(e.currentTarget.classList[2]);

      let id = e.currentTarget.classList[2];
      switch (e.currentTarget.classList[1]) {
        case "editarProducto":
          const producto = e.currentTarget.closest(".producto");
          const overlay = producto.querySelector(".overlay");
          overlay.style.display = "flex";
          overlay.style.justifyContent = "center";
          overlay.style.alignItems = "center";
          overlay.querySelector(".confirmarEditarProducto").addEventListener("click", () => {
              const datos = {
                nombre: overlay.querySelector("input[name='nombre']").value,
                descripcion: overlay.querySelector("input[name='descripcion']").value
              }
              editarProducto(id, datos);
              overlay.style.display = "none";
            });
          overlay.querySelector(".cancelarEditarProducto").addEventListener("click", () => {
              overlay.style.display = "none";
            });
          overlay.querySelector('.cancelarEditarProducto').addEventListener('click', () => {
            overlay.style.display = 'none';
          });
          break;
        case 'eliminarProducto':
          const producto2 = e.currentTarget.closest('.producto');
          const overlay2 = producto2.querySelector('.overlay2');
          overlay2.style.display = 'flex';
          overlay2.style.justifyContent = 'center';
          overlay2.style.alignItems = 'center';

          overlay2.querySelector('.confirmarEliminarProducto').addEventListener('click', () => {
            eliminarProducto(id);
            overlay2.style.display = 'none';
          });
          overlay2.querySelector('.cancelarEliminarProducto').addEventListener('click', () => {
            overlay2.style.display = 'none';
          });
          break;
      }
    });
  });
}

async function eliminarAnuncio(idComercio) {
  try {
    const res = await fetch(
      'index.php?controller=ComercioController&accion=eliminarAnuncio&id=' + idComercio
    );
    if (!res.ok) {
      throw new Error('Error al eliminar el anuncio');
    }
    const data = await res.json();
    if (data) {
      window.location.reload();
    }
  } catch (error) {
    console.error('Error al eliminar el anuncio:', error);
  }
}

async function eliminarProducto(idProducto) {
  try {
    const res = await fetch(
      'index.php?controller=ProductoController&accion=eliminar&id=' + idProducto
    );
    if (!res.ok) {
      throw new Error('Error al eliminar el producto');
    }
    const data = await res.json();
    if (data) {
      window.location.reload();
    }
  } catch (error) {
    console.error('Error al eliminar el producto:', error);
  }
}

async function editarAnuncio(idComercio, nuevosDatos) {
  try {
    const res = await fetch(
      'index.php?controller=ComercioController&accion=editarAnuncio&id=' + idComercio,
      {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(nuevosDatos),
      }
    );
    if (!res.ok) {
      throw new Error('Error al editar el anuncio');
    }
    const data = await res.json();
    if (data) {
      window.location.reload();
    }
  } catch (error) {
    showError('Error al editar el anuncio:', error);
  }
}
