<?php 
// In /index.php

// to start:
// php -S localhost:3000 -t public
require '../config/app.php';

$router = new Router;

$router->define([
    '' => 'HomeController@showMenu',
    'manage-products' => 'PanelController@showDashboard',
    'manage-categories' => 'CategoriesController@showDashboard',
    'create' => 'PanelController@showForm',
    'createCategoria' => 'CategoriesController@showForm',
    'updateForm' => 'PanelController@fillUpdateForm',
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

$uri = $_SERVER['REQUEST_URI'];
$uri = str_replace('/Projects/TStore/', '', $uri); // Adjust this based on your project structure
$uri = trim($uri, '/');
$router->direct($uri);


