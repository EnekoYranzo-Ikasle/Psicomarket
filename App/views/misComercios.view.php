<?php require_once("layout/header.php"); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="assets/styles/mapaComercios.css">
<link rel="stylesheet" href="assets/styles/anuncios.css">
<link rel="stylesheet" href="assets/styles/misComercios.css">
<link rel="stylesheet" href="assets/styles/añadirAnuncio.css">
<link rel="stylesheet" href="assets/styles/accionesAnuncioProducto.css">

<main>
    <div class="tituloAñadirAnuncio">
        <h2>Mis Comercios</h2>
        <button class="añadirAnuncio btn">
            <svg width="32" height="32" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M26.5625 15.625H1.5625C0.708333 15.625 0 14.9167 0 14.0625C0 13.2083 0.708333 12.5 1.5625 12.5H26.5625C27.4167 12.5 28.125 13.2083 28.125 14.0625C28.125 14.9167 27.4167 15.625 26.5625 15.625Z"
                    fill="#FDFEFF" />
                <path
                    d="M14.0625 28.125C13.2083 28.125 12.5 27.4167 12.5 26.5625V1.5625C12.5 0.708333 13.2083 0 14.0625 0C14.9167 0 15.625 0.708333 15.625 1.5625V26.5625C15.625 27.4167 14.9167 28.125 14.0625 28.125Z"
                    fill="#FDFEFF" />
            </svg>
            Anuncio</button>
    </div>

    <div class="anuncios-container">

    </div>
    <div id="map"></div>

</main>

<div class="formularioAñadirAnuncio">
    <form action="index.php?controller=ComercioController&accion=añadirAnuncio" method="POST" enctype="multipart/form-data">
        <label for="nombreAnuncio">
            Nombre del comercio:
            <input type="text" id="nombreAnuncio" name="nombreAnuncio" required>
        </label>

        <label for="descripcionAnuncio" class="descripcionLabel">
            Descripción:
            <textarea name="descripcionAnuncio" id="descripcionAnuncio" maxlength="1000" required></textarea>
            <span class="cantidadLetras"></span>
        </label>

        <div class="direccion-container">
            <label for="calleInput">Dirección:</label>
            <input type="text" id="calleInput" name="direccion" placeholder="Ej: Valladolid o Valladolid 10"
                autocomplete="off" required>
            <select id="resultados2"></select>
            <div id="msg" class="msg"></div>
            <input type="hidden" id="lat" name="lat">
            <input type="hidden" id="lon" name="lon">
        </div>

        <label for="imagenComercio">
            Imagen de comercio:
            <input type="file" id="imagenComercio" name="imagenComercio" accept=".jpg, .jpeg, .png, .webp" required>
        </label>

        <div class="formulario-buttons">
            <button type="submit" class="btn-guardar">Guardar</button>
            <button type="button" class="btn-cancelar">Cancelar</button>
        </div>
    </form>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.9.1/proj4.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="assets/scripts/mapaComercios.js"></script>
<script src="assets/scripts/anuncios.js"></script>

<script src="assets/scripts/añadirAnuncio.js"></script>
<?php require_once("layout/footer.php"); ?>
