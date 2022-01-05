<?php

class CreateTaskController
{
    public function __construct(string $taskName, int $listId)
    {
        require_once "Config/config.php";
        global $connection, $gateways;
        require_once $connection;
        require_once $gateways['add task'];

        $gw = new AddTaskGateway(Connection::getInstance());
        $gw->addTask($taskName, $listId);
    }
}