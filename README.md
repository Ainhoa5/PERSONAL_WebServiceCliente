# Cliente de Gestión de Productos y Categorías

## Description
Este documento describe la configuración y el consumo de un servicio web diseñado para gestionar productos y categorías en una base de datos. El servicio se construye utilizando PHP y JavaScript para facilitar la creación de interfaces de usuario que interactúan con el servidor a través de API RESTful. Este cliente proporciona funcionalidad para agregar, actualizar, eliminar y listar productos y categorías.

# Table of Contents
- [Descripción](#descripción)
- [Configuración del Servidor](#configuración-del-servidor)
  - [Archivos y Dependencias](#archivos-y-dependencias)
  - [Configuración de CORS](#configuración-de-cors)
- [Servicios](#servicios)
  - [Productos](#productos)
    - [Obtener Todos los Productos](#obtener-todos-los-productos)
    - [Obtener Producto por ID](#obtener-producto-por-id)
    - [Insertar Producto](#insertar-producto)
    - [Actualizar Producto](#actualizar-producto)
    - [Eliminar Producto](#eliminar-producto)
  - [Categorías](#categorías)
    - [Obtener Todas las Categorías](#obtener-todas-las-categorías)
    - [Obtener Categoría por ID](#obtener-categoría-por-id)
    - [Insertar Categoría](#insertar-categoría)
    - [Actualizar Categoría](#actualizar-categoría)
    - [Eliminar Categoría](#eliminar-categoría)
- [Uso](#uso)
  - [Cliente](#cliente)
      - [Visualización de Datos](#visualización-de-datos)
- [Depuración](#depuración)
- [Notas de Seguridad](#notas-de-seguridad)
- [Conclusión](#conclusión)


## Configuración del Servidor
### Archivos y Dependencias
- Dependencias: Asegúrate de tener un servidor con PHP configurado para servir la API que el cliente consumirá.
- dashboardProducto.js y dashboardCategoria.js: 

        Scripts que cargan y muestran los productos y categorías desde la API.
- formProducto.js y formCategoria.js: 

        Manejan la lógica de los formularios para agregar y actualizar productos y categorías.
    

### Configuración de CORS
Si tu API y tu cliente se alojan en dominios diferentes, asegúrate de que la API esté configurada para permitir solicitudes CORS desde el origen de tu cliente.

## Services
El cliente interactúa con dos principales conjuntos de servicios en la API:
### Gestión de Productos
- Obtener Todos los Productos

        GET /api/products
    
- Obtener Producto por ID

        POST /api/getProductoById 
        con pro_id en el cuerpo de la solicitud.

- Insertar Producto

        POST /api/addProduct 
        con los datos del producto en el cuerpo de la solicitud.

- Actualizar Producto

        POST /api/updateProducto 
        con los datos actualizados del producto en el cuerpo de la solicitud.
    
- Eliminar Producto
        
        POST /api/delete 
        con pro_id en el cuerpo de la solicitud.

### Gestión de Categorías
- Obtener Todas las Categorías

        GET /api/categorias

- Obtener Categoría por ID

        POST /api/getCategoriaById 
        con cat_id en el cuerpo de la solicitud.

- Insertar Categoría

        POST /api/addCategoria 
        con los datos de la categoría en el cuerpo de la solicitud.

- Actualizar Categoría

        POST /api/updateCategoria 
        con los datos actualizados de la categoría en el cuerpo de la solicitud.

- Eliminar Categoría

        POST /api/deleteCategoria 
        con cat_id en el cuerpo de la solicitud.

## Consumo del Cliente
### Uso de Formularios
Los formularios permiten al usuario interactuar con la API para realizar operaciones CRUD sobre productos y categorías.
### Visualización de Datos
Los scripts ***dashboardProducto.js*** y ***dashboardCategoria.js*** se utilizan para cargar y mostrar datos de la API en la interfaz de usuario.

## Depuración
Utiliza las herramientas de desarrollo del navegador para inspeccionar las solicitudes de red y las respuestas de la API. Los scripts incluyen console.log para ayudar en la depuración.

## Notas de Seguridad
- Asegúrate de validar y sanear las entradas en el servidor para prevenir inyecciones SQL y otros vectores de ataque.
- Considera implementar autenticación y autorización en tu API para proteger los datos sensibles.

## Conclusión
Este cliente web proporciona una interfaz interactiva para la gestión de productos y categorías, aprovechando las operaciones CRUD proporcionadas por la API. Siguiendo las configuraciones y ejemplos proporcionados, los desarrolladores pueden integrar y ampliar el servicio según las necesidades de su aplicación.