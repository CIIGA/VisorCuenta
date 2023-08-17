<?php
require "../include/cnx.php";
require "../include/awsv2/vendor/autoload.php";
require "funcionesS3.php";

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


if (
    isset($_POST['id']) and isset($_POST['tipo']) and isset($_FILES["foto"]["name"]) and isset($_POST['fecha']) and isset($_POST['nombre_old'])
    and isset($_POST['tipo_old']) and isset($_POST['url_old'])
    and isset($_POST['bd']) and isset($_POST['rol']) and isset($_POST['registro']) and isset($_POST['cuenta']) and isset($_POST['plz'])
) {
    $plz = $_POST['plz'];
    $bd = $_POST['bd'];
    $rol = $_POST['rol'];
    $registro = $_POST['registro'];
    $cuenta = $_POST['cuenta'];

    $id = $_POST['id'];
    $tipo = utf8_encode($_POST['tipo']);
    $tipo_old = utf8_encode($_POST['tipo_old']);
    $url_old = utf8_encode($_POST['url_old']);
    $file = $_FILES["foto"];
    $fecha = $_POST['fecha'];
    $nombre_old = $_POST['nombre_old'];
    $id_usuario = $_POST['id_usuario'];



    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fechaHoraActual = date('Y-m-d H:i:s');
    $key = $cuenta . $fechaHoraActual . '.' . $extension;
    $file_path = $file['tmp_name'];

    $bucket = 'fotos-implementta-movil';

    // $file_path="C:\Users\diego\Documents\universidad\\trabajo\gestiiones\\".$file_name;

    $s3 = S3Client::factory([
        'version' => '2006-03-01',
        'region' => 'us-east-1',
        'credentials' => [
            'key' => 'AKIAQAVQA6VN3G4QA5GC',
            'secret' => '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',
        ]
    ]);



    //insertamos el archivo a amazon
    $insert = insert($file_path, $s3, $bucket, $key);
    // validamos si si inserto
    if ($insert == 1) {
        // obtenemos la url
        $signedUrl = url($s3, $key);
        // validamos si nos mando la url
        // echo $signedUrl;
        if ($signedUrl != '') {
            $cnx = conexion($bd);
            $cnx_administrador = conexion('implementtaAdministrator');
            // actualizar registro
            $sql_actualizar = "update registrofotomovil set urlImagen='$signedUrl',tipo='$tipo',nombreFoto='$key' 
                where idRegistroFoto='$id'";
            //insertar al historico
            $sql_insert_historico = "insert into HistoricoUpdateRegistrofotomovil_12072023 
                    (plaza,id_plaza,idRegistroFoto,urlImagen,tipo,nombreFoto,idUser) values
                    ('$bd','$plz','$id','$url_old','$tipo_old','$nombre_old','$id_usuario')";


            // echo $sql_actualizar;
            if (sqlsrv_query($cnx_administrador, $sql_insert_historico) and sqlsrv_query($cnx, $sql_actualizar)) {
                header("location:../?bd=$bd&rol=$rol&registro=$registro&cuenta=$cuenta&plz=$plz&id_usuario=$id_usuario&UpdateFoto");
            } else {
                header("location:../?bd=$bd&rol=$rol&registro=$registro&cuenta=$cuenta&plz=$plz&id_usuario=$id_usuario&ErrorUpdateFoto");
                // echo 'error sql';
            }
        } else {
            header("location:../?bd=$bd&rol=$rol&registro=$registro&cuenta=$cuenta&plz=$plz&id_usuario=$id_usuario&ErrorS3");
            // echo 'error url';
        }
    } else {
        header("location:../?bd=$bd&rol=$rol&registro=$registro&cuenta=$cuenta&plz=$plz&id_usuario=$id_usuario&ErrorS3");
        // echo 'error insert';
    }
} else {
    echo '<meta http-equiv="refresh" content="0,url=https://gallant-driscoll.198-71-62-113.plesk.page/">';
}
