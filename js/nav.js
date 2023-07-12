$(document).ready(function() {
    // Cargar contenido predeterminado
    $('#contenidoContainer').load('php/infoCuenta/index.php');
    // Cargar contenido sin recargar la página al hacer clic en un enlace
    $('#informacionCuenta').click(function(event) {
      event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
      $('#contenidoContainer').load('php/infoCuenta/index.php');
    });
    //Contenido de Ubicacion cuenta
    $('#UbicacionCuenta').click(function(event) {
      event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
  
      $('#contenidoContainer').load('php/location/ubicacionCuenta.php');
    });
    //Contenido de foto de cuenta
    $('#FotosCuenta').click(function(event) {
      event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
  
      $('#contenidoContainer').load('php/photos/fotosCuenta.php');
    });
    //Contenido de Tareas de cuenta
    $('#TasksCuenta').click(function(event) {
      event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
  
      $('#contenidoContainer').load('php/tasks/tareasCuenta.php');
    });
  });