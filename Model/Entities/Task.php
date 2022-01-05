<?php

class Task
{
    //properties
    private int $id;
    private string $name;
    private bool $completed;

    //constructor
    public function __construct(int $id, string $name, bool $completed = false){
        $this->id = $id;
        $this->name = $name;
        $this->completed = $completed;
    }

    //getters
    public function getName() : string {
        return $this->name;
    }
    public function isCompleted() : bool {
        return $this->completed;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}