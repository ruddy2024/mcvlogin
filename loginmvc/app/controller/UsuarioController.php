<?php
// Incluir el modelo UsuarioModel.php para acceder a las funciones relacionadas con el usuario
require_once('../model/UsuarioModel.php');

// Definir la clase UsuarioController para manejar las acciones relacionadas con el usuario
class UsuarioController {
    // Método para iniciar sesión de usuario
    public function login($email, $password) {
        // Crear una instancia del modelo UsuarioModel
        $model = new UsuarioModel();
        // Obtener el usuario de la base de datos utilizando el correo electrónico proporcionado
        $usuario = $model->getUserByEmail($email);
        // Verificar si se encontró un usuario y si la contraseña proporcionada es válida
        if ($usuario && password_verify($password, $usuario['password'])) {
            session_start(); // Iniciar sesión
            $_SESSION['usuario'] = $usuario; // Almacenar información del usuario en la sesión
            header("Location: ../view/bienvenido.php"); // Redirigir al usuario a la página de bienvenida
            exit(); // Finalizar el script para evitar que se ejecute más código
        } else {
            // Si el usuario no está registrado o la contraseña es incorrecta, mostrar un mensaje de error y redirigir al usuario a la página de inicio de sesión
            echo "Usuario no registrado o contraseña incorrecta";
            header("refresh:1;url=../view/login.php");
        }
    }

    // Método para registrar un nuevo usuario
    public function registrar($email, $password, $confirm_password) {
        // Verificar si las contraseñas coinciden
        if ($password != $confirm_password) {
            echo "Las contraseñas no coinciden.";
            header("refresh:1;url=../view/registro.php");
            exit();
        }
        // Crear una instancia del modelo UsuarioModel
        $model = new UsuarioModel();
        // Hash de la contraseña utilizando password_hash() para almacenarla de forma segura
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Intentar registrar un nuevo usuario con el correo electrónico y la contraseña hasheada proporcionados
        if ($model->registrar($email, $hashed_password)) {
            // Si el registro es exitoso, mostrar un mensaje de éxito y redirigir al usuario a la página de inicio de sesión
            echo "Usuario registrado exitosamente.";
            header("refresh:1;url=../view/login.php");
        } else {
            // Si hay un error al registrar el usuario, mostrar un mensaje de error
            echo "Error al registrar usuario.";
        }
    }
}

session_start(); // Iniciar sesión

// Verificar si se envió una acción a través del método POST
if (isset($_POST['action'])) {
    require_once('UsuarioController.php'); // Incluir el controlador UsuarioController.php
    $controller = new UsuarioController(); // Crear una instancia del controlador UsuarioController

    // Ejecutar el método correspondiente según la acción proporcionada
    if ($_POST['action'] === 'login') {
        $controller->login($_POST['email'], $_POST['password']); // Iniciar sesión
    } elseif ($_POST['action'] === 'registrar') {
        $controller->registrar($_POST['email'], $_POST['password'], $_POST['confirm_password']); // Registrar un nuevo usuario
    }
}
?>