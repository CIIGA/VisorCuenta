$(document).ready(function () {
  $('#searchButton').click(function () {
    var searchInput = $('#searchInput').val();
    var id_plaza = $('#plz').val();
    var base = $('#base').val();

    $.ajax({
      url: 'php/actions/informacionCuenta.php', // Ruta del servidor donde se procesará la solicitud
      method: 'GET',
      data: { id_plaza, searchInput, base },
      success: function (response) {
        if (response.length > 0) {
          var data = response[0];
          // Infomacion Cuenta
          longitud = data.Longitud;
          latitud = data.Latitud;
          initMap(latitud, longitud)
        }
      },
      error: function () {
        Swal.fire({
          icon: 'error',
          title: 'Error al consultar datos',
        });
      },
      beforeSend: function () {
        Swal.fire({
          title: 'Obteniendo Datos',
          html: 'Espere un momento por favor...',
          timer: 0,
          timerProgressBar: true,
          allowEscapeKey: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
          willClose: () => {
            return false;
          }
        });
      },
      complete: function () {
        Swal.close();
      }
    });
  });
});


function initMap(latitud, longitud) {

  // Verificar si las coordenadas son válidas
  if (!isNaN(latitud) && !isNaN(longitud)) {
    $('#alertDiv').hide();
   
    // Coordenadas de la ubicación
    latitud = parseFloat(latitud);
    longitud = parseFloat(longitud);
    var location = {
      lat: latitud,
      lng: longitud
    };

    // Mapa
    var map = new google.maps.Map(document.getElementById('map'), {
      center: location,
      zoom: 15
    });

    // Marcador de la ubicación
    var marker = new google.maps.Marker({
      position: location,
      map: map,
      title: 'Ubicación'
    });

    // Vista panorámica
    var panorama = new google.maps.StreetViewPanorama(document.getElementById('panorama'), {
      position: location,
      pov: {
        heading: 0,
        pitch: 0
      },
      zoom: 1
    });

    // Asociar la vista panorámica al mapa
    map.setStreetView(panorama);
  } else {
    // $('#alertDiv').show();
    $('#alertDiv').show();
    return;

  }
}