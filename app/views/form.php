<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="product-form">
        <input type="text" id="pro_nom" name="pro_nom" placeholder="Nombre del Producto">
        <textarea id="pro_desc" name="pro_desc" placeholder="Descripción del Producto"></textarea>
        <select id="cat_id" name="cat_id">
            <option value="">Seleccione una Categoría</option>
        </select>

        <button type="submit">Insertar Producto</button>
    </form>

    <!-- Incluir el script JavaScript -->
    <script src="js/form.js"></script>

</body>

</html>