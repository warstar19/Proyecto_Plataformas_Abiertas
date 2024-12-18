<?php
// Validar que la variable $prendaData existe
if (!isset($prendaData)) {
    echo "Error: No se pudieron cargar los datos del usuario.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Prenda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include __DIR__ . '/../../Vistas_Sitio_Web/navbar.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Editar Prenda</h2>
                <form id="editarPrendaForm">
                    <input type="hidden" name="prenda_id" value="<?= htmlspecialchars($prendaData['prenda_id']) ?>">
                    <div class="form-group">
                        <label for="marca_id">Marca_id</label>
                        <input type="text" id="marca_id" name="marca_id" class="form-control"
                            value="<?= htmlspecialchars($prendaData['marca_id']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_prenda">Nombre de la Prenda</label>
                        <input type="text" id="nombre_prenda" name="nombre_prenda" class="form-control"
                            value="<?= htmlspecialchars($prendaData['nombre_prenda']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" id="precio" name="precio" class="form-control"
                            value="<?= htmlspecialchars($prendaData['precio']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control"
                            value="<?= htmlspecialchars($prendaData['stock']) ?>" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Actualizar Prenda</button>
                        <a href="/Proyecto_Plataformas_Abiertas/Vistas_Sitio_Web/prendas/lista_prendas.php"
                            class="btn btn-secondary ml-2">Cancelar</a>
                    </div>
                </form>
                <div id="mensaje"></div> <!-- Área para mostrar mensajes -->

            </div>
        </div>
    </div>

    <script>
        document.getElementById('editarPrendaForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Evita el envío tradicional del formulario

            const formData = new FormData(this); // Captura los datos del formulario

            fetch('/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas/actualizar', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud al servidor');
                    }
                    return response.json(); // Convertir la respuesta a JSON
                })
                .then(data => {
                    const mensajeDiv = document.getElementById('mensaje');
                    if (data.status === 'success') {
                        mensajeDiv.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                        setTimeout(() => {
                            window.location.href = "/Proyecto_Plataformas_Abiertas/Vistas_Sitio_Web/prendas/lista_prendas.php";
                        }, 2000); // Redirige después de 2 segundos
                    } else {
                        mensajeDiv.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    document.getElementById('mensaje').innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
                });
        });
    </script>

</body>
</html>