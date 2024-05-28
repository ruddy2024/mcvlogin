<?php
// Incluir el archivo de configuración para obtener las variables de conexión a la base de datos
require_once('../config/config.php');

try {
    // Intentar establecer una conexión con la base de datos utilizando PDO
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $username, $password);
} catch (PDOException $e) {
    // Si se produce un error al intentar establecer la conexión, mostrar un mensaje de error
    echo "Error en la conexión: " . $e->getMessage();
}
?>