<?php
require "../cnx/conexion.php";
header('Content-Type: application/json; charset=utf-8'); // Establece la cabecera para indicar que se trata de una respuesta JSON
// Se reciben los parametros por el motodo post y se condiciona si no reciben nada obtendra un valor por defecto
$Cuenta = isset($_GET['searchInput']) ? $_GET['searchInput'] : 0;

$BD = $_GET['bd'];
//Conexion a la BD 
$cnx = conexion($BD);
//Sentencia sql 
$sql = " SELECT CONVERT(varchar, RA.FechaCaptura, 23) as FechaCaptura, U.Nombre + ' / '  + ra.cuenta as nombre, T.DescripcionTarea, CONVERT(NVARCHAR(128), RA.IdRegistroAbogado) AS IdRegistro, 'Abogado' as Rol FROM [dbo].[RegistroAbogado] RA
INNER JOIN [dbo].[AspNetUsers] U ON RA.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON RA.IdTarea = T.IdTarea 
WHERE RA.Cuenta = '$Cuenta'

UNION ALL
              
SELECT CONVERT(varchar, RG.FechaCaptura, 23) as FechaCaptura, U.Nombre + ' / '  + rg.cuenta as nombre, T.DescripcionTarea, CONVERT(NVARCHAR(128), RG.IdRegistroGestor) AS IdRegistro, 'Gestor' as Rol FROM (
   select idRegistroGestor, cuenta, fechaCaptura, idTarea, idAspUser, 'g' as tipo from [dbo].[RegistroGestor]
   union
   select idRegistroGestorVisita,cuenta, fechaCaptura, idTarea, idAspUser, 'v' as tipo from [dbo].[RegistroGestorVisita] where convert(date, fechaCaptura) <= '2019-07-22'
) RG
INNER JOIN [dbo].[AspNetUsers] U ON RG.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON RG.IdTarea = T.IdTarea 
WHERE RG.Cuenta = '$Cuenta'

UNION ALL

SELECT CONVERT(varchar, RCC.FechaCaptura, 23) as FechaCaptura, U.Nombre + ' / '  + rcc.cuenta as nombre, T.DescripcionTarea, CONVERT(NVARCHAR(128), RCC.IdRegistroCallCenter) AS IdRegistro,'Callcenter' as Rol 
FROM [dbo].[RegistroCallCenter] RCC
INNER JOIN [dbo].[AspNetUsers] U ON RCC.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON RCC.IdTarea = T.IdTarea 
WHERE RCC.Cuenta = '$Cuenta'

UNION ALL

SELECT CONVERT(varchar, RC.FechaCaptura, 23) as FechaCaptura, U.Nombre + ' / '  + rc.cuenta as nombre, T.DescripcionTarea, CONVERT(NVARCHAR(128), RC.IdRegistroConvenio) AS IdRegistro, 'Convenio' as Rol
FROM [dbo].[RegistroConvenio] RC
INNER JOIN [dbo].[AspNetUsers] U ON RC.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON RC.IdTarea = T.IdTarea 
WHERE RC.Cuenta = '$Cuenta'             

UNION ALL

SELECT  CONVERT(varchar, C.FechaCaptura, 23) as FechaCaptura, U.Nombre + ' / '  + c.cuenta as nombre, C.Comentario, CONVERT(NVARCHAR(128), C.IdComentario) AS IdRegistro, 'Comentarios' as Rol
FROM [dbo].[Comentarios] C
INNER JOIN [dbo].[AspNetUsers] U ON C.IdAspUser = U.Id
WHERE C.Cuenta = '$Cuenta'

UNION ALL

SELECT CONVERT(varchar, RR.FechaCaptura, 23) as FechaCaptura, U.Nombre + ' / '  + rr.cuenta as nombre, T.DescripcionTarea, CONVERT(NVARCHAR(128), RR.IdRegistroReductores) AS IdRegistro, 'Cortes' as Rol
FROM [dbo].[RegistroReductores] RR
INNER JOIN [dbo].[AspNetUsers] U ON RR.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON RR.IdTarea = T.IdTarea 
WHERE RR.Cuenta = '$Cuenta'  			

UNION ALL

SELECT CONVERT(varchar, RR.FechaCaptura, 23) as FechaCaptura, U.Nombre + ' / '  + rr.cuenta as nombre, T.DescripcionTarea, CONVERT(NVARCHAR(128), RR.IdRegistroCallCenter) AS IdRegistro, 'Pregrabadas' as Rol
FROM [dbo].[RegistroPregrabadas] RR
INNER JOIN [dbo].[AspNetUsers] U ON RR.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON RR.IdTarea = T.IdTarea 
WHERE RR.Cuenta = '$Cuenta'

UNION ALL

SELECT CONVERT(varchar, RR.FechaCaptura, 23) as FechaCaptura, U.Nombre + ' / '  + rr.cuenta as nombre, T.DescripcionTarea, CONVERT(NVARCHAR(128), RR.IdRegistroSepomex) AS IdRegistro, 'Sepomex' as Rol
FROM [dbo].[RegistroSepomex] RR
INNER JOIN [dbo].[AspNetUsers] U ON RR.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON RR.IdTarea = T.IdTarea 
WHERE RR.Cuenta = '$Cuenta'  

UNION ALL

 SELECT CONVERT(varchar, RR.FechaCaptura, 23) as FechaCaptura, U.Nombre + ' / '  + rr.cuenta as nombre, 'BUSQUEDA EN RPPC',  CONVERT(NVARCHAR(128), RR.IdRegistroRPPC) AS IdRegistro, 'AspNetUsers' as Rol
 FROM [dbo].[RegistroRPPC] RR
INNER JOIN [dbo].[AspNetUsers] U ON RR.IdAspUser = U.Id
WHERE RR.Cuenta = '$Cuenta' 		 

UNION ALL

 SELECT  CONVERT(varchar, RA.FechaCaptura, 23) as FechaCaptura, U.Nombre + ' / '  + ra.cuenta as nombre, T.DescripcionTarea, CONVERT(NVARCHAR(128), RA.IdRegistroCartaInvitacion) AS IdRegistro, 'CatalogoTareas' as Rol
 FROM [dbo].[RegistroCartaInvitacion] RA
INNER JOIN [dbo].[AspNetUsers] U ON RA.IdAspUser = U.Id
INNER JOIN [dbo].[CatalogoTareas] T ON RA.IdTarea = T.IdTarea 
WHERE RA.Cuenta = '$Cuenta'	 

ORDER BY Fechacaptura desc
";
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
