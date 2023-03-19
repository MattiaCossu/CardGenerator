<?php
require_once '../config.php';

class Database {
    private $connection;

    public function __construct() {
        try {
            $this->connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            throw new Exception("Connection db fails: " . $exception->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
