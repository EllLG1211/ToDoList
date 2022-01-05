<?php
require_once "Config/config.php";
global $connection;
require_once $connection;
class FetchTaskListsGateway
{
    private Connection $connection;
    private static string $query = "SELECT * FROM taskLists WHERE visibility=:vs OR creator=:u";

    public function __construct(Connection $connection){
        $this->connection = $connection;
    }

    public function fetchTaskLists(User $user) : array {
        global $ent;
        require_once $ent['visibility'];
        require_once $ent['task list'];
        $this->connection->executeQuery(self::$query, array(
            ':vs'   => [visibility::PUBLIC, PDO::PARAM_INT],
            ':u'    => [$user->getName(), PDO::PARAM_STR]
        ));
        $tmp = $this->connection->getResults();
        $taskLists = array();
        foreach ($tmp as $t){
            array_push($taskLists, new TaskList($t['id'], $t['name'], $t['visibility'], new User($t['creator'])));
        }
        return $taskLists;
    }
}