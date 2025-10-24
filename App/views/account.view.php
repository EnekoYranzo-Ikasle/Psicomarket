<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/account.css">
<main>
  <div class="container">
    <div class="tab">
      <button class="tablinks" tab="Informacion">Información</button>
      <button class="tablinks" tab="Seguridad">Seguridad</button>
    </div>

    <div id="Informacion" class="tabcontent">
      <div class="card">
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
            <li><b>Nombre:</b> <input type="text" class="userInput" id="nombre" disabled></li>
            <li><b>Apellidos:</b> <input type="text" class="userInput" id="apellidos" disabled></li>
            <li><b>Email:</b> <input type="text" class="userInput" id="email" disabled></li>
            <li><b>Telefono:</b> <input type="tel" class="userInput" id="telefono" disabled></li>
          </ul>
        </form>
      </div>
    </div>

    <div id="Seguridad" class="tabcontent">
      <h2>Cambiar Contraseña</h2>
      <form id="ChangePasswd">
        <div class="field">
          <span>
            <input id="current" type="password" required />
            <label for="current">Contraseña actual</label>
          </span>
          <button type="button" class="eye-btn" aria-label="Mostrar contraseña actual"><img src="assets/images/icons/Eye.svg"></button>
        </div>

        <div class="field">
          <input id="new" type="password" required />
          <label for="new">Nueva contraseña</label>
          <button type="button" class="eye-btn" aria-label="Mostrar nueva contraseña"><img src="assets/images/icons/Eye.svg"></button>
        </div>
        <button type="button" id="savePasswBtn">Cambiar contraseña</button>
      </form>
    </div>
    <script>
      const userId = <?= json_encode($_SESSION['user_id']); ?>;
    </script>
    <script src="assets/scripts/account.js"></script>
</main>
