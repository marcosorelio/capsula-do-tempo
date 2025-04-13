<?php
class Conexao
{

    public static $instance;
    private function __construct()
    {
    }

    public static function getConexao(): PDO
    {
        if (!isset(self::$instance)) {
           
            try {

            self::$instance = new PDO(dsn: 'mysql:host=172.21.0.3;port=3306;dbname=db_mysql_docker', username: 'root', password: 'struck-ovary-superjet-croon', options: array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(attribute: PDO::ATTR_ORACLE_NULLS, value: PDO::NULL_EMPTY_STRING);
            } catch (PDOException $e) {
                print "Erro ao conectar a base de dados do usuario <br>" . $e . '<br>';
            } 
            
        }

        return self::$instance;
    }

}