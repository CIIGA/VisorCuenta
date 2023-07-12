$(document).ready(function () {
    $('#formDomicilioCuenta').submit(function (e) {
        e.preventDefault(); // Evitar la acción predeterminada del formulario

        // Obtener los datos del formulario
        // var formData = $(this).serialize();
        var Cuenta = document.getElementById("Cuenta").value
        var CalleNotificacion = document.getElementById("CalleNotificacion").value
        var NumExtNotificacion = document.getElementById("NumExtNotificacion").value
        var NumIntNotificacion = document.getElementById("NumIntNotificacion").value
        var ColoniaNotificacion = document.getElementById("ColoniaNotificacion").value
        var PoblacionNotificacion = document.getElementById("PoblacionNotificacion").value
        var CPNotificacion = document.getElementById("CPNotificacion").value
        var EntreCalleUno = document.getElementById("EntreCalleUno").value
        var EntreCalleDos = document.getElementById("EntreCalleDos").value
        var LoteNotificacion = document.getElementById("LoteNotificacion").value
        var ManzanaNotificacion = document.getElementById("ManzanaNotificacion").value
        var ReferenciaNotificacion = document.getElementById("ReferenciaNotificacion").value
        var LoteNotificacion = document.getElementById("LoteNotificacion").value
        var bd = document.getElementById("base").value
        // Enviar la solicitud Ajax
        $.ajax({
            url: 'php/actions/domicilioCuentaSave.php', // Ruta del archivo PHP que procesará el formulario
            method: 'POST',
            data: {
                Cuenta,
                CalleNotificacion,
                NumExtNotificacion,
                NumIntNotificacion,
                ColoniaNotificacion,
                PoblacionNotificacion,
                CPNotificacion,
                EntreCalleUno,
                EntreCalleDos,
                LoteNotificacion,
                ManzanaNotificacion,
                ReferenciaNotificacion,
                LoteNotificacion,
                bd
            },
            // Si la peticion fue realizado con exito
            success: function (response) {
                // Mostrar mensaje de éxito con SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: '¡Registro exitoso!',
                    text: 'Los datos se han registrado correctamente.'
                });
            },
            // Si la peticion tuvo algun error
            error: function (xhr, status, error) {
                // Mostrar mensaje de error con SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar el formulario. Por favor, inténtalo nuevamente.'
                });
            }
        });
    });
});
