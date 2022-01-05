<?php
require_once "Config/config.php";
global $connection;
require_once $connection;
class CompleteTaskGateway
{
    private Connection $connection;
    private static string $getStateQuery = "SELECT completed FROM tasks WHERE id = :i";
    private static string $query = "UPDATE tasks SET completed = :bo WHERE id = :i";

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    function completeTask(int $taskId){
        $this->connection->executeQuery(self::$getStateQuery,
            [':i' => [$taskId, PDO::PARAM_INT]]);
        $ob = $this->connection->getResults();

        $bo = $ob[0][0] == 0 ? 1 : 0;
        $this->connection->executeQuery(self::$query,
            [
                ':bo'=> [$bo, PDO::PARAM_INT],
                ':i' => [$taskId, PDO::PARAM_INT]
            ]);
    }
}