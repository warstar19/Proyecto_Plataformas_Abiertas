<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'views/navbar.php'; ?>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Lista de Usuarios</h3>
        <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/agregar"
            class="btn btn-primary mb-3">Agregar Nuevo Usuario</a>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['identificacion']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['apellido1']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['apellido2']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['correo']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['perfil']); ?></td>
                        <td>
                            <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/editar?id=<?php echo htmlspecialchars($usuario['identificacion']); ?>"
                                class="btn btn-warning btn-sm">Editar</a>
                            <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/eliminar?id=<?php echo htmlspecialchars($usuario['identificacion']); ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>