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

  document.getElementById(page).style.display = 'flex';
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

    const data = await response.json();

    modal.style.display = 'none';

    if (!data.success) {
      showError(data.message);
    } else {
      if (data.imageUrl) {
        document.getElementById('userImage').src = data.imageUrl;
      }
    }
  } catch (error) {
    showError(error);
  }
}

// Cargar informacion del usuario
async function loadUserInfo() {
  try {
    const nombre = document.getElementById('nombre');
    const apellidos = document.getElementById('apellidos');
    const email = document.getElementById('email');
    const telefono = document.getElementById('telefono');
    const imagen = document.getElementById('userImage');

    const response = await fetch(
      `index.php?controller=AccountController&accion=loadUserInfo&id=${userId}`
    );

    const data = await response.json();

    if (data && data.length > 0) {
      const user = data[0];
      // Inputs
      nombre.value = user.Nombre;
      apellidos.value = user.Apellidos;
      email.value = user.Email;
      telefono.value = user.num_Tel;

      // H3 username
      username.innerHTML = user.Nombre;

      // Image
      imagen.src = user.UserImagePath || 'assets/images/icons/userLogo.png';
    } else {
      showError(data.message);
    }
  } catch (error) {
    showError('Error al cargar la información del usuario');
  }
}

// Cargar tabla de administraccion
async function loadAdminTable() {
  try {
    const adminTable = document.getElementById('adminTable');

    const response = await fetch(`index.php?controller=AccountController&accion=loadAdminTable`);

    const data = await response.json();

    if (data && data.length > 0) {
      adminTable.innerHTML = data.length
        ? data
            .map(
              (user) => `
    <tr data-user-id="${user.id}">
      <td>${user.id}</td>
      <td>${user.Nombre}</td>
      <td>${user.Apellidos}</td>
      <td>${user.Email}</td>
      <td>${user.num_Tel}</td>
      <td>${user.Tipo}</td>
      <td>
        <button type="button" onclick="deleteUser(${user.id})">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 7l16 0" />
              <path d="M10 11l0 6" />
              <path d="M14 11l0 6" />
              <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
              <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
          </svg>
        </button>
      </td>
    </tr>`
            )
            .join('')
        : '<p>No hay usuarios</p>';
    } else {
      showError(data.message);
    }
  } catch (error) {
    showError('Error al cargar la tabla de administración');
  }
}

async function deleteUser(userID) {
  try {
    const response = await fetch(
      `index.php?controller=AccountController&accion=deleteUser&id=${userID}`
    );

    const data = await response.json();

    if (data.status === 'ok') {
      await loadAdminTable();
    } else {
      throw new Error('Error al eliminar el usuario');
    }
  } catch (error) {
    showError(error);
  }
}

//////// Editar Info del Perfil ////////
const editButton = document.getElementById('editUserInfo');
const inputs = document.querySelectorAll('.userInput');
let editingInfo = false;

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

    if (data.status === 'ok') {
      showError(data.msg);
      document.getElementById('ChangePasswd').reset();
    } else {
      showError(data.msg);
    }
  } catch (error) {
    showError('Error en el fetch ' + error);
  }
}

loadUserInfo();
loadAdminTable();
