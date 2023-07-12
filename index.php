<?php if ((isset($_GET['plz']))) {
  require 'php/cnx/conexion.php';
  $id_plaza = $_GET['plz'];
  $plaza = plaza($id_plaza);
} ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Estilos de letra -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Belanosima&display=swap" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link href="css/index.css" rel="stylesheet" />
  <title>Index</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img class="logo" src="img/logoImplementtaHorizontal.png" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo02">
      <ul class="navbar-nav mb-2 mb-lg-0 gap-3">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#" class="gap-2" id="informacionCuenta">
            <img width="30" height="30" src="https://img.icons8.com/color/30/info--v1.png" alt="info--v1" />
            Información
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" class="gap-2" id="UbicacionCuenta">
            <img width="30" height="30" src="https://img.icons8.com/color/30/marker--v1.png" alt="marker--v1" />
            Ubicación
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="FotosCuenta">
            <img width="30" height="30" src="https://img.icons8.com/external-others-inmotus-design/30/external-Photo-Gallery-vkontakte-others-inmotus-design.png" alt="external-Photo-Gallery-vkontakte-others-inmotus-design" />
            Fotos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="TasksCuenta">
            <img width="30" height="30" src="https://img.icons8.com/cute-clipart/30/task.png" alt="task" />
            Tareas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <img width="30" height="30" src="https://img.icons8.com/cute-clipart/30/comments.png" alt="comments" />
            Comentarios
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <img width="30" height="30" src="https://img.icons8.com/external-soft-fill-juicy-fish/30/external-judge-legal-soft-fill-soft-fill-juicy-fish-2.png" alt="external-judge-legal-soft-fill-soft-fill-juicy-fish-2" />
            RPPYP
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <img width="30" height="30" src="https://img.icons8.com/ultraviolet/30/archive-folder.png" alt="archive-folder" />
            Expediente
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>
  <!-- Search -->
  <div class="container d-flex">
    <div class="search">
      <div class="mb-2">
        <h4>Buscar cuenta:</h4>
      </div>
      <div class="input-group">
        <div class="form-outline">
          <input type="search" id="searchInput" class="form-control form-control-lg" />
        </div>
        <button type="button" class="btn btn-dark btn-search" id="searchButton">
          <img src="img/search-white.svg" class="fa-icon" />
        </button>
      </div>
      <input type="text" class="form-control"  id="plz" value="<?php echo  $id_plaza ?>" name="plz"  hidden>
      <input type="text" class="form-control"  id="base" value="<?php echo  $plaza['base']; ?>" name="base" hidden>
    </div>
  </div>
  <!-- Informacion Cuenta -->
  <div id="contenidoContainer"></div>
  <footer>
    <nav class="navbar sticky-bottom navbar-expand-lg mx-5 gap-5">
      <span class="navbar-text">
        Implementta ©<br />
        Estrategas de México <i class="far fa-registered"></i><br />
        Centro de Inteligencia Informática y Geografía Aplicada CIIGA
        <hr />
        Created and designed by ©
        <?php echo date('Y') ?>
        Estrategas de México<br />
      </span>
      <span class="navbar-text">
        Contacto:<br />
        <i class="fas fa-phone-alt"></i> Red: 187<br />
        <i class="fas fa-phone-alt"></i> 66 4120 1451<br />
        <i class="fas fa-envelope"></i> sistemas@estrategas.mx<br />
      </span>
      <form class="form-inline my-2">
        <a href=""><img src="img/logoImplementta.png" width="155" height="150" alt="" /></a>
        <a href="http://estrategas.mx/" target="_blank"><img src="img/logoBottom.png" width="200" height="85" alt="" /></a>
      </form>
    </nav>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="js/navTab.js"></script>
  <script src="js/nav.js"></script>
  <script src="js/searchData.js"></script>
</body>

</html>