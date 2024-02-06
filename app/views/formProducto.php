<!-- En /app/views/formProducto.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <h1>Create a Product</h1>
    <form id="product-form">
        <input type="text" id="pro_nom" name="pro_nom" placeholder="Nombre del Producto">
        <textarea id="pro_desc" name="pro_desc" placeholder="Descripción del Producto"></textarea>
        <select id="cat_id" name="cat_id">
            <option value="">Seleccione una Categoría</option>
        </select>

        <button type="submit">Insertar Producto</button>
    </form>

    <!-- Incluir el script JavaScript -->
    <script src="js/formProducto.js"></script>

</body>

</html>