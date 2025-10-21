const contenedor = document.querySelector('.products');

async function obtenerFavoritos() {

    try {
        const res = await fetch("index.php?controller=FavoritosController&&accion=apiGetFavoritos");
        const productos = await res.json();

        if (!productos.length) {
            contenedor.innerHTML = "<p>No hay favoritos</p>";
            return;
        }

        for (const producto of productos) {
            const formData = new FormData();
            formData.append("producto", JSON.stringify(producto));

            const componenteSolicitado = await fetch("views/components/Productos/producto.php", {
                method: "POST",
                body: formData
            });
            const componenteRecogido = await componenteSolicitado.text();
            contenedor.innerHTML += componenteRecogido;
        }
        const script = document.createElement("script");
        script.src = "assets/scripts/productos.js";

        contenedor.appendChild(script);

    } catch (error) {
        console.error("Error cargando favoritos:", error);
        contenedor.innerHTML = "<p>Error al cargar los favoritos.</p>";

    }
}
obtenerFavoritos();
