<?php
require('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
    <?php
    if (isset($_POST['users_email'])) {
        $users_email    = $_POST['users_email'];
        $users_password = $_POST['users_password'];

        $sql = "SELECT * FROM users WHERE users_email='$users_email' AND users_password='$users_password'";

        $query =  $conn->query($sql);

        if (mysqli_num_rows($query) > 0) {
            header('location:index.php');
        } else {
            echo 'Login failed!';
        }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        Email :<br>
        <input type="email" name="users_email"><br><br>
        Password :<br>
        <input type="password" name="users_password"><br><br>
        <input type="submit" value="login">
    </form>
</body>

</html>