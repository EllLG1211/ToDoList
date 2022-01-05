<?php
require_once "Config/config.php";
global $connection;
require_once $connection;
class FetchListFromIdGateway
{
    private Connection $connection;
    private static string $query = "SELECT * FROM taskLists WHERE id=:i";

    function __construct(Connection $connection){
        $this->connection = $connection;
    }

    function fetchListFromId(int $id) : TaskList{
        global $ent;
        require_once $ent['visibility'];
        require_once $ent['task list'];
        require_once $ent['user'];
        $this->connection->executeQuery(self::$query, array(
            ':i'   => [$id, PDO::PARAM_INT]
        ));
        $tmp = $this->connection->getResults();
        $tmp = $tmp[0];
        return new TaskList($tmp['id'], $tmp['name'], $tmp['visibility'], new User($tmp['creator']));
    }
}