<?php
require_once "Config/config.php";
global $connection;
require_once $connection;
class AddTaskListGateway
{
    private Connection $connection;
    private static string $query = "INSERT INTO taskLists(name, visibility, creator) VALUES(:n, :v, :cr)";

    public function __construct(Connection $connection){
        $this->connection = $connection;
    }

    public function AddTaskList(string $name, int $visibility, User $creator){
        $this->connection->executeQuery(AddTaskListGateway::$query,array(
            ':n' => [$name, PDO::PARAM_STR],
            ':v' => [$visibility, PDO::PARAM_INT],
            ':cr' => [$creator->getName(), PDO::PARAM_STR]
        ));
    }
}