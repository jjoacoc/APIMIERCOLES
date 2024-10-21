<?php
// Conectar a la base de datos
require 'db.php'; // Asegúrate de que la conexión a la base de datos esté configurada correctamente

header('Content-Type: application/json'); // Establece el tipo de contenido a JSON

$query = "SELECT * FROM usuarios"; // Consulta para obtener todos los usuarios
$stmt = $conn->prepare($query); // Cambia $pdo por $conn
$stmt->execute();

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene todos los usuarios como un array asociativo

echo json_encode($usuarios); // Devuelve el resultado como JSON
?>
