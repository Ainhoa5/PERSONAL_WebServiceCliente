<?php
namespace App\Controllers;

// En /app/controllers/PanelController.php

/**
 * Controlador PanelController para manejar las operaciones del panel de productos.
 *
 * Este controlador facilita la interacción con el modelo de productos para realizar
 * operaciones CRUD a través de una API, y maneja la renderización de las vistas
 * relacionadas con los productos.
 */
class PanelController
{

    /**
     * Modelo de productos para interactuar con la API.
     *
     * @var Product
     */
    private $productModel;

    /**
     * Constructor del PanelController.
     *
     * Inicializa el modelo de productos con una instancia de ApiClient.
     */
    public function __construct()
    {
        // Crear instancia de ApiClient con la URL de tu API
        $apiClient = new ApiClient('http://localhost/Projects/PERSONAL_WebServicePostman/index.php?op=');

        // Pasar esta instancia de ApiClient a tu modelo
        $this->productModel = new \APP\Models\Product($apiClient);
    }

    /**
     * Muestra el dashboard de productos.
     *
     * Carga la vista del dashboard de productos, donde se utilizará AJAX
     * para cargar dinámicamente el contenido relacionado con los productos.
     */
    public function showDashboard()
    {
        require VIEWS_DIR . 'dashboardProducto.php';
    }

    /**
     * Envía los productos existentes en formato JSON.
     *
     * Recupera todos los productos a través del modelo y los devuelve en formato JSON.
     */
    public function getProductsJson()
    {
        $latestProducts = $this->productModel->getProducts();
        header('Content-Type: application/json');
        echo json_encode($latestProducts);
        exit;
    }

    /**
     * Muestra el formulario para añadir un nuevo producto.
     */
    public function showForm()
    {
        require VIEWS_DIR . 'formProducto.php';
    }

    /**
     * Añade un nuevo producto a través de la API.
     *
     * Recibe los datos del nuevo producto y lo añade a través del modelo.
     */
    public function addProduct()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // Aquí, procesa $data y utiliza tu modelo o ApiClient para añadir el producto
        $result = $this->productModel->addProduct($data);
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    /**
     * Elimina un producto específico a través de la API.
     *
     * Recibe los datos necesarios para eliminar un producto y lo elimina a través del modelo.
     */
    public function deleteProduct()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->productModel->deleteProduct($data);
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    /**
     * Actualiza un producto existente a través de la API.
     *
     * Recibe los datos actualizados de un producto y lo actualiza a través del modelo.
     */
    public function updateProduct()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->productModel->updateProduct($data);
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    /**
     * Obtiene los detalles de un producto específico por su ID a través de la API.
     *
     * Recibe el ID de un producto y devuelve sus detalles a través del modelo.
     */
    public function getProductoById()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->productModel->getProductById($data);
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    /**
     * Carga el formulario de actualización de productos que será rellenado con los datos de un producto específico.
     */
    public function fillUpdateForm()
    {
        require VIEWS_DIR . 'updateProductoForm.php';
    }
}
