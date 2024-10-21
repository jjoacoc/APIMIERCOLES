<?php
require 'db.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $email = $data['email'];
    $pass = $data['pass'];

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($pass, $user['pass'])) {
        echo json_encode(['message' => 'Inicio de sesión exitoso', 'user' => $user]);
    } else {
        echo json_encode(['error' => 'Credenciales incorrectas']);
    }
}
?>
