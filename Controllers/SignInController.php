<?php
global $model;
require_once $model['user'];

class SignInController
{
    function __construct(){
        global $views;
        $isUser = MdlUser::isConnected();

        if($isUser->isVisitor()){
            include $views['auth'];
        }
        else{
            include $views['signed in'];
        }
    }
}