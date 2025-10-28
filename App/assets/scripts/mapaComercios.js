// Coordenadas de Vitoria-Gasteiz
const vitoriaCoords = [42.8467, -2.6716];

// Límite aproximado
const boundsVitoria = [
  [42.8, -2.74], // suroeste
  [42.9, -2.6], // noreste
];

// Inicializar el mapa
const map = L.map('map', {
  center: vitoriaCoords,
  zoom: 13,
  minZoom: 12,
  maxZoom: 18,
  maxBounds: boundsVitoria,
  maxBoundsViscosity: 1.0,
});

// Capa base
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors',
}).addTo(map);

// Grupo de marcadores
const markers = L.layerGroup().addTo(map);

// Cargar comercios desde la base de datos
async function cargarComercios() {
  try {
    let funcion = '';
    let controller = '';
    const esPaginaMisComercios = window.location.href.includes('ComercianteController');
    if (esPaginaMisComercios) {
      controller = 'ComercianteController';
      funcion = 'getCoordsMiComercio';
    } else {
      controller = 'ComercioController';
      funcion = 'getCoords';
    }
    const response = await fetch('index.php?controller=' + controller + '&accion=' + funcion);
    const comercios = await response.json();

    comercios.forEach((comercio) => {
      const lat = parseFloat(comercio.Latitud);
      const lon = parseFloat(comercio.Longitud);
      const nombre = comercio.Nombre_comercio;
      const idComercio = comercio.id;

      const marker = L.marker([lat, lon]).addTo(markers);
      //Que salga el nombre al pasar el raton
      marker.bindTooltip(nombre);

      // Al hacer clic redirigir a la info del comercio
      marker.on('click', () => {
        window.location.href = `index.php?controller=ComercioController&accion=info&id=${idComercio}`;
      });
    });
  } catch (err) {
    showError('Error al cargar comercios:', err);
  }
}

cargarComercios();
