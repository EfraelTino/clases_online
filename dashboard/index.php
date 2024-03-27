<?php
session_start();
if (!isset ($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    header("Location: ../login");
    exit;
} else {
    $id_user = $_SESSION['idusuario'];
}
$title = "Principal - DINASTIA DE ÉXITO";

include ('./page-master/head.php');
include "./conexion/Nicolas.php";
$operations = new Nicolas();
$item1 = "active";
$item2 = "";
$item3 = "";
$item4 = "";
?>


<body class="bg-body">
    <!-- Section: Design Block -->
    <div class="row m-0 p-0">
        <?php
        include ('./components/menu.php');
        ?>
    </div>
    <section class=" overflow-hidden d-flex justify-content-center align-items-center bg-principal ">
    <p  user-id="<?php echo $id_user ?>" id="userIdHtml" hidden><?php  echo $id_user?></p>
        <div class="row containe h-100 m-0  my-4 p-0 mx-5">
            <!-- MENU -->
            <div class="col-12 col-md-8">
                <div class="row card bg-dark mb-4 p-2">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="text-white">
                                    <span class="text-white">Hola</span>
                                    <?php
                                    if (!empty ($obtenerUsuario)) {
                                        ?>
                                        <strong class="text-white">
                                            <?php
                                            echo $obtenerUsuario[0]['nombre'] . " " . $obtenerUsuario[0]['apellido'];
                                            ?>
                                        </strong>
                                        <?php
                                    } else {
                                        echo "No se encontró ningún usuario con el ID proporcionado.";
                                    }
                                    ?>
                                </h2>
                                <p>
                                    Es bueno verte otra vez.
                                </p>
                            </div>
                            <div class="col-5">
                                <img src="./assets/img/carpintero.webp" alt="Icono Usuario">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row ">
                    <div class="col-12 card bg-dark">
                        <div class="row justify-content-between align-items-center p-3">
                            <div class="col-3">
                                <div class="card-img">
                                    <img src="" alt="" class="Nombre del Curso">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-8">
                                        <h3>Nombre del curso</h3>
                                        <p class="m-0 p-0">Instructor</p>
                                    </div>
                                    <div class="col-4">
                                        <div
                                            class="ct-porcen row justify-content-center align-items-center h-100 w-100">
                                            83%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 row justify-content-center align-items-center">
                                <a href="./courses.php"
                                    class="btn btn-primary btn-block  py-2 px-4 fs-6 fw-semibold">Continuar</a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-12">
                        <h2 class="my-2">Cursos</h2>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2">
                            <button type="button" id="traerCursosBtn" class="btn btn-warning fw-semibold d-flex align-items-center gap-1" data-id_user="<?php echo $id_user ?>"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                        class="bi bi-check-square" viewBox="0 0 16 16" class="text-black">
                                        <path
                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>Todos </button>
                            </div>
                            <div class="col-2"><button type="button" onclick="traerCursoFav(<?php echo $id_user; ?>)"
                                    class="btn btn-light light d-flex align-items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                        class="bi bi-star" viewBox="0 0 16 16">
                                        <path
                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                    </svg>
                                    Favoritos</button>
                            </div>
                            <!-- <div class="col-2">Más Popular</div> -->
                            <div class="col-6"></div>
                        </div>
                    </div>
                </div>
                <div class="row" id="cursosMostrar">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <?php include ('./components/profile.php'); ?>
                <div class="row mb-3">
                   <?php include ('./components/dataCurso.php'); ?>
                </div>
                <?php include ('./components/telegram.php'); ?>

            </div>
        </div>
    </section>

    <?php
    include_once ('./page-master/js.php');
    ?>