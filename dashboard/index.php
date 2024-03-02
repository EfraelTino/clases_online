<?php
session_start();
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    header("Location: ../login");
    exit;
} else {
    $id_user = $_SESSION['idusuario'];
}
$title = "Dashboard - NICOLAS ";

include('../page-master/head.php');

include('../page-master/header.php');
include("../conexion/Nicolas.php");
$operations = new Nicolas();
?>
<link rel="stylesheet" href="../nicolas.css">

<body>
    <!-- Section: Design Block -->
    <section class=" overflow-hidden d-flex justify-content-center align-items-center">

        <div class="row containe h-100 p-3">
            <!-- MENU -->
            <div class="col-2">
                <?php
                include('./components/menu.php');
                ?>
            </div>
            <div class="col-6">
                <div class="row card bg-glass mb-4 p-2">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-7">
                                <h2>
                                    Hola <?php 
                                            $tabla = "usuarios";
                                            $condicion = "id";
                                            $params =  $id_user;
                                            $obtenerUsuario = $operations->getCamposConCondicion($tabla, $condicion, $params);
                                            $obtenerUsuario = $operations->getCamposConCondicion($tabla, $condicion, $params);

                                            // Verificar si se obtuvieron resultados de la consulta
                                            if (!empty($obtenerUsuario)) {
                                                // Imprimir el nombre de usuario, suponiendo que 'nombre_usuario' es una columna en tu tabla de usuarios
                                                echo $obtenerUsuario[0]['nombre'] . " ".$obtenerUsuario[0]['apellido'];
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
                                <img src="../assets/img/carpintero.webp" alt="Icono Usuario">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 card bg-glass">
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
                                        <div class="ct-porcen row justify-content-center align-items-center h-100 w-100">
                                            83%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 row justify-content-center align-items-center">
                                <a href="" class="btn btn-primary btn-block  py-2 px-4 fs-6 fw-semibold">Continuar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="my-2">Cursos</h2>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2">Mis cursos</div>
                            <div class="col-2">Favoritos</div>
                            <div class="col-2">Más Popular</div>
                            <div class="col-6"></div>
                        </div>
                    </div>
                </div>
                <div class="row" id="cursos">
                    <div class="col-12 card bg-glass">
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
                                        <div class="ct-porcen row justify-content-center align-items-center h-100 w-100">
                                            83%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 row justify-content-center align-items-center">
                                <a href="" class="btn btn-primary btn-block  py-2 px-4 fs-6 fw-semibold">Continuar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <?php include('./components/profile.php'); ?>
                <div class="row my-3">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-glass">
                                    <div class="row p-3">
                                        <div class="col-4 d-flex justify-content-center align-items-center">
                                            <h2 class="m-0 p-0 fw-bolder">
                                                2
                                            </h2>

                                        </div>
                                        <div class="col-8">
                                            <p class="m-0 p-0"><small>Cursos completados</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-glass">
                                    <div class="row p-3">
                                        <div class="col-4 d-flex justify-content-center align-items-center">
                                            <h2 class="m-0 p-0 fw-bold">
                                                2
                                            </h2>

                                        </div>
                                        <div class="col-8">
                                            <p class="m-0 p-0"><small>Cursos por completar</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php include('./components/telegram.php'); ?>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>