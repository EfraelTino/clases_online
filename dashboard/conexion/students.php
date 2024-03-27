<?php
header('Content-Type: application/json');
include ("./Nicolas.php");
$actions = new Nicolas();
if (isset($_POST["action"]) && $_POST["action"] == "getstudents") {
    $response = [
        'success' => false,
        'error' => ''
    ];
    try {
        $page = isset($_POST['page']) ? (int) $_POST['page'] : 1;
        if ($page < 1)
            $page = 1;
        $records_by_page = isset($_POST['amount_show']) ? (int) $_POST['amount_show'] : 10;
        if ($records_by_page < 10)
            $records_by_page = 10;

        $limit_from = ($page - 1) * $records_by_page;

        // Obtenemos el total de registros
        $info = $actions->executeQuery("SELECT COUNT(*) AS total FROM usuarios")->fetch_assoc();
        $response['total_records'] = $info['total'];

        // Obtenemos los registros para la "pagina actual"
        $stmt = $actions->prepare("SELECT id, apellido, nombre, email, imagen_profile, is_premium, sexo, telf FROM usuarios ORDER BY id DESC LIMIT ?, ?");
        $stmt->bind_param('ii', $limit_from, $records_by_page);
        $stmt->execute();
        $result = $stmt->get_result();

        $response['records'] = $result->fetch_all(MYSQLI_ASSOC);
        $response['success'] = true;
    } catch (Exception $e) {
        $response['error'] = $e->getMessage();
    }
    echo json_encode($response);
}
// activar estudiante
if (isset($_POST['action']) && $_POST['action'] == 'activarusuario') {
    $idusuario = $_POST['idusuario'];
    try {
        // Actualizar el estado del curso
        $activar = $actions->updateData('usuarios', 'is_premium="1"', 'id', $idusuario);

        // Comprobar si se ha actualizado correctamente
        if ($activar) {
            // Construir la respuesta exitosa
            $response = array('success' => true, 'message' => 'Usuario premium');
        } else {
            // Construir la respuesta de error
            $response = array('success' => false, 'message' => 'No se pudo cambiar la suscripción del usuario');
        }
    } catch (\Throwable $th) {
        // Construir la respuesta de error en caso de excepción
        $response = array('success' => false, 'message' => 'Error al ejecutar activar usuario: ' . $th->getMessage());
    }

    // Enviar la respuesta al frontend en formato JSON
    echo json_encode($response);
}
if (isset($_POST['action']) && $_POST['action'] == 'desactivarusuario') {
    $idusuario = $_POST['iduser'];
    try {
        // Actualizar el estado del curso
        $activar = $actions->updateData('usuarios', 'is_premium="0"', 'id', $idusuario);

        // Comprobar si se ha actualizado correctamente
        if ($activar) {
            // Construir la respuesta exitosa
            $response = array('success' => true, 'message' => 'Estado del usuario Free');
        } else {
            // Construir la respuesta de error
            $response = array('success' => false, 'message' => 'No se pudo cambiar de suscripción al usuario');
        }
    } catch (\Throwable $th) {
        // Construir la respuesta de error en caso de excepción
        $response = array('success' => false, 'message' => 'Error al ejecutar activar curso: ' . $th->getMessage());
    }

    // Enviar la respuesta al frontend en formato JSON
    echo json_encode($response);
}