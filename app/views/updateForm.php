<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Update Product</h1>
    <form id="edit-product-form">
        <input type="hidden" id="id_producto" name="pro_id">

        <label for="nombre_producto">Nombre:</label>
        <input type="text" id="nombre_producto" name="pro_nom" required>

        <label for="descripcion_producto">Descripción:</label>
        <textarea id="descripcion_producto" name="pro_desc" required></textarea>

        <label for="categoria_producto">Categoría ID:</label>
        <select id="categoria_producto" name="cat_id">
            <option value="">Seleccione una Categoría</option>
        </select>

        <button type="submit">Actualizar Producto</button>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const productArray = JSON.parse(localStorage.getItem('productData'));
            const product = productArray[0];
            if (product) {

                // Rellenando el formulario con los datos del producto
                document.getElementById('id_producto').value = product.pro_id;
                document.getElementById('nombre_producto').value = product.pro_nom;
                document.getElementById('descripcion_producto').value = product.pro_desc;
                document.getElementById('categoria_producto').value = product.cat_id;

                // Opcional: Limpiar localStorage
                localStorage.removeItem('productData');
            }
        });
    </script>
    <script src="js/updateForm.js"></script>
</body>

</html>