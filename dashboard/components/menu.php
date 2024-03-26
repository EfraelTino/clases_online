<?php
$tabla = "usuarios";
$condicion = "id";
$params = $id_user;
$obtenerUsuario = $operations->getCamposConCondicion($tabla, $condicion, $params);
$obtenerUsuario = $operations->getCamposConCondicion($tabla, $condicion, $params);
$tipo_user = $obtenerUsuario[0]['is_admin'];
?>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../assets/img/logo_dinastia.webp" alt="" style="width:120px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo $item1; ?>" aria-current="page" href="./">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $item2 ?>" href="./courses.php">Cursos</a>
                </li>

                <li class="nav-item">
                    <?php
                    if ($tipo_user == 1 || $tipo_user == '1') {
                        echo
                            ' <a class="nav-link" href="">Estudiantes</a>
                ';
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ajustes</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </span>

                    <input type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        class="form-control form_search text-body-tertiary" placeholder="Search"
                        value="Buscar Curso....">
                </div>
                <li class="nav-item dropdown-center">
                    <a class="nav-link dropdown-toggle bg-white rounded-circle mx-2 text-black" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="../assets/img/carpintero.webp" style="width: 20px;" alt="">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Cuenta</a></li>
                        <li><a class="dropdown-item" href="#">Contactar</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- <section class="card bg-glass h-100">
    <div class="container d-flex h-100 justify-content-between flex-column">
        <div class="col">
               
        </div>
        <div class="col">
            <div class="col-12">
                <a href="./">Principal</a>
            </div>
            <div class="col-12">
                <a href="./courses.php">Cursos</a>
            </div>
            <?php
            if ($tipo_user == 1 || $tipo_user == '1') {
                echo '<div class="col-12">
                    <a href="">Estudiantes</a>
                </div>';
            }
            ?>
            <div class="col-12">
                <a href="">Ajustes</a>
            </div>
        </div>
    </div>
</section> -->