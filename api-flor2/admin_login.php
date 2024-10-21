<?php
require 'db.php'; // Incluye el archivo de conexión

header('Content-Type: application/json'); // Establece el tipo de contenido a JSON

$data = json_decode(file_get_contents('php://input')); // Obtiene los datos de la solicitud

$email = $data->email; // Extrae el nombre de usuario
$pass = $data->pass; // Extrae la contraseña

// Verifica las credenciales usando la tabla usuarios
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email AND pass = :pass"); // Cambia ' a 'nombre'
$stmt->execute(['email' => $email, 'pass' => $pass]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene el usuario

if ($usuario) {
    echo json_encode(['success' => true, 'usuario' => $usuario]); // Retorna éxito si se encuentra el usuario
} else {
    echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']); // Retorna error si no se encuentra
}
?>
