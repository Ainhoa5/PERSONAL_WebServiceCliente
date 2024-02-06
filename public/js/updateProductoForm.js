/* En public/js/updateProductoForm.js */

/**
 * Carga y muestra las categorías disponibles en el formulario de edición de producto.
 * Realiza una solicitud jQuery.ajax a la API para obtener todas las categorías y las añade al elemento select.
 * @async
 * @function loadCategories
 */
function loadCategories() {
    $.ajax({
        url: '/api/categorias', // Ajusta esta URL a tu endpoint correcto.
        method: 'GET',
        dataType: 'json', // Indica que esperamos una respuesta en formato JSON.
        success: function (categories) {
            // Encuentra el elemento select y rellénalo con las opciones de categoría.
            const select = $('#categoria_producto'); // Usamos jQuery para seleccionar el elemento.
            select.empty(); // Limpiamos el select antes de añadir nuevas opciones para evitar duplicados.

            categories.forEach(category => {
                // Crea y añade cada opción al select usando jQuery.
                select.append($('<option>', {
                    value: category.cat_id,
                    text: category.cat_nom
                }));
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error al cargar las categorías:', textStatus, errorThrown);
        }
    });
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