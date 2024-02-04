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
    public function showDashboard()
    {
        // Aquí no necesitas obtener los productos desde el modelo,
        // ya que se cargarán a través de AJAX.
        require VIEWS_DIR . 'categoriesDashboard.php';
    }
    public function showForm()
    {
        require VIEWS_DIR . 'formCategoria.php';
    }
    public function getCategoriasJson()
    {
        $categories = $this->model->getCategories();
        header('Content-Type: application/json');
        echo json_encode($categories);
        exit;
    }
    public function deleteCategoria()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->model->deleteCategoria($data);
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    public function addCategoria()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // Aquí, procesa $data y utiliza tu modelo o ApiClient para añadir el producto
        $result = $this->model->addCategoria($data);
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }
    public function updateCategoria()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->model->updateCategoria($data);
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }

    public function getCategoriaById()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->model->getCategoriaById($data);
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }
    public function fillUpdateForm()
    {
        require VIEWS_DIR . 'updateCategoriaForm.php';
    }

}
