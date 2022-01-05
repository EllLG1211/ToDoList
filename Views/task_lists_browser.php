<?php
require_once "Config/config.php";
global $views;
?>

<html>
    <head>
        <title>Browse task lists - To-do</title>
    </head>
    <body>
        <h2>To-do lists</h2>
        <p>Click on one to see its content, interact with it</p>
        <div>
            <form method="get">
                <input type="hidden" name="action" value="View list">
                <?php
                foreach ($listsToDisplay as $listToDisplay){
                    include $views['task lists browser task'];
                }
                ?>
                <br/><br/>
                <input type="submit" name="action" value="Create list">
            </form>
        </div>
    </body>
</html>