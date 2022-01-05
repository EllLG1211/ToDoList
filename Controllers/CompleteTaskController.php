<?php

class CompleteTaskController
{

    /**
     * @param int $taskId
     */
    public function __construct(int $taskId)
    {
        require_once "Config/config.php";
        global $gateways, $connection;
        require_once $connection;
        require_once $gateways['complete task'];

        $gw = new CompleteTaskGateway(Connection::getInstance());
        $gw->completeTask($taskId);
    }
}