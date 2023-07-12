<?php
require "../cnx/conexion.php";
// Se reciben los parametros por el motodo post y se condiciona si no reciben nada obtendra un valor por defecto
$Cuenta = isset($_POST['Cuenta']) ? $_POST['Cuenta']:0;
$SupTerrenoH = isset($_POST['SupTerrenoH']) ? $_POST['SupTerrenoH']:0;
$ValTerrenoH = isset($_POST['ValTerrenoH']) ? $_POST['ValTerrenoH']:0;
$SupConstruccionH = isset($_POST['SupConstruccionH']) ? $_POST['SupConstruccionH']:0;
$ValConstruccionH = isset($_POST['ValConstruccionH']) ? $_POST['ValConstruccionH']:0;
$ValCatastralH = isset($_POST['ValCatastralH']) ? $_POST['ValCatastralH']:0;
$SupTerrenoV = isset($_POST['SupTerrenoV']) ? $_POST['SupTerrenoV']:0;
$SupTerrenoH = isset($_POST['SupTerrenoH']) ? $_POST['SupTerrenoH']:0;
$SupConstruccionV = isset($_POST['SupConstruccionV']) ? $_POST['SupConstruccionV']:0;
$ValTerrenoV = isset($_POST['ValTerrenoV']) ? $_POST['ValTerrenoV']:0;
$ValConstruccionV = isset($_POST['ValConstruccionV']) ? $_POST['ValConstruccionV']:0;
$ValCatastralV = isset($_POST['ValCatastralV']) ? $_POST['ValCatastralV']:0;
$BD = $_POST['bd'];
//Conexion a la BD 
$cnx = conexion($BD);
//Sentencia sql 
$sql = "UPDATE [dbo].[ValoresCatastrales]
SET [Cuenta] = ?
   ,[SupTerrenoH] = ?
   ,[SupConstruccionH] = ?
   ,[ValorTerrenoH] = ?
   ,[ValorConstruccionH] = ?
   ,[ValorCatastralH] = ?
   ,[SupTerrenoValuado] = ?
   ,[SupConstruccionValuado] = ?
   ,[ValorTerrenoValuado] = ?
   ,[ValorConstruccionValuado] = ?
   ,[ValorCatastralValuado] = ?
WHERE Cuenta= ?";
//    Paso de parametros 
$params = array(
    $Cuenta,
    $SupTerrenoH,
    $SupConstruccionH,
    $ValTerrenoH,
    $ValConstruccionH,
    $ValCatastralH,
    $SupTerrenoV,
    $SupConstruccionV,
    $ValTerrenoV,
    $ValConstruccionV,
    $ValCatastralV,
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
