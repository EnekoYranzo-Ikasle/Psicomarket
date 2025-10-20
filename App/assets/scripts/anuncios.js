const contenedor = document.querySelector('.anuncios-container');

async function obtenerAnuncios(){
    try{
        const res = await fetch("index.php?controller=ComercioController&accion=apiGetComercios");
        const anuncios = await res.json();

        if(!anuncios.length){
            contenedor.innerHTML ="<p> No hay anuncios todavía </p>";
            return;
        }

        for(const anuncio of anuncios){
            const formData = new FormData();
            formData.append("comercio", JSON.stringify(anuncio));

            const componenteSolicitado = await fetch("views/components/anuncios/anuncio.php",{
                method: "POST",
                body: formData
            });
            const componenteRecogido = await componenteSolicitado.text();
            contenedor.innerHTML += componenteRecogido;
        }
    }catch (error) {
        console.error("Error cargando anuncios:", error);
        contenedor.innerHTML = "<p>Error al cargar los anuncios.</p>";
    }
}
obtenerAnuncios();