<?php
$title = "Login";

include('page-master/head.php');
include('page-master/header.php');
?>

<body>
  <!-- Section: Design Block -->
  <section class="background-radial-gradient overflow-hidden d-flex justify-content-center align-items-center">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-7 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Aprende lo mejor <br />
            <span class="text-secondarys">en nuestra paltaforma</span>
          </h1>
          <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Temporibus, expedita iusto veniam atque, magni tempora mollitia
            dolorum consequatur nulla, neque debitis eos reprehenderit quasi
            ab ipsum nisi dolorem modi. Quos?
          </p>
        </div>

        <div class="col-lg-5 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">

            <h2 class="text-center fw-bold fs-2 text-primarys mb-4">Inicia Sesión</h2>
              <form>
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">

                <!-- Email input -->
                <div class="form-outline mb-4">
                <label class="form-label" for="email">Correo electrónico</label>
                  <input placeholder="Escribe tu correo electrónico"  type="email" id="email" class="form-control" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                <label class="form-label" for="password">Contraseña</label>
                  <input placeholder="Escribe una contraseña" type="password" id="password" class="form-control" />
                </div>

                <!-- Submit button -->
               <div class="d-flex justify-content-center">
               <button onclick="Login()" type="button" class="btn btn-primary btn-block mb-4 py-2 px-4 fs-6 fw-semibold">
                  Ingresar
                </button>
               </div>

                <!-- Register buttons -->
                <div class="text-center">
                  <p class="m-0">No tienes una cuenta?</p>
                  <a href="./signup" type="button" class="btn btn-link btn-floating mx-1 text-primarys fs-6">
                    Crear cuenta
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