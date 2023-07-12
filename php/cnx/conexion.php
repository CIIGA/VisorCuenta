<?php 
function plaza($id_plaza)
{
    // $serverName = "51.222.44.135";
    // $connectionInfo = array('Database' => 'kpis', 'UID' => 'sa', 'PWD' => 'vrSxHH3TdC');
    $serverName = "DESKTOP-79KR1H4";
    $connectionInfo = array('Database' => 'kpis', 'UID' => 'brayan', 'PWD' => '12345');
    $cnx = sqlsrv_connect($serverName, $connectionInfo);
    // date_default_timezone_set('America/Mexico_City');
    $pl = "SELECT p.data as base, pl.nombreplaza as plaza FROM plaza as pl INNER JOIN proveniente as p ON pl.id_proveniente=p.id_proveniente where pl.id_plaza='$id_plaza'";
    $plz = sqlsrv_query($cnx, $pl);
    $result = sqlsrv_fetch_array($plz);
    return $result;
}
//Funcion para generar conexiones dinamicas
function conexion($BD)
{
    // $serverName = "51.222.44.135";
    // $connectionInfo = array('Database' => $BD, 'UID' => 'sa', 'PWD' => 'vrSxHH3TdC');
    $serverName = "DESKTOP-79KR1H4";
    $connectionInfo = array('Database' => $BD, 'UID' => 'brayan', 'PWD' => '12345');
    $cnx = sqlsrv_connect($serverName, $connectionInfo);
    // date_default_timezone_set('America/Mexico_City');
    if ($cnx) {
        return $cnx;
    } else {
        echo "error de conexion";
        die(print_r(sqlsrv_errors(), true));
    }
}
