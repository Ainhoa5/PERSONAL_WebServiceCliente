<?php 
namespace App\Controllers;

use Config\Functions;

// En /app/ApiClient.php

class ApiClient {
    private $baseUrl;

    public function __construct($baseUrl) {
        $this->baseUrl = $baseUrl;
    }

    public function sendRequest($method, $endpoint, $data = []) {
        // Asegúrate de que no haya una barra adicional despues de '?op='
        $url = $this->baseUrl . ltrim($endpoint, '/');
        // Aquí usarías cURL o alguna otra librería para hacer la solicitud HTTP
        // El siguiente es un ejemplo básico usando cURL:
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        // Agregar más configuraciones según sea necesario para otros métodos HTTP

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new \Exception(curl_error($ch));
        }

        curl_close($ch);
        return json_decode($response, true);
    }
}

?>