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
                    <button class="item" chatid="${chat.id}">
                        <span></span>
                        <h4>${chat.nombreChat}</h4>
                    </button>
                    `
          )
          .join('')
      : '<p>No hay conversaciones</p>';

    loadConversation();

    if (chats.length > 0) {
      const primerChat = document.querySelector('.item');
      if (primerChat) {
        seleccionarChat(primerChat);
        await actualizarMensajes();
      }
    }
  } catch (error) {
    console.log(error);
    chatList.innerHTML = '<p>Error al cargar las conversaciones</p>';
  }
}

// Cargar conversacion seleccionada.
async function loadConversation() {
  try {
    const chatButtons = document.getElementsByClassName('item');
    const chatMessages = document.getElementById('chatMessages');
    for (let i = 0; i < chatButtons.length; i++) {
      const button = chatButtons[i];
      button.addEventListener('click', async () => {
        seleccionarChat(button);
        await actualizarMensajes();
      });
    }
  } catch (error) {
    console.log(error);
    chatMessages.innerHTML = '<p>Error al cargar la conversacion seleccionada</p>';
  }
}

// Actualizar mensajes
async function actualizarMensajes() {
  try {
    const chatSeleccionado = document.querySelector('.item.selected');
    if (!chatSeleccionado) {
      console.log('No hay chat seleccionado');
      return;
    }

    const chatMessages = document.getElementById('chatMessages');
    const chatID = chatSeleccionado.getAttribute('chatid');

    const response = await fetch(
      `index.php?controller=ChatController&accion=loadConversation&chatID=${chatID}`
    );
    const mensajes = await response.json();

    chatMessages.innerHTML = mensajes.length
      ? mensajes
          .map((msg) => {
            const msgLoggedUser = msg.userID === userId;
            return `
                <div class="${msgLoggedUser ? 'loggedUser' : 'other'}">
                  <h4>
                    ${msg.tipo_usuario === 'comerciante' ? msg.Nombre_comercio : msg.nombre_usuario}
                  </h4>
                  <p>${msg.mensaje}</p>
                  <small>${msg.fecha}</small>
                </div>
            `;
          })
          .join('')
      : '<p>No hay mensajes en este chat.</p>';

    chatMessages.scrollTop = 0;
  } catch (error) {
    console.log('Error al actualizar mensajes:', error);
  }
}

// Seleccionar chat
function seleccionarChat(chatElement) {
  document.querySelectorAll('.item').forEach((item) => {
    item.classList.remove('selected');
  });
  chatElement.classList.add('selected');
}

// Enviar mensaje
const form = document.querySelector('#textMessage');
async function sendData() {
  try {
    if (form === null) {
      throw new Error('No dejes el campo de mensaje vacio');
    }

    const formData = new FormData(form);
    const fecha = new Date();
    const fechaFormateada =
      fecha.getFullYear() +
      '-' +
      String(fecha.getMonth() + 1).padStart(2, '0') +
      '-' +
      String(fecha.getDate()).padStart(2, '0') +
      ' ' +
      String(fecha.getHours()).padStart(2, '0') +
      ':' +
      String(fecha.getMinutes()).padStart(2, '0');

    formData.append('fecha', fechaFormateada);
    formData.append('userID', userId);

    const chatSeleccionado = document.querySelector('.item.selected');

    const chatID = chatSeleccionado.getAttribute('chatid');
    formData.append('chatID', chatID);

    const response = await fetch('index.php?controller=ChatController&accion=sendMessage', {
      method: 'POST',
      body: formData,
    });

    if (response.ok) {
      form.reset();
      await actualizarMensajes();
    } else {
      throw new Error();
    }
  } catch (error) {
    console.error('Error al enviar el mensaje:', error);
  }
}

form.addEventListener('submit', (event) => {
  event.preventDefault();
  sendData();
});

loadMessagesList();
