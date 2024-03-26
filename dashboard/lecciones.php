<?php
$title = "Dashboard - NICOLAS ";

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
        // echo "Este usuario todavia no a visto esta leccion";
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
    $get_curso = $operations->getJoinCamps($tabla1, $tabla2, $condicion, $prepare, $condicion_tb1, $condicion_tb2);
    $orden = $get_curso[0]["orden"];
} else {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
$item1 = "";
$item2 = "active";
?>
<?php
include ('./page-master/js.php');

?>
<script src="./js/index.js"></script>

<body class="bg-principal">
    <!-- Section: Design Block -->
    <main>
        <div class="row m-0 p-0">
            <!-- MENU -->
            <?php
            include ('./components/menu.php');
            include ('./components/profile.php');
            ?>
            <!-- END MENU -->
        </div>
        <section class="container">
            <div class="row containe h-100 p-3">

                <div class="col-12">
                    <?php
                    if (!empty($get_curso)) {

                        $columnas = array_keys($get_curso[0]);
                        // var_dump($columnas);
                    
                        $pos = 0;
                        foreach ($get_curso as $fila) {
                            $pos++;
                            $id_leccion = (int) $fila['id_leccion'];
                            $orden_es = $fila['orden'];
                            $estado = $fila['active'];
                            if (!$estado == '0' || !$estado == 0) {
                                ?>
                                <div class="row">
                                    <div class="col-12 mt-4">

                                        <div class="col-12 card bg-dark">
                                            <div class="row justify-content-between align-items-center p-3">
                                                <div class="col-3">
                                                    <div class="card-img">
                                                        <img src="./assets/img_leccion/<?php echo $fila['img_leccion'] ?>"
                                                            alt="<?php echo $fila['titulo']; ?>"
                                                            class="card-img object-fit-cover mx-w-3">
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h3 class="titulo-curso">
                                                                <?php echo $fila['titulo']; ?>
                                                            </h3>
                                                            <p class="m-0 p-0">
                                                                <strong class="text-danger">Instructor:</strong>
                                                                <?php
                                                                $tabla = "usuarios";
                                                                $cond = "id";
                                                                $data = $fila['id_instructor'];
                                                                $getInstructor = $operations->getCamposConCondicion($tabla, $cond, $data);
                                                                if (!empty($getInstructor)) {
                                                                    foreach ($getInstructor as $filai) {
                                                                        echo "<span>". $filai['nombre'] . " " . $filai['apellido'] ."</span>";
                                                                    }
                                                                } else {
                                                                    echo "<p class='text-warning fw-bold'>No se encontró Instructor</p>";
                                                                }
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <?php


                                                    if (isset($ultima_vista)) {
                                                        // echo $ultima_vista;
                                                        $vista_convertida = (int) $ultima_vista;
                                                        $res_comstilta = $vista_convertida == (int) $id_leccion;
                                                        // echo $vista_convertida;
                                                        if ($ultima_vista == 0) {
                                                            $primera_leccion_id = $get_curso[0]['id_leccion'];
                                                            // Si $ultima_vista es 0, habilita solo el enlace de la primera lección
                                                            if ($pos == 1) {
                                                                echo '<p class="m-0 p-0"> <small class="text-warning">Pendiente</small> </p>';
                                                            } else {
                                                                echo '<p class="m-0 p-0"> <small class="text-warning">Pendiente</small> </p>';
                                                            }
                                                        } else if ($id_leccion <= $vista_convertida) {
                                                            // Recorrer todas las lecciones hasta la última lección vista
                                                            echo '<p class="m-0 p-0"> <small class="text-primarys">Visto</small> </p>';
                                                        } else {
                                                            echo '<small class="text-warning">Pendiente</small> </p>';
                                                        }
                                                    }
                                                    ?>
                                                    <!-- <p>Visto</p> -->
                                                </div>
                                                <div class="col-2">
                                                    <?php
                                                    // echo $pos;
                                                    if (isset($ultima_vista)) {
                                                        // echo $ultima_vista;
                                                        $vista_convertida = (int) $ultima_vista;
                                                        $res_comstilta = $vista_convertida == (int) $id_leccion;
                                                        // echo $vista_convertida;
                                                        if ($ultima_vista == 0) {
                                                            $primera_leccion_id = $get_curso[0]['id_leccion'];
                                                            // Si $ultima_vista es 0, habilita solo el enlace de la primera lección
                                                            if ($pos == 1) {
                                                                echo '<a class="btn btn-info text-white fw-semibold" href="./verleccion.php?asd=' . $primera_leccion_id . '&eda=' . $id_curso . '&ord='.$orden_es. '">Empezar</a>';
                                                            } else {
                                                                echo '<div class="btn btn-warning" disabled>Pendiente</div>';
                                                            }
                                                        } else if ($id_leccion <= $vista_convertida) {
                                                            // Recorrer todas las lecciones hasta la última lección vista
                                                            echo '<a href="./verleccion.php?asd=' . $id_leccion . '&eda=' . $id_curso . '&ord='.$orden_es. '" class="btn btn-primary">Continuar</a>';
                                                        } else {
                                                            echo '<div class="btn btn-warning" disabled>Pendiente</div>';
                                                        }
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php 
                            } 
                        }
                    } else {
                        echo ' <h3 class="text-center my-5 fw-bold text-danger">Este curso aún no tiene lecciones</h3>';
                    }
                    ?>

                </div>

            </div>
        </section>
    </main>
    <script src="./js/index.js"></script>
    <?php
    include ('./page-master/js.php');
    ?>

</body>