<?php
require_once "Config/config.php";
function sanitize($data): string
{
    global $login, $passwd;
    $msq = new mysqli(null, $login, $passwd, "progweb_proj_todo_list");
    $data = $msq->real_escape_string($data);
    return(stripslashes($data));
}