<?php
// Validar que la variable $usuarioData existe
if (!isset($usuarioData)) {
    echo "Error: No se pudieron cargar los datos del usuario.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include __DIR__ . '/../../Vistas_Sitio_Web/navbar.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Editar Usuario</h2>
                <form action="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/actualizar" method="POST">
                    <input type="hidden" name="identificacion" value="<?= htmlspecialchars($usuarioData['identificacion']) ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control"
                            value="<?= htmlspecialchars($usuarioData['nombre']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido1">Primer Apellido</label>
                        <input type="text" id="apellido1" name="apellido1" class="form-control"
                            value="<?= htmlspecialchars($usuarioData['apellido1']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido2">Segundo Apellido</label>
                        <input type="text" id="apellido2" name="apellido2" class="form-control"
                            value="<?= htmlspecialchars($usuarioData['apellido2']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" class="form-control"
                            value="<?= htmlspecialchars($usuarioData['correo']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="perfil">Perfil</label>
                        <input type="text" id="perfil" name="perfil" class="form-control"
                            value="<?= htmlspecialchars($usuarioData['perfil']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" id="contrasena" name="contrasena" class="form-control"
                            placeholder="Escribir nueva contraseña">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                        <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios" class="btn btn-secondary ml-2">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
