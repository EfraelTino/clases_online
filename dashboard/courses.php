<?php
session_start();
if (!isset ($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    header("Location: ../login");
    exit;
} else {
    $id_user = $_SESSION['idusuario'];
}
$title = "Dashboard - NICOLAS ";

include ('./page-master/head.php');

include ('./page-master/header.php');
include ("./conexion/Nicolas.php");
$operations = new Nicolas();
$item1 = "";
$item2 = "active";
?>

<body class="bg-principal">
    <!-- Section: Design Block -->
    <main class="bg-course">
        <div class="row m-0 p-0">
            <!-- MENU -->
            <?php
            include ('./components/menu.php');
            ?>
            <!-- END MENU -->
        </div>
        <section class="container d-flex justify-content-center align-items-center ">
            <p user-id="<?php echo $id_user ?>" id="userIdHtml" style="color:black;" hidden>
                <?php echo $id_user ?>
            </p>
            <div class="row containe h-100 p-3">

                <div class="col-9">

                    <div class="row w-100  bg- mb-4 p-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="fw-normal fs-2">
                                        TODOS NUESTROS CURSOS </h2>
                                    <p>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row">

                                <?php
                                $tabla = "cursos";
                                $data = $operations->getDataByOrderDescCu($tabla);
                                try {
                                    if (!empty ($data)) {
                                        foreach ($data as $fila) {
                                            // echo $id_user;
                                            $estado = $fila['activo'];
                                            if ($estado == 1 || $estado == '1') {
                                                ?>
                                                <div class="col-4 mt-2">
                                                    <a href="./lecciones.php?<?php echo 'idcr=' . $fila['id']; ?>">
                                                        <div class="card bg-cards m-0 p-0 border-dark ">
                                                            <figure class="fig-sd">
                                                                <img class="card-img object-fit-cover rounded-bottom-0 img-see titulo-curso"
                                                                    src="./assets/img/<?php echo $fila['imagen_curso']; ?>"
                                                                    alt="<?php echo $fila['titulo_curso']; ?>">

                                                            </figure>
                                                            <div class="card-body ">
                                                                <h5 class="card-title text-white titulo-curso">
                                                                    <?php echo $fila['titulo_curso']; ?>
                                                                </h5>
                                                                <!-- <p class="card-text">Some quick example text to build on the card title
                                                                    and
                                                                    make
                                                                    up
                                                                    the bulk of the card's content.</p> -->
                                                                <div class="row border-top border-light m-0 p-0 mt-3 pt-4">
                                                                    <div class="col-10 m-0 p-0">
                                                                        <div class="btn btn-primary">Explorar</div>
                                                                    </div>
                                                                    <div
                                                                        class="m-0 p-0 col-2 d-flex align-items-center justify-content-end">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                            fill="currentColor" class="bi bi-chevron-right"
                                                                            viewBox="0 0 16 16">
                                                                            <path fill-rule="evenodd"
                                                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                        }
                                    } else {
                                        echo '<h3 class="fw-bold text-black fs-4" style="right: 30px; top:10px">
                                    No se han encontrado cursos
                                         </h3>';
                                    }
                                } catch (\Throwable $th) {
                                    echo $th;
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row mt-3 px-3 mb-0">
                        <?php
                        if ($tipo_user == 1 || $tipo_user == '1') {
                            echo
                                '
                                <div class="row m-0 p-0">
                                    <a class="btn-add text-white d-flex align-items-center justify-content-center gap-3 add-item" href="./cursos.php">Administar cursos
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>
                                  </a>
                                </div> 
                                
                ';
                        }
                        ?>
                    </div>
                    <?php include ('./components/profile.php'); ?>
                    <div class="row my-3">
                        <?php include ('./components/dataCurso.php'); ?>
                    </div>
                    <?php include ('./components/telegram.php'); ?>

                </div>
            </div>
        </section>
    </main>
</body>

<?php
include ('./page-master/js.php');

?>