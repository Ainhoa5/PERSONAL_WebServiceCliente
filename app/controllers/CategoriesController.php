<?php
namespace App\Controllers;

use Config\Functions;

// In /app/controllers/CategoriesController.php

class CategoriesController
{
    private $model;

    public function __construct()
    {
        // Crear instancia de ApiClient con la URL de tu API
        $apiClient = new ApiClient('http://localhost/Projects/PERSONAL_WebServicePostman/index.php?op=');

        // Pasar esta instancia de ApiClient a tu modelo
        $this->model = new \APP\Models\Categories($apiClient);
    }

    public function getCategories()
    {   
        $categories = $this->model->getCategories();
        header('Content-Type: application/json');
        echo json_encode($categories);
        exit;
    }
}
