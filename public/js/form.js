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
            window.location.href = '/';
        }

        const result = await response.json();
        console.log('Producto añadido:', result);
        // Aquí puedes agregar lógica adicional para actualizar la vista o mostrar un mensaje de éxito.
    } catch (error) {
        console.error('Error al añadir el producto:', error);
    }
});
