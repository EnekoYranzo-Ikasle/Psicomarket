<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/loginView.css">
<main>
  <div class="login">
    <span class="crearCuenta">Crear Cuenta</span>
    <form action="index.php?controller=AuthController&accion=createAccount" class="loginForm" method="post">
      <div class="formInputs">
        <div class="inputs">
          <div class="inputGroup">
            <input type="text" name="Name" id="NameInput" placeholder="" required>
            <label for="NameInput">Nombre</label>
          </div>

          <div class="inputGroup">
            <input type="text" name="LastName" id="LastNameInput" placeholder="" required>
            <label for="LastNameInput">Apellidos</label>
          </div>

          <div class="inputGroup">
            <input type="tel" name="PhoneNumber" id="PhoneNumberInput" placeholder="" required>
            <label for="PhoneNumberInput">Teléfono</label>
          </div>

          <div class="inputGroup">
            <input type="email" name="Email" id="EmailInput" placeholder="" required>
            <label for="EmailInput">Email</label>
          </div>

          <div class="inputGroup">
            <input type="password" name="Passwd" id="PasswdInput" placeholder="" required>
            <label for="PasswdInput">Contraseña</label>
          </div>
          <div class="inputGroup">
            <span>Soy: </span>
            <select name="UserRol" id="userRol" aria-label="Seleccionar el tipo de usuario que soy">
              <option value="Usuario">Usuario</option>
              <option value="Comerciante">Comerciante</option>
            </select>
          </div>
        </div>
        <input type="submit" value="Crear Cuenta">
      </div>

      <div class="links">
        <a href="index.php?controller=AuthController&accion=showLogin">¿Ya tienes cuenta?</a>
      </div>
    </form>
  </div>
  <div class="image" style="--bg-url: url('../images/registerImage.png');"></div>
</main>


<?php require_once('layout/footer.php'); ?>
