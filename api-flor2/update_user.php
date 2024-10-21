<?php
require 'db.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $id = $data['id'];
    $nombre = $data['nombre'];
    $email = $data['email'];

    $sql = "UPDATE usuarios SET nombre = :nombre, email = :email WHERE id = :id";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([':nombre' => $nombre, ':email' => $email, ':id' => $id])) {
        echo json_encode(['message' => 'Usuario actualizado exitosamente']);
    } else {
        echo json_encode(['error' => 'Error al actualizar usuario']);
    }
}
?>
