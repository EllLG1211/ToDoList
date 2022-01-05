<?php
require_once "Config/config.php";
global $connection;
require_once $connection;
class DeleteTaskListGateway
{
    private Connection $connection;
    private static string $deleteQuery = "DELETE FROM taskLists WHERE id=:id";
    private static string $selectQuery = "DELETE FROM tasks WHERE list =:lid";

    public function __construct(Connection $connection){
        $this->connection = $connection;
    }

    public function deleteTaskList(int $id){
        $this->deleteAllTasksInList($id);
        $this->connection->executeQuery(DeleteTaskListGateway::$deleteQuery, array(
            ':id' => [$id, PDO::PARAM_INT]
        ));
    }

    private function deleteAllTasksInList(int $lid){
        $this->connection->executeQuery(DeleteTaskListGateway::$selectQuery, array(
            ':lid' => [$lid, PDO::PARAM_INT]
        ));
    }
}