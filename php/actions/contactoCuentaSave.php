<?php
require "../cnx/conexion.php";
// Se reciben los parametros por el motodo post y se condiciona si no reciben nada obtendra un valor por defecto
$Cuenta = isset($_POST['Cuenta']) ? $_POST['Cuenta']:0;
$TelefonoLocal = isset($_POST['TelefonoLocal']) ? $_POST['TelefonoLocal']:0;
$TelefonoCelular = isset($_POST['TelefonoCelular']) ? $_POST['TelefonoCelular']:0;
$TelefonoRadio = isset($_POST['TelefonoRadio']) ? $_POST['TelefonoRadio']:0;
$CorreoElectronico = isset($_POST['CorreoElectronico']) ? $_POST['CorreoElectronico']:0;
$TelefonoLocalUsuario = isset($_POST['TelefonoLocalUsuario']) ? $_POST['TelefonoLocalUsuario']:0;
$TelefonoCelularUsuario = isset($_POST['TelefonoCelularUsuario']) ? $_POST['TelefonoCelularUsuario']:0;
$TelefonoRadioUsuario = isset($_POST['TelefonoRadioUsuario']) ? $_POST['TelefonoRadioUsuario']:0;
$CorreoElectronicoUsuario = isset($_POST['CorreoElectronicoUsuario']) ? $_POST['CorreoElectronicoUsuario']:'';
$ObsTelefonoLocal = isset($_POST['ObsTelefonoLocal']) ? $_POST['ObsTelefonoLocal']:'';
$ObsTelefonoCelular = isset($_POST['ObsTelefonoCelular']) ? $_POST['ObsTelefonoCelular']:'';
$ObsTelefonoRadio = isset($_POST['ObsTelefonoRadio']) ? $_POST['ObsTelefonoRadio']:'';
$ObsCorreoElectronico = isset($_POST['ObsCorreoElectronico']) ? $_POST['ObsCorreoElectronico']:'';
$BD = $_POST['bd'];
//Conexion a la BD 
$cnx = conexion($BD);
//Sentencia sql 
$sql = "UPDATE [dbo].[ContactosCuenta]
SET [Cuenta] = ?
   ,[TelefonoLocal] = ?
   ,[TelefonoCelular] = ?
   ,[TelefonoRadio] = ?
   ,[CorreoElectronico] = ?
   ,[ObservacionesTelefonoLocal] = ?
   ,[ObservacionesTelefonoCelular] = ?
   ,[ObservacionesTelefonoRadio] = ?
   ,[ObservacionesCorreoElectronico] = ?
   ,[TelefonoLocalUsuario] = ?
   ,[TelefonoCelularUsuario] = ?
   ,[TelefonoRadioUsuario] = ?
   ,[CorreoElectronicoUsuario] = ?
WHERE Cuenta = ?";
//    Paso de parametros 
$params = array(
    $Cuenta,
    $TelefonoLocal,
    $TelefonoCelular,
    $TelefonoRadio,
    $CorreoElectronico,
    $ObsTelefonoLocal,
    $ObsTelefonoCelular,
    $ObsTelefonoRadio,
    $ObsCorreoElectronico,
    $TelefonoLocalUsuario,
    $TelefonoCelularUsuario,
    $TelefonoRadioUsuario,
    $CorreoElectronicoUsuario,
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
