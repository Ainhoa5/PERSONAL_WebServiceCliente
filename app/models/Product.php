<?php
namespace App\Models;

// En /app/models/Product.php

/**
 * Clase Product para manejar operaciones relacionadas con productos.
 *
 * Esta clase se encarga de la comunicación con una API externa para realizar
 * operaciones CRUD sobre productos, utilizando un cliente API para enviar solicitudes.
 */
class Product
{
    /**
     * Cliente API para realizar solicitudes HTTP.
     *
     * @var ApiClient Instancia del cliente API para realizar solicitudes HTTP.
     */
    private $apiClient;
    /**
     * Constructor de la clase Product.
     *
     * @param ApiClient $apiClient Instancia del cliente API para realizar solicitudes.
     */
    public function __construct($apiClient)
    {
        $this->apiClient = $apiClient;
    }
    /**
     * Obtiene todos los productos desde la API.
     *
     * @return array Lista de productos obtenidos de la API.
     */
    public function getProducts()
    {
        return $this->apiClient->sendRequest('GET', 'getAllProductos');
    }
    /**
     * Añade un nuevo producto a través de la API.
     *
     * @param array $data Datos del producto a añadir.
     * @return array Respuesta de la API al añadir el producto.
     */
    public function addProduct($data)
    {
        return $this->apiClient->sendRequest('POST', 'insertProducto', $data);
    }

    /**
     * Elimina un producto a través de la API.
     *
     * @param array $data Datos necesarios para eliminar el producto, incluyendo su ID.
     * @return array Respuesta de la API a la eliminación del producto.
     */
    public function deleteProduct($data)
    {
        return $this->apiClient->sendRequest('POST', 'deleteProducto', $data);
    }

    /**
     * Actualiza un producto existente a través de la API.
     *
     * @param array $data Datos del producto a actualizar, incluyendo su ID.
     * @return array Respuesta de la API a la actualización del producto.
     */
    public function updateProduct($data)
    {
        return $this->apiClient->sendRequest('POST', 'updateProducto', $data);
    }

    /**
     * Obtiene los detalles de un producto específico por su ID a través de la API.
     *
     * @param array $data Datos necesarios para obtener el producto, incluyendo su ID.
     * @return array Detalles del producto obtenido de la API.
     */
    public function getProductById($data)
    {
        return $this->apiClient->sendRequest('POST', 'getProductoById', $data);
    }

}
