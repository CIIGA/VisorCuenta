$(document).ready(function () {
    $('#formContactoCuenta').submit(function (e) {
        e.preventDefault(); // Evitar la acción predeterminada del formulario

        // Obtener los datos del formulario
        // var formData = $(this).serialize();
        var Cuenta = document.getElementById("Cuenta").value
        var TelefonoLocal = document.getElementById("TelefonoLocal").value
        var TelefonoCelular = document.getElementById("TelefonoCelular").value
        var TelefonoRadio = document.getElementById("TelefonoRadio").value
        var CorreoElectronico = document.getElementById("CorreoElectronico").value
        var TelefonoLocalUsuario = document.getElementById("TelefonoLocalUsuario").value
        var TelefonoCelularUsuario = document.getElementById("TelefonoCelularUsuario").value
        var TelefonoRadioUsuario = document.getElementById("TelefonoRadioUsuario").value
        var CorreoElectronicoUsuario = document.getElementById("CorreoElectronicoUsuario").value
        var ObsTelefonoLocal = document.getElementById("ObsTelefonoLocal").value
        var ObsTelefonoCelular = document.getElementById("ObsTelefonoCelular").value
        var ObsCorreoElectronico = document.getElementById("ObsCorreoElectronico").value
        var bd = document.getElementById("base").value
        // Enviar la solicitud Ajax
        $.ajax({
            url: 'php/actions/contactoCuentaSave.php', // Ruta del archivo PHP que procesará el formulario
            method: 'POST',
            data: {
                Cuenta,
                TelefonoLocal,
                TelefonoCelular,
                TelefonoRadio,
                CorreoElectronico,
                TelefonoLocalUsuario,
                TelefonoCelularUsuario,
                TelefonoRadioUsuario,
                CorreoElectronicoUsuario,
                ObsTelefonoLocal,
                ObsTelefonoCelular,
                ObsCorreoElectronico,
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
