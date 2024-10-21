<?php
require 'db.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if ($data && isset($data['id'])) {
    $id = $data['id'];

    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([':id' => $id])) {
        echo json_encode(['message' => 'Usuario eliminado']);
    } else {
        echo json_encode(['error' => 'Error al eliminar usuario']);
    }
}
?>
