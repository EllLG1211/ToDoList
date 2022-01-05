<?php
require_once "Config/config.php";
global $connection;
require_once $connection;

class AddUserGateway
{
    private Connection $connection;
    private static string $checkAvailabilityQuery = "SELECT COUNT(*) FROM users WHERE name=:n";
    private static string $addUserQuery = "INSERT INTO users VALUES(:n, :p)";

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function isAvailable(string $name) : bool{
        $this->connection->executeQuery(AddUserGateway::$checkAvailabilityQuery,
            [':n' => [$name, PDO::PARAM_STR]]
        );
        $res = $this->connection->getResults();
        return $res[0][0] == 0;
    }

    public function addUser(string $name, string $password) : bool{
        return $this->connection->executeQuery(AddUserGateway::$addUserQuery, array(
            ':n' => [$name, PDO::PARAM_STR],
            ':p' => [$password, PDO::PARAM_STR]
        ));
    }
}