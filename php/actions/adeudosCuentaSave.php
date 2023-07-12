<?php
require "../cnx/conexion.php";
// Se reciben los parametros por el motodo post y se condiciona si no reciben nada obtendra un valor por defecto
// $Cuenta = '2017978';
// $IdAdeudo ='10269493';
// $Fomento = 0;
// $BD = 'implementtaTijuanaA';
$Cuenta = isset($_POST['Cuenta']) ? $_POST['Cuenta']:0;
$IdAdeudo = isset($_POST['IdAdeudo']) ? $_POST['IdAdeudo'] : 0;
$SaldoCorriente = isset($_POST['SaldoCorriente']) ? $_POST['SaldoCorriente'] : 0;
$SaldoRezago = isset($_POST['SaldoRezago']) ? $_POST['SaldoRezago'] : 0;
$SConvenioAgua = isset($_POST['SConvenioAgua']) ? $_POST['SConvenioAgua'] : 0;
$RecargosConvenio = isset($_POST['RecargosConvenio']) ? $_POST['RecargosConvenio'] : 0;
$VencidoContrato = isset($_POST['VencidoContrato']) ? $_POST['VencidoContrato'] : 0;
$GastoEj = isset($_POST['GastoEj']) ? $_POST['GastoEj'] : 0;
$MultasOTros = isset($_POST['MultasOTros']) ? $_POST['MultasOTros'] : 0;
$Fomento = isset($_POST['Fomento']) ? $_POST['Fomento'] : 0;
$Recargos = isset($_POST['Recargos']) ? $_POST['Recargos'] : 0;
$Recargos = isset($_POST['FechaUlPago']) ? $_POST['FechaUlPago'] : 0;
$SaldoAtraso = isset($_POST['SaldoAtraso']) ? $_POST['SaldoAtraso'] : 0;
$RecargosAcum = isset($_POST['RecargosAcum']) ? $_POST['RecargosAcum'] : 0;
$VencidoConvenio = isset($_POST['VencidoConvenio']) ? $_POST['VencidoConvenio'] : 0;
$SConvenioObra = isset($_POST['SConvenioObra']) ? $_POST['SConvenioObra'] : 0;
$RecargosContrato = isset($_POST['RecargosContrato']) ? $_POST['RecargosContrato'] : 0;
$Multas = isset($_POST['Multas']) ? $_POST['Multas'] : 0;
$Impuesto = isset($_POST['Impuesto']) ? $_POST['Impuesto'] : 0;
$Actualizacion = isset($_POST['Actualizacion']) ? $_POST['Actualizacion'] : 0;
$FechaAct = isset($_POST['FechaAct']) ? $_POST['FechaAct'] : 0;
$FechaUPago = isset($_POST['FechaUPago']) ? $_POST['FechaUPago'] : 0;
$Total = isset($_POST['Total']) ? $_POST['Total'] : 0;
$BD = $_POST['bd'];
//Conexion a la BD 
$cnx = conexion($BD);
//Sentencia sql 
$sql = "UPDATE [dbo].[Adeudos]
SET [Cuenta] = ?
   ,[SaldoCorriente] = TRY_CAST(? AS money)
   ,[SaldoAtraso] = TRY_CAST(? AS money)
   ,[SaldoRezago] = TRY_CAST(? AS money)
   ,[RecargosAcum] = TRY_CAST(? AS money)
   ,[SConvenioAgua] = TRY_CAST(? AS money)
   ,[VencidoConvenio] = TRY_CAST(? AS money)
   ,[RecargosConvenio] = TRY_CAST(? AS money)
   ,[SConvenioObra] = TRY_CAST(? AS money)
   ,[VencidoContrato] =TRY_CAST(? AS money)
   ,[RecargosContrato] = TRY_CAST(? AS money)
   ,[GastosEj] = TRY_CAST(? AS money)
   ,[Multas] = TRY_CAST(? AS money)
   ,[MultasOtros] = TRY_CAST(? AS money)
   ,[Total] = TRY_CAST(? AS money)
   ,[Impuesto] = TRY_CAST(? AS money)
   ,[Fomento] = TRY_CAST(? AS money)
   ,[Actualizacion] = TRY_CAST(? AS money)
   ,[Recargos] = TRY_CAST(? AS money)
   ,[FechaUltimoPago] = ?
   ,[FechaActualizacion] = ?
WHERE Cuenta= ? and IdAdeudo= ?";

if ($SaldoCorriente == '.000') {
    echo $SaldoCorriente    = '0';
}
if ($SaldoAtraso == '.000') {
    echo $SaldoAtraso    = '0';
}
if ($SaldoRezago == '.000') {
    echo $SaldoRezago    = '0';
}
if ($RecargosAcum == '.000') {
    echo $RecargosAcum    = '0';
}
if ($SConvenioAgua == '.000') {
    echo $SConvenioAgua    = '0';
}
if ($VencidoConvenio == '.000') {
    echo $VencidoConvenio    = '0';
}
if ($RecargosConvenio == '.000') {
    echo $RecargosConvenio    = '0';
}
if ($SConvenioObra == '.000') {
    echo $SConvenioObra    = '0';
}
if ($VencidoContrato == '.000') {
    echo $VencidoContrato    = '0';
}
if ($RecargosContrato == '.000') {
    echo $RecargosContrato    = '0';
}
if ($GastoEj == '.000') {
    echo $GastoEj    = '0';
}
if ($Multas == '.000') {
    echo $Multas    = '0';
}
if ($MultasOTros == '.000') {
    echo $MultasOTros    = '0';
}
if ($Total == '.000') {
    echo $Total    = '0';
}
if ($Impuesto == '.000') {
    echo $Impuesto    = '0';
}
if ($Fomento == '.000') {
    echo $Fomento    = '0';
}
if ($Actualizacion == '.000') {
    echo $Actualizacion    = '0';
}
if ($Recargos == '.000') {
    echo $Recargos    = '0';
}
// $SaldoCorriente .= floatval($SaldoCorriente);
// $SaldoAtraso .= floatval($SaldoAtraso);
// $SaldoRezago .= floatval($SaldoRezago);
// $RecargosAcum .= floatval($RecargosAcum);
// $SConvenioAgua .= floatval($SConvenioAgua);
// $VencidoConvenio .= floatval($VencidoConvenio);
// $RecargosConvenio .= floatval($RecargosConvenio);
// $SConvenioObra .= floatval($SConvenioObra);
// $VencidoContrato .= floatval($VencidoContrato);
// $RecargosContrato .= floatval($RecargosContrato);
// $GastoEj .= floatval($GastoEj);
// $Multas .= floatval($Multas);
// $MultasOTros .= floatval($MultasOTros);
// $Total .= floatval($Total);
// $Impuesto .= floatval($Impuesto);
// $Fomento .= floatval($Fomento);
// $Actualizacion .= floatval($Actualizacion);
// $Recargos .= floatval($Recargos);
//    Paso de parametros 
$params = array(
    $Cuenta,
    $SaldoCorriente,
    $SaldoAtraso,
    $SaldoRezago,
    $RecargosAcum,
    $SConvenioAgua,
    $VencidoConvenio,
    $RecargosConvenio,
    $SConvenioObra,
    $VencidoContrato,
    $RecargosContrato,
    $GastoEj,
    $Multas,
    $MultasOTros,
    $Total,
    $Impuesto,
    $Fomento,
    $Actualizacion,
    $Recargos,
    $FechaUPago,
    $FechaAct,
    $Cuenta,
    $IdAdeudo
);

// Ejecucion del la conexion
$stmt = sqlsrv_query($cnx, $sql, $params);
// print($stmt);
// print_r($params);
// Verificar si la consulta se ejecutó correctamente
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
    echo json_encode(array('error' => 'Error al actualizar los datos'));
    exit;
}

// Comprobar si se actualizó al menos una fila
if (sqlsrv_rows_affected($stmt) > 0) {
    // Los datos se han actualizado correctamente
    echo "Los datos se han actualizado correctamente.";
    echo json_encode(array('success' => 'Los datos se han actualizado correctamente.'));
} else {
    // No se encontró el registro con la Cuenta proporcionado
    echo "No se encontró el registro con la Cuenta proporcionado.";
    echo json_encode(array('error' => 'Error al actualizar los datos'));
    exit;
}
