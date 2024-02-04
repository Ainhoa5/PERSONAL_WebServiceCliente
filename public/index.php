<?php 
// In /index.php

// to start:
// php -S localhost:3000 -t public

// Punto de entrada de la aplicación PHP.

// Incluir el archivo de configuración principal de la aplicación,
// donde se definen constantes de ruta, y se incluyen clases esenciales.
require '../config/app.php';


// Crear una instancia del enrutador.
$router = new Router;

// Definir las rutas de la aplicación y mapearlas a los métodos de controlador correspondientes.
// Cada ruta especifica una URI y el controlador junto con el método a ejecutar.
$router->define([
    '' => 'HomeController@showMenu',
    'manage-products' => 'PanelController@showDashboard',
    'manage-categories' => 'CategoriesController@showDashboard',
    'create' => 'PanelController@showForm',
    'createCategoria' => 'CategoriesController@showForm',
    'updateFormProducto' => 'PanelController@fillUpdateForm',
    'api/products' => 'PanelController@getProductsJson',
    'api/addProduct' => 'PanelController@addProduct',
    'api/delete' => 'PanelController@deleteProduct',
    'api/getProductoById' => 'PanelController@getProductoById',
    'api/update' => 'PanelController@updateProduct',
    'api/categorias' => 'CategoriesController@getCategoriasJson',
    'api/deleteCategoria' => 'CategoriesController@deleteCategoria',
    'api/getCategoriaById' => 'CategoriesController@getCategoriaById',
    'api/addCategoria' => 'CategoriesController@addCategoria',
    'api/updateCategoria' => 'CategoriesController@updateCategoria',
    'updateFormCategoria' => 'CategoriesController@fillUpdateForm',
    // other routes...
]);

// Obtener la URI actual de la solicitud.
$uri = $_SERVER['REQUEST_URI'];
// Ajustar la URI basada en la estructura del proyecto, si es necesario.
$uri = str_replace('/Projects/TStore/', '', $uri);
// Remover las barras diagonales al principio y al final de la URI.
$uri = trim($uri, '/');
// Dirigir la solicitud a la ruta correspondiente definida anteriormente.
$router->direct($uri);


