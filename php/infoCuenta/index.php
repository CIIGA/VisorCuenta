<div class="container-fluid">
    <!-- Listas -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">
            <i class="fa-solid fa-circle-info"></i>
                Información de la cuenta
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="domicilio-tab" data-bs-toggle="tab" data-bs-target="#domicilio" type="button" role="tab" aria-controls="domicilio" aria-selected="false">
            <i class="fa-solid fa-house"></i>
                Domicilio de notificación
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contacto-tab" data-bs-toggle="tab" data-bs-target="#contacto" type="button" role="tab" aria-controls="contacto" aria-selected="false">
            <i class="fa-solid fa-address-book"></i>
                Contacto
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="valoresC-tab" data-bs-toggle="tab" data-bs-target="#valoresC" type="button" role="tab" aria-controls="valoresC" aria-selected="false">
            <i class="fa-solid fa-sack-dollar"></i>
                Valores Catastrales
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="adeduos-tab" data-bs-toggle="tab" data-bs-target="#adeduos" type="button" role="tab" aria-controls="adeduos" aria-selected="false">
            <i class="fa-solid fa-hand-holding-dollar"></i>
                Adeudos
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pagos-tab" data-bs-toggle="tab" data-bs-target="#pagos" type="button" role="tab" aria-controls="pagos" aria-selected="false">
            <i class="fa-solid fa-dollar-sign"></i>
                Pagos
            </button>
        </li>
    </ul>
    <!--  Contenidos -->
    <div class="tab-content">
        <div class="tab-pane active" id="info" role="tabpanel" aria-labelledby="info-tab">
            <!-- Informacion de la cuenta -->
            <?php include 'infoCuenta.php' ?>
        </div>
        <div class="tab-pane" id="domicilio" role="tabpanel" aria-labelledby="domicilio-tab">
            <?php include 'domicilioCuenta.php' ?>
        </div>
        <div class="tab-pane" id="contacto" role="tabpanel" aria-labelledby="contacto-tab">
            <?php include 'contactoCuenta.php' ?>
        </div>
        <div class="tab-pane" id="valoresC" role="tabpanel" aria-labelledby="valoresC-tab">
            <?php include 'valoresCuenta.php' ?>
        </div>
        <div class="tab-pane" id="adeduos" role="tabpanel" aria-labelledby="adeduos-tab">
            <?php include 'adedudoCuenta.php' ?>
        </div>
        <div class="tab-pane" id="pagos" role="tabpanel" aria-labelledby="pagos-tab">
            <?php include 'pagosCuenta.php' ?>

        </div>
    </div>
</div>