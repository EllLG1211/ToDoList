<?php

class RegisterController
{
    function __construct(string $username, string $password, string $confirmation){
        require_once "Config/config.php";
        global $views, $gateways, $connection;
        require_once $gateways['add user'];
        require_once $connection;

        if($password != $confirmation){
            $errors[] = "Confirmation must be identical to password";
            include $views['register'];
            include $views['error'];
        }
        else{
            try {
                $gw = new AddUserGateway(Connection::getInstance());
                if ($gw->isAvailable($username)) {
                    $gw->addUser($username, $password);
                    $_SESSION['username'] = $username;
                    include $views['signed in'];
                }
                else {
                    $errors[] = "Username is unavailable";
                    include $views['register'];
                    include $views['error'];
                }
            }
            catch (PDOException $e){
                $errors[] = "Database error!";
                include $views['error'];
            }
        }
    }
}