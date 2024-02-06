/* En public/js/formProducto.js */

/**
 * Carga las categorías desde la API y las añade al elemento select del formulario.
 * @async
 * @function loadCategories
 */
function loadCategories() {
    $.ajax({
        url: '/api/categorias', // Ajusta esta URL a tu endpoint correcto.
        method: 'GET',
        dataType: 'json', // Espera una respuesta en formato JSON
        success: function(categories) {
            // Rellena el elemento select con las categorías obtenidas
            const select = $('#cat_id'); // Selecciona el elemento con jQuery
            $.each(categories, function(index, category) {
                select.append($('<option>', {
                    value: category.cat_id, // Asume que cada categoría tiene una propiedad 'cat_id'
                    text: category.cat_nom // Asume que cada categoría tiene una propiedad 'cat_nom' para el nombre
                }));
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error al cargar las categorías:', textStatus, errorThrown);
        }
    });
}


/**
 * Maneja el evento de envío del formulario de productos, enviando los datos del producto a la API.
 * @async
 * @function
 */
 document.getElementById('product-form').addEventListener('submit', async function (event) {
    event.preventDefault(); // Previene el comportamiento de envío predeterminado del formulario.
    
    // Recopila los datos del formulario.
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());

    try {
        // Envía los datos del producto a la API para crear un nuevo producto.
        const response = await fetch('/api/addProduct', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        } else {
            // Redirige al usuario a la página de gestión de productos después de un éxito.
            window.location.href = '/manage-products';
        }

        const result = await response.json();
        console.log('Producto añadido:', result);
        // Opcional: Aquí puedes agregar lógica adicional para actualizar la vista o mostrar un mensaje de éxito.
    } catch (error) {
        console.error('Error al añadir el producto:', error);
    }
});

// Cargar las categorías cuando el script se ejecute.
loadCategories();
