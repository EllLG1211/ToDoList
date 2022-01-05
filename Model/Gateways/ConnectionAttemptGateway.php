<?php
require_once "Config/config.php";
global $connection;
require_once $connection;

class ConnectionAttemptGateway
{
    private Connection $connection;
    private static string $query = "SELECT COUNT(*) FROM users WHERE name=:n AND password=:p";

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function connectionAttempt(string $name, string $password) : bool{
        $this->connection->executeQuery(ConnectionAttemptGateway::$query, [
            ':n' => [$name, PDO::PARAM_STR],
            ':p' => [$password, PDO::PARAM_STR]
        ]);
        $res = $this->connection->getResults();
        return $res[0][0] == 1;
    }
}