<?php
require_once "Config/config.php";
global $ent;
require_once $ent['user'];
class MdlUser
{

    function __construct(){
    }

    function login(String $username, String $password) {
        $gateway = new ConnectionAttemptGateway(Connection::getInstance());
        $isAuth = $gateway->connectionAttempt($username, $password);
        if($isAuth) {
            $_SESSION['username'] = $username;
        }
    }

    function logout() {
        $_SESSION['username'] = null;
    }

    function register(String $username, String $password) {
        $gateway = new AddUserGateway(Connection::getInstance());
        $isCreated = $gateway->addUser($username, $password);
        if ($isCreated) {
            $_SESSION['username'] = $username;
        }
        else {
            //error : already exists
        }
    }

    static function isConnected(): User{
        if(isset($_SESSION['username'])){
            $uname = sanitize($_SESSION['username']);
            return new User($uname);
        }
        return new User();
    }
}