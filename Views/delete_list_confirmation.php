<html>
<head>
    <title>Delete list? - To-do</title>
</head>
<body>
<h3>Do you really want to delete this list?</h3>
<form method="post">
    <?php
    global $listId;
    echo "<input type='hidden' name='choice' value=".$listId."/>";
    ?>
    <button type="submit" name="action" value="Delete list confirmed">Yes</button>
    <button type="submit" name="action" value="View list">No</button>
</form>
</body>
</html>