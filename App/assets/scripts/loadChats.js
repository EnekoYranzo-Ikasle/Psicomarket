// Cargar lista de mensajes
async function loadMessagesList() {
  try {
    const chatList = document.getElementById('chatList');

    const response = await fetch('index.php?controller=ChatController&accion=getMessagesList');
    const chats = await response.json();

    chatList.innerHTML = chats.length
      ? chats
          .map(
            (chat) => `
            <button class="item" data-id="${chat.id}">
              <img src="">
              <h4>${chat.Nombre_comercio}</h4>
            </button>
          `
          )
          .join('')
      : '<p>No hay conversaciones</p>';
  } catch (error) {
    console.log(error);
    chatList.innerHTML = '<p>Error al cargar las conversaciones</p>';
  }
}

// Cargar conversacion seleccionada.
try {
  const chatButtons = document.querySelectorAll('.item');
  const chatMessages = document.getElementById('chatMessages');

  chatButtons.forEach((button) => {
    button.addEventListener('click', async () => {
      const idComerciante = button.getAttribute('data-id');

      const response = await fetch(
        `index.php?controller=ChatController&accion=loadConversation&id=${idComerciante}`
      );
      const mensajes = await response.json();

      chatMessages.innerHTML = mensajes.length
        ? mensajes
            .map(
              (msg) => `
          <div class="${msg.id_Comprador == userId ? 'mensaje-enviado' : 'mensaje-recibido'}">
            <p>${msg.Mensaje}</p>
            <small>${msg.Hora} - ${msg.Fecha}</small>
          </div>
        `
            )
            .join('')
        : '<p>No hay mensajes en este chat.</p>';
    });
  });
} catch (error) {
  console.log(error);
  chatList.innerHTML = '<p>Error al cargar la conversacion seleccionada</p>';
}

loadMessagesList();
