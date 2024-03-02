<?php
$title = "Crear cuenta - NICOLAS ";

include('page-master/head.php');
include('page-master/header.php');
?>

<body>
  <!-- Section: Design Block -->
  <section class="background-radial-gradient overflow-hidden d-flex justify-content-center align-items-center">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Aprende el camino hacia el éxito <br />
            <span class="text-secondarys">en nuestra paltaforma</span>
          </h1>
          <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Temporibus, expedita iusto veniam atque, magni tempora mollitia
            dolorum consequatur nulla, neque debitis eos reprehenderit quasi
            ab ipsum nisi dolorem modi. Quos?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
            <h2 class="text-center fw-bold fs-2 text-primarys mb-4">Crear cuenta</h2>

              <form method="post" action="#">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <label class="form-label" for="form3Example1">Nombres</label>
                      <input placeholder="Escribe tus Nombres..."  type="text" id="nombres" class="form-control"  value="Efrael"  />
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <label class="form-label" for="form3Example2">Apellidos</label>
                      <input placeholder="Escribe tus Apellidos..." type="text" id="apellidos" class="form-control"  value="Efrael"/>
                    </div>
                  </div>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Correo electrónico</label>
                  <input placeholder="Escribe tu correo electrónico"  type="email" id="correo" class="form-control" value="efrael2001@gmail.com"/>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Contraseña</label>
                  <input placeholder="Escribe una contraseña" type="password" id="password" class="form-control" autocomplete="new-password" value="1234566"/>
                </div>
                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Repetir contraseña</label>
                  <input placeholder="Repite la contraseña" type="password" id="repeat_password" class="form-control" autocomplete="new-password"  value="1234566" />
                </div>

                <!-- Submit button -->
               <div class="d-flex justify-content-center">
               <button onclick="crearCuenta()" type="button" class="btn btn-primary btn-block mb-4 py-2 px-4 fs-6 fw-semibold">
                  Registrarse
                </button>
               </div>

                <!-- Register buttons -->
                <div class="text-center">
                  <p class="m-0">¿Ya tienes una cuenta?</p>
                  <a href="./login" type="button" class="btn btn-link btn-floating mx-1 text-primarys fs-6">
                    Inicia Sesión
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
</body>

</html>
<?php
// include "page-master/footer.php";
include('page-master/js.php');
?>