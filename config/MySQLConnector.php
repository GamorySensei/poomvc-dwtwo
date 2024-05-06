<?php


class MySQLConnector
{

    private \PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=localhost;dbname=spotiflux;charset=utf8mb4', 'root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
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
