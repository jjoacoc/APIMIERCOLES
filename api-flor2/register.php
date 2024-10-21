<?php
require 'db.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $nombre = $data['nombre'];
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
