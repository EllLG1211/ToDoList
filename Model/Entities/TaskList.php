<?php
require_once 'visibility.php';
require_once 'Task.php';

class TaskList
{
    //properties
    private int $id;
    private int $visibility;
    private string $name;
    private User $creator;

    //constructor
    public function __construct(int $id, string $name, int $visibility, User $creator) {
        //check value for visibility
        if ($visibility != visibility::PUBLIC && $visibility != visibility::PRIVATE)
            throw new \http\Exception\InvalidArgumentException("Unauthorized value for visibility.");
        $this->id = $id;
        $this->name = $name;
        $this->creator = $creator;
        $this->visibility = $visibility;
    }

    //getters

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getVisibility(): int
    {
        return $this->visibility;
    }

    /**
     * @return User|null
     */
    public function getCreator(): User
    {
        return $this->creator;
    }

    //other functions
    public function addTask(Task $t){
        array_push($this->tasks, $t);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}