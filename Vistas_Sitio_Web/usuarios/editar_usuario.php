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
                <form id="form-editar-usuario">
                    <input type="hidden" id="identificacion" name="identificacion" 
                        value="<?= htmlspecialchars($usuarioData['identificacion']) ?>">

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
                            placeholder="Nueva contraseña (opcional)">
                    </div>

                    <div class="form-group text-center">
                        <button type="button" id="btn-actualizar" class="btn btn-primary">Actualizar Usuario</button>
                        <a href="/Proyecto_Plataformas_Abiertas/Vistas_Sitio_Web/usuarios/lista_usuarios.php" 
                            class="btn btn-secondary ml-2">Cancelar</a>
                    </div>
                </form>

                <div id="mensaje" class="mt-3"></div>
                <div id="loading" class="d-none text-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript para el envío del formulario usando Fetch -->
    <script>
        document.getElementById('btn-actualizar').addEventListener('click', function () {
            const form = document.getElementById('form-editar-usuario');
            const formData = new FormData(form);

            // Mostrar spinner de carga
            document.getElementById('loading').classList.remove('d-none');
            document.getElementById('mensaje').innerHTML = "";

            // Enviar los datos al servidor
            fetch('/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/actualizar', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(result => {
                    const mensajeDiv = document.getElementById('mensaje');
                    if (result.status === 'success') {
                        mensajeDiv.innerHTML = `<div class="alert alert-success">${result.message}</div>`;
                        setTimeout(() => {
                            window.location.href = "/Proyecto_Plataformas_Abiertas/Vistas_Sitio_Web/usuarios/lista_usuarios.php";
                        }, 2000);
                    } else {
                        mensajeDiv.innerHTML = `<div class="alert alert-danger">${result.message}</div>`;
                    }
                })
                .catch(error => {
                    console.error('Error en la solicitud:', error);
                    document.getElementById('mensaje').innerHTML = `<div class="alert alert-danger">Error en la solicitud</div>`;
                })
                .finally(() => {
                    document.getElementById('loading').classList.add('d-none');
                });
        });
    </script>
</body>

</html>
