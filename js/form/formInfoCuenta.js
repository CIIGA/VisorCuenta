$(document).ready(function () {
    $('#formInfoCuenta').submit(function (e) {
        e.preventDefault(); // Evitar la acción predeterminada del formulario

        // Obtener los datos del formulario
        // var formData = $(this).serialize();
        var Cuenta = document.getElementById("Cuenta").value
        var Propietario = document.getElementById("Propietario").value
        var CuentaUni = document.getElementById("CuentaUni").value
        var NumExt = document.getElementById("NumExt").value
        var Colonia = document.getElementById("Colonia").value
        var Cp = document.getElementById("Cp").value
        var Giro = document.getElementById("Giro").value
        var Manzana = document.getElementById("Manzana").value
        var DeudaTotal = document.getElementById("DeudaTotal").value
        var Rango = document.getElementById("Rango").value
        var FechaActualizacion = document.getElementById("FechaActualizacion").value
        var Longitud = document.getElementById("Longitud").value
        var Clave = document.getElementById("Clave").value
        var Expediente = document.getElementById("Expediente").value
        var Calle = document.getElementById("Calle").value
        var NumInt = document.getElementById("NumInt").value
        var Poblacion = document.getElementById("Poblacion").value
        var TipoServicio = document.getElementById("TipoServicio").value
        var SerieMedidor = document.getElementById("SerieMedidor").value
        var Lote = document.getElementById("Lote").value
        var TotalPagado = document.getElementById("TotalPagado").value
        var FechaUPago = document.getElementById("FechaUPago").value
        var Latitud = document.getElementById("Latitud").value
        var EntreCalle1 = document.getElementById("EntreCalle1").value
        var EntreCalle2 = document.getElementById("EntreCalle2").value
        var bd = document.getElementById("base").value
        // Enviar la solicitud Ajax
        $.ajax({
            url: 'php/actions/infoCuentaSave.php', // Ruta del archivo PHP que procesará el formulario
            method: 'POST',
            data: {
                Cuenta,
                Propietario,
                CuentaUni,
                NumExt,
                Colonia,
                Cp,
                Giro,
                Manzana,
                DeudaTotal,
                Rango,
                FechaActualizacion,
                Longitud,
                Clave,
                Expediente,
                Calle,
                NumInt,
                Poblacion,
                TipoServicio,
                SerieMedidor,
                Lote,
                TotalPagado,
                FechaUPago,
                Latitud,
                EntreCalle1,
                EntreCalle2,
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
