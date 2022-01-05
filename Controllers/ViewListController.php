<?php
require_once "Config/config.php";
class ViewListController
{
    function __construct(int $id){
        global $gateways, $ent, $connection, $views;
        require_once $gateways['fetch list from id'];
        require_once $gateways['fetch tasks'];
        require_once $ent['task list'];
        require_once $ent['task'];
        require_once $connection;

        $co = Connection::getInstance();
        $gw = new FetchListFromIdGateway($co);
        $listToDisplay = $gw->fetchListFromId($id);
        $gw = new FetchTasksGateway($co);
        $tasksToDisplay = $gw->fetchTasks($listToDisplay->getId());

        include $views['view list'];
    }
}