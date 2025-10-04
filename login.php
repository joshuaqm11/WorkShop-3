<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login_procesar.php" method="post">
        <div>
            <label>Username:</label>
            <input type="text" name="username" 
                   value="<?= htmlspecialchars($_GET['username'] ?? '') ?>" 
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
