<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include __DIR__ . '/../../Vistas_Sitio_Web/navbar.php'; ?>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Lista de Usuarios</h3>
        <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/agregar"
            class="btn btn-primary mb-3">Agregar Nuevo Usuario</a>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Identificación</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="user-table-body">
                <!-- Aquí se cargarán los usuarios -->
            </tbody>
        </table>
    </div>

    <script>
    // URL de la API
    const API_URL = "http://localhost/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios";

    // Función para cargar los usuarios
    function cargarUsuarios() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', API_URL, true);
    

    xhr.onload = function() {
    console.log("Estado de la solicitud:", xhr.status);
    console.log("Respuesta recibida:", xhr.responseText); // Imprimir la respuesta
    if (xhr.status === 200) {
        try {
            const response = JSON.parse(xhr.responseText);

            const usuarios = response.data; // Accede directamente a 'data'
            const tbody = document.getElementById('user-table-body');
            tbody.innerHTML = ''; // Limpiar la tabla

            // Iterar usuarios y agregar filas
            usuarios.forEach(usuario => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${usuario.identificacion}</td>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.apellido1}</td>
                    <td>${usuario.apellido2}</td>
                    <td>${usuario.correo}</td>
                    <td>${usuario.perfil}</td>
                    <td>
                        <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/editar?id=${usuario.identificacion}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/eliminar?id=${usuario.identificacion}" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</a>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        } catch (error) {
            console.error('Error procesando la respuesta JSON:', error);
        }
    } else {
        console.error('Error al obtener usuarios:', xhr.statusText);
    }
};


    xhr.onerror = function() {
        console.error('Error de red al intentar cargar usuarios.');
    };

    xhr.send();
}
document.addEventListener('DOMContentLoaded', cargarUsuarios);
</script>
</body>
</html>
