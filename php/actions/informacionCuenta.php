<?php 
header('Content-Type: application/json; charset=utf-8'); // Establece la cabecera para indicar que se trata de una respuesta JSON

require "../cnx/conexion.php";
 $id_plaza = $_GET['id_plaza'];
 $cuenta = $_GET['searchInput'];
 $BD = $_GET['base'];
 $cnx= conexion($BD);
 $sql = "select top(1)
 i.Cuenta as Cuenta, 
 i.Clave as Clave,
 i.Propietario as Propietario,
 i.Expediente as Expediente,
 i.CuentaUnificada as CuentaUnificada,
 i.Calle as Calle,
 i.NumExt as NumExt,
 i.NumInt as NumInt,
 i.Colonia as Colonia,
 i.Poblacion as Poblacion,
 i.CP as CP,
 i.TipoServicio as TipoServicio,
 i.Giro as Giro,
 i.SerieMedidor as SerieMedidor,
 i.Manzana as Manzana,
 i.Lote as Lote,
 i.DeudaTotal as DedudaTotal,
 i.Rango as Rango,
 CONVERT(varchar, i.FechaUltimoPago, 23) as FechaUltimoPago,
 CONVERT(varchar, i.FechaActualizacion, 23) as FechaActualizacion,
 i.Longitud as Longitud,
 i.Latitud as Latitud,
 i.EntreCalle1 as EntreCalle1,
 i.EntreCalle2 as EntreCalle2,
 i.TotalPagado as TotalPagado,
--Efectos
 --Domicilio--
d.CalleNotificacion as CalleNotificacion,
d.NumExtNotificacion as NumExtNotificacion,
d.NumIntNotificacion as NumIntNotificacion,
d.ColoniaNotificacion as ColoniaNotificacion,
d.PoblacionNotificacion as PoblacionNotificacion,
d.CPNotificacion as CPNotificacion,
d.EntreCalle1 as EntreCalle1Notificacion,
d.EntreCalle2 as EntreCalle2Notificacion,
d.Referencia as ReferenciaNotificacion,
d.ManzanaNotificacion as ManzanaNotificacion,
d.LoteNotificacion as LoteNotificacion,
d.LoteNotificacion as LoteNotificacion,
--Contacto--
c.TelefonoLocal as TelefonoLocal,
c.TelefonoCelular as TelefonoCelular,
c.TelefonoRadio as TelefonoRadio,
c.CorreoElectronico as CorreoElectronico,
c.TelefonoLocalUsuario as TelefonoLocalUsuario,
c.TelefonoRadioUsuario as TelefonoRadioUsuario,
c.TelefonoCelularUsuario  as TelefonoCelularUsuario,
c.CorreoElectronicoUsuario as CorreoElectronicoUsuario,
c.ObservacionesTelefonoLocal as ObservacionesTelefonoLocal,
c.ObservacionesTelefonoCelular as ObservacionesTelefonoCelular,
c.ObservacionesTelefonoRadio as ObservacionesTelefonoRadio,
c.ObservacionesCorreoElectronico as ObservacionesCorreoElectronico,
--Valores Catastrales--
v.SupConstruccionH as SupConstruccionH,
v.SupTerrenoH as SupTerrenoH,
v.ValorTerrenoH as ValorTerrenoH,
v.ValorConstruccionH as ValorConstruccionH,
v.ValorCatastralH as ValorCatastralH,
v.SupTerrenoValuado as SupTerrenoValuado,
v.SupConstruccionValuado as SupConstruccionValuado,
v.ValorTerrenoValuado as ValorTerrenoValuado,
v.ValorConstruccionValuado as ValorConstruccionValuado,
v.ValorCatastralValuado as ValorCatastralValuado,
--Adeudos--
a.IdAdeudo as IdAdeudo,
a.SaldoCorriente as SaldoCorriente,
a.SaldoAtraso as SaldoAtraso,
a.SaldoRezago as SaldoRezago,
a.RecargosAcum as RecargosAcum,
a.SConvenioAgua as SConvenioAgua,
a.VencidoConvenio as VencidoConvenio,
a.RecargosConvenio as RecargosConvenio,
a.SConvenioObra as SConvenioObra,
a.VencidoContrato as VencidoContrato,
a.RecargosContrato as RecargosContrato,
a.GastosEj as GastosEj,
a.Multas as Multas,
a.Impuesto as Impuesto,
a.MultasOtros as MultasOtros,
a.Fomento as Fomento,
a.Actualizacion as Actualizacion,
a.Recargos as Recargos,
CONVERT(varchar, a.FechaActualizacion, 23) as FechaActualizacionAdeudos,
CONVERT(varchar, a.FechaUltimoPago, 23) as FechaUltimoPagoAdeudos,
a.Total as TotalAdeudo,
--Efectos--
--Pagos--
p.Cuenta as CuentaPagos,
p.Referencia as Referencia,
p.Referencia as Recibo,
p.Descripcion as Descripcion,
p.Total as Total,
CONVERT(varchar, p.FechaPago, 23) as FechaPago
 from 
 implementta as i, 
 DomiciliosNotificacion as d,
 ContactosCuenta as c,
 ValoresCatastrales as v,
 Adeudos as a,
 Pagos as p
 where i.Cuenta=d.Cuenta and 
 i.Cuenta=c.Cuenta and 
 i.Cuenta=v.Cuenta and 
 i.Cuenta=a.Cuenta and 
 i.Cuenta='$cuenta'
 order by a.FechaActualizacion desc";
 $exec = sqlsrv_query($cnx, $sql);
 $rows = array();

while ($row =sqlsrv_fetch_array($exec, SQLSRV_FETCH_ASSOC)) {
    foreach ($row as &$value) {
        $value = utf8_encode($value);
    }
    $rows[] = $row;
}

$jsonData = json_encode($rows);

if ($jsonData === false) {
    die(json_encode(array('error' => 'Error al convertir los datos en formato JSON')));
}

echo $jsonData;