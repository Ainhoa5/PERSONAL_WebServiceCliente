loadCategories();
async function loadCategories() {
    try {
        const response = await fetch('/api/categorias'); // Ajusta esta URL a tu endpoint correcto
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const categories = await response.json();
        console.log(categories);
        // Rellenar el select con las categorías obtenidas
        const select = document.getElementById('cat_id');
        categories.forEach(category => {
            const option = document.createElement('option');
            option.value = category.cat_id; // Asume que cada categoría tiene una propiedad 'cat_id'
            option.textContent = category.cat_nom; // Asume que cada categoría tiene una propiedad 'cat_nom' para el nombre
            select.appendChild(option);
        });
    } catch (error) {
        console.error('Error al cargar las categorías:', error);
    }
}

document.getElementById('product-form').addEventListener('submit', async function (event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    console.log(data);
    try {
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
            window.location.href = '/manage-products';
        }

        const result = await response.json();
        console.log('Producto añadido:', result);
        // Aquí puedes agregar lógica adicional para actualizar la vista o mostrar un mensaje de éxito.
    } catch (error) {
        console.error('Error al añadir el producto:', error);
    }
});
