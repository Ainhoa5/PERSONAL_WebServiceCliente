<?php 
namespace Config;
// In /config/app.php

// Define directories
define('ROOT_DIR', realpath(__DIR__ . '/..'));
define('VIEWS_DIR', ROOT_DIR . '/app/views/');
define('MODELS_DIR', ROOT_DIR . '/app/models/');
define('CONTROLLERS_DIR', ROOT_DIR . '/app/controllers/');
define('CONFIG_DIR', ROOT_DIR . '/config/');
define('CSS_PATH', '/css/');
define('IMG_PATH', 'img/');
define('IMG_INDEX_PATH', IMG_PATH .'index/');
define('IMG_PRODUCTS_PATH', IMG_PATH .'products/');
define('JS_PATH', 'scripts/');


// Core classes
require_once ROOT_DIR . '/Router.php';       // Include the Router class
require_once CONFIG_DIR . 'database.php';    // Include the Database class
require_once CONFIG_DIR . 'functions.php'; // last
// Models
require_once MODELS_DIR . 'Product.php'; 

// Controllers 
require CONTROLLERS_DIR . 'PanelController.php';
require_once CONTROLLERS_DIR . 'ApiClient.php';   


