<?php
require_once "Config/config.php";
global $connection;
require_once $connection;
class FetchTasksGateway
{
    private Connection $connection;
    private static string $query = "SELECT * FROM tasks WHERE list=:tl";

    public function __construct(Connection $connection){
        $this->connection = $connection;
    }

    public function fetchTasks(int $listId) : array {
        $this->connection->executeQuery(FetchTasksGateway::$query,
        [':tl' => [$listId, PDO::PARAM_INT]]);
        $tmp = $this->connection->getResults();
        $tasks = array();
        foreach ($tmp as $t){
            array_push($tasks, new Task($t['id'], $t['label'], $t['completed']));
        }
        return $tasks;
    }
}