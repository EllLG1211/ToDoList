<?php
global $listId;
?>

<h2>Add a new task</h2>
What do you want to call it?
<form method="post" autocomplete="off">
    <input type="hidden" name="listId" value= <?php echo $listId;?>>
    <label>
        <input type="text" name="taskName">
    </label>
    <input type="submit" name="action" value="Create task">
    <br/><br/>
    <button type="submit" name="action" value="View list">Cancel</button>
</form>