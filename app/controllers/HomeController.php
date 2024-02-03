<?php
namespace App\Controllers;

use Config\Functions;

// In /app/controllers/HomeController.php

class HomeController {
    
    public function showMenu() {
        require VIEWS_DIR . 'menu.php';
    }
}
