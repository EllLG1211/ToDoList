<?php

class TaskListsBrowserController
{
    public
    function __construct()
    {
        require_once "Config/config.php";
        global $views, $gateways, $connection, $model;
        require_once $gateways['fetch task lists'];
        require_once $connection;
        require_once $model['user'];
        $gw = new FetchTaskListsGateway(Connection::getInstance());
        $user = MdlUser::isConnected();
        $listsToDisplay = $gw->fetchTaskLists($user);
        include $views['task lists browser'];
    }
}