$(document).ready(function () {
    $('#formAdeudoCuenta').submit(function (e) {
        e.preventDefault(); // Evitar la acción predeterminada del formulario

        // Obtener los datos del formulario
        // var formData = $(this).serialize();
        var Cuenta = document.getElementById("Cuenta").value
        var IdAdeudo = document.getElementById("IdAdeudo").value
        var SaldoCorriente = document.getElementById("SaldoCorriente").value
        var SaldoRezago = document.getElementById("SaldoRezago").value
        var SConvenioAgua = document.getElementById("SConvenioAgua").value
        var RecargosConvenio = document.getElementById("RecargosConvenio").value
        var VencidoContrato = document.getElementById("VencidoContrato").value
        var GastoEj = document.getElementById("GastoEj").value
        var MultasOTros = document.getElementById("MultasOTros").value
        var Fomento = document.getElementById("Fomento").value
        var Recargos = document.getElementById("Recargos").value
        var FechaUlPago = document.getElementById("FechaUlPago").value
        var SaldoAtraso = document.getElementById("SaldoAtraso").value
        var RecargosAcum = document.getElementById("RecargosAcum").value
        var VencidoConvenio = document.getElementById("VencidoConvenio").value
        var SConvenioObra = document.getElementById("SConvenioObra").value
        var RecargosContrato = document.getElementById("RecargosContrato").value
        var Multas = document.getElementById("Multas").value
        var Impuesto = document.getElementById("Impuesto").value
        var Actualizacion = document.getElementById("Actualizacion").value
        var FechaAct = document.getElementById("FechaAct").value
        var Total = document.getElementById("Total").value
        var bd = document.getElementById("base").value
        // Enviar la solicitud Ajax
        $.ajax({
            url: 'php/actions/adeudosCuentaSave.php', // Ruta del archivo PHP que procesará el formulario
            method: 'POST',
            data: {
                Cuenta,
                bd,
                IdAdeudo,
                SaldoCorriente,
                SaldoRezago,
                SConvenioAgua,
                RecargosConvenio,
                VencidoContrato,
                GastoEj,
                MultasOTros,
                Fomento,
                Recargos,
                FechaUlPago,
                SaldoAtraso,
                RecargosAcum,
                VencidoConvenio,
                SConvenioObra,
                RecargosContrato,
                Multas,
                Impuesto,
                Actualizacion,
                FechaAct,
                Total
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
