<?php 
namespace Config;
// In /config/app.php

/**
 * Configuración general de la aplicación.
 *
 * Este archivo define las constantes de ruta esenciales para la aplicación,
 * además de incluir las clases centrales, modelos y controladores.
 */
// Definición de directorios esenciales para la estructura de la aplicación.
define('ROOT_DIR', realpath(__DIR__ . '/..')); // Directorio raíz del proyecto.
define('VIEWS_DIR', ROOT_DIR . '/app/views/'); // Directorio de las vistas.
define('MODELS_DIR', ROOT_DIR . '/app/models/'); // Directorio de los modelos.
define('CONTROLLERS_DIR', ROOT_DIR . '/app/controllers/'); // Directorio de los controladores.
define('CONFIG_DIR', ROOT_DIR . '/config/'); // Directorio de configuración.
define('CSS_PATH', '/css/'); // Ruta relativa para los archivos CSS.
define('IMG_PATH', 'img/'); // Ruta base para las imágenes.
define('IMG_INDEX_PATH', IMG_PATH .'index/'); // Ruta para imágenes específicas del índice.
define('IMG_PRODUCTS_PATH', IMG_PATH .'products/'); // Ruta para imágenes de productos.
define('JS_PATH', 'scripts/'); // Ruta para los scripts de JavaScript.


// Inclusión de clases principales.
require_once ROOT_DIR . '/Router.php';
require_once CONFIG_DIR . 'database.php';
require_once CONFIG_DIR . 'functions.php';

// Inclusión de modelos.
require_once MODELS_DIR . 'Product.php'; 
require_once MODELS_DIR . 'Categories.php'; 

// Inclusión de controladores.
require CONTROLLERS_DIR . 'PanelController.php';
require CONTROLLERS_DIR . 'CategoriesController.php';
require CONTROLLERS_DIR . 'HomeController.php';
require_once CONTROLLERS_DIR . 'ApiClient.php';   


