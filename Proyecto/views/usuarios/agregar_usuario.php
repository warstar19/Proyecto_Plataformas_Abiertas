<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'views/navbar.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Agregar Nuevo Usuario</h2>
                <form action="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/insertar" method="POST">
                    <div class="form-group">
                        <label for="identificacion">Identificación</label>
                        <input type="text" id="identificacion" name="identificacion" class="form-control"
                            placeholder="ID del usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido1">Primer Apellido</label>
                        <input type="text" id="apellido1" name="apellido1" class="form-control"
                            placeholder="Primer Apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido2">Segundo Apellido</label>
                        <input type="text" id="apellido2" name="apellido2" class="form-control"
                            placeholder="Segundo Apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" class="form-control"
                            placeholder="Correo Electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="perfil">Perfil</label>
                        <input type="text" id="perfil" name="perfil" class="form-control" placeholder="Perfil" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" id="contrasena" name="contrasena" class="form-control"
                            placeholder="Contraseña" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Agregar Usuario</button>
                        <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios"
                            class="btn btn-secondary ml-2">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>