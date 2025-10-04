<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <?php
    require 'conexion.php';

    // Traer provincias
    $result = $conn->query("SELECT id, nombre FROM provincias");
    ?>

    <h2>Formulario de Registro</h2>
    <form action="print.php" method="post">
        <div>
            <label>Nombre:</label> <br><br>
            <input type="text" name="nombre" required> <br><br>
        </div>

        <div>
            <label>Apellidos:</label> <br><br>
            <input type="text" name="apellidos" required> <br><br>
        </div>

        <div>
            <label>Provincia:</label> <br><br>
            <select name="provincia" required> 
                <option value="">Seleccione...</option> 
                <?php while($row = $result->fetch_assoc()) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>
                <?php } ?>
            </select> <br><br>
        </div>

        <div>
            <label>Contraseña:</label> <br><br>
            <input type="password" name="password" required> <br><br>
        </div>

        <button type="submit">Registrar</button><br>
    </form>

    <?php $conn->close(); ?>
</body>
</html>
