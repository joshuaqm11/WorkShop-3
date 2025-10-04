<?php
require 'conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $mensaje = "Por favor complete todos los campos.";
    } else {
        $sql = "SELECT id, nombre, password FROM usuarios WHERE nombre = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $mensaje = "Usuario no encontrado.";
        } else {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $mensaje = "¡Éxito! Contraseña correcta. Bienvenido, " . htmlspecialchars($user['nombre']) . ".";
            } else {
                $mensaje = "Error: Contraseña incorrecta.";
            }
        }

        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if ($mensaje): ?>
        <p><?= $mensaje ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <div>
            <label>Username:</label>
            <input type="text" name="username" 
                   value="<?= htmlspecialchars($_POST['username'] ?? $_GET['username'] ?? '') ?>" 
                   required> <br><br>
        </div>

        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" required> <br><br>
        </div>

        <button type="submit">Ingresar</button>
    </form>
</body>
</html>


