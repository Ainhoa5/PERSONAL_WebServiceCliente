<?php
namespace App\Controllers;

use Config\Functions;

// In /app/controllers/PanelController.php

class PanelController {
    private $productModel;

    public function __construct() {
        // Crear instancia de ApiClient con la URL de tu API
        $apiClient = new ApiClient('http://localhost/Projects/PERSONAL_WebServicePostman/index.php?op=');

        // Pasar esta instancia de ApiClient a tu modelo
        $this->productModel = new \APP\Models\Product($apiClient);
    }
    public function showDashboard() {
        // Aquí no necesitas obtener los productos desde el modelo,
        // ya que se cargarán a través de AJAX.
        require VIEWS_DIR . 'dashboard.php';
    }
    public function getProductsJson() {
        $latestProducts = $this->productModel->getProducts();
        header('Content-Type: application/json');
        echo json_encode($latestProducts);
        exit;
    }
    public function showForm() {
        require VIEWS_DIR . 'form.php';
    }
    public function addProduct() {
        $data = json_decode(file_get_contents('php://input'), true);
        Functions::debug($data);
        // Aquí, procesa $data y utiliza tu modelo o ApiClient para añadir el producto
        $result = $this->productModel->addProduct($data);
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }
}
