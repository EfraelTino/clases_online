<style>
    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }

    .form_search {
        display: flex;
        justify-content: start;
        padding-left: 32px;
    }

    .profile_icon {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
<div class="section card bg-glass py-2 px-1">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-7">
                    <!-- Button trigger modal -->
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </span>

                        <input type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="form-control form_search text-body-tertiary" placeholder="Search" value="Buscar Curso....">
                    </div>

                </div>
                <div class="col-2 text-center d-flex justify-content-center align-items-center">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn position-relative text-primarys">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                                    </svg>
                                </div>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    9
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="dropdown-center">
                        <button class="btn dropdown-toggle profile_icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/img/carpintero.webp" style="width: 20px;" alt="">
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cuenta</a></li>
                            <li><a class="dropdown-item" href="#">Contactar</a></li>
                            <li><a class="dropdown-item" href="#">Salir</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade fixed" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Buscar Curso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Buscar curso</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Búsqueda acá">
                </div>
                Reultado de búsqueda:
                <div class="">
                    <div class="col-12 card bg-glass">
                        <div class="row justify-content-between align-items-center p-3">
                            <div class="col-2">
                                <div class="card-img">
                                    <img src="" alt="" class="Nombre del Curso">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Nombre del curso</h3>
                                        <p class="m-0 p-0">Instructor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 row justify-content-center align-items-center">
                                <a href="" class="btn btn-primary btn-block  py-2 ">Continuar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar </button>
                <button type="button" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
</div>