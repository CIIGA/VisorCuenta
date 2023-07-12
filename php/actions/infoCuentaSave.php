<?php
require "../cnx/conexion.php";
// Se reciben los parametros por el motodo post y se condiciona si no reciben nada obtendra un valor por defecto
$Cuenta = isset($_POST['Cuenta']) ? $_POST['Cuenta']:0;
$Propietario = isset($_POST['Propietario']) ? $_POST['Propietario']:'';
$CuentaUni = isset($_POST['CuentaUni']) ? $_POST['CuentaUni']:'';
$NumExt = isset($_POST['NumExt']) ? $_POST['NumExt']:0;
$Colonia = isset($_POST['Colonia']) ? $_POST['Colonia']:'';
$Cp = isset($_POST['Cp']) ? $_POST['Cp']:0;
$Giro = isset($_POST['Giro']) ? $_POST['Giro']:'';
$Manzana = isset($_POST['Manzana']) ? $_POST['Manzana']:0;
$DeudaTotal = isset($_POST['DeudaTotal']) ? $_POST['DeudaTotal']:0;
$Rango = isset($_POST['Rango']) ? $_POST['Rango'] : '';
$FechaActualizacion = isset($_POST['FechaActualizacion']) ? $_POST['FechaActualizacion']:'';
$Longitud = isset($_POST['Longitud']) ? $_POST['Longitud']:0;
$Clave = isset($_POST['Clave']) ? $_POST['Clave']:0;
$Expediente = isset($_POST['Expediente']) ? $_POST['Expediente']:0;
$Calle = isset($_POST['Calle']) ? $_POST['Calle']:'';
$NumInt = isset($_POST['NumInt']) ? $_POST['NumInt']:0;
$Poblacion = isset($_POST['Poblacion']) ? $_POST['Poblacion']:'';
$TipoServicio = isset($_POST['TipoServicio']) ? $_POST['TipoServicio']:'';
$SerieMedidor = isset($_POST['SerieMedidor']) ? $_POST['SerieMedidor']:0;
$Lote = isset($_POST['Lote']) ? $_POST['Lote']:0;
$TotalPagado = isset($_POST['TotalPagado']) ? $_POST['TotalPagado']:0;
$FechaUPago = isset($_POST['FechaUPago']) ? $_POST['FechaUPago']:'';
$Latitud = isset($_POST['Latitud']) ? $_POST['Latitud']:0;
$EntreCalle1 = isset($_POST['EntreCalle1']) ? $_POST['EntreCalle1']:'';
$EntreCalle2 = isset($_POST['EntreCalle2']) ? $_POST['EntreCalle2']:'';
$BD = $_POST['bd'];
//Conexion a la BD 
$cnx = conexion($BD);
//Sentencia sql 
$sql = "update [dbo].[implementta]
   set Cuenta = ?
   ,CuentaUnificada = ?
   ,[Clave] = ?
   ,[Expediente] = ?
   ,[Propietario] = ?
   ,[Calle] = ?
   ,[NumExt] = ?
   ,[NumInt] = ?
   ,[Colonia] = ?
   ,[Poblacion] = ?
   ,[CP] = ?
   ,[TipoServicio] = ?
   ,[Giro] = ?
   ,[SerieMedidor] = ?
   ,[DeudaTotal] = ?
   ,[Rango] = ?
   ,[FechaUltimoPago] = ?
   ,[FechaActualizacion] = ?
   ,[Latitud] = ?
   ,[Longitud] = ?
   ,[TotalPagado] = ?
   ,[Manzana] = ?
   ,[Lote] = ?
   ,[EntreCalle1] = ?
   ,[EntreCalle2] = ?
   where Cuenta= ?";
//    Paso de parametros 
$params = array(
    $Cuenta,
    $CuentaUni,
    $Clave,
    $Expediente,
    $Propietario,
    $Calle,
    $NumExt,
    $NumInt,
    $Colonia,
    $Poblacion,
    $Cp,
    $TipoServicio,
    $Giro,
    $SerieMedidor,
    $DeudaTotal,
    $Rango,
    $FechaUPago,
    $FechaActualizacion,
    $Latitud,
    $Longitud,
    $TotalPagado,
    $Manzana,
    $Lote,
    $EntreCalle1,
    $EntreCalle2,
    $Cuenta
);
// Ejecucion del la conexion
$stmt = sqlsrv_query($cnx, $sql, $params);
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
