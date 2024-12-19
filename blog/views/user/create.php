<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form method="POST" action="../../index.php">
        <input type="text" name="name" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Correo" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <select name="role">
            <option value="Admin">Admin</option>
            <option value="Writer">Escritor</option>
            <option value="Subscriber">Suscriptor</option>
        </select>
        <button type="submit">Crear</button>
    </form>
</body>
</html>
