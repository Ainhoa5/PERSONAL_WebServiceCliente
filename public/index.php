<?php 
// In /index.php

// to start:
// php -S localhost:3000 -t public
require '../config/app.php';

$router = new Router;

$router->define([
    '' => 'PanelController@showDashboard',
    // other routes...
]);

$uri = $_SERVER['REQUEST_URI'];
$uri = str_replace('/Projects/TStore/', '', $uri); // Adjust this based on your project structure
$uri = trim($uri, '/');
$router->direct($uri);


