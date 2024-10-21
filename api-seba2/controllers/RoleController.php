<?php
// app/controllers/RoleController.php
include_once '../models/Role.php';
include_once '../core/Database.php';

class RoleController {
    private $db;
    private $role;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->role = new Role($this->db);
    }

    // Obtener todos los roles
    public function getAll() {
        $stmt = $this->role->getAll();
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($roles);
    }

    // Obtener un rol por ID
    public function getById($id) {
        $role = $this->role->getById($id);
        return json_encode($role);
    }

    // Crear un nuevo rol
    public function create($data) {
        $this->role->nombre = $data->nombre;
        if ($this->role->create()) {
            return json_encode(["message" => "Rol creado con éxito"]);
        }
        return json_encode(["message" => "Error al crear el rol"]);
    }

    // Actualizar un rol existente
    public function update($id, $data) {
        $this->role->nombre = $data->nombre;
        if ($this->role->update($id)) {
            return json_encode(["message" => "Rol actualizado con éxito"]);
        }
        return json_encode(["message" => "Error al actualizar el rol"]);
    }

    // Eliminar un rol
    public function delete($id) {
        if ($this->role->delete($id)) {
            return json_encode(["message" => "Rol eliminado con éxito"]);
        }
        return json_encode(["message" => "Error al eliminar el rol"]);
    }
}

?>