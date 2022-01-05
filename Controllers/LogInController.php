<?php
require_once "Config/config.php";
global $gateways, $connection;
require_once $gateways['log in'];
require_once $connection;
class LogInController
{
    function __construct(string $username, string $password){
        global $views;
        $gw = new ConnectionAttemptGateway(Connection::getInstance());
        $response = $gw->connectionAttempt($username, $password);
        if($response){
            $_SESSION['username'] = $username;
            include $views['signed in'];
        }
        else{
            $errors[] = "Incorrect username or password";
            include $views['auth'];
            include $views['error'];
        }
    }
}