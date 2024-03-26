$(() => {
  var idDelElementoA = "video_<?php echo $id_leccion ?>";
  console.log("ID del elemento <a>: ", idDelElementoA);
});

async function powerLeccion(idLeccion, estado) {
  const convertirEstado = parseInt(estado);

  if (convertirEstado == 1 || convertirEstado == "1") {
    const result = await estadodesactivado(idLeccion, convertirEstado);
    console.log("entro a estado 1");
  } else {
    const desactivar = await estadoactivado(idLeccion, convertirEstado);
    console.log("entro a estado 0");
  }
}
function addLeccion() {
  const nombreleccion = $("#nombreleccion").val();
  const video_url = $("#video_url").val();
  const idcurso = $("#cursoIdHtml").html();
  const ordenleccion = $("#ordenleccion").val();
  // const tipo = $("#tipo").val();
  const estado = $("#estado").val();
  const fotocurso = $("#nuevafoto");
  function handleFileChange() {
    const archivos = $(this).prop("files");

    if (archivos.length === 0) {
      return Toastify({
        close: true,
        text: "Se necesita una imagen de la lección",
        duration: 3000,
        backgroundColor: "#ff4d4d",
      }).showToast();
    } else {
      // Acceder al primer archivo seleccionado
      const archivo = archivos[0];
      return archivo;
    }
  }
  const archivo = handleFileChange.call(fotocurso[0]);
  // Verificar si se seleccionó un archivo
  if (!archivo) {
    return;
  }
  if (nombreleccion.length == 0 || nombreleccion.length == null) {
    return Toastify({
      close: true,
      text: "Ingresa el nombre de la lección",
      duration: 3000,
      backgroundColor: "#ff4d4d",
    }).showToast();
  }
  if (video_url.length == 0 || video_url.length == null) {
    return Toastify({
      close: true,
      text: "Ingresa la url del vídeo de la leccion",
      duration: 3000,
      backgroundColor: "#ff4d4d",
    }).showToast();
  }
  if (ordenleccion.length == 0 || ordenleccion.length == null) {
    return Toastify({
      close: true,
      text: "Ingresa el orden de la lección",
      duration: 3000,
      backgroundColor: "#ff4d4d",
    }).showToast();
  }
  const formData = new FormData();
  formData.append("action", "newleccion");
  formData.append("imagen", archivo);
  formData.append("idcurso", idcurso);
  formData.append("nombre", nombreleccion);
  formData.append("video_url", video_url);
  formData.append("ordenleccion", ordenleccion);
  formData.append("estado", estado);
  try {
    $.ajax({
      url: "./conexion/actions.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: () => {
        return Toastify({
          close: true,
          text: "Cargando...",
          duration: 3000,
          backgroundColor: "#00f059",
        }).showToast();
      },
      success: (response) => {
        const result = response.success;
        // console.log(response);
        if (result === true) {
          window.location.href = `./seelecciones.php?idcr=${idcurso}`;
        } else {
          return Toastify({
            close: true,
            text: response.message,
            duration: 3000,
            backgroundColor: "#ff4d4d",
          }).showToast();
        }
      },
      error: (xhr, status, error) => {
        Toastify({
          close: true,
          text: xhr.responseText,
          duration: 3000,
          backgroundColor: "#ff4d4d",
        }).showToast();
        console.log("XHR", xhr);
        console.log("XHR", status);
        // console.log("XHR", error);
      },
    });
  } catch (error) {
    Toastify({
      close: true,
      text: "¡Error, intente de nuevo!",
      duration: 3000,
      backgroundColor: "#ff4d4d",
    }).showToast();
  }
}
function estadoactivado(idleccion, estado) {
  try {
    const formData = new FormData();
    formData.append("action", "activarleccion");
    formData.append("idleccion", idleccion);
    $.ajax({
      url: "./conexion/actions.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: () => {},
      success: (response) => {
        const result = response.success;
        // console.log(result);
        if (result === true) {
          $(`#item_estado-${idleccion}`)
            .html(`<button onclick="powerLeccion(${idleccion},1)"  class="btn btn-warning" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-power" viewBox="0 0 16 16">
                  <path d="M7.5 1v7h1V1z"></path>
                  <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"></path>
              </svg>
          </button>`);
          $(`#estadoleccion-${idleccion}`).html("Activo");
        } else {
          Toastify({
            close: true,
            text: response.message,
            duration: 3000,
            backgroundColor: "#ff4d4d",
          }).showToast();
        }
      },
      error: (xhr, status, error) => {
        // console.log("XHR: ", xhr);
        // console.log("STATUS: ", status);
        // console.log("ERROR: ", error);
        Toastify({
          close: true,
          text: xhr.responseText,
          duration: 3000,
          backgroundColor: "#ff4d4d",
        }).showToast();
      },
    });
  } catch (error) {
    console.log("Error en catch: ", error);
  }
}
function estadodesactivado(idleccion, estado) {
  // console.log("RECIBÍ LA LECCIÓN: ", idleccion, " Y ESTADO: ", estado);
  try {
    const formData = new FormData();
    formData.append("action", "desactivarleccion");
    formData.append("idleccion", idleccion);
    $.ajax({
      url: "./conexion/actions.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: () => {},
      success: (response) => {
        const result = response.success;
        // console.log(response);
        if (result == true) {
          $(`#item_estado-${idleccion}`)
            .html(`<button onclick="powerLeccion(${idleccion},0)"  class="btn btn-light" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-power" viewBox="0 0 16 16">
                  <path d="M7.5 1v7h1V1z"></path>
                  <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"></path>
              </svg>
          </button>`);
          $(`#estadoleccion-${idleccion}`).html("Desactivado");
        } else {
          Toastify({
            close: true,
            text: response.message,
            duration: 3000,
            backgroundColor: "#ff4d4d",
          }).showToast();
        }
      },
      error: (xhr, status, error) => {
        // console.log("XHR: ", xhr);
        // console.log("STATUS: ", status);
        // console.log("ERROR: ", error);
        Toastify({
          close: true,
          text: xhr.responseText,
          duration: 3000,
          backgroundColor: "#ff4d4d",
        }).showToast();
      },
    });
  } catch (error) {
    // console.log("Error en catch: ", error);
    Toastify({
      close: true,
      text: "¡Error, intente de nuevo!",
      duration: 3000,
      backgroundColor: "#ff4d4d",
    }).showToast();
  }
}


function getLeccions() {
  const num_registros = $("#num_registros").val();
  try {
    const formData = new FormData();
    formData.append("action", "traerregistro");
    formData.append("registros", num_registros);
    $.ajax({
      url: "./conexion/actions.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: () => {},
      success: (response) => {
        // console.log(response);
      },
      error(xhr, status, error) {
        // console.log("XHR: ", xhr);
        // console.log("STATUS: ", status);
        // console.log("ERRROR: ", error);
        Toastify({
          close: true,
          text: xhr.responseText,
          duration: 3000,
          backgroundColor: "#ff4d4d",
        }).showToast();
      },
    });
  } catch (error) {
    Toastify({
      close: true,
      text: "¡Error, intente de nuevo!",
      duration: 3000,
      backgroundColor: "#ff4d4d",
    }).showToast();
  }
}
function updateLeccion() {
  const nombreleccion = $("#nombreleccion").val();
  const urlleccion = $("#urlleccion").val();
  const fotocurso = $("#nuevafoto");
  const idleccionhtml = $("#idleccionhtml").text();
  const cursoidhtml = $("#cursoidhtml").text();
  // console.log(cursoidhtml);
  function handleFileChange() {
    const archivos = $(this).prop("files");

    if (archivos.length === 0) {
      return Toastify({
        close: true,
        text: "Si desea actualizar el curso, ingrese una foto",
        duration: 3000,
        backgroundColor: "#ff4d4d",
      }).showToast();
    } else {
      // Acceder al primer archivo seleccionado
      const archivo = archivos[0];
      return archivo;
    }
  }
  const archivo = handleFileChange.call(fotocurso[0]);
  // Verificar si se seleccionó un archivo
  if (!archivo) {
    return;
  }
  if (nombreleccion.length == 0) {
    return Toastify({
      close: true,
      text: "Ingresa el nombre de la lección",
      duration: 3000,
      backgroundColor: "#ff4d4d",
    }).showToast();
  }
  if (urlleccion.length == 0 || urlleccion == null) {
    return Toastify({
      close: true,
      text: "Ingrese la url de la lacción",
      duration: 3000,
      backgroundColor: "#ff4d4d",
    }).showToast();
  }
  const formData = new FormData();
  formData.append("action", "updateleccion");
  formData.append("imagen", archivo);
  formData.append("nombre", nombreleccion);
  formData.append("idleccionhtml", idleccionhtml);
  formData.append("idcursohtml", cursoidhtml);
  formData.append("video_url", urlleccion);
  try {
    $.ajax({
      url: "./conexion/actions.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: () => {},
      success: (response) => {
        const result = response.success;
        // console.log(response);
        if (result === true) {
          window.location.href = `./seelecciones.php?idcr=${cursoidhtml}`;
        } else {
          return Toastify({
            close: true,
            text: response.message,
            duration: 3000,
            backgroundColor: "#ff4d4d",
          }).showToast();
        }
      },
      error: (xhr, status, error) => {
        Toastify({
          close: true,
          text: xhr.responseText,
          duration: 3000,
          backgroundColor: "#ff4d4d",
        }).showToast();
      },
    });
  } catch (error) {
    Toastify({
      close: true,
      text: "¡Error, intente de nuevo!",
      duration: 3000,
      backgroundColor: "#ff4d4d",
    }).showToast();
  }
}

function deleteLeccion(id) {
  console.log("EL ID que recibo, ", id);
  console.log(typeof id)
  const formData = new FormData();
  formData.append("action", "deleteleccion");
  formData.append("id", id);
  try {
    $.ajax({
      url: "./conexion/actions.php",
      type: "post",
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: () => {},
      success: (response) => {
        location.reload();
      },
      error(xhr, status, error) {
        // console.log("XHR: ", xhr);
        // console.log("STATUS: ", status);
        // console.log("ERRROR: ", error);
        Toastify({
          close: true,
          text: "¡Error, intente de nuevo!",
          duration: 3000,
          backgroundColor: "#ff4d4d",
        }).showToast();
      },
    });
  } catch (error) {
    // console.log(error);
    Toastify({
      close: true,
      text: "¡Error, intente de nuevo!",
      duration: 3000,
      backgroundColor: "#ff4d4d",
    }).showToast();
  }
}
