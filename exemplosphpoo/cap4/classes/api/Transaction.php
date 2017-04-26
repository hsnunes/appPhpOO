<?php
final class Transaction
{
    private static $conn; // conexão ativa
    private static $logger; // logger
    
    private function __construct() {}
    
    public static function open($database)
    {
        if (empty(self::$conn))
        {
            self::$conn = Connection::open($database);
            self::$conn->beginTransaction(); // inicia a transação
            self::$logger = NULL;
        }
    }
    
    public static function get()
    {
        return self::$conn; // retorna a conexão ativa
    }
    
    public static function rollback()
    {
        if (self::$conn)
        {
            self::$conn->rollback(); // desfaz as operações realizadas
            self::$conn = NULL;
        }
    }
    
    public static function close()
    {
        if (self::$conn)
        {
            self::$conn->commit(); // aplica as operações realizadas
            self::$conn = NULL;
        }
    }
    
    public static function setLogger(Logger $logger)
    {
        self::$logger = $logger;
    }
    
    public static function log($message)
    {
        // verifica existe um logger
        if (self::$logger)
        {
            self::$logger->write($message);
        }
    }
}
