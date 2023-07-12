<?php
require "../cnx/conexion.php";
// Se reciben los parametros por el motodo post y se condiciona si no reciben nada obtendra un valor por defecto
$Cuenta = isset($_POST['Cuenta']) ? $_POST['Cuenta']:0;
$CalleNotificacion = isset($_POST['CalleNotificacion']) ? $_POST['CalleNotificacion']:'';
$NumExtNotificacion = isset($_POST['NumExtNotificacion']) ? $_POST['NumExtNotificacion']:'';
$NumIntNotificacion = isset($_POST['NumIntNotificacion']) ? $_POST['NumIntNotificacion']:'';
$ColoniaNotificacion = isset($_POST['ColoniaNotificacion']) ? $_POST['ColoniaNotificacion']:'';
$PoblacionNotificacion = isset($_POST['PoblacionNotificacion']) ? $_POST['PoblacionNotificacion']:'';
$CPNotificacion = isset($_POST['CPNotificacion']) ? $_POST['CPNotificacion']:'';
$EntreCalleUno = isset($_POST['EntreCalleUno']) ? $_POST['EntreCalleUno']:'';
$EntreCalleDos = isset($_POST['EntreCalleDos']) ? $_POST['EntreCalleDos']:'';
$ManzanaNotificacion = isset($_POST['ManzanaNotificacion']) ? $_POST['ManzanaNotificacion']:'';
$LoteNotificacion = isset($_POST['LoteNotificacion']) ? $_POST['LoteNotificacion']:'';
$ReferenciaNotificacion = isset($_POST['ReferenciaNotificacion']) ? $_POST['ReferenciaNotificacion']:'';
$BD = $_POST['bd'];
//Conexion a la BD 
$cnx = conexion($BD);
//Sentencia sql 
$sql = "UPDATE [dbo].[DomiciliosNotificacion]
SET [Cuenta] = ?
   ,[CalleNotificacion] = ?
   ,[NumExtNotificacion] = ?
   ,[NumIntNotificacion] = ?
   ,[ColoniaNotificacion] = ?
   ,[PoblacionNotificacion] = ?
   ,[CPNotificacion] = ?
   ,[EntreCalle1] = ?
   ,[EntreCalle2] = ?
   ,[Referencia] = ?
   ,[ManzanaNotificacion] = ?
   ,[LoteNotificacion] = ?
WHERE Cuenta = ?";
//    Paso de parametros 
$params = array(
    $Cuenta,
    $CalleNotificacion,
    $NumExtNotificacion,
    $NumIntNotificacion,
    $ColoniaNotificacion,
    $PoblacionNotificacion,
    $CPNotificacion,
    $EntreCalleUno,
    $EntreCalleDos,
    $ReferenciaNotificacion,
    $ManzanaNotificacion,
    $LoteNotificacion,
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
