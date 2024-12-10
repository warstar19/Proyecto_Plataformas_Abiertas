<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include __DIR__ . '/../../Vistas_Sitio_Web/navbar.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Agregar Nuevo Usuario</h2>
                <form id="form-agregar-usuario">
                    <div class="form-group">
                        <label for="identificacion">Identificación</label>
                        <input type="text" id="identificacion" name="identificacion" class="form-control" placeholder="ID del usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido1">Primer Apellido</label>
                        <input type="text" id="apellido1" name="apellido1" class="form-control" placeholder="Primer Apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido2">Segundo Apellido</label>
                        <input type="text" id="apellido2" name="apellido2" class="form-control" placeholder="Segundo Apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo Electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="perfil">Perfil</label>
                        <input type="text" id="perfil" name="perfil" class="form-control" placeholder="Perfil" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" id="btn-agregar" class="btn btn-primary">Agregar Usuario</button>
                        <a href="/Proyecto_Plataformas_Abiertas/Vistas_Sitio_Web/usuarios/lista_usuarios.php" class="btn btn-secondary ml-2">Regresar</a>
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

    <script>
        document.getElementById('btn-agregar').addEventListener('click', function () {
            // Validación simple de campos antes de enviar
            const identificacion = document.getElementById('identificacion').value.trim();
            const nombre = document.getElementById('nombre').value.trim();
            const apellido1 = document.getElementById('apellido1').value.trim();
            const apellido2 = document.getElementById('apellido2').value.trim();
            const correo = document.getElementById('correo').value.trim();
            const perfil = document.getElementById('perfil').value.trim();
            const contrasena = document.getElementById('contrasena').value.trim();

            if (!identificacion || !nombre || !apellido1 || !apellido2 || !correo || !perfil || !contrasena) {
                alert("Todos los campos son requeridos.");
                return;
            }

            // Mostrar spinner de carga
            document.getElementById('loading').classList.remove('d-none');

            // Crear objeto de datos para enviar
            const formData = new FormData(document.getElementById('form-agregar-usuario'));
            const data = Object.fromEntries(formData.entries());

            fetch('/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/insertar', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(result => {
                const mensajeDiv = document.getElementById('mensaje');
                if (result.status === 'success') {
                    mensajeDiv.innerHTML = `<div class="alert alert-success">${result.message}</div>`;
                    // Redirigir a la lista de usuarios después de agregar
                    setTimeout(() => {
                        window.location.href = "/Proyecto_Plataformas_Abiertas/Vistas_Sitio_Web/usuarios/lista_usuarios.php";
                    }, 2000); // Esperar 2 segundos antes de redirigir
                } else {
                    mensajeDiv.innerHTML = `<div class="alert alert-danger">${result.message || 'Ocurrió un error'}</div>`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('mensaje').innerHTML = `<div class="alert alert-danger">Error en la solicitud</div>`;
            })
            .finally(() => {
                // Ocultar spinner de carga
                document.getElementById('loading').classList.add('d-none');
            });
        });
    </script>
</body>

</html>
