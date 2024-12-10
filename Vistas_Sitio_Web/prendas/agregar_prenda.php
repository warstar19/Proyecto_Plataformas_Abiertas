<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Prenda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include __DIR__ . '/../../Vistas_Sitio_Web/navbar.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Agregar Nueva Prenda</h2>
                <form id="form-agregar-prenda">
                    <div class="form-group">
                        <label for="prenda_id">ID de la Prenda</label>
                        <input type="text" id="prenda_id" name="prenda_id" class="form-control"
                            placeholder="ID de la Prenda" required>
                    </div>
                    <div class="form-group">
                        <label for="marca_id">ID de la Marca</label>
                        <input type="text" id="marca_id" name="marca_id" class="form-control"
                            placeholder="ID de la Marca" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_prenda">Nombre de la Prenda</label>
                        <input type="text" id="nombre_prenda" name="nombre_prenda" class="form-control"
                            placeholder="Nombre de la Prenda" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" id="precio" name="precio" class="form-control" min="0" step="0.01"
                            placeholder="Precio de la Prenda" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Cantidad en Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control" min="0"
                            placeholder="Cantidad en Stock" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" id="btn-agregar" class="btn btn-primary">Agregar Prenda</button>
                        <a href="/Proyecto_Plataformas_Abiertas/Vistas_Sitio_Web/prendas/lista_prendas.php"
                            class="btn btn-secondary ml-2">Regresar</a>
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
            const prenda_id = document.getElementById('prenda_id').value.trim();
            const marca_id = document.getElementById('marca_id').value.trim();
            const nombre_prenda = document.getElementById('nombre_prenda').value.trim();
            const precio = document.getElementById('precio').value.trim();
            const stock = document.getElementById('stock').value.trim();

            if (!prenda_id || !marca_id || !nombre_prenda || !precio || !stock) {
                alert("Todos los campos son requeridos.");
                return;
            }

            // Mostrar spinner de carga
            document.getElementById('loading').classList.remove('d-none');

            // Crear objeto de datos para enviar
            const formData = new FormData(document.getElementById('form-agregar-prenda'));
            const data = Object.fromEntries(formData.entries());

            fetch('/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas/insertar', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(result => {
                    const mensajeDiv = document.getElementById('mensaje');
                    if (result.status === 'success') {
                        mensajeDiv.innerHTML = `<div class="alert alert-success">${result.message}</div>`;
                        // Redirigir a la lista de prendas después de agregar
                        setTimeout(() => {
                            window.location.href = "/Proyecto_Plataformas_Abiertas/Vistas_Sitio_Web/prendas/lista_prendas.php";
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
