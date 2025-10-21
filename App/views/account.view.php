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
      <span>
        <img src="assets/images/icons/userLogo.png" alt="">
        <h3 id="username"></h3>
        <button id="editUser">Editar usuario</button>
      </span>
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
