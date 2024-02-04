document.getElementById('edit-categoria-form').addEventListener('submit', async function (event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    try {
        const response = await fetch('/api/updateCategoria', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        } else {
            window.location.href = '/manage-categories';
        }

        const result = await response.json();
        console.log('Categoria actualizada:', result);
        // Aquí puedes agregar lógica adicional para actualizar la vista o mostrar un mensaje de éxito.
    } catch (error) {
        console.error('Error al actualizar la categoria:', error);
    }
});