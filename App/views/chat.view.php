<?php require_once('layout/header.php'); ?>
<link rel="stylesheet" href="assets/styles/chats.css">
<div class="chatContainer">
  <aside>
    <h4>Mis mensajes</h4>
    <div id="chatList"></div>
  </aside>
  <article class="chatMessages">
  </article>
  <script>
    const userId = <?= json_encode($_SESSION['user_id']); ?>;
  </script>
  <script src="assets/scripts/loadChats.js"></script>
</div>

<?php require_once('layout/footer.php'); ?>
