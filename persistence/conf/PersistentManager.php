<?php

class PersistentManager{
    private static $instance = null;
    //Conexión a BD
    private static $connection = null;
    //Parámetros de conexión a la BD.
    private $userBD = "";
    private $psswdBD = "";
    private $nameBD = "";
    private $hostBD = "";
    
     public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    private function __construct() {
        $this->establishCredentials();

        PersistentManager::$connection = mysqli_connect($this->hostBD, $this->userBD, $this->psswdBD, $this->nameBD)
                or die("Could not connect to db: " . mysqli_error());
        mysqli_query(PersistentManager::$connection, "SET NAMES 'utf8'");
    }
    
     private function establishCredentials() {
        $dir = __DIR__;
        // Lectura de parametros de configuración desde archivo externo
        if (file_exists($dir . '\credentials.json')) {
            $credentialsJSON = file_get_contents($dir . '\credentials.json');
            $credentials = json_decode($credentialsJSON, true);

            $this->userBD = $credentials["user"];
            $this->psswdBD = $credentials["password"];
            $this->nameBD = $credentials["name"];
            $this->hostBD = $credentials["host"];
        }
    }
    
     function get_connection() {
        return PersistentManager::$connection;
    }
}
?>