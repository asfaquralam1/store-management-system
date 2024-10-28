<?php
require('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $users_name     = $_POST['users_name'];
        $users_email    = $_POST['users_email'];
        $users_password = $_POST['users_password'];

        $sql = "INSERT into `users` (username,email,password) values ('$users_name','$users_email','$users_password')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('location:login.php');
        } else {
            die(mysqli_error($conn));
        }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
       Name :<br>
       <input type="text" name="users_name"><br><br>
        Email :<br>
        <input type="email" name="users_email"><br><br>
        Password :<br>
        <input type="password" name="users_password"><br><br>
        <button type="submit" name="submit">Save</button>
    </form>
</body>

</html>