<?php
// Incluir el archivo de conexión a la base de datos
require_once('../../core/conexion.php');

// Definir la clase UsuarioModel
class UsuarioModel {
    // Método para iniciar sesión de usuario
    public function login($email, $password) {
        global $conexion; // Acceder a la variable de conexión global
        $sql = "SELECT * FROM usuarios WHERE email=:email"; // Consulta SQL para buscar al usuario por email
        $stmt = $conexion->prepare($sql); // Preparar la consulta SQL
        $stmt->bindParam(':email', $email); // Asociar el parámetro :email con la variable $email
        $stmt->execute(); // Ejecutar la consulta SQL
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el usuario de la base de datos

        // Verificar si se encontró al usuario y si la contraseña coincide utilizando password_verify()
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Devolver el usuario si la contraseña coincide
        } else {
            return false; // Devolver false si no se encontró al usuario o la contraseña no coincide
        }
    }

    // Método para registrar un nuevo usuario
    public function registrar($email, $password) {
        global $conexion; // Acceder a la variable de conexión global
        // Hash de la contraseña utilizando password_hash()
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)"; // Consulta SQL para insertar un nuevo usuario
        $stmt = $conexion->prepare($sql); // Preparar la consulta SQL
        $stmt->bindParam(':email', $email); // Asociar el parámetro :email con la variable $email
        $stmt->bindParam(':password', $hashed_password); // Asociar el parámetro :password con el hash de la contraseña
        return $stmt->execute(); // Ejecutar la consulta SQL y devolver true si se ejecuta correctamente, o false si hay algún error
    }
}
?>