<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/account.css">
<main>
  <div class="container">
    <div class="tab">
      <button class="tablinks" tab="Informacion">Información</button>
      <button class="tablinks" tab="Seguridad">Seguridad</button>
      <button class="tablinks" tab="Preferencias">Preferencias</button>
    </div>

    <div id="Informacion" class="tabcontent">
      <div>
        <!-- User logo -->
        <span class="userImageContainer">
          <img src="assets/images/icons/userLogo.png" id="userImage">
          <button id="editUserImage"><img src="assets/images/icons/Camera.svg" alt=""></button>
        </span>

        <!-- Modal -->
        <div id="uploadModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <input type="file" id="uploadedFile">
            <button id="saveImageButton">Guardar</button>
          </div>
        </div>

        <!-- Boton editar usuario -->
        <h3 id="username"></h3>
        <button id="editUserInfo">Editar usuario</button>
      </div>
      <form id="UserInfo">
        <ul>
          <li><b>Nombre:</b> <input type="text" id="nombre" disabled></li>
          <li><b>Apellidos:</b> <input type="text" id="apellidos" disabled></li>
          <li><b>Usuario:</b> <input type="text" id="usuario" disabled></li>
          <li><b>Telefono:</b> <input type="tel" id="telefono" disabled></li>
        </ul>
      </form>
    </div>

    <div id="Seguridad" class="tabcontent">

    </div>

    <div id="Preferencias" class="tabcontent">
    </div>
  </div>
  <script>
    const userId = <?= json_encode($_SESSION['user_id']); ?>;
  </script>
  <script src="assets/scripts/account.js"></script>
</main>
