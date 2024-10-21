<?php
// db.php
// private $host = "172.16.20.30";
//     private $db_name = "Investigacion_miercoles";
//     private $username = "desarrollo";
//     private $password = "fisca1234";
//     private $conn;



$host = '172.16.20.30'; // Cambia esto según tu configuración
$db = 'Investigacion_miercoles'; // Cambia esto por tu base de datos
$user = 'desarrollo'; // Cambia esto por tu usuario de base de datos
$pass = 'fisca1234'; // Cambia esto por tu contraseña de base de datos

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>



