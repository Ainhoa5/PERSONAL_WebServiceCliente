// /public/js/dashboard.js

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
        const productName = document.createElement('h3');
        const productDesc = document.createElement('p');
        const productCategory = document.createElement('p');

        productName.textContent = `Nombre: ${product.pro_nom}`; // Nombre del producto
        productDesc.textContent = `Descripción: ${product.pro_desc}`; // Descripción del producto
        productCategory.textContent = `Categoría ID: ${product.cat_id}`; // ID de la categoría

        productDiv.appendChild(productName);
        productDiv.appendChild(productDesc);
        productDiv.appendChild(productCategory);
        container.appendChild(productDiv);
    });
}


document.addEventListener('DOMContentLoaded', fetchProducts); // Cargar productos cuando la página esté lista
