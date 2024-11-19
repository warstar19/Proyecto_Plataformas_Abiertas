<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Prendas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'views/navbar.php'; ?>
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
            <tbody>
                <?php foreach ($prendas as $prenda): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($prenda['prenda_id']); ?></td>
                        <td><?php echo htmlspecialchars($prenda['marca_id']);?></td>
                        <td><?php echo htmlspecialchars($prenda['nombre_prenda']);?></td>
                        <td><?php echo htmlspecialchars($prenda['precio']);?></td>
                        <td><?php echo htmlspecialchars($prenda['stock']);?></td>                 
                        <td>
                            <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas/editar?id=<?php echo htmlspecialchars($prenda['prenda_id']); ?>"
                                class="btn btn-warning btn-sm">Editar</a>
                            <a href="/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas/eliminar?id=<?php echo htmlspecialchars($prenda['prenda_id']); ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta prenda?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>