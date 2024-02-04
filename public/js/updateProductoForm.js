/* En public/js/updateProductoForm.js */

/**
 * Carga y muestra las categorías disponibles en el formulario de edición de producto.
 * Realiza una solicitud fetch a la API para obtener todas las categorías y las añade al elemento select.
 * @async
 * @function loadCategories
 */
 async function loadCategories() {
    try {
        // Realiza la solicitud fetch para obtener las categorías.
        const response = await fetch('/api/categorias'); // Ajusta esta URL a tu endpoint correcto.
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const categories = await response.json();

        // Encuentra el elemento select y rellénalo con las opciones de categoría.
        const select = document.getElementById('categoria_producto');
        categories.forEach(category => {
            const option = document.createElement('option');
            option.value = category.cat_id;
            option.textContent = category.cat_nom;
            select.appendChild(option);
        });
    } catch (error) {
        console.error('Error al cargar las categorías:', error);
    }
}

/**
 * Maneja el evento de envío del formulario de edición de productos.
 * Intercepta el envío tradicional para enviar los datos actualizados mediante una solicitud fetch.
 * En caso de éxito, redirige al usuario a la página de gestión de productos.
 * @async
 * @function
 */
 document.getElementById('edit-product-form').addEventListener('submit', async function (event) {
    event.preventDefault(); // Previene el envío tradicional del formulario.

    // Recopila los datos del formulario.
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());

    try {
        // Envía la solicitud de actualización del producto a la API.
        const response = await fetch('/api/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        } else {
            // Redirige al usuario a la página de gestión de productos tras la actualización exitosa.
            window.location.href = '/manage-products';
        }

        // Opcional: Manejo de la respuesta para lógica adicional.
        const result = await response.json();
        console.log('Producto actualizado:', result);
    } catch (error) {
        console.error('Error al actualizar el producto:', error);
    }
});

// Carga las categorías cuando el script se ejecuta.
loadCategories();