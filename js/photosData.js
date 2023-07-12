$(document).ready(function () {
    $('#searchButton').click(function () {
        var searchInput = $('#searchInput').val();
        var bd = $('#base').val();
        $.ajax({
            url: 'php/actions/fotosCuentaQuery.php', // Ruta del servidor donde se procesará la solicitud
            method: 'GET',
            data: { searchInput, bd },
            success: function (response) {
                // Procesa la respuesta del servidor que contiene el JSON

                // Obtén la referencia al elemento donde se mostrarán las fotos
                var photoRow = document.getElementById('photoRow');
                   // Vaciar el contenedor de las tarjetas existentes
                   photoRow.innerHTML = '';
                // Itera sobre los datos JSON
                for (var i = 0; i < response.length; i++) {
                    var foto = response[i];
                    var Nombre = foto.Nombre;
                    var tarea = foto.tipo;
                    var fechaCaptura = foto.fechaCaptura;

                    // Crea el elemento HTML para mostrar la foto
                    var card = document.createElement('div');
                    card.className = 'card m-4 p-2';
                    card.style.width = '18rem';

                    var img = document.createElement('img');
                    img.className = 'card-img-top img_cuenta';
                    img.src = foto.urlImagen;
                    img.alt = 'img';
                    card.appendChild(img);

                    var cardBody = document.createElement('div');
                    cardBody.className = 'card-body';
                    card.appendChild(cardBody);

                    var p1 = document.createElement('p');
                    p1.textContent = 'Gestor: ' + Nombre;
                    cardBody.appendChild(p1);

                    var p2 = document.createElement('p');
                    p2.textContent = 'Tarea: ' + tarea;
                    cardBody.appendChild(p2);

                    var p3 = document.createElement('p');
                    p3.textContent = 'Fecha Captura: ' + fechaCaptura;
                    cardBody.appendChild(p3);

                    // Agrega el elemento a la fila de fotos
                    photoRow.appendChild(card);
                }
            },
            error: function() {
                Swal.fire({
                  icon: 'error',
                  title: 'Error al consultar datos',
                });
              },
              beforeSend: function() {
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
              complete: function() {
                Swal.close();
              }
        });
    })
});
