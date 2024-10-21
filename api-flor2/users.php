<?php
require 'db.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM usuarios";
$stmt = $conn->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($users);
?>
