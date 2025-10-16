<link rel="stylesheet" href="assets/styles/chats.css">
<?php require_once('layout/header.php'); ?>
<div class="chatContainer">
  <aside>
    <h4>Mis mensajes</h4>
    <?php foreach ($listaChats as $chat) : ?>
      <span class="item">
        <img src="" alt="">
        <h4><?= $chat['Nombre_comercio'] ?></h4>
      </span>
    <?php endforeach ?>
  </aside>
  <article>

  </article>
</div>

<?php require_once('layout/footer.php'); ?>
