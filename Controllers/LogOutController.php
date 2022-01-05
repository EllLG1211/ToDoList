<?php

class LogOutController
{
    function __construct(){
        require_once "Config/config.php";
        global $views;
        unset($_SESSION['username']);
        include $views['signed out'];
    }
}