<?php

namespace Db;

use PDO;
use PDOException;
use Dotenv;

class Database
{
    private string $host;
    private string $username;
    private string $password;
    private string $database;
    private ?PDO $conn;

    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable('/Users/aon/Projects/lab-project/');
        $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->database = $_ENV['DB_DATABASE'];
    }

    public function connect(): void
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo 'Connected to the database successfully. <br>';
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function query($sql, $params = []): bool|array
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Query execution failed: ' . $e->getMessage();

            return [];
        }
    }
}
