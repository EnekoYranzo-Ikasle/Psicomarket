//////// Menú de pestañas ////////
const buttons = document.querySelectorAll('.tablinks');

buttons.forEach((button) => {
  button.addEventListener('click', () => {
    const tab = button.getAttribute('tab');
    openTab(tab, button);
  });
});

function openTab(page, clickedButton) {
  const tabcontent = document.getElementsByClassName('tabcontent');
  const tablinks = document.getElementsByClassName('tablinks');

  for (let i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = 'none';
  }

  for (let i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove('active');
  }

  document.getElementById(page).style.display = 'block';
  clickedButton.classList.add('active');
}

openTab(buttons[0].getAttribute('tab'), buttons[0]);

//////// Editar Foto del Perfil ////////
const editImageButton = document.getElementById('editUserImage');
const userImage = document.getElementById('uploadedFile');
const saveUserImageButton = document.getElementById('saveImageButton');
let modal = document.getElementById('uploadModal');

editImageButton.addEventListener('click', function () {
  modal.style.display = 'block';

  const span = document.getElementsByClassName('close')[0];

  span.addEventListener('click', () => (modal.style.display = 'none'));

  window.addEventListener('click', (event) => {
    if (event.target == modal) modal.style.display = 'none';
  });

  saveUserImageButton.addEventListener('click', () => saveUserImage());
});

async function saveUserImage() {
  const formData = new FormData();
  formData.append('image', userImage.files[0]);

  try {
    const response = await fetch(`index.php?controller=AccountController&accion=uploadUserImage`, {
      method: 'POST',
      body: formData,
    });

    // Ver el texto crudo de la respuesta
    const text = await response.text();
    console.log('Respuesta cruda:', text);

    // Intentar parsear como JSON
    try {
      const result = JSON.parse(text);
      console.log('JSON parseado:', result);

      // Cerrar modal si todo va bien
      modal.style.display = 'none';

      // Actualizar la imagen si viene en la respuesta
      if (result.imageUrl) {
        document.querySelector('.user-image img').src = result.imageUrl;
      }
    } catch (parseError) {
      console.error('Error al parsear JSON:', parseError);
      console.error('Texto recibido:', text);
    }
  } catch (error) {
    console.error('Error en la petición:', error);
  }
}

//////// Editar Info del Perfil ////////
const editButton = document.getElementById('editUserInfo');
const inputs = document.querySelectorAll('.userInput');
let editingInfo = false;

async function loadUserInfo() {
  try {
    const nombre = document.getElementById('nombre');
    const apellidos = document.getElementById('apellidos');
    const email = document.getElementById('email');
    const telefono = document.getElementById('telefono');

    const response = await fetch(
      `index.php?controller=AccountController&accion=loadUserInfo&id=${userId}`
    );

    const accountInfo = await response.json();

    if (accountInfo && accountInfo.length > 0) {
      const user = accountInfo[0];
      // Inputs
      nombre.value = user.Nombre;
      apellidos.value = user.Apellidos;
      email.value = user.Email;
      telefono.value = user.num_Tel;

      // H3 username
      username.innerHTML = user.Nombre;
    } else {
      throw new Error();
    }
  } catch (error) {
    console.log('Error al cargar la información del usuario');
  }
}

editButton.addEventListener('click', async function () {
  if (!editingInfo) {
    inputs.forEach((input) => input.removeAttribute('disabled'));
    editButton.textContent = 'Guardar';
    editingInfo = true;
  } else {
    inputs.forEach((input) => input.setAttribute('disabled', ''));
    editButton.textContent = 'Editar usuario';
    editingInfo = false;

    await saveUserInfo();
  }
});

async function saveUserInfo() {
  const formData = new FormData();
  inputs.forEach((input) => formData.append(input.id, input.value));

  await fetch(`index.php?controller=AccountController&accion=saveUserInfo`, {
    method: 'POST',
    body: formData,
  });
}

//////// Cambiar Contraseña////////

// Funcion mostrar contraseña
const eyeButtons = document.querySelectorAll('.eye-btn');

eyeButtons.forEach((btn) => {
  btn.addEventListener('click', () => {
    const input = btn.parentElement.querySelector('input');

    if (input.type === 'password') {
      input.type = 'text';
      btn.querySelector('img').src = 'assets/images/icons/ClosedEye.svg';
    } else {
      input.type = 'password';
      btn.querySelector('img').src = 'assets/images/icons/Eye.svg';
    }
  });
});

// Guardar nueva contraseña
const savePasswdButton = document.getElementById('savePasswBtn');
savePasswdButton.addEventListener('click', async function (e) {
  e.preventDefault();
  await saveNewPasswd();
});

async function saveNewPasswd() {
  const currentPasswd = document.getElementById('current').value;
  const newPasswd = document.getElementById('new').value;

  const formData = new FormData();
  formData.append('currentPasswd', currentPasswd);
  formData.append('newPasswd', newPasswd);

  try {
    const response = await fetch('index.php?controller=AccountController&accion=saveUserPasswd', {
      method: 'POST',
      body: formData,
    });

    const data = await response.json();
    console.log('Respuesta del servidor:', data);

    if (data.status === 'ok') {
      console.log(data.msg);
      document.getElementById('ChangePasswd').reset();
    } else {
      console.error(data.msg);
    }
  } catch (error) {
    console.error('Error en el fetch:', error);
  }
}

loadUserInfo();

