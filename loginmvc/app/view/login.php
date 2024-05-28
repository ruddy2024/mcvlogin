<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <!-- Incluir el archivo de estilos CSS -->
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
</head>
<body>
    <div class="container">
        <!-- Título del formulario -->
        <h2>Iniciar Sesión</h2>
        <!-- Formulario de inicio de sesión -->
        <form>
            <!-- Campo de entrada para el correo electrónico del usuario -->
            <input type="email" name="email" placeholder="Email" required><br><br>
            <!-- Campo de entrada para la contraseña del usuario -->
            <input type="password" name="password" placeholder="Contraseña" required><br><br>
            <!-- Botón para enviar el formulario e iniciar sesión -->
            <button type="submit">Iniciar Sesión</button><br><br>
            <!-- Enlace para redirigir al usuario a la página de registro -->
            <a href="registro.php">¿No tienes una cuenta? Regístrate aquí</a>
        </form>
    </div>
</body>
</html>