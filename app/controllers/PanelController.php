<?php
namespace App\Controllers;
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
        $latestProducts = $this->productModel->getProducts(); // Method to fetch latest products
        require VIEWS_DIR . 'dashboard.php';
    }
    public function showForm() {
        require VIEWS_DIR . 'panel.php';
    }
}
