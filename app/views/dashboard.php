<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- dashboard.php -->
    <a href="/create">Insertar un producto</a>
    <div id="productos-container">
        <?php if (!empty($latestProducts)) : ?>
            <?php foreach ($latestProducts as $producto) : ?>
                <div>
                    <!-- Asegúrate de acceder a las propiedades del producto correctamente -->
                    Nombre: <?php echo htmlspecialchars($producto['pro_nom']); ?>
                    <!-- Agrega más detalles del producto según sea necesario -->
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No se encontraron productos.</p>
        <?php endif; ?>
    </div>

</body>

</html>