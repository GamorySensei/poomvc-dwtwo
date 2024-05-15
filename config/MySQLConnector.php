<?php
namespace App\Config;

class MySQLConnector
{

    private \PDO $connection;

    public function __construct()
    {
        try {

            $config = require('../config/mysql.config.php');


            $this->connection = new \PDO('mysql:host='.$config['DB_HOST'].';dbname='.$config['DB_NAME'].';charset=utf8mb4', $config['DB_USER'], $config['DB_PASSWORD'], [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ]);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Get the value of connection
     */
    public function getConnection(): \PDO
    {
        return $this->connection;
    }
}
