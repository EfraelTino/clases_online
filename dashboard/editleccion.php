<?php
$title = "Editar lección - DINASTIA DE ÉXITO ";
include ('./page-master/head.php');

include ("./conexion/Nicolas.php");
session_start();

$operations = new Nicolas();
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    header("Location: ../login");
    exit;
} else {
    $id_user = $_SESSION['idusuario'];
    if (!isset($_GET['idl']) || empty($_GET['idl'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $idlecicon = $_GET['idl'];

    }
}
$item1 = "";
$item2 = "active";
$item3 = "";
$item4 = "";
$sql = $operations->getCamposConCondicion('usuarios', 'id', $id_user);
$statu_user = $sql[0]['is_admin'];
if (!$statu_user == 1 || !$statu_user == '1') {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>

<body class="bg-principal">
    <!-- Section: Design Block -->
    <main class="bg-principal">
        <div class="row m-0 p-0">
            <!-- MENU -->
            <?php
            include ('./components/menu.php');
            ?>
            <!-- END MENU -->
        </div>
        <section class="container">
            <p user-id="<?php echo $id_user ?>" id="userIdHtml" style="color:black;" hidden>
                <?php echo $id_user ?>
            </p>
            <p curso-id="<?php echo $idlecicon ?>" id="idleccionhtml" style="color:black;">
                <?php echo $idlecicon ?>
            </p>
            <div class="row  h-100 p-3">
                <div class="col-12">
                    <div class="row w-100  bg- mb-4 p-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="fw-semibold fs-2 m-0 p-0">
                                        Editar lección</h2>
                                    <p>
                                </div>
                                <div class="col-6">
                                    <div class="row  px-3 mb-0">
                                        <div class="col-6">
                                            <a class="btn btn-warning text-black fw-semibold d-flex align-items-center justify-content-around gap-3"
                                                href="./cursos.php">Regresar
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="black" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-danger text-black fw-semibold d-flex align-items-center justify-content-around gap-3"
                                                href="./cursos.php">Nuevo anuncio
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="black" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                </svg>
                                            </a>
                                        </div>

                                    </div>
                                    <?php include ('./components/profile.php'); ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <form enctype="multipart/form-data">
                                        <?php
                                        $tabla = "lecciones";
                                        $data = $operations->getCamposConCondicion($tabla, 'id_leccion', $idlecicon);
                                        try {
                                            if (!empty($data)) {
                                                foreach ($data as $fila) {
                                                    ?>
                                                    <div class="mb-3">
                                                        <label for="previmg" class="form-label">Portada </label>
                                                        <img id="previmg" class="card-img object-fit-cover rounded-bottom-0"
                                                            src="./assets/img_leccion/<?php echo $fila['img_leccion']; ?>"
                                                            alt="<?php echo $fila['titulo']; ?>" style="width:320px">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nuevafoto" class="form-label">Foto del curso
                                                            recomendado: <strong class="text-danger">720*720px </strong> ||
                                                            Extensiones <strong class="text-danger">.JPG - .JPEG - .WEBP
                                                            </strong></label>
                                                        <input type="file" class="form-control" id="nuevafoto" name="nuevafoto"
                                                            accept=".jpg, .jpeg, .png, .webp" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="nombreleccion" class="form-label">Nombre de la Lecicón</label>
                                                        <input type="text" class="form-control" id="nombreleccion"
                                                            value="<?php echo $fila['titulo'] ?>" name="nombreleccion" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="urlleccion" class="form-label"><strong>Url de
                                                                video</strong></label>
                                                        <div class="row d-flex align-items-center">
                                                            <div class="col-9"><input type="text" class="form-control"
                                                                    id="urlleccion" value="<?php echo $fila['video_url'] ?>"
                                                                    name="urlleccion" required></div>
                                                            <div class="col-3"><a target="_blank" class="text-dashboard" href="<?php echo $fila['video_url'] ?>">Ver lección</a>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                                    fill="#0ae98a" class="bi bi-eye" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z">
                                                                    </path>
                                                                    <path
                                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0">
                                                                    </path>
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nombrecurso" class="form-label">Nombre del curso</label>
                                                        <p hidden id="cursoidhtml"><?php  echo $fila['id_curso']; ?></p>
                                                        <?php
                                                        // SELECT * FROM usuarios WHERE is_admin ='1';
                                                        $get_crs = $operations->getCamposConCondicion('cursos', 'id', $idlecicon);
                                                        if (!empty($get_crs)) {
                                                            foreach ($get_crs as $curso_name) {
                                                                ?>
                                                                <input type="text" class="form-control" id="nombrecurso"
                                                                    value="<?php echo $curso_name['titulo_curso'] ?>" name="nombrecurso"
                                                                    required readonly>

                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <button type="button" onclick="updateLeccion();"
                                                        class="btn btn-primary fw-bolder">GUARDAR
                                                        LECCIÓN</button>
                                                    <?php
                                                }
                                                echo "  </form>
                                                </div>";
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

                </div>
        </section>
    </main>
    <?php
    include ('./page-master/js.php');

    ?>
    <script src="./js/lecciones.js"></script>
</body>

