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
    if (isset($_POST['submit'])) {
        $users_email    = $_POST['users_email'];
        $users_password = $_POST['users_password'];

        $sql = "SELECT * FROM `users` WHERE email='$users_email' AND password='$users_password'";

        $result = mysqli_query($conn, $sql);

        echo $sql;

        // if ($result) {
        //     header('location:index.php');
        // } else {
        //     die(mysqli_error($conn));
        // }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        Email :<br>
        <input type="email" name="users_email"><br><br>
        Password :<br>
        <input type="password" name="users_password"><br><br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>

</html>