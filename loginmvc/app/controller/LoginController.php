<?php
    // Definir la clase LoginController en el archivo LoginController.php
    // Esta clase maneja la lógica de inicio de sesión
    class LoginController {
        private $usuarioModel; // Variable para almacenar el modelo de usuario

        // Constructor de la clase LoginController
        // Recibe una instancia del modelo de usuario como parámetro
        public function __construct($usuarioModel) {
            $this->usuarioModel = $usuarioModel; // Asignar el modelo de usuario a la variable $usuarioModel
        }    

        // Método para iniciar sesión
        // Recibe el correo electrónico y la contraseña del usuario como parámetros
        public function login($email, $password) {
            // Buscar al usuario por su correo electrónico utilizando el modelo de usuario
            $user = $this->usuarioModel->findUserByEmail($email);
            
            // Verificar si se encontró al usuario y si la contraseña proporcionada es válida
            if ($user && password_verify($password, $user['password'])) {
                // Si las credenciales son válidas, iniciar sesión y redirigir al usuario a la página de inicio
                header("Location: /modulos/productos/index.php");
                exit(); // Terminar el script para evitar ejecución adicional
            } else {
                // Si las credenciales son inválidas, mostrar un mensaje de error y redirigir al usuario a la página de inicio de sesión
                echo "Credenciales inválidas.";
                header("refresh:1;url=/login.php");
                exit(); // Terminar el script para evitar ejecución adicional
            }
        }
    }
?>