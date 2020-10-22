<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ADMIN</title>
</head>
<body>
    <h2>Selamat Datang Admin!</h2>
    <?php
        if (isset($_POST["username"])) {
            $user = $_POST["username"];
        }
        if (isset($_POST["password"])) {
            $pass = $_POST['password'];
        }
        # Redirect kembali ke login.php jika user dan pass kosong
        if ($user == NULL && $pass == NULL){
            header('Location:login.php'); 
        }

        echo 'User : '.$user;
        echo '<br>';
        echo 'Pass : '.$pass;
        echo '<br>';
        echo '<br>';
    ?>
    <a href="login.php">LOGOUT</a>
</body>
</html>