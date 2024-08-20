<?php
require('connection.php');
?>
<!DOCTYPE html>

<head>
    <title>Add Users</title>
</head>

<body>
    <?php
    if (isset($_GET['users_first_name'])) {
        $users_first_name  = $_GET['users_first_name'];
        $users_last_name   = $_GET['users_last_name'];
        $users_email       = $_GET['users_email'];
        $users_password    = $_GET['users_password'];

        $sql = "INSERT INTO users (users_first_name,users_last_name,users_email,users_password) VALUES('$users_first_name','$users_last_name','$users_email','$users_password')";

        if ($conn->query($sql) == TRUE) {
            echo 'Data Inserted';
        } else {
            echo 'Data not Inserted';
        }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        First Name :<br>
        <input type="text" name="users_first_name"><br><br>
        Last Name :<br>
        <input type="text" name="users_last_name"><br><br>
        Email :<br>
        <input type="email" name="users_email"><br><br>
        Password :<br>
        <input type="password" name="users_password"><br><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>