<?php
require 'db.php';

header('Content-Type: application/json');

// Aquí puedes implementar lógica para verificar si la solicitud proviene de un administrador
// Por ejemplo, puedes validar una sesión o un token

session_start();

// Solo permitir la creación de usuarios si el administrador está autenticado
// if (!isset($_SESSION['admin_id'])) {
//     echo json_encode(['error' => 'Acceso no autorizado']);
//     exit;
// }

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $nombre = $data[''];
    $pass = password_hash($data['pass'], PASSWORD_BCRYPT);
    $email = $data['email'];

    $sql = "INSERT INTO usuarios (nombre, pass, email) VALUES (:nombre, :pass, :email)";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([':nombre' => $nombre, ':pass' => $pass, ':email' => $email])) {
        echo json_encode(['message' => 'Usuario registrado exitosamente']);
    } else {
        echo json_encode(['error' => 'Error al registrar usuario']);
    }
}
?>
