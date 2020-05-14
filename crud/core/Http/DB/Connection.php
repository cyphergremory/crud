<?php
namespace DB;
use PDO;
use PDOException;
class Connection
{
    /***
     * @var $conexion  PDO
     *
     * Objeto de PDO encargado de la conexion.
     */
    static $connection = null;
    static $username;
    static $password;
    static $host;
    static $database;

    public static function connect(): PDO
    {
        if(!self::$connection instanceof  PDO)
        {
            $dbconfig  = require_once "{$_SERVER['DOCUMENT_ROOT']}/crud/core/Config/DB.php";
            self::$username = $dbconfig['username'];
            self::$password = $dbconfig['password'];
            self::$host = $dbconfig['host'];
            self::$database = $dbconfig['database'];

            self::prepareConnection();
        }
        return self::$connection;
    }

    public static function prepareConnection():void
    {
        try{
            self::$connection = new PDO(
                'mysql:host='.self::$host.';dbname='.self::$database,
                self::$username,
                self::$password
            );
            self::$connection->exec("set names utf8");

        }catch(PDOException $ex){
            self::close();
        }
    }

    public static function close()
    {
        self::$connection = null;
    }
}