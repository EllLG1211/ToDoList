<?php

abstract class visibility{
    public const PUBLIC = 0;
    public const PRIVATE = 1;

    public static function toString(int $visibility) : string{
        if ($visibility == self::PUBLIC) return "Public";
        if ($visibility == self::PRIVATE) return "Private";
        return "Unknown";
    }
}
