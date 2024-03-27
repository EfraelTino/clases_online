<?php
$title = "Agregar curso - NICOLAS ";
include ('./page-master/head.php');
include ("./conexion/Nicolas.php");
session_start();

$operations = new Nicolas();
if (!isset ($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    header("Location: ../login");
    exit;
} else {
    $id_user = $_SESSION['idusuario'];
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
            <div class="row  h-100 p-3">
                <div class="col-12">
                    <div class="row w-100  bg- mb-4 p-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="fw-semibold fs-2 m-0 p-0">
                                        Nuevo curso</h2>
                                    <p>
                                </div>
                                <div class="col-6">
                                    <div class="row  px-3 mb-0">
                                        <div class="col-6">
                                            <a href="./cursos.php"
                                                class="btn btn-warning text-black fw-semibold d-flex align-items-center justify-content-around gap-3">Regresar
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
                                        <div class="mb-3">
                                            <label for="nuevafoto" class="form-label">Foto del curso
                                                recomendado: <strong class="text-danger">720*720px </strong> ||
                                                Extensiones <strong class="text-danger">.JPG - .JPEG - .WEBP
                                                </strong></label>
                                            <input type="file" class="form-control" id="nuevafoto" name="nuevafoto"
                                                accept=".jpg, .jpeg, .png, .webp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nombrecurso" class="form-label">Nombre del
                                                curso</label>
                                            <input type="text" class="form-control" id="nombrecurso" name="nombrecurso"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dictador" class="form-label">Instructor del
                                                curso</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="instructor" required name="dictador">
                                                <?php
                                                // SELECT * FROM usuarios WHERE is_admin ='1';
                                                $get_admins = $operations->getCamposConCondicion('usuarios', 'is_admin', 1);
                                                if (!empty ($get_admins)) {
                                                    foreach ($get_admins as $admin) {
                                                        ?>
                                                        <option class="text-black" value="<?php echo $admin['id']; ?>">
                                                            <?php echo $admin['nombre'] . " " . $admin['apellido']; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="estado" class="form-label">Estado del curso</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="estado" required name="estado">
                                                <option class="text-black" value="1">
                                                    Activo
                                                </option>
                                                <option class="text-black" value="0">
                                                    Desactivo
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tipo" class="form-label">Tipo de curso</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="tipo" required name="tipo">
                                                <option class="text-black" value="1">
                                                    Premium
                                                </option>
                                                <option class="text-black" value="0">
                                                    Free
                                                </option>
                                            </select>
                                        </div>
                                        <button type="button" onclick="addCurso();"
                                            class="btn btn-primary fw-bolder">GUARDAR
                                            CURSO</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <script src="./js/courses.js"></script>
</body>

<?php
include ('./page-master/js.php');

?>