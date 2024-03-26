<?php
$title = "Lecciones - NICOLAS ";

include ('./page-master/head.php');

include ('./page-master/header.php');
include ("./conexion/Nicolas.php");
session_start();
$operations = new Nicolas();
$ultima_vista = null;
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    header("Location: ../login");
    exit;
} else {
    $id_user = $_SESSION['idusuario'];
}


if (isset($_GET['idcr']) || !empty($_GET['idcr'])) {
    // 
    $id_curso = $_GET['idcr'];

    // primero traigo a la tabla enrollments con su campo id_usuario
    $get_enrrollments = $operations->getCamposConCondicion('enrollments', 'user_id', $id_user);

    if (count($get_enrrollments) <= 0) {
        echo "Este usuario todavia no a visto esta leccion";
        $ultima_vista = 0;
    } else {
        end($get_enrrollments);
        $ultimo_elemento = current($get_enrrollments); // Obtener el último elemento
        $ultima_vista = $ultimo_elemento['ultima_leccion_vista_id'];
    }
    $tabla1 = "lecciones";
    $tabla2 = "cursos";
    $prepare = 'i';
    $condicion_tb1 = "id_curso";
    $condicion_tb2 = "id";
    $condicion = $id_curso;
    $camp = "orden";
    $st = 'ASC';
    $get_curso = $operations->getJoinCampsOrder($tabla1, $tabla2, $condicion, $prepare, $condicion_tb1, $condicion_tb2, $camp, $st);

} else {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
$item1 = "";
$item2 = "active";
?>

<body>
    <!-- Section: Design Block -->
    <main class="bg-principal">
        <div class="row m-0 p-0">
            <?php
            include ('./components/menu.php');
            ?>
        </div>

        <section class="w-100 overflow-hidden container">
            <div class="row container h-100 p-3">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="fw-semibold fs-2 m-0 p-0">
                                Lecciones registrados
                            </h2>
                        </div>
                        <div class="col-6">
                            <div class="row  px-3 mb-0">
                                <div class="col-6">
                                    <a class="btn btn-warning text-black fw-semibold d-flex align-items-center justify-content-around gap-3"
                                        href="./addlecion.php?idcr=<?php echo $id_curso ?>">Nueva lección
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                                            class="bi bi-plus-circle" viewBox="0 0 16 16">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black"
                                            class="bi bi-plus-circle" viewBox="0 0 16 16">
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
                    <div class="row">
                        <div class="col-6">
                            <div class="row mt-4">
                                <div class="col-auto">
                                    <label for="num_registros" class="col-form-label"><strong>Mostrar:</strong></label>
                                </div>
                                <div class="col-auto"><select name="num_registros" id="num_registros"
                                        class="form-select bg-dark text-white">
                                        <option value="10" class="text-white">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <label for="num_registros" class="col-form-label">Registros</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                    <div class="row mb-5 mt-3">
                        <div class="col-12">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Nombre de la lección</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Encargado</th>
                                        <th scope="col">Orden</th>
                                        <th scope="col">Vista previa</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($get_curso)) {

                                        $columnas = array_keys($get_curso[0]);
                                        $pos = 0;
                                        foreach ($get_curso as $fila) {
                                            $pos++;
                                            $id_leccion = (int) $fila['id_leccion'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <p>
                                                        <?php echo $pos; ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <img class="card-img object-fit-cover rounded-bottom-0"
                                                        src="./assets/img_leccion/<?php echo $fila['img_leccion'] ?>"
                                                        alt="<?php echo $fila['titulo']; ?>" style="width:50px;">
                                                </td>
                                                <td>
                                                    <p>
                                                        <?php echo $fila['titulo']; ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p id="estadoleccion-<?php echo $id_leccion ?>">
                                                        <?php echo $fila['active'] == 1 ? 'Activo' : 'Desactivo' ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="m-0 p-0">
                                                        <?php
                                                        $tabla = "usuarios";
                                                        $cond = "id";
                                                        $data = $fila['id_instructor'];
                                                        $getInstructor = $operations->getCamposConCondicion($tabla, $cond, $data);
                                                        if (!empty($getInstructor)) {
                                                            foreach ($getInstructor as $filai) {
                                                                echo $filai['nombre'] . " " . $filai['apellido'];
                                                            }
                                                        } else {
                                                            echo "No se encontró Instructor";
                                                        }
                                                        ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <?php echo $fila['orden']; ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <a href="<?php echo $fila['video_url'] ?>" target="_blank">
                                                        Ver vídeo
                                                    </a>


                                                </td>
                                                <td>
                                                    <div class="row container">
                                                        <div class="col-4 d-flex justify-content-center p-1">
                                                            <a class="btn btn-primary"
                                                                href="./editleccion.php?idl=<?php echo $id_leccion ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                    fill="currentColor" class="bi bi-pencil-square"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                                                                    </path>
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="col-4 d-flex justify-content-center p-1">
                                                            <button class="btn btn-danger" onclick="deleteLeccion(<?php echo  $id_leccion?>)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                    fill="currentColor" class="bi bi-trash3-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="col-4 d-flex justify-content-center p-1"
                                                            id="item_estado-<?php echo $id_leccion ?>">
                                                            <?php
                                                            echo $fila['active'] == '1' ? '<button onclick="powerLeccion(' . $id_leccion . ',' . $fila['active'] . ')" class="btn btn-warning" href="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-power" viewBox="0 0 16 16">
                                                                <path d="M7.5 1v7h1V1z" />
                                                                <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812" />
                                                            </svg>
                                                        </button>' : '<button onclick="powerLeccion(' . $id_leccion . ',' . $fila['active'] . ')" class="btn btn-light" href="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-power" viewBox="0 0 16 16">
                                                            <path d="M7.5 1v7h1V1z" />
                                                            <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812" />
                                                        </svg>
                                                    </button>';
                                                            ?>
                                                        </div>

                                                    </div>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>


                            <?php
                                    } else {
                                        echo ' <h3>No se econtraron cursos</h3>';
                                    }
                                    ?>

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