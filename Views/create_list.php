<?php
require_once "Config/config.php";
global $ent, $model;
require_once $ent['visibility'];
require_once $model['user'];
?>
<html>
<head>
    <title>Create a new list - To-do</title>
</head>
<body>
    <h2>Create a new to-do list</h2>
    <form method="post" autocomplete="off">
        <input type="hidden" name="action" value="New list">
        <p><b>Name of your list:</b>  <label><input type="text" name="listName"></label></p>
        <p><b>Visibility:</b><br/>
        <?php
        echo "<input type='radio' id='public' name='visibility' value=".visibility::PUBLIC." checked>";
        echo "<label for='public'>".visibility::toString(visibility::PUBLIC)."</label>";
        echo "<br/>";
        $user = MdlUser::isConnected();
        if($user->isVisitor()){
            echo "You are not connected. Visitors can only create public lists. <br/> 
                    To create a private list, please sign in.
                    <input type='submit' name='action' value='Sign in'></br>";
        }
        else{
            echo "<input type='radio' id='private' name='visibility' value=".visibility::PRIVATE.">";
            echo "<label for='private'>".visibility::toString(visibility::PRIVATE)."</label>";
        }
        ?>
        </p>
        <input type="submit" value="Create">
    </form>
</body>
</html>