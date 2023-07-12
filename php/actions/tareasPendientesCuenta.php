<?php
require "../cnx/conexion.php";
header('Content-Type: application/json; charset=utf-8'); // Establece la cabecera para indicar que se trata de una respuesta JSON
// Se reciben los parametros por el motodo post y se condiciona si no reciben nada obtendra un valor por defecto
$Cuenta = isset($_GET['searchInput']) ? $_GET['searchInput'] : 0;

$BD = $_GET['bd'];
//Conexion a la BD 
$cnx = conexion($BD);
//Sentencia sql 
$sql = "SELECT  CONVERT(varchar, A.FechaVencimiento, 23) as FechaVencimiento , U.Nombre AS Asignado, T.DescripcionTarea FROM [dbo].[AsignacionAbogado] A
INNER JOIN [dbo].[AspNetUsers] U ON A.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON A.IdTarea = T.IdTarea
WHERE A.Cuenta = '$Cuenta'

UNION
SELECT CONVERT(varchar, G.FechaVencimiento, 23) as FechaVencimiento, U.Nombre AS Asignado, T.DescripcionTarea FROM [dbo].[AsignacionGestor] G
INNER JOIN [dbo].[AspNetUsers] U ON G.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON G.IdTarea = T.IdTarea
WHERE G.Cuenta = '$Cuenta'
UNION

SELECT CONVERT(varchar, C.FechaVencimiento, 23) as FechaVencimiento, U.Nombre AS Asignado, T.DescripcionTarea FROM [dbo].[AsignacionCallCenter] C
INNER JOIN [dbo].[AspNetUsers] U ON C.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON C.IdTarea = T.IdTarea
WHERE C.Cuenta = '$Cuenta'
UNION

SELECT CONVERT(varchar, AC.FechaVencimiento, 23) as FechaVencimiento, U.Nombre AS Asignado, T.DescripcionTarea FROM [dbo].[AsignacionConvenio] AC
INNER JOIN [dbo].[AspNetUsers] U ON AC.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON AC.IdTarea = T.IdTarea
WHERE AC.Cuenta = '$Cuenta'

UNION

SELECT CONVERT(varchar, R.FechaVencimiento, 23) as FechaVencimiento, U.Nombre AS Asignado, T.DescripcionTarea FROM [dbo].[AsignacionReductores] R
INNER JOIN [dbo].[AspNetUsers] U ON R.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON R.IdTarea = T.IdTarea
WHERE R.Cuenta = '$Cuenta' order by FechaVencimiento asc";
$exec = sqlsrv_query($cnx, $sql);
$rows = array();
while ($row = sqlsrv_fetch_array($exec, SQLSRV_FETCH_ASSOC)) {
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
