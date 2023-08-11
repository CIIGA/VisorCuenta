$(document).ready(function () {
    $('#searchButton').click(function () {
        var searchInput = $('#searchInput').val();
        var bd = $('#base').val();
        var id_usuario = $('#id_usuario').val();
        var url = new URL(window.location.href);
        //Parametro de la url 
        var params = new URLSearchParams(url.search);
        //Extraccion de la plaza
        var plz = params.get('plz');
        // Primera petición AJAX
        var request1 = $.ajax({
            url: 'php/actions/tareasRealizadasCuenta.php',
            method: 'GET',
            data: { searchInput, bd },
        });

        // Segunda petición AJAX
        var request2 = $.ajax({
            url: 'php/actions/tareasPendientesCuenta.php',
            method: 'GET',
            data: { searchInput, bd },
        });

        // Ejecutar las dos peticiones al mismo tiempo
        $.when(request1, request2).done(function (response1, response2) {
            var responseRealizadas = response1[0];
            var responsePendientes = response2[0];

            // Procesar respuesta de tareas realizadas
            var tareasContainerRealizadas = document.getElementById('tareasContainerRealizadas');
            // Vaciar el contenedor de las tarjetas existentes
            tareasContainerRealizadas.innerHTML = '';
            // Agregar el estilo de desplazamiento al contenedor
            tareasContainerRealizadas.style.overflow = 'auto';
            tareasContainerRealizadas.style.maxHeight = '400px'; // Establece la altura máxima deseada

            for (var i = 0; i < responseRealizadas.length; i++) {
                // Crear tarjetas de tareas realizadas y agregarlas al contenedor
                // Código para generar tarjetas de tareas realizadas
                var tarea = responseRealizadas[i];
                var FechaCaptura = tarea.FechaCaptura;
                var nombre = tarea.nombre;
                var descripcion = tarea.DescripcionTarea;
                var rol = tarea.Rol;
                var IdRegistro = tarea.IdRegistro;

                // Crea el código HTML de la tarjeta de tarea
                var tarjeta = document.createElement('div');
                tarjeta.className = 'card m-4 p-2';
                tarjeta.style.width = '18rem';

                var tarjetaBody = document.createElement('div');
                tarjetaBody.className = 'card-body';
                tarjeta.appendChild(tarjetaBody);

                var fechac = document.createElement('p');
                fechac.textContent = 'Fecha de Captura: ' + FechaCaptura;
                fechac.style.color = 'green';
                tarjetaBody.appendChild(fechac);

                var nombrep = document.createElement('p');
                nombrep.textContent = 'Nombre: ' + nombre;
                tarjetaBody.appendChild(nombrep);

                var descripcionP = document.createElement('p');
                descripcionP.textContent = 'Descripción: ' + descripcion;
                tarjetaBody.appendChild(descripcionP);

                // if (rol === 'Carta' || rol === 'Abogado' || rol === 'Gestor' || rol === 'Cortes') {
                //     // Agrega el botón de redirección
                //     var botonRedireccion = document.createElement('button');
                //     botonRedireccion.textContent = 'Detalles';
                //     botonRedireccion.className = 'btn btn-save';
                //     botonRedireccion.addEventListener('click', function () {
                //         // Redirige a la otra vista al hacer clic en el botón
                //         window.location.href = 'php/gestiones/?bd=' + bd + '&rol=' + rol + '&registro=' + IdRegistro + '&cuenta=' + searchInput+'&plz='+plz;
                //     });

                //     tarjetaBody.appendChild(botonRedireccion);
                // }

                if (rol === 'Carta' || rol === 'Abogado' || rol === 'Gestor' || rol === 'Cortes') {
                    var botonRedireccion = document.createElement('button');
                    botonRedireccion.textContent = 'Detalles';
                    botonRedireccion.className = 'btn btn-save';
                
                    // Utiliza una función externa para capturar los valores de rol e IdRegistro
                    // en cada iteración del bucle
                    botonRedireccion.addEventListener('click', (function (rol, IdRegistro) {
                      return function () {
                        // Redirige a la otra vista al hacer clic en el botón
                        window.location.href = 'php/gestiones/?bd=' + bd + '&rol=' + rol + '&registro=' + IdRegistro + '&cuenta=' + searchInput+'&plz='+plz+'&id_usuario='+id_usuario;
                      };
                    })(rol, IdRegistro));
                
                    tarjetaBody.appendChild(botonRedireccion);
                  }
                // Agrega la tarjeta al contenedor
                tareasContainerRealizadas.appendChild(tarjeta);
            }

            // Procesar respuesta de tareas pendientes
            var tareasContainer = document.getElementById('tareasContainer');
            // Vaciar el contenedor de las tarjetas existentes
            tareasContainer.innerHTML = '';
            // Agregar el estilo de desplazamiento al contenedor
            tareasContainer.style.overflow = 'auto';
            tareasContainer.style.maxHeight = '400px'; // Establece la altura máxima deseada

            for (var i = 0; i < responsePendientes.length; i++) {
                // Crear tarjetas de tareas pendientes y agregarlas al contenedor
                // Código para generar tarjetas de tareas pendientes
                // Procesa la respuesta del servidor que contiene el JSON
                var tarea = responsePendientes[i];
                var fechaVencimiento = tarea.FechaVencimiento;
                var asignado = tarea.Asignado;
                var descripcion = tarea.DescripcionTarea;

                // Crea el código HTML de la tarjeta de tarea
                var tarjeta = document.createElement('div');
                tarjeta.className = 'card m-4 p-2';
                tarjeta.style.width = '18rem';

                var tarjetaBody = document.createElement('div');
                tarjetaBody.className = 'card-body';
                tarjeta.appendChild(tarjetaBody);

                var fechaP = document.createElement('p');
                fechaP.textContent = 'Fecha de Vencimiento: ' + fechaVencimiento;
                fechaP.style.color = 'red';
                tarjetaBody.appendChild(fechaP);

                var asignadoP = document.createElement('p');
                asignadoP.textContent = 'Asignado a: ' + asignado;
                tarjetaBody.appendChild(asignadoP);

                var descripcionP = document.createElement('p');
                descripcionP.textContent = 'Descripción: ' + descripcion;
                tarjetaBody.appendChild(descripcionP);

                // Agrega la tarjeta al contenedor
                tareasContainer.appendChild(tarjeta);

            }

            // Resto del código después de completar las peticiones
        });

        // Resto del código
    });
});