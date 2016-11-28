<?php

class Connection {

    static private $instance;
    
    /**
    * @return PDO Return a PDO instance representing a connection to a database
    */
    public static function getConnection() {
        
        if(self::$instance == NULL){
            $host = Constant::DB_HOST;
            $schema = Constant::DB_SCHEMA;
            $PDOinstance = new PDO("mysql:host=$host;dbname=$schema;charset=utf8", Constant::DB_USER, Constant::DB_PASS);
            $PDOinstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance = $PDOinstance;
        }
        return self::$instance;
        
    }
    
}
