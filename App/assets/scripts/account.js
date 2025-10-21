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

//////// Editar Perfil ////////
const editButton = document.getElementById('editUser');
const inputs = document.querySelectorAll('input');
let editing = false;

editButton.addEventListener('click', async function () {
  if (!editing) {
    inputs.forEach((input) => input.removeAttribute('disabled'));
    editButton.textContent = 'Guardar';
    editing = true;
  } else {
    inputs.forEach((input) => input.setAttribute('disabled', ''));
    editButton.textContent = 'Editar usuario';
    editing = false;

    await saveUserInfo();
  }
});

async function loadUserInfo() {
  try {
    const nombre = document.getElementById('nombre');
    const apellidos = document.getElementById('apellidos');
    const usuario = document.getElementById('usuario');
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
      usuario.value = user.Nombre_usuario;
      telefono.value = user.num_Tel;

      // H3 username
      username.innerHTML = user.Nombre_usuario;
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
