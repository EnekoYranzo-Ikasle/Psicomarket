<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/chats.css">
<div class="chatContainer">
  <aside>
    <h3>Mis mensajes</h3>
    <div id="chatList"></div>
  </aside>
  <article>
    <div id="chatMessages"></div>
    <form id="textMessage">
      <input type="text" name="mensaje" placeholder="Escribe aqui tu mensaje..." required>
      <input type="submit" value="">
    </form>
  </article>
  <script>
    const userId = <?= json_encode($_SESSION['user_id']); ?>;
  </script>
  <script src="assets/scripts/loadChats.js"></script>
</div>

<?php require_once('layout/footer.php'); ?>
