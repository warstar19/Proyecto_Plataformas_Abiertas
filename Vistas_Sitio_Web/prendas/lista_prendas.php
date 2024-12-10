<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Prendas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include __DIR__ . '/../../Vistas_Sitio_Web/navbar.php'; ?>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Lista de Prendas</h3>
        <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas/agregar"
            class="btn btn-primary mb-3">Agregar Nueva Prenda</a>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Prenda_id</th>
                    <th>Marca_id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="prendas-table-body">
                <!-- Aquí se cargarán las prendas -->
            </tbody>
        </table>
    </div>

    <script>
    // URL de la API
    const API_URL = "http://localhost/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas";

    // Función para cargar los usuarios
    function cargarPrendas() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', API_URL, true);
    

    xhr.onload = function() {
    console.log("Estado de la solicitud:", xhr.status);
    console.log("Respuesta recibida:", xhr.responseText); // Imprimir la respuesta
    if (xhr.status === 200) {
        try {
            const response = JSON.parse(xhr.responseText);

            const prendas = response.data; // Accede directamente a 'data'
            const tbody = document.getElementById('prendas-table-body');
            tbody.innerHTML = ''; // Limpiar la tabla

            // Iterar usuarios y agregar filas
            prendas.forEach(prenda => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${prenda.prenda_id}</td>
                    <td>${prenda.marca_id}</td>
                    <td>${prenda.nombre_prenda}</td>
                    <td>${prenda.precio}</td>
                    <td>${prenda.stock}</td>                    
                    <td>
                        <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas/editar?id=${prenda.prenda_id}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas/eliminar?id=${prenda.prenda_id}" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</a>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        } catch (error) {
            console.error('Error procesando la respuesta JSON:', error);
        }
    } else {
        console.error('Error al obtener prendas:', xhr.statusText);
    }
};


    xhr.onerror = function() {
        console.error('Error de red al intentar cargar prendas.');
    };

    xhr.send();
}
document.addEventListener('DOMContentLoaded', cargarPrendas);
</script>

</body>
</html>