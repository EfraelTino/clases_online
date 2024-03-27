<?php
session_start();
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    header("Location: ../login");
    exit;
} else {
    $id_user = $_SESSION['idusuario'];
}
$title = "Setting - NICOLAS ";

include ('./page-master/head.php');
include ("./conexion/Nicolas.php");
$operations = new Nicolas();
$item1 = "";
$item2 = "";
$item3 = "";
$item4 = "active";
$get_user = $operations->getCamposConCondicion("usuarios", "id", $id_user);
var_dump($get_user);
?>

<body class="bg-principal" cz-shortcut-listen="true">
    <main>
        <div class="row m-0 p-0 sticky-top">
            <!-- MENU -->
            <?php
            include ('./components/menu.php');

            ?>
            <!-- END MENU -->
        </div>
    </main>
    <section class="container">
        <div class="row container p-3">
            <div class="col-12">
                <div class="row">
                    <div class="row m-0 p-0 mt-5 mb-2">
                        <h2 class="fw-semibold fs-2 m-0 p-0 py-3">
                            Cuenta
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <!-- PHOTO PROFILE -->
                    <div class="col-12">
                        <div class="row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                    <div class="col-4 rounded-circle">
                                    <img src="./assets/img/carpintero.webp" alt="Foto de perfil"
                                        class="rounded-circle bg-dark object-fit-cover foto-profile p-2">
                                </div>

                                <div class="col-4  align-items-center" id="choose-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3>Nombre del usuario</h3>
                                            <p><strong class="text-primarys">Tipo de suscripción: </strong>Free</p>
                                        </div>
                                        <div class="col-12">
                                            <p><strong class="text-primarys">Email: </strong>Free</p>
                                        </div>
                                        <div class="col-12">
                                            <p><strong class="text-primarys">Telf: </strong>Teléfono</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-warning fw-semibold" onclick="chooseProfile()">
                                            Cambiar foto de perfil<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="black" class="bi bi-arrow-counterclockwise"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z">
                                                </path>
                                                <path
                                                    d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-8" id="save_options">
                                    <div class="row d-flex align-items-center h-100">
                                        <div class="col-auto">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Carga tu foto de perfil</label>
                                                <input class="form-control" type="file" id="formFile">
                                            </div>
                                            <button class="btn btn-primary fw-semibold">
                                                Guardar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
                <!-- END PHOTO PROFILE -->
            </div>
        </div>
        </div>
    </section>
    <?php
    include ('./components/profile.php');
    include_once ('./page-master/js.php');
    ?>
    <script src="./js/setting.js"></script>
</body>