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
const inputs = document.querySelectorAll('input');
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

async function loadUserInfo() {
  try {
    const nombre = document.getElementById('nombre');
    const apellidos = document.getElementById('apellidos');
    const email = document.getElementById('email');
    const telefono = document.getElementById('telefono');
    const username = document.getElementById('username');

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

async function saveUserInfo() {
  const formData = {};
  inputs.forEach((input) => (formData[input.id] = input.value));
  console.log('Datos guardados:', formData);
}

loadUserInfo();

