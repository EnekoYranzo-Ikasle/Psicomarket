<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/loginView.css">
<main>
  <div class="login">
    <span class="crearCuenta">Crear Cuenta</span>
    <form action="index.php?controller=UsuarioController&&accion=userLogin" class="loginForm">
      <div class="formInputs">
        <div class="inputs">
          <div class="inputGroup">
            <input type="text" name="Name" id="Name" placeholder=" " required>
            <label for="Name">Nombre</label>
          </div>

          <div class="inputGroup">
            <input type="text" name="LastName" id="LastName" placeholder=" " required>
            <label for="LastName">Apellidos</label>
          </div>

          <div class="inputGroup">
            <input type="tel" name="TelefonNumber" id="TelefonNumber" placeholder=" " required>
            <label for="TelefonNumber">Teléfono</label>
          </div>

          <div class="inputGroup">
            <input type="text" name="userName" id="userName" placeholder=" " required>
            <label for="userName">Usuario</label>
          </div>

          <div class="inputGroup">
            <input type="password" name="Passwd" id="Passwd" placeholder=" " required>
            <label for="Passwd">Contraseña</label>
          </div>
          <div class="inputGroup">
            <span>Soy: </span>
            <select name="userRol" id="userRol">
              <option value="Usuario">Usuario</option>
              <option value="Comeriante">Comeriante</option>
            </select>
          </div>
        </div>
        <input type="submit" value="Crear Cuenta">
      </div>

      <div class="links">
        <a href="index.php?controller=LoginController">Iniciar Sesión</a>
      </div>
    </form>
  </div>
  <div class="image" style="--bg-url: url('../images/registerImage.png');"></div>
</main>


<?php require_once('layout/footer.php'); ?>
