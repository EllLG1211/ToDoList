<?php
require_once "Config/config.php";
global $connection;
require_once $connection;
class AddTaskGateway
{
    private Connection $connection;
    private static string $query = "INSERT INTO tasks(label, completed, list) VALUES(:l, 0, :i);";

    public function __construct(Connection $connection){
        $this->connection = $connection;
    }

    public function addTask(string $label, int $listId){
        global $errors;
        $errors[] = $label;
        $errors[] = gettype($label);
        $errors[] = $listId;
        $errors[] = gettype($listId);

        $this->connection->executeQuery(self::$query, array(
            ':l' => [$label, PDO::PARAM_STR],
            ':i' => [$listId, PDO::PARAM_INT]
        ));
    }
}