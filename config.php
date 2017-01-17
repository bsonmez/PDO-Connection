<?php
final class database {

private static $instance = NULL;
private $pdo;

 private function __construct() 
    {
        $servername = "localhost";
        $username = "username";
        $password = "password";
        try 
            {
                //Creating connection for mysql
                $conn = new PDO("mysql:host=$servername;dbname=databasename", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        catch(PDOException $e)
                {
                echo "Connection failed: " . $e->getMessage();
                }
                $this->pdo = $conn;
    }
    public static function getInstance() {
        static $instance = null;
        if (self::$instance === NULL) {
            $instance = new database();
        }
        return $instance;
    }

    //added a function to get the connection itself
    function getConnection(){
        return $this->pdo;
    }
}
?>

