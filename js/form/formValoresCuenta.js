$(document).ready(function () {
    $('#formValorCuenta').submit(function (e) {
        e.preventDefault(); // Evitar la acción predeterminada del formulario

        // Obtener los datos del formulario
        // var formData = $(this).serialize();
        var Cuenta = document.getElementById("Cuenta").value
        var SupTerrenoH = document.getElementById("SupTerrenoH").value
        var SupConstruccionH = document.getElementById("SupConstruccionH").value
        var ValTerrenoH = document.getElementById("ValTerrenoH").value
        var ValConstruccionH = document.getElementById("ValConstruccionH").value
        var ValCatastralH = document.getElementById("ValCatastralH").value
        var SupTerrenoV = document.getElementById("SupTerrenoV").value
        var SupConstruccionV = document.getElementById("SupConstruccionV").value
        var ValTerrenoV = document.getElementById("ValTerrenoV").value
        var ValConstruccionV = document.getElementById("ValConstruccionV").value
        var ValCatastralV = document.getElementById("ValCatastralV").value
        var bd = document.getElementById("base").value
        // Enviar la solicitud Ajax
        $.ajax({
            url: 'php/actions/valoresCuentaSave.php', // Ruta del archivo PHP que procesará el formulario
            method: 'POST',
            data: {
                Cuenta,
                SupTerrenoH,
                SupConstruccionH,
                ValTerrenoH,
                ValConstruccionH,
                ValCatastralH,
                SupTerrenoV,
                SupConstruccionV,
                ValTerrenoV,
                ValConstruccionV,
                ValCatastralV,
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
