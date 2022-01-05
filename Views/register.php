<html lang="en">
<head>
    <title>Register - To-do</title>
</head>
<body>
<header>
    <h1>Register</h1>
</header>
<div>
    <form method="post" autocomplete="off">
        <input type="hidden" name="action" value="New account">
        Username: <label>
            <input type="text" name="name">
        </label><br/>
        Password: <label>
            <input type="text" name="password">
        </label><br/>
        Confirm Password: <label>
            <input type="text" name="confirmation">
        </label><br/>
        <input type="submit" value="Register">
    </form>
</div>
<form method="get">
    <p>Already have an account?</p>
    <input type="submit" name="action" value="Sign in">
</form>
</div>
</body>
</html>