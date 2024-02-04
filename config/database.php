<?php
namespace Config;

// En /config/database.php

/**
 * Clase Database para gestionar la conexión a la base de datos.
 *
 * Esta clase utiliza el patrón Singleton para manejar una única instancia de conexión
 * a la base de datos durante toda la ejecución de la aplicación, utilizando PDO.
 */
class Database
{
    /**
     * Host de la base de datos.
     * 
     * @var string
     */
    private static $host = 'localhost';
    /**
     * Nombre de la base de datos.
     * 
     * @var string
     */
    private static $db_name = 'andercode_webservice';
    /**
     * Nombre de usuario para la conexión a la base de datos.
     * 
     * @var string
     */
    private static $username = 'root';
    /**
     * Contraseña para la conexión a la base de datos.
     * 
     * @var string
     */
    private static $password = '';
    /**
     * Conexión a la base de datos.
     * 
     * @var \PDO
     */
    private static $conn;

    /**
     * Establece y obtiene la conexión a la base de datos.
     *
     * Intenta establecer una conexión a la base de datos usando PDO y configura
     * el modo de error a excepciones. Si la conexión es exitosa, devuelve el objeto PDO;
     * de lo contrario, devuelve false en caso de error.
     *
     * @return \PDO|false La conexión a la base de datos o false si hay un error.
     */
    public static function connect()
    {
        self::$conn = null;

        try {
            self::$conn = new \PDO('mysql:host=' . self::$host . ';dbname=' . self::$db_name, self::$username, self::$password);
            // Configurar PDO para lanzar excepciones en caso de error.
            self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            // En un entorno de producción, considera registrar este error sin exponer detalles sensibles.
            return false;
        }

        return self::$conn;
    }
}

?>