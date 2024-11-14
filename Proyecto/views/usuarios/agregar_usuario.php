<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'views/navbar.php'; ?>
    <div class="container">
        <h2>Usuarios</h2>
        <form action="../controllers/UsuarioController.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Primer Apellido" required>
            <input type="text" name="apellido2" placeholder="Segundo Apellido" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="perfil" placeholder="Digite Perfil" required>
            <input type="text" name="contrasena" placeholder="Contraseña" required>
            <button type="submit" class="btn btn-primary">Agregar Usuario</button>
            <a href="index.php" class="btn btn-secondary">Regresar</a>
        </form>   
    </div>
</body>
</html>
