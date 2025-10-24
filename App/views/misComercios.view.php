<?php require_once("layout/header.php"); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="assets/styles/mapaComercios.css">
<link rel="stylesheet" href="assets/styles/anuncios.css">
<link rel="stylesheet" href="assets/styles/misComercios.css">

<main>
    <div class="tituloAñadirAnuncio">
        <h2>Mis Comercios</h2>
        <button class="añadirAnuncio btn">
            <svg width="32" height="32" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M26.5625 15.625H1.5625C0.708333 15.625 0 14.9167 0 14.0625C0 13.2083 0.708333 12.5 1.5625 12.5H26.5625C27.4167 12.5 28.125 13.2083 28.125 14.0625C28.125 14.9167 27.4167 15.625 26.5625 15.625Z" fill="#FDFEFF" />
                <path d="M14.0625 28.125C13.2083 28.125 12.5 27.4167 12.5 26.5625V1.5625C12.5 0.708333 13.2083 0 14.0625 0C14.9167 0 15.625 0.708333 15.625 1.5625V26.5625C15.625 27.4167 14.9167 28.125 14.0625 28.125Z" fill="#FDFEFF" />
            </svg>
            Anuncio</button>
    </div>

    <div class="anuncios-container">

    </div>
    <div id="map"></div>

</main>


<div class="formularioAñadirAnuncio">
    <form action="index.php?controller=ComercioController&accion=añadirAnuncio" method="POST">
        <label for="nombreAnuncio">
            Nombre:
            <input type="text" id="nombreAnuncio">
        </label>
        <label for="decripcion">
            Descripcion:
            <textarea name="descripcionAnuncio" maxlength="10000"></textarea>
        </label>
        <label for="direccion">
            Direccion
            <input type="text">
        </label>
    </form>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="assets/scripts/mapaComercios.js"></script>
<script src="assets/scripts/anuncios.js"></script>
<?php require_once("layout/footer.php"); ?>
