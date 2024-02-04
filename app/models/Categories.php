<?php
namespace App\Models;

use Config\Functions;

// En /app/models/Categories.php
class Categories
{

    private $apiClient;

    public function __construct($apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function getCategories()
    {
        return $this->apiClient->sendRequest('GET', 'getAllCategorias');
    }
    public function addCategoria($data)
    {
        return $this->apiClient->sendRequest('POST', 'insertCategoria', $data);
    }
    public function deleteCategoria($data)
    {
        return $this->apiClient->sendRequest('POST', 'deleteCategoria', $data);
    }
    public function updateCategoria($data)
    {
        return $this->apiClient->sendRequest('POST', 'updateCategoria', $data);
    }
    
    public function getCategoriaById($data)
    {
        return $this->apiClient->sendRequest('POST', 'getCategoriaById', $data);
    }

}
