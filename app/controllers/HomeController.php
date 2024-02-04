<?php
namespace App\Controllers;
// En /app/controllers/HomeController.php

/**
 * Clase HomeController para manejar las operaciones relacionadas con la página de inicio.
 *
 * Esta clase se encarga de controlar las acciones que se pueden realizar desde la página de inicio
 * o menú principal de la aplicación, como mostrar el menú principal.
 */
class HomeController {
    /**
     * Muestra el menú principal de la aplicación.
     *
     * Este método carga y muestra la vista correspondiente al menú principal de la aplicación.
     * Es el punto de entrada principal para los usuarios cuando visitan la aplicación.
     */
    public function showMenu() {
        // Asegúrate de definir la constante VIEWS_DIR en tu configuración o bootstrap de la aplicación
        // para que apunte al directorio correcto de tus vistas.
        require VIEWS_DIR . 'menu.php';
    }
}
