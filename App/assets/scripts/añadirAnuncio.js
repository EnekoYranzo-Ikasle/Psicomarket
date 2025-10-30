let formulario = document.querySelector(".formularioAñadirAnuncio");
let btnCancelar = document.querySelector(".btn-cancelar");
let btnGuardar = document.querySelector(".btn-guardar");
let latInput = document.querySelector("#lat");
let lonInput = document.querySelector("#lon");
let cantidadLetras = document.querySelector(".cantidadLetras");

cantidadLetras.textContent = "0 / 1000";
document.getElementById("descripcionAnuncio").addEventListener("input", function() {
    let longitudActual = this.value.length;
    cantidadLetras.textContent = `${longitudActual} / 1000`;
    if (longitudActual > 1000) {
        this.value = this.value.slice(0, 1000);
        
    }
    if (longitudActual === 1000) {
        cantidadLetras.style.color = "red";
    } else {
        cantidadLetras.style.color = "#1a56db";
    }
});

function limpiarFormulario() {    
    document.getElementById("nombreAnuncio").value = "";
    document.getElementById("descripcionAnuncio").value = "";
    document.getElementById("calleInput").value = "";
    document.getElementById("resultados2").innerHTML = "";
    document.getElementById("resultados2").style.display = "none";
    document.getElementById("lat").value = "";
    document.getElementById("lon").value = "";
    document.getElementById("msg").style.display = "none";
}

btnCancelar.addEventListener("click", () =>{
    limpiarFormulario();
    formulario.style.display = "none";
    document.body.style.overflow = 'auto';

});

document.querySelector(".añadirAnuncio").addEventListener("click", () => {
    formulario.style.display = "flex";
    formulario.style.justifyContent = "center";
    formulario.style.alignItems = "center";
    document.body.style.overflow = 'hidden';
});

function buscarCalle() {
  // Elementos del DOM
  const calleInput = document.getElementById("calleInput");
  const select = document.getElementById("resultados2");
  const msg = document.getElementById("msg");
  
  // Configuración de la API
  const API_URL = "https://www.vitoria-gasteiz.org/arcgis/rest/services/internet/10_portales/MapServer/0/query";
  let resultadosMap = new Map();

  // Buscar mientras el usuario escribe
  let timeoutBusqueda;
  calleInput.addEventListener("input", () => {
    clearTimeout(timeoutBusqueda);
    timeoutBusqueda = setTimeout(buscarDireccion, 300);
  });


  // Función principal de búsqueda
  async function buscarDireccion() {
    const textoBusqueda = calleInput.value.trim();
    limpiarResultados();
    
    if (!textoBusqueda) return;

    try {
      const direcciones = await obtenerDirecciones(textoBusqueda);
      mostrarResultados(direcciones);
    } catch (error) {
      mostrarError("Error al buscar. Comprueba tu conexión.");
    }
  }

  // Obtener direcciones de la API
  async function obtenerDirecciones(texto) {
    // Separar calle y número
    const [calle, numero] = texto.split(/\s+(?=\d+$)/);
    const busqueda = `UPPER(NOMBRE) LIKE '%${calle.toUpperCase()}%'${numero ? ` AND NUMERO LIKE '${numero}%'` : ''}`;

    const params = new URLSearchParams({
      where: busqueda,
      outFields: "*",
      f: "json",
      returnGeometry: "true",
      orderByFields: "NOMBRE,NUMERO"
    });

    const respuesta = await fetch(`${API_URL}?${params}`);
    if (!respuesta.ok) throw new Error("Error en la petición");
    
    const datos = await respuesta.json();
    return datos.features || [];
  }

  // Mostrar resultados en el select
  function mostrarResultados(direcciones) {
    if (direcciones.length === 0) {
      mostrarError("No se han encontrado resultados.");
      return;
    }

    direcciones.forEach((direccion, index) => {
      const info = direccion.attributes;
      const id = `id_${index}`;
      
      const option = document.createElement("option");
      option.value = id;
      option.text = `${info.NOMBRE} nº ${info.NUMERO}${info.LETRA || ''}`;
      select.appendChild(option);

      resultadosMap.set(id, direccion);
    });

    select.style.display = "block";
    select.selectedIndex = 0;
    actualizarCoordenadas(select.value);
  }

  // Actualizar coordenadas cuando se selecciona una dirección
  select.addEventListener("change", (e) => actualizarCoordenadas(e.target.value));

  function actualizarCoordenadas(id) {
    const direccion = resultadosMap.get(id);
    if (!direccion?.geometry) return;

    const coords = direccion.geometry;
    proj4.defs("EPSG:25830", "+proj=utm +zone=30 +ellps=GRS80 +units=m +no_defs");
    const [lon, lat] = proj4("EPSG:25830", "WGS84", [coords.x, coords.y]);
    
    latInput.value = lat.toFixed(6);
    lonInput.value = lon.toFixed(6);
  }

  // Funciones auxiliares
  function limpiarResultados() {
    select.style.display = "none";
    select.innerHTML = "";
    resultadosMap.clear();
    msg.style.display = "none";
  }

  function mostrarError(mensaje) {
    msg.textContent = mensaje;
    msg.style.display = "block";
  }

  // Búsqueda inicial si hay texto
  if (calleInput.value.trim()) buscarDireccion();
}

buscarCalle();