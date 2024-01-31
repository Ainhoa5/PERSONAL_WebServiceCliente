<?php 
namespace App\Models;
// En /app/models/Product.php
class Product {

    private $apiClient;

    public function __construct($apiClient) {
        $this->apiClient = $apiClient;
    }

    public function getProducts() {
        return $this->apiClient->sendRequest('GET', 'getAllProductos');
    }
    public function addProduct($data) {
        return $this->apiClient->sendRequest('POST', 'insertProducto', $data);
    }
}
