<?php

class User
{
    private ?string $name;

    public function __construct(string $name = null) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    public function isEqual(User $u) : bool {
        return $this->name == $u->getName();
    }

    public function isVisitor(): bool{
        if($this->name == null) return true;
        else return false;
    }
}