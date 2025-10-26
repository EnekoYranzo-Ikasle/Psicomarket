<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/account.css">
<main>
  <div class="container">
    <div class="tab">
      <button class="tablinks" tab="Informacion">Información</button>
      <button class="tablinks" tab="Seguridad">Seguridad</button>
    </div>

    <!-- Tab Informacion -->
    <div id="Informacion" class="tabcontent">
      <div class="profile-header">
        <div class="profile-image-wrapper">
          <span class="userImageContainer">
            <img src="assets/images/icons/userLogo.png" id="userImage">
            <button id="editUserImage" title="Cambiar foto de perfil">
              <img src="assets/images/icons/Camera.svg" alt="">
            </button>
          </span>
          <!-- Modal Subir Imagen -->
          <div id="uploadModal" class="modal">
            <div class="modal-content">
              <span class="modal-head">
                <h4>Tu nueva foto de perfil</h4>
                <label class="close">&times;</label>
              </span>
              <input type="file" id="uploadedFile" accept="image/png, image/jpeg">
              <button id="saveImageButton">Guardar como imagen de perfil</button>
            </div>
          </div>
        </div>
        <div class="profile-name">
          <h3 id="username"></h3>
        </div>
      </div>

      <!-- Targetas -->
      <div class="cards-grid">
        <!-- Información del Usuario -->
        <div class="card info-card">
          <div class="card-header">
            <h4>Información Personal</h4>
          </div>
          <form id="UserInfo">
            <div class="info-item">
              <span class="info-label">Nombre:</span>
              <input type="text" class="userInput info-value" id="nombre" disabled>
            </div>
            <div class="info-item">
              <span class="info-label">Apellidos:</span>
              <input type="text" class="userInput info-value" id="apellidos" disabled>
            </div>
          </form>
        </div>

        <!-- Contacto del Usuario-->
        <div class="card info-card">
          <div class="card-header">
            <h4>Contacto</h4>
          </div>
          <div class="info-item">
            <span class="info-label">Email:</span>
            <input type="text" class="userInput info-value" id="email" disabled>
          </div>
          <div class="info-item">
            <span class="info-label">Teléfono:</span>
            <input type="tel" class="userInput info-value" id="telefono" disabled>
          </div>
        </div>
      </div>

      <button id="editUserInfo" class="btn-edit">Editar usuario</button>
    </div>

    <!-- Tab Seguridad -->
    <div id="Seguridad" class="tabcontent">
      <div class="card password-card">
        <div class="card-header">
          <h4 class="card-title">Cambiar Contraseña</h4>
        </div>

        <form id="ChangePasswd">
          <div class="form-group">
            <label for="current">Contraseña actual</label>
            <div class="field">
              <input id="current" type="password" required />
              <button type="button" class="eye-btn" aria-label="Mostrar contraseña actual">
                <img src="assets/images/icons/Eye.svg">
              </button>
            </div>
          </div>

          <div class="form-group">
            <label for="new">Nueva contraseña</label>
            <div class="field">
              <input id="new" type="password" required />
              <button type="button" class="eye-btn" aria-label="Mostrar nueva contraseña">
                <img src="assets/images/icons/Eye.svg">
              </button>
            </div>
          </div>

          <button type="button" id="savePasswBtn" class="btn-change-password">Cambiar contraseña</button>
        </form>

        <div class="security-tips">
          <h4>Consejos de Seguridad</h4>
          <ul>
            <li>Usa al menos 8 caracteres</li>
            <li>Incluye mayúsculas y minúsculas</li>
            <li>Incluye números y símbolos</li>
            <li>No uses información personal</li>
          </ul>
        </div>
      </div>
    </div>

    <script>
      const userId = <?= json_encode($_SESSION['user_id']); ?>;
    </script>
    <script src="assets/scripts/account.js"></script>
  </div>
</main>
