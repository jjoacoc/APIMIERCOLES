<?php
// app/core/Router.php

include_once '../controllers/RoleController.php';
include_once '../views/View.php';

$controller = new RoleController();
$method = $_SERVER['REQUEST_METHOD'];

// Se inicializa una respuesta vacía para devolverla más tarde
$response = null;

// Controlador principal según el método HTTP
switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Obtener un solo rol por su ID
            $response = $controller->getById($_GET['id']);
        } else {
            // Obtener todos los roles
            $response = $controller->getAll();
        }
        View::render($result);

        break;

    case 'POST':
        // Leer los datos recibidos en formato JSON
        $data = json_decode(file_get_contents("php://input"));
        if ($data) {
            // Crear un nuevo rol
            $response = $controller->create($data);
        } else {
            $response = json_encode(['message' => 'Datos no válidos para la creación']);
        }
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            // Leer los datos para actualizar
            $data = json_decode(file_get_contents("php://input"));
            if ($data) {
                // Actualizar un rol existente
                $response = $controller->update($_GET['id'], $data);
            } else {
                $response = json_encode(['message' => 'Datos no válidos para la actualización']);
            }
        } else {
            $response = json_encode(['message' => 'ID no proporcionado para la actualización']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            // Eliminar un rol por su ID
            $response = $controller->delete($_GET['id']);
        } else {
            $response = json_encode(['message' => 'ID no proporcionado para la eliminación']);
        }
        break;

    default:
        // Si el método no está permitido
        $response = json_encode(['message' => 'Método no permitido']);
        break;
}

// Devolver la respuesta utilizando la clase View para renderizar en formato JSON
View::render($response);

?>
