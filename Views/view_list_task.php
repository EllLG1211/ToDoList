

<head>
    <style>
        .completionButton{
            height: 20px;
            width: 20px;
        }
        .strikeText{
            text-decoration: line-through;
        }
    </style>
</head>

<tr>
    <td>
        <form method="post">
            <?php
            echo "<input type='hidden' name='listId' value='".$listToDisplay->getId()."'>";
            echo "<input type='hidden' name='taskId' value='".$taskToDisplay->getId()."'>";
            ?>
            <button type="submit" name="action" value="Complete task" class="completionButton">
                <?php
                if($taskToDisplay->isCompleted()) echo "✔";
                ?>
            </button>
        </form>
    </td>
    <td>
        <?php
        echo "<h4";
        if ($taskToDisplay->isCompleted()) echo " class='strikeText'";
        echo ">";
        echo $taskToDisplay->getName();
        echo "</h4>";
        ?>

    </td>
</tr>