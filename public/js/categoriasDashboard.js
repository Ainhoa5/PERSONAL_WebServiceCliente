/* Recoge todas las categorias */
async function fetchCategories() {
    try {
        const response = await fetch('/api/categorias');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const categories = await response.json();
        updateCategoriesView(categories);
    } catch (error) {
        console.error('Error al realizar la solicitud:', error);
    }
}

function updateCategoriesView(categories) {
    const container = document.getElementById('categorias-container');
    container.innerHTML = ''; // Limpiar el contenido existente

    categories.forEach(category => {
        const categoryDiv = document.createElement('div');
        categoryDiv.className = 'category-item'; // Agregado para estilizar

        const categoryName = document.createElement('h3');
        const categoryDesc = document.createElement('p');
        const editButton = document.createElement('button');
        const deleteButton = document.createElement('button');
        const hiddenInput = document.createElement('input');

        categoryName.textContent = `Nombre: ${category.cat_nom}`;
        categoryDesc.textContent = `Observaciones: ${category.cat_obs}`;

        // Configuración del input oculto
        hiddenInput.type = 'hidden';
        hiddenInput.value = category.cat_id;
        hiddenInput.className = 'category-id'; // Clase para identificar el input oculto

        // Configurando botones
        editButton.textContent = 'Editar';
        deleteButton.textContent = 'Eliminar';
        editButton.className = 'edit-btn'; // Clase para estilizar e identificar
        deleteButton.className = 'delete-btn'; // Clase para estilizar e identificar
        deleteButton.setAttribute('data-category-id', category.cat_id);
        editButton.setAttribute('data-category-id', category.cat_id);

        deleteButton.addEventListener('click', function () {
            const categoryId = this.getAttribute('data-category-id');
            deleteCategory(categoryId);
        });
        editButton.addEventListener('click', function () {
            const categoryId = this.getAttribute('data-category-id');
            fetchCategoryById(categoryId);
        });

        // Anexando elementos al categoryDiv
        categoryDiv.appendChild(categoryName);
        categoryDiv.appendChild(categoryDesc);
        categoryDiv.appendChild(hiddenInput);
        categoryDiv.appendChild(editButton);
        categoryDiv.appendChild(deleteButton);

        // Finalmente, anexando categoryDiv al contenedor
        container.appendChild(categoryDiv);
    });
}
// fetch endpoint to delete a product
async function deleteCategory(categoryId) {
    try {
        const response = await fetch('/api/deleteCategoria', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ cat_id: categoryId })
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const result = await response.json();
        console.log('Categoría eliminada:', result);
        window.location.reload();
    } catch (error) {
        console.error('Error al borrar la categoría:', error);
    }
}

async function fetchCategoryById(categoryId) {
    try {
        const response = await fetch(`/api/getCategoriaById`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ cat_id: categoryId })
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const category = await response.json();
        localStorage.setItem('categoryData', JSON.stringify(category));
        window.location.href = '/updateFormCategoria';

    } catch (error) {
        console.error('Error al obtener la categoría:', error);
    }
}

document.addEventListener('DOMContentLoaded', fetchCategories); // Cargar categorias cuando la página esté lista
