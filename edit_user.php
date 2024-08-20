<?php
require('connection.php');
?>
<!DOCTYPE html>

<head>
    <title>Edit Users</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $getid = $_GET['id'];
        $sql = "SELECT * FROM users WHERE users_id =$getid";
        $query = $conn->query($sql);

        $data = mysqli_fetch_assoc($query);

        $users_id          = $data['users_id'];
        $users_first_name  = $data['users_first_name'];
        $users_last_name   = $data['users_last_name'];
        $users_email       = $data['users_email'];
        $users_password    = $data['users_password'];
    }

    if (isset($_GET['users_first_name'])) {
        $users_first_name  = $_GET['users_first_name'];
        $users_last_name   = $_GET['users_last_name'];
        $users_email       = $_GET['users_email'];
        $users_password    = $_GET['users_password'];
        $users_id          = $_GET['users_id'];
        $sql1 = "UPDATE users SET users_first_name='$users_first_name', users_last_name = '$users_last_name',users_email = '$users_email',users_password = '$users_password' WHERE users_id = '$users_id'";
        if ($conn->query($sql1) == TRUE) {
            echo 'Updated Successful!';
        } else {
            echo 'Not Updated';
        }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        First Name :<br>
        <input type="text" name="users_first_name" value="<?php echo $users_first_name ?>"><br><br>
        Last Name :<br>
        <input type="text" name="users_last_name" value="<?php echo $users_last_name ?>"><br><br>
        Email :<br>
        <input type="email" name="users_email" value="<?php echo $users_email ?>"><br><br>
        Password :<br>
        <input type="password" name="users_password" value="<?php echo $users_password ?>">
        <input type="password" name="users_id" value="<?php echo $users_id ?>" hidden><br><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>