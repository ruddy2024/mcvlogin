<?php
// Definir la clase Usuario
class Usuario {
    private $db; // Variable para la conexión a la base de datos

    // Constructor de la clase
    public function __construct($db) {
        $this->db = $db; // Asignar la conexión a la base de datos a la variable $db
    }

    // Método para buscar un usuario por su correo electrónico
    public function findUserByEmail($email) {
        // Preparar la consulta SQL utilizando un prepared statement para prevenir inyecciones SQL
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email); // Asociar el parámetro de la consulta con el correo electrónico proporcionado
        $stmt->execute(); // Ejecutar la consulta SQL
        $result = $stmt->get_result(); // Obtener el resultado de la consulta
        return $result->fetch_assoc(); // Devolver el resultado de la consulta
    }

    // Método para crear un nuevo usuario
    public function createUser($email, $password) {
        // Hash de la contraseña utilizando password_hash() para almacenarla de forma segura
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Preparar la consulta SQL utilizando un prepared statement para prevenir inyecciones SQL
        $stmt = $this->db->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashed_password); // Asociar los parámetros de la consulta con el correo electrónico y la contraseña hasheada
        $stmt->execute(); // Ejecutar la consulta SQL para crear un nuevo usuario
    }
}
?>