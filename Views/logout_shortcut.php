<?php
require_once "Config/config.php";
global $model;
require_once $model['user'];
?>

<html>
    <form method="post">
        <?php
         $user = MdlUser::isConnected();
         if (! $user->isVisitor()){
             echo $user->getName()."\t";
             echo "<input type='submit' name='action' value='Log out'> ";
         }
         else {
             echo "<input type='submit' name='action' value='Sign in'>";
         }
         ?>
    </form>
</html>