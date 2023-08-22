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
        
        if (response.info.length > 0) {
          
          var data = response.info[0];
          var datos = response.pagos;

          // Infomacion Cuenta
          $('#Cuenta').val(data.Cuenta);
          $('#Propietario').val(data.Propietario);
          $('#CuentaUni').val(data.CuentaUnificada);
          $('#NumExt').val(data.NumExt);
          $('#Colonia').val(data.Colonia);
          $('#Cp').val(data.Cp);
          $('#Giro').val(data.Giro);
          $('#Manzana').val(data.Manzana);
          // $('#Efectos').val(data.Cuenta); Pendiente 
          $('#DeudaTotal').val(data.DedudaTotal);
          $('#Rango').val(data.Rango);
          $('#FechaActualizacion').val(data.FechaActualizacion);
          $('#Longitud').val(data.Longitud);
          $('#Clave').val(data.Clave);
          $('#Expediente').val(data.Expediente);
          $('#Calle').val(data.Calle);
          $('#NumInt').val(data.NumInt);
          $('#Poblacion').val(data.Poblacion);
          $('#TipoServicio').val(data.TipoServicio);
          $('#SerieMedidor').val(data.SerieMedidor);
          $('#Lote').val(data.Lote);
          $('#TotalPagado').val(data.TotalPagado);
          $('#FechaUPago').val(data.FechaUltimoPago);
          $('#Latitud').val(data.Latitud);
          $('#EntreCalle1').val(data.EntreCalle1);
          $('#EntreCalle2').val(data.EntreCalle2);
          // Domicilio Notificacion
          $('#CalleNotificacion').val(data.CalleNotificacion);
          $('#NumExtNotificacion').val(data.NumExtNotificacion);
          $('#NumIntNotificacion').val(data.NumIntNotificacion);
          $('#ColoniaNotificacion').val(data.ColoniaNotificacion);
          $('#PoblacionNotificacion').val(data.PoblacionNotificacion);
          $('#CPNotificacion').val(data.CPNotificacion);
          $('#EntreCalleUno').val(data.EntreCalle1Notificacion);
          $('#EntreCalleDos').val(data.EntreCalle2Notificacion);
          $('#LoteNotificacion').val(data.ReferenciaNotificacion);
          $('#ManzanaNotificacion').val(data.ManzanaNotificacion);
          $('#ReferenciaNotificacion').val(data.LoteNotificacion);
          // $('#OtroDomicilio').val(data.EntreCalle2); Pendiente
          // Contacto
          $('#TelefonoLocal').val(data.TelefonoLocal);
          $('#TelefonoCelular').val(data.TelefonoCelular);
          $('#CorreoElectronico').val(data.CorreoElectronico);
          $('#TelefonoLocalUsuario').val(data.TelefonoLocalUsuario);
          $('#TelefonoCelularUsuario').val(data.TelefonoCelularUsuario);
          $('#TelefonoRadioUsuario').val(data.TelefonoRadioUsuario);
          $('#CorreoElectronicoUsuario').val(data.CorreoElectronicoUsuario);
          $('#ObsTelefonoLocal').val(data.ObservacionesTelefonoLocal);
          $('#ObsTelefonoCelular').val(data.ObservacionesTelefonoCelular);
          $('#ObsTelefonoRadio').val(data.ObservacionesTelefonoRadio);
          $('#ObsCorreoElectronico').val(data.ObservacionesCorreoElectronico);
          // Valores Catastrales
          $('#SupTerrenoH').val(data.SupTerrenoH);
          $('#SupConstruccionH').val(data.SupConstruccionH);
          $('#ValTerrenoH').val(data.ValorTerrenoH);
          $('#ValConstruccionH').val(data.ValorConstruccionH);
          $('#ValCatastralH').val(data.ValorCatastralH);
          $('#SupTerrenoV').val(data.SupTerrenoValuado);
          $('#SupConstruccionV').val(data.SupConstruccionValuado);
          $('#ValTerrenoV').val(data.ValorTerrenoValuado);
          $('#ValConstruccionV').val(data.ValorConstruccionValuado);
          $('#ValCatastralV').val(data.ValorCatastralValuado);
          // Adeudos
          $('#IdAdeudo').val(data.IdAdeudo);
          $('#SaldoCorriente').val(data.SaldoCorriente);
          $('#SaldoRezago').val(data.SaldoRezago);
          $('#SConvenioAgua').val(data.SConvenioAgua);
          $('#RecargosConvenio').val(data.RecargosConvenio);
          $('#VencidoContrato').val(data.VencidoContrato);
          $('#GastoEj').val(data.ValorCatastralValuado);
          $('#MultasOTros').val(data.MultasOtros);
          $('#Fomento').val(data.Fomento);
          $('#Recargos').val(data.Recargos);
          $('#FechaUlPago').val(data.FechaUltimoPagoAdeudos);
          // $('#EfectosA').val(data.ValorCatastralValuado); Buscar efectos
          $('#SaldoAtraso').val(data.SaldoAtraso);
          $('#RecargosAcum').val(data.RecargosAcum);
          $('#VencidoConvenio').val(data.VencidoConvenio);
          $('#SConvenioObra').val(data.SConvenioObra);
          $('#RecargosContrato').val(data.RecargosContrato);
          $('#Multas').val(data.Multas);
          $('#Impuesto').val(data.Impuesto);
          $('#Actualizacion').val(data.Actualizacion);
          $('#FechaAct').val(data.FechaActualizacionAdeudos);
          $('#Total').val(data.TotalAdeudo);
          //Pagos
          let rowHTML = "";
          let numberR = 1;
          
          datos.forEach(element => {

            rowHTML = rowHTML + '<tr>'
            +'<td><input name="CuentaPagos'+numberR+'" type="text" id="CuentaPagos" value="'+element.CuentaPagos+'" class="form-control form-control-sm" placeholder="Cuenta" readonly></td>'
            +'<td><input name="ReferenciaPagos'+numberR+'" type="text" id="ReferenciaPagos" value="'+element.Referencia+'" class="form-control form-control-sm" placeholder="Referencia" readonly></td>'
            +'<td><input name="ReciboPagos'+numberR+'" type="text" id="ReciboPagos" value="'+element.Recibo+'" class="form-control form-control-sm" placeholder="Recibo" readonly></td>'
            +'<td><input name="DescripcionPagos'+numberR+'" type="text" id="DescripcionPagos" value="'+element.Descripcion+'" class="form-control form-control-sm" placeholder="Descripcion" readonly></td>'
            +'<td><input name="TotalPagos'+numberR+'" type="text" id="TotalPagos" value="'+element.Total+'" class="form-control form-control-sm" placeholder="TotalPagos" readonly></td>'
            +'<td><input name="FechaPagos'+numberR+'" type="text" id="FechaPagos" value="'+element.FechaPago+'" class="form-control form-control-sm" placeholder="Fecha" readonly></td>'
            +'</tr>'

            numberR++;
            
          });
          
          $('#cuerpoTabla').html(rowHTML);

        }else {
          let rowHTML = '<tr>'
            +'<td><input name="CuentaPagos" type="text" id="CuentaPagos" class="form-control form-control-sm" placeholder="Cuenta" readonly></td>'
            +'<td><input name="ReferenciaPagos" type="text" id="ReferenciaPagos" class="form-control form-control-sm" placeholder="Referencia" readonly></td>'
            +'<td><input name="ReciboPagos" type="text" id="ReciboPagos" class="form-control form-control-sm" placeholder="Recibo" readonly></td>'
            +'<td><input name="DescripcionPagos" type="text" id="DescripcionPagos" class="form-control form-control-sm" placeholder="Descripcion" readonly></td>'
            +'<td><input name="TotalPagos" type="text" id="TotalPagos" class="form-control form-control-sm" placeholder="TotalPagos" readonly></td>'
            +'<td><input name="FechaPagos" type="text" id="FechaPagos" class="form-control form-control-sm" placeholder="Fecha" readonly></td>'
            +'</tr>';

          $('#cuerpoTabla').html(rowHTML);

          $('#Cuenta').val('');
          $('#Propietario').val('');
          $('#CuentaUni').val('');
          $('#NumExt').val('');
          $('#Colonia').val('');
          $('#Cp').val('');
          $('#Giro').val('');
          $('#Manzana').val('');
          $('#Efectos').val('');
          $('#DeudaTotal').val('');
          $('#Rango').val('');
          $('#FechaActualizacion').val('');
          $('#Longitud').val('');
          $('#Clave').val('');
          $('#Expediente').val('');
          $('#Calle').val('');
          $('#NumInt').val('');
          $('#Poblacion').val('');
          $('#TipoServicio').val('');
          $('#SerieMedidor').val('');
          $('#Lote').val('');
          $('#TotalPagado').val('');
          $('#FechaUPago').val('');
          $('#Latitud').val('');
          $('#EntreCalle1').val('');
          $('#EntreCalle2').val('');
          // Domicilio Notificacion
          $('#CalleNotificacion').val('');
          $('#NumExtNotificacion').val('');
          $('#NumIntNotificacion').val('');
          $('#ColoniaNotificacion').val('');
          $('#PoblacionNotificacion').val('');
          $('#CPNotificacion').val('');
          $('#EntreCalleUno').val('');
          $('#EntreCalleDos').val('');
          $('#LoteNotificacion').val('');
          $('#ManzanaNotificacion').val('');
          $('#ReferenciaNotificacion').val('');
          // Contacto
          $('#TelefonoLocal').val('');
          $('#TelefonoCelular').val('');
          $('#CorreoElectronico').val('');
          $('#TelefonoLocalUsuario').val('');
          $('#TelefonoCelularUsuario').val('');
          $('#TelefonoRadioUsuario').val('');
          $('#CorreoElectronicoUsuario').val('');
          $('#ObsTelefonoLocal').val('');
          $('#ObsTelefonoCelular').val('');
          $('#ObsTelefonoRadio').val('');
          $('#ObsCorreoElectronico').val('');
          // Valores Catastrales
          $('#SupTerrenoH').val('');
          $('#SupConstruccionH').val('');
          $('#ValTerrenoH').val('');
          $('#ValConstruccionH').val('');
          $('#ValCatastralH').val('');
          $('#SupTerrenoV').val('');
          $('#SupConstruccionV').val('');
          $('#ValTerrenoV').val('');
          $('#ValConstruccionV').val('');
          $('#ValCatastralV').val('');
          // Adeudos
          $('#SaldoCorriente').val('');
          $('#SaldoRezago').val('');
          $('#SConvenioAgua').val('');
          $('#RecargosConvenio').val('');
          $('#VencidoContrato').val('');
          $('#GastoEj').val('');
          $('#MultasOTros').val('');
          $('#Fomento').val('');
          $('#Recargos').val('');
          $('#FechaUlPago').val('');
          $('#SaldoAtraso').val('');
          $('#RecargosAcum').val('');
          $('#VencidoConvenio').val('');
          $('#SConvenioObra').val('');
          $('#RecargosContrato').val('');
          $('#Multas').val('');
          $('#Impuesto').val('');
          $('#Actualizacion').val('');
          $('#FechaAct').val('');
          $('#Total').val('');
          //Pagos
          $('#CuentaPagos').val('');
          $('#ReferenciaPagos').val('');
          $('#ReciboPagos').val('');
          $('#DescripcionPagos').val('');
          $('#TotalPagos').val('');
          $('#FechaPagos').val('');
        }
      },
      error: function() {
        console.log("Errores");
        Swal.fire({
          icon: 'error',
          title: 'Error al consultar datos',
          timer: 2000
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
  });
});
