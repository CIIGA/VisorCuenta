<?php
require "../cnx/conexion.php";
header('Content-Type: application/json; charset=utf-8'); // Establece la cabecera para indicar que se trata de una respuesta JSON
// Se reciben los parametros por el motodo post y se condiciona si no reciben nada obtendra un valor por defecto
$Cuenta = isset($_GET['searchInput']) ? $_GET['searchInput']:0;

$BD = $_GET['bd'];
//Conexion a la BD 
$cnx = conexion($BD);
//Sentencia sql 
$sql = "select
CONVERT(varchar, f.fechaCaptura, 23) as fechaCaptura
,f.tipo as tipo
,f.urlImagen as urlImagen
,a.Nombre as Nombre
FROM registrofotomovil as f, AspNetUsers as a where f.cuenta='$Cuenta' and  f.idAspUser=a.Id  order by f.fechaCaptura desc";
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