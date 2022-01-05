<?php

class AddListController
{

    /**
     * @param string $name
     * @param int $visibility
     * @param User $creator
     * @throws Exception
     */
    public function __construct(string $name, int $visibility, User $creator)
    {
        require_once "Config/config.php";
        global $ent, $gateways, $views, $connection;
        require_once $ent['visibility'];
        require_once $gateways['add list'];
        require_once $connection;

        if($visibility != visibility::PUBLIC && $visibility != visibility::PRIVATE){
            throw new Exception("Wrong value for visibility");
        }

        $gw = new AddTaskListGateway(Connection::getInstance());
        $gw->AddTaskList($name, $visibility, $creator);

        include $views['list created'];
    }
}