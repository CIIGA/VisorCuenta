<?php
require "../include/awsv2/vendor/autoload.php";
require "funcionesS3.php";
require "../include/cnx.php";

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

if (isset($_POST['idDelete']) and isset($_POST['bd']) and isset($_POST['rol']) and isset($_POST['registro']) and isset($_POST['cuenta']) and isset($_POST['nombre'])) {
   
    $bd = $_POST['bd'];
    $rol = $_POST['rol'];
    $registro = $_POST['registro'];
    $cuenta = $_POST['cuenta'];
    $idRegistroFoto = $_POST['idDelete'];
    $nombre = $_POST['nombre'];

    $cnx = conexion($bd);

  

 
     
            
            $delete_sql_foto = "DELETE FROM RegistroFotomovilprueba WHERE idRegistroFoto='$idRegistroFoto'";
            if ($delete_foto = sqlsrv_query($cnx, $delete_sql_foto)) {
                header("location:../?bd=$bd&rol=$rol&registro=$registro&cuenta=$cuenta&DeleteFoto");
            } else {
                header("location:../?bd=$bd&rol=$rol&registro=$registro&cuenta=$cuenta&ErrorDeleteFoto");
            }
       
    

} else {
    echo '<meta http-equiv="refresh" content="0,url=https://gallant-driscoll.198-71-62-113.plesk.page/">';
}

// echo $update_sql_foto;
//si se actualiza mandar mensaje
