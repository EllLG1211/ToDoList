<html lang="en">
<head>
    <title>Sign in - To-do</title>
</head>
<body>
    <header>
        <h1>Sign in</h1>
    </header>
    <div>
        <form method="post" autocomplete="off">
            <input type="hidden" name="action" value="Log in">
            Username: <label>
                <input type="text" name="name">
            </label><br/>
            Password: <label>
                <input type="text" name="password">
            </label><br/>
            <input type="submit" name="submit" value="Sign in">
        </form>
    </div>
        <form method="get">
            <p>Don't have an account yet?</p>
            <input type="submit" name="action" value="Register">
        </form>
    </div>
</body>
</html>