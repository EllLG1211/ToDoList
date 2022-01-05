<html>
<head>
    <title>Signed in - To-do</title>
</head>
<body>
    <h3>You are signed in.</h3>
    <form method="get" action=<?php global $front; echo $front;?> >
        <input type="submit" name="action" value="Log out"/>
        <input type="submit" name="action" value="Create list"/>
        <input type="submit" name="action" value="Browse lists"/>
    </form>
</body>
</html>