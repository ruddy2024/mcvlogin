<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuarios</title>
    <!-- Incluir el archivo de estilos CSS -->
    <link rel="stylesheet" type="text/css" href="styles.css"> 
</head>
<body>
    <div class="container">
        <!-- Título del formulario -->
        <h2>Registro de Usuarios</h2>
        <!-- Formulario de registro de usuarios -->
        <form action="../controller/UsuarioController.php" method="post">
            <!-- Campo oculto para enviar la acción de registro al controlador -->
            <input type="hidden" name="action" value="registrar">
            <!-- Campo de entrada para el correo electrónico del usuario -->
            <input type="email" name="email" placeholder="Email" required><br><br>
            <!-- Campo de entrada para la contraseña del usuario -->
            <input type="password" name="password" placeholder="Contraseña" required><br><br>
            <!-- Campo de entrada para confirmar la contraseña del usuario -->
            <input type="password" name="confirm_password" placeholder="Confirmar Contraseña" required><br><br>
            <!-- Botón para enviar el formulario y registrarse -->
            <button type="submit">Registrarse</button><br><br>
            <!-- Enlace para redirigir al usuario a la página de inicio de sesión -->
            <a href="login.php">¿Ya tienes una cuenta? Inicia sesión aquí</a>
        </form>
    </div>
</body>
</html>