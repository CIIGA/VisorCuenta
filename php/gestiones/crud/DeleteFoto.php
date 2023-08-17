<?php
require "../include/awsv2/vendor/autoload.php";
require "funcionesS3.php";
require "../include/cnx.php";

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

if (isset($_POST['iddelete']) and isset($_POST['idaspuser']) and isset($_POST['idTarea']) and isset($_POST['fechaCaptura_old']) and isset($_POST['tipo']) 
and isset($_POST['urlImagen_old'])
and isset($_POST['Activo_old']) and isset($_POST['fechaSincronizacion_old'])
and isset($_POST['bd']) and isset($_POST['rol']) and isset($_POST['registro']) and isset($_POST['cuenta']) and isset($_POST['nombre']) and isset($_POST['plz'])) {
    $plz = $_POST['plz'];
    $bd = $_POST['bd'];
    $rol = $_POST['rol'];
    $registro = $_POST['registro'];
    $cuenta = $_POST['cuenta'];
    $idRegistroFoto = $_POST['iddelete'];
    $nombre = $_POST['nombre'];
    $idaspuser = $_POST['idaspuser'];
    $idTarea = $_POST['idTarea'];
    $fechaCaptura_old = $_POST['fechaCaptura_old'];
    $tipo = $_POST['tipo'];
    $urlImagen_old = $_POST['urlImagen_old'];
    $Activo_old = $_POST['Activo_old'];
    $fechaSincronizacion_old = $_POST['fechaSincronizacion_old'];
    $id_usuario = $_POST['id_usuario'];

    $cnx = conexion($bd);
    $cnx_administrador = conexion('implementtaAdministrator');

    //insertar al historico
    $sql_insert_historico = "insert into HistoricoDeleteRegistrofotomovil_12072023 
                    (plaza,id_plaza,idRegistroFoto,cuenta,idAspUser,nombreFoto,idTarea,fechaCaptura,tipo,urlImagen,Activo,fechaSincronizacion,idUser) values
                    ('$bd','$plz','$idRegistroFoto','$cuenta','$idaspuser','$nombre','$idTarea','$fechaCaptura_old','$tipo','$urlImagen_old','1','$fechaSincronizacion_old','$id_usuario')";

    $delete_sql_foto = "DELETE FROM RegistroFotomovil WHERE idRegistroFoto='$idRegistroFoto'";
    // echo $sql_insert_historico;
    if (sqlsrv_query($cnx, $delete_sql_foto) and sqlsrv_query($cnx_administrador, $sql_insert_historico)) {
        header("location:../?bd=$bd&rol=$rol&registro=$registro&cuenta=$cuenta&plz=$plz&id_usuario=$id_usuario&DeleteFoto");
    } else {
        header("location:../?bd=$bd&rol=$rol&registro=$registro&cuenta=$cuenta&plz=$plz&id_usuario=$id_usuario&ErrorDeleteFoto");
    }
} else {
    echo '<meta http-equiv="refresh" content="0,url=https://gallant-driscoll.198-71-62-113.plesk.page/">';
}

// echo $update_sql_foto;
//si se actualiza mandar mensaje
