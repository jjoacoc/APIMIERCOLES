<?php
// app/controllers/UserController.php


include_once '../models/User.php';
include_once '../core/Database.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    // Obtener todos los Usuarios
    public function getAll() {
        $stmt = $this->user->getAll();
        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($usuario);
    }

    // Obtener un Usuario por ID
    public function getById($id) {
        $user = $this->user->getById($id);
        return json_encode($user);
    }

    // Crear un nuevo Usuario
    public function create($data) {
        $this->user->nombre = $data->nombre;
        $this->user->email = $data->email;
        $this->user->pass = $data->pass;
        if ($this->user->create()) {
            return json_encode(["message" => "Usuario creado con éxito"]);
        }
        return json_encode(["message" => "Error al crear el Usuario"]);
    }

    // Actualizar un Usuario
    public function update($id, $data) {
        $this->user->nombre = $data->nombre;
        $this->user->email = $data->email;
        $this->user->pass = $data->pass;
        if ($this->user->update($id)) {
            return json_encode(["message" => "Usuario actualizado con éxito"]);
        }
        return json_encode(["message" => "Error al actualizar el Usuario"]);
    }

    // Eliminar un Usuario
    public function delete($id) {
        if ($this->user->delete($id)) {
            return json_encode(["message" => "Usuario eliminado con éxito"]);
        }
        return json_encode(["message" => "Error al eliminar el Usuario"]);
    }
}
?>