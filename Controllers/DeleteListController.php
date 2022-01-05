<?php

class DeleteListController
{
    function __construct(int $listId)
    {
        require_once "Config/config.php";
        global $connection, $gateways, $views;
        require_once $connection;
        require_once $gateways['delete list'];

        $gw = new DeleteTaskListGateway(Connection::getInstance());
        $gw->deleteTaskList($listId);

        include $views['list deleted'];
    }
}