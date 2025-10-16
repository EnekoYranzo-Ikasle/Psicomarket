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
    const res = await fetch('controllers/ComercioController.php');
    const data = await res.json();

    data.forEach((comercio) => {
      if (comercio.lat && comercio.lon) {
        L.marker([comercio.lat, comercio.lon])
          .addTo(markers)
          .bindPopup(`<b>${comercio.nombre}</b><br>${comercio.direccion}`);
      }
    });
  } catch (err) {
    console.error('Error al cargar comercios:', err);
  }
}

cargarComercios();
