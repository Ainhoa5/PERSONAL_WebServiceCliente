<?php 
namespace Config;
// config/database.php
class Database {
    private static $host = 'localhost';
    private static $db_name = 'andercode_webservice';
    private static $username = 'root';
    private static $password = '';
    private static $conn;

    public static function connect() {
        self::$conn = null;

        try {
            self::$conn = new \PDO('mysql:host=' . self::$host . ';dbname=' . self::$db_name, self::$username, self::$password);
            self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            return false;
        }

        return self::$conn;
    }
}

?>
