<?php
namespace App\Models;

use Config\Functions;

// En /app/models/Product.php
class Product
{

    private $apiClient;

    public function __construct($apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function getProducts()
    {
        return $this->apiClient->sendRequest('GET', 'getAllProductos');
    }
    public function addProduct($data)
    {
        return $this->apiClient->sendRequest('POST', 'insertProducto', $data);
    }
    public function deleteProduct($data)
    {
        return $this->apiClient->sendRequest('POST', 'deleteProducto', $data);
    }
    public function updateProduct($data)
    {
        return $this->apiClient->sendRequest('POST', 'updateProducto', $data);
    }
    
    public function getProductById($data)
    {
        return $this->apiClient->sendRequest('POST', 'getProductoById', $data);
    }

}
