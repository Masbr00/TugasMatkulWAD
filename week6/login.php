<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>LOGIN ADMIN</h2>
    <ul>
        <form action="login.php" method="post">
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>

            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>

            <li>
                <button type="submit" name="submit">LOGIN</button>
            </li>

            <?php

                if (isset($_POST['username']))
                {
                    $username = $_POST['username'];
                }
                if (isset($_POST['password'])){
                    $password = $_POST['password'];
                }
                if ($username != NULL && $password != NULL ) {
                    header("Location:admin.php");
                }
            ?>
        </form>
    <ul>
</body>
</html>