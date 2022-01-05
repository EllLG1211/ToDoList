<?php
require_once "Config/config.php";
global $views, $ent, $model;
require_once $ent['user'];
require_once $model['user'];
?>

<html>
<head>
    <title><?php echo $listToDisplay->getName()." - To-do" ; ?></title>
</head>
<body>
<h2>
    <?php
    echo $listToDisplay->getName();
    ?>
</h2>
<table>
    <?php
    foreach ($tasksToDisplay as $taskToDisplay){
        include $views['view list task'];
    }
    ?>
</table>
<br/>
<form method="get">
    <button type="submit" name="action" value="Browse lists">Back</button>
    <?php
    $cr = $listToDisplay->getCreator();
    $user = MdlUser::isConnected();
    if($cr->isVisitor() || $cr->isEqual($user)){
        echo "<input type='hidden' name='listId' value='".$listToDisplay->getId()."'>";
        echo "<input type='submit' name='action' value='Add task'>";
    }

    if(!$user->isVisitor() && $user->isEqual($listToDisplay->getCreator())) {
        echo "<input type='hidden' name='listId' value=".$listToDisplay->getId().">";
        echo "<input type='submit' name='action' value='Delete list'>";
    }
    ?>
</form>
</body>
</html>