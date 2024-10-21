<?php
// app/models/Role.php
class Role {
    private $conn;
    private $table = 'roles';

    public $id;
    public $nombre;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todos los roles
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Obtener un rol por ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo rol
    public function create() {
        $query = "INSERT INTO " . $this->table . " (nombre) VALUES (:nombre)";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));

        $stmt->bindParam(':nombre', $this->nombre);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Actualizar un rol existente
    public function update($id) {
        $query = "UPDATE " . $this->table . " SET nombre = :nombre WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar un rol
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>