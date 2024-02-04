async function fetchProducts() {
    try {
        const response = await fetch('/api/products');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const products = await response.json();
        updateProductsView(products);
    } catch (error) {
        console.error('Error al realizar la solicitud:', error);
    }
}

function updateProductsView(products) {
    const container = document.getElementById('productos-container');
    container.innerHTML = ''; // Limpiar el contenido existente

    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.className = 'product-item'; // Added class for styling

        const productName = document.createElement('h3');
        const productDesc = document.createElement('p');
        const productCategory = document.createElement('p');
        const editButton = document.createElement('button');
        const deleteButton = document.createElement('button');
        const hiddenInput = document.createElement('input');

        productName.textContent = `Nombre: ${product.pro_nom}`;
        productDesc.textContent = `Descripción: ${product.pro_desc}`;
        productCategory.textContent = `Categoría ID: ${product.cat_id}`;

        // Configuring the hidden input
        hiddenInput.type = 'hidden';
        hiddenInput.value = product.pro_id;
        hiddenInput.className = 'product-id'; // Class to identify the hidden input

        // Configuring buttons
        editButton.textContent = 'Editar';
        deleteButton.textContent = 'Eliminar';
        editButton.className = 'edit-btn'; // Class for styling and identification
        deleteButton.className = 'delete-btn'; // Class for styling and identification
        deleteButton.setAttribute('data-product-id', product.pro_id);
        editButton.setAttribute('data-product-id', product.pro_id);
        
        deleteButton.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            deleteProduct(productId);
        });
        editButton.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            fetchProductById(productId);
        });
        

        // Appending elements to the productDiv
        productDiv.appendChild(productName);
        productDiv.appendChild(productDesc);
        productDiv.appendChild(productCategory);
        productDiv.appendChild(hiddenInput); // Append the hidden input to carry the product's ID
        productDiv.appendChild(editButton); // Append edit button
        productDiv.appendChild(deleteButton); // Append delete button

        // Finally, appending the productDiv to the container
        container.appendChild(productDiv);

        
    });
}
// fetch endpoint to delete a product
async function deleteProduct(productId) {
    try {
        const response = await fetch('/api/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ pro_id: productId }) // Ensure this matches the expected format on the server
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const result = await response.json();
        console.log('Producto eliminado:', result);

        // Navigate or reload the page after the fetch completes and you've processed the response
        window.location.reload(); // Reloads the current page
    } catch (error) {
        console.error('Error al borrar el producto:', error);
    }
}

// fetch endpoint to get the product data by its ID
async function fetchProductById(productId) {
    try {
        const response = await fetch(`/api/getProductoById`, {
            method: 'POST', // Verifica si este debe ser POST, algunos APIs usan GET para obtener datos
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ pro_id: productId }) // Asegúrate de que la clave coincida con lo que espera tu API
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const product = await response.json();
        localStorage.setItem('productData', JSON.stringify(product));
        window.location.href = '/updateForm';

        // Aquí puedes llamar a la función que rellena el formulario con los datos del producto
        
    } catch (error) {
        console.error('Error al obtener el producto:', error);
    }
}



document.addEventListener('DOMContentLoaded', fetchProducts); // Cargar productos cuando la página esté lista
