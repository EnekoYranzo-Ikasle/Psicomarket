<?php require_once('layout/header.php'); ?>
<?php include_once('components/errorBox.php'); ?>
<link rel="stylesheet" href="assets/styles/loginView.css">
<main>
  <div class="image" style="--bg-url: url('../images/loginImage.png');"></div>
  <div class="login">
    <span class="iniciarSesion">Inciar Sesión</span>
    <form action="index.php?controller=AuthController&accion=userLogin" class="loginForm" method="POST">
      <div class="formInputs">
        <div class="inputs">
          <div class="inputGroup">
            <input type="email" name="email" id="emailInput" placeholder="" required oninput="checkInput(this)">
            <label for="emailInput">Email</label>
          </div>

          <div class="inputGroup">
            <input type="password" name="userPasswd" id="passwdInput" placeholder="" required>
            <label for="passwdInput">Contraseña</label>
          </div>
        </div>
        <input type="submit" value="Iniciar Sesión">
      </div>

      <div class="links">
        <a href="index.php?controller=AuthController&accion=showRegister">No tengo cuenta</a>
        <!-- <a href="">He olvidado mi contraseña</a> -->
      </div>
    </form>
  </div>
</main>
<script>
  function checkInput(input) {
    if (input.value.trim() !== "") {
      input.classList.add("has-content");
    } else {
      input.classList.remove("has-content");
    }
  }
</script>


<?php require_once('layout/footer.php'); ?>
