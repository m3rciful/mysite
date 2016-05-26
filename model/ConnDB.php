<?php
/**
 * Класс подключения к базе данных
 * @return возвращает дескриптор базы (ключ)
 */
class ConnDB{

    private static $instance = null;

    private static $dbh = null;

    private function __construct(){
        require "model/config.php";
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try {
            self::$dbh = new PDO($dsn, $user, $pass, $opt);
        } catch (Exception $e) {
            echo "Нет подключения к базе!";
        }
    }

    public static function getDbh(){
        if(is_null(self::$dbh)){
            self::$instance= new self;
        }
        return self::$dbh;
    }
    protected function __clone(){}

}